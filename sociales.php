<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';
	include $dir .'charmadmin/dbc/socialesDAO.php';
	include $dir . 'charmadmin/dbc/chismesDAO.php';
	
	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$socialesDAO = new socialesDAO($dbc);
	$chismesDAO = new chismesDAO($dbc);
	$articulosDAO = new articulosDAO($dbc);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARMlife Sociales</title>
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
	<section class="wrapper sociales contenido">
		<div class="sliderSociales">
			
			<div id="bigSlider" class="royalSlider rxDefault">
				<?php 
					$sociales = $socialesDAO->getLoMasNuevo(11);
					foreach ($sociales as $item) { 
							$thumb = scandir($dir .'charmadmin/SocThumb/'.$item->sociales_id);
							$main = scandir($dir .'charmadmin/SocPrincipal/'.$item->sociales_id);

						?>	
						
						<div class="rsContent">
							<a href="social.php?id=<?= $item->sociales_id ?>"><img src="<?= $dir ?>charmadmin/SocPrincipal/<?= $item->sociales_id . '/' . $main[2] ?>">
							<section class="rsABlock"><h2><?= $item->titulo ?></h2></section></a>
							<div class="rsTmb"><img src="<?= $dir ?>charmadmin/SocThumb/<?= $item->sociales_id . '/' .  $thumb[2] ?>"></div>
						</div>
				<?php } ?>
			</div>
			<div class="mancha_slider"></div>
		</div><!-- margin -->


		<section class="col2">
			<section class="mini_features">
				<header>
					<h1>+ Visto este mes</h1>
				</header>
				<section class="body">
					<?php 
						$sociales = $socialesDAO->getLoMasVistoEsteMes(6);
						foreach ($sociales as $item) { 
							$thumb = scandir($dir. 'charmadmin/SocThumb/'.$item->sociales_id);
					 ?>
					 	<article>
							<a href="social.php?id=<?= $item->sociales_id ?>">
							<h3><span><?= $item->titulo ?></span></h3>
							<img src="<?= $dir. 'charmadmin/SocThumb/'.$item->sociales_id . '/' . $thumb[2]  ?>">
							</a>
						</article>
					 <?php } ?>
					
					<br class="clear">
				</section><!-- body -->
			</section><!-- mini_features -->


			<section class="mini_features">
				<header>
					<h1>Eventos anteriores</h1>
				</header>
				<section class="body">
					<?php 
						$sociales = $socialesDAO->getEventosAnteriores(5);
						foreach ($sociales as $item) { 
							$thumb = scandir($dir. 'charmadmin/SocThumb/'.$item->sociales_id);
					 ?>
					 	<article>
							<a href="social.php?id=<?= $item->sociales_id ?>">
							<h3><span><?= $item->titulo ?></span></h3>
							<img src="<?= $dir. 'charmadmin/SocThumb/'.$item->sociales_id . '/' . $thumb[2]  ?>">
							</a>
						</article>
					 <?php } ?>
					<br class="clear">
				</section><!-- body -->
			</section><!-- mini_features -->

			<!--<section class="mini_features">
				<header>
					<h1>Lo + recomendado</h1>
				</header>
				<section class="body">
					<?php 
						$sociales = $socialesDAO->getLoMasRecomendado(6);
						foreach ($sociales as $item) { 
							$thumb = scandir($dir. 'charmadmin/SocThumb/'.$item->sociales_id);
					 ?>
					 	<article>
							<a href="social.php?id=<?= $item->sociales_id ?>">
							<h3><span><?= $item->titulo ?></span></h3>
							<img src="<?= $dir. 'charmadmin/SocThumb/'.$item->sociales_id . '/' . $thumb[2]  ?>">
							</a>
						</article>
					 <?php } ?>
					<br class="clear">
				</section><!-- body -->
			<!--</section><!-- mini_features -->

			<section class="box_feature amigos">
				<header>
					<h1>Amigos en las Redes</h1>
				</header>
				<table>
					<tr>
						<th><img src="assets/img/content/sociales/fb.png"></th>
						<th><img src="assets/img/content/sociales/insta.png"></th>
					</tr>
					<?php 
					$index = 2;
					$imgs = scandir($dir. 'charmadmin/Amigos/'); 
					for($i = 0; $i < 3; $i++){ ?>
						<tr>
							<td><img src="<?= $dir. 'charmadmin/Amigos/' .$imgs[$index] . '?' .strtotime("now") ?>"></td>
							<?php  $index++;  ?>
							<td><img src="<?= $dir. 'charmadmin/Amigos/' .$imgs[$index] . '?' .strtotime("now") ?>"></td>
							<?php  $index++;  ?>
						</tr>
					<?php } ?>
				</table>
			</section><!-- box_feature -->

			<section class="box_feature pasando">
				<header>
					<h1>¿Qué está pasando?</h1>
				</header>
				<section class="content">
					<?php  $chismes = $chismesDAO->getQueEstaPasando();
							foreach ($chismes as $item) { ?>
								<article>
									<h1 class="header"><?=  $item->titulo ?></h1>
									
									<h2 class="fecha"><?=  $item->fecha ?></h2>
									<?php if(!empty($item->texto)){ ?>
										<h1 class="texto"><?= $item->texto ?></h1>
									<?php } ?>

									<?php if(!empty($item->foto)){
											$imgs = scandir($dir. 'charmadmin/Chismes/' . $item->id . '/'); ?>
									 		<img class="thumb" src="<?=  $dir. 'charmadmin/Chismes/' .  $item->id .'/'. $imgs[2] ?>">
									<?php } ?>
									
									
									<?php if(!empty($item->link)){ ?>
										<br><a href="<?= $item->link ?>" class="link"><img src="assets/img/content/sociales/camara.png">&nbsp;&nbsp;VER + FOTOS</a>
									<?php }  ?>
									<br class="clear">
								</article>
					<?php	} ?>
				</section>
			</section><!-- box_feature -->
			<div style="text-align:right;">
				<a href="#" class="comparte_noticia"><img src="assets/img/content/sociales/correo.png"><img src="assets/img/content/sociales/flecha_correo.png"><span>Compártenos tus noticias</span></a>
			</div>

		</section><!-- col2 -->
		<section class="col3">
			<br><br>
			<a href="http://www.facebook.com/OpticaDelRosario" target="_blank"><img src="assets/banners/sociales/3.gif" class="ad"></a>
			<img src="" class="ad">
			
			<section class="tabbed_info">
				<header>
					<h3 class="selected">Este mes</h3>
					<!--<h3>Este mes</h3>
					<h3>Anteriores</h3>-->
					<br class="clear">
				</header>
				<section class="body">
					<?php $articulos = $articulosDAO->getRandomOfTheMonth(); ?>
					<ul>
						<?php foreach ($articulos as $item) { 
							if($item->tipo== 0){
								echo '<li><a href="articulo.php?id='. $item->articulo_id .'">*' .  $item->titulo . '</a></li>';
							}elseif($item->tipo == 1){
								echo '<li><a href="galeria.php?id='. $item->articulo_id .'">*' .  $item->titulo . '</a></li>';
							}else{
								echo '<li><a href="video.php?id='. $item->articulo_id .'">*' .  $item->titulo . '</a></li>';
							}
							?>
							
							
						<?php } ?>
					</ul>
				</section>

			</section><!-- tabbed_info-->
			<!--<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/3/3_1.gif?1371660475" class="ad">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/4/4_1.gif?1371660475" class="ad">-->

		</section><!-- col3 -->
		<br class="clear">
	</section>
	<?php include "assets/templates/footer.php" ?>
</body>
</html>