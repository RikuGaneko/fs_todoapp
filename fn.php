<?php

require_once('dbc.php');

Class FnTodoapp extends Dbc {

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

    // 日本時間を取得し、後に編集機能で必要な'$date'を作成
    public function getJapanTime() {

        $date = new DateTime();
        $date->setTimeZone(new DateTimeZone('Asia/Tokyo'));
        $date = $date->format('Y-m-d H:i:s');
        return $date;

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

}

?>