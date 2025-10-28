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
sql ='SELECT 個人データ.学生番号, フリガナ,DATE_FORMAT(生年月日,"%Y-%m-%d") AS 生年月日 ,CASE WHEN 性別=0 THEN "男" WHEN 性別=1 THEN "女" END AS 性別,学部,学科,学生区分コード,年次,血圧ID,血圧日,最高,最低,尿検査ID,尿検査日,蛋白,潜血,生理有無,糖,ウロビリ,身長体重ID,身長体重日,BMI,医師受診日,診察所見,XP検査日,判読コード,既往病名  FROM '\
'(((((個人データ '\
'   LEFT OUTER JOIN'\
'      ( 所属 )'\
'        ON  個人データ.所属コード = 所属.所属コード)'\
'   LEFT OUTER JOIN'\
'      ( SELECT 尿検査ID,学生番号,max(尿検査日) as 尿検査日,蛋白,潜血,生理有無,糖,ウロビリ FROM 尿検査   WHERE 年度取得(尿検査日)   ="'+年度+'" GROUP BY 学生番号 ) AS 尿検査最新'\
'        ON  尿検査最新.学生番号=個人データ.学生番号) '\
'   LEFT OUTER JOIN'\
'      (SELECT 血圧ID,学生番号,max(血圧日) as 血圧日,最高,最低        FROM 血圧     WHERE 年度取得(血圧日) ="'+年度+'" GROUP BY 学生番号) AS 血圧最新'\
'        ON 血圧最新.学生番号=個人データ.学生番号)'\
'   LEFT OUTER JOIN'\
'      (SELECT 身長体重ID,学生番号,max(身長体重日) as 身長体重日,BMI         FROM 身長体重 WHERE 年度取得(身長体重日) ="'+年度+'" GROUP BY 学生番号) AS 身長体重最新'\
'        ON 身長体重最新.学生番号=個人データ.学生番号)'\
'   LEFT OUTER JOIN'\
'      (SELECT s1.学生番号, 医師受診ID, s1.医師受診日, GROUP_CONCAT(診察所見) AS 診察所見 FROM 医師受診 s1 JOIN'\
'         ( SELECT 学生番号, MAX(医師受診日) AS 医師受診日   FROM 医師受診  GROUP BY 学生番号) AS s2'\
'         ON s1.学生番号 = s2.学生番号 AND s1.医師受診日 = s2.医師受診日 '\
'       WHERE 年度取得(s1.医師受診日)   ="'+年度+'" AND 診察所見 NOT LIKE "異常なし"  GROUP BY 学生番号) AS 医師受診最新'\
'        ON 医師受診最新.学生番号=個人データ.学生番号)'\
'   LEFT OUTER JOIN'\
'      (SELECT XP検査ID,学生番号,max(XP検査日) as XP検査日,判読コード      FROM XP検査  WHERE 年度取得(XP検査日)="'+年度+'" GROUP BY 学生番号) AS XP検査最新'\
'       ON XP検査最新.学生番号=個人データ.学生番号'\
'   LEFT OUTER JOIN'\
'      (SELECT 学生番号, 既往歴ID, 年度, GROUP_CONCAT(既往病名) AS 既往病名 FROM 既往歴 WHERE 年度="'+年度+'"  GROUP BY 学生番号) AS 既往歴最新'\
'       ON 既往歴最新.学生番号=個人データ.学生番号'\
' WHERE'\
'   (  140 <= 最高  OR 90 <= 最低 OR 2 <= 蛋白 OR ( 2 <= 潜血 AND 0 = 生理有無) OR 1 <= 糖 OR 3 <= ウロビリ OR 35 <= BMI  OR 診察所見 NOT LIKE "異常なし" OR 4  <= 判読コード  )'
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

