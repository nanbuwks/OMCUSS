<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php
$tablename="事後指導";
$nendo= $_POST["nendo"];
echo "<H1>";
echo $nendo;
echo "</H1>";
exec("python3 ./export.py ". $nendo);
?>
<HR>
<H2>ダウンロードされない場合は以下をクリックしてください</H2>
<a href="<?php  echo ($tablename);echo $nendo; ?>.csv"><?php echo ($tablename); echo $nendo; ?>.csv</a>
<HR>
<FORM ACTION=export.php>
<INPUT TYPE="SUBMIT" VALUE="戻る">
</FORM>
<iframe src="<?php echo ($tablename);echo($nendo); ?>.csv" name="sample" width="10" height="10"> </iframe>
</BODY></HTML>
~                      

