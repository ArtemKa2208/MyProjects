<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $mysql = new mysqli('localhost','root','root','tomtravel');
    $result = $mysql->query("SELECT `name`,`price`,`first_date`,`second_date`,`stars`,`supply`,`preview` FROM `tours` WHERE `id` = '$id' ");
    $row = mysqli_fetch_assoc($result);
        $name_tour = $row['name'];
        $price = $row['price'];
        $first_date = $row['first_date'];
        $second_date = $row['second_date'];
        $star = $row['stars'];
        $supply = $row['supply'];
        $show_img = $row['preview'];
    define('TELEGRAM_TOKEN', '1342866853:AAGgKOb7g6IEj9vfouR2PXueYCvf75KZIO4');
    define('TELEGRAM_CHATID', '538152883');
$token = "1342866853:AAGgKOb7g6IEj9vfouR2PXueYCvf75KZIO4";
//$txt = "Имя - $name <br>Номер телефона - $phone \nНазвание тура - $name_tour \nЦена - $price \nДата заезда - $first_date \nДата выезда - $second_date \nК-во звезд - $star \nТип питания - $supply \n";
$bot_url = "https://api.telegram.org/bot1342866853:AAGgKOb7g6IEj9vfouR2PXueYCvf75KZIO4/";
$chat_id = "538152883";
$arr = array(
     'Имя: ' => $name,
     'Номер телефона: ' => $phone,
     'Название тура: ' => $name_tour,
     'Цена: ' => $price,     'Дата заезда: ' => $first_date,
     'Дата выезда: ' => $second_date,
     'К-во звезд: ' => $star,
     'Тип питания: ' => $supply,
 );
 foreach($arr as $key => $value){
     $txt .= "<b>".$key."</b>".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");   
     header("Location:tours.php");
?>