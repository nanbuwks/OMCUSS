<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php

$プロシージャ= $_POST["プロシージャ"];
$年度= $_POST["年度"];
$出力日時 = date('YmdHis');
echo "<H1>";
echo $プロシージャ,":",$年度;
echo "</H1>";
 exec("python3 ./export.py ". $プロシージャ." " .$年度." ".$出力日時);
 echo("python3 ./export.py ". $プロシージャ." " .$年度." ".$出力日時);
?>
<HR>
<H2>ダウンロードされない場合は以下をクリックしてください</H2>
<a href="<?php echo $プロシージャ . $年度. "_".$出力日時; ?>.csv"><?php echo  $プロシージャ . $年度."_".$出力日時; ?>.csv</a>
<HR>
<FORM ACTION=export.php>
<INPUT TYPE="SUBMIT" VALUE="戻る">
</FORM>
<iframe src="<?php echo ($nendo); ?>.csv" name="sample" width="10" height="10"> </iframe>
</BODY></HTML>
