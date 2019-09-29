<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
$curses = json_decode(file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5'));
?>
<div class="container">
    <br>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/exchange/content/') :?> active <?php endif; ?>"
               href="/exchange/content/">Обмен Валют</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/exchange/content/history.php') :?> active <?php endif; ?>"
               href="/exchange/content/history.php">История обменов</a>
        </li>
    </ul>
</div>