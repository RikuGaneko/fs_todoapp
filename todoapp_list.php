<?php

require_once('fn2.php');

try
{

    $fn2 = new FnTodoapp2();

    $dbh = null;

}



catch (Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todoリスト一覧</h1>
    <form method="post" action="todoapp_branch.php">
        <p>検索したいタイトルを入力してください</p>
        <input placeholder="キーワードを入力" name="liketitle">
        <input type="submit" name="like" value="検索">
    </form>
    <form method="post" action="todoapp_branch.php">
        <table border="1">
            <tr>
                <td>選択</td>
                <td>タイトル</td>
                <td>内容</td>
                <td>作成日時</td>
            </tr>
            <?php
            // 5こずつtodoを表示
            $fn2->display5(); 
            ?>
        </table>
        <input type="submit" name="add" value="追加">
        <input type="submit" name="edit" value="修正">
        <input type="submit" name="delete" value="削除">
    </form>
    <?php
    //リンク作成
    $fn2->link();
    ?>
</body>
</html>