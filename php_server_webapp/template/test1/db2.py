import sys
import mysql.connector
import re
global キー
global キーフィールド

キー=sys.argv[2]
キーフィールド="id"


def dbload(キー,テーブル,フィールド):
  db=mysql.connector.connect(host="192.168.162.138", user="webdb", password="password")
  cursor=db.cursor()
 
  cursor.execute("USE test")
  db.commit()
  sql=('SELECT '+フィールド+' FROM '+テーブル+' where stid="'+キー+'"')
  cursor.execute(sql)
  i=(cursor.fetchone())
  cursor.close()
  db.close()
  # return(i[0].decode())
  return(i[0])

def replaceline(source):
  p = re.search(r'##SQL:(.+)@(.+)##',source)
  if p != None:
    テーブル=(p.groups()[1])
    フィールド=(p.groups()[0])
#    print(テーブル)
#    print(フィールド)
    ret = dbload(キー,テーブル,フィールド)
    p = re.sub(r'##SQL:(.+)@(.+)##',ret,source)
    return(p)
  else:
    return(source)

#source = '  ##SQL:会員@フリガナ## 様'
#dist=replaceline(source)
#print(dist)

filename = sys.argv[1]
with open(filename, 'r') as f:
    fileText = f.read()
    replacedtext = replaceline(fileText)
    print(replacedtext)
