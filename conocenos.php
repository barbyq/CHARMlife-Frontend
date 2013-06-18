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
<div class="contenido">	
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
					<p>CHARM life es el espacio perfecto para apreciar las vivencias de la sociedad lagunera. El lente que te permite ver el estilo de vida de un socialité de la región, modus vivendi de personalidades y la crónica visual de esos momentos que perdurarán. Presentamos un sitio web constantemente actualizado con los eventos más recientes y una revista mensual en la que quedarán grabados los instantes más memorables y únicos que permanecerán por siempre. </p>	
				</div>
			</div>
			<div class="filosofia">
				<h1>Misión</h1>
				<p>Ser la revista social de mayor impacto liderando el mercado donde nos ubicamos, siendo un producto de calidad que potencialice su valor. Innovadores y competitivos satisfaciendo plenamente a nuestros lectores e incentivando la practica sana de la lectura. Para alcanzar esta misión, nos basamos en capacitación y desarrollo laboral en un ambiente fortalecido por los valores del Grupo Editorial PLAYERS. </p>
				<h1>Visión</h1>
				<p>Hacer de nuestra revista un negocio que alcance los objetivos sociales y los niveles de rentabilidad que lo hagan atractivo. Seremos un medio acreditado y posicionado a nivel nacional, en un lapso no mayor de cinco años, convirtiéndonos en el medio de mayor importancia dentro del mundo editorial femenino y social.</p>
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