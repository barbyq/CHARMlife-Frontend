jQuery(document).ready(function($) {
$("#sliderarticulos").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'none',
        controlNavigation: 'none',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false
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

$("#sliderSociales").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'fill',
        controlNavigation: 'none',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false,
        autoPlay: {
            enabled: true,
            pauseOnHover: true,
            delay:10000
        }
    });

    $("#tematicamensual").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'none',
        controlNavigation: 'thumbnails',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false,
        autoPlay: {
            enabled: true,
            pauseOnHover: true,
            delay:10000
        }
    });
	

    $('.colaborador').click(function(e) {
                var id = e.currentTarget.id;
                ShowColabInfo(id);
                ShowColabArticles(id,intervalo);
                intervalo = 0;
    });

    $('#clickFotoMasCharm').click(function(e){
    //console.log("here");
   
    var html = $('#fotoMasCharm').html();
    $.fancybox( html,
            {   'autoDimensions'    : true,
                'width'             : 500,
                'height'            : 'auto',
                'transitionIn'      : 'none',
                'transitionOut'     : 'none'
            });
    });

    $('#personalidadesi').click(function(event) {
       if (pagina > 3) {
            pagina = pagina - 6;
       };
       $.post('/charmadmin/controllers/articulos_controller.php',{receiver:"personalidades",page:pagina}, function(data, textStatus, xhr) {
                var template = $('#articletemplate').html();
                            var parsed = Handlebars.compile(template);
                            $('.body_').empty();
                            for (var i = 0; i < data.length; i++) {
                                var articulo = data[i];
                                var eichtiemel = parsed(articulo);
                                $('.body_').append(eichtiemel);
                            };
                            $('.body_').append('<br class="clear"/>');
        },'json');
    });

    $('#personalidadesd').click(function(event) {
       pagina = pagina + 6;
        $.post('/charmadmin/controllers/articulos_controller.php',{receiver:"personalidades",page:pagina}, function(data, textStatus, xhr) {
            if (data.length != 0) {
                var template = $('#articletemplate').html();
                var parsed = Handlebars.compile(template);
                $('.body_').empty();
                for (var i = 0; i < data.length; i++) {
                        var articulo = data[i];
                        var eichtiemel = parsed(articulo);
                        $('.body_').append(eichtiemel);
                };
                $('.body_').append('<br class="clear"/>');
            };
        },'json'); 
    });

    $('#vi').click(function(event) {
        if (paginav > 0){
            paginav = paginav - 4;
        };
       $.post('/charmadmin/controllers/articulos_controller.php',{receiver:"videos",page:paginav}, function(data, textStatus, xhr) {
            console.log(data);
                var template = $('#videotemplate').html();
                var parsed = Handlebars.compile(template);
                $('#videosbody').empty();
                for (var i = 0; i < data.length; i++) {
                    var articulo = data[i];
                    var eichtiemel = parsed(articulo);
                    $('#videosbody').append(eichtiemel);
                }; 
                $('#videosbody').append('<br class="clear"/>');
        },'json');
    });

    $('#vd').click(function(event) {
        paginav = paginav + 4;
        $.post('/charmadmin/controllers/articulos_controller.php',{receiver:"videos",page:paginav}, function(data, textStatus, xhr) {
            console.log(data);
            if (data.length != 0) {
                var template = $('#videotemplate').html();
                var parsed = Handlebars.compile(template);
                $('#videosbody').empty();
                for (var i = 0; i < data.length; i++) {
                    var articulo = data[i];
                    var eichtiemel = parsed(articulo);
                    $('#videosbody').append(eichtiemel);
                }; 
                $('#videosbody').append('<br class="clear"/>');    
            };
        },'json');
    });

});
