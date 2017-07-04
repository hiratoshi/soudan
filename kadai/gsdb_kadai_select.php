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
$stmt = $pdo->prepare("SELECT * FROM gs_gsdb_table");
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
            $view .='<tbody><tr>';
    $view .= '<td class="text-success" width="100px" align="center" vartical-align="middle" id="1"　 >'.$result["school_num"].'</td>';
      $view .= '<td width="150px" valign="middle" align="center">'.$result["picture"].'</td>';

      $view .= '<td width="120px" valign="middle">'.$result["name"].'</td>';
      $view .= '<td width="120px" valign="middle">'.$result["select_course"].'</td>';

          $view .= '<td width="80px" align="center" valign="middle">'.$result["age"].'</td>';
      $view .= '<td width="200px" valign="middle">'.$result["about_work"].'</td>';
      $view .= '<td width="200px" valign="middle">'.$result["plan"].'</td>';
      $view .= '<td width="200px" valign="middle">'.$result["info"].'</td>';
          $view .= '<td width="100px">'.$result["presen"].'</td>';
          $view .= '<td width="80px" align="center" valign="middle">                  <a href="gsdb_kadai_edit.php?school_num='.$result["school_num"].'">編集</a></td>';
      $confirm = "削除しますか？";
          $view .= '<td width="80px" align="center" valign="middle">                  <a href="gsdb_kadai_delete.php?school_num='.$result["school_num"].'" onclick="return confirm()">削除</a></td></tbody>';
      

      
      $view .='</tr>'; } } ?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DEVコースメンバー情報</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/gsdb_kadai_select.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/jquery.tablesorter.min.js"></script>
        <script src="js/jquery.metadata.js"></script>
        <script>
            $(function() {
                $("#tab").tablesorter();
            });

        </script>


    </head>

    <body id="main">
        <!-- Head[Start] -->
        <header id="header">
            <a href="gsdb_kadai_select.php"><img src="picture/gs_logo.png" alt="gs" width="200px" height="80px" id="logo"></a>
            <div id="link">
                <p id="top0">
                    Log In
                    <?=$_SESSION["name"]?>さん</p>
                <div id="link2">
                    <a href="gsdb_kadai_index.php">
                        <p id="top1">新規メンバー情報入力</p>
                    </a>
                    <a href="logout.php">
                        <p id="top1">ログアウト</p>
                    </a>
                </div>
            </div>
        </header>


        <!-- Head[End] -->

        <!-- Main[Start] -->
        <div id="table">
            <table class="table table-striped table-bordere table-hover" class="tablesorter" border="solid 1px" id="tab" valign="middle">
                <thead>
                    <tr id="th1">
                        <th class="th1">学籍番号</th>
                        <th class="th1">写真</th>
                        <th class="th1">名前</th>
                        <th class="th1">選択コース</th>
                        <th class="th1">年齢</th>
                        <th class="th1">勤務先</th>
                        <th class="th1">卒制企画概要</th>
                        <th class="th1">その他情報</th>
                        <th class="th1">発表回数</th>
                        <th class="th1">編集</th>
                        <th class="th1">削除
                        </th>

                    </tr>
                </thead>
                <?=$view?>



            </table>
        </div>

        <!-- Main[End] -->

    </body>

    </html>
