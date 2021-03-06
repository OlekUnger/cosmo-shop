<?php defined("CATALOG") or die("Access denied"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo PATH ?>views/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo PATH ?>views/css/style.css">
    <link rel="stylesheet" href="<?php echo PATH ?>views/css/jquery-ui.css">

    <title><?php if (isset($breadcrumbs)) {
            echo strip_tags(rtrim(str_replace(" ", "/", $breadcrumbs), '/'));
        } else {
            echo $page['title'];
        }; ?>
    </title>
</head>
<body>
