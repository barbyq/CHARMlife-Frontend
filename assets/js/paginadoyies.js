$(function() {
	$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"showarticles",showcolab:colaboreitor},function  (response) {
		console.log(response);
		var cantidaddepaginas = Math.ceil(response.length/8);
		var sais = response.length/4;
		var contador = 0;
 		for (var i = 0; i < 2; i++) {
 			var $conjunto = $("");
 			if (i == 0) {
 				$conjunto = $("<div class='conjunto'></div>");
 			}else{
 				$conjunto = $("<div class='conjunto-primeravera'></div>");
 			}
                        segundoloop: for (var j = 0; j < 4; j++) {
                                var $eichtieme = $("<a href='"+GetType(response[contador]['tipo'])+"?id="+response[contador]['articulo_id']+"' class='articulin'></a>");
                                if (response[contador]["thumbnail"] != "" ) {
                                        $eichtieme.append("<img src='charmadmin/Thumbnails/"+response[contador]['articulo_id']+"/"+response[contador]["thumbnail"]+"' alt=''>");
        	                }else{
	                                $eichtieme.append('<img src="assets/img/content/colaboradores/colabunknow.png" alt="">');  
                                }
                                $eichtieme.append("<div class='texto'><h1>"+response[contador]['titulo']+"</h1><p>"+response[contador]['subtitulo']+"</p></div>")
                               $conjunto.append($eichtieme);
                               if (contador == response.length-1) { break; }else{ contador++; };
                        };
                        $('#articulos-section').append($conjunto);
                        if (contador == response.length-1) { break; }else{ contador++; }; 
                };
                //Paginado
		for (var i = 0; i < cantidaddepaginas; i++) {
			var pagina = i+1;
			$('#anchor-wrapper').append("<a id='"+i+"' style='padding-left:1.5%;'class='paginado' href='#'>"+pagina+"</a>");
			setTimeout(function  () {
				$('.paginado').click(function  (e) {
					e.preventDefault();
					console.log("que rollo");
					var primier = e.target.id;
					var eighti = parseInt(primier)*8;
					$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"giveyouinterval",colab:colaboreitor,interval:eighti},function  (response) {
						console.log(response);
						var contador = 0;
						$('#articulos-section').empty();
				 		for (var i = 0; i < 2; i++) {
				 			if (contador == response.length-1) {
				 				break;
				 			};
				 			var $conjunto = $("");
				 			if (i == 0) {
				 				$conjunto = $("<div class='conjunto'></div>");
				 			}else{
				 				$conjunto = $("<div class='conjunto-primeravera'></div>");
				 			}
				                        segundoloop: for (var j = 0; j < 4; j++) {
				                                var $eichtieme = $("<a href='"+GetType(response[contador]['tipo'])+"?id="+response[contador]['articulo_id']+"' class='articulin'></a>");
				                                if (response[contador]["thumbnail"] != "" ) {
				                                        $eichtieme.append("<img src='charmadmin/Thumbnails/"+response[contador]['articulo_id']+"/"+response[contador]["thumbnail"]+"' alt=''>");
				        	                }else{
					                                $eichtieme.append('<img src="assets/img/content/colaboradores/colabunknow.png" alt="">');  
				                                }
				                                $eichtieme.append("<div class='texto'><h1>"+response[contador]['titulo']+"</h1><p>"+response[contador]['subtitulo']+"</p></div>")
				                               $conjunto.append($eichtieme);
				                               if (contador == response.length-1) { break segundoloop; }else{ contador++};
				                        };
				                        $('#articulos-section').append($conjunto);
			                               if (contador == response.length-1) { break; }else{ contador++;};
				                };
					},'json');
				});
			}, 200);
		}
	},'json').fail(function  (e) {
		console.warn(e);
	});
});

function  ShowColabInfo(colabid) {
	$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"showcolab",showcolab:colabid},function(response) {
                       	console.log(response);
                        $('#nombrecolaborador').html(response['nombrec']);
	                $('#descripcion').html(response['descripcion']);
                               if (response['imagen'] == "") {
                                  $('#fotocolab').attr("src","assets/img/content/colaboradores/colabunknow.png");
                                }else{
                                       $('#fotocolab').attr("src","/charmadmin/"+response['imagen']);   
                         }
                        var secciones = "";
                        for (var i = 0; i < response['secciones'].length; i++) {
                               var seccion = response['secciones'][i]['seccion'];
                                if (secciones == "") {
                                      secciones = seccion;
                                }else{
                                    secciones = secciones + " , " + seccion;
                                }
                         };
                        $('#secciones').html(secciones);
                        $('#articulos-nombre').html(response['nombrec']);
        },'json');
}


function ShowColabArticles (colabid) {
		$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"showarticles",showcolab:colabid},function  (response) {
		console.log(response);
		var cantidaddepaginas = Math.ceil(response.length/8);
		var sais = response.length/4;
		var contador = 0;
		$('#articulos-section').empty();
 		for (var i = 0; i < 2; i++) {
 			var $conjunto = $("");
 			if (i == 0) {
 				$conjunto = $("<div class='conjunto'></div>");
 			}else{
 				$conjunto = $("<div class='conjunto-primeravera'></div>");
 			}
                        segundoloop: for (var j = 0; j < 4; j++) {
                                var $eichtieme = $("<a href='"+GetType(response[contador]['tipo'])+"?id="+response[contador]['articulo_id']+"' class='articulin'></a>");
                                if (response[contador]["thumbnail"] != "" ) {
                                        $eichtieme.append("<img src='charmadmin/Thumbnails/"+response[contador]['articulo_id']+"/"+response[contador]["thumbnail"]+"' alt=''>");
        	                }else{
	                                $eichtieme.append('<img src="assets/img/content/colaboradores/colabunknow.png" alt="">');  
                                }
                                $eichtieme.append("<div class='texto'><a href='"+GetType(response[contador]['tipo'])+"?id="+response[contador]['articulo_id']+"'><h1>"+response[contador]['titulo']+"</h1></a><p>"+response[contador]['subtitulo']+"</p></div>")
                               $conjunto.append($eichtieme);
                               if (contador == response.length-1) { break segundoloop; }else{ contador++};
                        };
                        $('#articulos-section').append($conjunto);
                        if (contador == response.length-1) { break; }else{ contador++};
                };
                //Paginado
                $('#anchor-wrapper').empty();
		for (var i = 0; i < cantidaddepaginas; i++) {
			var pagina = i+1;
			$('#anchor-wrapper').append("<a id='"+i+"' style='padding-left:1.5%;'class='paginado' href='#'>"+pagina+"</a>");
			setTimeout(function  () {
				$('.paginado').click(function  (e) {
					e.preventDefault();
					console.log("que rollo");
					var primier = e.target.id;
					var eighti = parseInt(primier)*8;
					$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"giveyouinterval",colab:colabid,interval:eighti},function  (resi) {
						console.log(resi);
						var contador = 0;
						$('#articulos-section').empty();
				 		for (var i = 0; i < 2; i++) {
				 			var $conjunto = $("");
				 			if (i == 0) {
				 				$conjunto = $("<div class='conjunto'></div>");
				 			}else{
				 				$conjunto = $("<div class='conjunto-primeravera'></div>");
				 			}
				                        segundoloop: for (var j = 0; j < 4; j++) {
				                                var $eichtieme = $("<a href='"+GetType(response[contador]['tipo'])+"?id="+resi[contador]['articulo_id']+"' class='articulin'></a>");
				                                if (resi[contador]["thumbnail"] != "" ) {
				                                        $eichtieme.append("<img src='charmadmin/Thumbnails/"+resi[contador]['articulo_id']+"/"+resi[contador]["thumbnail"]+"' alt=''>");
				        	                }else{
					                                $eichtieme.append('<img src="assets/img/content/colaboradores/colabunknow.png" alt="">');  
				                                }
				                                $eichtieme.append("<div class='texto'><a href='"+GetType(response[contador]['tipo'])+"?id="+resi[contador]['articulo_id']+"'><h1>"+resi[contador]['titulo']+"</h1></a><p>"+resi[contador]['subtitulo']+"</p></div>")
				                               $conjunto.append($eichtieme);
				                               if (contador == resi.length-1) { break segundoloop; }else{ contador++};
				                        };
				                        $('#articulos-section').append($conjunto);
	                                               if (contador == resi.length-1) { break; }else{ contador++;};
				                };
					},'json');
				});
			}, 200);
		}
	},'json').fail(function  (e) {
		console.warn(e);
	});
}

function GetType (blipo) {
	var comparador = parseInt(blipo);
	console.log(blipo);
	console.log(comparador);
	switch(comparador){
		case 0:
			return "articulo.php";
			break;
		case 1:
			return "galeria.php";
			break;
		case 2:
			return "video.php";
			break;
		case 4:
			return "tematica.php";
			break;
		default:
			break;
	}
}