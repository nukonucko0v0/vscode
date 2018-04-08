<?php import('app/views/header.php') ?>
<main>
    <form action="/upload/" method="post" enctype="multipart/form-data">
    <div>
        <input type="file" name="upfile" id="" class="input_file">
    </div>
    <div>
        <input type="text" name="text" id="" class="input_text">
    </div>
    <div>
        <input type="submit" value="アップロード">
    </div>
    </form>
</main>
<?php import('app/views/footer.php') ?>
