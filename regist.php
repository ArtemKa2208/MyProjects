<?php
      $name  = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password = md5($password."fgfgndjsjgfgsfskfei");
      $mysql = new mysqli('localhost','root','root','tomtravel');
      $mysql->query("INSERT INTO`users` (`name`,`email`,`password`)
      VALUES('$name','$email','$password')");
      $mysql->close();
      header("Location:auth.php");
?>