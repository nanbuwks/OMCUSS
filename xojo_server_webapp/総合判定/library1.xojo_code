#tag WebPage
Begin WebPage library1
   Compatibility   =   ""
   Cursor          =   0
   Enabled         =   True
   Height          =   400
   HelpTag         =   ""
   HorizontalCenter=   0
   ImplicitInstance=   True
   Index           =   -2147483648
   IsImplicitInstance=   False
   Left            =   0
   LockBottom      =   False
   LockHorizontal  =   False
   LockLeft        =   False
   LockRight       =   False
   LockTop         =   False
   LockVertical    =   False
   MinHeight       =   400
   MinWidth        =   600
   Style           =   "None"
   TabOrder        =   0
   Title           =   "Untitled"
   Top             =   0
   VerticalCenter  =   0
   Visible         =   True
   Width           =   600
   ZIndex          =   1
   _DeclareLineRendered=   False
   _HorizontalPercent=   0.0
   _ImplicitInstance=   False
   _IsEmbedded     =   False
   _Locked         =   False
   _NeedsRendering =   True
   _OfficialControl=   False
   _OpenEventFired =   False
   _ShownEventFired=   False
   _VerticalPercent=   0.0
End
#tag EndWebPage

#tag WindowCode
	#tag Method, Flags = &h0
		Function onlynumber(zenString as string) As String
		  Var result1 As String
		  result1 = zenString
		  result1 = result1.ReplaceAll("．", ".")
		  result1 = result1.ReplaceAll("１", "1")
		  result1 = result1.ReplaceAll("２", "2")
		  result1 = result1.ReplaceAll("３", "3")
		  result1 = result1.ReplaceAll("４", "4")
		  result1 = result1.ReplaceAll("５", "5")
		  result1 = result1.ReplaceAll("６", "6")
		  result1 = result1.ReplaceAll("７", "7")
		  result1 = result1.ReplaceAll("８", "8")
		  result1 = result1.ReplaceAll("９", "9")
		  result1 = result1.ReplaceAll("０", "0")
		  Var theCount As Integer=result1.Length
		  Var result2 As String
		  For i As Integer=0 To theCount
		    If ((ASC("0") <= Asc(result1.Middle(i,1))) And ( Asc(result1.Middle(i,1))<=ASC("9"))) Then
		      result2=result2+result1.Middle(i,1)
		    End If
		  Next
		  
		  return result2
		  
		End Function
	#tag EndMethod

	#tag Method, Flags = &h0
		Function zenhankanafix(zenString as string) As String
		  Var result As String
		  result = zenString
		  result = result.ReplaceAll("␣", " ")
		  result = result.ReplaceAll("１", "1")
		  result = result.ReplaceAll("２", "2")
		  result = result.ReplaceAll("３", "3")
		  result = result.ReplaceAll("４", "4")
		  result = result.ReplaceAll("５", "5")
		  result = result.ReplaceAll("６", "6")
		  result = result.ReplaceAll("７", "7")
		  result = result.ReplaceAll("８", "8")
		  result = result.ReplaceAll("９", "9")
		  result = result.ReplaceAll("０", "0")
		  result = result.ReplaceAll("あ", "ア")
		  result = result.ReplaceAll("い", "イ")
		  result = result.ReplaceAll("う", "ウ")
		  result = result.ReplaceAll("え", "エ")
		  result = result.ReplaceAll("お", "オ")
		  result = result.ReplaceAll("か", "カ")
		  result = result.ReplaceAll("き", "キ")
		  result = result.ReplaceAll("く", "ク")
		  result = result.ReplaceAll("け", "ケ")
		  result = result.ReplaceAll("こ", "コ")
		  result = result.ReplaceAll("さ", "サ")
		  result = result.ReplaceAll("し", "シ")
		  result = result.ReplaceAll("す", "ス")
		  result = result.ReplaceAll("せ", "セ")
		  result = result.ReplaceAll("そ", "ソ")
		  result = result.ReplaceAll("た", "タ")
		  result = result.ReplaceAll("ち", "チ")
		  result = result.ReplaceAll("つ", "ツ")
		  result = result.ReplaceAll("て", "テ")
		  result = result.ReplaceAll("と", "ト")
		  result = result.ReplaceAll("な", "ナ")
		  result = result.ReplaceAll("に", "ニ")
		  result = result.ReplaceAll("ぬ", "ヌ")
		  result = result.ReplaceAll("ね", "ネ")
		  result = result.ReplaceAll("の", "ノ")
		  result = result.ReplaceAll("は", "ハ")
		  result = result.ReplaceAll("ひ", "ヒ")
		  result = result.ReplaceAll("ふ", "フ")
		  result = result.ReplaceAll("へ", "ヘ")
		  result = result.ReplaceAll("ほ", "ホ")
		  result = result.ReplaceAll("ま", "マ")
		  result = result.ReplaceAll("み", "ミ")
		  result = result.ReplaceAll("む", "ム")
		  result = result.ReplaceAll("め", "メ")
		  result = result.ReplaceAll("も", "モ")
		  result = result.ReplaceAll("や", "ヤ")
		  result = result.ReplaceAll("ゆ", "ユ")
		  result = result.ReplaceAll("よ", "ヨ")
		  result = result.ReplaceAll("ら", "ラ")
		  result = result.ReplaceAll("り", "リ")
		  result = result.ReplaceAll("る", "ル")
		  result = result.ReplaceAll("れ", "レ")
		  result = result.ReplaceAll("ろ", "ロ")
		  result = result.ReplaceAll("わ", "ワ")
		  result = result.ReplaceAll("を", "ヲ")
		  result = result.ReplaceAll("ん", "ン")
		  result = result.ReplaceAll("が", "ガ")
		  result = result.ReplaceAll("ぎ", "ギ")
		  result = result.ReplaceAll("ぐ", "グ")
		  result = result.ReplaceAll("げ", "ゲ")
		  result = result.ReplaceAll("ご", "ゴ")
		  result = result.ReplaceAll("ざ", "ザ")
		  result = result.ReplaceAll("じ", "ジ")
		  result = result.ReplaceAll("ず", "ズ")
		  result = result.ReplaceAll("ぜ", "ゼ")
		  result = result.ReplaceAll("ぞ", "ゾ")
		  result = result.ReplaceAll("だ", "ダ")
		  result = result.ReplaceAll("ぢ", "ヂ")
		  result = result.ReplaceAll("づ", "ヅ")
		  result = result.ReplaceAll("で", "デ")
		  result = result.ReplaceAll("ど", "ド")
		  result = result.ReplaceAll("ば", "バ")
		  result = result.ReplaceAll("び", "ビ")
		  result = result.ReplaceAll("ぶ", "ブ")
		  result = result.ReplaceAll("べ", "ベ")
		  result = result.ReplaceAll("ぼ", "ボ")
		  result = result.ReplaceAll("ぱ", "パ")
		  result = result.ReplaceAll("ぴ", "ピ")
		  result = result.ReplaceAll("ぷ", "プ")
		  result = result.ReplaceAll("ぺ", "ペ")
		  result = result.ReplaceAll("ぽ", "ポ")
		  result = result.ReplaceAll("ぁ", "ァ")
		  result = result.ReplaceAll("ぃ", "ィ")
		  result = result.ReplaceAll("ぅ", "ゥ")
		  result = result.ReplaceAll("ぇ", "ェ")
		  result = result.ReplaceAll("ぉ", "ォ")
		  result = result.ReplaceAll("ゃ", "ャ")
		  result = result.ReplaceAll("ゅ", "ュ")
		  result = result.ReplaceAll("ょ", "ョ")
		  result = result.ReplaceAll("っ", "ッ")
		  result = result.ReplaceAll("Ａ", "A")
		  result = result.ReplaceAll("Ｂ", "B")
		  result = result.ReplaceAll("Ｃ", "C")
		  result = result.ReplaceAll("Ｄ", "D")
		  result = result.ReplaceAll("Ｅ", "E")
		  result = result.ReplaceAll("Ｆ", "F")
		  result = result.ReplaceAll("Ｇ", "G")
		  result = result.ReplaceAll("Ｈ", "H")
		  result = result.ReplaceAll("Ｉ", "I")
		  result = result.ReplaceAll("Ｊ", "J")
		  result = result.ReplaceAll("Ｋ", "K")
		  result = result.ReplaceAll("Ｌ", "L")
		  result = result.ReplaceAll("Ｍ", "M")
		  result = result.ReplaceAll("Ｎ", "N")
		  result = result.ReplaceAll("Ｏ", "O")
		  result = result.ReplaceAll("Ｐ", "P")
		  result = result.ReplaceAll("Ｑ", "Q")
		  result = result.ReplaceAll("Ｒ", "R")
		  result = result.ReplaceAll("Ｓ", "S")
		  result = result.ReplaceAll("Ｔ", "T")
		  result = result.ReplaceAll("Ｕ", "U")
		  result = result.ReplaceAll("Ｖ", "V")
		  result = result.ReplaceAll("Ｗ", "W")
		  result = result.ReplaceAll("Ｘ", "X")
		  result = result.ReplaceAll("Ｙ", "Y")
		  result = result.ReplaceAll("Ｚ", "Z")
		  result = result.ReplaceAll("ａ", "a")
		  result = result.ReplaceAll("ｂ", "b")
		  result = result.ReplaceAll("ｃ", "c")
		  result = result.ReplaceAll("ｄ", "d")
		  result = result.ReplaceAll("ｅ", "e")
		  result = result.ReplaceAll("ｆ", "f")
		  result = result.ReplaceAll("ｇ", "g")
		  result = result.ReplaceAll("ｈ", "h")
		  result = result.ReplaceAll("ｉ", "i")
		  result = result.ReplaceAll("ｊ", "j")
		  result = result.ReplaceAll("ｋ", "k")
		  result = result.ReplaceAll("ｌ", "l")
		  result = result.ReplaceAll("ｍ", "m")
		  result = result.ReplaceAll("ｎ", "n")
		  result = result.ReplaceAll("ｏ", "o")
		  result = result.ReplaceAll("ｐ", "p")
		  result = result.ReplaceAll("ｑ", "q")
		  result = result.ReplaceAll("ｒ", "r")
		  result = result.ReplaceAll("ｓ", "s")
		  result = result.ReplaceAll("ｔ", "t")
		  result = result.ReplaceAll("ｕ", "u")
		  result = result.ReplaceAll("ｖ", "v")
		  result = result.ReplaceAll("ｗ", "w")
		  result = result.ReplaceAll("ｘ", "x")
		  result = result.ReplaceAll("ｙ", "y")
		  result = result.ReplaceAll("ｚ", "z")
		  result = result.ReplaceAll("＋", "+")
		  result = result.ReplaceAll("－", "-")
		  result = result.ReplaceAll("／", "/")
		  result = result.ReplaceAll("＊", "*")
		  result = result.ReplaceAll("＝", "=")
		  result = result.ReplaceAll("＿", "_")
		  result = result.ReplaceAll("（", "(")
		  result = result.ReplaceAll("）", ")")
		  result = result.ReplaceAll("［", "[")
		  result = result.ReplaceAll("］", "]")
		  result = result.ReplaceAll("｛", "{")
		  result = result.ReplaceAll("｝", "}")
		  result = result.ReplaceAll("＜", "<")
		  result = result.ReplaceAll("＞", ">")
		  result = result.ReplaceAll("＿", "_")
		  result = result.ReplaceAll("＃", "#")
		  result = result.ReplaceAll("＄", "$")
		  result = result.ReplaceAll("％", "%")
		  result = result.ReplaceAll("＆", "&")
		  //result = result.ReplaceAll("”", """) // fmm...
		  result = result.ReplaceAll("’", "'")
		  result = result.ReplaceAll("‘", "`")
		  result = result.ReplaceAll("＠", "@")
		  result = result.ReplaceAll(";", ";")
		  result = result.ReplaceAll(":", ":")
		  result = result.ReplaceAll(",", ",")
		  result = result.ReplaceAll(".", ".")
		  result = result.ReplaceAll("？", "?")
		  result = result.ReplaceAll("！", "!")
		  result = result.ReplaceAll("｜", "|")
		  result = result.ReplaceAll("＾", "^")
		  return result
		  
		End Function
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得XP検査()
		  
		  var id,sql as String
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT XP検査ID,DATE_FORMAT(XP検査日, '    %Y/%m/%d') AS XP検査日,フィルムNO,判定,判読 FROM XP検査,T_XP判定コード where 学生番号 = '"+id+"' AND XP検査.判読コード=T_XP判定コード.判読コード order by  XP検査日 desc;"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  WebPage1.ListboxXP検査.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      
		      WebPage1.ListboxXP検査.AddRow(  row.column("XP検査ID").StringValue, row.column("XP検査日").StringValue,row.column("フィルムNO").StringValue,row.column("判定").StringValue,row.column("判読").StringValue)
		      
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得医師受診()
		  
		  var id,sql as String
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT 医師受診ID,DATE_FORMAT(医師受診日, '%Y/%m/%d') AS 医師受診日,診察所見,診察医師名,所見分類"_
		    +", CASE 精査要否 WHEN 1 THEN '要' ELSE '' END AS 精査要否 "_
		    +" FROM 医師受診 where 学生番号 = '"+id+"' order by 医師受診日 desc"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  WebPage1.Listbox医師受診.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      
		      WebPage1.Listbox医師受診.AddRow( row.column("医師受診ID").StringValue, row.column("医師受診日").StringValue,_
		      row.column("診察医師名").StringValue,_
		      row.column("診察所見").StringValue,_
		      row.column("精査要否").StringValue)
		      
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得尿検査()
		  
		  var id,sql as String
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT 尿検査ID,DATE_FORMAT(尿検査日, '%Y/%m/%d') AS 尿検査日,ph,蛋白,潜血,糖,ウロビリ,早朝尿"_
		    +", CASE 生理有無 WHEN 1 THEN '生理' ELSE '' END AS 生理有無 "_
		    +", CASE 尿再検 WHEN 1 THEN '再検' ELSE '' END AS 尿再検 "_
		    +" FROM 尿検査 WHERE 学生番号 = '"+id+"' AND 年度取得(尿検査日)=年度取得(NOW()) ORDER BY 尿検査日 DESC"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  Webpage1.Listbox尿検査.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      WebPage1.Listbox尿検査.AddRow( row.column("尿検査ID").StringValue,  row.column("尿検査日").StringValue _
		      ,row.column("ph").StringValue _
		      ,尿デコード(row.column("蛋白").StringValue) _
		      ,尿デコード(row.column("潜血").StringValue) _
		      ,尿デコード(row.column("糖").StringValue) _
		      ,尿デコード(row.column("ウロビリ").StringValue) _
		      ,尿デコード(row.column("生理有無").StringValue) _
		      ,尿デコード(row.column("早朝尿").StringValue) _
		      ,尿デコード(row.column("尿再検").StringValue))
		      if 1<val(row.column("蛋白").StringValue) then
		        WebPage1.ListBox尿検査.CellStyle(WebPage1.ListBox尿検査.LastIndex,3) = WebStyleTextRed
		      end
		      if 1<val(row.column("潜血").StringValue) then
		        WebPage1.ListBox尿検査.CellStyle(WebPage1.ListBox尿検査.LastIndex,4) = WebStyleTextRed
		      end
		      if 0<val(row.column("糖").StringValue) then
		        WebPage1.ListBox尿検査.CellStyle(WebPage1.ListBox尿検査.LastIndex,5) = WebStyleTextRed
		      end
		      if 2<val(row.column("ウロビリ").StringValue) then
		        WebPage1.ListBox尿検査.CellStyle(WebPage1.ListBox尿検査.LastIndex,6) = WebStyleTextRed
		      end
		      
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得既往歴()
		  
		  var id,sql as String
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT 既往歴ID,年度,発症年齢,既往病名 FROM 既往歴 where 学生番号 like '"+id+"%' order by  既往歴ID desc"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  WebPage1.Listbox既往歴.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      
		      WebPage1.Listbox既往歴.AddRow(  row.column("既往歴ID").StringValue,row.column("年度").StringValue,row.column("発症年齢").StringValue,row.column("既往病名").StringValue)
		      
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得生理検査()
		  
		  var id,sql as String
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT 生理検査ID, DATE_FORMAT(生理検査日, '%Y/%m/%d') AS 生理検査日,右視力1,左視力1,矯正1,右視力2,左視力2,矯正2,色覚,右聴力,左聴力"_
		    +" FROM 生理検査 where 学生番号 = '"+id+"' order by  生理検査日 desc"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  WebPage1.Listbox生理検査.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      
		      WebPage1.Listbox生理検査.AddRow(  row.column("生理検査ID").StringValue,row.column("生理検査日").StringValue,_
		      row.column("右視力1").StringValue,_
		      row.column("左視力1").StringValue,_
		      row.column("矯正1").StringValue,_
		      row.column("右視力2").StringValue,_
		      row.column("左視力2").StringValue,_
		      row.column("矯正2").StringValue,_
		      row.column("色覚").StringValue,_
		      row.column("右聴力").StringValue,_
		      row.column("左聴力").StringValue)
		      
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得血圧()
		  
		  var id,sql,血圧 as String
		  var 最高,最低 as integer
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT 血圧ID, DATE_FORMAT(血圧日, '%Y/%m/%d') AS 血圧日,最高,最低,脈拍,"_
		    +" CASE 血圧再検 WHEN 1 THEN '再検' ELSE '' END AS 血圧再検 "_
		    +" FROM 血圧 where 学生番号 = '"+id+"' order by  血圧日 desc"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  WebPage1.Listbox血圧.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      血圧=row.column("最高").StringValue+"/"+row.column("最低").StringValue
		      最高=val(row.column("最高").StringValue)
		      最低=val(row.column("最低").StringValue)
		      if (最高>=140 or 最低 >= 90 ) then
		        血圧 = 血圧 + " H"
		        WebPage1.Listbox血圧.AddRow(  row.column("血圧ID").StringValue, row.column("血圧日").StringValue,血圧,row.column("脈拍").StringValue,row.column("血圧再検").StringValue)
		        WebPage1.ListBox血圧.CellStyle(WebPage1.ListBox血圧.LastIndex,2) = WebStyleTextRed
		        
		      else
		        WebPage1.Listbox血圧.AddRow(  row.column("血圧ID").StringValue,row.column("血圧日").StringValue,血圧,row.column("脈拍").StringValue,row.column("血圧再検").StringValue)
		      end
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Sub 取得身長体重()
		  
		  var id,sql as String
		  var rs as RowSet
		  id = WebPage1.writeField.text
		  
		  try
		    sql = "SELECT 身長体重ID, DATE_FORMAT(身長体重日, '%Y/%m/%d') AS 身長体重日,身長,体重,BMI FROM 身長体重 where 学生番号 = '"+id+"' order by  身長体重日 desc"
		    rs =app.db.SelectSQL(sql)
		    
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		  WebPage1.Listbox身長体重.DeleteAllRows
		  
		  try
		    for each row as databaserow in rs
		      
		      WebPage1.Listbox身長体重.AddRow(  row.column("身長体重ID").StringValue,row.column("身長体重日").StringValue,row.column("身長").StringValue,row.column("体重").StringValue,row.column("BMI").StringValue)
		      
		    next
		  Catch e as DatabaseException
		    messagebox e.Message
		  end try
		End Sub
	#tag EndMethod

	#tag Method, Flags = &h0
		Function 尿エンコード(尿表現 as string) As String
		  Var result As String
		  if "－" = 尿表現  then
		    return "0"
		  elseif "±" = 尿表現  then 
		    return "1"
		  elseif "＋" = 尿表現  then 
		    return "2"
		  elseif "２＋" = 尿表現  then 
		    return "3"
		  elseif "３＋" = 尿表現  then 
		    return "4"
		  elseif "４＋" = 尿表現  then 
		    return "5"
		  else 
		    return 尿表現
		  end if
		  
		End Function
	#tag EndMethod

	#tag Method, Flags = &h0
		Function 尿デコード(尿表現 as string) As String
		  Var result As String
		  if "0" = 尿表現  then
		    return "－"
		  elseif "1" = 尿表現  then 
		    return "±"
		  elseif "2" = 尿表現  then 
		    return "＋"
		  elseif "3" = 尿表現  then 
		    return "２＋"
		  elseif "4" = 尿表現  then 
		    return "３＋"
		  elseif "5" = 尿表現  then 
		    return "４＋"
		  else 
		    return 尿表現
		  end if
		  
		End Function
	#tag EndMethod


#tag EndWindowCode

#tag ViewBehavior
	#tag ViewProperty
		Name="Cursor"
		Visible=true
		Group="Behavior"
		InitialValue="0"
		Type="Integer"
		EditorType="Enum"
		#tag EnumValues
			"0 - Automatic"
			"1 - Standard Pointer"
			"2 - Finger Pointer"
			"3 - IBeam"
			"4 - Wait"
			"5 - Help"
			"6 - Arrow All Directions"
			"7 - Arrow North"
			"8 - Arrow South"
			"9 - Arrow East"
			"10 - Arrow West"
			"11 - Arrow Northeast"
			"12 - Arrow Northwest"
			"13 - Arrow Southeast"
			"14 - Arrow Southwest"
			"15 - Splitter East West"
			"16 - Splitter North South"
			"17 - Progress"
			"18 - No Drop"
			"19 - Not Allowed"
			"20 - Vertical IBeam"
			"21 - Crosshair"
		#tag EndEnumValues
	#tag EndViewProperty
	#tag ViewProperty
		Name="Enabled"
		Visible=false
		Group="Behavior"
		InitialValue="True"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Height"
		Visible=true
		Group="Position"
		InitialValue="400"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="HelpTag"
		Visible=true
		Group="Behavior"
		InitialValue=""
		Type="String"
		EditorType="MultiLineEditor"
	#tag EndViewProperty
	#tag ViewProperty
		Name="HorizontalCenter"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Index"
		Visible=false
		Group="ID"
		InitialValue="-2147483648 "
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="IsImplicitInstance"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Left"
		Visible=false
		Group="Position"
		InitialValue="0"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="LockBottom"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="LockHorizontal"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="LockLeft"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="LockRight"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="LockTop"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="LockVertical"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="MinHeight"
		Visible=true
		Group="Behavior"
		InitialValue="400"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="MinWidth"
		Visible=true
		Group="Behavior"
		InitialValue="600"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Name"
		Visible=true
		Group="ID"
		InitialValue=""
		Type="String"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Super"
		Visible=true
		Group="ID"
		InitialValue=""
		Type="String"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="TabOrder"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Title"
		Visible=true
		Group="Behavior"
		InitialValue="Untitled"
		Type="String"
		EditorType="MultiLineEditor"
	#tag EndViewProperty
	#tag ViewProperty
		Name="Top"
		Visible=false
		Group="Position"
		InitialValue="0"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="VerticalCenter"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Visible"
		Visible=false
		Group="Behavior"
		InitialValue="True"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="Width"
		Visible=true
		Group="Position"
		InitialValue="600"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="ZIndex"
		Visible=false
		Group="Behavior"
		InitialValue="1"
		Type="Integer"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_DeclareLineRendered"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_HorizontalPercent"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Double"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_ImplicitInstance"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_IsEmbedded"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_Locked"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_NeedsRendering"
		Visible=false
		Group="Behavior"
		InitialValue="True"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_OfficialControl"
		Visible=false
		Group="Behavior"
		InitialValue="False"
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_OpenEventFired"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_ShownEventFired"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Boolean"
		EditorType=""
	#tag EndViewProperty
	#tag ViewProperty
		Name="_VerticalPercent"
		Visible=false
		Group="Behavior"
		InitialValue=""
		Type="Double"
		EditorType=""
	#tag EndViewProperty
#tag EndViewBehavior
