<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	include '../charmadmin/dbc/colaboradoresDAO.php';
	include '../charmadmin/dbc/dbconnect.php';

	$dbconnect = new dbconnect("charm_charmlifec536978");
	$dbc = $dbconnect->getConnection();
	$colaboradoresDAO = new colaboradoresDAO($dbc);
  ?>
<html lang="es">
<head>
	<title>Colaboradores</title>
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
<body>
<?php include "assets/templates/header.php" ?>
<div class="contenido">
	<section class="colaboradores">
		<div class="colaboradores-wrapper">
			<div class="upper">
				<img src="assets/img/content/colaboradores/colabsbanner.png" alt="">
				<div id="colaboradores-slider" class="royalSlider rxDefault">
					<?php 
					$arreglo = $colaboradoresDAO->getColaboradores();
					$tamano = sizeof($arreglo);
					$numerodecuadros = $tamano/6;
					$contador = 0; 

					 for ($i=0; $i < $numerodecuadros; $i++) { 	?>
						<div class="colaboradores-group">
							<?php for ($p=0; $p < 2; $p++) { ?>
								<div class="colaboradores-fila">
									<?php for ($j=0; $j < 3; $j++) {  ?>
										<div class="colaborador">
											<?php $objecto = $arreglo[$contador] ?>
											
											<img src="../charmadmin/<?php echo $objecto->imagen; ?>" alt="">

											<?php  if ($contador == $tamano-1) {	break 3;  } else { $contador++; }?>	
										</div>
									<? }  ?>
								</div>
							<? } ?>
						</div>
					<? }  ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include "assets/templates/footer.php" ?>	
</body>
</html>