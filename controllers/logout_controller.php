<?php
defined("CATALOG") or die("Access denied");

require_once "models/main_model.php";

if(isset($_COOKIE['hash'])){
    $hash=mysqli_real_escape_string($connection,$_COOKIE['hash']);
    $query="UPDATE users SET remember='' WHERE remember='$hash'";
    mysqli_query($connection,$query);
    setcookie('hash','',time()-3600);
}
unset($_SESSION['auth']);
unset($_SESSION['reg']);
redirect();