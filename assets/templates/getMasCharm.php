<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'pwd.php';
include '../../'. $dir . 'charmadmin/dbc/dbconnect.php';
include '../../'. $dir . 'charmadmin/dbc/articulosDAO.php';

$dbconnect = new dbconnect('charm_charmlifec536978');
$dbc = $dbconnect->getConnection();
$articulosDAO = new articulosDAO($dbc);

 
$limit = $_POST['limit'];
$perPage = 10;

$index = $perPage * $limit;
$articulos = $articulosDAO->getMasCharm($index, $perPage);
foreach ($articulos as $item) {
	if (is_dir('../../' . $dir . 'charmadmin/Thumbnails/'.$item->articulo_id . '/')){
		$thumb = scandir('../../' . $dir . 'charmadmin/Thumbnails/'.$item->articulo_id . '/');
		$item->imagen = $thumb[2];	
	}
}
if(empty($articulos)){
	echo 'NO MORE';
}else{
	echo json_encode($articulos);	
}

?>