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
sql ='CALL 事後指導('+年度+');'
#print(sql);
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

