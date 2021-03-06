<?php
define("CATALOG",true);
include 'config.php';
//require_once 'vendor/autoload.php';

$res = mysqli_query($connection, "SELECT id,title FROM products");
while ($row = mysqli_fetch_assoc($res)) {
    $data[$row['id']] = $row['title'];
}
foreach($data as $key=>$value){
    $val = str2url($value);
    mysqli_query($connection, "UPDATE products SET alias = '$val' WHERE id = $key");
}

$res = mysqli_query($connection, "SELECT id,title FROM categories");
while ($row = mysqli_fetch_assoc($res)) {
    $data[$row['id']] = $row['title'];
}
foreach($data as $key=>$value){
    $val = str2url($value);
    mysqli_query($connection, "UPDATE categories SET alias = '$val' WHERE id = $key");
}

function rus2translit($string)
{
    $converter = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
        'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    );
    return strtr($string, $converter);
}

function str2url($str)
{
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}



//$faker = Faker\Factory::create();
//for ($i = 1; $i<20; $i++) {
//    global $connection;
//    $title = $faker->swiftBicNumber;
////    $alias = str2url($title);
//    $parent = $faker->numberBetween($min = 100, $max = 106);
//    $content = $faker->text;
//    $price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 20.00, $max = 200.00);
//    $query = "INSERT INTO products (title,parent,content,price) VALUES ('$title',$parent,$content,$price)";
//    $res = mysqli_query($connection, $query);
//    if (mysqli_affected_rows($connection) > 0) {
//        echo 'yes';
//    }
//}