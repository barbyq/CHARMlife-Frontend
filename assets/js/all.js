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

/*$("#articulos-section").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        imageScaleMode: 'none',
        controlNavigation: 'none',
        imageAlignCenter: true,
        loop: true,
        navigateByCenterClick: false,
        navigateByClick:false
    });*/
	
ShowColabs();

});

function ShowColabs () {
	$('.colaborador').click(function(e) {
		var id = e.currentTarget.id;
                ShowColabInfo(id);
                ShowColabArticles(id);
	});
}