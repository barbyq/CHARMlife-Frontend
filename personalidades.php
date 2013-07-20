<?php
	error_reporting(E_ALL);
	//ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$articulosDAO = new articulosDAO($dbc);
	$current = 'personalidades';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARMlife Personalidades</title>
	<meta charset="utf-8">
  	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/royalslider/skins/default/rs-default.css"> 
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">

	
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
	<script type="text/javascript" src="assets/js/all.js"></script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper contenido personalidades">
		<section class="col2">
			<section class="main">
				<?php $personalidades = $articulosDAO->getArticulosByArea('Personalidades', 0, 3); 
					foreach ($personalidades as $item) { 
						$imgs = scandir($dir .'charmadmin/MasCharm/'.$item->articulo_id . '/'); ?>
					<a href="articulo.php?id=<?= $item->articulo_id ?>">
						<img src="<?= $dir .'charmadmin/MasCharm/'.$item->articulo_id .'/' . $imgs[2] ?>">
						<h3><?= $item->titulo ?><br>	
							<span><?= $item->subtitulo ?></span>
						</h3>
					</a>		
				<?php } ?>
			</section>
			<br class="clear">
		</section>
		<section class="col3">
			<a href="https://es-es.facebook.com/VivaDanceAcademy" target="_blank"><img src="assets/banners/personalidades/3.jpg" class="ad"></a>
			<a href="http://itzel.lag.uia.mx/publico/index.php" target="_blank"><img src="assets/banners/personalidades/4.gif" class="ad"></a>
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
							<a href="video.php?id=<?= $item->articulo_id ?>">
								<h3><span><?= $item->titulo ?></span></h3>
								<img src="<?= $dir .'charmadmin/Thumbnails/'.$item->articulo_id . '/' . $imgs[2] ?>">
							</a>
						</article> 		
					 <?php } ?>
				
					<br class="clear">
				</section><!-- body -->
			</section><!-- mini_features -->


			<section class="mini_features expanded">
				<header style="width:944px;">
					<h1 style="left:15px; font-size:31px;">Personalidades Anteriores</h1>
				</header>
				<section class="body_">
					<?php  $articulos = $articulosDAO->getArticulosByArea('Personalidades', 3, 6);  
						foreach ($articulos as $item) {
							$imgs = scandir($dir .'charmadmin/Thumbnails/'.$item->articulo_id . '/');	
						 ?>
							<article>
								<img src="<?= $dir .'charmadmin/Thumbnails/'.$item->articulo_id . '/' . $imgs[2] ?>">
								<section class="info">
									<!--<p class="section">PROFILE</p>-->
									<h3><?= $item->titulo  ?></h3>
									<p class="fecha"><?= $item->fecha  ?></p>
									<h4><?= $item->subtitulo  ?></h4>
								</section>
							</article> 
					<?php	}
					?>

					<br class="clear">
				</section><!-- body_ -->
			</section> <!-- mini_features -->
	</section>
	
	<?php //include "assets/templates/footer.php" ?>
</body>
</html>