$(document).ready( function() {
	$("#nav").each( function() {
		$('#nav li').hover(
			function () {
				//show its submenu
				//$('ul', this).slideDown(200);
				$('ul', this).show();
			},
			function () {
				//hide its submenu
				$('ul', this).hide();
			}
		);
	})
});

$.fn.initTabs = function() {
	$(this).addClass( "tabsInitialized" );
	
	var tabObjs = $(this).find("h1, h2, h3");
	
	tabObjs.each( function() {
		$(this).nextUntil("h1, h2, h3").wrapAll( '<div class="content" />' );
		
		$(this).click( function(e) {
			e.preventDefault();
			$(this).blur();
			
			tabSelect( $(this), $(this).next(".content") );
		});
	});
	
	
	var contentObjs = $(this).find(".content");
	
	
	var maxHeight = 0;
	contentObjs.each( function() {
		if ( $(this).height() > maxHeight ) {
			maxHeight = $(this).height();
		}
	});
	contentObjs.height( maxHeight );
	$(this).height( $(this).height() + contentObjs.first().outerHeight() );
	
	function tabSelect( tabObj, contentObj ) {
		contentObjs.hide();
		tabObjs.removeClass( "active" );
		
		contentObj.show();
		tabObj.addClass( "active" );
	}
	
	tabSelect( tabObjs.first(), contentObjs.first() );
}