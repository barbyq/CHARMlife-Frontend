$(function() {
	ShowColabArticles(colaboreitor,intervalo);
});

function  ShowColabInfo(colabid) {
	$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"showcolab",showcolab:colabid},function(response) {
                       	console.log(response);
                        $('#nombrecolaborador').html(response['nombrec']);
	                	$('#descripcion').html(response['descripcion']);
	                	$('#giro').html(response['giro']);
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

function ShowColabArticles (colabid,interva) {
	$.post("charmadmin/controllers/colaboradores_controller.php",{receiver:"showarticles",showcolab:colabid,interval:interva},function  (response) {
			console.log(response);
			var sais = response.length/4;
			var contador = 0;
			$('#articulos-section').empty();
			Handlebars.registerHelper('ifeq', function (a, b, options) {
      				if (a == b) { return options.fn(this); }
    			});
			for (var i = 0; i < response.length; i++) {
				var mono = response[i];
				console.log(mono);
				var yes = $('#templatearti').html();
				var temp = Handlebars.compile(yes);
				$('#articulos-section').append(temp(mono));
			};
                //Paginado
	},'json').fail(function  (e) {
		console.warn(e);
	});
	$.post('charmadmin/controllers/colaboradores_controller.php',{receiver:"size",colab:colabid}, function(data, textStatus, xhr) {
		console.log(data);
		var cantidaddepaginas = Math.ceil(data.length/8);
		$('#anchor-wrapper').empty();
		var pagini = 0;
		for (var i = 0; i < cantidaddepaginas; i++) {
			var pagina = i+1;
			$('#anchor-wrapper').append("<a id="+pagini+" style='padding-left:1.5%;'class='paginado' href='#'>"+pagina+"</a>");
			pagini = pagini + 8;
		}   
		$('.paginado').click(function  (e) {
			e.preventDefault();
			var primier = e.target.id;
			var eighti = parseInt(primier);
			console.log(eighti)
			ShowColabArticles(colabid,eighti);
		});             	
        },'json');
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