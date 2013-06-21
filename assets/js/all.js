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
	
ShowColabs();

});

function ShowColabs () {
	$('.colaborador').click(function(e) {
		console.log(e.currentTarget.id);
		var id = e.currentTarget.id;
		$.post("../charmadmin/controllers/colaboradores_controller.php",{receiver:"showcolab",showcolab:id},function(response) {
			console.log(response);
		},'json');
	});
}