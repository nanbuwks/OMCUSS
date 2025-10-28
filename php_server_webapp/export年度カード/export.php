<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php

$templatename= $_GET["use"];
echo "<H1>";
echo "テーブルエクスポート";
echo "</H1>";


?>
<HR>
<FORM METHOD="POST" ACTION="export2.php">
  <select name="プロシージャ">
    <option value="年度まとめ">年度まとめ</option>
    <option value="健康診断自動発行用データ作成">健康診断自動発行用データ作成</option>
  </SELECT>
  <select name="年度">

<?php
     $最古年度=2012;
     $現在年度=intval(date('Y', strtotime('-3 month'))); // 4月1日で切り替わり
     for ($i = $現在年度; $i>=$最古年度; $i--){
	     echo ("<option value=".$i.">".$i."</option>");
     }
?>
  </SELECT>
  <INPUT TYPE="submit" VALUE="エクスポート">
</FORM>

数分お待ちください

</BODY></HTML>
