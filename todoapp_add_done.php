<?php

require_once('dbc.php');
require_once('fn.php');

try
{
    
    $todo_title = $_POST['title'];
    $todo_contents = $_POST['contents'];
    
    $todo_title = htmlspecialchars($todo_title, ENT_QUOTES, 'UTF-8');
    $todo_contents = htmlspecialchars($todo_contents, ENT_QUOTES, 'UTF-8');
    
    $dbc = new Dbc();
    $fn = new FnTodoapp();
    $dbh = $dbc->dbConnect();
    $date = $fn->getJapanTime();
    
    // NewTodoPageで書かれた内容をデータベースに追加
    $sql = 'INSERT INTO posts(title, content, created_at, updated_at) VALUES(?, ?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $todo_title;
    $data[] = $todo_contents;
    $data[] = $date;
    $data[] = $date;
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
<p>新しくやることを追加しました。</p>
<p>タイトル</p>
<p><?php echo $todo_title ?></p>
<a href="todoapp_list.php">戻る</a>

</body>

</html>