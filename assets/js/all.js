jQuery(document).ready(function($) {
$("#sliderarticulos").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'none',
        controlNavigation: 'none',
        imageAlignCenter: true,
        loop: true
    });

$("#colaboradores-slider").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'none',
        controlNavigation: 'none',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false
    });

$("#articulos-section").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'none',
        controlNavigation: 'none',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false
    });
	
ShowColabs();

});

function ShowColabs () {
	$('.colaborador').click(function(e) {
		console.log(e.currentTarget.id);
		var id = e.currentTarget.id;
		$.post("../charmadmin/controllers/colaboradores_controller.php",{receiver:"showcolab",showcolab:id},function(response) {
                                $('#nombrecolaborador').html(response['nombre']);
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
                                               
                                $.post("../charmadmin/controllers/colaboradores_controller.php",{receiver:"showarticles",showcolab:id},function(response) {
                                    console.log(response);
                                        var sais = response.length;
                                        var cuadros = sais/4;
                                        var contador = 0;

                                       var slider = $("#articulos-section").data('royalSlider');
                                       slider.destroy();
                                       $('#articulos-section').empty();
                                       for (var i = 0; i < cuadros; i++) {
                                            var $conjunto = $("<div class='conjunto'></div>");
                                        segundoloop: for (var j = 0; j < 4; j++) {
                                                                var $eichtieme = $("<div class='articulin'></div>");
                                                                if (response[contador]["thumbnail"] != "" ) {
                                                                    $eichtieme.append("<img src='../charmadmin/Thumbnails/"+response[contador]['articulo_id']+"/"+response[contador]["thumbnail"]+"' alt=''>");
                                                                }else{
                                                                    $eichtieme.append('<img src="assets/img/content/colaboradores/colabunknow.png" alt="">');  
                                                                }
                                                                $eichtieme.append("<div class='texto'><h1>"+response[contador]['titulo']+"</h1><p>"+response[contador]['subtitulo']+"</p></div>")
                                                                $conjunto.append($eichtieme);
                                                                if (contador == sais-1) { break segundoloop; }else{ contador++};
                                            };
                                            $('#articulos-section').append($conjunto);
                                       };
                                       $('#articulos-section').attr("class","royalSlider rxDefault");
                                           $("#articulos-section").royalSlider({
                                                    imageScaleMode: 'none',
                                                    controlNavigation: 'none',
                                                    imageAlignCenter: true,
                                                    loop: true,
                                                    navigateByCenterClick: false,
                                                    navigateByClick:false
                                            });
                                       
                                },'json');  
                     },'json');
	});
}