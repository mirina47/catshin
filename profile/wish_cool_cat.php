<?php
    session_start();
    require_once('vendor/connect.php');
    require_once('../cat.php');

    //$name_table = $_SESSION['user']['name'];
    //генерируем кота, который выпадет пользователю


    $name_table = $_SESSION['user']['name'];
    $cool_cat = $_GET['cool_cat'];

    $name_table = $name_table."_"."cool";

    $sql = "INSERT INTO `$name_table` (`cool_cat`) VALUES ('$cool_cat')";
    $connect->query($sql);

    $sql = "SELECT COUNT(1) FROM $name_table";
    $ans = mysqli_query($connect, $sql);
    $num_rows = mysqli_fetch_row( $ans )[0];
    echo $num_rows;
?>