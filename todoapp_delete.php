<?php

require_once('class/DB/dbc.php');

try
{
    // $_POSTはtitle・contents・listcodeを含む
    $list_code = $_GET['listcode'];
    
    //ラジオボタンで選ばれたデータ(todo_title)を取得
    $dbc = new Dbc();
    $todo_title = $dbc->getRadioTitle($list_code);
    
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
    <?php require_once('index/head.php'); ?>
</head>
<body class="d-flex justify-content-center flex-column align-items-center mt-5">
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