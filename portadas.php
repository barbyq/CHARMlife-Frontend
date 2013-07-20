<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include 'charmadmin/dbc/dbconnect.php';
	include 'charmadmin/dbc/portadasDAO.php';
	include 'charmadmin/dbc/articulosDAO.php';
	include 'charmadmin/dbc/utilities.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dibo = $dbconnect->getConnection();
	$portadasDAO = new portadasDAO($dibo);
 	$articulosDAO = new articulosDAO($dibo);
 	$current = 'portadas';
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
	<script src="assets/js/all.js"></script>
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
			width: 80px;
			float: right;
		}
		.portadasoflife .rsTmb span {
			color: black;
			font-weight: 300;
			float: left;
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
		.rxDefault .rsThumb img {
			height: 129px;
		}
	</style>
</head>
<body>
<?php include "assets/templates/header.php" ?>
<?php function dametipo($tipo)
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
	} ?>
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

		$('#portadasoflife2012').royalSlider({
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

		$('.selector').click(function  (e) {
			e.preventDefault();
			var cosa = $(this).attr("tiempo");
			$('.active').attr("class","selector");
			$(this).attr("class","selector active");
				if (cosa == "mes") {
					$.post("charmadmin/controllers/articulos_controller.php",{receiver:"damedelmes"},function(response) {
						console.log(response);
						$('#article-list').html("");
						for (var i = 0; i < response.length; i++) {
							var id = response[i]['articulo_id'];
							var nombrearti = response[i]['titulo'];
							var tipo = response[i]['tipo'];
							var contenido = $("<li type='disc'><a href='"+GetType(tipo)+"?id="+id+"'>"+nombrearti+"</a></li>");
							$('#article-list').append(contenido);
						};
					},'json').fail(function  (e) {
						console.log(e);				
					});
				}

				if (cosa == "semana") {
					$.post("charmadmin/controllers/articulos_controller.php",{receiver:"damedelasemana"},function(response) {
						console.log(response);
						$('#article-list').html("");
						for (var i = 0; i < response.length; i++) {
							var id = response[i]['articulo_id'];
							var nombrearti = response[i]['titulo'];
							var tipo = response[i]['tipo'];
							var contenido = $("<li type='disc'><a href='"+GetType(tipo)+"?id="+id+"'>"+nombrearti+"</a></li>");
							$('#article-list').append(contenido);
						};
					},'json').fail(function  (e) {
						console.log(e);				
					});
				}

				if (cosa == "anterior") {
					$.post("charmadmin/controllers/articulos_controller.php",{receiver:"damedelaprevios"},function(response) {
						console.log(response);
						$('#article-list').html("");
						for (var i = 0; i < response.length; i++) {
							var id = response[i]['articulo_id'];
							var nombrearti = response[i]['titulo'];
							var tipo = response[i]['tipo'];
							var contenido = $("<li type='disc'><a href='"+GetType(tipo)+"?id="+id+"'>"+nombrearti+"</a></li>");
							$('#article-list').append(contenido);
						};
					},'json').fail(function  (e) {
						console.log(e);				
					});
				};
		});
});
	function GetType (blipo) {
			var comparador = parseInt(blipo);
			console.log(blipo);
			console.log(comparador);
			switch(comparador){
				case 0:
					return "articulo.php";
					break;
				case 1:
					return "galeria.php";
					break;
				case 2:
					return "video.php";
					break;
				case 4:
					return "tematica.php";
					break;
				default:
					break;
			}
		}
</script>
<div class="contenido">
							
	<div class="portadas-wrapper">
		<div class="portadas">
			<div class="2013">
				<img src="assets/img/portadas/portadas-2013-header.png">
				<section class="portadascontainer">
					<div id="portadasoflife" class="royalSlide portadasoflife rxDefault">
						<?php $portadas = $portadasDAO->PortadasByYear(2013); ?>
						<?php foreach ($portadas as $portada) {?>
							<div class="rsContent">
								<a href="#">
									<img src="charmadmin/upload/portadas/<?php echo $portada->id."/".$portada->img; ?>" height="500px" alt="">
								</a>
								<div class="rsTmb">
									<img src="charmadmin/upload/portadas/<?php echo $portada->id."/".$portada->img_thumb; ?>" alt="">
									<h3>Portada <?php echo $portada->meso ?></h3>
								</div>
							</div>
						<? } ?>
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
				<section class="portadascontainer">
					<div id="portadasoflife2012" class="royalSlide portadasoflife rxDefault">
						<?php $portadasotras = $portadasDAO->PortadasByYear(2012); ?>
						<?php foreach ($portadasotras as $portadaotra) {?>
							<div class="rsContent">
								<a href="#">
									<img src="charmadmin/upload/portadas/<?php echo $portadaotra->id."/".$portadaotra->img; ?>" height="500px" alt="">
								</a>
								<div class="rsTmb">
									<img src="charmadmin/upload/portadas/<?php echo $portadaotra->id."/".$portadaotra->img_thumb; ?>" alt="">
									<h3>Portada <?php echo $portadaotra->meso ?></h3>
								</div>
							</div>
						<? } ?>
					</div>
				</section>
			</div>
		</div>
	</div>

	<section class="lateral">
		<a href="mailto:contacto@charmlife.com.mx" ><img src="assets/banners/portadas/3.gif" alt=""></a>
		<br/>
		<br/>
		<a href="http://www.facebook.com/charmlifetorreon" target="_blank"><img src="assets/banners/portadas/4.jpg" alt=""></a>
		<br/>
		<br/>
		<br/>
		<section class="barraarticulos">
			<ul class="tabs group">
				<li tiempo="semana"  class="selector active"><a href="#"><span tiempo="semana" class="textinchidihaxor">Esta Semana</span></a></li>
				<li tiempo="mes" class="selector" ><a href="#"><span tiempo="mes" class="textinchidihaxor">Este mes</span></a></li>
				<li tiempo="anterior" class="selector" ><a href="#"><span tiempo="anterior" class="textinchidihaxor">Anteriores</span></a></li>
			</ul>
		</section>
		<br/>
		<section class="articulos">
			<br/>
			<ul id="article-list">
				<?php $articulos = $articulosDAO->getRandomOftheSemaine(); ?>
				<?php foreach ($articulos as $articulo) { ?>
					<li type="disc"><a href="<?php echo dametipo($articulo->tipo); ?><?php echo $articulo->articulo_id; ?>"><?php echo $articulo->titulo; ?></a></li>	
				<?} ?>
			</ul>
		</section>
		<br/>
		<br/>
		<a href="http://www.playersoflife.com/losases" target="_blank">
			<img src="assets/banners/portadas/5.gif" alt="">
		</a>
		<br/>
	</section>
	<br class="clear"/>
	<br/>
</div>
	<?php include 'assets/templates/footer.php'; ?>
</body>
</html>