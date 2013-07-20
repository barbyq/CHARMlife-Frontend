<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/portadasDAO.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';
	include $dir .'charmadmin/dbc/utilities.php';
	include $dir .'charmadmin/dbc/socialesDAO.php';
	include $dir .'charmadmin/dbc/colaboradoresDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dibo = $dbconnect->getConnection();
	$portadasDAO = new portadasDAO($dibo);
 	$articulosDAO = new articulosDAO($dibo);
	$socialesDAO = new socialesDAO($dibo);
	$colaboradoresDAO = new colaboradoresDAO($dibo);
	$current = 'colaboradores';
 ?>
<html lang="es">
<head>
	<title>CHARMlife Colaboradores</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/royalslider/royalslider.css">
	<link rel="stylesheet" href="assets/royalslider/skins/default/rs-default.css"> 
	<link rel="stylesheet" href="assets/royalslider/skins/default/rx-default.css"> 
	<script src='assets/royalslider/jquery-1.8.3.min.js'></script>
	<script src="assets/js/all.js"></script>
	<script src="assets/js/paginadoyies.js"></script>
	<script src="assets/royalslider/jquery.royalslider.min.js"></script>
</head>
<body>
	<?php $arreiglu = $colaboradoresDAO->getColaboradores(); ?>
	<?php $hola = $arreiglu[0]; ?>
	<?php if (isset($_GET['id'])) {
		$test = $colaboradoresDAO->getColaborador($_GET['id']);
		if ($test->id != "") {
			$hola = $test;
		};
	}; ?>
	<script>
		var colaboreitor = <?php echo $hola->id; ?>;
	</script>
<?php include "assets/templates/header.php" ?>
<div class="contenido">
	<section class="colaboradores">
		<div class="colaboradores-wrapper">
			<div class="upper">
				<img src="assets/img/content/colaboradores/colabsbanner.png" alt="">
				<div id="colaboradores-slider" class="royalSlider rxDefault colaboradores-contenido">
					<?php 
					$arreglo = $colaboradoresDAO->getColaboradores();
					$tamano = sizeof($arreglo);
					$numerodecuadros = $tamano/6;
					$contador = 0; 
					for ($i=0; $i < $numerodecuadros; $i++) { ?>
						<div class="colaboradores-group">
							<?php for ($p=0; $p < 2; $p++) { ?>
								<div class="colaboradores-fila">
									<?php for ($j=0; $j < 3; $j++) {  ?>
										<?php $objecto = $arreglo[$contador]; ?>
										<div class="colaborador" id="<?php echo $objecto->id; ?>">
											<img src="<?php if ($objecto->imagen == "") {echo "assets/img/content/colaboradores/colabunknow.png";}else{echo "../charmadmin/".$objecto->imagen; } ?>" alt="">
											<div class="texto">
												<h1><?php echo $objecto->nombrec; ?></h1>
												<p><?php echo $objecto->giro; ?></p>
											</div>
											<?php  if ($contador == $tamano-1) {break 3; } else { $contador++; }?>	
										</div>
									<?  }  ?>
								</div>
								<br class="clear"/>
							<? } ?>
						</div>
					<? }  ?>
				</div>
			</div>
		</div>
	</section>
	<section class="colaborador-contenido">
		<div class="paddit">
			<?php $objecto = $hola ?>
			<?php $secciones = $colaboradoresDAO->getSeccionesColaborador($objecto->id); ?>
			<img id="fotocolab" src="<?php if ($objecto->imagen == "") {echo "assets/img/content/colaboradores/colabunknow.png";}else{echo "../charmadmin/".$objecto->imagen; }?>" alt="">
			<div class="texto">
				<div class="headercolab">
					<h1 id="nombrecolaborador"><?php echo $objecto->nombrec; ?></h1>
					<h2>Seccion:</h2>
					<p id="secciones">
						<?php $seccionesinsercion = ""; ?>
						<?php foreach ($secciones as $seccion) { ?>
							<?php if ($seccionesinsercion == "") {
								$seccionesinsercion = $seccion->seccion; 
							} else{
								$seccionesinsercion = $seccionesinsercion." , ".$seccion->seccion;
							}?>
						<?}?>
						<?php echo $seccionesinsercion; ?>
					</p>
					<hr width="95%" align="left">
				</div>
				<div class="descripcolab">
					<p id="giro"><?= $objecto->giro; ?></p>
					<p id="descripcion"><?php echo $objecto->descripcion; ?></p>
				</div>
			</div>
			<div class="contacto">
				<div class="texto-padd">
					<h1>Contacto</h1>
					<a href="mailto:contacto@charmlife.com.mx"><img class="img" src="assets/img/content/colaboradores/correotodohaxor.png" alt=""><span>contacto@charmlife.com.mx</span></a>
					<!--<br class="clear"/>-->
					
				</div>
				<!--<hr width="95%" align="right"/>-->
			</div>
			<!--
			<div class="tipocolaborador">
				<div class="texto-tipocolaborador">
					<h1>Tipo de Colaborador</h1>
					<?php if ($objecto->medio == 0) {?>
						<img style="height:45px;width:45px;float:left;" src="assets/img/content/colaboradores/revista.png" alt="">
						<p>Digital</p>
					<? } ?>
				</div>
			</div>-->
		</div>
	</section>
	<section class="articulos-colaborador">
		<div class="escritorpor">
			<h1>Artículos Escritos Por: </h1>
			<p id="articulos-nombre"><?php echo $objecto->nombrec; ?></p>
		</div>
		<div id="articulos-section">
		</div>
		<br class="clear"/>
		<br class="clear"/>
		<br/>
		<br/>
		<div class="controls">
			<div align="center" id="anchor-wrapper"></div>
		</div>
	</section>
	<br class="clear"/>
</div>
<?php include "assets/templates/footer.php" ?>	
</body>
</html>