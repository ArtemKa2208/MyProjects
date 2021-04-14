<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
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
      <div class = 'content'>
            <div class = 'div_form'>
                  <form class = "tours_form_search" action="" method="post">
                         <label>Страна</label>
                         <input required name = 'tour_name' class = 'tours_form_search_input' type="text">
                         <label>Дата заезда/выезда</label>
                         <input required name = 'first_date_search' class = 'tours_form_search_input' type="date">
                         <input required name = 'second_date_search' class = 'tours_form_search_input' type="date">
                         <label>Количество звезд</label>
                         <select name = 'stars_search'>
                               <option value=”1”>1</option>    
                               <option value=”2”>2</option> 
                               <option value=”3”>3</option>
                               <option value=”4”>4</option>
                               <option value=”5”>5</option>
                         </select>
                         <button name ='button_search_tour' class = 'tours_form_search_button'>Поиск</button>
                  </form> 
                
            </div>
            <p class = 'header_of_all_tour'>Доступные туры</p>
            <div class = 'div_for_text_and_currency'>
                  <p class = 'p_chose_currency'>Выберите валюту</p>
                  <div class = 'div_with_currency'>
                        <button class = 'USD'>USD</button>
                        <button class = 'UAH'>UAH</button>
                        <button class = 'RUB'>RUB</button>
                  </div>
            </div>
          
            <div class = 'all_tours'> 
            <?php
                $rates = $_GET['pain'];
                $znak = $_GET['znak'];
                if($rates ==''){
                      $rates = 1;
                      $znak = '€';
                }
                  if(isset($_POST['button_search_tour'])){
                        $tour_name = $_POST['tour_name'];
                        $first_date_search = $_POST['first_date_search'];
                        $second_date_search = $_POST['second_date_search'];
                        $stars_search = $_POST['stars_search'];
                        $mysql = new mysqli('localhost','root','root','tomtravel');
                        if(($tour_name != '') && ($first_date_search != '') && ($second_date_search != '') && ($stars_search != '')){
                              $result = $mysql->query("SELECT * FROM  `tours` 
                              WHERE  `name`= '$tour_name' AND `first_date` = '$first_date_search' AND `second_date` ='$second_date_search' AND `stars` = '$stars_search'");
                        };

                        // $result = $mysql->query("SELECT * FROM  `tours` WHERE  `name`= '$tour_name'");
                        $row_count = mysqli_fetch_assoc($result);
                        if(count($row_count) == 0){ ?>
                              </div>
                              <p class = 'p_not_found_search'>Увы, по вашему запросу ничего не найдено</p>
                        <?php } ?>
                        <?php
                       if(($tour_name != '') && ($first_date_search != '') && ($second_date_search != '') && ($stars_search != '')){
                             
                        $result = $mysql->query("SELECT * FROM  `tours` 
                        WHERE  `name`= '$tour_name' AND `first_date` = '$first_date_search' AND `second_date` ='$second_date_search' AND `stars` = '$stars_search'");
                        };
                        while( $row = mysqli_fetch_assoc($result)){
                              $name = $row['name'];
                              $price = $row['price'];
                              $first_date = $row['first_date'];
                              $second_date = $row['second_date'];
                              $star = $row['stars'];
                              $supply = $row['supply'];
                              $id = $row['id'];
                              $_SESSION['id_tour'] = $id;
                              $new_price = ceil($price*$rates);
                              $show_img = base64_encode($row['preview']); ?>
                              <div class = 'div_in_all_tours'>
                              <img class = 'img_in_tour' src="data:image/*;base64, <?php echo $show_img ?>" alt="" >
                              <p class = 'name_all_tours'><?=$name?></p>
                              <p class = 'text_all_tours'><b>Цена: </b><i><?=$new_price?><b class='style_znak'><?=$znak?></b></i></p>
                              <p class = 'text_all_tours'><b>Дата заезда: </b><i><?=$first_date?></i></p>
                              <p class = 'text_all_tours'><b>Дата выезда: </b><i><?=$second_date?></i></p>
                              <p class = 'text_all_tours'><b>К-во звезд: </b><i><?=$star?></i></p>
                              <p class = 'text_all_tours'><b>Питание: </b><i><?=$supply?></i></p>
                              <button onclick="location.href = 'info_tour.php'" class = 'button_info_tour'>Подробнее</button>
                              </div>
                        <?php } ?>
                        <?php } ?>
                  
                  <?php
              
                  ?>
                  <input class = 'my_hidden_input' type="hidden" value = <?=$znak?>>
                  <?php
                  if(!isset($_POST['button_search_tour'])){
                  $mysql = new mysqli('localhost','root','root','tomtravel');
                  $result = $mysql->query("SELECT `name`,`price`,`first_date`,`second_date`,`stars`,`supply`,`preview`,`id` FROM `tours`");
                   while( $row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        $price = $row['price'];
                        $first_date = $row['first_date'];
                        $second_date = $row['second_date'];
                        $star = $row['stars'];
                        $supply = $row['supply'];
                        $id = $row['id'];
                        $new_price = ceil($price*$rates);
                        $show_img = base64_encode($row['preview']); ?>
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
                  <?php } ?>
                  <?php } ?>
                         
            </div>
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
   
    <script src="script.js"></script>
</body>
</html>