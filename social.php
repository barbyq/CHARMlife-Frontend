<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/socialesDAO.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$socialesDAO = new socialesDAO($dbc);
	$articulosDAO = new articulosDAO($dbc);

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$social = $socialesDAO->getSocialById($id);
		//print_r($social);
		$fotos = $socialesDAO->getImagenesbySocialId($id);
		//print_r($fotos);
	}
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php  if(isset($social->sociales_id)){
		echo $social->titulo . ' - ';
	} ?> CHARMlife</title>
	<meta charset="utf-8">
  	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
	<!--<script type="text/javascript" src="assets/js/all.js"></script>-->
	<script type="text/javascript" src="assets/js/assets.js"></script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper social contenido">
		<?php  if(isset($social->sociales_id)){ ?>

		
		<section class="top_social">
			<div style="width:700px; margin:0 auto;">
				<div id="socialiteSlider" class="royalSlider rxDefault">
					<?php 
						foreach ($fotos as $foto) { 
							$pos = strrpos($foto->img, "/");
							$route = substr($foto->img, 0, $pos); 
							$img =  substr($foto->img, $pos+1, strlen($foto->img)); ?>	
							<div class="rsContent">
								<center>
									<img src="<?= $dir ?>charmadmin/<?= $foto->img  ?>">
									<img src="assets/img/content/votaMasCharm.png" style="position:absolute; bottom: -31px; left: 260px;">
									<img class="img_vote" src="assets/img/content/medal_foto.png" data-id="<?= $foto->foto_id ?>" style="position: absolute; bottom:-11px; left: 110px;">
								</center>
								<div class="rsTmb">
									<img src="<?= $dir ?>charmadmin/<?= $route . '/thumbnail/' . $img  ?>">
								</div>
							</div>
					<?php } ?>
				</div><!-- bigSlider  -->
			</div><!-- sliderSociales -->
		<br class="clear">
		<section class="info">
			<h1><?= $social->titulo ?></h1>
			<h2><?= $social->subtitulo ?></h2>
			<p><?= $social->descripcion ?></p>
		</section>

		</section><!-- top_social -->
		<?php } ?>
		<section class="col2">
			<?php  if(isset($social->sociales_id)){ ?>

			
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
    		<?php } ?>

    		<section class="mini_features">
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
			</section><!-- mini_features -->

		</section><!-- col2 -->
		<section class="col3">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/3/3_1.gif?1371660475" class="ad">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/4/4_1.gif?1371660475" class="ad">
		</section>
		<br class="clear">
	</section>
	<?php include "assets/templates/footer.php" ?>
</body>
</html>