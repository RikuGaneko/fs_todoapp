<?php

require_once('class/DB/crud.php');

try
{
    // $_POSTはtitle・contentsを含む
    $todo = $_POST;

    function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }

    $todo_title = h($todo['title']);
    $todo_contents = h($todo['contents']);
    
    //Todoを追加
    $crud = new Crud();
    $crud->todoCreate($todo);
    
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
    <?php require_once('index/head.php'); ?>
</head>
<body class="d-flex justify-content-center flex-column align-items-center mt-5">
<p>新しくやることを追加しました。</p>
<p>タイトル</p>
<p><?php echo $todo_title ?></p>
<a href="todoapp_list.php">戻る</a>

</body>

</html>