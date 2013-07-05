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
<html lang="es">
<head>
	<title>Conocenos</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rs-default.css"> 
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 
	<script src='assets/royalslider/jquery-1.8.3.min.js'></script>
	<script src="assets/js/all.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#nosotrosimagenes").royalSlider({
		            keyboardNavEnabled: true,
		            imageAlignCenter:true,
		            imageScaleMode: "fill",
		            controlNavigation: 'none'
	    	}); 
	});
	</script>
</head>
<body>
<?php include "assets/templates/header.php" ?>
<div class="contenido" style="height:1100px;">	
	<section class="conocenos">
		<section class="upper">
			<section class="left">
				<img src="assets/img/content/conocenos/nosotros.png" alt="">
				<div class="sliderNosotros-wrapper">
					<div id="nosotrosimagenes" class="royalSlider rxDefault nosotrosimg">
						<img src="assets/img/content/conocenos/slideexample.png" alt="" class="rsImg">
						<img src="assets/img/content/conocenos/slideexample2.png" alt="" class="rsImg">
					</div>
				</div>
				<div class="perfil">
					<div class="texto">
						<h1>Perfil</h1>
						<p>Mujeres amantes de la vanguardia, los espacios sociales y el estilo de vida. Nuestros visitantes al sitio web pertenecen a un nivel socioeconómico alto y medio-alto, además del amplio mercado aspiracional. En nuestro sitio web atrapamos a los apasionados al extenso mundo del socialité, la moda, la joyería, alta cocina, nutrición y todo lo relacionado con el estilo de vida.  </p>
					</div>
				</div>
			</section>
		</section>
		<section class="middle">
			<div class="quienesomos">
				<div class="texto">
					<h1>¿Quiénes Somos?</h1>
					<p> <strong>CHARM life</strong> es el espacio perfecto para apreciar las vivencias de la sociedad lagunera. Diseñadas para toda la familia, nuestra revista y página web te comparten el estilo de vida de un socialité de la región, testimonios de personalidades, la crónica visual de los momentos que perdurarán y valiosas colaboraciones de expertos. Como parte de <strong>Grupo PLAYERS</strong> estamos comprometidos a brindarte productos y servicios de la más alta calidad que superen tus expectativas de información y entretenimiento. </p>	
				</div>
			</div>
			<div class="filosofia">
				<h1>Misión</h1>
				<p>Ser el medio social líder de información y entretenimiento para las familias laguneras, fortaleciendo los valores de la comunidad y brindando bienestar a nuestros socios comerciales y asociados.</p>
				<h1>Visión</h1>
				<p>Trascender en el mundo editorial familiar, femenino y social, integrando de la mejor forma la oferta impresa y digital para acompañar a nuestros lectores en su día a día.</p>
				<br class="clear"/>
				<div class="imagenes">
					<img class="derecha" src="assets/img/content/conocenos/charmlogo.png" alt="">
					<img class="izquierda" src="assets/img/footer/grupoplayers.png" alt="">
				</div>
			</div>
			<br class="clear"/>
		</section>
		<section class="videos">
			<div class="izquierda">
				<img src="assets/img/content/conocenos/aniversariobanner.png" alt="">	
				<br class="clear"/>
				<iframe width="447" height="350" src="http://www.youtube.com/embed/edFSt8piMEQ" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="derecha">
				<img src="assets/img/content/conocenos/lanzamientbanner.png" alt="">					
				<br class="clear"/>
				<iframe width="447" height="350" src="http://www.youtube.com/embed/8u9F5kjJQ5Y" frameborder="0" allowfullscreen></iframe>
			</div>
			<br class="clear"/>
		</section>
	</section>
</div>
<?php include 'assets/templates/footer.php'; ?>
</body>
</html>