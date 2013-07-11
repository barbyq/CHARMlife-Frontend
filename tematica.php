<?php  
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include 'charmadmin/dbc/articulosDAO.php';
	include 'charmadmin/dbc/colaboradoresDAO.php';
	include 'charmadmin/dbc/dbconnect.php';
	include 'charmadmin/controllers/utilities.php';
	$dbconnect = new dbconnect("charm_charmlifec536978");
	$dbc = $dbconnect->getConnection();
	$articulosDAO = new articulosDAO($dbc);
	$colaboradoresDAO = new colaboradoresDAO($dbc);

	$articulo = $articulosDAO->getLastTematica();
?>
<html lang="es">
<head>
	<title>Tematica Mensual</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rs-default.css"> 
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 
	<script src='assets/royalslider/jquery-1.8.3.min.js'></script>
	<script src="assets/js/all.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
</head>
<?php 
	function dameimagen($id)
	{
		$escaneo = scandir("charmadmin/Imagenes/".$id);
		$imagen = $escaneo[2];
		$ruta = "charmadmin/Imagenes/".$id."/".$imagen;
		return $ruta;
	} 
 ?>
<body>
<?php include "assets/templates/header.php" ?>
<div class="contenido">
	<section class="tematica">
		<section class="Articulo">
			<div class="articulo-content">
				<div class="articulo-wrapper">
					<h1><?= $articulo->titulo; ?><h1>
					<h2><?= $articulo->subtitulo; ?></h2>
					<hr width="100%" align="center">
					<?php $colaborador = $colaboradoresDAO->getColaborador($articulo->colaborador_id); ?>
					<h3>Redacción: <a href="colaboradores.php?id=<?php echo $articulo->colaborador_id;?>"><?php echo $colaborador->nombrec;?></a>, <?php echo $articulo->dia." de ".getMes($articulo->mes)." del ".$articulo->year; ?></h3>
					<br>
					<?php if (is_dir("charmadmin/Imagenes/".$articulo->articulo_id)) {
						?>
						<?php $archivos = scandir("charmadmin/Imagenes/".$articulo->articulo_id); ?>
						<img src="charmadmin/Imagenes/<?php echo $articulo->articulo_id."/".$archivos[2]; ?>" alt="">
						<?
					} ?>
					<script>
						$(function() {
							$('.articulo-contenido').html(unescape(<?php echo '"' . html_entity_decode($articulo->contenido) . '"'; ?>));
						});
					</script>
					<br class="clear"/>
					<br/>
					<br/>
					<div class="articulo-contenido">
					</div>
					<br/>
					<div class="articulos-dela">
						<div class="showtematicas">
							<?php $artics = $articulosDAO->getArticulosBySeccion($articulo->articulo_id); ?>
							<?php foreach ($artics as $artic) { ?>
								<article>
								<a href="#">
									<img src="<?php echo dameimagen($artic->articulo_id); ?>" style="width: 85%; height: 135px; -moz-box-shadow: 3px 3px 5px 2px #ccc; -webkit-box-shadow: 3px 3px 5px 2px #ccc;box-shadow: 3px 3px 5px 2px #ccc;" alt="">
									<h1 style="font-size:135%;"><?= $artic->titulo; ?></h1>
									<p><?= $artic->subtitulo ?></p>
								</a>
							</article>
							<? } ?>
						</div>
					</div>
					<br class="clear">
					<br/>

					<div id="disqus_thread"></div>
					<script type="text/javascript">
					/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
					var disqus_shortname = 'charmlife'; // required: replace example with your forum shortname

					/* * * DON'T EDIT BELOW THIS LINE * * */
					(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
					
					<div class="shares" align="right">
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog', 'width=626,height=436'); return false;">Share on Facebook</a>
					</div>
				</div>
			</div>
			<section class="lateral">
				<a href="http://www.facebook.com/OpticaDelRosario" target="_blank"><img src="assets/banners/home/3.gif" class="ad"></a>
				<br/>
				<br/>
				<a href="http://itzel.lag.uia.mx/publico/index.php" target="_blank"><img src="assets/banners/home/4.gif" class="ad"></a>
				<br/>
				<br/>
				<br/>
				<section class="barraarticulos">
					<ul class="tabs group">
						<li tiempo="semana" class="selector active"><a href="#"><span tiempo="semana" class="textinchidihaxor">Esta Semana</span></a></li>
						<li tiempo="mes" class="selector"><a href="#"><span tiempo="mes" class="textinchidihaxor">Este mes</span></a></li>
						<li tiempo="anterior" class="selector"><a href="#"><span  tiempo="anterior" class="textinchidihaxor">Anteriores</span></a></li>
					</ul>
				</section>
				<br/>
				<section class="articulos">
					<br/>
					<ul id="article-list">
						<?php $articulos = $articulosDAO->getRandomOftheSemaine(); ?>
						<?php foreach ($articulos as $articulo) { ?>
							<li type="disc"><a href="articulo.php?id=<?php echo $articulo->articulo_id; ?>"><?php echo $articulo->titulo; ?></a></li>	
						<? } ?>
					</ul>
				</section>
				<br/>
				<br/>
				<br/>
			</section>
			<br class="clear">
		</section>
	</section>
</div>
<?php include "assets/templates/footer.php" ?>	
</body>
</html>