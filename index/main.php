<?php

require_once(__DIR__. '/../class/listpage/display5.php');

$todo5 = new Display();
$array = $todo5->display5();

$todo_title = $array[0];
$todo_content = $array[1];
$todo_created_at = $array[2];
$todo_ID = $array[3];
$start_no = $array[4];

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
    <form class="mb-5" method="post" action="todoapp_branch.php">
            <table class="mb-4" border="1">
                <tr>
                    <td>選択</td>
                    <td>タイトル</td>
                    <td>内容</td>
                    <td>作成日時</td>
                </tr>
                <?php for($i = $start_no; $i < $start_no + 5; $i++): ?>
                    <?php if(empty($todo_ID[$i])) break; ?>
                    <tr>
                        <td><input type="radio" name="listcode" value="<?php echo $todo_ID[$i] ?>"></td>
                        <td><?php echo $todo_title[$i] ?></td>
                        <td><?php echo $todo_content[$i] ?></td>
                        <td><?php echo $todo_created_at{$i} ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
            <div class="text-center">
            <input type="submit" name="add" value="追加">
            <input type="submit" name="edit" value="修正">
            <input type="submit" name="delete" value="削除">
        </div>
    </form>
</body>
</html>