<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('userpage user-profile');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Alerts', 'flatter');;
    }

    $osc_user = osc_user();
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<div id="columns">
	<div class="container">
    	<div class="row">
			<div class="col-md-3">
            	<?php osc_run_hook('before-main'); ?>
            </div>
            <div class="col-md-9">
            	<div class="page-title">
                	<h2><?php _e('Alerts', 'flatter'); ?></h2>
                </div>
                <div class="searchpage">
                <?php if(osc_count_alerts() == 0) { ?>
                    <div id="content">
                        <p class="empty"><?php _e('You do not have any alerts yet', 'flatter'); ?></p>
                    </div>
				<?php } else { ?>
                <div id="content">
                	<?php
					$i = 1;
					while(osc_has_alerts()) { ?>
						<div class="alert-item" >
							<h5><?php _e('Alert', 'flatter'); ?> <?php echo $i; ?><a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'flatter')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><?php _e('Delete this alert', 'flatter'); ?></a></h5>
							
							<?php if(osc_count_items() == 0) { ?>
                            	<div class="empty">
									0 <?php _e('Listings', 'flatter'); ?>
                                </div>
							<?php } else { ?>
                            	<?php osc_current_web_theme_path('loop.php') ; ?>
                            <?php } ?>    
						</div>
					<?php
					$i++;
					}
					?>
                </div>
                <?php } ?>
				</div><!-- search page -->
            </div>
		</div>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>