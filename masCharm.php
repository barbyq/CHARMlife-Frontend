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
	<title>CHARMlife +CHARM</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="assets/js/all.js"></script>
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
		    columnWidth: 320
		  });
		});


		 });
	</script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper masCharm contenido">
		<section class="col2">
			<nav>
				<header>
					<h2>Selecciona tus intereses</h2>
				</header>
				<ul class="interests">
					
					<li class="selected">Arte</li>
					<li>Belleza</li>
					<li>Cine</li>
					<li>Decoración</li>
					<li>Drinks</li>
					<li>Ecología</li>
				</ul>
			</nav>
			<section class="grid">
				<article class="box">
					<img src="assets/img/prueba/1.jpg">
					<h2>En Pareja</h2>
					<p>Cuando inicia una relación de pareja, es común que ambos tengan una percepción idealizada del otro.</p>
				</article>

				<article class="box">
					<img src="assets/img/prueba/4.jpg">
					<h2>Tom Ford</h2>
					<p>Creativo, inteligente, espiritual, tenaz, romántico, exitoso.</p>
				</article>
				
				<article class="box">
					<img src="assets/img/prueba/3.jpg">
					<h2>Tom Ford</h2>
					<p>Creativo, inteligente, espiritual, tenaz, romántico, exitoso.</p>
				</article>

				<article class="box">
					<img src="assets/img/prueba/4.jpg">
					<h2>Tom Ford</h2>
					<p>Creativo, inteligente, espiritual, tenaz, romántico, exitoso.</p>
				</article>

				<article class="box">
					<img src="assets/img/prueba/3.jpg">
					<h2>Tom Ford</h2>
					<p>Creativo, inteligente, espiritual, tenaz, romántico, exitoso.</p>
				</article>

				<article class="box">
					<img src="assets/img/prueba/1.jpg">
					<h2>En Pareja</h2>
					<p>Cuando inicia una relación de pareja, es común que ambos tengan una percepción idealizada del otro.</p>
				</article>
				
			</section><!-- grid -->
		</section><!-- left -->
		<section class="col3">
			<br><br>
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/3/3_1.gif?1371660475" class="ad">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/4/4_1.gif?1371660475" class="ad">
			
			<section class="tabbed_info">
				<header>
					<h3 class="selected">Esta Semana</h3>
					<h3>Este mes</h3>
					<h3>Anteriores</h3>
					<br class="clear">
				</header>
				<section class="body">
					<ul>
						<li>* Spring Eyes, Natural Beauty</li>
						<li>* Kitchen Garden</li>
						<li>* Dress like a hipster</li>
						<li>* Float like a butterfly, sting like a bee</li>
					</ul>
				</section>

			</section><!-- tabbed_info-->


		</section><!-- col3 -->
	</section><!-- wrapper masCharm -->
	<br class="clear">
	<?php include 'assets/templates/footer.php'; ?>
</body>
</html>