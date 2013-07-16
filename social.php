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
		$socialesDAO->votarMasVisto($id);
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
	<?php $thumb = scandir($dir. 'charmadmin/SocPrincipal/'.$social->sociales_id . '/'); ?>
	<meta property="og:image" content="http://www.charmlife.com.mx/charmadmin/SocPrincipal/<?= $social->sociales_id . '/' . $thumb[2] ?>"/>
  	<link rel="image_src" type="image/jpeg" href="http://www.charmlife.com.mx/charmadmin/SocPrincipal/<?php echo $social->sociales_id."/".$thumb[2]; ?>"/>
  	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rs-default.css"> 
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
	<script type="text/javascript" src="assets/js/all.js"></script>
	<script type="text/javascript" src="assets/js/assets.js"></script>
</head>
<body>
	<!-- <img src="http://www.charmlife.com.mx/charmadmin/SocPrincipal/<?= $social->sociales_id . '/' . $thumb[2] ?>">  -->
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper social contenido">
		<?php  if(isset($social->sociales_id)){ ?>

		
		<section class="top_social">
			<div style="width:700px; margin:0 auto; min-height:475px;">
				<div id="socialiteSlider" class="royalSlider rxDefault">
					<?php 
						foreach ($fotos as $foto) { 
							$pos = strrpos($foto->img, "/");
							$route = substr($foto->img, 0, $pos); 
							$img =  substr($foto->img, $pos+1, strlen($foto->img)); ?>	
							<div class="rsContent">
								<center>
									<img src="<?= $dir ?>charmadmin/<?= $foto->img  ?>">
									<img src="assets/img/content/votaMasCharm.png" style="position:absolute; bottom: -46px; left: 260px;">
									<img class="img_vote" src="assets/img/content/medal_foto.png" data-id="<?= $foto->foto_id ?>" style="position: absolute; bottom:-33px; left: 110px;">
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



			<div class="shares" align="right">
				<p>Comparte en:</p>
				<a href="http://www.facebook.com/sharer.php?s=100
&p[url]=http://www.charmlife.com.mx/social.php?id=<?php echo $social->sociales_id; ?>
&p[images][0]=http://www.charmlife.com.mx/charmadmin/SocPrincipal/<?= $social->sociales_id . '/' . $thumb[2] ?>
&p[title]=<?php echo $social->titulo;  ?>
&p[summary]=<?php echo $social->subtitulo;  ?>" target="_blank" id="share_fb" data-id="<?= $social->sociales_id ?>"><img src="http://www.playersoflife.com/assets/img/content/articulos/fb.png"></a>
				
				<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $social->titulo; ?>&amp;url=http://www.charmlife.com.mx/social.php?id=<?php echo $social->sociales_id; ?>&amp;via=charmtorreon" id="share_tweet" data-id="<?= $social->sociales_id ?>"><img src="http://www.playersoflife.com/assets/img/content/articulos/tweet.png"></a>

			</div>
<!--
			<div class="shares" align="right">
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				

				<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog', 'width=626,height=436'); return false;">Compartir en Facebook</a>
			</div>
		</section>-->

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
			<a href="http://www.facebook.com/OpticaDelRosario" target="_blank"><img src="assets/banners/home/3.gif" class="ad"></a>
			<a href="http://itzel.lag.uia.mx/publico/index.php" target="_blank"><img src="assets/banners/home/4.gif" class="ad"></a>
		</section>
		<br class="clear">
	</section>
	<?php include "assets/templates/footer.php" ?>
</body>
</html>