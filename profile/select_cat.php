<?php

   session_start();
   require_once('vendor/connect.php');
   require_once('../cat.php');
   $cat1_path = '..'.substr($_GET['cat1'], 29);

   $name_table = $_SESSION['user']['name'];
   $sql = "SELECT * FROM `$name_table` WHERE `cat`= '$cat1_path'";

   $cat1 = 0;
   if($result = $connect->query($sql)){
        foreach($result as $row){
            $cat1 = new Cat($row["bg"], $row["color"], $row["tail"], $row["body"],
            $row["head"], $row["eyes"], $row["eyes_color"]);
        }
    }

    $cat2_path = '..'.substr($_GET['cat2'], 29);
    $sql = "SELECT * FROM `$name_table` WHERE `cat`= '$cat2_path'";
    $cat2 = 0;
    if($result = $connect->query($sql)){
        foreach($result as $row){
            $cat2 = new Cat($row["bg"], $row["color"], $row["tail"], $row["body"],
            $row["head"], $row["eyes"], $row["eyes_color"]);
        }
    }

    $kitty = new Kitty($cat1, $cat2);
    $bg = $kitty->bg;
    $color = $kitty->color;
    $tail = $kitty->tail;
    $body = $kitty->body;
    $head = $kitty->head;
    $eyes = $kitty->eyes;
    $eyes_color = $kitty->eyes_color;

    $sql = "INSERT INTO `$name_table` (`bg`, `color`, `tail`, `body`, `head`, `eyes`, `eyes_color`) VALUES ('$bg', '$color',
    '$tail', '$body', '$head', '$eyes', '$eyes_color')";
    $connect->query($sql);

    $kitty->printKitty();
    
?>
