jQuery(document).ready(function () {
	if (jQuery.fn.meanmenu) {
	    jQuery('.hsm #header nav').meanmenu();
	}
	//accordion	
	
	jQuery('.hsm .accordion').accordion({
		cssClose: 'accordion-close',
		cssOpen: 'accordion-open',
		speed: 'slow',
		bind: 'click'
		
	});
	
	// Tabs
	jQuery('.hsm .panes div').hide();
	jQuery(".hsm .tabs a:first").addClass("selected");
	jQuery(".hsm .tabs_table").each(function(){
		$(this).find('.panes div:first').show();
		$(this).find('a:first').addClass("selected");
	});
	jQuery('.hsm .tabs a').click(function(){
		var which = $(this).attr("rel");
		$(this).parents(".hsm .tabs_table").find(".selected").removeClass("selected");
		$(this).addClass("selected");
		$(this).parents(".tabs_table").find(".panes").find("div").hide();
		$(this).parents(".tabs_table").find(".panes").find("#"+which).fadeIn(800);
	});

});