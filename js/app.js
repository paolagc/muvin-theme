(function($){
	$(function() {

		jQuery('#open_toogle_menu').click(function() {
			jQuery('#main-menu').show();
			jQuery('#close_toogle_menu').show();
			jQuery('#open_toogle_menu').hide();
		});

		jQuery('#close_toogle_menu').click(function() {
			jQuery('#main-menu').hide();
			jQuery('#close_toogle_menu').hide();
			jQuery('#open_toogle_menu').show();
		});
	});
})(jQuery);
