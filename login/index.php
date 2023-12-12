<?php
    $db = mysqli_connect("localhost:8889","root","root","login");// サーバーのホスト名、ユーザー名、パスワード、データベース名
    if(mysqli_connect_error()){ 
        die("データベースの接続に失敗しました");
    }

    if($_POST['email'] == ''){
        echo "Emailが未入力です";
    } elseif($_POST['password']==''){
        echo "Passwordが未入力です";
    } elseif($_POST['name']==''){
        echo "Nameが未入力です";
    } else{
        $query = "SELECT `email` FROM `test` WHERE email = '".mysqli_real_escape_string($db,$_POST['email'])."'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) > 0){
            echo "このメールアドレスは登録済みです";
        }else{
            $querys = "INSERT INTO `test` (`email`,`password`,`name`) -- データベースのテーブルやカラムを指定するときは``を使用する
                VALUES(
                '".mysqli_real_escape_string($db,$_POST['email'])."',
                '".mysqli_real_escape_string($db,$_POST['password'])."',
                '".mysqli_real_escape_string($db,$_POST['name'])."'
                )"; // 特殊文字をエスケープ
            if(mysqli_query($db,$querys)){
                echo "登録が成功しました。";
            } else{
                echo "登録が失敗しました";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>登録フォーム</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="box">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="text" name="name" placeholder="Name">
            <input type="submit" value="登録する">
        </form>
    </div>
</body>
</html>