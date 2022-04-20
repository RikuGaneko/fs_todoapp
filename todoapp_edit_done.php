<?php

require_once('fn.php');

try
{
    // $_POSTはtitle・contents・listcodeを含む
    $todo = $_POST;
    
    // todoを編集する
    $fn = new FnTodoapp();
    $fn->todoUpdate($todo);

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
<p>修正しました。</p>
<br/>
<a href="todoapp_list.php">戻る</a>

</body>

</html>