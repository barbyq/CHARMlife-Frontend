<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';

	include $dir .'charmadmin/dbc/socialesDAO.php';
	
	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$socialesDAO = new socialesDAO($dbc);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARMlife</title>
	<meta charset="utf-8">
  	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 

	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
	<script type="text/javascript" src="assets/js/all.js"></script>
	<script type="text/javascript" src="assets/js/assets.js"></script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>

	<section class="wrapper contenido index">
		<section class="col2">
			<section class="col_big">
				<h1>hey</h1>
			</section>
			<section class="lomastop">
				<h1>Lo+ TOP</h1>
				<section class="body">
					<?php $sociales = $socialesDAO->getLoMasRecomendado(5);
						foreach ($sociales as $item) {
							$thumb = scandir($dir. 'charmadmin/SocThumb/'.$item->sociales_id); ?>
							<article>
								<a href="<?= 'social.php?id=' . $item->sociales_id ?>">
									<img src="<?= $dir. 'charmadmin/SocThumb/'.$item->sociales_id . '/' . $thumb[2]  ?>">
									<h2><?= $item->titulo ?></h2>
								</a>
							</article>		
					<?php	} ?>
			



				</section><!-- body -->
			</section><!-- col_small -->
		</section>
		<section class="col3">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/3/3_1.gif?1371660475" class="ad">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/4/4_1.gif?1371660475" class="ad">

			<section class="outfit">
				<header>
					<h1>Outfit de la Semana</h1>
				</header>
				<img src="assets/img/prueba/outfit.jpg">
			</section>
		</section>
	</section>
	<br class="clear">

	<?php include "assets/templates/footer.php" ?>
</body>
</html>