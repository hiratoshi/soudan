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
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .='<tr>';
    $view .= '<td class="text-success" width="80px" align="center">'.$result["id"].'</td>';
      $view .= '<td width="120px">'.$result["name"].'</td>';

      $view .= '<td width="250px">'.$result["lid"].'</td>';
      $view .= '<td width="300px">'.$result["lpw"].'</td>';
          $view .= '<td width="100px">'.$result["kanri_flg"].'</td>';
          $view .= '<td width="100px">'.$result["life_flg"].'</td>';
          $view .= '<td width="80px" align="center">                  <a href="user_edit.php?id='.$result["id"].'">編集</a></td>';
          $view .= '<td width="80px" align="center">                  <a href="user_delete.php?id='.$result["id"].'">削除</a></td>';
      

      
      $view .='</tr>'; } } ?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー一覧</title>
        <link rel="stylesheet" href="css/user_select.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>

    <body id="main">
        <!-- Head[Start] -->
        <header id="header">
            <img src="picture/gs_logo.png" alt="gs" width="200px" height="80px" id="logo">
            <div id="link">
                <a href="gsdb_kadai_index.php">
                    <p id="top1">ユーザー一覧</p>
                </a>

            </div>
        </header>


        <!-- Head[End] -->

        <!-- Main[Start] -->
        <div id="table">
            <table class="table table-striped table-bordere table-hover" border="solid 1px" id="tab">
                <tr id="th1">
                    <th class="th1">番号</th>
                    <th class="th1">名前</th>
                    <th class="th1">ログインID</th>
                    <th class="th1">ログインPassword</th>
                    <th class="th1">管理フラグ</th>
                    <th class="th1">活動フラグ</th>
                    <th class="th1">編集</th>
                    <th class="th1">削除
                    </th>

                </tr>
                <?=$view?>


            </table>
        </div>

        <!-- Main[End] -->

    </body>

    </html>
