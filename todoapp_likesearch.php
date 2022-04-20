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

    $like_title = $_GET['liketitle'];

    $todo_num = $rec1['COUNT(*)'];


    //あいまい検索で入力された値をタイトルに含むデータを全取得
    $sql = 'SELECT * FROM posts WHERE title LIKE ?';
    $stmt = $dbh->prepare($sql);
    $data[] = "%$like_title%";
    $stmt->execute($data);
    foreach ($stmt as $row)
    {
        $todo_ID[] = $row['ID'];
        $todo_title[] = $row['title'];
        $todo_content[] = $row['content'];
        $todo_created_at[] = $row['created_at'];
    }

    
    
    if(isset($todo_ID) == false)
    {
        print '該当するデータはありません。';
    } else
    {

        //(あいまい検索にかかったそれぞれのデータIDの数字 >= 全データID数字) を満たすデータの個数をそれぞれ取得
        foreach($todo_ID as $key => $val)
        {
    
            $sql2 = 'SELECT COUNT(*) FROM posts WHERE ID<=?';
            $stmt2 = $dbh->prepare($sql2);
            $data[0] = $val;
            $stmt2->execute($data);
            $rec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    
            $onnum[] = $rec2['COUNT(*)'];
            
        }

    }




    $dbh = null;

}
catch(Exception $e)
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
    <p>ヒットしたタイトルを表示します。</p>
    <p>リンクから飛んでください。</p>
    <?php
        define('MAX','5');
        //あいまい検索にかかったタイトルを表示。そのままリンクで飛べる。
        for($i = 0; $i < $todo_num; $i++)
        {
            if(empty($todo_ID[$i]))
            {
                break;
            }
            print '<a href="todoapp_list.php?page_id='.ceil($onnum[$i] / MAX).'">';
            print $todo_title[$i];
            print '</a>';
            print '</br>';
    
        }
    ?>
    <a href="todoapp_list.php">戻る</a>
</body>
</html>
