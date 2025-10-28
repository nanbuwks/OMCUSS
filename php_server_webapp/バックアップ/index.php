<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
<link href="design.css" rel="stylesheet">
</HEAD>
<BODY>
<H1>バックアップ</H1>
<FORM ACTION=/indexserver.php>
<INPUT TYPE=SUBMIT VALUE=サーバメニューへ>
</FORM>
<HR>
<FORM ACTION=phpappbackup.php>
<INPUT TYPE=SUBMIT VALUE=サーバプログラム(phpapp)バックアップ>
</FORM>
<FORM ACTION=xojoappbackup.php>
<INPUT TYPE=SUBMIT VALUE=XOJOプログラムバックアップ>
</FORM>
<HR>
<FORM ACTION=databasefullbackup.php>
<INPUT TYPE=SUBMIT VALUE=データベースバックアップ>
</FORM>
<FORM ACTION=databasetablebackup.php>
<INPUT TYPE=SUBMIT VALUE=データベース全テーブルバックアップ>
</FORM>
<FORM ACTION=databaseroutinebackup.php>
<INPUT TYPE=SUBMIT VALUE=データベースストアドバックアップ>
</FORM>
<HR>
<FORM ACTION=backupfile>
<INPUT TYPE=SUBMIT VALUE=バックアップファイルダウンロード>
</FORM>
<HR>
<FORM ACTION=../stopxojo.php>
<INPUT TYPE=SUBMIT VALUE=XOJOサーバ停止>
</FORM>
<FORM ACTION=../restartxojo.php>
<INPUT TYPE=SUBMIT VALUE=XOJOサーバ再起動>
</FORM>
<HR>
<FORM ACTION=phpmyadmin>
<INPUT TYPE=SUBMIT VALUE=phpmyadmin>
</FORM>
</BODY>
</HTML>

