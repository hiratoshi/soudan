<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
sessChk();

$id = $_GET["id"];

//1. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//トライはエラーをキャッチする関数。catchは接続できた場合の対応。PDOはmysqlへの接続。


//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
//この下はバインドバリューはハッキング対策。POSTで受けたものに怪しいものがないかチェック。
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT
$status = $stmt->execute();

//４．データ登録処理後
$view="";
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: user_select.php");
  exit;

}
?>
