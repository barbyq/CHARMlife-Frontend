<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$articulosDAO = new articulosDAO($dbc);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARMlife Personalidades</title>
	<meta charset="utf-8">
  	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="assets/js/all.js"></script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper contenido personalidades">
		<section class="col2">
			<section class="main">
				<?php $personalidades = $articulosDAO->getArticulosByArea('Personalidades', 3); 
					foreach ($personalidades as $item) { 
						$imgs = scandir($dir .'charmadmin/MasCharm/'.$item->articulo_id . '/');
						?>
					<a href="articulo.php?id=<?= $item->articulo_id ?>">
						<img src="<?= $dir .'charmadmin/MasCharm/'.$item->articulo_id .'/' . $imgs[2] ?>">
						<h3><?= $item->titulo ?><br>	
							<span><?= $item->subtitulo ?></span>
						</h3>
					</a>		
				<?php } ?>
			</section>
			<br class="clear">
			<section class="mini_features expanded">
				<header>
					<h1>Videos</h1>
				</header>
				<section class="body">
					<?php  $videos = $articulosDAO->getVideosByArea( 'Personalidades', 4);
					 	foreach ($videos as $item) { 
					 		$imgs = scandir($dir .'charmadmin/Thumbnails/'.$item->articulo_id . '/');	
					 	?>
						<article>
							<h3><span><?= $item->titulo ?></span></h3>
							<img src="<?= $dir .'charmadmin/Thumbnails/'.$item->articulo_id . '/' . $imgs[2] ?>">
						</article> 		
					 <?php	}
					 ?>
				
					<br class="clear">
				</section><!-- body -->
			</section><!-- mini_features -->


			<section class="mini_features expanded">
				<header style="width:944px;">
					<h1 style="left:15px; font-size:31px;">Personalidades Anteriores</h1>
				</header>
				<section class="body_">
					<article>
						<img src="assets/img/prueba/personalidades_thumb.jpg">
						<section class="info">
							<p class="section">PROFILE</p>

							<h3>Maricarmen Lugo</h3>
							<p class="fecha">17/7/2013</p>
							<h4>Subtitulo</h4>
						</section>
					</article> 

					<article>
						<img src="assets/img/prueba/personalidades_thumb.jpg">
						<section class="info">
							<p class="section">PROFILE</p>

							<h3>Maricarmen Lugo</h3>
							<p class="fecha">17/7/2013</p>
							<h4>Subtitulo</h4>
						</section>
					</article> 

					<article>
						<img src="assets/img/prueba/personalidades_thumb.jpg">
						<section class="info">
							<p class="section">PROFILE</p>

							<h3>Maricarmen Lugo</h3>
							<p class="fecha">17/7/2013</p>
							<h4>Subtitulo</h4>
						</section>
					</article> 

					<article>
						<img src="assets/img/prueba/personalidades_thumb.jpg">
						<section class="info">
							<p class="section">PROFILE</p>

							<h3>Maricarmen Lugo</h3>
							<p class="fecha">17/7/2013</p>
							<h4>Subtitulo</h4>
						</section>
					</article> 

					<article>
						<img src="assets/img/prueba/personalidades_thumb.jpg">
						<section class="info">
							<p class="section">PROFILE</p>

							<h3>Maricarmen Lugo</h3>
							<p class="fecha">17/7/2013</p>
							<h4>Subtitulo</h4>
						</section>
					</article> 

					<article>
						<img src="assets/img/prueba/personalidades_thumb.jpg">
						<section class="info">
							<p class="section">PROFILE</p>

							<h3>Maricarmen Lugo</h3>
							<p class="fecha">17/7/2013</p>
							<h4>Subtitulo</h4>
						</section>
					</article> 


					<br class="clear">
				</section><!-- body_ -->
			</section><!-- mini_features -->
		</section>
		<section class="col3">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/3/3_1.gif?1371660475" class="ad">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/4/4_1.gif?1371660475" class="ad">
		</section>
	</section>
	<br class="clear">
	<?php include "assets/templates/footer.php" ?>
</body>
</html>