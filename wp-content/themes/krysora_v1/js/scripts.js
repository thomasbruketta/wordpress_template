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