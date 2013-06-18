<?php 
	/*error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$dir = '../charmadmin/';
	include $dir . 'dbc/dbconnect.php';
	include $dir . 'dbc/portadasDAO.php';
	include $dir . 'dbc/utilities.php';
	$dbconnect = new dbconnect('charm_charmlifec536978');*/
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARMlife</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.masonry.min.js"></script>
	<script type="text/javascript">
		$(function(){
		    /*$('.grid').masonry({
		      itemSelector: '.box',
		      columnWidth: 220
		    });*/

		var $container = $('.grid');
		$container.imagesLoaded( function(){
		  $container.masonry({
		    itemSelector : '.box',
		    columnWidth: 220
		  });
		});


		 });
	</script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper masCharm contenido">
		<section class="grid">
			<img src="assets/img/prueba/1.jpg" class="box">
			<img src="assets/img/prueba/4.jpg" class="box">
			<img src="assets/img/prueba/3.jpg" class="box">
			<img src="assets/img/prueba/4.jpg" class="box">
			<img src="assets/img/prueba/4.jpg" class="box">
			<img src="assets/img/prueba/3.jpg" class="box">
			<img src="assets/img/prueba/1.jpg" class="box">
			<img src="assets/img/prueba/3.jpg" class="box">
			<img src="assets/img/prueba/4.jpg" class="box">
			<img src="assets/img/prueba/3.jpg" class="box">
			<img src="assets/img/prueba/1.jpg" class="box">
			<img src="assets/img/prueba/3.jpg" class="box">
		</section>
		<section class="col3">
			<p>Too</p>
		</section>
	</section><!-- wrapper masCharm -->
</body>
</html>