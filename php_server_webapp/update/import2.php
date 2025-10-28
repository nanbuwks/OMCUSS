<!DOCTYPE HTML><HTML><HEAD><META CHARSET=UTF-8>
<TITLE></TITLE> <link rel="stylesheet" href="style.css?<?php echo date('YmdHis'); ?>" type="text/css">
</HEAD><BODY>
<?php
// インポートしたいテーブルにあわせて、変更データテーブルと元データテーブルが必要となる。
// ex, インポートしたいテーブル:「検査」とすると「検査変更データ」、「検査元データ」テーブルを用意
// 変更,元データテーブルはインポートしたいテーブルをコピーして作る。
// 変更,元データテーブルは主キーを削除しておくこと DROP INDEX `PRIMARY` ON TABLENAME;
// 変更,元データテーブルのIDはデフォルト
// NULLに設定しておくこと
$dsn = 'mysql:dbname=test;host=localhost';
$dbuser = "webdb";
$dbpass = "password";

$tablename= $_POST["table"];
echo "<H1>[$tablename]アップデート</H1>";
// exec("python3 ./eyyxport.py ". $tablename);
 ?>
<FORM ACTION=import.php>
以下の内容で問題が無いか確認してください。問題があれば戻ってファイルを選択し直してください。
<INPUT TYPE="SUBMIT" VALUE="戻る">
</FORM>
<?php

function selectTableShow($dbh,$tablename,$sql){

      $query=" show columns from ".$tablename;
      $stmt = $dbh->query($query);
      $stmt->execute();
  // カラム取得 
      // $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($result);
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
      $query=" select * from ".$tablename;
      //  echo $query;echo "<p>";
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


// csvを読み込んで項目名をキーにした連想配列をつくる
// from https://qiita.com/Terasan_Koshigaya/items/00ce0b114e527a572865
function csvToArray($csvPath){
  $csvArray = array();
  $firstFlg = true;
  $keys = array();
  $count = 0;
  $file = fopen($csvPath, 'r');

  while ($line = fgetcsv($file)) {
    if($firstFlg){
      for($i = 0; $i < count($line); $i++){
        array_push($keys,$line[$i]);
      }
      // var_dump($keys);
      $firstFlg = false;
    }else{
      for($i = 0; $i < count($line); $i++){
        $csvArray[$count][$keys[$i]] = $line[$i];
      }
      $count++;
    }
  }
  fclose($file);
  return $csvArray;
}
//--------------- 処理ここから ----------------------------------------------- 
$tempfile = $_FILES['fname']['tmp_name'];
$filename = './uploadedtempfile';
echo ("<H2>元ファイル</H2>");  // 元のファイル内容をPHPで読み込み表形式で表示する
if (is_uploaded_file($tempfile)) {
  if ( move_uploaded_file($tempfile , $filename."_BOM" )) {
    exec ( "nkf -w ".$filename."_BOM > ".$filename );
    // echo $filename . "をアップロードしました。";
    // echo ("<pre>"); passthru(" cat ". $filename); echo ("/<pre>");
    // csv 行数表示
    passthru("tail -n +2 ".$filename." | wc -l");
    echo (" lines");
    // csv 表表示
	if ( ( $handle = fopen ( $filename, "r" ) ) !== FALSE ) {
	  echo "<div class='sticky_table_wrapper6'>";
      echo "<table class='sticky_table'>\n";
      if  ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
        echo "\t<thead><tr><th></th>\n";
        for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t\t<th>{$data[$i]}</th>\n";
        }
        echo "\t</tr></thead>\n";
        $counter = 1;
        echo "\t<tbody>\n";
        while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
          echo "\t<tr><th>".$counter."</th>\n";
          for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t\t<td>{$data[$i]}</td>\n";
          }
          echo "\t</tr>\n";
          $counter++;
        }
	  }
      echo "\t</tbody>\n";
      echo "</table></div>\n";
      fclose ( $handle );
    }
    // 取り込みシュミレーション
    // 対象テーブル構造取得
    // 
    try{
      $dbh = new PDO($dsn,$dbuser,$dbpass );
      $query=" show columns from ".$tablename."元データ";
      $stmt = $dbh->query($query);
      $stmt->execute();
  // カラム取得 
      // $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($result);
      $count=0;
      $colName = array();
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // 配列 $colName にカラム名を格納
            $colName[$count++] = $row["Field"]; 
      }
//------------------------------------------------------------------------------------ 
      // カラム名表示
      echo ("<H2>カラムの割り当て</H2>");  // 元のファイルを PHPで読み込み対象テーブルのフィールドに合致するものだけ表示する
      echo ("(IDは後の取り込み時に自動採番されます)");
      $csvdata = csvToArray($filename);
      echo count($csvdata); echo " lines ";
	  echo "<div class='sticky_table_wrapper6'>";
      echo "<table class='sticky_table'>\n";
      echo "\t<thead><tr><th></th>\n";
      foreach ( $colName as $key => $value ){      
            echo "\t\t<th>{$value}</th>\n";
      }
      echo "\t</tr></thead>\n";
      // 割り当て表示
      echo "\t<tbody>\n";      foreach ( $csvdata as $csvkey => $csvvalue ){      
        echo "\t<tr><th>"; echo $csvkey+1; echo"</th>\n";  // 行番号
        foreach ( $colName as $colkey => $colvalue ){      
          echo "\t\t<td>{$csvvalue[$colvalue]}</td>\n";
        }
        echo "\t</tr>\n";
      }
      echo "\t</tbody>\n";
      echo "</table></div>\n";


    } catch(PDOException $e) {
      print("データベースの接続に失敗しました(1)".$e->getMessage());
      die();
    }
    $dbh = null;


    // 
    try{
      $dbh = new PDO($dsn,$dbuser,$dbpass );

      // SQL 元データテーブルデータ全削除 
      $query="TRUNCATE ".$tablename."元データ ";
      $stmt = $dbh->query($query);
      $stmt->execute();
      // SQL 変更データテーブルデータ全削除 
      $query="TRUNCATE ".$tablename."変更データ ";
      $stmt = $dbh->query($query);
      $stmt->execute();

      // SQL INSERT
      foreach ( $csvdata as $csvkey => $csvvalue ){
        $counter=$counter+1;
        $query="INSERT INTO ".$tablename."元データ (";
        foreach ( $colName as $colkey => $colvalue ){     // INSERT 先テーブルカラム指定 
          if (0 != strcmp( $tablename."ID" , $colvalue)){ // ID列(テーブル名+"ID")除外
              $query=$query.$colvalue.",";
          }
        }
        $query=rtrim($query,',')." ) VALUES (";
        foreach ( $colName as $colkey => $colvalue ){     // INSERT 元テーブルカラム指定
          if (0 != strcmp( $tablename."ID" , $colvalue)){ // ID列(テーブル名+"ID")除外
            $query=$query."nullif('".$csvvalue[$colvalue]."',''),";
           //  echo ($colvalue."=".$csvvalue[$colvalue]." ");
          }
        }
        $query=rtrim($query,',').");";
       // echo $query;
       // echo "<p>";
        $stmt = $dbh->query($query);
       // $stmt->execute();
      }
      // 元データテーブルに一行ずつ INSERT文を発行し終わっている。
//------------------------------------------------------------------------------------ 
      echo ("<H2>取込確認</H2>"); // アップデートストアドプロシジャ発行し、追加データテーブルを表示
      // インポートストアドプロシジャを介するのはデータ加工を適宜行う必要があるため
      $query="CALL ".$tablename."アップデート();";
      $query=rtrim($query,',').");";
      $stmt = $dbh->query($query);
      $query="UPDATE ".$tablename."変更データ SET ".$tablename."ID = NULL;";
      $stmt = $dbh->query($query);
      // $stmt->execute();
      // $stmt = $dbh->query($query); // なぜかこれをしておかないとエラー
      selectTableShow($dbh,$tablename."変更データ","SELECT * FROM  ".$tablename."変更データ");


    } catch(PDOException $e) {
      print("データベースの接続に失敗しました(2)".$e->getMessage());
      die();
    }
    $dbh = null;


  } else {
        echo "ファイルをアップロードできません。";
  }
} else {
    echo "ファイルが選択されていません。";
} 

?>
<HR>
<H2>問題なければインポートボタンを押してください</H2>

<FORM ACTION=import3.php METHOD=POST>

<INPUT TYPE=CHECKBOX NAME="DOUBLECHECK" VALUE="CHECK" CHECKED>学生番号と日付によってデータ重複のチェックを行う
<INPUT TYPE="SUBMIT" VALUE="インポート">
<INPUT TYPE="HIDDEN" NAME="table" VALUE=<?php echo $tablename;?>>
</FORM>
<FORM ACTION=import.php>
<INPUT TYPE="SUBMIT" VALUE="戻る">
</FORM>
</BODY></HTML>
