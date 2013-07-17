var CharmRouter = Backbone.Router.extend({
	routes:{
		"suscribete":"suscripcion",
		"gracias":"agradecimiento", 
		"masCharm": "masCharm"
	},suscripcion:function  () {
		var cosha = $('#suscribebox').html();
		  $.fancybox(''+cosha,
		  	{
		        	'autoDimensions'	: false,
				'width'         		: 733,
				'height'        		: 'auto',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
	},agradecimiento:function() {
		  $.fancybox('<div class="agradecimiento"><h2>Gracias!!</h2><p>El equipo se pondra en contacto contigo</p></div>',
			{      	'autoDimensions'	: true,
				'width'         		: 500,
				'height'        		: 'auto',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
	},masCharm:function(){
		var html = $('#fotoMasCharm').html();
    	$.fancybox( html,
            {   'autoDimensions'    : true,
                'width'             : 500,
                'height'            : 'auto',
                'transitionIn'      : 'none',
                'transitionOut'     : 'none'
            });
	},
	start:function () {
		Backbone.history.start();  
	}
});