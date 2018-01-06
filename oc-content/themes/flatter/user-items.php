<?php

    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('searchpage userpage user-items');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    //osc_current_web_theme_path('header.php') ;

    $listClass = '';
    $buttonClass = '';
    if(Params::getParam('ShowAs') == 'gallery'){
        $listClass = 'listing-grid';
        $buttonClass = 'active';
    }
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
                	<h2><?php _e('My listings', 'flatter'); ?></h2>
                </div>
                
                <?php if(osc_count_items() >= 1) { ?>
            	<div class="actions clearfix">
                	<div class="pull-left" style="padding-top:5px;">
                    	<span class="counter-search">
							<?php $search_number = flatter_search_number();
                        	printf(__('%1$d - %2$d of %3$d listings', 'flatter'), $search_number['from'], $search_number['to'], $search_number['of']); ?>
                        </span>
                    </div>
                	<div class="togglebutton <?php echo $buttonClass; ?> pull-right">
                       <a href="<?php echo osc_user_list_items_url(); ?>?ShowAs=list" class="list-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><i class="fa fa-th-list"></i> <?php _e('List','flatter'); ?></a>
                       <a href="<?php echo osc_user_list_items_url(); ?>?ShowAs=gallery" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><i class="fa fa-th"></i> <?php _e('Grid','flatter'); ?></a>
                  	</div><!-- Togglebutton -->
                </div>
                <?php } ?>
                
                <?php if(osc_count_items() == 0) { ?>
                <div id="content">
                	<p class="empty"><?php printf(__('There are no results matching "%s"', 'flatter'), osc_search_pattern()) ; ?></p>
                </div>
                <?php } else { ?>
                <div id="content">
                 <?php if(osc_count_items() > 0) {
                    //echo '<h5>'.__('Listings','flatter').'</h5>';
                    View::newInstance()->_exportVariableToView("listType", 'items');
                    View::newInstance()->_exportVariableToView("listClass",$listClass);
                    osc_current_web_theme_path('loop.php');
                    }
                ?>
                </div>
                <div class="pagination" >
                      <?php echo osc_pagination_items(); ?>
                 </div>
                <?php } ?>
                <!-- Search Content End -->
            </div>
		</div>
    </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
