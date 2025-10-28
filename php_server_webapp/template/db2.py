import sys
import pymysql.cursors 
import re
global キー
global キーフィールド

キー=sys.argv[2]
キーフィールド="id"
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

def dboneload(キー,クエリ):
  #db=pymysql.connect(host="192.168.162.138", user="webdb", password="password")
  db=pymysql.connect(host="localhost", user="webdb", password="password" , cursorclass=pymysql.cursors.DictCursor)
  #cursor=db.cursor(dictionary=True, buffered=True)
  cursor=db.cursor()
 
  cursor.execute("USE test")
  db.commit()
  sql=('CALL '+クエリ+'("'+キー+'")')
  print(sql)
  cursor.execute(sql)
  i=(cursor.fetchone())
  db.close()
  return(i)

def replaceallline(source):
  p = re.search(r'##ALL:(.+?)@(.+?)##',source)
  if p is not None:
    クエリ=(p.groups()[1])
    フィールド=(p.groups()[0])
    # print("キー、クエリ="+キー+" "+クエリ)
    ret = dbload(キー,クエリ)
    if ret is not None:
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
  result = re.findall(r'##(.+?)@(.+?)##', source)
  for num in range(len(result)):
    p = re.search(r'##(.+?)@(.+?)##',source)
    if p is not None:
      クエリ=(p.groups()[1])
      フィールド=(p.groups()[0])
      print("キー、クエリ,フィールド="+キー+" "+クエリ+" "+フィールド,file=sys.stderr)
      ret = dboneload(キー,クエリ)
      if ret is not None:
        if ( フィールド in ret ) and (ret[フィールド] is not None) :
          if '\n' in str(ret[フィールド]) :    # 改行が入っている場合の処理
            改行テキスト=str(ret[フィールド]).replace('\n','</text:p><text:p>　')  # 全角スペース含む改行
            改行テキスト='　'+改行テキスト  # テキスト最初に全角スペースを入れる
            source = re.sub(r'##'+フィールド+'@'+クエリ+'##',改行テキスト,source)
          else:
            source = re.sub(r'##'+フィールド+'@'+クエリ+'##',str(ret[フィールド]),source)
        else:
          source = re.sub(r'##'+フィールド+'@'+クエリ+'##',"",source)
      else:
        source = re.sub(r'##'+フィールド+'@'+クエリ+'##',"",source)
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
    #print(fileText)
    replacedtext = replaceallline(fileText)
    replacedtext = replaceline(replacedtext)
    counter=counter+1;
    print(replacedtext)
f.close()
