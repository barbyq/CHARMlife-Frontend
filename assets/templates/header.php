<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<script type="text/javascript" src="assets/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="assets/js/library/underscore.js"></script>
<script type="text/javascript" src="assets/js/library/json2.js"></script>
<script type="text/javascript" src="assets/js/library/backbone.js"></script>
<script type="text/javascript" src="assets/js/router.js"></script>
<script>	
function mandarforma () {

	var searma = 1;

	var iiis = $(".formaregala :input");
	var nombre = iiis[14]["value"];
	var direccion = iiis[15]["value"];
	var codigopostal = iiis[16]["value"];
	var telefono = iiis[17]["value"];
	var correo = iiis[18]["value"];
	var colonia = iiis[19]["value"];
	var ciudad = iiis[20]["value"];
	var naci = iiis[21]["value"];
	var nacides = iiis[22]["value"];
	var nombreregalador = iiis[23]["value"];
	var correoregalador = iiis[25]["value"];
	var telefonoregalador = iiis[24]["value"];
	var mensaje = iiis[26]["value"]

	if (nombre.length == 0) {
		$('.nominput').attr("id","error");
		var searma = 0;

	};

	if (direccion.length == 0) {
		$('.diret').attr("id","error");
		var searma = 0;

	};
	var hola = parseInt(codigopostal)/2;
	var teli = parseInt(telefono)/2;

	if (codigopostal.length == 0 || isNaN(hola)) {
		$('.cdinput').attr("id","error");
		var searma = 0;
	};

	if (telefono.length == 0 || isNaN(teli)) {
		$('.telinput').attr("id","error");
		var searma = 0;
	};

	if (correo.length == 0) {
		$('.corrinput').attr("id","error");
		var searma = 0;
	};

	if (colonia.length == 0) {
		$('.colinput').attr("id","error");
		var searma = 0;
	};

	if (ciudad.length == 0) {
		$('#colreg').attr("id","error");
		var searma = 0;
	};

	if (naci.length == 0) {
		$('.fechita').attr("id","error");
		var searma = 0;
	};

	if (nacides.length == 0) {
		$('.fechitades').attr("id","error");
		var searma = 0;
	};

	if (nombreregalador.length == 0) {
		$('.abajonominput').attr("id","error");
		var searma = 0;
	};

	if (telefonoregalador.length == 0 || isNaN(telefonoregalador) ) {
		$('.comida').attr("id","error");
		var searma = 0;
	};

	if (correoregalador.length == 0) {
		$('.abajocorrinput').attr("id","error");
		var searma = 0;
	};
		if (searma == 1) {
			$.post("suscripciones/regala.php",{"nombre":nombre,"direccion":direccion,"colonia":colonia,"ciudad":ciudad,"codigopostal":codigopostal,"telefono":telefono,"correo":correo,"mensaje":mensaje,"fechanacimiento":naci,"fechadeseada":nacides,"nombreregalador":nombreregalador,"telefonoregalador":telefonoregalador,"correoregalador":correoregalador},function  (response) {
				console.log("make the change");
				$.fancybox.close();
				charmRouter.navigate("gracias",{trigger:true});
		});
	};
}

function validaSuscribete() {
	var estado = true;

	var forma = $(".formasuscribete :input");
	var nombre = forma[9].value;
	var calle = forma[10].value;
	var cp = forma[11].value;
	var tel = forma[12].value;
	var email = forma[13].value;
	var colonia = forma[14].value;
	var cidi = forma[15].value;
	var fechi = forma[16].value;
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
	
	if (estado == true) {
		$.post("suscripciones/index.php",{"nombre":nombre,"calle":calle,"colonia":colonia,"cp":cp,"telefono":tel,"correo":email,"ciudad":cidi,},function  (response) {
			console.log("yem");
			$.fancybox.close();
			charmRouter.navigate("gracias",{trigger:true});
		});
	}
};
</script>
<script type="text/javascript">
var charmRouter = 0;
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

		charmRouter = new CharmRouter();
		charmRouter.start();
		console.log(charmRouter);
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
						<li><a href="conocenos.php">CONÓCENOS</a></li>
					</ul>
				</div>
					<div>
					<div class="secondary-navigation">
							<ul>
								<li><a href="#home">Anúnciate</a><div class="vertical-line"></div></li>
								<li><a href="#suscribebox" id="suscribete">Suscríbete</a><div class="vertical-line"></div></li>
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
							<div class="formasuscribete" id="subscribeform">
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
								        </select>
									<br class="clear"/>	
									<p>Fecha Nacimiento*</p>
									<input type="date"id="fechasus" name="fecha" >
								</div>
								<br class="clear"/>
								<button id="suscribeboton" class="boton-forma" onClick="validaSuscribete()">Enviar</button>
							</div>
						<br/>
						<img style="padding-left:3.5%"src="assets/img/suscribete/opcion2.png">
						<br/>
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=53XH98JVFUYRQ" class="botonpaypal">Paypi</a>
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
