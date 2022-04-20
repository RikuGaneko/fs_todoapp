<?php

require_once('dbc.php');

Class FnTodoapp2 extends Dbc {

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

    public function likeSearch($like_title) {

        $dbh = $this->dbConnect();
        $rec1 = $this->getCountData();

        $todo_num = $rec1['COUNT(*)'];

        //あいまい検索で入力された値をタイトルに含むデータを全取得
        $sql = 'SELECT * FROM posts WHERE title LIKE ?';
        $stmt = $dbh->prepare($sql);
        $data[] = "%$like_title%";
        $stmt->execute($data);
        foreach ($stmt as $row)
        {
            $todo_ID[] = $row['ID'];
            $todo_title[] = $row['title'];
            $todo_content[] = $row['content'];
            $todo_created_at[] = $row['created_at'];
        }

        if(isset($todo_ID) == false)
        {
            print '該当するデータはありません。';
        } else
        {
    
            //(あいまい検索にかかったそれぞれのデータIDの数字 >= 全データID数字) を満たすデータの個数をそれぞれ取得
            foreach($todo_ID as $key => $val)
            {
        
                $sql2 = 'SELECT COUNT(*) FROM posts WHERE ID<=?';
                $stmt2 = $dbh->prepare($sql2);
                $data[0] = $val;
                $stmt2->execute($data);
                $rec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        
                $onnum[] = $rec2['COUNT(*)'];
                
            }
    
        }

        define('MAX','5');
        //あいまい検索にかかったタイトルを表示。そのままリンクで飛べる。
        for($i = 0; $i < $todo_num; $i++)
        {
            if(empty($todo_ID[$i]))
            {
                break;
            }
            print '<a href="todoapp_list.php?page_id='.ceil($onnum[$i] / MAX).'">';
            print $todo_title[$i];
            print '</a>';
            print '</br>';
    
        }

        // return array($todo_num, $todo_ID[], $todo_title[], $todo_content[], $todo_created_at[], $onnum[]);

    }

}

?>