<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include '../charmadmin/dbc/dbconnect.php';
	include '../charmadmin/dbc/portadasDAO.php';
	include '../charmadmin/dbc/utilities.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dibo = $dbconnect->getConnection();
	$portadasDAO = new portadasDAO($dibo);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Portadas</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rs-default.css"> 
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 

	<script src='assets/royalslider/jquery-1.8.3.min.js'></script>

	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
	<style type="text/css">
	.portadasoflife .rsTmb {
		  padding: 15px;
		  height: 150px;
		  background-color: #FFFFFF;
		}
		.portadasoflife .rsTmb h3 {
			color: black;
			font-weight: 700;
			line-height: 14px;
		}
		.portadasoflife .rsTmb span {
			color: black;
			font-weight: 300;
		}

		.portadasoflife .rsTmb img{
		  filter: alpha(opacity=30);
		  float: left;
		  width: 100px;
		}
		.rsDefault .rsThumb.rsNavSelected img{
			opacity: 1;
		  	filter: alpha(opacity=100);
		}
		.portadasoflife .rsTmb span{
		  position: relative;
		  top:13px;
		}
		.portadasoflife .rsThumbs .rsThumb {
		  width: 220px;
		  height: 180px;
		  border-bottom: 1px solid #2E2E2E;
		}
		.portadasoflife .rsThumbs {
		  width: 220px;
		  padding: 0;
		}
		.portadasoflife .rsThumb.rsNavSelected {
		  
		  border-bottom:-color #02874A;
		}
	</style>
</head>
<body>
<?php include "assets/templates/header.php" ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
		$('#portadasoflife').royalSlider({
		    arrowsNav: false,
		    fadeinLoadedSlide: true,
		    controlNavigationSpacing: 0,
		    controlNavigation: 'thumbnails',
		    thumbs: {
		      autoCenter: false,
		      fitInViewport: true,
		      orientation: 'vertical',
		      spacing: 0,
		      paddingBottom: 0
		    },
		    keyboardNavEnabled: true,
		    imageScaleMode: 'fill',
		    imageAlignCenter:true,
		    slidesSpacing: 0,
		    loop: false,
		    loopRewind: true,
		    numImagesToPreload: 3,
		    video: {
		      autoHideArrows:true,
		      autoHideControlNav:false,
		      autoHideBlocks: true
		    }, 
		    autoScaleSlider: true, 
		    autoScaleSliderWidth: 655,     
		    autoScaleSliderHeight: 500
		 });
});
</script>
<div class="contenido">
	<div class="portadas">
		<div class="2013">
			<img src="assets/img/portadas/portadas-2013-header.png">
			<section class="portadascontainer">
				<div id="portadasoflife" class="royalSlide portadasoflife rxDefault">
					<div class="rsContent">
						<a href="#">
							<img src="assets/img/pruebas/pruebota.jpg" height="500px" alt="">
						</a>
						<div class="rsTmb">
							<img src="assets/img/pruebas/prueba.jpg" alt="">
							<h3>Portada Febrero
								<span>Valeria Córdoba & Rodrigo Murra Historia de Amor</span></h3>
						</div>
					</div>
							<div class="rsContent">
						<a href="#">
							<img src="assets/img/pruebas/pruebota.jpg" height="500px" alt="">
						</a>
						<div class="rsTmb">
							<img src="assets/img/pruebas/prueba.jpg" alt="">
							<h3>Portada Febrero
								<span>Valeria Córdoba & Rodrigo Murra Historia de Amor</span></h3>
						</div>
					</div>
							<div class="rsContent">
						<a href="#">
							<img src="assets/img/pruebas/pruebota.jpg" height="500px" alt="">
						</a>
						<div class="rsTmb">
							<img src="assets/img/pruebas/prueba.jpg"  alt="">
							<h3>Portada Febrero
								<span>Valeria Córdoba & Rodrigo Murra Historia de Amor</span></h3>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<div class="portadas">
		<div class="2012">
			<img src="assets/img/portadas/portadas-2012-header.png" alt="">		
		</div>
	</div>
</div>

</body>
</html>