<?php
defined("CATALOG") or die("Access denied");

include "models/main_model.php";
include "models/login_model.php";

if(isset($_POST['log_in'])){
    authorization();
    redirect();
} else {
    header("Location:".PATH);
}
