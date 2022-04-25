<?php

require_once(__DIR__. '/class/listpage/like.php');

$likesearch = new Likefind();
$array = $likesearch->likeSearch();

$todo_title = $array[0];
$onnum = $array[1];

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
    <!-- 検索にかかったTodoのタイトルを全て表示 -->
    <?php for($i = 0; $i <count($todo_title); $i++): ?>
        <a href="todoapp_list.php?page_id=<?php echo ceil($onnum[$i] / 5) ?>">
            <p><?php echo $todo_title[$i] ?></p>
        </a>
    <?php endfor; ?>
    <a href="todoapp_list.php">戻る</a>
</body>
</html>
