<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php

$templatename= $_POST["use"];
$key= $_GET["key"];

echo "<H1>";
echo $templatename;
echo "リストアファイル登録";
echo "</H1>";

echo "<hr>";
$uploaddir = '/var/www/html/リストア/restorefile/';
$uploadfile = $uploaddir . $_FILES['uploadfile']['name'];
// system("rm ".$uploadfile);

echo '<pre>';
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
print  $uploadfile."として登録しました。";
} else {
print  $uploadfile."登録エラー\n";
echo 'Here is some more debugging info:';
print_r($_FILES);
}

print "</pre>";
echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';

?>

</BODY></HTML>
