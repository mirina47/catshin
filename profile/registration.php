<?php
  session_start();
 ?>
<!doctype html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
        <link href="registration_login.css" type="text/css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.3">
        <!--<script src="jquery-3.6.0.min.js" type="text/javascript"></script>-->
    </head>

    <body>
        <form action="vendor/signup.php" method="post">
            <div class="registration_login">
                <h1>Регистрация</h1>
                <input type="text" placeholder="Логин" name="login" required>
                <input type="text" placeholder="Email" name="email" required>
                <input type="password" placeholder="Пароль" name="psw" required>
                <input type="password" placeholder="Повторите пароль" name="psw-repeat" required>
                <p><a href="login.php">Если вы уже зарегистрированы, нажмите сюда</a></p>
                <button type="submit" class="my_button">Зарегистрироваться</button>
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
