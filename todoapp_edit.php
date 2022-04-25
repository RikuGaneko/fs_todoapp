<?php

require_once('class/DB/dbc.php');

try
{

    //ラジオボタンで押されたTodoのリスト番号を取得
    $list_code = $_GET['listcode'];

    //ラジオボタンで押されたTodoのタイトルを取得
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
    
<h1>
    Edit Todo Page
</h1>
<form method="post" action="todoapp_edit_check.php">
    <input type="hidden" name="listcode" value="<?php print $list_code; ?>">
    <div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input type="text" name="title" style="width:200px" value="<?php print $todo_title; ?>">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
        <textarea id="content" name="contents" rows="8" cols="40"></textarea>
    </div>
    <input type="submit" name="post" value="編集する">
    <input type="button" onclick="history.back()" value="戻る">
</form>

</body>

</html>