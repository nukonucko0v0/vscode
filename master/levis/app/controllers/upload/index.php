<?php
    /**
     * アップロードされたファイルの判定・操作
     * @param post $_FILES
     * @param string $file_category
     * @return string $reesults
     *
     */
    function upload_files($_files, $file_category) {

        if (is_uploaded_file($_files["upfile"]["tmp_name"])) {

            $file_tmp_name = $_files['upfile']['tmp_name'];
            $file_name = $_files['upfile']['name'];

            if (pathinfo($file_name, PATHINFO_EXTENSION) != $file_category) {
                $results = '.' . $file_category . 'ファイルのみ対応しています。';
            } else {
                $file_directory = MAIN_APPLICATION_PATH . '/app/files/';
                if ($file_category == 'csv') {
                    if (($fp = fopen($_files['upfile']['tmp_name'], "r")) === false) {
                        //エラー処理
                    }
                    // CSVの中身がダブルクオーテーションで囲われていない場合に一文字目が化けるのを回避

                    setlocale(LC_ALL, 'ja_JP');
                    $i=0;
                    while (($line = fgetcsv($fp)) !== FALSE) {
                        mb_convert_variables('UTF-8', 'sjis-win', $line);
                        if($i == 0){
                            // タイトル行
                            $header = $line;
                            $i++;
                            continue;
                        }

                        $data[] = $line;

                        $i++;
                    }
                    fclose($fp);
                    debug($data);
                }


                if (move_uploaded_file($_files["upfile"]["tmp_name"], $file_directory . $_files["upfile"]["name"])) {
                    chmod($file_directory . $_files["upfile"]["name"], 0644);
                    $results = $_files["upfile"]["name"] . "をアップロードしました。";
                } else {
                    $results = "ファイルをアップロードできません。";
                }
            }

        } else {
           $results = "ファイルが選択されていません。";
        }
        return $results;
    }

    $_view['ttl'] = 'ファイルアップロード｜ようこそ！チュートリアルへ';
    $_view['h1_ttl'] = 'ファイルアップロード';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $file_category = isset($_POST['file_mode']) ? $_POST['file_mode']  : '';
        switch ($file_category) {
            case 'txt':
            case 'csv':
                $_view['message'] = upload_files($_FILES, $file_category);
                break;
            case 'img':
                break;
            default:
                $_view['message'] = "ファイルが選択されていません。";
                break;
        }
    }