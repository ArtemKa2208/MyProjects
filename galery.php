<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>
<body>
      <header>
            <div class = 'header'>
                  <img src="img/logo3.png" alt="" class = 'logo'>
                  <div class = 'navigation'>
                        <button onclick="location.href = 'index.php'">Главная</button>
                        <button onclick="location.href = 'tours.php'">Туры</button>
                        <button onclick="location.href = 'galery.php'">Галерея</button>
                        <button onclick="location.href = 'burning_tours.php'">Горящие туры</button>
                  <?php if ($_COOKIE['login'] == ''): ?>
                        <button onclick="location.href = 'auth.php'">Войти</button>
                  <?php else: ?>
                        <button onclick="location.href = 'auth.php'"><?=$_COOKIE['login']?></button>   
                  <?php endif ?> 
                  </div>
            </div>
      </header>
      <div>
            <div class = 'in_developing'>
                  <p>В разработке</p>
            </div>
      </div>
</body>
</html>