import sys
import pymysql.cursors 
import re
global キー
global キーフィールド

def dbload(キー,クエリ):
  #db=pymysql.connect(host="192.168.162.138", user="webdb", password="password")
  db=pymysql.connect(host="localhost", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
  # cursor=db.cursor(dictionary=True, buffered=True)
  cursor=db.cursor()

  cursor.execute("USE test")
  db.commit()
  sql=('CALL '+クエリ+'("'+キー+'")')
  cursor.execute(sql)
  db.close()
  return(cursor)

def replaceallline(source):
    キー=("2020120306")
    クエリ=("既往歴")
    フィールド=("発症年齢スペース既往病名")
    # print("キー、クエリ="+キー+" "+クエリ)
    ret = dbload(キー,クエリ)
    print(vars(ret))
    print("-----------")
    if ret != None:
      newtext=""
      for row in ret:
        list=[newtext,row[フィールド ]]
        print(list)
        print("======")
        newtext="</text:p><text:p>".join(list)
      p = re.sub(r'##ALL:(.+?)@(.+?)##',newtext,source)
      print(p)
    else:
      p = re.sub(r'##ALL:(.+?)@(.+?)##',"",source)
      print(p)
replaceallline("##ALL:発症年齢スペース既往病名@既往歴##")
