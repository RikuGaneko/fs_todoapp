<?php

require_once('dbc.php');

try
{

    $dbc = new Dbc();
    $dbh = $dbc->dbConnect();

    $list_code = $_GET['listcode'];

    //ラジオボタンで選ばれたデータを取得
    $sql = 'SELECT title FROM posts WHERE ID=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $list_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $todo_title = $rec['title'];

    $dbh = null;

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