<?php
 
    // meta tag robots
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','flatter_nofollow_construct');
    } else {
        osc_add_hook('header','flatter_follow_construct');
    }

    flatter_add_body_class('searchpage');
    $listClass = '';
    $buttonClass = '';
    if(osc_search_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('search-sidebar.php');
    }
	?>
    
<?php osc_current_web_theme_path('header.php') ; ?>
<div id="columns">
	<div class="container">
    	<?php //osc_run_hook('search_ads_listing_top'); ?>
    	<div class="row sbreadcrumb">
        	<?php $breadcrumb = osc_breadcrumb('', false, get_breadcrumb_lang());
				if( $breadcrumb !== '') { ?>
					<?php echo $breadcrumb; ?>
			<?php } ?>
        </div>
        
    	<div class="row">
        	<div id="searchfilter" class="col-md-3 col-sm-4 hidden-xs">
            	<?php osc_run_hook('before-main'); ?>
            </div>
            
        	<div class="col-md-9 col-sm-8">
            	<?php if( osc_get_preference('position4_enable', 'flatter_theme') != '0') { ?>
                <div id="position_widget"<?php if( osc_get_preference('position4_hide', 'flatter_theme') != '0') {echo" class='hidden-xs'";}?>>
                    <div class="dd-widget position_4">
                        <?php echo osc_get_preference('position4_content', 'flatter_theme'); ?>
                    </div>
                </div>
                <?php } ?>
                
            	<div class="page-title">
					<?php if(search_title()) { ?>
                    <h2><?php echo search_title(); ?></h2>
                    <?php } else { ?>
                    <h2><?php _e('Search results'); ?></h2>
                    <?php } ?>
                    <span class="counter-search">
                    <?php $search_number = flatter_search_number();
                    printf(__('%1$d - %2$d of %3$d listings', 'flatter'), $search_number['from'], $search_number['to'], $search_number['of']); ?>
                    </span>
                </div>
            	<?php if(osc_count_items() >= 1) { ?>
            	<div class="actions clearfix">
                	<a id="filter" class="btn-filter btn-clr"><?php _e('Show filter','flatter'); ?></a>
                	<div class="togglebutton <?php echo $buttonClass; ?> pull-left hidden-xs">
                       <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>" class="list-button " data-class-toggle="listing-list" data-destination="#listing-card-list"><i class="fa fa-th-list"></i> <?php _e('List','flatter'); ?></a>
                       <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><i class="fa fa-th"></i> <?php _e('Grid','flatter'); ?></a>
                  	</div><!-- Togglebutton -->
                	<div class="sortby pull-right">
						<?php
                          $orders = osc_list_orders();
                          $current = '';
                          foreach($orders as $label => $params) {
                              $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                              if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                                  $current = $label;
                              }
                          }
                          ?>
						<div class="btn-group">
                          <button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo $current; ?><span><i class="fa fa-sort"></i></span></button>
                          <?php $i = 0; ?>
                          <ul class="dropdown-menu pull-right" role="menu">
                              <?php
                              foreach($orders as $label => $params) {
                                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                  <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                      <li><a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                                  <?php } else { ?>
                                      <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                                  <?php } ?>
                                  <?php $i++; ?>
                              <?php } ?>
                            </ul>
						</div>
                	</div><!-- SortBy -->
                </div>
                <?php } ?>
				
				<?php if(osc_count_items() == 0) { ?>
                <div id="content">
                	<p class="empty"><?php printf(__('There are no results matching "%s"', 'flatter'), osc_search_pattern()) ; ?></p>
                </div>
                <?php } else { ?>
                <div id="content premium">
                
                <?php
                    $i = 0;
                    osc_get_premiums('3');
                    if(osc_count_premiums() > 0) {
                    //echo '<h5>'.__('Premium listings','flatter').'</h5>';
                    View::newInstance()->_exportVariableToView("listType", 'premiums');
                    View::newInstance()->_exportVariableToView("listClass",$listClass.' premium-list');
                    osc_current_web_theme_path('loop.php');
                    }
                ?>
                </div>
                
                <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0' && osc_get_preference('adsense_searchtop', 'flatter_theme') != null ) { ?>
                <div class="pagewidget">
                    <div class="gadsense">
                        <?php echo osc_get_preference('adsense_searchtop', 'flatter_theme'); ?>
                    </div>
                </div>
                <?php } ?>
                <!-- Adsense Search Top END -->
                
                <div id="content">
                 <?php if(osc_count_items() > 0) {
                    //echo '<h5>'.__('Listings','flatter').'</h5>';
                    View::newInstance()->_exportVariableToView("listType", 'items');
                    View::newInstance()->_exportVariableToView("listClass",$listClass);
                    osc_current_web_theme_path('loop.php');
                    }
                ?>
                </div>
                
                <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0' && osc_get_preference('adsense_searchbottom', 'flatter_theme') != null ) { ?>
                <div class="pagewidget">
                    <div class="gadsense">
                        <?php echo osc_get_preference('adsense_searchbottom', 'flatter_theme'); ?>
                    </div>
                </div>
                <?php } ?>
                <!-- Adsense Search Bottom END -->
                
                <div class="pagination" >
                      <?php echo osc_search_pagination(); ?>
                 </div>
                <?php } ?>
                <!-- Search Content End -->
                
				<?php if( osc_get_preference('position5_enable', 'flatter_theme') != '0') { ?>
                <div id="position_widget"<?php if( osc_get_preference('position5_hide', 'flatter_theme') != '0') {echo" class='hidden-xs'";}?>>
                    <div class="dd-widget position_5">
                        <?php echo osc_get_preference('position5_content', 'flatter_theme'); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            
        </div>
	</div>
</div>
     
<script type="text/javascript">
$(document).ready(function(){
  $("#filter").click(function(){
	$("#searchfilter").removeClass("hidden-xs").show(300);
  });
  $("#filter").click(function(){
	$("#filter").hide();
  });
}); 

$(document).ready(function(){
    $(".btn-sub").click(function(){
        $.post('<?php echo osc_base_url(true); ?>', {email:$("#alert_email").val(), userid:$("#alert_userId").val(), alert:$("#alert").val(), page:"ajax", action:"alerts"},
            function(data){
                if(data==1) { alert('<?php echo osc_esc_js(__('You have sucessfully subscribed to the alert', 'flatter')); ?>'); }
                else if(data==-1) { alert('<?php echo osc_esc_js(__('Invalid email address', 'flatter')); ?>'); }
                else { alert('<?php echo osc_esc_js(__('There was a problem with the alert', 'flatter')); ?>');
                };
        });
        return false;
    });

    var sQuery = '<?php echo osc_esc_js(AlertForm::default_email_text()); ?>';

    if($('input[name=alert_email]').val() == sQuery) {
        //$('input[name=alert_email]').css('color', 'gray');
    }
    $('input[name=alert_email]').click(function(){
        if($('input[name=alert_email]').val() == sQuery) {
            $('input[name=alert_email]').val('');
            //$('input[name=alert_email]').css('color', '');
        }
    });
    $('input[name=alert_email]').blur(function(){
        if($('input[name=alert_email]').val() == '') {
            $('input[name=alert_email]').val(sQuery);
            //$('input[name=alert_email]').css('color', 'gray');
        }
    });
    $('input[name=alert_email]').keypress(function(){
        //$('input[name=alert_email]').css('background','');
    })
});
</script>
<?php osc_current_web_theme_path('footer.php') ; ?>