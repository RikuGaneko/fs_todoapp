<?php

require_once(__DIR__. '/../DB/dbc.php');

Class Display extends Dbc {

    public function forPaging() {

        //現在何ページにいるか（$now）を取得
        if(!isset($_GET['page_id'])){
            $now = 1;
        }else{
            $now = $_GET['page_id'];
        }

        return $now;

    }

    public function display5() {

        $dbh = $this->dbConnect();

        //すべてのデータをカラムごとにそれぞれの変数に格納
        $sql2 = 'SELECT * FROM posts';
        $stmt2 = $dbh->query($sql2);
        foreach ($stmt2 as $row)
        {
            $todo_ID[] = $row['ID'];
            $todo_title[] = $row['title'];
            $todo_content[] = $row['content'];
            $todo_created_at[] = $row['created_at'];
        }

        //現在何ページにいるか（$now）を取得
        $now = $this->forPaging();
        
        $start_no = ($now - 1) * 5;

        $array = array($todo_title, $todo_content, $todo_created_at, $todo_ID, $start_no);
        return $array;

        $dbh = null;

    }

}

$display5 = new Display;
$display5->display5(); 

?>