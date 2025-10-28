import pymysql.cursors 
import mysql.connector

# for mysql-connector-python
#db=mysql.connector.connect(host="localhost", user="webdb", password="password") # 
#cursor=db.cursor(dictionary=True, buffered=True)

# for PyMySQL
db=pymysql.connect(host="localhost", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
cursor=db.cursor()
 
cursor.execute("USE test")
db.commit()
sql=('SELECT * FROM センサ;')
cursor.execute(sql)
db.close()
if cursor != None:
      for row in cursor:
        print(row)
cursor.close()

