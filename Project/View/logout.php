<?php 
session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
    header("location: /ProjectEZ/View/login.php");
}
else {
    header("location: /ProjectEZ/View/login.php");
}

 ?>