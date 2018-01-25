function mb_grace_screen() {
	var width = jQuery( window ).width();
// 	console.log(width);
	if(width <= 480) {
			jQuery( "body" ).removeClass('desktop').addClass('mobile');
			jQuery( ".inner-wrap .view-button" ).addClass('btn-xs').removeClass('btn-lg').removeClass('btn-sm');
	} 
	else if(width <= 992) {   
			jQuery( "body" ).removeClass('desktop').addClass('mobile');
			jQuery( ".inner-wrap .view-button" ).removeClass('btn-xs').removeClass('btn-lg').removeClass('btn-sm');
	} 
	else {
			jQuery( "body" ).addClass('desktop').removeClass('mobile');
			jQuery( ".inner-wrap .view-button" ).addClass('btn-lg').removeClass('btn-xs').removeClass('btn-sm');
	}
}
jQuery(document).ready(function(){
	mb_grace_screen();
	jQuery(".entry-content img").addClass('img-responsive');
});
jQuery( window ).resize(function() {
		mb_grace_screen();
});