<?php
header('Content-Type: application/pdf');

$templatename= $_GET["use"];
$key= $_GET["key"];
exec("./mkpreview.sh ". $templatename."テンプレート.ods ".$key);

$filepath = $templatename."テンプレート.ods.pdf";
$filename = $templatename."テンプレート.ods.pdf";
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filepath));
readfile($filepath);

?>
