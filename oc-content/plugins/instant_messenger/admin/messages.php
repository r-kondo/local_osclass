<?php
  // Create menu
  $title = __('Messages', 'instant_messenger');
  im_menu($title);
  
  $thread_id = Params::getParam('thread-id');

  if($thread_id <> '' && $thread_id > 0) {
    $thread = ModelIM::newInstance()->getThreadById( $thread_id ); 
    $item = Item::newInstance()->findByPrimaryKey( $thread['fk_i_item_id'] ); 
    $messages = ModelIM::newInstance()->getMessagesByThreadId( $thread_id ); 
  }
?>



<div class="mb-body">

  <!-- ITEM COORDINATES -->
  <div class="mb-box">
    <div class="mb-head"><i class="fa fa-list"></i> <?php _e('Messages in thread', 'instant_messenger') . ' #' . $thread['i_thread_id']; ?></div>

    <div class="mb-inside">
      <div class="mb-info-box">
        <div class="mb-line">
          <div class="mb-col-6"><?php _e('Thread Title', 'instant_messenger'); ?>:</div>
          <div class="mb-col-18"><strong><?php echo $thread['s_title']; ?></strong></div>
        </div>

        <div class="mb-line">
          <div class="mb-col-6"><?php _e('Questioner (asking question)', 'instant_messenger'); ?>:</div>
          <div class="mb-col-18"><strong><?php echo $thread['s_from_user_name']; ?></strong> (<?php echo $thread['s_from_user_email']; ?>)</div>
        </div>

        <div class="mb-line">
          <div class="mb-col-6"><?php _e('Respondent (seller)', 'instant_messenger'); ?>:</div>
          <div class="mb-col-18"><strong><?php echo $thread['s_to_user_name']; ?></strong> (<?php echo $thread['s_to_user_email']; ?>)</div>
        </div>

        <div class="mb-line">
          <div class="mb-col-6"><?php _e('Listing', 'instant_messenger'); ?>:</div>
          <div class="mb-col-18"><strong><?php echo $item['s_title']; ?></strong></div>
        </div>
      </div>

      <div class="mb-row">&nbsp;</div>


      
      <div class="mb-table im_list">
        <div class="mb-table-head">
          <div class="mb-col-1"><?php _e('ID', 'instant_messenger');?></div>
          <div class="mb-col-4 mb-align-left"><?php _e('Sender (from)', 'instant_messenger'); ?></div>
          <div class="mb-col-12 mb-align-left"><?php _e('Message', 'instant_messenger'); ?></div>
          <div class="mb-col-4 mb-align-left"><?php _e('Attachment', 'instant_messenger'); ?></div>
          <div class="mb-col-2"><?php _e('Date', 'instant_messenger'); ?></div>
        </div>

        <?php foreach($messages as $m) { ?>


          <div class="mb-table-row <?php echo ($m['i_type'] == 0 ? 'im-from' : 'im-to'); ?>">
            <div class="mb-col-1"><?php echo $m['pk_i_id']; ?></div>
            <div class="mb-col-4 mb-align-left"><a href="<?php echo osc_admin_base_url(true); ?>?page=users&action=edit&id=<?php echo ($m['i_type'] == 0 ? $thread['i_from_user_id'] : $thread['i_to_user_id']); ?>" target="_blank"><?php echo ($m['i_type'] == 0 ? $thread['s_from_user_name'] : $thread['s_to_user_name']); ?></a></div>
            <div class="mb-col-12 mb-align-left mb-no-overflow"><?php echo ($m['i_type'] == 1 ? '<i class="fa fa-mail-reply" title="' . __('Reply of seller', 'instant_messenger') . '"></i>' : ''); ?><?php echo $m['s_message']; ?></div>
            <div class="mb-col-4 mb-align-left mb-att">
              <?php if($m['s_file'] <> '') { ?>
                <a href="<?php echo osc_base_url() . 'oc-content/plugins/instant_messenger/download/' . $m['s_file']; ?>" target="_blank"><?php echo $m['s_file']; ?></a>
              <?php } ?>
            </div>
            <div class="mb-col-2 mb-gray mb-i" style="font-size:11px;"><?php echo im_get_time_diff( $m['d_datetime'] ); ?></div>
          </div>
        <?php } ?>


        <?php if(count($messages) == 0) { ?>
          <div class="mb-table-row mb-row-empty"><i class="fa fa-warning"></i><span><?php _e('No messages in this thread', 'instant_messenger'); ?></span></div>
        <?php } ?>
      </div>

    </div>
  </div>
</div>

<?php echo im_footer(); ?>