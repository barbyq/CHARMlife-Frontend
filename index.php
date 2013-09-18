<?php 
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
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
	$current = 'index';
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
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
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
		$escaneo = scandir("charmadmin/Thumbnails/".$id);
		$imagen = $escaneo[2];
		$ruta = "charmadmin/Thumbnails/".$id."/".$imagen;
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
						<?php  list($width, $height) = getimagesize('http://www.charmlife.com.mx/charmadmin/' . $foto->img);?>
						<img src="assets/img/content/medal_foto.png">
						<img src="<?= $dir . '/charmadmin/' . $foto->img ?>" <?php if($height > 500){ echo 'style="width:250px;"';} ?>>
					</div>
					<div style="display:none;" id="fotoMasCharm">

						<img src="assets/img/content/medal_foto.png" style="position:absolute; bottom:0px; left:20px;">
						
						<img src="<?= $dir . '/charmadmin/' . $foto->img ?>">

						<a href="http://www.facebook.com/sharer.php?s=100
						&p[url]=http://www.charmlife.com.mx/charmadmin/<?= $foto->img ?>
						&p[images][0]=http://www.charmlife.com.mx<?= '/charmadmin/' . $foto->img ?>
						&p[title]=La foto mas CHARM" target="_blank" style="position:absolute; top: 5px; right: 6px; "><img src="http://www.playersoflife.com/assets/img/content/articulos/fb.png"></a>

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
				<h1 style="font-weight: 700; font-size: 23px; text-align: center; width: 326px;"> - Especial - Mujeres de Gran Legado</h1>
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
			<a href="http://www.armedica.com.mx/armedica/" target="_blank"><img src="assets/banners/home/4.gif?4512" class="ad"></a>
			<section class="outfit">
				<header>
					<h1>Outfit de la Semana</h1>
				</header>
				<?php $outfit = scandir($dir. 'charmadmin/Outfit/'); ?>
				<img src="<?= $dir. 'charmadmin/Outfit/' . $outfit[2]  ?>">
				<div class="texto">
				</div>

				<a href="//pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.charmlife.com.mx&media=http%3A%2F%2Fwww.charmlife.com.mx%2Fcharmadmin%2FOutfit%2F<?= $outfit[2] ?>&description=Outfit%20de%20la%20semana" data-pin-do="buttonPin" data-pin-config="above" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" style="width:inherit;" /></a>

			</section>
		</section>
		<br class="clear"/>
		<br/>
		<section class="banners">
			<a href="http://www.playersoflife.com/prct" target="_blank">
				<img src="assets/banners/home/5.gif?8128" alt="">
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
				<a href="#" target="_blank"><img src="assets/banners/home/7.jpg?2423" class="ad"></a>
				<br>
				<a href="http://www.facebook.com/charmlifetorreon" target="_blank"><img src="assets/banners/home/8.jpg" class="ad"></a>
			</div>
		</section>
	</section>
	<br class="clear">
	<?php include "assets/templates/footer.php" ?>
</body>
</html>