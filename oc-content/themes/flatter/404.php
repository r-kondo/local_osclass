<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');
    flatter_add_body_class('page not-found');
    osc_current_web_theme_path('header.php') ;
?>
<div id="columns">
	<div class="container">
    	<div class="row">
        	<div style="text-align:center; padding:50px;" class="col-md-12 col-sm-12 col-xs-12 item-title">
        		<h3><?php _e("Sorry but I can't find the page you're looking for", 'flatter'); ?></h3>
                <h1 class="clr" style="font-size:76px; font-weight:500;"><?php _e("404", 'flatter'); ?></h1>
                <h3><?php _e("Page not found!", 'flatter'); ?></h3>
            </div>
        </div>
        
        <div id="content">
            <h4><?php _e("Look for it in the most popular categories.", 'flatter'); ?></h4>
            
            <div class="mobile-categories visible-xs" style="padding:0;">
                    <div class="row">
                        <?php osc_goto_first_category(); ?>
                        <?php if ( osc_count_categories() >= 0 ) { ?>
                        <?php while ( osc_has_categories() ) { ?>
                            <div class="mcategory">
                            
                            <h4 class="mcategory-toggle clr">
                            <i class="<?php echo osc_esc_html( osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ); ?> fa-2x sclr"></i>
                            <a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a>
                            </h4>
                            <?php if ( osc_count_subcategories() > 0 ) { ?>
                                <ul class="msub-categories">
                                <?php while ( osc_has_subcategories() ) { ?>
                                    <?php if( osc_category_total_items() >= 0 ) { ?>
                                        <li><a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?> (<?php echo osc_category_total_items() ; ?>)</a></li>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            <?php } ?>
                            </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
					<script type="text/javascript">
					$(document).ready(function($) {
						$('.mobile-categories').find('.mcategory-toggle').click(function(){
					
							var self = $(this);
							//Expand or collapse this panel
							self.next().slideToggle('fast');
							//Remove class for all element, except the current selected item
							$('.mcategory-toggle').not(self).removeClass('active');
							//Toggle active class for the current element
							self.toggleClass('active');
							//Hide the other panels
							 $(".msub-categories").not(self.next()).slideUp('fast');
				
						});
					  });
					</script>
                    <style>
                      .mcategory-toggle {cursor: pointer;}
                      .msub-categories {display: none;}
                      .msub-categories.default {display: block;}
                    </style>
    
    
            </div>
            <div class="home-categories hidden-xs">
            <div class="row">
                <?php echo flatter_draw_categories_list(); ?>
            </div><!-- Row END-->
            <script type="text/javascript">
             $('ul.sub-categories').each(function(){
            
                 var LiN = $(this).find('li').length;
                 if( LiN > 4){ 
                     $('li', this).eq(3).nextAll().hide().addClass('toggleable');
                     $(this).append('<li class="morelink">Showmore <i class="fa fa-angle-down"></i></li>'); 
                 }
                 });
             
             
                $('ul.sub-categories').on('click','.morelink', function(){
             
                 if( $(this).hasClass('less') ){ 
                     $(this).html("Showmore <i class='fa fa-angle-down'></i>").removeClass('less'); 
                     }else{
                     $(this).html("Makeless <i class='fa fa-angle-up'></i>").addClass('less'); 
                 }
                 
                 $(this).siblings('li.toggleable').slideToggle();
             }); 
             </script>
        </div>
        </div>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>