<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<H1>サーバプログラム(phpapp) バックアップ</H1>

<PRE>
<?php 
$HOSTNAME = gethostname();
$DATABASENAME = "test";
$DATESTR=date('YmdHis');
$FILENAME=$DATESTR."phpapp".$HOSTNAME."backup.tgz";

$CMDSTR="tar --exclude \"バックアップ/backupfile/*\" -zcvf backupfile/".$FILENAME." ../../html";

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

