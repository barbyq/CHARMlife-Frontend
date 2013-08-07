<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	include '../assets/php/class.phpmailer.php';

	if (isset($_POST['nombre'])) {
		$cuerpo = "<p>Nombre: ".$_POST['nombre']."</p>"."<p>Direccion: ".$_POST['direccion']."</p>"."<p>Colonia: ".$_POST['colonia']."</p>"."<p>Codigo Postal: ".$_POST['codigopostal']."</p>"."<p>Ciudad: ".$_POST['ciudad']."</p>"."<p>Telefono: ".$_POST['telefono']."</p>"."<p> Correo: ".$_POST['correo']."</p><p>Mensaje de regalo: ".$_POST['mensaje']."</p>";
		if (isset($_POST['fechanacimiento'])) {
			$cuerpo = $cuerpo."<p>Fecha Nacimiento: ".$_POST['fechanacimiento']."</p>";
		}
		if (isset($_POST['fechadeseada'])) {
			$cuerpo = $cuerpo."<p>Fecha Deseada: ".$_POST['fechadeseada']."</p>";
		}
		$cuerpo = $cuerpo."<p>Datos Regalador</p><p>Nombre: ".$_POST['nombreregalador']."</p><p>Telefono: ".$_POST['telefonoregalador']."</p><p>Correo: ".$_POST['correoregalador']."</p>";
		$correo = new PHPMailer();
		$correo->Host = "localhost";
		$correo->From = "no-reply@playersoflife.com";
		$correo->FromName = "Suscripcion";
		$correo->Subject = "Regala Players Datos";
		$correo->AddReplyTo('suscripciones@charmlife.com.mx','PLAYERS of life');
		$correo->AddAddress('suscripciones@charmlife.com.mx');
		$correo->Body = $cuerpo;
		$correo->IsHTML("true");
		$correo->Send();
	}
?>