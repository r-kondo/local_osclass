<?php
	// meta tag robots
    if( osc_item_is_spam() || osc_premium_is_spam() ) {
        osc_add_hook('header','flatter_nofollow_construct');
    } else {
        osc_add_hook('header','flatter_follow_construct');
    }

    osc_enqueue_script('jquery-validate');

    flatter_add_body_class('item');

    $location = array();
    if( osc_item_city_area() !== '' ) {
        $location[] = osc_item_city_area();
    }
    if( osc_item_city() !== '' ) {
        $location[] = osc_item_city();
    }
    if( osc_item_region() !== '' ) {
        $location[] = osc_item_region();
    }
    if( osc_item_country() !== '' ) {
        $location[] = osc_item_country();
    }

    osc_current_web_theme_path('header.php');
?>
<div id="columns">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-sm-7 col-xs-12 item-title">
        		<h2><?php echo osc_item_title(); ?></h2>
                <span class="location"><i class="glyphicon glyphicon-map-marker clr"></i><a href="<?php echo osc_item_url(); ?>#gmap"><?php echo implode(', ', $location); ?></a></span>&nbsp;&nbsp;&nbsp;<span class="category hidden-xs"><i class="glyphicon glyphicon-folder-open clr"></i> <?php echo osc_item_category(); ?></span>&nbsp;&nbsp;&nbsp;<span class="posted"><i class="glyphicon glyphicon-calendar clr"></i> <?php echo osc_format_date( osc_item_pub_date() ); ?></span>
            </div>
        </div>
    	<div class="row">
        	<div class="col-md-8 col-sm-7">
            	
            	<?php if( osc_get_preference('position7_enable', 'flatter_theme') != '0') { ?>
                <div id="position_widget"<?php if( osc_get_preference('position7_hide', 'flatter_theme') != '0') {echo " class='hidden-xs'";}?>>
                    <div class="dd-widget position_7">
                    <?php echo osc_get_preference('position7_content', 'flatter_theme'); ?>
                    </div>
                </div>
              	<?php } ?>
                
            	<div id="content">
					<?php if( osc_images_enabled_at_items() ) { ?>
                    <?php if( osc_count_item_resources() >= 2 ) { ?> 
                    <div id="carousel-bounding-box"> 
                        <div class="carousel slide" id="pixCarousel" data-interval="false">
                        <div class="carousel-inner">
                        <div class="active item" data-slide-number="0">
                        	<img class="img-responsive" src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" />
                        </div>
						<?php for ( $i > 1; osc_has_item_resources(); $i++ ) { ?>
                            <?php if( $i >= 1 ) { ?>
                                <div class="item" data-slide-number="<?php print $i; ?>">
                                    <img src="<?php echo osc_resource_url(); ?>" class="img-responsive" alt="<?php echo osc_item_title(); ?>" />
                                </div>
                            <?php } ?>
                        <?php } ?>
                        </div>
                        <a class="carousel-control left" data-slide="prev" href="#pixCarousel"><i class="fa fa-chevron-left fa-lg"></i></a> <a class="carousel-control right" data-slide="next" href="#pixCarousel"><i class="fa fa-chevron-right fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="slider-thumbs clearfix">
                        <ul>
                        <?php osc_reset_resources(); ?>
                            <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                                <?php if( $i >= 0 ) { ?>
                                <li><a id="carousel-selector-<?php print $i; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_item_title(); ?>" /></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } else if( osc_count_item_resources() == 1 ) { ?>
                    	<div class="singleimage">
                    		<img class="img-responsive" src="<?php echo osc_resource_url(); ?>" alt="<?php osc_item_title(); ?>" />
                    	</div>
                    <?php } else { ?>
                    <?php } ?>
                    <?php } ?>
                    <!-- Photos End -->

                    <div id="itemdetails" class="clearfix">
                    	<div class="description">
                    	<?php echo osc_item_description(); ?>
                        </div>
                        
                        <?php if( osc_count_item_meta() >= 1 ) { ?>
                    	<div id="custom_fields">
                        <h3><?php _e('Additional Details', 'flatter'); ?></h3>
                        <table>
                        	<?php while ( osc_has_item_meta() ) { ?>
                        	<tr>
								<?php if(osc_item_meta_value()!='') { ?>
                                <td><strong><?php echo osc_item_meta_name(); ?>:</strong></td><td><?php echo osc_item_meta_value(); ?></td>
                                <?php } ?>
                            </tr>
                        	<?php } ?>
                        </table>
                        </div><!-- Custom fields END -->
                        <?php } ?>
                        
                        <div id="extra-fields">
						<?php osc_run_hook('item_detail', osc_item() ); ?>
                        </div>
                        
                    </div> <!-- Description End -->
                    
                </div><!-- Item Content End -->
                
                <div class="row item-bottom">
                	<div class="col-md-6">
                    <ul class="social-share">
                        <li class="facebook">
                           <a class="whover" title="" data-toggle="tooltip" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo osc_item_url(); ?>'), 'facebook-share-dialog', 'height=279, width=575'); return false;" data-original-title="<?php _e("Share on Facebook", 'flatter'); ?>"><i class="fa fa-facebook"></i>
                           </a>
                         </li>
                        <li class="twitter">
                             <a class="whover" title="" href="https://twitter.com/intent/tweet?text=<?php echo osc_item_title(); ?>&url=<?php echo osc_item_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e("Share on Twitter", 'flatter'); ?>"><i class="fa fa-twitter"></i>
                             </a>
                         </li>
                        <li class="googleplus">
                            <a class="whover" title="" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,height=600,width=600');return false;" href="https://plus.google.com/share?url=<?php echo osc_item_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e("Share on Google+", 'flatter'); ?>">
                                <i class="fa fa-google-plus"></i>
                            </a>
                       </li>
                        <li class="sendmail">
                            <a class="whover" title="" rel="nofollow" href="<?php echo osc_item_send_friend_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e("Send to a Friend", 'flatter'); ?>">
                            <i class="fa fa-envelope"></i>
                            </a>
                        </li>
                    </ul><!-- Social Share End -->
                	</div>
                    <div class="col-md-6">
                    	<?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                        	<div class="pull-right edit">
                        	<a class="whover" href="<?php echo osc_item_edit_url(); ?>"  rel="nofollow"><i class="fa fa-pencil"></i></a>
                            </div>
                        <?php } else { ?>
                    	<div class="btn-group pull-right markas" data-toggle="tooltip" data-original-title="<?php _e("Mark as...", 'flatter'); ?>">
                        <a class="whover" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag"></i></a>
                            <ol class="dropdown-menu">
                                <li><a id="item_spam" href="<?php echo osc_item_link_spam(); ?>" rel="nofollow"><?php _e('Mark as spam', 'flatter'); ?></a></li>
                                <li><a id="item_bad_category" href="<?php echo osc_item_link_bad_category(); ?>" rel="nofollow"><?php _e('Mark as misclassified', 'flatter'); ?></a></li>
                                <li><a id="item_repeated" href="<?php echo osc_item_link_repeated(); ?>" rel="nofollow"><?php _e('Mark as duplicated', 'flatter'); ?></a></li>
                                <li><a id="item_expired" href="<?php echo osc_item_link_expired(); ?>" rel="nofollow"><?php _e('Mark as expired', 'flatter'); ?></a></li>
                                <li><a id="item_offensive" href="<?php echo osc_item_link_offensive(); ?>" rel="nofollow"><?php _e('Mark as offensive', 'flatter'); ?></a></li>
                             </ol>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0' && osc_get_preference('adsense_listing', 'flatter_theme') != null ) { ?>
                <div class="pagewidget">
                    <div class="gadsense">
                        <?php echo osc_get_preference('adsense_listing', 'flatter_theme'); ?>
                    </div>
                </div>
                <?php } ?>
                <!-- Comments Template -->
                <?php osc_current_web_theme_path('comments.php'); ?>
                
                <?php if( osc_get_preference('position8_enable', 'flatter_theme') != '0') { ?>
                    <div id="position_widget" <?php if( osc_get_preference('position8_hide', 'flatter_theme') != '0') {echo" class='hidden-xs'";}?>>
                        <div class="dd-widget position_8">
                        <?php echo osc_get_preference('position8_content', 'flatter_theme', "UTF-8"); ?>
                        </div>
                    </div>
                  <?php } ?>
                  
                <!-- Related Listing Template -->
       			<?php osc_current_web_theme_path('related-items.php'); ?>
        
            </div><!-- Item Content -->
            
            <!-- Sidebar Template -->
            <?php osc_current_web_theme_path('item-sidebar.php'); ?>
            
        </div>
        
        
                
	</div>
</div>
<script type="text/javascript">
	// Remove current seller item
	$(function () { 
		$(".sellerlisting .current").remove();
	});
	
	// Grey color for Custom fields
	$(function () { 
		$("#custom_fields tr:nth-child(2n+2)").addClass("grey")
	});
	$(document).ready(function() {
		// Item Custom fields
		if ($('#custom_fields').html()) {
			$('#content .description').addClass('col7');
			//$('#custom_fields').addClass('col3');
		}
		else
		{
			$('#custom_fields').remove();
			$('#des').addClass('col-md-12 col-sm-12');
			
		}
	});
</script>
<?php osc_current_web_theme_path('footer.php'); ?>