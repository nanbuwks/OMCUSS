<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php

$templatename= $_GET["use"];
echo "<H1>";
echo $templatename;
echo "</H1>";

echo "<hr>";
$key= $_GET["key"];
echo "<hr>";
exec("./mkpdf.sh ". $templatename."テンプレート.ods ".$key);



$link = mysqli_connect('localhost', 'webdb', 'password', 'test');

if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}
$query = "CALL 個人データ('".$key."');";

if ($result = mysqli_query($link, $query)) {
    foreach ($result as $row) {
	    echo ($row["漢字氏名"]);
	    echo ("(");
        echo ($row["フリガナ"]);
	    echo (") 生年月日 ");
        echo ($row["生年月日"]);
	    echo ("   性別：");
        echo ($row["性別"]);
    }
}

// 接続を閉じます
mysqli_close($link);

?>
<HR>
<iframe src="<?php echo ($templatename); ?>テンプレート.ods.pdf" name="sample" width="100%" height="700">
</iframe>
<HR>
<H2>仮編集のためのダウンロード</H2>
編集してから印刷する場合はこちらを使用してください。
<FORM ACTION=<?php echo $templatename."テンプレート.ods.仮編集.ods"; ?>>
<INPUT TYPE="SUBMIT" VALUE="LibreOfficeファイル">
</FORM>



<HR>
<H2>テンプレート管理</H2>
<FORM ACTION=<?php echo $templatename."テンプレート.ods"; ?>>
<INPUT TYPE="SUBMIT" VALUE="ダウンロード">
</FORM>

<FORM ACTION="up.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
<input type="hidden" name="use" value="<?php echo $templatename; ?>" />
<input type="hidden" name="key" value="<?php echo $key; ?>" />
<input type="file" name="uploadfile">
<input type="submit" value="アップロード">
</FORM>


</BODY></HTML>
