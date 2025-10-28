<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<H1>サーバプログラム(phpapp) リストア</H1>

<PRE>
<?php 

$FILENAME= $_GET["FILENAME"];

$HOSTNAME = gethostname();
$DATABASENAME = "test";
$DATESTR=date('YmdHis');
$BACKUPNAME="/var/www/html".$DATESTR."phpapp".$HOSTNAME;
$CMDSTR1="mv /var/www/html ".$BACKUPNAME;
$CMDSTR2="tar xzvf ".$BACKUPNAME."/リストア/restorefile/".$FILENAME." -C /var/www";

echo "リストアを実行しましす。数分お待ちください\n";
echo $CMDSTR1;
echo "\n";
passthru($CMDSTR1); 
echo "\n";
echo $CMDSTR2;
echo "\n";
passthru($CMDSTR2); 
 // "/home/nanbuwks/xojoweb/startxojoweb.sh"
echo "リストアを実行しました\n";
echo "旧システムを".$BACKUPNAME."で保存しました\n";
?>
</PRE>
<FORM ACTION=index.php>
<INPUT TYPE=SUBMIT VALUE=戻る>
</FORM>
</BODY>
</HTML>

