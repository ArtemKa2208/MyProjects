<?php
      $tour_name = $_POST['tour_name'];
      $price = $_POST['price'];
      $short_description = $_POST['short_description'];
      $long_description = $_POST['long_description'];
      $stars = $_POST['stars'];
      $first_date = $_POST['first_date'];
      $second_date = $_POST['second_date'];
      $supply = $_POST['supply'];
      $file = $_FILES['photo']['tmp_name'];
      $preview = addslashes(file_get_contents($_FILES['preview']['tmp_name']));

     
      // $test = $photo[0][0];

     
      $mysql = new mysqli('localhost','root','root','tomtravel');


      $mysql->query("INSERT INTO `tours` (`name`,`price`,`short_description`,`long_description`,`stars`,`first_date`,`second_date`,`supply`,`preview`)
      VALUES('$tour_name','$price','$short_description','$long_description','$stars','$first_date','$second_date','$supply','$preview')");

      $id =  $mysql->query("SELECT id FROM `tours` ORDER BY id DESC LIMIT 1");
      $last_id = mysqli_fetch_assoc($id);
      $realy_last_id = $last_id['id'];

     for($i = 0; $i < count($file); $i++){
            $photo = addslashes(file_get_contents($file[$i]));
            $mysql->query("INSERT INTO `photo` (`photo`,`count`) VALUES ('$photo','$realy_last_id')");
     }
   
      
      $mysql->close();
       header("Location:index.php");
?>