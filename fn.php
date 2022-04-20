<?php

require_once('dbc.php');

Class FnTodoapp extends Dbc {

    protected $table_name = 'posts';

    //データ数を取得
    public function getCountData() {

        $dbh = $this->dbConnect();

        $sql1 = 'SELECT COUNT(*) FROM posts';
        $stmt1 = $dbh->prepare($sql1);
        $stmt1->execute();
        $rec1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        return $rec1;
        $dbh = null;

    }

    //タイトルとコンテンツの文字が入っているか。また長過ぎないかのチェック
    public function validate($todo) {

        if($todo['title'] == '') {
            exit('タイトルが入力されていません。');
        }

        if(strlen($todo['title']) > 255) {
            exit('タイトルは255字以内にしてください。');
        }

        if(empty($todo['contents'])) {
            exit('内容が入力されていません。');
        }

    }

    //ラジオボタンで選ばれたデータ(todo_title)を取得
    public function getRadioTitle($list_code) {

        $dbh = $this->dbConnect();

        $sql = 'SELECT title FROM posts WHERE ID=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $list_code;
        $stmt->execute($data);
    
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $todo_title = $rec['title'];

        return $todo_title;

    }

    //Todoを追加
    public function todoCreate($todo) {

        $dbh = $this->dbConnect();
        $date = $this->getJapanTime();

        $sql = "INSERT INTO $this->table_name (title, content, created_at, updated_at) VALUES(?, ?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $data[] = $todo['title'];
        $data[] = $todo['contents'];
        $data[] = $date;
        $data[] = $date;
        $stmt->execute($data);

    }

    //ラジオボタンで選ばれたTodoを削除
    public function todoDelete($list_code) {

        $dbh = $this->dbConnect();

        $sql = "DELETE FROM $this->table_name WHERE ID=?";
        $stmt = $dbh->prepare($sql);
        $data[] = $list_code;
        $stmt->execute($data);

    }

    // 編集画面で打ち込まれたデータを新たに上書き
    public function todoUpdate($todo) {

        $dbh = $this->dbConnect();
        $date = $this->getJapanTime();

        $sql = "UPDATE $this->table_name SET title=?, content=?, updated_at=? WHERE ID=?";
        $stmt = $dbh->prepare($sql);
        $data[] = $todo['title'];
        $data[] = $todo['contents'];
        $data[] = $date;
        $data[] = $todo['listcode'];
        $stmt->execute($data);

    }

}

?>