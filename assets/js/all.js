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
        navigateByClick:false
    });
	

    $('.colaborador').click(function(e) {
        var id = e.currentTarget.id;
                ShowColabInfo(id);
                ShowColabArticles(id);
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

});
