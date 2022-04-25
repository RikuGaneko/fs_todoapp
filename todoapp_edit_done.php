<?php

require_once('class/DB/crud.php');

try
{
    // $_POSTはtitle・contents・listcodeを含む
    $todo = $_POST;
    
    // todoを編集する
    $crud = new Crud();
    $crud->todoUpdate($todo);
    
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
<p>修正しました。</p>
<br/>
<a href="todoapp_list.php">戻る</a>

</body>

</html>