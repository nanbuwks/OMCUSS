<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php

$templatename= $_GET["use"];
echo "<H1>";
echo "リストアファイルアップロード";
echo "</H1>";

?>

<FORM ACTION="uploadrestorefile2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
<input type="hidden" name="use" value="<?php echo $templatename; ?>" />
<input type="hidden" name="key" value="<?php echo $key; ?>" />
<input type="file" name="uploadfile">
<input type="submit" value="アップロード">
</FORM>

<FORM ACTION="index.php" method="post">
<input type="submit" value="戻る">
</FORM>

</BODY></HTML>
