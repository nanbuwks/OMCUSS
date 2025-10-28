<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>measure</title>
</head>
<body>
<?php
ini_set('display_errors', "On");

$param = array();

foreach($_GET as $key => $value) {

//	echo $key,$value;
//		echo "<p>";
	if ( 0 == strcmp("TABLE",$key)){
		$TABLE=$value;
	} elseif  ( 0 == strcmp("学生番号",$key)){
		$番号=$value;
	} elseif  ( 0 == strcmp("TODAYFIELD",$key)){
		$TODAYFIELD=$value;
	} else {
           	$param[$key]=$value;
	}
}
// フィールドリストを作ります
$datalist="";
foreach($param as $key => $value) {
  $datalist=$datalist.$key.",";
}
echo $datalist;
echo "<p>";
$FIELDLIST=trim($datalist,",");

// UPDATE用データ列を作ります
$datalist="";
foreach($param as $key => $value) {
  $datalist=$datalist.$key."='".$value."',";
}
echo $datalist;
echo "<p>";
$UPDATELIST=trim($datalist,",");

// INSERT用データ列を作ります
$datalist="";
foreach($param as $key => $value) {
  $datalist=$datalist."'".$value."',";
}
echo $datalist;
echo "<p>";
$INSERTLIST=trim($datalist,",");

$link = mysqli_connect('127.0.0.1', 'webdb', 'password', 'test');

// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
} else {
#    echo "データベースの接続に成功しました。\n";
}

$query = "SELECT COUNT(*) AS num FROM ".$TABLE." WHERE 学生番号='".$番号."' and ".$TODAYFIELD."=curdate();";
echo $query;
echo "<p>";
// クエリを実行します。
if ($result = mysqli_query($link, $query)) {
  $row=mysqli_fetch_assoc($result);
  var_dump( $row);
echo "<p>";
  if ( 0 ==  intval($row["num"]))
  {
    $query = "INSERT INTO ".$TABLE." (学生番号,".$TODAYFIELD.",".$FIELDLIST.") VALUES ( '".$番号."', curdate(),".$INSERTLIST.");";
    echo $query;
echo "<p>";
    $result = mysqli_query($link, $query);
  } else {
    $query = "UPDATE ".$TABLE." SET ".$UPDATELIST." WHERE 学生番号='".$番号."' and ".$TODAYFIELD."=curdate();";
    echo $query;
echo "<p>";
    $result = mysqli_query($link, $query);
  }
  $query = "SELECT 学生番号,".$TODAYFIELD.",".$FIELDLIST." FROM ".$TABLE." where 学生番号='".$番号."' and ".$TODAYFIELD."=curdate();";
echo $query;
echo "<p>";
  if ($result = mysqli_query($link, $query)) {
  echo "<pre>";
  foreach ($result as $row) {
        var_dump($row);
  }
	echo "</pre>";
  }
}

// 接続を閉じます
mysqli_close($link);

?>
ok
</body>
</html>

