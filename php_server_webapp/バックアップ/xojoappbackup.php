<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<H1>XOJOプログラム バックアップ</H1>

<PRE>
<?php 
$HOSTNAME = gethostname();
$DATABASENAME = "test";
$DATESTR=date('YmdHis');
$FILENAME=$DATESTR."xojo".$HOSTNAME.$DATABASENAME."backup.dump";
$CMDSTR="zip backupfile/".$FILENAME." -r /home/nanbuwks/xojoweb";

echo "バックアップを実行しましす。数分お待ちください\n";
echo $CMDSTR;
echo "\n";
passthru($CMDSTR); 
 // "/home/nanbuwks/xojoweb/startxojoweb.sh"
echo "バックアップを実行しました\n";
echo $FILENAME."で保存しました\n";
?>
</PRE>
<FORM ACTION=index.php>
<INPUT TYPE=SUBMIT VALUE=戻る>
</FORM>
</BODY>
</HTML>

