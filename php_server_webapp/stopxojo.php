<!DOCTYPE html>
<HTML>
<HEAD>
<META CHARSET="UTF-8">
</HEAD>
<BODY>
<PRE>
<?php 
passthru("pkill -KILL -f xojoweb"); 
 // "/home/nanbuwks/xojoweb/startxojoweb.sh"
?>
</PRE>
<H1>XOJOサーバを停止しました</H1>
<FORM ACTION=<?php echo $_SERVER['HTTP_REFERER']; ?>>
<INPUT TYPE=SUBMIT VALUE=戻る>
</FORM>
</BODY>
</HTML>

