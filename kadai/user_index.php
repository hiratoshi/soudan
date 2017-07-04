<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
sessChk();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link href="css/user_index.css" rel="stylesheet">

</head>

<body>

    <!-- Head[Start] -->
    <header id="header">
        <img src="picture/gs_logo.png" alt="gs" width="200px" height="80px" id="logo">
        <div id="link">
            <a href="gsdb_kadai_select.php">
                <p id="top1">登録済メンバー情報</p>
                <a href="user_select.php">
                    <p id="top1">ユーザー一覧</p>
                </a>

        </div>

    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="user_insert.php">
        <div class="touroku">


            <span class="list" id="list1">学籍番号</span><br>
            <input type="text" name="id" class="form" id="f1"><br>
            <span class="list">名前</span><br>
            <input type="text" name="name" class="form" id="f2"><br>
            <span class="list">ログインID</span><br><input type="text" name="lid" class="form" id="f3"><br>
            <span class="list">ログインPASSWORD</span><br><input type="text" name="lpw" class="form" id="f4"><br>
            <span class="list">管理フラグ（0=管理者、1=一般者）</span><br><input type="text" name="kanri_flg" class="form" id="f3"><br>
            <span class="list">使用フラグ（0=使用中、1=使用しなくなった）</span><br><input type="text" name="life_flg" class="form" id="f4"><br>

            <input type="submit" value="登録" class="button">

        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
