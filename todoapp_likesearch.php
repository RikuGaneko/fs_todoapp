<?php

require_once('class/listpage/like.php');

try
{

    $like_title = $_GET['liketitle'];

    $likesearch = new Likefind();

}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>ヒットしたタイトルを表示します。</p>
    <p>リンクから飛んでください。</p>
    <?php
        $likesearch->likeSearch($like_title);
        $dbh = null;
    ?>
    <a href="todoapp_list.php">戻る</a>
</body>
</html>
