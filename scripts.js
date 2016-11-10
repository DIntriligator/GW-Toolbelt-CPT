	//cpt ---------------------------------------------
	jQuery('.dashicon-open-btn').on('click', function(e){
		e.preventDefault();
		cptIndex = jQuery(this).attr('data-index');
		jQuery('#dashicon-selections'+cptIndex).fadeIn();
		jQuery('.submit'+cptIndex).fadeOut();
	});
	jQuery('.dashicon-select-btn').on('click', function(e){
		e.preventDefault();
		cptIndex = jQuery(this).attr('data-index');
		selection = jQuery(this).attr('data-icon');
		jQuery('#dashicon-selections'+cptIndex).fadeOut();
		jQuery('.submit'+cptIndex).fadeIn();
		jQuery('#dashicon'+cptIndex).val(selection);
		jQuery('#dashicon-display'+cptIndex).attr('class' ,'dashicons '+selection)
	});