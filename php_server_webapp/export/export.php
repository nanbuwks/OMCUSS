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
  <select name="table">
    <option value="身長体重">身長体重</option>
    <option value="XP検査">XP検査</option>
    <option value="個人データ">個人データ</option>
    <option value="医師受診">医師受診</option>
    <option value="問診票">問診票</option>
    <option value="尿検査">尿検査</option>
    <option value="血圧">血圧</option>
    <option value="総合判定">総合判定</option>
    <option value="既往歴">既往歴</option>
    <option value="所属">所属</option>
    <option value="学生区分">学生区分</option>
    <option value="紹介状内容">紹介状内容</option>
    <option value="HBs抗体">HBs抗体</option>
    <option value="抗体価">抗体価</option>
  </SELECT>
  <INPUT TYPE="submit" VALUE="エクスポート">
</FORM>



</BODY></HTML>
