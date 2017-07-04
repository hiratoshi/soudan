<?php
session_start();



//1. POSTデータ取得
$id = $_POST["id"];
$lpw = $_POST["lpw"];


//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//トライはエラーをキャッチする関数。catchは接続できた場合の対応。PDOはmysqlへの接続。


//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id AND lpw=:lpw AND life_flg=1");
//この下はバインドバリューはハッキング対策。POSTで受けたものに怪しいものがないかチェック。
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
    
$val = $stmt->fetch();

if( $val["id"] !="" ) {
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"] = $val['name'];

    
  //５．index.phpへリダイレクト
  header("Location: gsdb_kadai_select.php");
}else{

  header("Location: gsdb_kadai_login.php");
}
}
?>
