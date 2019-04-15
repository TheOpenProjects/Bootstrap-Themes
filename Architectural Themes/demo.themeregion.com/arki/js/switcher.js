	
	jQuery(document).ready(function($){
		$('.preset-list li a').on('click',function(event){
			event.preventDefault();
			var color = $(this).data('color'),
				url = 'css/presets/'+color+'.css';
				logoSrc = 'images/presets/'+color+'/logo.png';			
				logoSrc1 = 'images/presets/'+color+'/logo.png';			
				
			$('.navbar-brand.logo-two img').attr('src', logoSrc);
			$('.footer-widget .logo img, .logo-two').attr('src', logoSrc1);
			$('#preset').attr('href', url);			
		});

		$('.style-chooser .toggler').on('click', function(event){
			event.preventDefault();
			$(this).closest('.style-chooser').toggleClass('opened');
		});
	});