<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'assets/templates/pwd.php';
	include $dir .'charmadmin/dbc/dbconnect.php';
	include $dir .'charmadmin/dbc/utilities.php';
	include $dir .'charmadmin/dbc/articulosDAO.php';
	include $dir .'charmadmin/dbc/socialesDAO.php';
	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$socialesDAO = new socialesDAO($dbc);
	$articulosDAO = new articulosDAO($dbc);

	$articulos = array();
	$tipo = array(
		0 => "social",
		1 => "articulo",
		2 => "galeria",
		3 => "video",
		4 => "articulo"
	);

	$scanDir = array(
		0 => $dir .'charmadmin/SocThumb/',
		1 => $dir .'charmadmin/Thumbnails/',
		2 => $dir .'charmadmin/Thumbnails/',
		3 => $dir .'charmadmin/Thumbnails/',
		4 => $dir .'charmadmin/Imagenes/' 
	);

	/*SOCIAL 1*/
	$social = $socialesDAO->getSocialNewsletter(136);
	$social->tipo = 0;
	array_push($articulos, $social);

	/*SOCIAL 2*/
	$social = $socialesDAO->getSocialNewsletter(137);
	$social->tipo = 0;
	array_push($articulos, $social);

	/*SOCIAL 3*/
	$social = $socialesDAO->getSocialNewsletter(130);
	$social->tipo = 0;
	array_push($articulos, $social);

	/*SOCIAL 4*/
	$social = $socialesDAO->getSocialNewsletter(125);
	$social->tipo = 0;
	array_push($articulos, $social);

	/*SOCIAL 5*/
	$social = $socialesDAO->getSocialNewsletter(138);
	$social->tipo = 0;
	array_push($articulos, $social);

	/*personalidades*/
	$per = $articulosDAO->getArticuloNewsletter(141);
	$per->tipo = 4;
	array_push($articulos, $per);

	/*articulo 1*/
	$art = $articulosDAO->getArticuloNewsletter(135);
	$art->tipo = 2;
	array_push($articulos, $art);

	/*articulo 2*/
	$art = $articulosDAO->getArticuloNewsletter(133);
	$art->tipo = 1;
	array_push($articulos, $art);

	$otherColumn = array();

	/*Receta*/
	$receta = $articulosDAO->getArticuloNewsletter(134);
	$receta->tipo = 1;

	
	/*video*/
	$per = $articulosDAO->getArticuloNewsletter(139);
	$per->tipo = 3;
	

	
	

	/*personalidades
	
	array_push($articulos, $per);*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARM Newsletter</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<!-- #e0c1ff -->
<body bgcolor="#edc1f9">
<p style="visibility:hidden;" title="Web beacon">[[tracking_beacon]]</p>	
<table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#edc1f9" style="color:#999999;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:15px;line-height:23px">
	<tr><td align="center">
		<table border="0" cellpadding="0" cellspacing="0" width="660" style="margin:0px;  width:660px;"><!-- inside table -->
			<tr><td style="font-size:12px; text-align:center;">¿No puedes ver el email correctamente? Léelo <a href="[[web_link]]" style="color:#999">aquí</a>.</td></tr>
			<tr><td>
				<table style="border: 1px solid #dcdcdc; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;" bgcolor="white" border="0" cellpadding="0" cellspacing="0" width="660"><!-- content table -->
					<tr><td>
						<a href="http://www.charmlife.com.mx" style="height: 108px; display: block;"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/header.png"></a>
					</td></tr>
					<tr><td bgcolor="#8c0096" style="color:white;">
						<table width="666px" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; width:310px; font-size:12px;">&nbsp; 3 de octubre del 2013</td>
								<td><a href="http://facebook.com/charmlifetorreon"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/fb.png"></a></td>
								<td><a href="http://twitter.com/charmtorreon"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/tw.png"></a></td>
								<td><a href="http://instagram.com/charmtorreon"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/insta.png"></a></td>
							</tr>
						</table>
					</td></tr>
					<tr><td><a href="http://www.charmlife.com.mx"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/banner.jpg"></a></td></tr>

					<tr>
						<td><!-- two columns -->
							<table border="0" cellpadding="0" cellspacing="0">
							
							<?php for ($i = 0; $i < count($articulos); $i++) { ?>
								
								<tr>
									<td>
										<table>
											<tr>
												<td width="220px"><a href="http://www.charmlife.com.mx/<?= $tipo[$articulos[$i]->tipo] ?>.php?id=<?= $articulos[$i]->id ?>"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/temp/<?= $articulos[$i]->id ?>.jpg" width="200px" height="127px"></a></td>
											</tr>
											<tr>
												<td width="220px;" height="48px" style="font-size: 13px; line-height: 15px; text-align: center;"><a href="http://www.charmlife.com.mx/<?= $tipo[$articulos[$i]->tipo] ?>.php?id=<?= $articulos[$i]->id ?>" style="color:#999999;"><?= $articulos[$i]->titulo ?></a></td>
											</tr>
										</table>
									</td>
									<?php $i++; ?>
									<td>
										<table>
											<tr>
												<td width="220px"><a href="http://www.charmlife.com.mx/<?= $tipo[$articulos[$i]->tipo] ?>.php?id=<?= $articulos[$i]->id ?>"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/temp/<?= $articulos[$i]->id ?>.jpg" width="200px" height="127px"></a></td>
											</tr>
											<tr>
												<td width="220px;" height="48px" style="font-size: 13px; line-height: 15px; text-align: center;"><a href="http://www.charmlife.com.mx/<?= $tipo[$articulos[$i]->tipo] ?>.php?id=<?= $articulos[$i]->id ?>" style="color:#999999;"><?= $articulos[$i]->titulo ?></a></td>
											</tr>
										</table>
									</td>
								
								

								<?php if($i== 1){ ?>
									<td rowspan="4">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td width="220px" style="text-align:center;"><a href="http://www.charmlife.com.mx/<?= $tipo[$receta->tipo] ?>.php?id=<?= $receta->id ?>"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/temp/<?= $receta->id ?>.jpg" width="200px"></a></td>
											</tr>
											<tr>
												<td width="220px;" height="76px" style="font-size: 13px; line-height: 15px; text-align: center;"><a href="http://www.charmlife.com.mx/<?= $tipo[$receta->tipo] ?>.php?id=<?= $receta->id ?>" style="color:#999999;"><?= $receta->titulo ?></a><br>En esta ocasión te presentamos una manera muy original, fácil y sencilla de hacer quesadillas, no dejes de probarlas!!!</td>
											</tr>
											<tr>
												<td width="220px" style="text-align:center;"><a href="http://www.charmlife.com.mx/<?= $tipo[$per->tipo] ?>.php?id=<?= $per->id ?>"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/temp/<?= $per->id ?>.jpg" width="200px" height="127px"></a></td>
											</tr>
											<tr>
												<td width="220px;" height="48px" style="font-size: 13px; line-height: 15px; text-align: center;"><a href="http://www.charmlife.com.mx/<?= $tipo[$per->tipo] ?>.php?id=<?= $per->id ?>" style="color:#999999;"><?= $per->titulo ?></a></td>
											</tr>
											<tr>
												<td><a href="http://facebook.com/charmlifetorreon"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/links_social/fb.jpg" width="210px;"></a></td>
											</tr>
											<tr>
												<td><a href="http://twitter.com/charmtorreon"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/links_social/tw.jpg" width="210px;"></a></td>
											</tr>
											<tr>
												<td><a href="http://instagram.com/charmtorreon"><img src="http://www.charmlife.com.mx/assets/mailing/newsletter/links_social/insta.jpg" width="210px;"></a></td>
											</tr>
										</table>
									</td>
								<?php } ?>

								


								<!--   -->

								</tr>
								<?php } ?>
							</table>
						</td><!-- two columns -->
					</tr>
				</table><!-- content table -->
			</td></tr>
			<tr>
            	<td><p style="font-family:Helvetica, Arial, sans-serif; text-align:center; font-size:11px;">Si ya no deseas recibir notificaciones de PLAYERS of life haz click <a href="[[unsubscribe]]" title="One click unsubscribe" style="color:#999">aquí</a>.</p></td>
            </tr>
		</table><!-- inside table -->
	</td></tr>
</table>
</body>
</html>