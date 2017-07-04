<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link href="css/login.css" rel="stylesheet">

</head>

<body>

    <!-- Head[Start] -->
    <header id="header">
        <a href="gsdb_kadai_login.php"><img src="picture/gs_logo.png" alt="gs" width="200px" height="80px" id="logo"></a>
        <div id="link">


        </div>

    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="user_loginact.php">


        <h1 id="title">G's Academy DEV course 7th members</h1>
        <div class="touroku">
            <span class="list" id="list1">学籍番号</span><br>
            <input type="text" name="id" class="form" id="f1"><br>
            <span class="list" id="lpw">ログインPASSWORD</span><br><input type="text" name="lpw" class="form" id="f4"><br>
            <input type="submit" value="MEMBERS LOG IN" class="button">

        </div>

    </form>

    <div class="ot">
        <p>
            <a href="others_kadai_select.php">
                <input type="button" value="OTHERS LOG IN" id="others"></a>
        </p>
    </div>

    <img src="picture/gsclub2.png" alt="" id="pic" width="100%">
    <!-- Main[End] -->


</body>

</html>
