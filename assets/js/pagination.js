$(function(){

	$('#loadingDiv')
	    .hide()  // hide it initially
	    .ajaxStart(function() {
	        $(this).show();
	    })
	    .ajaxStop(function() {
	        $(this).hide();
	});
	
	$('.mini_features').on('click', '#next_soc', function(){
		limit = $(this).data('num');
		m = $('.mini_features.anteriores header h1').data('month');
		y = $('.mini_features.anteriores header h1').data('year');

		$.ajax({
			type: "POST",
			url: "assets/templates/moreSociales.php",
			data: {limit: limit, pos: 'next', m: m, y: y},
			success: function(data){
				//console.log(data);
				$('.mini_features.anteriores .body').html(data);
			}
		});
	});

	$('.mini_features').on('click', '#prev_soc', function(){
		limit = $(this).data('num');
		m = $('.mini_features.anteriores header h1').data('month');
		y = $('.mini_features.anteriores header h1').data('year');

		$.ajax({
			type: "POST",
			url: "assets/templates/moreSociales.php",
			data: {limit: limit, pos: 'prev', m: m, y: y},
			success: function(data){
				//console.log(data);
				$('.mini_features.anteriores .body').html(data);
			}
		});
	});
	var meses = new Array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");	
	var d = new Date();
	var n = d.getMonth()+1;

	$('.mini_features.anteriores #prev_date').click(function(e){
		m = parseInt($('.mini_features.anteriores header h1').data('month'))-1;
		y = parseInt($('.mini_features.anteriores header h1').data('year'));
		$.ajax({
			type: "POST",
			url: "assets/templates/moreSociales.php",
			data: {limit: '1', pos: 'prev', m: m, y: y},
			success: function(data){
				if(m ==12 || n == m){
					$('.mini_features.anteriores #next_date').addClass('hidden');
				}else{
					$('.mini_features.anteriores #next_date').removeClass('hidden');
				}

				if(m==1 || m == 6){
					$('.mini_features.anteriores #prev_date').addClass('hidden');
				}else{
					$('.mini_features.anteriores #prev_date').removeClass('hidden');
				}

				$('.mini_features.anteriores .body').html(data);
				$('.mini_features.anteriores header h1').data('month', m);
				$('.mini_features.anteriores header h1').data('year', y);
				fecha = meses[m] + ' ' + y;
				$('.mini_features.anteriores header .date').text(fecha);
			}
		});
	});

	$('.mini_features.anteriores #next_date').click(function(e){
		m = parseInt($('.mini_features.anteriores header h1').data('month'))+1;
		y = parseInt($('.mini_features.anteriores header h1').data('year'));
		$.ajax({
			type: "POST",
			url: "assets/templates/moreSociales.php",
			data: {limit: '1', pos: 'prev', m: m, y: y},
			success: function(data){
				if(m == 12 || m == n){
					$('.mini_features.anteriores #next_date').addClass('hidden');
				}else{
					$('.mini_features.anteriores #next_date').removeClass('hidden');
				}

				if(m==1 || m == 6){
					$('.mini_features.anteriores #prev_date').addClass('hidden');
				}else{
					$('.mini_features.anteriores #prev_date').removeClass('hidden');
				}

				$('.mini_features.anteriores .body').html(data);
				$('.mini_features.anteriores header h1').data('month', m);
				$('.mini_features.anteriores header h1').data('year', y);
				fecha = meses[m] + ' ' + y;
				$('.mini_features.anteriores header .date').text(fecha);
			}
		});
	});




	
});