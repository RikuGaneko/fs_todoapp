<?php

require_once('fn.php');

// $_POSTはtitle・contents・listcodeを含む
$todo = $_POST;

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

$todo_title = h($todo['title']);
$todo_contents = h($todo['contents']);

//タイトルとコンテンツの文字が入っているか。また長過ぎないかのチェック
$fn = new FnTodoapp();
$fn->validate($todo);

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
    <p>タイトル</p>
    <p><?php echo $todo_title ?></p>
    <p>内容</p>
    <p><?php echo $todo_contents ?></p>
    <form method="post" action="todoapp_add_done.php">
        <input type="hidden" name="title" value=<?php echo $todo_title?>>
        <input type="hidden" name="contents" value=<?php echo $todo_contents?>>
        <input type="button" onClick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>