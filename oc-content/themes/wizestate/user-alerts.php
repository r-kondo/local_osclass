<?php
    // meta tag robots
    osc_add_hook('header','osclasswizards_nofollow_construct');

    osclasswizards_add_body_class('user user-alerts');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return osc_esc_html(__('Alerts', OSCLASSWIZARDS_THEME_FOLDER));
    }
	
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
?>

<div class="row">
  <?php
	        osc_current_web_theme_path('user-sidebar.php');

   ?>
  <div class="col-sm-8 col-md-9">
    <h1 class="title">
      <?php _e('Alerts', OSCLASSWIZARDS_THEME_FOLDER); ?>
    </h1>
    <?php if(osc_count_alerts() == 0) { ?>
    <h3>
      <?php _e('You do not have any alerts yet', OSCLASSWIZARDS_THEME_FOLDER); ?>
      .</h3>
    <?php } else { ?>
    <?php
    $i = 1;
    while(osc_has_alerts()) { ?>
    <div class="userItem" >
      <div class="alert_delete">
        <h3>
          <?php _e('Alert', OSCLASSWIZARDS_THEME_FOLDER); ?>
          <?php echo $i; ?> <a class="alert_delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'osclasswizardsw')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>">
          <?php _e('Delete this alert', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </h3>
      </div>
      <div>
        <?php osc_current_web_theme_path('loop-user-alerts-grid.php') ; ?>
        <?php if(osc_count_items() == 0) { ?>
        <?php _e('Listings', OSCLASSWIZARDS_THEME_FOLDER); ?>
        <?php } ?>
      </div>
    </div>
    <br />
    <?php
    $i++;
    }
    ?>
    <?php  } ?>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
