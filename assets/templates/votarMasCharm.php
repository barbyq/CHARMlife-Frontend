<?php  
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'pwd.php';
	include '../../'.$dir .'charmadmin/dbc/dbconnect.php';

	include '../../'.$dir .'charmadmin/dbc/socialesDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$socialesDAO = new socialesDAO($dbc);

	$id = $_POST['id'];
	echo $id;
	$socialesDAO->votarMasCharm($id);


?>