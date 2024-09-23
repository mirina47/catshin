<?php
    session_start();
    require_once('vendor/connect.php');
    $name_table = $_SESSION['user']['name']."_cool";
    $sql = "SELECT COUNT(1) FROM `$name_table`";
    $ans = mysqli_query($connect, $sql);
    $num_rows = mysqli_fetch_row( $ans )[0];




    $sql = "SELECT * FROM $name_table";

    $k = 0;

    $arr = "";
    if($result = $connect->query($sql)){
        foreach($result as $row){
            $arr = $arr." ".$row["cool_cat"];
        }
    }
    echo $arr;
?>