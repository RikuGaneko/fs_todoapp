<?php

Class Dbc {

    //DBにコネクトして、$dbhにコネクション状態を代入
    public function dbConnect() {
        $dsn = 'mysql:dbname=todoapp;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';

        try {
            $dbh = new \PDO($dsn, $user, $password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ]);
        } catch(PDOException $e) {
            echo '接続失敗'.$e->getMessage();
            exit();
        };
    
        return $dbh;

    }

    // 日本時間を取得し、後に編集機能で必要な'$date'を作成
    public function getJapanTime() {

        $date = new DateTime();
        $date->setTimeZone(new DateTimeZone('Asia/Tokyo'));
        $date = $date->format('Y-m-d H:i:s');
        
        return $date;

    }

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
        $dbh = null;

    }

}

?>