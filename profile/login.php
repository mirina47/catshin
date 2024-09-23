<?php
  session_start();
 ?>
<!doctype html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Вход</title>
    <link href="registration_login.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.3">
        <!--<script src="jquery-3.6.0.min.js" type="text/javascript"></script>-->
    </head>
    <style>
        body {
        height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        background-color: #4A0F8A;
        background-image: url(images/main_page/space.png);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        justify-content: center;
        align-items: center;

         }
    </style>
    <body>
        <form action="vendor/signin.php" method="post">
            <div class="registration_login">
                <h1>Вход</h1>
                <input type="text" placeholder="Логин" name="login" required>
                <input type="password" placeholder="Пароль" name="psw" required>
                <p><a href="registration.php">Если вы еще не зарегистрированы, нажмите сюда</a></p>
                <button type="submit" class="my_button">Войти</button>
                <p class="index"><a href="index.html">Если вы хотите вернуться на главную страницу, нажмите сюда</a></p>
                <?php
                  if ($_SESSION['message']) {
                    echo '<p class="msg">'.$_SESSION['message'].'</p>';
                    unset($_SESSION['message']);
                  }
                 ?>
            </div>
        </form>
    </body>
</html>
