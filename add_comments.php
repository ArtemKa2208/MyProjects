<?php
$comment = $_POST['comment'];
$idTour = $_POST['idTour'];
$name = $_COOKIE['login'];
$add_file_to_comment = $_FILES['add_file_to_comment']['tmp_name'];
$mysql = new mysqli('localhost','root','root','tomtravel');
$mysql->query("INSERT INTO `comments` (`comment`,`idTour`,`name`)
VALUES ('$comment','$idTour','$name')");
$id =  $mysql->query("SELECT id FROM `comments` ORDER BY id DESC LIMIT 1");
$last_id = mysqli_fetch_assoc($id);
$realy_last_id = $last_id['id'];
for($i = 0; $i < count($add_file_to_comment); $i++){
      $photo = addslashes(file_get_contents($add_file_to_comment[$i]));
      $mysql->query("INSERT INTO `photo_comments` (`photo`,`count`)
      VALUES ('$photo','$realy_last_id')");
}
$mysql->close();
header("Location:tours.php");
?>