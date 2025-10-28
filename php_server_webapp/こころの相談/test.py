SOURCE='            <text:p>##最高@血圧## <text:span text:style-name="T1">/ </text:span>##最低@血圧## mmHg</text:p>';
import sys
import pymysql.cursors 
import re
global キー
global キーフィールド

キー=sys.argv[2]
キーフィールド="id"

def dbload(キー,クエリ):
  #db=pymysql.connect(host="192.168.162.138", user="webdb", password="password")
  db=pymysql.connect(host="192.168.162.138", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
  # cursor=db.cursor(dictionary=True, buffered=True)
  cursor=db.cursor()
 
  cursor.execute("USE test")
  db.commit()
  sql=('CALL '+クエリ+'("'+キー+'")')
  cursor.execute(sql)
  db.close()
  return(cursor)

def dboneload(キー,クエリ):
  #db=pymysql.connect(host="192.168.162.138", user="webdb", password="password")
  db=pymysql.connect(host="192.168.162.138", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
  #cursor=db.cursor(dictionary=True, buffered=True)
  cursor=db.cursor()
 
  cursor.execute("USE test")
  db.commit()
  sql=('CALL '+クエリ+'("'+キー+'")')
  cursor.execute(sql)
  i=(cursor.fetchone())
  db.close()
  return(i)

def replaceallline(source):
  p = re.search(r'##ALL:(.+?)@(.+?)##',source)
  if p != None:
    クエリ=(p.groups()[1])
    フィールド=(p.groups()[0])
    ret = dbload(キー,クエリ)
    if ret != None:
      newtext=""
      for row in ret:
        list=[newtext,row[フィールド ]]
        newtext="</text:p><text:p>".join(list)
      p = re.sub(r'##ALL:(.+?)@(.+?)##',newtext,source)
      #print(p)
      return(p)
    else:
      p = re.sub(r'##ALL:(.+?)@(.+?)##',"",source)
      return(p)
  else:
    return(source)



def replaceline(source):
  p = re.search(r'##(.+?)@(.+?)##',source)
  if p != None:
    クエリ=(p.groups()[1])
    フィールド=(p.groups()[0])
    ret = dboneload(キー,クエリ)
    if ret != None:
      p = re.sub(r'##(.+?)@(.+?)##',str(ret[フィールド]),source)
      return(p)
    else:
      p = re.sub(r'##(.+?)@(.+?)##',"",source)
      return(p)
  else:
    return(source)

#source = '  ##SQL:会員@フリガナ## 様'
#dist=replaceline(source)
#print(dist)
counter=0;
filename = sys.argv[1]
f =  open(filename, 'r')
while True:
    fileText = f.readline().replace("\n","")
    if fileText=='':
       break
    replacedtext = replaceallline(fileText)
    replacedtext = replaceline(replacedtext)
    counter=counter+1;
    print(replacedtext)
f.close()
