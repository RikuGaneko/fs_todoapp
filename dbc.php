<?php

Class Dbc {

    //DBにコネクションして、$dbhにそのコネクション状態を代入
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

}

?>