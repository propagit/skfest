(function($j){
try {
	
	$j.fn.slider = function() {
		
		// Set default parameters
		var settings = $j.extend({
				
			nav_left: $j('#nav_left'),
			
			nav_right: $j('#nav_right'),
			
		});
		
		var container_width = $j('div#slider').width();
		
		// On screen resize
		$j(window).resize(function() {
			container_width = $j('div#slider').width();		  
		});
		
		// Scroll left
		settings.nav_left.mouseover(function() 
		{
			
			$j('div#slider').stop().animate({scrollLeft: 0}, (parseInt($j('div#slider').scrollLeft()) + $j(window).width()) * 2,'linear');
		}).mouseout(function() {
			//load_images();
			$j('div#slider').stop();
		});
		
		
		// Scroll right
		settings.nav_right.mouseover(function() {
			$j('div#slider').stop().animate({scrollLeft: $j('div#slider ul').width() - $j(window).width() }, (Math.abs(parseInt($j('div#slider').scrollLeft()) - $j('div#slider ul').width())) * 2,'linear');								 
		}).mouseout(function() {
			$j('div#slider').stop();
		});
		
		
		
		var center_element = $j('#slider img').get(Math.floor($j('#slider img').size() / 2));
		var left_elements = $j('#slider img').slice(0,(Math.floor($j('#slider img').size() / 2)));
		var right_elements = $j('#slider img').slice((Math.floor($j('#slider img').size() / 2)) + 1,$j('#slider img').size());

		
		/** INITIALISE THE FOLLOWING SETTINGS ON STARTUP **/

		// Goto center of street
		$j('#slider').scrollLeft(parseInt($j('#slider').scrollLeft()) + parseInt($j(center_element).position().left) - parseInt($j('div#slider').width() / 2));
				
	};
} catch(err) {
	alert(err);	
}
})(jQuery);