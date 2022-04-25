<!DOCTYPE html>
<html>
<head>
    <?php require_once('index/head.php'); ?>
</head>
<body class="d-flex justify-content-center flex-column align-items-center mt-5">

<h1>
    Post New ToDo Page
</h1>
<form method="post" action="todoapp_add_check.php">
    <div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input id="title" name="title" type="text">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
        <textarea id="content" name="contents" rows="8" cols="40"></textarea>
    </div>
    <input type="submit" name="post" value="投稿する">
    <input type="button" onclick="history.back()" value="戻る">
</form>
    
</body>
</html>