/*!
 * jPushMenu.js
 * 1.1.1
 * @author: takien
 * http://takien.com
 * Original version (pure JS) is created by Mary Lou http://tympanus.net/
 */

(function($) {
		
	$.fn.jPushMenu = function(customOptions) {
		var o = $.extend({}, $.fn.jPushMenu.defaultOptions, customOptions);
		
		/* add class to the body.*/
		
		$('body').addClass(o.bodyClass);
		$(this).addClass('jPushMenuBtn');
		$(this).click(function() {
			var target         = '',
			push_direction     = '';
			
		
			if($(this).is('.'+o.showLeftClass)) {
				target         = '.dd-spmenu-left';
				push_direction = 'toright';
			}
			else if($(this).is('.'+o.showRightClass)) {
				target         = '.dd-spmenu-right';
				push_direction = 'toleft';
			}
			

			$(this).toggleClass(o.activeClass);
			$(target).toggleClass(o.menuOpenClass);
			
			if($(this).is('.'+o.pushBodyClass)) {
				$('body').toggleClass( 'dd-spmenu-push-'+push_direction );
			}
			
			/* disable all other button*/
			$('.jPushMenuBtn').not($(this)).toggleClass('disabled');
			
			return false;
		});
		var jPushMenu = {
			close: function (o) {
				$('.jPushMenuBtn,body,.dd-spmenu').removeClass('disabled active dd-spmenu-open dd-spmenu-push-toleft dd-spmenu-push-toright');
			}
		}
		
		if(o.closeOnClickOutside) {
			 $(document).click(function() { 
				jPushMenu.close();
			 }); 

			 $('.dd-spmenu,.toggle-menu').click(function(e){ 
				 e.stopPropagation(); 
			 });
		 }
	};
 
   /* in case you want to customize class name,
   *  do not directly edit here, use function parameter when call jPushMenu.
   */
	$.fn.jPushMenu.defaultOptions = {
		bodyClass       : 'dd-spmenu-push',
		activeClass     : 'menu-active',
		showLeftClass   : 'menu-left',
		showRightClass  : 'menu-right',
		menuOpenClass   : 'dd-spmenu-open',
		pushBodyClass   : 'push-body',
		closeOnClickOutside: true
	};
})(jQuery);