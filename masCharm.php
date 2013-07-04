<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include 'assets/templates/pwd.php';
	include $dir . 'charmadmin/dbc/dbconnect.php';
	include $dir . 'charmadmin/dbc/articulosDAO.php';
	include $dir . 'charmadmin/dbc/tagsDAO.php';

	
	$dbconnect = new dbconnect('charm_charmlifec536978');
	$dbc = $dbconnect->getConnection();
	$articulosDAO = new articulosDAO($dbc);
	$tagsDAO = new tagsDAO($dbc);

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CHARMlife +CHARM</title>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css"> 
	<script type="text/javascript" src="assets/royalslider/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.masonry.min.js"></script>
	<!-- <script type="text/javascript" src="assets/js/all.js"></script> -->
	<script type="text/javascript">
	function makeBoxes(objs) {
		var boxes = [];
		console.log(objs);
		for(article in objs){
			console.log(objs[article]);
			var box = document.createElement('article');
		    box.className = 'box';

		    var img = document.createElement('img');
		    if(objs[article].imagen){
		    	img.setAttribute("src", "<?= $dir ?>charmadmin/Thumbnails/"+ objs[article].articulo_id + '/' + objs[article].imagen);	
		    }
		    
		    box.appendChild(img);

		    var h2 = document.createElement('h2');
		    t_h2 = document.createTextNode(objs[article].titulo);
		    h2.appendChild(t_h2);
		    box.appendChild(h2);

		    var p = document.createElement('p');
		    t_p = document.createTextNode(objs[article].subtitulo);
		    p.appendChild(t_p);
		    box.appendChild(p);
		    boxes.push( box );
		}
		

		/*for (var i=0; i < 20; i++ ) {
	    var box = document.createElement('article'),
	        text = document.createTextNode( "Hola");
	    
		    box.className = 'box';
		    box.appendChild( text );
		    // add box DOM node to array of new elements
		    boxes.push( box );*/

		    
		    /*
				<article class="box">
					<img src="">
					<h2>Tom Ford</h2>
					<p></p>
				</article>
		    
		    


  		}*/
  		return boxes;
	};

	$(function(){
		
		var $container = $('.grid');
		$container.imagesLoaded( function(){
		  $container.masonry({
		    itemSelector : '.box',
		    columnWidth: 320,
		    gutter: 10
		  });
		});

		$('#mas_charm').click(function(e){
			var dataVal = $('#mas_charm').data('val');
			console.log(dataVal);
			var objs;

			if(e.preventDefault){
				e.preventDefault();
			}else{
				e.returnValue = false;
			}

			$.ajax({
				type: "POST",
				url: "assets/templates/getMasCharm.php",
				data: {limit: dataVal},
				success: function(data){
					if(data == 'NO MORE'){
						$('#mas_charm p').text("No más resultados");
					}else{
						objs = $.parseJSON(data);
						var $boxes = $(makeBoxes(objs));
		      			$container.append( $boxes ).masonry( 'appended', $boxes );	
		      			dataVal++;
		      			$('#mas_charm').data('val', dataVal);	
					}
					
				}
			})

				
		});

		$('#loadingDiv')
		    .hide()  // hide it initially
		    .ajaxStart(function() {
		        $(this).show();
		    })
		    .ajaxStop(function() {
		        $(this).hide();
		    });

		 $('.interests').hide();
		 $('header').click(function(e){
		 	$('.interests').slideToggle('medium', function() {
  				});
		 });

		 $('.interests li').click(function(e){
		 	$(this).toggleClass( 'selected' );
		 });

	});
	</script>
</head>
<body>
	<?php include "assets/templates/header.php" ?>
	<section class="wrapper masCharm contenido">
		<section class="col2">
			<nav>
				<header>
					<h2>Selecciona tus intereses</h2>
				</header>
				<ul class="interests">
					<?php $tags = $tagsDAO->getTags();
						foreach ($tags as $tag) { ?>
							<li data-id="<?= $tag->tag_id ?>"><?= $tag->nombre; ?></li>
					<?php } ?>
				</ul>
			</nav>
			<section class="grid">
				<?php  $articulos = $articulosDAO->getMasCharm(0, 10);
						foreach ($articulos as $item) { 
						if(is_dir($dir .'charmadmin/MasCharm/'.$item->articulo_id . '/')){
							$imgs = scandir($dir .'charmadmin/MasCharm/'.$item->articulo_id . '/');	
						}
						?>
						<article class="box">
							<a href="articulo.php?id=<?= $item->articulo_id ?>">
								<?php if(!empty($imgs)){ ?>
									<img src="<?= $dir .'charmadmin/MasCharm/'.$item->articulo_id . '/' . $imgs[2] ?>">
								<?php } ?>
								<h2><?= $item->titulo ?></h2>
								<p><?= $item->subtitulo ?></p>
							</a>
						</article>
				<?php }
				 ?>
			</section><!-- grid -->
			<a href="#" id="mas_charm" data-val="1"><p>MÁS</p></a>
			<div id="loadingDiv"><img src="assets/img/loader.gif"></div>
		</section><!-- left -->
		<section class="col3">
			<br><br>
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/3/3_1.gif?1371660475" class="ad">
			<img src="http://www.playersoflife.com/proyectoDigital/upload/banners/nacional/home/4/4_1.gif?1371660475" class="ad">
			
			<section class="tabbed_info">
				<header>
					<h3 class="selected">Esta Semana</h3>
					<h3>Este mes</h3>
					<h3>Anteriores</h3>
					<br class="clear">
				</header>
				<section class="body">
					<ul>
						<li>* Spring Eyes, Natural Beauty</li>
						<li>* Kitchen Garden</li>
						<li>* Dress like a hipster</li>
						<li>* Float like a butterfly, sting like a bee</li>
					</ul>
				</section>

			</section><!-- tabbed_info-->


		</section><!-- col3 -->
	</section><!-- wrapper masCharm -->
	<br class="clear">
	<?php include 'assets/templates/footer.php'; ?>
</body>
</html>