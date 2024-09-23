<?php
  session_start();
  require_once('connect.php');

  $login = $_POST['login'];
  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $psw_r = $_POST['psw-repeat'];

  if ($psw === $psw_r) {
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login`='$login'");
    //echo mysqli_num_rows($check_user);
    if (mysqli_num_rows($check_user) > 0) {
      $_SESSION['message'] = 'Пользователь с таким логином уже существует';
      header('Location: ../registration.php');
    }
    else {
    mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES (NULL, '$login', '$psw', '$email')");
    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../login.php');
    }
  } else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../registration.php');
  }

 ?>
