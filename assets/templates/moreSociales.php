<?php  
	error_reporting(E_ALL);
	ini_set('display_errors', '1'); 
	include 'pwd.php';
	include '../../'.$dir .'charmadmin/dbc/dbconnect.php';

	include '../../'.$dir .'charmadmin/dbc/socialesDAO.php';

	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$socialesDAO = new socialesDAO($dbc);

	$num = $_POST['limit'];
	$pos = $_POST['pos'];
	$perPage = 9;
	$limit = 0;


	if($pos == 'next'){
		$limit = $num*$perPage;
	}else if($pos == 'prev'){
		$limit = ($num-1)*$perPage;
	}
	$sociales = $socialesDAO->getEventosByMes($m, $y, $limit, $perPage);
	$total = $socialesDAO->getEventosByMesTotal($m, $y);
	//echo 'Total:' . $total;
	
?>

<div id="pos_prev_soc" class="arrow_" style="left: -10px;">
	<?php 
		if($limit != 0){
			echo '<img src="assets/img/content/sociales/left_arrow_black.png" id="prev_soc" data-num="' . $num . '">';
		}
	 ?>
</div>
<?php 
	foreach ($sociales as $item) { 
		$thumb = scandir('../../'. $dir. 'charmadmin/SocThumb/'.$item->sociales_id);
 ?>
 	<article>
		<a href="social.php?id=<?= $item->sociales_id ?>">
		<h3><span><?= $item->titulo ?></span></h3>
		<img src="<?= $dir. 'charmadmin/SocThumb/'.$item->sociales_id . '/' . $thumb[2]  ?>">
		</a>
	</article>
 <?php } ?>
<br class="clear">
<div id="pos_next_soc" class="arrow_" style="right: -5px;">
	<?php  
		if($pos == 'prev'){
			$x = $num;
		}else{
			$x = intval($num)+1;	
		}
		
		if($total > ($limit+$perPage)){
			echo '<img src="assets/img/content/sociales/right_arrow_black.png" id="next_soc" data-num="'. $x .'">';
		}	
	?>
	
</div>