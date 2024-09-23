<?php
    session_start();
    require_once('vendor/connect.php');
    require_once('../cat.php');

    //$name_table = $_SESSION['user']['name'];
    //генерируем кота, который выпадет пользователю


    $name_table = $_SESSION['user']['name'];
    $acsess = $_GET['acsess'];

    $name_table = $name_table."_"."acces";

    $sql = "INSERT INTO `$name_table` (`access`) VALUES ('$acsess')";
    $connect->query($sql);

    echo $_SESSION['user']['name'];
?>