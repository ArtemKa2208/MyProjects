<?php
       $name  = $_POST['name'];
       $password = $_POST['password'];
       $password = md5($password."fgfgndjsjgfgsfskfei");
       $mysql = new mysqli('localhost','root','root','tomtravel');
       $result = $mysql->query("SELECT * FROM `users` WHERE name = '$name' AND password = '$password'");
       $user = mysqli_fetch_assoc($result);
       if(count($user) == 0){
             echo 'User is not found';
             exit();
       }else{
             setcookie('login', $user['name'], time() + 3600*24, "/");
             $mysql->close();
             header("Location:index.php");
       }

?>