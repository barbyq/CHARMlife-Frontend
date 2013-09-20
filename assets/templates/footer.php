<div class="footer">
	<div class="wrapper">
		<div class="upthings">
			<div class="imagenrevista">
			<a href="#suscribete">
				<img src="assets/img/footer/revista.png?1235" alt="">
			</a>
			</div>
			<div class="suscribete">
				<h2>Suscríbete</h2>
				<h1>HOY</h1>
				<p>Y recibe tu ejemplar mensual</p>
				<p> en la comodidad de tu hogar</p>
			</div>
			<div class="contacto">
				<h1>Contacto</h1>
				<p>Tel.192.34.34 y 192.47.67</p>
				<p>contacto@charmlife.com.mx</p>
				<p>ventas@charmlife.com.mx</p>
			</div>
			<div class="sliderarticulos-wrapper">
				<?php function dameurl($tipo)
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
				<p>Más de:</p>
 				<div id="sliderarticulos" class="royalSlider rsDefault rsBack">
					<div class="rsContent">
						<ul>
							<?php $arregloprimero = $articulosDAO->getArticulosByInterval(0); ?>
							<?php foreach ($arregloprimero as $arti) { ?>
								<li type="disc"><a href="<?php echo dameurl($arti->tipo).$arti->id; ?>"><?= $arti->titulo; ?></a></li>
							<? } ?>
						</ul>
						<ul class="padul">
							<?php $arreglosegundo = $articulosDAO->getArticulosByInterval(4); ?>
							<?php foreach ($arreglosegundo as $arti) { ?>
								<li type="disc"><a href="<?php echo dameurl($arti->tipo).$arti->id; ?>"><?= $arti->titulo; ?></a></li>
							<? } ?>
						</ul>
					</div>
					<div class="rsContent">
						<ul>
							<?php $arreglotercero = $articulosDAO->getArticulosByInterval(8); ?>
							<?php foreach ($arreglotercero as $arti) { ?>
								<li type="disc"><a href="<?php echo dameurl($arti->tipo).$arti->id; ?>"><?= $arti->titulo; ?></a></li>
							<? } ?>
						</ul>
						<ul class="padul">
							<?php $arreglocuarto = $articulosDAO->getArticulosByInterval(12); ?>
							<?php foreach ($arreglocuarto as $arti) { ?>
								<li type="disc"><a href="<?php echo dameurl($arti->tipo).$arti->id; ?>"><?= $arti->titulo; ?></a></li>
							<? } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<br class="clear"/>
		<div class="sociales">
			<a href="http://facebook.com/charmlifetorreon"><img src="assets/img/facebook.png"/><p>/charmlifetorreon</p></a>
			<a href="http://twitter.com/charmtorrreon"><img src="assets/img/twitter.png"/><p>@charmtorreon</p></a>
			<a href="http://pinterest.com/charmtorreon"><img src="assets/img/path.png"/><p>@charmtorreon</p></a>
			<a href="http://instagram.com/charmtorreon"><img src="assets/img/instagram.png"/><p>@charmtorreon</p></a>
			<a href="#" class="logoup"><img src="assets/img/footer/charm.png" alt=""></a>
			<a href="#" class="logoright"><img src="assets/img/footer/grupoplayers.png" alt=""></a>
		</div>
		<br class="clear"/>
		<div class="navigacion">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="sociales.php">Sociales</a></li>
				<li><a href="personalidades.php">Personalidades</a></li>
				<li><a href="masCharm.php">+ CHARM</a></li>
				<li><a href="conocenos.php">Conócenos</a></li>
				<li><a href="#">Anúnciate</a></li>
				<li><a href="#suscribebox" id="suscribete">Suscríbete</a></li>
				<li class="lastli"><a href="#regalabox" id="regalacharm">Regala Charm</a></li>
			</ul>
		</div>
	</div>
</div>