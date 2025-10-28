<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css"></HEAD><BODY>
<?php


// 対応テーブルの増やしかた
//
// import.php の select option を増やす
// <テーブル名>元データ というテーブルを作る
// <テーブル名>変更データ というテーブルを作る
// KEYをNULL値OKに変更し、AUTO_INCREMENTおよびキーを外すDROP INDEX PRIMARY ON 血圧追加データ;
// procedure <テーブル名>アップデート を作成しておく;


$templatename= $_GET["use"];
echo "<H1>";
echo "CSVファイルアップデート";
echo "</H1>";

?>
UTF-8形式のCSVファイルを選択してください。
<HR>
<form action="import2.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fname">
  インポート先テーブル
  <select name="table">
    <option value="抗体価">抗体価</option>
  </SELECT>
  <INPUT TYPE="submit" VALUE="次へ">
</FORM>
1行1秒程度の時間がかかります。
<hr>

<FORM ACTION="backup" method="POST">
  <INPUT TYPE="submit" VALUE="過去のアップデート時のバックアップを確認する">
</FORM>
<FORM ACTION="../" method="POST">
  <INPUT TYPE="submit" VALUE="メニューに戻る">
</FORM>

</BODY></HTML>
