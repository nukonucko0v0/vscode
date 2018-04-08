<?php
    $_view['ttl'] = 'ファイルアップロード｜ようこそ！チュートリアルへ';
    $_view['h1_ttl'] = 'ファイルアップロード';

    $file_directory = MAIN_APPLICATION_PATH . '/app/files/';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //一時ファイルができているか（アップロードされているか）チェック
        if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $file_directory . $_FILES["upfile"]["name"])) {
                chmod($file_directory . $_FILES["upfile"]["name"], 0644);
                echo $_FILES["upfile"]["name"] . "をアップロードしました。";
            } else {
                echo "ファイルをアップロードできません。";
            }
        } else {
            echo "ファイルが選択されていません。";
        }
    }