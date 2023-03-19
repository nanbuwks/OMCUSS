<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>>
<INPUT TYPE=SUBMIT VALUE=メニュー>
</FORM>
<FORM ACTION=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>/restartxojo.php>
<INPUT TYPE=SUBMIT VALUE=XOJOサーバ再起動>
</FORM>
<HR>
<UL>
<LI>XP受付、血液受付、尿外注については日付設定および通し番号の設定を RaspberryPi 画面で行ってください
<LI><A HREF=http://<?php echo $_SERVER[ 'SERVER_ADDR' ]; ?>:8084>内科受付</A>について医師が追加となる場合は医師名を手入力のうえダミーデータを登録してください
</UL>



</BODY>
</HTML>

