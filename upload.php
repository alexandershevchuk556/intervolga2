<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Document</title>
</head>
<body>
   <form action="/upload.php" enctype="multipart/form-data" method="POST">
    <input name="file" type="file" placeholder="File">
    <button type="submit">submit</button>
</form>
 
</body>
</html>



<?php

$fh = fopen($_FILES['file']['tmp_name'], 'r');


while (($data = fgetcsv($fh, 1000, ",")) !== FALSE) {
    file_put_contents('upload/'. $data[0], $data[1]);
}
fclose($fh);

/**
 * Такая загрузка файлов без фильтрации может поспособствовать DOS атакам. 
 * Также мы не проверяем содержимое и не как его не экранируем. 
 * Выбрать формат и название файла при загрузке можно любое. И если при простом хранении файлов 
 * проблем может не возникать, то при работе с его необработанным содержимым может. 
 * Например если выводить не экранированные данные в файле ccc.html мы увидим "Заголовок" жирным шрифтом. 
 * Тоже самое будет если использовать вместо html - js. 
 * Так что нужно обязательно фильтровать и экранировать любые вводы от пользователя.  
 */