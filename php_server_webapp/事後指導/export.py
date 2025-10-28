import pymysql.cursors 
import sys
import csv

年度=sys.argv[1]

# for PyMySQL
db=pymysql.connect(host="localhost", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
cursor=db.cursor()
テーブル="事後指導"
cursor.execute("USE test")
# sql=('SELECT * FROM ' +テーブル)
sql ='SELECT 個人データ.学生番号, フリガナ,DATE_FORMAT(生年月日,"%Y-%m-%d") AS 生年月日 ,CASE WHEN 性別=0 THEN "男" WHEN 性別=1 THEN "女" END AS 性別\n'\
',学部,学科,学生区分コード,年次,血圧ID,血圧日,最高,最低,尿検査ID,尿検査日,蛋白,潜血,生理有無,糖,ウロビリ,身長体重ID,身長体重日,BMI,医師受診日,診察所見,XP検査日,判読コード,既往病名  FROM \n'\
'(((((個人データ \n'\
'   LEFT OUTER JOIN\n'\
'      ( 所属 )\n'\
'        ON  個人データ.所属コード = 所属.所属コード\n'\
'   )\n'\
'   LEFT OUTER JOIN\n'\
'      ( SELECT Member.尿検査ID as 尿検査ID,Member.学生番号 as 学生番号, Member.尿検査日 as 尿検査日,Member.蛋白 as 蛋白,Member.潜血 as 潜血,Member.生理有無 as 生理有無 ,Member.糖 as 糖,Member.ウロビリ as ウロビリ\n'\
'        FROM\n'\
'           ( SELECT ROW_NUMBER() OVER (   PARTITION BY 学生番号    ORDER BY 尿検査日 DESC  ) AS 日付Rank,尿検査日,尿検査ID,学生番号,蛋白,潜血,生理有無,糖,ウロビリ\n'\
'            FROM 尿検査  WHERE 年度取得(尿検査日)="'+年度+'" ) Member WHERE Member.日付Rank = 1'\
'      ) AS 尿検査最新  ON  尿検査最新.学生番号=個人データ.学生番号\n'\
'   )\n'\
'   LEFT OUTER JOIN\n'\
'      ( SELECT Member.血圧ID as 血圧ID  ,Member.学生番号 as 学生番号,Member.血圧日 as 血圧日,Member.最高 as 最高,Member.最低 as 最低 \n'\
'         FROM\n'\
'           ( SELECT ROW_NUMBER() OVER (   PARTITION BY 学生番号    ORDER BY 血圧日 DESC  ) AS 日付Rank,血圧日,血圧ID,学生番号,最高,最低\n'\
'            FROM 血圧  WHERE 年度取得(血圧日)="'+年度+'" ) Member WHERE Member.日付Rank = 1\n'\
'      ) AS 血圧最新 ON 血圧最新.学生番号=個人データ.学生番号\n'\
'   )\n'\
'   LEFT OUTER JOIN\n'\
'      (SELECT Member.身長体重ID as 身長体重ID,Member.学生番号 as 学生番号,Member.身長体重日 as 身長体重日,Member.BMI as BMI\n'\
'          FROM\n'\
'           ( SELECT ROW_NUMBER() OVER (   PARTITION BY 学生番号    ORDER BY 身長体重日 DESC  ) AS 日付Rank,学生番号,身長体重日,身長体重ID,BMI\n'\
'            FROM 身長体重  WHERE 年度取得(身長体重日)="'+年度+'"  ) Member WHERE Member.日付Rank = 1\n'\
'      ) AS 身長体重最新        ON 身長体重最新.学生番号=個人データ.学生番号\n'\
'   )\n'\
'   LEFT OUTER JOIN\n'\
'      (SELECT s1.学生番号, 医師受診ID, s1.医師受診日, GROUP_CONCAT(診察所見) AS 診察所見\n'\
'            FROM 医師受診 s1 JOIN\n'\
'                   ( SELECT 学生番号, MAX(医師受診日) AS 医師受診日 FROM 医師受診  GROUP BY 学生番号) AS s2\n'\
'                   ON s1.学生番号 = s2.学生番号 AND s1.医師受診日 = s2.医師受診日\n'\
'            WHERE 年度取得(s1.医師受診日)   ="'+年度+'" AND 診察所見 NOT LIKE "異常なし"  GROUP BY 学生番号\n'\
'      ) AS 医師受診最新      ON 医師受診最新.学生番号=個人データ.学生番号\n'\
'   )\n'\
'   LEFT OUTER JOIN\n'\
'      (SELECT Member.XP検査ID as XP検査ID,Member.学生番号 as 学生番号,Member.XP検査日 as XP検査日,Member.判読コード as  判読コード\n'\
'          FROM\n'\
'           ( SELECT ROW_NUMBER() OVER (   PARTITION BY 学生番号    ORDER BY XP検査日 DESC  ) AS 日付Rank,XP検査ID,学生番号,XP検査日,判読コード\n'\
'            FROM XP検査  WHERE 年度取得(XP検査日)="'+年度+'" ) Member WHERE Member.日付Rank = 1\n'\
'      )  AS XP検査最新            ON XP検査最新.学生番号=個人データ.学生番号\n'\
'   LEFT OUTER JOIN\n'\
'      (SELECT 学生番号, 既往歴ID, 年度, GROUP_CONCAT(既往病名) AS 既往病名\n'\
'                          FROM 既往歴 WHERE 年度="'+年度+'"  GROUP BY 学生番号\n'\
'      ) AS 既往歴最新        ON 既往歴最新.学生番号=個人データ.学生番号\n'\
'   WHERE   \n'\
'   (  140 <= 最高  OR 90 <= 最低 OR 2 <= 蛋白 OR ( 2 <= 潜血 AND 0 = 生理有無) OR 1 <= 糖 OR 3 <= ウロビリ OR 35 <= BMI  OR 診察所見 NOT LIKE "異常なし" OR 4  <= 判読コード  )\n'\


print(sql);
cursor.execute(sql)
rows=cursor.fetchall()
cursor.close()
db.close()

if rows:
    columnNames = list()
    # ヘッダデータを作る
    for i in cursor.description:
        columnNames.append(i[0])
    #with open(テーブル,'w',newline='') as テーブル+'.csv':
    with open(テーブル+年度+'.csv','w',newline='') as csvfile:
        # 辞書順序を指定しておく
        csvwriter = csv.DictWriter(csvfile,columnNames,delimiter=",",quotechar='"')
        # ヘッダ行を書き込み
        csvwriter.writeheader()
        for row in rows:
            #  csv データを書き込み
            csvwriter.writerow(row)

