<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	include '../assets/php/class.phpmailer.php';
	//suscripciones@playersoflife.com

	if (isset($_POST['nombre'])) {
		$body = "<p>Nombre: ".$_POST['nombre']."</p><p> Direccion: ".$_POST['calle']." ".$_POST['colonia']."</p><p> CP: ".$_POST['cp']."</p> <p>Email: ".$_POST['correo']."</p>";
	
		if (isset($_POST['ciudad'])) {
			$body = $body."<p> Ciudad: ".$_POST['ciudad']."</p>";
		}

		if (isset($_POST['telefono'])) {
			$body = $body."<p>Telefono: ".$_POST['telefono']."</p>";			
		}
		$correo = new PHPMailer();
		$correo->Host = "localhost";
		$correo->From = "no-reply@playersoflife.com";
		$correo->FromName = "Suscriptor";
		$correo->Subject =  "Suscriptor Charm";
		$correo->AddReplyTo('suscripciones@charmlife.com.mx', 'CHARM Life');
		$correo->AddAddress('suscripciones@charmlife.com.mx');
		$correo->Body = $body;	
		$correo->IsHTML("true");
		$correo->Send();
	}else{
		header('Location: ../index.php#suscribete');
	}
?>
