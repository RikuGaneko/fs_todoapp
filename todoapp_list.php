<?php

require_once('fn2.php');

try
{

    $fn2 = new FnTodoapp2();

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Todoapp</title>
</head>
<body class="d-flex justify-content-center flex-column align-items-center mt-5">
    <h1 class="text-primary">Todoリスト一覧<img width="100" height="100" src="img/todo_checkmark.png"></img></h1>
    <form method="post" action="todoapp_branch.php" class="text-center">
        <p>検索したいタイトルを入力してください</p>
        <input class="mb-4" placeholder="キーワードを入力" name="liketitle">
        <input type="submit" name="like" value="検索">
    </form>
    <form class="mb-5" method="post" action="todoapp_branch.php">
        <table class="mb-4" border="1">
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
        <div class="text-center">
            <input type="submit" name="add" value="追加">
            <input type="submit" name="edit" value="修正">
            <input type="submit" name="delete" value="削除">
        </div>
    </form>
    <div>
        <?php
        //ページングリンク作成
        $fn2->link();
        $dbh = null;
        ?>
    </div>
</body>
</html>