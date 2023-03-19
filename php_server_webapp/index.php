<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
<link href="design.css" rel="stylesheet">
</HEAD>
<BODY>
<H1>一般メニュー</H1>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8081>
<INPUT TYPE=SUBMIT VALUE=旧メニュー>
</FORM>
<FORM ACTION=indexserver.php>
<INPUT TYPE=SUBMIT VALUE=サーバーメニュー>
</FORM>
<FORM ACTION=indexdaily.php>
<INPUT TYPE=SUBMIT VALUE=日次作業>
</FORM>
<HR>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8082>
<INPUT TYPE=SUBMIT VALUE=健康診断証明書発行>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8083>
<INPUT TYPE=SUBMIT VALUE=最終チェック>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8084>
<INPUT TYPE=SUBMIT VALUE=内科診察>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8086>
<INPUT TYPE=SUBMIT VALUE=こころの相談カルテ>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8088>
<INPUT TYPE=SUBMIT VALUE=問診票>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8089>
<INPUT TYPE=SUBMIT VALUE=総合判定>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8090>
<INPUT TYPE=SUBMIT VALUE=ECG検査>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8091>
<INPUT TYPE=SUBMIT VALUE=ダッシュボード(閲覧用)>
</FORM>
<FORM ACTION="http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8091" METHOD="GET">
<INPUT TYPE=HIDDEN NAME="user"  VALUE="Admin">
<INPUT TYPE=SUBMIT VALUE=ダッシュボード(管理用)>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8092>
<INPUT TYPE=SUBMIT VALUE=紹介状>
</FORM>
<HR>
<FORM ACTION=http://192.168.162.139:8065>
<INPUT TYPE=SUBMIT VALUE=Mattermost>
</FORM>
<FORM ACTION=export年度カード/export.php>
<INPUT TYPE=SUBMIT VALUE=カード型年度まとめ形式CSV出力>
</FORM>
<FORM ACTION=import/import.php>
<INPUT TYPE=SUBMIT VALUE=CSVファイルインポート>
</FORM>
<FORM ACTION=update/import.php>
<INPUT TYPE=SUBMIT VALUE=CSVファイルアップデート>
</FORM>
</div>
</BODY>
</HTML>

