<?php

require_once('fn.php');

try
{
    // $_POSTはtitle・contents・listcodeを含む
    $list_code = $_POST['listcode'];
    
    //ラジオボタンで選ばれたTodoを削除
    $fn = new FnTodoapp();
    $fn->todoDelete($list_code);
    
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
<p>削除しました。</p>
<a href="todoapp_list.php">戻る</a>

</body>

</html>