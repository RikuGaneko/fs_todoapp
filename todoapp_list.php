<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('index/head.php'); ?>
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
            <!-- 5こずつtodoを表示 -->
            <?php require_once('class/listpage/display5.php'); ?>
        </table>
        <div class="text-center">
            <input type="submit" name="add" value="追加">
            <input type="submit" name="edit" value="修正">
            <input type="submit" name="delete" value="削除">
        </div>
    </form>
    <!-- ページングリンク作成 -->
    <div>
        <?php require_once('class/listpage/pagination.php'); ?>
    </div>

</body>
</html>