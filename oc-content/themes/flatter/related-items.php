<?php related_listings(); ?>
<?php if( osc_count_items() >= 1) { ?>
        <div id="sections" class="relatedlistings">
        	<h3><!--<i class="fa fa-newspaper-o hidden-xs"></i> --><?php _e('Related listings', 'flatter'); ?></h3>
            <div id="owl-related" class="owl-carousel">
                <?php while ( osc_has_items() ) { ?>
                <div class="item">
                    <div class="list">
						<?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="image">
                            <div>
                            <?php if(osc_count_item_resources()) { ?>
                            <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_preview_url(); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive" /></a>
                            <?php } else { ?>
                            <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no-image.jpg'); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive"></a>
                            <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="caption">
                            <h3 class="clr"><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h3>
                            <span class="meta"><?php echo osc_item_category(); ?></span>
                            <p class="description"><?php echo osc_highlight( strip_tags( osc_item_description() ), 110 ) ; ?></p>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <?php if( osc_price_enabled_at_items() ) { ?><span class="price sclr"><?php echo osc_format_price(osc_item_price()); ?></span><?php } ?>
                                </div>
                                <?php if (function_exists("watchlist")) { ?>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="wishlist pull-right">
                                        <?php if( osc_is_web_user_logged_in() ) { ?>
                                            <?php watchlist2(); ?>
                                        <?php } else { ?>
                                        <a title="<?php _e("Add to watchlist", 'watchlist'); ?>" rel="nofollow" href="<?php echo osc_user_login_url(); ?>"><i class="fa fa-heart-o fa-lg"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div><!-- owl carousel -->	
    </div><!-- Related Listings -->
<?php } ?>