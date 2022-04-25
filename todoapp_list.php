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

    <!-- 5こずつTodoを表記 -->
    <?php require_once('index/main.php') ?>

    <!-- ページングリンク作成 -->
    <div>
        <?php require_once('class/listpage/pagination.php'); ?>
    </div>

</body>
</html>