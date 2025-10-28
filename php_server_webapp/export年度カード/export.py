import pymysql.cursors 
import sys
import csv

プロシージャ=sys.argv[1]
年度=sys.argv[2]
出力日時=sys.argv[3]
# for PyMySQL
db=pymysql.connect(host="localhost", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
cursor=db.cursor()
cursor.execute("USE test")
sql=('CALL '+プロシージャ+'('+年度+')')
cursor.execute(sql)
rows=cursor.fetchall()

# cursor.close()
db.close()

print(rows[0])
if rows:
    columnNames = list()
    # ヘッダデータを作る
    for i in cursor.description:
        columnNames.append(i[0])
    #with open(テーブル,'w',newline='') as テーブル+'.csv':
    with open(プロシージャ+年度+'_'+ 出力日時 + '.csv','w',newline='') as csvfile:
        # 辞書順序を指定しておく
        csvwriter = csv.DictWriter(csvfile,columnNames,delimiter=",",quotechar='"')
        # ヘッダ行を書き込み
        csvwriter.writeheader()
        for row in rows:
            #  csv データを書き込み
            csvwriter.writerow(row)

