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
    <?php require_once('index/head.php'); ?>
</head>
<body class="d-flex justify-content-center flex-column align-items-center mt-5">
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
