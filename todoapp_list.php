<?php

require_once('dbc.php');
require_once('fn.php');
require_once('fn2.php');

try
{

    $dbc = new Dbc();
    $fn2 = new FnTodoapp2();
    $dbh = $dbc->dbConnect();
    $rec1 = $fn2->getCountData();

    
    //表示するページの番号を取得
    define('MAX','5');
    $todo_num = $rec1['COUNT(*)'];
    $max_page = ceil($todo_num / MAX);

    //すべてのデータをカラムごとにそれぞれの変数に格納
    $sql2 = 'SELECT * FROM posts';
    $stmt2 = $dbh->query($sql2);
    foreach ($stmt2 as $row)
    {
        $todo_ID[] = $row['ID'];
        $todo_title[] = $row['title'];
        $todo_content[] = $row['content'];
        $todo_created_at[] = $row['created_at'];
    }
    
    //ページング機能
    if(!isset($_GET['page_id'])){
        $now = 1;
    }else{
        $now = $_GET['page_id'];
    }
    
    $start_no = ($now - 1) * MAX;

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
                for($i = $start_no; $i < $start_no + 5; $i++)
                {
                    if(empty($todo_ID[$i]))
                    {
                        break;
                    }
                    print '<tr>';
                    print '<td>';
                    print '<input type="radio" name="listcode" value="'.$todo_ID[$i].'">';
                    print '</td>';
                    print '<td>';
                    print $todo_title[$i];
                    print '</td>';
                    print '<td>';
                    print $todo_content[$i];
                    print '</td>';
                    print '<td>';
                    print $todo_created_at{$i};
                    print '</td>';
                    print '</tr>';
            
                }    
            ?>
        </table>
        <input type="submit" name="add" value="追加">
        <input type="submit" name="edit" value="修正">
        <input type="submit" name="delete" value="削除">
    </form>
    <?php
        if($now > 1){ // リンクをつけるかの判定
            echo '<a href="./todoapp_list.php?page_id='.($now - 1).'">前へ</a>'. '　';
        } elseif ($now == 1) {
            echo '';
        } else {
            echo '前へ'. '　';
        }
     
        for($i = 1; $i <= $max_page; $i++){
            if ($i == $now) {
                echo $now. '　'; 
            } else {
                echo '<a href="./todoapp_list.php?page_id='.$i.'">'.$i.'</a>'. '　';
            }
        }
     
        if($now < $max_page){ // リンクをつけるかの判定
            echo '<a href="./todoapp_list.php?page_id='.($now + 1).'">次へ</a>'. '　';
        } elseif ($now == $max_page) {
            echo '';
        } else {
            echo '次へ';
        }
    ?>
</body>
</html>