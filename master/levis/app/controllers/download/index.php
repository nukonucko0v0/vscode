<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        //パス
        $fpath = MAIN_APPLICATION_PATH . '/app/files/test.txt';
        //ファイル名
        $fname = 'element.txt';

        header('Content-Type: application/force-download');
        header('Content-Length: '.filesize($fpath));
        header('Content-disposition: attachment; filename="'.$fname.'"');
        readfile($fpath);
        exit;
    }