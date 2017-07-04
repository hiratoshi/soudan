<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
sessChk();

//1.  DB接続します
try {

  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
       $id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=$id");
$status = $stmt->execute();
//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
    $row = $stmt->fetch();
}
 
?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>ユーザー編集</title>
        <link href="css/gsdb_kadai_index.css" rel="stylesheet">

    </head>

    <body>

        <!-- Head[Start] -->
        <header id="header">
            <img src="../img/gs_logo.png" alt="gs" width="200px" height="80px" id="logo">
            <div id="link">
                <a href="gsdb_kadai_select.php">
                    <p id="top1">登録済メンバー情報</p>
                </a>
                <a href="gsdb_kadai_edit.php">
                    <p id="top2">登録済情報編集</p>
                </a>
            </div>

        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <form method="post" action="user_update.php"><input type="hidden" name="id" value="<?=id?>">
            <div class="touroku">

                <span style="background-color:#ccc" class="list" id="list1">番号</span><br>
                <input type="text" name="id" class="form" id="f1" value='<?php echo $row["id"];?>'><br>
                <span style="background-color:#ccc" class="list">名前</span><br>
                <input type="text" name="name" class="form" id="f2" value='<?php echo $row["name"];?>'><br>
                <span style="background-color:#ccc" class="list">ログインID</span><br><input type="text" name="lid" class="form" id="f3" value='<?php echo $row["lid"];?>'><br>
                <span style="background-color:#ccc" class="list">ログインPASSWORD</span><br><input type="text" name="lpw" class="form" id="f4" value='<?php echo $row["lpw"];?>'><br>
                <span style="background-color:#ccc" class="list">管理フラグ（0=管理者、1=一般者）</span><br><input type="text" name="kanri_flg" class="form" id="f3" value='<?php echo $row["kanri_flg"];?>'><br>
                <span style="background-color:#ccc" class="list">使用フラグ（0=使用中、1=使用しなくなった）</span><br><input type="text" name="life_flg" class="form" id="f4" value='<?php echo $row["life_flg"];?>'><br>

                <input type="submit" value="登録" class="button">

            </div>

        </form>
        <!-- Main[End] -->


    </body>

    </html>
