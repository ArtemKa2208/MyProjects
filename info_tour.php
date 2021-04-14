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
      <div class ='content'>
      
            <?php
                  $id = $_POST['id'];
                  $mysql = new mysqli('localhost','root','root','tomtravel');
                  $result = $mysql->query("SELECT * FROM `tours` WHERE `id` ='$id'");
                  $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $price = $row['price'];
                        $first_date = $row['first_date'];
                        $second_date = $row['second_date'];
                        $star = $row['stars'];
                        $supply = $row['supply'];
                        $short_description = $row['short_description'];
                        $long_description = $row['long_description'];
                        $show_img = base64_encode($row['preview']); ?>
                        <div class = 'info_about_tour_div'>
                              <p class = 'info_about_tour_name'><?=$name?></p>
                              <div class = 'div_info_photos_arr'>
                              <button class = 'button_for_slide button_left_for_slide'>Left</button>
                              <?php
                                    $res = $mysql->query("SELECT * FROM `photo` WHERE `count` ='$id'");
                                    while($row_photo = mysqli_fetch_assoc($res)){
                                          $photos = base64_encode($row_photo['photo']);?>
                                          <img class = 'arr_of_photo' src="data:image/*;base64, <?php echo $photos ?>" alt="" >
                                    <?php } ?>
                              <button class = 'button_for_slide button_right_for_slide'>Right</button>
                              </div>
                              <p class = 'text_program_tour'>Программа тура</p>
                              <p class = 'long_description_of_tour'><?=$long_description?></p>
                              <div class = 'main_div_users_contacts'>
                                    <div class = 'div_for_selected_tour'>
                                          <p class = 'chosen_tour_text'>Выбраный тур</p>
                                          <div class = 'div_for_selected_tour_div_img'>
                                                <img class = 'div_for_selected_tour_img' src="data:image/*;base64, <?php echo $show_img ?>" alt="" >
                                          </div>
                                          <p class = 'div_for_selected_tour_name'><?=$name?></p>
                                          <p class = 'text_all_tours'><b>Дата заезда: </b><i><?=$first_date?></i></p>
                                          <p class = 'text_all_tours'><b>Дата выезда: </b><i><?=$second_date?></i></p>
                                          <p class = 'text_all_tours'><b>К-во звезд: </b><i><?=$star?></i></p>
                                          <p class = 'text_all_tours'><b>Питание: </b><i><?=$supply?></i></p>
                                          <p class = 'div_for_selected_tour_price'><b></b><i><?=$price?>€</i></p>
                                    </div>
                                    <div class = "div_for_form_contact_user">
                                          <form action="user_contacts.php" method="post">
                                                <p class = 'p_your_contacts'>Ваши контакты</p>
                                                <label class = 'div_for_form_contact_user_label' for="">Имя</label>
                                                <input name = 'name' class = 'div_for_form_contact_user_input'  type="text" autocomplete="off">
                                                <label class = 'div_for_form_contact_user_label'  for="">Телефон</label>
                                                <input name ='phone' class = 'div_for_form_contact_user_input' type="phone" autocomplete="off">
                                                <label class = 'div_for_form_contact_user_label'  for="">Email</label>
                                                <input name ='email' class = 'div_for_form_contact_user_input' type="email" autocomplete="off">
                                                <input type="hidden" name="id" value = <?=$id?> />
                                                <?php if ($_COOKIE['login'] != ''): ?>
                                                <button class='div_for_form_contact_user_button'>Отправить</button>
                                                <?php else: ?>
                                                <a class = "message_for_auth_in_info_form" href="auth.php">Авторизоваться</a>
                                                <?php endif ?> 
                                          </form>
                                    </div>
                              </div>
                              
                        </div>
            <p class = 'p_comments_of_chosen_tour'>ОСТАВИТЬ ОТЗЫВ</p>
            <div class = 'main_div_comments'>
            <?php if ($_COOKIE['login'] != ''): ?>
                  <div class = 'create_comments'>
                        <form action="add_comments.php" method = 'post' enctype="multipart/form-data" >
                              <!-- <input name = 'comment' type="text"  placeholder = 'Вы можете оставить тут свой отзыв' autocomplete="off"> -->
                              <textarea name="comment" id="" cols="30" rows="10" placeholder = 'Вы можете оставить тут свой отзыв'></textarea>
                              <label class = 'add_file_to_comment_label'>Прикрепить фото:</label>
                              <input name = 'add_file_to_comment[]' class = 'add_file_to_comment' type="file" multiple accept="image/*">
                              <button class = 'add_com_button'>Отправить</button>
                              <input type="hidden" name = 'idTour' value = <?=$id?>>
                        </form>
                  </div>
                  <?php else: ?>
                  <a class = "message_for_auth_in_info" href="auth.php">Авторизуйтесь чтобы оставить отзыв</a>
                  <?php endif ?> 
                  <p class = 'p_comments_of_chosen_tour'>ОТЗЫВЫ О ВЫБРАНОМ ТУРЕ</p>
                  <div class = 'all_comments'>
                        <?php
                              $comm = $mysql->query("SELECT * FROM `comments` WHERE `idTour` = '$id'");
                              while($row_comm = mysqli_fetch_assoc($comm)){
                                    $id_for_photos = $row_comm['id'];
                                    $comment = nl2br($row_comm['comment']);
                                    $name = $row_comm['name'];?>
                                    <div class = 'div_comment'>
                                    <p class = 'name_comment'><?=$name?></p>
                                    <p class = 'p_comment'><?=$comment?></p>
                                    <div class = 'box_for_image_in_comments divnum<?php echo $id_for_photos?>'>
                                   
                                    <!-- <button class = 'img_comment_button_left'>Left</button> -->
                                    <?php
                                    $comm_photo = $mysql->query("SELECT `photo`,`count` FROM `photo_comments` WHERE `count` = '$id_for_photos'");
                                    $cout_text_on_photo = 0;
                                    while($row_comm_photo = mysqli_fetch_assoc($comm_photo)){
                                          $photo = base64_encode($row_comm_photo['photo']);
                                          $count = $row_comm_photo['count'];
                                          if($cout_text_on_photo != 1){
                                                $cout_text_on_photo++;?>
                                                <p class = 'text_under_photo_in_comments'>Смотреть фото</p>
                                          <?php } ?>
                                          <img  class = 'photo_in_comments photonum<?php echo $count?>' src="data:image/*;base64,<?php echo $photo ?>" alt="" >
                                    <?php } ?>
                                    <!-- <button class = 'img_comment_button_right'>Right</button> -->
                                    </div>
                                    </div>
                              <?php } ?>
                  </div>
            </div>
            <!-- <section id="deletethis">
    </section> -->
          
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
<script src="slider.js"></script>
</body>
</html>