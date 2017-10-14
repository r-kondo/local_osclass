(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the Osclass core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	
	//addclass to body element
	
	$(window).load( function() {
		
    });

    
	


})( jQuery );


$(document).ready( function() {
	$('.upload-easy-avatar :file').on('change', function() {
	  var input = $(this),
	      numFiles = input.get(0).files ? input.get(0).files.length : 1,
	      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	  input.trigger('fileselect', [numFiles, label]);

	});

    $('.upload-easy-avatar :file').on('fileselect', function(event, numFiles, label) {
        
        if (typeof (FileReader) != "undefined") {

            var image_holder = $('.custom-easy-avatar');

            var reader = new FileReader();
            reader.onload = function (e) {

                image_holder.attr("style", "background: #eee url('" + e.target.result +"') no-repeat scroll 50% 50%;");

                /*$("<img />", {
                    "style": "background: #eee url('" + e.target.result +"') no-repeat scroll 50% 50%;",
                    "class": "thumb-image"
                }).appendTo(image_holder);*/

            }
            
            reader.readAsDataURL($(this)[0].files[0]);
        }
        
    });
  
});

