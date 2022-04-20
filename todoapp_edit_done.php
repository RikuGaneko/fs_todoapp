<?php

require_once('dbc.php');
require_once('fn.php');

try
{
    
    $list_code = $_POST['listcode'];
    $todo_title = $_POST['title'];
    $todo_contents = $_POST['contents'];
    
    $todo_title = htmlspecialchars($todo_title, ENT_QUOTES, 'UTF-8');
    $todo_contents = htmlspecialchars($todo_contents, ENT_QUOTES, 'UTF-8');
    
    $dbc = new Dbc();
    $fn = new FnTodoapp();
    $dbh = $dbc->dbConnect();
    $date = $fn->getJapanTime();
    
    // 編集画面で打ち込まれたデータを新たに上書き
    $sql = 'UPDATE posts SET title=?, content=?, updated_at=? WHERE ID=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $todo_title;
    $data[] = $todo_contents;
    $data[] = $date;
    $data[] = $list_code;
    $stmt->execute($data);
    
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