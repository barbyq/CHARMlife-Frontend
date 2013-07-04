<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<script type="text/javascript" src="assets/js/jquery.fancybox.js"></script>
<script>	
function validaSuscribete(forma) {
	var estado = true;
	var nombre = forma["nombre"].value;
	var calle = forma["calle"].value;
	var cp = forma["cp"].value;
	var tel = forma["telefono"].value;
	var email = forma["correo"].value;
	var colonia = forma["colonia"].value;
	var cidi = forma["ciudad"].value;
	var fechi = forma["fecha"].value;
	if (nombre.length == 0) {
		$('#nombresus').attr("id","error");	
		estado = false;
	};
	if (calle.length == 0) {
		$('#callesus').attr("id","error");
		estado = false;
	}
	if (cp.length == 0) {
		$('#cpsus').attr("id","error");
		estado = false;
	};
	if (tel.length == 0) {
		$('#telsus').attr("id","error");
		estado = false;
	};
	if (email.length == 0) {
		$('#emailsus').attr("id","error");
		estado = false;
	};
	if (colonia.length == 0) {
		$('#coloniasus').attr("id","error");
		estado = false;
	};
	if (fechi.length == 0) {
		$('#fechasus').attr("id","error");
		estado = false;
	};
	$('#suscribeboton').trigger("click");
	return estado;
};

</script>
<script type="text/javascript">
$(document).ready(function() {
	$.getScript("assets/js/jquery.fancybox.js",function  () {
		$('#suscribete').fancybox({
				 openEffect  : 'none',
				 closeEffect : 'none',
				 width: 733,
				 beforeLoad : function() {         
			            this.width  = 780;
        			},
			   	 afterLoad   : function() {
			        	this.content = '' + this.content.html();
					this.width  = 780;
	    		}});
		$('#regalacharm').fancybox({
				 openEffect  : 'none',
				 closeEffect : 'none',
				 width: 733,
				 beforeLoad : function() {         
			            this.width  = 780;
        			},
			   	 afterLoad   : function() {
			        	this.content = '' + this.content.html();
					this.width  = 780;
	    		}});
	});
});
</script>
<?php $scaneo = scandir("../charmadmin/Banner/"); ?>
<?php $banner = $scaneo[2]; ?>
<div class="main_header" >
	<header class="wrapper">
		<div class="banners">
			<a href="#"><img src="/frontend/assets/img/banner1.jpg"></a>
			<a href="#"><img src="/frontend/assets/img/banner2.png"></a>		
		</div>
		<div class="header" style="background-image:url(<? echo "../charmadmin/Banner/".$banner;?>);">
			<img id="logo" src="/frontend/assets/img/charmlifelogo.png">
			<div class="navigation">
				<div class="principal">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="sociales.php">SOCIALES</a></li>
						<li><a href="personalidades.php">PERSONALIDADES</a></li>
						<li><a href="masCharm.php">+CHARM</a></li>
						<li><a href="portadas.php">PORTADAS</a></li>
						<li><a href="colaboradores.php">COLABORADORES</a></li>
						<li><a href="conocenos.php">CONÒCENOS</a></li>
					</ul>
				</div>
					<div>
					<div class="secondary-navigation">
							<ul>
								<li><a href="#home">Anunciate</a><div class="vertical-line"></div></li>
								<li><a href="#suscribebox" id="suscribete">Suscribete</a><div class="vertical-line"></div></li>
								<li><a href="#regalabox" id="regalacharm">Regala Charm</a><div class="vertical-line"></div></li>
							</ul>
					</div>
					<div class="iconitos">
						<a href="#"><img src="/frontend/assets/img/facebook.png"></a>
						<a href="#"><img src="/frontend/assets/img/twitter.png"></a>
						<a href="#"><img src="/frontend/assets/img/path.png"></a>
						<a href="#"><img src="/frontend/assets/img/instagram.png"></a>
					</div>
					</div>
			</div>
		</div>
	</header>
</div>

<div id="suscribebox" style="display:none;width:700px;height:700px;">					
					<div class="contenedor" style="width:780px">
							<img src="assets/img/suscribete/suscribeteheader.png">
							<br class="clear"/>
							<br/>
							<div style="position:relative;padding-left:4%;width:679px;">
								<img src="assets/img/suscribete/opcion1.png">
								<p>Llena el formulario y pronto te contactaremos para recoger el pago donde y cuando tú prefieras. </p>
							</div>
							<br class="clear"/>
							<form class="formasuscribete" id="subscribeform" action="/suscripciones/index.php" onSubmit="return validaSuscribete(this);" method="POST">
								<div class="izquierda">
									<p>Nombre*</p>
									<input type="text" id="nombresus"  class="nominput" name="nombre" >
									<br class="clear"/>
									<p>Calle y Numero*</p>
									<input type="text" id="callesus" name="calle" >
									<br class="clear"/>
									<p>C.P*</p>
									<input type="text" id="cpsus" name="cp" class="cdinput" >
									<br class="clear"/>
									<p>Teléfono*</p>
									<input type="tel" id="telsus" name="telefono" class="telinput" >
									<br class="clear"/>
									<p>Mail*</p>
									<input type="email" id="emailsus" name="correo" class="corrinput" >
								</div>
								<div class="derecha">
									<p>Colonia*</p>
									<input type="text" id="coloniasus" name="colonia" class="colinput" >
									<br class="clear"/>
									<p>Ciudad*</p>
									<select id="city" name="ciudad" class="seleinput" >
										<option value="Torreón">Torreón</option> 
								                <option value="Monterrey">Monterrey</option> 
								                <option value="Chihuahua">Chihuahua</option> 
								                <option value="Leon">Leon</option> 
								                <option value="Queretaro">Queretaro</option>
									</select>
									<br class="clear"/>	
									<p>Fecha Nacimiento*</p>
									<input type="date"id="fechasus" name="fecha" >
								</div>
								<br class="clear"/>
								<button id="suscribeboton" class="boton-forma">Enviar</button>
							</form>
						<br/>
						<img style="padding-left:3.5%"src="assets/img/suscribete/opcion2.png">
						<br/>
				<!-- 	<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=53XH98JVFUYRQ" class="botonpaypal">Paypi</a> -->
						<form style="position:relative;padding-left:4%;width:146px;"action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="7C4S77S4CASJN">
							<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
							<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
						</form>
						<br/>
						<img style="padding-left:3.5%"src="assets/img/suscribete/opcion3.png">
						<img style="padding-left:3.5%" src="assets/img/suscribete/com.png">
					</div>
</div>


<div id="regalabox" style="display:none;width:700px;height:700px;">
					<div class="todaesacosa">
						<img src="assets/img/regalacharm/header.png">
						<img style="padding-left:4%;"src="assets/img/suscribete/opcion1.png">
						<br class="clear">
					<div class="formaregala">
						<div class="izquierda">
							<p>Nombre*</p>
							<input type="text" id="nomreg"  name="nombre" class="nominput">
							<br class="clear"/>
							<p>Calle y Numero*</p>
							<input type="text" id="dirreg" class="diret" name="direccion">
							<br class="clear"/>
							<p>C.P*</p>
							<input type="number" id="cpreg"  name="codigopostal" class="cdinput">
							<br class="clear"/>
							<p>Telefono*</p>
							<input type="tel" id="telreg"  name="telefono" class="telinput">
							<br class="clear"/>
							<p>Email*</p>
							<input type="email" id="correg"  name="correo" class="corrinput">
						</div>
						<div class="derecha">
							<p>Colonia</p>
							<input type="text" id="colreg"  name="colonia" class="colinput">
							<br class="clear"/>
							<p>Ciudad</p>
							<select id="cityred" name="ciudad" class="seleinput">
								<option value="Torreón">Torreón</option> 
				                <option value="Monterrey">Monterrey</option> 
				                <option value="Chihuahua">Chihuahua</option>        
						        <option value="Leon">Leon</option> 
				                <option value="Queretaro">Queretaro</option>
							</select>
							<br class="clear"/>
							<p>Fecha de Nacimiento</p>
							<input type="date" id="fechanac" class="fechita" name="fechanacimiento">
 							<br class="clear"/>
							<p>Fecha deseada de Entrega</p>
							<br class="clear"/>
							<p>Considera 3 dias hábiles de márgen</p>
							<input type="date" id="fechades"  class="fechitades" name="fechadeseada">
							<br class="clear"/>
						</div>
						<br class="clear"/>
						<br/>
						<img src="assets/img/regalacharm/datoshead.png" class="datos">
						<br class="clear"/>
						<div class="izquierda">
							<p>Nombre*</p>
							<input type="text" name="nombreregalador" class="abajonominput">
							<br class="clear"/>
							<p>Teléfono*</p>
							<input type="tel" name="telefonoregalador" class="comida" >
							<br class="clear"/>
							<p>Mail*</p>
							<input type="email" name="correoregalador"class="abajocorrinput" >
							<br class="clear"/>
						</div>
						<div class="derecha">
							<p>Mensaje en Tarjeta de Regalo</p>
							<textarea name="mensaje"></textarea>
							<br class="clear"/>
						</div>
						<br class="clear"/>
						<button id="regalaformaboton" onclick="mandarforma()"class="boton-forma">Enviar</button>
					</div>
					<br/>
						<img style="padding-left:4%;" src="assets/img/suscribete/opcion2.png">
						<br/>
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=53XH98JVFUYRQ" class="botonpaypal">Paypi</a>
						<br/>
						<img style="padding-left:4%;" src="assets/img/suscribete/opcion3.png">
						<img style="padding-left:4%" src="assets/img/suscribete/com.png">
					</div>
				</div>
