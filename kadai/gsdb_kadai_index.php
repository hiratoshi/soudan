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
        <title>メンバー情報登録</title>
        <link href="css/gsdb_kadai_index.css" rel="stylesheet">
        <script type="text/javascript">
            function check() {

                if (window.confirm('登録してよろしいですか？')) {
                    return true;
                } else {
                    window.alert('キャンセルされました');
                    return false;
                }
            }

        </script>

    </head>

    <body>

        <!-- Head[Start] -->
        <header id="header">
            <a href="gsdb_kadai_select.php"><img src="picture/gs_logo.png" alt="gs" width="200px" height="80px" id="logo"></a>
            <div id="link">
                <p>
                    Log In
                    <?=$_SESSION["name"]?>さん</p>
                <a href="gsdb_kadai_select.php">
                    <p id="top1">登録済メンバー情報</p>
                </a>
                <a href="user_index.php">
                    <p id="top1">ユーザー一覧</p>

                    <a href="user_logout.php">
                        <p id="top1">ログアウト</p>
                    </a>

            </div>

        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <form method="post" action="gsdb_kadai_insert.php" onSubmit="return check()">
            <div class="touroku">


                <span style="background-color:#ccc" class="list" id="list1">学籍番号</span><br>
                <input type="text" name="school_num" class="form" id="f1"><br>
                <span style="background-color:#ccc" class="list">画像url</span><br><input type="text" name="picture" class="form" id="f3"><br>
                <span style="background-color:#ccc" class="list">名前</span><br>
                <input type="text" name="name" class="form" id="f2"><br>
                <span style="background-color:#ccc" class="list">年齢</span><br><input type="text" name="age" class="form" id="f4"><br>
                <span style="background-color:#ccc" class="list">選択コース</span><br>
                <input type="radio" name="select_course" value="i-os" id="ios">i-OSコース <input type="radio" name="select_course" value="web">webコース <input type="radio" name="select_course" value="leave">継続中止<br>
                <span style="background-color:#ccc" class="list">勤務先情報</span><br><input type="text" name="about_work" class="form" id="f5"><br>
                <span style="background-color:#ccc" class="list">卒制企画概要</span><br><input type="text" name="plan" class="form" id="f7"><br>
                <span style="background-color:#ccc" class="list">その他情報</span><br>
                <textArea name="info" rows="2" cols="20" class="form" id="f6"></textArea><br>
                <span style="background-color:#ccc" class="list">発表授業</span><br>
                <input type="checkbox" name="presen[]" value="">1回（ジャンケン）
                <input type="checkbox" name="presen[]" value="">2回（メモ帳）
                <input type="checkbox" name="presen[]" value="">3回（お絵描き）
                <input type="checkbox" name="presen[]" value="">4回（MAP）
                <input type="checkbox" name="presen[]" value="">5回（FIREBASE)
                <input type="checkbox" name="presen[]" value="">6回（php）
                <input type="checkbox" name="presen[]" value="">7回（Bookmark1）
                <input type="checkbox" name="presen[]" value="">8回（Bookmark2）
                <br>


                <input type="submit" value="登録" class="button">

            </div>
        </form>
        <!-- Main[End] -->


    </body>

    </html>
