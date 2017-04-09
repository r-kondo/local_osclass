<?php
  // Create menu
  $title = __('Maintenance', 'instant_messenger');
  im_menu($title);
  
  // GET & UPDATE PARAMETERS
  // $variable = mb_param_update( 'param_name', 'form_name', 'input_type', 'plugin_var_name' );
  // input_type: check or value

  $thread_days = mb_param_update( 'thread_days', 'plugin_action', 'value', 'plugin-instant_messenger' );
  $att_days = mb_param_update( 'att_days', 'plugin_action', 'value', 'plugin-instant_messenger' );


  if(Params::getParam('plugin_action') == 'done') { 

    // THREADS REMOVE
    if(Params::getParam('type') == 'thread') { 
      $thread_datetime = date('Y-m-d h:i:s', strtotime(' -' . $thread_days . ' day', time()));

      ModelIM::newInstance()->removeThreadsByDate( $thread_datetime );
      message_ok(__('Threads with no activity in last', 'instant_messenger') . ' ' . $thread_days . ' ' . __('days were removed. (last activity on', 'instant_messenger') . ' ' . $thread_datetime . ' ' .  __('or earlier).', 'instant_messenger'));
    }



    // ATTACHMENT REMOVE
    if(Params::getParam('type') == 'attachment') { 
      $att_datetime = date('Y-m-d h:i:s', strtotime(' -' . $att_days . ' day', time()));

      $messages = ModelIM::newInstance()->getMessagesByDate( $att_datetime );

      foreach($messages as $m) {
        $to_delete = osc_base_path() . 'oc-content/plugins/instant_messenger/download/' . $m['s_file'];
        ModelIM::newInstance()->deleteMessageAttachment( $m['pk_i_id'] );
        unlink($to_delete);
      }

      message_ok(__('Attachments older than', 'instant_messenger') . ' ' . $att_days . ' ' . __('days were removed. (uploaded on', 'instant_messenger') . ' ' . $att_datetime . ' ' .  __('or earlier).', 'instant_messenger'));
    }
  }
?>



<div class="mb-body">
  
  <!-- REMOVE THREADS -->
  <div class="mb-box">
    <div class="mb-head"><i class="fa fa-list"></i> <?php _e('Remove old threads', 'instant_messenger'); ?></div>

    <div class="mb-inside">
      <form name="promo_form" id="promo_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="page" value="plugins" />
        <input type="hidden" name="action" value="renderplugin" />
        <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>maintenance.php" />
        <input type="hidden" name="plugin_action" value="done" />
        <input type="hidden" name="type" value="thread" />


        <div class="mb-row">
          <label for="thread_days"><span><?php _e('Remove Threads Older than', 'instant_messenger'); ?></span></label> 
          <input size="6" name="thread_days" id="thread_days" class="mb-short" type="text" value="<?php echo $thread_days; ?>" />
          <div class="mb-input-desc"><?php _e('days', 'instant_messenger'); ?></div>

          <div class="mb-explain"><?php _e('When there was no activity on thread for last XY days, it will be removed with all messages.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-foot">
          <button type="submit" class="mb-button"><?php _e('Remove', 'instant_messenger');?></button>
        </div>
      </form>
    </div>
  </div>



  <!-- REMOVE ATTACHMENTS -->
  <div class="mb-box">
    <div class="mb-head"><i class="fa fa-paperclip"></i> <?php _e('Remove old attachments', 'instant_messenger'); ?></div>

    <div class="mb-inside">
      <form name="promo_form" id="promo_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="page" value="plugins" />
        <input type="hidden" name="action" value="renderplugin" />
        <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>maintenance.php" />
        <input type="hidden" name="plugin_action" value="done" />
        <input type="hidden" name="type" value="attachment" />
      
        <div class="mb-row">
          <label for="att_days"><span><?php _e('Remove Attachments Older than', 'instant_messenger'); ?></span></label> 
          <input size="6" name="att_days" id="att_days" class="mb-short" type="text" value="<?php echo $att_days; ?>" />
          <div class="mb-input-desc"><?php _e('days', 'instant_messenger'); ?></div>

          <div class="mb-explain"><?php _e('Attachments that are older than XY days will be removed.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-foot">
          <button type="submit" class="mb-button"><?php _e('Remove', 'instant_messenger');?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php echo im_footer(); ?>