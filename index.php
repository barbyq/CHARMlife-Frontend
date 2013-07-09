<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/portadasDAO.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';
	include $dir .'charmadmin/dbc/utilities.php';
	include $dir .'charmadmin/dbc/socialesDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dibo = $dbconnect->getConnection();
	$portadasDAO = new portadasDAO($dibo);
 	$articulosDAO = new articulosDAO($dibo);
	$socialesDAO = new socialesDAO($dibo);
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
	<?php 
	function dametipo($tipo)
	 {
		switch ($tipo) {
			case '0':
				return "articulo.php?id=";
				break;
			case '1':
				return "galeria.php?id=";
				break;
			case '2':
				return "video.php?id=";
				break;
			case '3':
				return "tematica.php?id=";
				break;
			default:
				break;
		}
	}	
	function dameimagen($id)
	{
		$escaneo = scandir("charmadmin/Imagenes/".$id);
		$imagen = $escaneo[2];
		$ruta = "charmadmin/Imagenes/".$id."/".$imagen;
		return $ruta;
	} 
	function dameimagensocial($id)
	{
		$escaneo = scandir("charmadmin/SocPrincipal/".$id);
		$imagen = $escaneo[2];
		$ruta = "charmadmin/SocPrincipal/".$id."/".$imagen;
		return $ruta;
	}
	?>
	<section class="wrapper contenido index">
		<section class="col2">
			<section class="col_big">
				<?php $socialesnuevos = $socialesDAO->getSocialesNuevos(); ?>
				<section id="sliderSociales" style="width:325px;height:200px;" class="royalSlider rxDefault slidersoc">			
						<?php foreach ($socialesnuevos as $soci) { ?>
							<div>
								<a href="social.php?id=<?php echo $soci->sociales_id;?>">
									<img class="rsImg" src="<?php echo dameimagensocial($soci->sociales_id); ?>" alt="">
									<div class="rsABlock">
										<h2><?= $soci->titulo; ?></h2>
									</div>
								</a>
							</div>
						<? } ?>
				</section>

				<section class="fotos_feat">
					<?php $foto = $socialesDAO->getFotoMasCharm(); ?>
					<div id="clickFotoMasCharm">
						<img src="assets/img/content/medal_foto.png">
						<img src="<?= $dir . '/charmadmin/' . $foto->img ?>">
					</div>
					<div style="display:none;" id="fotoMasCharm">
						<img src="<?= $dir . '/charmadmin/' . $foto->img ?>">
					</div>
					<?php $sociales = $socialesDAO->getLoMasCompartido(1); 
						$item = $sociales[0];
						$thumb = scandir($dir. 'charmadmin/SocPrincipal/'.$item->sociales_id . '/'); ?>
					<div>
						<a href="<?= 'social.php?id=' . $item->sociales_id ?>">
						<img src="assets/img/content/medal_evento.png">
						<img src="<?= $dir . '/charmadmin/SocPrincipal/'. $item->sociales_id . '/' . $thumb[2] ?>">
						<h2><?= $item->titulo ?></h2>
						</a>
					</div>
					<br class="clear">
				</section>
				<h1 style="font-weight: 700; font-size: 23px; text-align: center; width: 326px;">Temática Mensual</h1>
				<section id="tematicamensual" style="width:325px;height:240px;" class="royalSlider rxDefault">
					<?php $tem = $articulosDAO->getArticulosTematicaMensual(); ?>
					<?php foreach ($tem as $ti) { ?>
						<div class="rsContent">
						<center>
							<a href="<?php echo dametipo($ti->tipo).$ti->articulo_id; ?>">
								<img src="<?php echo dameimagen($ti->articulo_id); ?>" alt="">
							</a>
							<div class="rsABlock">
								<h2><?php echo $ti->titulo; ?></h2>
							</div>
						</center>
						<div class="rsTmb">
							<img src="<?php echo dameimagen($ti->articulo_id); ?>" alt="">
						</div>
					</div>
					<? } ?>
				</section>
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
			<a href="http://www.facebook.com/OpticaDelRosario" target="_blank"><img src="assets/banners/home/3.gif" class="ad"></a>
			<a href="http://itzel.lag.uia.mx/publico/index.php" target="_blank"><img src="assets/banners/home/4.gif" class="ad"></a>
			<section class="outfit">
				<header>
					<h1>Outfit de la Semana</h1>
				</header>
				<?php $outfit = scandir($dir. 'charmadmin/Outfit/'); ?>
				<img src="<?= $dir. 'charmadmin/Outfit/' . $outfit[2]  ?>">
				<div class="texto">
				</div>
			</section>
		</section>
		<br class="clear"/>
		<br/>
		<section class="banners">
			<a href="mailto:contacto@charmlife.com.mx" target="_blank">
				<img src="assets/banners/home/5.gif" alt="">
			</a>
			<a href="http://www.instagram.com/charmtorreon" target="_blank">
				<img src="assets/banners/home/6.jpg" alt="">
			</a>
		</section>
		<br class="clear"/>
		<section class="lower">
			<div class="left">
				<div class="portada">
					<div class="wrap">
						<img class="arriba" src="assets/img/content/index/portadainteractiva.png" alt="">
						<div class="port">
							<?php $portadaultimate = $portadasDAO->getUltimaPortada(); ?>
							<img  class="imagen" src="/charmadmin/upload/portadas/<?php echo $portadaultimate->portadas_id; ?>/<?php echo $portadaultimate->img; ?>" alt="">
						</div>
					</div>
				</div>
				<br/>
				<div class="showsections">
					<?php $articleschidis = $articulosDAO->getMasCharm(0, 4); ?>
					<?php foreach ($articleschidis as $article) { ?>
						<article>
							<a href="<?php echo dametipo($article->tipo).$article->articulo_id; ?>">
							<div class="header-seccion"><p><?= $article->seccion; ?></p></div>
								<img src="<?php echo dameimagen($article->articulo_id); ?>" alt="">
								<div class="texto">
									<div class="paddingsin">
										<h1><?= $article->titulo?></h1>
										<h2><?php echo $article->subtitulo; ?></h2>
									</div>
								</div>
							</a>
						</article>
					<? } ?>
				</div>
			</div>
			<div class="right">
				<div class="lomasnuevo">
					<img src="assets/img/content/index/lomas.png" alt="">
					<?php $sociales = $socialesDAO->getLoMasNuevo(4); 
						foreach ($sociales as $item) { 
							$thumb = scandir($dir. 'charmadmin/SocThumb/'.$item->sociales_id); ?>
							<article>
								<a href="social.php?id=<?= $item->sociales_id ?>">
									<img src="<?= $dir. 'charmadmin/SocThumb/'.$item->sociales_id . '/' . $thumb[2]  ?>">
									<div class="texto clear">
										<h1><?= $item->titulo ?></h1>
										<h2><?= $item->subtitulo ?></h2>
									</div>
								</a>
							</article>		
					<?php	} ?>
				</div>
				<br>
				<br>
				<a href="http://www.playersoflife.com/losases" target="_blank"><img src="assets/banners/home/7.gif" class="ad"></a>
			</div>
		</section>
	</section>
	<br class="clear">
	<?php include "assets/templates/footer.php" ?>
</body>
</html>