<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/download/" method="post" name="file_DL">
        <input type="hidden" name="files_CSV">
    </form>
    <a href="javascript:void(0)" onclick="document.file_DL.submit();return false;">ダウンロード</a>
</body>
</html>