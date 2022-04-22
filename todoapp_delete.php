<?php

require_once('fn2.php');

try
{
    // $_POSTはtitle・contents・listcodeを含む
    $list_code = $_GET['listcode'];
    
    //ラジオボタンで選ばれたデータ(todo_title)を取得
    $fn2 = new FnTodoapp2();
    $todo_title = $fn2->getRadioTitle($list_code);
    
}
catch (Exception $e)
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
<h3>Todo削除</h3>
<p>Todoコード</p>
<p><?php print $list_code; ?></p>
<p>タイトル</p>
<p><?php print $todo_title; ?></p>
<p>このTodoを削除してよろしいですか？</p>
<form method="post" action="todoapp_delete_done.php">
    <input type="hidden" name="listcode" value="<?php print $list_code; ?>">
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>

</body>

</html>