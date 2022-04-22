<?php

Class Validation {

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

}

?>