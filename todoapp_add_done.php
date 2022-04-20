<?php

require_once('fn.php');

try
{

    $todo = $_POST;

    function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }

    $todo_title = h($todo['title']);
    $todo_contents = h($todo['contents']);
    
    $fn = new FnTodoapp();
    $fn->todoCreate($todo);
    
    $dbh = null;
    
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TodoApp</title>
</head>
<body>
<p>新しくやることを追加しました。</p>
<p>タイトル</p>
<p><?php echo $todo_title ?></p>
<a href="todoapp_list.php">戻る</a>

</body>

</html>