<?php
// $result = ["大吉","中吉","小吉"];
// $n = mt_rand(0, count($result)-1);
// $res = $result[$n];


// $result = ["大吉","中吉","小吉"];
// $n = array_rand($result, 1);
// $res = $result[$n];


$result = ["大吉","中吉","小吉"];
shuffle($result);
$res = $result[0];


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>結果｜おみくじ</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <h1>result</h1>
    </nav>
    <div class="box">
    <h2 class="result-text"><?php echo $res;?></h2>
    <div class="form-box">
        <a href="start.php">
            <button type="button">もう一度引く</button>
        </a>
    </div>
</body>
</html>