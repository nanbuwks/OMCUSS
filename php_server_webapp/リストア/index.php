<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
<link href="design.css" rel="stylesheet">
</HEAD>
<BODY>
<FORM ACTION=/indexserver.php>
<H1>リストア</H1>
<INPUT TYPE=SUBMIT VALUE=サーバメニュー>
</FORM>
<FORM ACTION=phpapprestore.php METHOD=GET>
リストアファイル名<INPUT TYPE=TEXT NAME=RESTOREFILENAME>
<INPUT TYPE=SUBMIT VALUE=サーバプログラム(phpapp)リストア>
</FORM>
<FORM ACTION=xojoapprestore.php METHOD=GET>
リストアファイル名<INPUT TYPE=TEXT NAME=RESTOREFILENAME>
<INPUT TYPE=SUBMIT VALUE=XOJOプログラムリストア>
</FORM>
<FORM ACTION=databasefullrestore.php METHOD=GET>
リストアファイル名<INPUT TYPE=TEXT NAME=RESTOREFILENAME>
<INPUT TYPE=SUBMIT VALUE=データベースリストア>
</FORM>
<FORM ACTION=databasetablerestore.php METHOD=GET>
リストアファイル名<INPUT TYPE=TEXT NAME=RESTOREFILENAME>
<INPUT TYPE=SUBMIT VALUE=データベース全テーブルリストア>
</FORM>
<FORM ACTION=databaseroutinerestore.php METHOD=GET>
リストアファイル名<INPUT TYPE=TEXT NAME=RESTOREFILENAME>
<INPUT TYPE=SUBMIT VALUE=データベースストアドリストア>
</FORM>
<FORM ACTION=uploadrestorefile.php>
<INPUT TYPE=SUBMIT VALUE=リストアファイルアップロード>
</FORM>
<FORM ACTION=restorefile>
<INPUT TYPE=SUBMIT VALUE=リストアファイル確認>
</FORM>
<FORM ACTION=../stopxojo.php>
<INPUT TYPE=SUBMIT VALUE=XOJOサーバ停止>
</FORM>
<FORM ACTION=../restartxojo.php>
<INPUT TYPE=SUBMIT VALUE=XOJOサーバ再起動>
</FORM>
<FORM ACTION=phpmyadmin>
<INPUT TYPE=SUBMIT VALUE=phpmyadmin>
</FORM>
</BODY>
</HTML>

