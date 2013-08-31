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
	$articulosDAO = new articulosDAO($dibo);
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$articulo = $articulosDAO->getTheArticulo($id,1);
		
	}
	
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php  if(isset($articulo->articulo_id)){
		echo $articulo->titulo . ' - ';
	} ?> CHARMlife</title>
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
	<script type="text/javascript">
		$(function(){
			$('.body').html(unescape(<?php echo '"' . html_entity_decode($articulo->contenido) . '"'; ?>));
		});
	</script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper arts contenido">
		<?php  if(isset($articulo->articulo_id)){
				$fotos = scandir($dir . 'charmadmin/Galerias/'.$articulo->articulo_id);
		 ?>
			<section class="col2">
				<section class="info">
					<h1><?php echo strtoupper($articulo->titulo); ?></h1>
					<h2><?php echo strtoupper($articulo->subtitulo); ?></h2>
					<hr>
					<h3>Redacción: <a href="colaboradores.php?id=<?php echo $articulo->colaborador_id;?>"><?php echo $articulo->colaborador;?></a>, <?php echo $articulo->dia." de ".getMes($articulo->mes)." del ".$articulo->year; ?></h3>
				</section>
				<section class="body">
					
				
				</section>
				<br>
				<div style="width:650px; margin:0 auto;">
					<div class="galeriaSlider royalSlider rxDefault">
							<?php for ($i = 2; $i < (count($fotos)); $i++ ){ 
						    		if (strrpos($fotos[$i], '.')){?>
						    		<div class="rsContent">
								        <center>
								        <img class="rsImg" src="<?php echo  $dir . 'charmadmin/Galerias/'.$articulo->articulo_id . '/' . $fotos[$i]; ?>" />
								    	</center>
								    </div>
						    <?php }
						    } ?>
					</div><!-- galeriaSlider -->
				</div>
				<br>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=536562106387184";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-href="http://charmlife.com.mx/galeria.php?id=<?php echo $articulo->articulo_id; ?>" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>
				<br>
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


			</section><!-- col2 -->
			<section class="col3">
				<a href="http://www.facebook.com/OpticaDelRosario" target="_blank"><img src="assets/banners/home/3.gif" class="ad"></a>
				<a href="http://itzel.lag.uia.mx/publico/index.php" target="_blank"><img src="assets/banners/home/4.gif" class="ad"></a>
			</section>
			<br class="clear">


		<?php }else{ ?>
		<h1>Galeria no encontrada.</h1>
		<?php } ?>
	</section>
	<?php include "assets/templates/footer.php" ?>
</body>
</html>