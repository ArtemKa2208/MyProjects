<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
</head>
<body class = 'auth_body'>
      <header>
            <div class = 'header'>
                <img src="img/logo.png" alt="" class = 'logo'>
                <div class = 'navigation'>
                  <button onclick="location.href = 'index.php'">Главная</button>
                  <button onclick="location.href = 'tours.php'">Туры</button>
                  <button>Галерея</button>
                  <button onclick="location.href = 'burning_tours.php'">Горящие туры</button>
                  <?php if ($_COOKIE['login'] == ''): ?>
                    <button onclick="location.href = 'auth.php'">Войти</button>
                <?php else: ?>
                    <button onclick="location.href = 'auth.php'"><?=$_COOKIE['login']?></button>   
                <?php endif ?> 
                </div>
            </div>
      </header> 
      <div class = 'div_form_auth'>
            <form action="regist.php" method="post">
                  <p class = ''>Регистрация</p>
                  <label class="form_auth_label" for="">Логин</label>
                  <input minlength="3" maxlength="40" name = "name" type="text">
                  <label class="form_auth_label" for="">Email</label>
                  <input name ="email" type="email">
                  <label class="form_auth_label" for="">Пароль</label>
                  <input minlength="8" maxlength="100" name = "password" type="text">
                  <button>Зарегистрироваться</button>
                  <a href="auth.php">Авторизация</a>
            </form>
      </div>
</body>
</html>