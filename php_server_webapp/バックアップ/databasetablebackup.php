<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<H1>DATABASE table バックアップ</H1>

<PRE>
<?php 
$HOSTNAME = gethostname();
$DATESTR=date('YmdHis');
$FILENAME=$DATESTR."mysql".$HOSTNAME.$DATABASENAME."tablebackup.gz";
$JSONFILENAME = "../dbaccess.json";
$JSON = json_decode(file_get_contents($JSONFILENAME));
$DBNAME = $JSON->database;
$DBPASSWORD = $JSON->password;
$DBUSER = $JSON->user;
$DBHOST = $JSON->host;
$CMDSTR="mysqldump -u ".$DBUSER." -p".$DBPASSWORD." -h ".$DBHOST." ".$DBNAME." | gzip > ../バックアップ/backupfile/".$FILENAME;
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


