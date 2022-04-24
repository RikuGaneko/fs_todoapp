<?php

require_once('dbc.php');

Class Crud extends Dbc {

    private $table_name = 'posts';

    private $dbh;

    public function __construct() {
        $this->dbh = $this->dbConnect();
    }

    //Todoを追加
    public function todoCreate($todo) {

        $date = $this->getJapanTime();

        $sql = "INSERT INTO $this->table_name (title, content, created_at, updated_at) VALUES(?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        $data[] = $todo['title'];
        $data[] = $todo['contents'];
        $data[] = $date;
        $data[] = $date;
        $stmt->execute($data);

        $dbh = null;

    }

    //（ラジオボタンで選ばれた）Todoを削除
    public function todoDelete($list_code) {

        $sql = "DELETE FROM $this->table_name WHERE ID=?";
        $stmt = $this->dbh->prepare($sql);
        $data[] = $list_code;
        $stmt->execute($data);

        $dbh = null;

    }

    // （編集画面で打ち込まれた）Todoを編集
    public function todoUpdate($todo) {

        $date = $this->getJapanTime();

        $sql = "UPDATE $this->table_name SET title=?, content=?, updated_at=? WHERE ID=?";
        $stmt = $this->dbh->prepare($sql);
        $data[] = $todo['title'];
        $data[] = $todo['contents'];
        $data[] = $date;
        $data[] = $todo['listcode'];
        $stmt->execute($data);
        
        $dbh = null;

    }

}

?>