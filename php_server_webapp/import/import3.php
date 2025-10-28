<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css?<?php echo date('YmdHis'); ?>" type="text/css">
</HEAD><BODY>
<?php

$dsn = 'mysql:dbname=test;host=localhost';
$dbname = 'test';
$dbuser = "webdb";
$dbpass = "password";
$tablename= $_POST["table"];
echo "<H1>[$tablename]インポート</H1>";
// exec("python3 ./eyyxport.py ". $tablename);
 ?>
<FORM ACTION=import.php>
<INPUT TYPE="SUBMIT" VALUE="戻る">
</FORM>
<?php
$tempfile = $_FILES['fname']['tmp_name'];
$filename = './uploadedtempfile';

function selectTableShow($dbh,$tablename,$sql){

      $query=" show columns from ".$tablename;
      $stmt = $dbh->query($query);
      $stmt->execute();
  // カラム取得 
      // $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
      $count=0;
      $colName = array();
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // 配列 $colName にカラム名を格納
            $colName[$count++] = $row["Field"]; 
      }
      // カラム名表示
	  echo "<div class='sticky_table_wrapper12'>";
      echo "<table class='sticky_table'>\n";
      echo "\t<thead><tr><th></th>\n";
      foreach ( $colName as $key => $value ){      
            echo "\t\t<th>{$value}</th>\n";
      }
      echo "\t</tr></thead>\n";
      echo "\t<tbody>\n";      

      // SQL SELECT
      $query=$sql;
     // $query=" select * from ".$tablename;
     //   echo $query;echo "<p>";
      $stmt = $dbh->query($query);
      $stmt->execute();
      $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ( $result as $selectkey => $selectvalue ){      
        echo "\t<tr><th>"; echo $selectkey+1; echo"</th>\n";  // 行番号
        foreach ( $colName as $colkey => $colvalue ){      
          echo "\t\t<td>{$selectvalue[$colvalue]}</td>\n";
        }
        echo "\t</tr>\n";
      }
      echo "\t</tbody>\n";
      echo "</table></div>\n";
      echo $selectkey+1; echo " lines ";
}


try{
      $dbh = new PDO($dsn,$dbuser,$dbpass );

//------------------------------------------------------------------------------------ 
      echo ("<H2>追加分データ</H2>"); // インポートSQL発行し、追加データテーブルを表示
      selectTableShow($dbh,$tablename."追加データ","SELECT * FROM  ".$tablename."追加データ");
//----------------------------------------------------------------------------------- 
      if (isset($_POST['DOUBLECHECK'])) {
      // 追加データ table の内容が本 table に 重複しているかチェック 

        $query="SELECT ".$tablename.".".$tablename."日,".$tablename.".学生番号 FROM ".$tablename." INNER JOIN ".$tablename."追加データ  ON (".$tablename.".".$tablename."日=".$tablename."追加データ.".$tablename."日 AND ".$tablename.".学生番号=".$tablename."追加データ.学生番号)";
        echo ($query);
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        if ( 0 == count($rows) ) {
//------------------------------------------------------------------------------------ 
          // table バックアップ
          passthru("mysqldump -u ".$dbuser." -p".$dbpass." ".$dbname." ".$tablename." > backup/`date +%Y%m%d%H%M%S`".$tablename.".dump");
//----------------------------------------------------------------------------------- 
          // 追加データ table の内容を本 table に INSERT 
          $query="INSERT INTO ".$tablename." SELECT * FROM ".$tablename."追加データ";
	  echo "<p>";
	  echo $query;
	  $stmt = $dbh->query($query);
          echo ("<H2>取込完了しました</H2>"); // インポートSQL発行し、追加データテーブルを表示
//------------------------------------------------------------------------------------ 
          // 本 table 内容表示 
          selectTableShow($dbh,$tablename,"SELECT * FROM  ".$tablename);
        } else {
           echo ("<H2>同じ日のデータがあります</H2>");
          $query="SELECT * FROM ".$tablename." INNER JOIN ".$tablename."追加データ  ON (".$tablename.".".$tablename."日=".$tablename.".".$tablename."日 AND ".$tablename.".学生番号=".$tablename."追加データ.学生番号)";
          echo ($query);
          selectTableShow($dbh,$tablename,$query);
          echo ("取り込みを中止しました。データを確認し、やり直してください");
        }
     } else {
	// 重複チェックを行わない場合
//------------------------------------------------------------------------------------ 
          // table バックアップ
          passthru("mysqldump -u ".$dbuser." -p".$dbpass." ".$dbname." ".$tablename." > backup/`date +%Y%m%d%H%M%S`".$tablename.".dump");
//----------------------------------------------------------------------------------- 
          // 追加データ table の内容を本 table に INSERT 
          $query="INSERT INTO ".$tablename." SELECT * FROM ".$tablename."追加データ";
	  echo "<p>";
	  echo $query;
	  $stmt = $dbh->query($query);
          echo ("<H2>取込完了しました</H2>"); // インポートSQL発行し、追加データテーブルを表示
          // 本 table 内容表示 
          selectTableShow($dbh,$tablename,"SELECT * FROM  ".$tablename);
     }
} catch(PDOException $e) {
      print("データベースの接続に失敗しました".$e->getMessage());
      die();
}
$dbh = null;

?>
<HR>
<H2>問題のある場合は「インポートメニュー」から BACKUPをダウンロードしてください</H2>

<FORM ACTION=import.php>
<INPUT TYPE="SUBMIT" VALUE="インポートメニュー">
</FORM>
</BODY></HTML>
