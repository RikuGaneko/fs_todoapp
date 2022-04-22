<?php

require_once('class/DB/crud.php');

try
{
    // $_POSTはtitle・contents・listcodeを含む
    $list_code = $_POST['listcode'];
    
    //ラジオボタンで選ばれたTodoを削除
    $crud = new Crud();
    $crud->todoDelete($list_code);
    
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
<p>削除しました。</p>
<a href="todoapp_list.php">戻る</a>

</body>

</html>