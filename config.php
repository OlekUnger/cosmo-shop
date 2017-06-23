<?php
defined("CATALOG") or die("Access denied");

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","apple");
define("PATH","http://catalog/");
define("PERPAGE",12);
//$option_perpage = array(12,18,24,30);

$connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or exit('No connection with database');
mysqli_set_charset($connection,'utf8') or exit('error charset');

//class DB {
//    public $connection;
//    public static function getConnection(){
//        $connection = new PDO("mysql:host=".DBHOST."; dbname=".DBNAME."; charset=UTF8", DBUSER,DBPASS) or exit('No connection with database');
//        return $connection;
//    }
//}
