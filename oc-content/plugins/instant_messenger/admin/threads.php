<?php
  // Create menu
  $title = __('Threads', 'instant_messenger');
  im_menu($title);
  
  
  $per_page = osc_get_preference('per_page', 'plugin-instant_messenger') <> '' ? osc_get_preference('per_page', 'plugin-instant_messenger') : 100;
  $user_id = Params::getParam('user_id') <> '' ? Params::getParam('user_id') : 0;


  $threads_count = ModelIM::newInstance()->countThreadsByUserId($user_id);
  $threads_count = $threads_count['i_count'];

  $per_page = ( osc_get_preference('threads_per_page','plugin-instant_messenger') <> '' ? osc_get_preference('threads_per_page','plugin-instant_messenger') : 20 );
  $page = ( Params::getParam('start') <> '' ? floor(Params::getParam('start')/$per_page)+1 : 1 );
  $page_count = ceil($threads_count/$per_page);
  $start = ($page - 1) * $per_page;

  $threads = ModelIM::newInstance()->getThreadsByUserId( $user_id, $per_page, $start ); 
?>



<div class="mb-body">
  
  <!-- ITEM COORDINATES -->
  <div class="mb-box">
    <div class="mb-head"><i class="fa fa-list"></i> <?php _e('User threads', 'instant_messenger'); ?></div>

    <div class="mb-inside">
      <form name="promo_form" id="promo_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" style="margin-bottom:35px;" >
        <input type="hidden" name="page" value="plugins" />
        <input type="hidden" name="action" value="renderplugin" />
        <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>threads.php" />
        <input type="hidden" name="plugin_action" value="done" />
        
        <div class="mb-row mb-entry-filter">
          <div class="mb-col-4">
            <label for="user_id" style="width:auto;"><span><?php _e('User ID', 'instant_messenger'); ?></span></label>
            <input size="12" type="text" name="user_id" value="<?php echo Params::getParam('user_id'); ?>" />
          </div>

          <div class="mb-col-20">
            <button type="submit" class="mb-button-white"><i class="fa fa-filter"></i> <?php _e('Filter threads', 'instant_messenger');?></button>
          </div>
        </div>
      </form>
      
      
      <div class="mb-table im_list">
        <div class="mb-table-head">
          <div class="mb-col-1"><?php _e('ID', 'instant_messenger');?></div>
          <div class="mb-col-5 mb-align-left"><?php _e('Title', 'instant_messenger');?></div>
          <div class="mb-col-5 mb-align-left"><?php _e('Listing', 'instant_messenger');?></div>
          <div class="mb-col-3 mb-align-left"><?php _e('Questioner (from)', 'instant_messenger');?></div>
          <div class="mb-col-3 mb-align-left"><?php _e('Respondent (to)', 'instant_messenger');?></div>
          <div class="mb-col-2"><?php _e('Count', 'instant_messenger');?></div>
          <div class="mb-col-2"><?php _e('Last activity', 'instant_messenger');?></div>
          <div class="mb-col-3"><?php _e('Show messages', 'instant_messenger');?></div>
        </div>

        <?php foreach($threads as $t) { ?>
          <?php $item = Item::newInstance()->findByPrimaryKey( $t['fk_i_item_id'] ); ?>


          <div class="mb-table-row">
            <div class="mb-col-1"><?php echo $t['i_thread_id']; ?></div>
            <div class="mb-col-5 mb-align-left"><a href="<?php echo osc_admin_base_url(true); ?>?page=plugins&action=renderplugin&file=instant_messenger/admin/messages.php&thread-id=<?php echo $t['i_thread_id']; ?>" target="_blank"><?php echo osc_highlight($t['s_title'], 25); ?></a></div>
            <div class="mb-col-5 mb-align-left"><a href="<?php echo osc_admin_base_url(true); ?>?page=items&action=item_edit&id=<?php echo $item['pk_i_id']; ?>" target="_blank"><?php echo osc_highlight($item['s_title'], 25) . ' (#' . $item['pk_i_id'] . ')'; ?></a></div>
            <div class="mb-col-3 mb-align-left"><a href="<?php echo osc_admin_base_url(true); ?>?page=users&action=edit&id=<?php echo $t['i_from_user_id']; ?>" target="_blank"><?php echo $t['s_from_user_name']; ?></a></div>
            <div class="mb-col-3 mb-align-left"><a href="<?php echo osc_admin_base_url(true); ?>?page=users&action=edit&id=<?php echo $t['i_to_user_id']; ?>" target="_blank"><?php echo $t['s_to_user_name']; ?></a></div>
            <div class="mb-col-2 mb-i mb-gray"><?php echo $t['i_count']; ?><?php echo ($t['i_count'] == 1 ? __('pm', 'instant_messenger') : __('pms', 'instant_messenger') ); ?></div>
            <div class="mb-col-2 mb-i mb-gray"><?php echo im_get_time_diff( $t['d_datetime'] ); ?></div>
            <div class="mb-col-3"><a href="<?php echo osc_admin_base_url(true); ?>?page=plugins&action=renderplugin&file=instant_messenger/admin/messages.php&thread-id=<?php echo $t['i_thread_id']; ?>" target="_blank"><i class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        <?php } ?>


        <?php if($threads_count == 0) { ?>
          <?php if($user_id == '') { ?>
            <div class="mb-table-row mb-row-empty"><i class="fa fa-warning"></i><span><?php _e('No threads found', 'instant_messenger'); ?></span></div>
          <?php } else { ?>
            <div class="mb-table-row mb-row-empty"><i class="fa fa-warning"></i><span><?php _e('No threads found for selected user', 'instant_messenger'); ?></span></div>
          <?php } ?>
        <?php } ?>
      </div>


      <!-- PAGINATION -->
      <?php if($page_count > 1) { ?>
        <div id="mb-pagination">
          <div class="mb-pagination-wrap">
            <?php 
              if($user_id <> '' && $user_id > 0) { 
                $file_path = 'instant_messenger/admin/threads.php&user_id=' . $user_id;
              } else {
                $file_path = 'instant_messenger/admin/threads.php';
              }
            ?>
            
            <div><?php _e('Page', 'instant_messenger'); ?>:</div> <?php echo im_add_pagination($threads_count, $per_page, $file_path); ?>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>

<?php echo im_footer(); ?>