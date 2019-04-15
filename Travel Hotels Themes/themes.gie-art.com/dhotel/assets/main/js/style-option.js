$(function(){
	$('#style-option-button').click(function(e){
		e.preventDefault();
		var isOpen = $('.style-option').hasClass('in');
		if(isOpen == false){
			$('.style-option').addClass('in');
		}else{
			$('.style-option').removeClass('in');
		}
	});

	$('#option-layout').change(function(){
		var selecetedLayout = $(this).val();
		if(selecetedLayout == 'boxed-wrapper'){
			$('.wrapper').removeClass('wide-wrapper');
		}else{
			$('.wrapper').removeClass('boxed-wrapper');
		}
		$('.wrapper').addClass(selecetedLayout);
	})

	$('.color-button').click(function(){
		var selectedColor = $(this).attr('id');
		$('#color-theme').attr('href',selectedColor);
	})
})