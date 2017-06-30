<?php defined("CATALOG") or die("Access denied"); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
<div class="wrapper">
	<header>
		<?php if(isset($page_alias)): ?>
		<div class="header_top">
			<div class="pic">
				<div class="header_logo">
					<img src="<?=PATH?>views/img/logo.png" alt="">
				</div>
			</div>
		</div>
		<div class="header_bottom">
			<div class="container">
				<nav class="header_nav">
                <?php include "_menu.php"; ?>
				</nav>
			</div>
		</div>
		<?php else:?>
		<div class="header_bottom">
			<div class="container">
				<nav class="header_nav">
                <?php include "_menu.php"; ?>
				</nav>
			</div>
		</div>
       <?php endif;?>
	</header>