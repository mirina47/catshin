<?php
    session_start();
    require_once('vendor/connect.php');
    require_once('../cat.php');

    //$name_table = $_SESSION['user']['name'];
    //генерируем кота, который выпадет пользователю
    $cat = new Cat(1, 1, 1, 1, 1, 1, 1, 1);
    $cat->generateCat();
    $cat->printCat();


    $name_table = $_SESSION['user']['name'];
    $bg = $cat->bg;
    $color = $cat->color;
    $tail = $cat->tail;
    $body = $cat->body;
    $head = $cat->head;
    $eyes = $cat->eyes;
    $eyes_color = $cat->eyes_color;
    $sql = "INSERT INTO `$name_table` (`bg`, `color`, `tail`, `body`, `head`, `eyes`, `eyes_color`) VALUES ('$bg', '$color',
    '$tail', '$body', '$head', '$eyes', '$eyes_color')";
    $connect->query($sql);

    echo "ok";
?>