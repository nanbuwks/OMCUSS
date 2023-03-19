<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<PRE>
<?php 
passthru("pkill -KILL -f xojoweb"); 
passthru("/home/nanbuwks/xojoweb/startxojoweb.sh");
?>
</PRE>
<H1>XOJOサーバを再起動しました</H1>
<FORM ACTION=indexserver.php>
<INPUT TYPE=SUBMIT VALUE=戻る>
</FORM>
</BODY>
</HTML>

