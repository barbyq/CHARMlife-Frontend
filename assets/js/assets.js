$(function(){
	
	$('#bigSlider').royalSlider({
		keyboardNavEnabled: true,
		controlNavigation: 'thumbnails'
	});

	$("#socialiteSlider").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        keyboardNavEnabled: true,
        controlNavigation: 'thumbnails',
        autoHeight: true,
        imageScaleMode: 'none',
        imageAlignCenter:false,
        arrowsNav: true

    });
});