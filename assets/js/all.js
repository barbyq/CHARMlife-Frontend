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
        navigateByClick:false
    });

    $("#tematicamensual").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'fill',
        controlNavigation: 'thumbnails',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false
    });
	

    ShowColabs();

});

function ShowColabs () {
	$('.colaborador').click(function(e) {
		var id = e.currentTarget.id;
                ShowColabInfo(id);
                ShowColabArticles(id);
	});
}