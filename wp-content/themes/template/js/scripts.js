(function ( $ ) {

	$(document).ready(function() {
		initAnimatedJumps();
	});
	
	// initialize animated scroll to in-page anchor link
	function initAnimatedJumps() {
		//var marginTopStickyMenu = 0;
		
		// find all anchor tags with hashtag links
		$('a[href^=#]').each( function() {
			var target = $( $(this).attr('href') );
			
			if (target.length > 0) {
				$(this).click( function(e) {
					var targetOffset = target.offset();
					
					// set top margin based on if top menu is sticky or not
					//if ( $('section.top').css('position') == "fixed" ) {
						//var scrollTo = targetOffset.top - marginTopStickyMenu;
					//} else {
						var scrollTo = targetOffset.top;
					//}
					
					$('body,html').animate({
						'scrollTop' : scrollTo + 'px'
					}, 1000);
					
					e.preventDefault();
					$(this).blur();
				});
			}
		});
	}
	
	// initialize form to show/hide default value on focus/blur
	$.fn.initFormDynamicDefaultValues = function() {
		var formTextFields = $(this).find("input[type=text], textarea");
	
		// clear text fields on focus, return to default val on blur
		formTextFields.each( function() {
			var defaultValue = $(this).get(0).getAttribute('value');
			
			$(this).blur( function() {
				if ( $(this).val() == "" ) {
					$(this).val( defaultValue );
				}
			});
			$(this).focus( function() {
				if ( $(this).val() == defaultValue ) {
					$(this).val( "" );
				}
			});
		});
	}

}( jQuery ));