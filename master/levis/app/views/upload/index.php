<?php import('app/views/header.php') ?>
<main>
    <form action="/upload/" method="post" enctype="multipart/form-data">
    <div>
        <select name="file_mode" id="file_select">
            <option value="txt">テキストファイル</option>
            <option value="csv">CSVファイル</option>
            <option value="img">イメージファイル</option>
        </select>
    </div>
    <div>
        <input type="file" name="upfile" id="" class="input_file">
    </div>
    <div>
        <input type="submit" value="アップロード">
    </div>
    </form>
    <div><?php h($_view['message']) ?></div>
</main>
<?php import('app/views/footer.php') ?>
