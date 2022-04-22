<?php

require_once(__DIR__. '/../DB/dbc.php');

Class Pagination extends Dbc {

    public function forPaging() {

        //現在何ページにいるか（$now）を取得
        if(!isset($_GET['page_id'])){
            $now = 1;
        }else{
            $now = $_GET['page_id'];
        }

        return $now;

    }

    public function link() {

        $rec1 = $this->getCountData();
        
        //表示するページの番号を取得
        define('MAX','5');
        //todoの数
        $todo_num = $rec1['COUNT(*)'];
        // ページの最大値
        $max_page = ceil($todo_num / MAX);
        
        //現在何ページにいるか（$now）を取得
        $now = $this->forPaging();

        if($now > 1){ // リンクをつけるかの判定
            echo '<a href="./todoapp_list.php?page_id='.($now - 1).'">前へ</a>'. '　';
        } elseif ($now == 1) {
            echo '';
        }
     
        for($i = 1; $i <= $max_page; $i++){
            if ($i == $now) {
                echo $now. '　'; 
            } else {
                echo '<a href="./todoapp_list.php?page_id='.$i.'">'.$i.'</a>'. '　';
            }
        }
     
        if($now < $max_page){ // リンクをつけるかの判定
            echo '<a href="./todoapp_list.php?page_id='.($now + 1).'">次へ</a>'. '　';
        } elseif ($now == $max_page) {
            echo '';
        }

        $dbh = null;

    }

}

?>