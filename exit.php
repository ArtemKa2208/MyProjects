<?php
setcookie('login', $user['name'], time() + 3600*24 - 3600*24, "/");
header("Location:auth.php");
?>