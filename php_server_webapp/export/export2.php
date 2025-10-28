<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php

$tablename= $_POST["table"];
echo "<H1>";
echo $tablename;
echo "</H1>";
exec("python3 ./export.py ". $tablename);
?>
<HR>
<H2>ダウンロードされない場合は以下をクリックしてください</H2>
<a href="<?php echo $tablename; ?>.csv"><?php echo $tablename; ?>.csv</a>
<HR>
<FORM ACTION=export.php>
<INPUT TYPE="SUBMIT" VALUE="戻る">
</FORM>
<iframe src="<?php echo ($tablename); ?>.csv" name="sample" width="10" height="10"> </iframe>
</BODY></HTML>
