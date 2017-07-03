<?php
error_reporting(-1);
define("CATALOG", true);
include 'config.php';
require_once 'vendor/autoload.php';


$faker = Faker\Factory::create();
for ($i = 1; $i<40; $i++) {
    global $connection;

    $title = $faker->word.'-'.$faker->randomNumber($nbDigits=2,$strict=false);
    $parent = $faker->numberBetween($min = 320, $max = 322);
    $content = $faker->text;
    $price = $faker->randomFloat($nbMaxDecimals = 2, $min = 20.00, $max = 80.00);
    $query = "INSERT INTO products (title,parent,content,price) VALUES ('$title',$parent,'$content',$price)";
    $res = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0) {
        echo 'yes';
    }
}

