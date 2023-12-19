<?php
$host = 'mysql:dbname=test01;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
try{
    $pdo = new PDO($host,$user,$password); //PDOを使用してDBに接続 PDO(接続場所, ユーザー名, パスワード)
    echo '接続成功';
} catch(PDOException $e){
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}

$error = '';

if($_POST){
    $id = null;
    $name = htmlspecialchars($_POST["name"]);
    $contents = htmlspecialchars($_POST["contents"]);
    date_default_timezone_set('Asia/Tokyo');
    $time = date("Y-m-d H:i:s");

    if($name == ''){
      $error = "名前を入力してください";
    } elseif ($contents == ''){
      $error = "投稿内容を入力してください";
    } else {
        $stmt = $pdo->prepare("INSERT INTO post(id, name, contents, time) VALUES (:id,:name,:contents,:time)");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":contents", $contents);
        $stmt->bindParam(":time", $time);
        $stmt->execute();
    }
}

$contents = $pdo->prepare("SELECT * FROM post order by time DESC");
$contents->execute();


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>掲示板でPHPの練習</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<nav>
    <h1>掲示板</h1>
</nav>

<main>
    <div class="form-box">
    <h2>新規投稿</h2>
        <form action="index.php" method="post">
            <div class="flex-box">
                <div class="right-align">名前 : </div>
                <div>
                    <input type="text" name="name" value="">
                </div>
            </div>
            <div class="flex-box">
                <div class="right-align">投稿内容:</div>
                <div>
                    <input type="text" name="contents" value="">
                </div>
            </div>
            <div class="error">
                <?php
                    if ($error) {
                        echo $error;
                    } 
                ?>
            </div>
            <div class="btn">
                <button type="submit">投稿</button>
            </div>
        </form>
    </div>
</main>

<section>
		<?php foreach($contents as $content):?>
            <div class="content-area">
                <div class="id-time">
                    <span>No：<?php echo $content['id']?></span>
                    <span><?php echo $content['time']?></span>
                </div>
                <div>名前：<?php echo $content['name']?></div>
                <div>投稿内容：<?php echo $content['contents']?></div>
            </div>
		<?php endforeach;?>
</section>
