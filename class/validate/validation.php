<?php

Class Validation {

    //タイトルとコンテンツの文字が入っているか。また長過ぎないかのチェック
    public function validate($todo) {

        if($todo['title'] == '') {
            print('タイトルが入力されていません。');
            print '<input type="button" onclick="history.back()" value="戻る">';
            exit();
        }

        if(strlen($todo['title']) > 255) {
            print('タイトルは255字以内にしてください。');
            print '<input type="button" onclick="history.back()" value="戻る">';
            exit();
        }

        if(empty($todo['contents'])) {
            print('内容が入力されていません。');
            print '<input type="button" onclick="history.back()" value="戻る">';
            exit();
        }

    }

}

?>