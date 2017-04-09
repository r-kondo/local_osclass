<link href="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/css/tipped.css" rel="stylesheet" type="text/css" />
<script src="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/js/tipped.js"></script>
<script src="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/js/user.js"></script>


<?php 
  $secret = Params::getParam('secret');
  $att_enable = osc_get_preference('att_enable','plugin-instant_messenger');
  $message_delete = osc_get_preference('message_delete','plugin-instant_messenger');

  $thread = ModelIM::newInstance()->getThreadById( Params::getParam('thread-id') ); 
  $item = Item::newInstance()->findByPrimaryKey( $thread['fk_i_item_id'] ); 

  $item_details = im_get_item_details( $thread['fk_i_item_id'] );

  // Message types: 0 - FROM user send message to TO user, 1 - TO user send message to FROM user
  if( (osc_is_web_user_logged_in() && osc_logged_user_id() == $thread['i_from_user_id']) || $secret == $thread['s_from_secret']) {
    $type = 0;
  } else {
    $type = 1;
  }


  // MARK AS VIEWED FOR THIS USER
  $is_read = ModelIM::newInstance()->getThreadIsRead( $thread['i_thread_id'], osc_logged_user_id(), $secret );
 
  if( $is_read['pk_i_id'] <> '' && $is_read['pk_i_id'] > 0 && $is_read['i_read'] == 0 ) {
    ModelIM::newInstance()->updateMessagesRead( $thread['i_thread_id'], ($type*(-1) + 1) );
  }


  // MESSAGE SENT TO USER
  if(Params::getParam('im-action') == 'send_message') {
    im_insert_message($thread['i_thread_id'], nl2br(htmlspecialchars(Params::getParam('im-message', false, false))), $type, Params::getFiles('im-file') );
  }


  // DELETE MESSAGE
  if( Params::getParam('del-message-id') <> '' && Params::getParam('del-message-id') > 0 && $message_delete == 1 ) {
    $del_message = ModelIM::newInstance()->getMessageById( Params::getParam('del-message-id') );

    if( $del_message['fk_i_thread_id'] == $thread['i_thread_id'] && $del_message['i_type'] == $type ) {
      ModelIM::newInstance()->deleteMessageById( Params::getParam('del-message-id') );
      osc_add_flash_ok_message( __('Message removed', 'instant_messenger') );

      header('Location: ' . osc_route_url( 'im-messages', array('thread-id' => $del_message['fk_i_thread_id'], 'secret' => $secret)));
    } else {
      osc_add_flash_error_message( __('This is not your message, you cannot remove it!', 'instant_messenger') );
    }

  }


  // DELETE ATTACHMENT
  if(  Params::getParam('del-att-message-id') <> '' && Params::getParam('del-att-message-id') > 0 && Params::getParam('del-file-name') <> '' ) {
    $del_message = ModelIM::newInstance()->getMessageById( Params::getParam('del-att-message-id') );

    if( $del_message['fk_i_thread_id'] == $thread['i_thread_id'] && $del_message['i_type'] == $type ) {
      @unlink( osc_base_path() . 'oc-content/plugins/instant_messenger/download/' . Params::getParam('del-file-name') );
      ModelIM::newInstance()->deleteMessageAttachment( Params::getParam('del-att-message-id') );
      osc_add_flash_ok_message( __('Attachment removed', 'instant_messenger') );

      header('Location: ' . osc_route_url( 'im-messages', array('thread-id' => $del_message['fk_i_thread_id'], 'secret' => $secret)));
    } else {
      osc_add_flash_error_message( __('This is not your message, you cannot remove attachment on it!', 'instant_messenger') );
    }
  }


  $messages = ModelIM::newInstance()->getMessagesByThreadId( Params::getParam('thread-id') ); 
?>


<?php if( (($thread['i_from_user_id'] == osc_logged_user_id() || $thread['i_to_user_id'] == osc_logged_user_id()) && osc_is_web_user_logged_in()) || ($secret == $thread['s_from_secret'] || $secret == $thread['s_to_secret'])) { ?>

  <h2 class="im-head"><?php _e('Thread', 'instant_messenger'); ?>: <?php echo $thread['s_title']; ?></h2>

  <div class="im-row im-item-related im-body">
    <div class="im-col-3 im-item-resource"><img src="<?php echo $item_details['resource']; ?>" /></div>
    <div class="im-col-21">
      <div class="im-line im-item-title"><a target="_blank" href="<?php echo osc_item_url_ns( $item['pk_i_id'] ); ?>"><?php echo osc_highlight($item['s_title'], 50); ?></a></div>
      <div class="im-line im-item-price"><?php echo $item_details['price']; ?></div>
      <div class="im-line im-item-location"><?php echo $item_details['location']; ?></div>
    </div>
  </div>


  <ul id="im-error-list" class="error-list im-error-list im-body"></ul>

  <form id="im-message-form" class="im-row im-body im-form-validate" action="<?php echo osc_route_url( 'im-messages', array('thread-id' => $thread['i_thread_id'], 'secret' => $secret) ); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="im-action" id="im-action" value="send_message" />
   
    <textarea name="im-message" id="im-message" class="im-textarea" placeholder="<?php echo osc_esc_js(__('Write your message here...', 'instant_messenger')); ?>"></textarea>

    <button type="submit" class="im-button-green"><?php _e('Send message', 'instant_messenger'); ?></button>

    <?php if($att_enable == 1) { ?>
      <input type="file" name="im-file" id="im-file" class="im-file" />
    <?php } ?>

  </form>


  <?php if( count($messages) > 0 ) { ?>
    <div class="im-table im-messages im-body">

      <?php foreach( $messages as $m ) { ?>
        <?php 
          // CHECK IF LOGGED USER IS OWNER OF THIS MESSAGE
          if( (osc_is_web_user_logged_in() && (osc_logged_user_id() == $thread['i_from_user_id'] && $m['i_type'] == 0 || osc_logged_user_id() == $thread['i_to_user_id'] && $m['i_type'] == 1)) || ($secret == $thread['s_from_secret'] && $m['i_type'] == 0 || $secret == $thread['s_to_secret'] && $m['i_type'] == 1) ) {
            $logged_is_owner = true;
          } else {
            $logged_is_owner = false;
            
            if($m['i_type'] == 0) {
              $identify_name = __('(customer)', 'instant_messenger');
            } else {
              $identify_name = __('(seller)', 'instant_messenger');
            }
          } 
        ?>

        <div class="im-table-row <?php if( $logged_is_owner ) { ?>im-from<?php } ?>">
          <div class="im-line">
            <div class="im-col-12 im-name im-align-left">
              <strong><?php if( $m['i_type'] == 0 ) { echo $thread['s_from_user_name']; } else { echo $thread['s_to_user_name']; } ?></strong> 
              <span><?php if( $logged_is_owner ) { ?><?php _e('(you)', 'instant_messenger'); ?><?php } else { ?><?php echo $identify_name; ?><?php } ?></span>
            </div>
            <div class="im-col-12 im-date im-align-right im-i im-gray"><?php echo date('d/m/Y H:i:s', strtotime($m['d_datetime'])); ?> (<?php echo im_get_time_diff($m['d_datetime']); ?>)</div>
          </div>

          <div class="im-line im-message-content">
            <div class="im-col-24 im-align-left"><?php echo $m['s_message']; ?></div>
          </div>

          <div class="im-line im-message-extra <?php if($m['s_file'] <> '' && $att_enable == 1) { ?>im-box-gray<?php } ?>">
            <div class="im-col-12" class="im-align-left">
              <?php if($m['s_file'] <> '' && $att_enable == 1) { ?>
                <a class="im-download" href="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/download/<?php echo $m['s_file']; ?>" target="_blank"><?php echo im_get_extension_icon($m['s_file']); ?><?php echo $m['s_file']; ?></a>
              <?php } ?>
              &nbsp;
            </div>

            <?php if( $logged_is_owner ) {?>
              <div class="im-col-12 im-align-right">
                <?php if( $message_delete == 1 ) { ?>
                  <a class="im-hide" href="<?php echo osc_route_url( 'im-delete-message', array('thread-id' => $thread['i_thread_id'], 'del-message-id' => $m['pk_i_id'], 'secret' => $secret) ); ?>" onclick="return confirm('<?php echo osc_esc_js(__('Are you sure you want to delete this message', 'instant_messenger')); ?>?')"><?php _e('Remove message', 'instant_messenger'); ?></a>
                <?php } ?>

                <?php if($m['s_file'] <> '' && $att_enable == 1) { ?>
                  <a class="im-hide" href="<?php echo osc_route_url( 'im-delete-attachment', array('thread-id' => $thread['i_thread_id'], 'del-att-message-id' => $m['pk_i_id'], 'del-file-name' => $m['s_file'], 'secret' => $secret) ); ?>" onclick="return confirm('<?php echo osc_esc_js(__('Are you sure you want to delete attachment', 'instant_messenger')); ?>?')"><?php _e('Remove attachment', 'instant_messenger'); ?></a>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } else { ?>
    <div class="im-empty flashmessage flashmessage-warning"><?php _e('You do not have any messages', 'instant_messenger'); ?></div>
  <?php } ?>

<?php } else { ?>
  <div class="im-empty flashmessage flashmessage-warning"><?php _e('This is not your thread, you cannot read communication of other users!', 'instant_messenger'); ?></div>
<?php } ?>