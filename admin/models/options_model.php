<?php
//массив настроек сайта для редактирования
function get_options(){
    global $connection;
    $query = "SELECT * FROM options";
    $res = mysqli_query($connection,$query);
    if($res){
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function save_options(){
    global $connection;
    $options = ['email','site_title','course'];
    if(!in_array($_POST['title'], $options)){
        return false;
    }
    $value = mysqli_real_escape_string($connection,$_POST['val']);
    $query = "UPDATE options SET value = '$value' WHERE title='{$_POST['title']}'";
    $res = mysqli_query($connection,$query);
    if(mysqli_affected_rows($connection)>0){
        return true;
    } else {
        return false;
    }
}