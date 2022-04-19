<?php

Class Dbc {

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

}

?>