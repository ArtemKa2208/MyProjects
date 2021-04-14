<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
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
      <div class="content">
            <p class = 'p_burning_tours'>Горящие туры</p>
            <div class = 'div_for_text_and_currency'>
                  <p class = 'p_chose_currency'>Выберите валюту</p>
                  <div class = 'div_with_currency'>
                        <button class = 'USD'>USD</button>
                        <button class = 'UAH'>UAH</button>
                        <button class = 'RUB'>RUB</button>
                  </div>
            </div>
            <div class="all_tours">
            <input class = 'my_hidden_input' type="hidden" value = <?=$znak?>>
                  <?php
                        $rates = $_GET['pain'];
                        $znak = $_GET['znak'];
                        if($rates ==''){
                              $rates = 1;
                              $znak = '€';
                        }
                        $date = date('d-m-Y');
                        $weekend = 7*24*60*60;
                        $date_now_seconds =  strtotime($date);
                        $flag_burning_tour = false;
                        $mysql = new mysqli('localhost','root','root','tomtravel');
                        $result = $mysql->query("SELECT * FROM `tours`");
                        while($row = mysqli_fetch_assoc($result)){
                              $name = $row['name'];
                              $price = $row['price'];
                              $first_date = $row['first_date'];
                              $second_date = $row['second_date'];
                              $star = $row['stars'];
                              $supply = $row['supply'];
                              $id = $row['id'];
                              $new_price = ceil($price*$rates);
                              $show_img = base64_encode($row['preview']);
                              $correct_format = date_create_from_format('Y-m-d', $first_date);
                              $new_format = date_format($correct_format, 'd-m-Y');
                              $date_in_seconds = strtotime($new_format);
                              ?>
                              <?php if ((($date_in_seconds - $weekend) <= $date_now_seconds) && ( $date_now_seconds <= $date_in_seconds)):?>
                              <?php $flag_burning_tour = true; ?>
                              <div class = 'div_in_all_tours'>
                                    <img class = 'img_in_tour' src="data:image/*;base64, <?php echo $show_img ?>" alt="" >
                                    <p class = 'name_all_tours'><?=$name?></p>
                                    <p class = 'text_all_tours'><b>Цена: </b><i><?=$new_price?><b class='style_znak'><?=$znak?></b></i></p>
                                    <p class = 'text_all_tours'><b>Дата заезда: </b><i><?=$first_date?></i></p>
                                    <p class = 'text_all_tours'><b>Дата выезда: </b><i><?=$second_date?></i></p>
                                    <p class = 'text_all_tours'><b>К-во звезд: </b><i><?=$star?></i></p>
                                    <p class = 'text_all_tours'><b>Питание: </b><i><?=$supply?></i></p>
                                    <form action="info_tour.php" method = 'post'>
                                          <input type="hidden" name="id" value = <?=$id?> />
                                          <button  class = 'button_info_tour'>Подробнее</button>
                                    </form>
                              </div>
                              <?php endif ?> 
                        <?php } ?>
                     
            </div>
            <?php if(!$flag_burning_tour):?>
                              <p class = "warning_tours_is_not_find">Sorry, burning tours is not found</p> 
                              <img class = 'sad_cat' src="img/sad_cat.jpg" alt="">   
            <?php endif ?> 
      </div>
      <footer>
        <div class = 'contact_information'>
            <p class = 'header_contact'>Контактная информация</p>
            <a class='contact_text' href="tel:+380985757913">+380-98-575-791-3</a>
            <a class='contact_text' href="tel:+380507151093">+380-50-715-109-3</a>
            <p class='p_logo'>
            <a href="https://t.me/artem_maksimovich"><img class='contact_img' src="img/telegram.png" alt=""></a>
            <a href="viber://chat?number=380985757913"><img class='contact_img' src="img/viber.png" alt=""></a>
            <a href="https://m.me/artem.maksimovich22"><img class='contact_img' src="img/messenger.png" alt=""></a>
            </p>
        </div>
        <div class = 'teams_information'>
            <p class = 'header_contact'>Наши партнеры</p>
            <p class = 'p_logo'><img class='logo_team' src="img/coral.png" alt=""></p>
            <p class = 'p_logo'><img class='logo_team' src="img/tui.jpg" alt=""></p>
            <p class = 'p_logo'><img class='logo_team' src="img/join-up.png" alt=""></p>
        </div>
        <div class = 'adress_information'>
            <p class = 'header_contact'>Мы находимся</p>
            <p class = 'adress_text'>ул.Пятницкая 102</p>
            <p class = 'adress_text'>ул.Мира 79</p>
            <p class = 'adress_text'>ул.Защитников Украины 81</p>
        </div>
    </footer>
    <script src="burning.js"></script>
</body>
</html>