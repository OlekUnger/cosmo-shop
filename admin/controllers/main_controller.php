<?php defined("CATALOG") or die("Access denied");

require_once "models/main_model.php";

check_remember();

if( !isset($_SESSION['auth']['is_admin']) || $_SESSION['auth']['is_admin'] != 1 ){
    $view = 'login';
}


