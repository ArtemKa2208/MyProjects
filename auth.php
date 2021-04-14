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
      <?php if ($_COOKIE['login'] == ''): ?>
      <div class = 'div_form_auth'>
            <form action="login.php" method="post">
                  <p class = ''>Авторизация</p>
                  <label class="form_auth_label" for="">Логин</label>
                  <input name="name" type="text">
                  <label class="form_auth_label" for="">Пароль</label>
                  <input name="password" type="password">
                  <button>Войти</button>
                  <a href="registration.php">Регистрация</a>
            </form>
      </div>
      <?php endif ?> 
      <?php if ($_COOKIE['login'] == 'adm_in_2002'): ?>
            <div class = 'div_form_add_tour'>
            <!-- enctype="multipart/form-data" -->
            <form enctype="multipart/form-data" action="bd_tour.php" method="post">
                  <p class = ''>Добавить тур</p>
                  <label class="form_add_tour_label" for="">Название тура</label>
                  <input name="tour_name" type="text">
                  <label class="form_add_tour_label" for="">Цена тура в $</label>
                  <input name="price" type="text">
                  <label class="form_add_tour_label" for="">Короткое описание тура</label>
                  <input name="short_description" type="text">
                  <label class="form_add_tour_label" for="">Полное описание тура</label>
                  <textarea name="long_description"  cols="30" rows="10"></textarea>
                  <label class="form_add_tour_label" for="">Количество звезд</label>
                  <select name = "stars">
                        <option value=”1”>1</option>    
                        <option value=”2”>2</option> 
                        <option value=”3”>3</option>
                        <option value=”4”>4</option>
                        <option value=”5”>5</option>
                  </select>
                  <label class="form_add_tour_label form_add_tour_label_date" for="">Дата заезда/выезда</label>
                  <input name = "first_date" type="date">
                  <input name = "second_date" type="date">
                  <label class="form_add_tour_label" for="">Тип питания</label>
                  <select name = "supply">
                        <option value=”RO”>RO</option>    
                        <option value=”BB”>BB</option> 
                        <option value=”HB”>HB</option>
                        <option value=”FB”>FB</option>
                        <option value=”AI”>AI</option>
                        <option value=”UAI”>UAI</option>
                        <option value=”HB+”>HB+</option>
                        <option value=”FB+”>FB+</option>
                  </select>
                  <label class="form_add_tour_label form_add_tour_label_photo" for="">Превью</label>
                  <input type="file" name="preview" accept="image/*">
                  <label class="form_add_tour_label form_add_tour_label_photo" for="">Фото тура</label>
                  <input type="file" name="photo[]" multiple accept="image/*">
                  <button>Войти</button>
            </form>
      </div> 
      <button onclick="location.href = 'exit.php'">Exit</button>
      <?php endif ?>  
      <?php if ($_COOKIE['login'] != 'adm_in_2002' && $_COOKIE['login'] != ''): ?>
            <div class = 'in_developing'>
                  <p>В разработке</p>
            </div>
      <?php endif ?>  
</body>
</html>