<?php

require_once(__DIR__. '/../DB/dbc.php');

Class Likefind extends Dbc {

    // 検索されたキーワードをタイトルに含むやつを見つける
    public function likeSearch() {

        $like_title = $_GET['liketitle'];

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

        $array = array($todo_title, $onnum);
        return $array;

        $dbh = null;

    }

}

?>