<?php
  session_start();
  require_once('connect.php');

  $login = $_POST['login'];
  $psw = $_POST['psw'];
  $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$psw'");

  if(mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $name_table = $user['login'];
    $_SESSION['user'] = [
      "name" => $user['login']
    ];
    
    //создаем запрос для создания таблицы с именем пользователя
    $sql = "CREATE TABLE $name_table (
      id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      cat VARCHAR(30),
      bg INT(5) NOT NULL,
      color INT(5) NOT NULL,
      tail INT(5) NOT NULL,
      body INT(5) NOT NULL,
      head INT(5) NOT NULL,
      eyes INT(5) NOT NULL,
      eyes_color INT(5) NOT NULL,
      feature BIT DEFAULT 0
      )";

    mysqli_query($connect, $sql);//добавили таблицу в БД

    $name_table_acc = $name_table."_"."acces";
    $sql = "CREATE TABLE $name_table_acc (
      id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      access INT(10)
    )";
    mysqli_query($connect, $sql);

    $name_table_cool = $name_table."_"."cool";
      $sql = "CREATE TABLE $name_table_cool (
      id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      cool_cat INT(10)
    )";

    $dir_path = '../../user_cat/'.$name_table;
    if (!file_exists($dir_path)) {
      mkdir($dir_path, 0777, true);
    }
    mysqli_query($connect, $sql);
    header('Location: ../laboratory.php');
  }
  else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../login.php');
  };
 ?>
