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
        imageAlignCenter:true,
        arrowsNav: true,
        navigateByClick: false
    });

    $('.social .img_vote').click(function(e){
    	if(!$(this).hasClass('voted')){
    		id = $(this).data('id');
    		var context = $(this);
    		$.ajax({
				type: "POST",
				url: "assets/templates/votarMasCharm.php",
				data: {id: id},
				success: function(data){
					console.log(data);
					context.addClass('voted');
				}
			});
    	}
    });

    $('.galeriaSlider').royalSlider({
		keyboardNavEnabled: true,
        controlNavigation: 'none',
        autoHeight: true,
        imageScaleMode: 'none',
        imageAlignCenter:false,
        arrowsNav: true
	});

	$("#videoSlider").royalSlider({
		imageScaleMode: 'none',
		controlNavigation: 'none',
		imageAlignCenter: false,
		navigateByClick: false,
		sliderDrag: false,
		sliderTouch: false
	});

	$('#share_fb').click(function(e){
		id = $(this).data('id');
		var context = $(this);
		$.ajax({
			type: "POST",
			url: "assets/templates/votarMasCompartido.php",
			data: {id: id},
			success: function(data){
			}
		});

	});

	$('#share_tweet').click(function(e){
		id = $(this).data('id');
		var context = $(this);
		$.ajax({
			type: "POST",
			url: "assets/templates/votarMasCompartido.php",
			data: {id: id},
			success: function(data){
			}
		});

	});


});