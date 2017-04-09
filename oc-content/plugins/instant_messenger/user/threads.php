<link href="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/css/tipped.css" rel="stylesheet" type="text/css" />
<script src="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/js/tipped.js"></script>
<script src="<?php echo osc_base_url(); ?>oc-content/plugins/instant_messenger/js/user.js"></script>


<?php 

  // CHANGE FLAG ON THREAD
  if( Params::getParam('thread-flag-id') <> '' && Params::getParam('thread-flag-id') > 0 ){
    ModelIM::newInstance()->updateThreadFlag( Params::getParam('thread-flag-id') );
    osc_add_flash_ok_message( __('Thread flag has been updated', 'instant_messenger') );
    header('Location: ' . osc_route_url( 'im-threads'));
  }


  // CHANGE NOTIFICATION OF CURRENT USER FOR SELECTED THREAD
  if( Params::getParam('thread-notify-id') <> '' && Params::getParam('thread-notify-id') > 0 ){
    ModelIM::newInstance()->updateThreadNotify( Params::getParam('thread-notify-id'), osc_logged_user_id() );
    osc_add_flash_ok_message( __('Thread notification has been updated', 'instant_messenger') );
    header('Location: ' . osc_route_url( 'im-threads'));
  }

  $threads_count = ModelIM::newInstance()->countThreadsByUserId(osc_logged_user_id());
  $threads_count = $threads_count['i_count'];

  $per_page = ( osc_get_preference('threads_per_page','plugin-instant_messenger') <> '' ? osc_get_preference('threads_per_page','plugin-instant_messenger') : 20 );
  $page = ( Params::getParam('page-id') <> '' ? Params::getParam('page-id') : 1 );
  $page_count = ceil($threads_count/$per_page);
  $start = ($page - 1) * $per_page;


  $threads = ModelIM::newInstance()->getThreadsByUserId( osc_logged_user_id(), $per_page, $start ); 
?>

<h2 class="im-head" style="margin-bottom:5px;"><?php _e('Message Center', 'instant_messenger'); ?></h2>

<?php if( count($threads) > 0 && osc_is_web_user_logged_in()) { ?>
  <div class="im-table im-threads im-body">
    <div class="im-table-head">
      <div class="im-col-12">&nbsp;</div>
      <div class="im-col-6">&nbsp;</div>
      <div class="im-col-2"><?php _e('Messages', 'instant_messenger'); ?></div>
      <div class="im-col-2"><?php _e('Flag', 'instant_messenger'); ?></div>
      <div class="im-col-2"><?php _e('Notify', 'instant_messenger'); ?></div>
    </div>

    <?php foreach( $threads as $t ) { ?>
      <?php 
        $item = Item::newInstance()->findByPrimaryKey( $t['fk_i_item_id'] ); 
        $time_diff = im_get_time_diff( $t['d_datetime'] );

        // check if last message was read
        // checking last message received by this user
        $is_read = ModelIM::newInstance()->getThreadIsRead( $t['i_thread_id'], osc_logged_user_id() );
        $is_read = $is_read['i_read'];

        // check notifications for thread
        if($t['i_from_user_id'] == osc_logged_user_id()) {
          $notify = $t['i_from_user_notify'];
        } else {
          $notify = $t['i_to_user_notify'];
        }
      ?>

      <div class="im-table-row im-has-tooltip <?php if($is_read == 0) { ?>im-unread<?php } ?>" <?php if($is_read == 0) { ?>title="<?php _e('There are unread messages in this thread!', 'instant_messenger'); ?>"<?php } ?>>
        <div class="im-col-12">
          <div class="im-line im-align-left im-title"><a href="<?php echo osc_route_url( 'im-messages', array('thread-id' => $t['i_thread_id']) ); ?>"><?php echo ( $t['s_title'] <> '' ? osc_highlight($t['s_title'], 60) : __('No subject', 'instant_messenger') ); ?></a></div>
          <div class="im-line im-align-left im-item"><a target="_blank" href="<?php echo osc_item_url_from_item( $item ); ?>"><?php echo osc_highlight($item['s_title'], 50); ?></a></div>
        </div>
 
        <div class="im-col-6 im-from-to im-align-right">
          <div class="im-line im-align-left im-title"><?php echo ($t['i_from_user_id'] == osc_logged_user_id() ? __('to', 'instant_messenger') . ' <strong>' . $t['s_to_user_name'] . '</strong>' : __('from', 'instant_messenger') . ' <strong>' . $t['s_from_user_name'] . '</strong>'); ?></div>
          <div class="im-line im-align-left im-time"><?php echo $time_diff; ?></div>
        </div>

        <div class="im-col-2 im-special">
          <?php echo $t['i_count']; ?> <?php echo __('pm', 'instant_messenger') . '<span class="im-small">' . ($t['i_count'] == 1 ? '' : __('s', 'instant_messenger')) . '</span>'; ?>
        </div>

        <div class="im-col-2 im-special im-has-tooltip <?php echo ( $t['i_flag'] == 1 ? 'im-flag-yes' : 'im-flag-no' ); ?>" title="<?php echo ( $t['i_flag'] == 1 ? __('You have marked this message as important. Click to unmark.', 'instant_messenger') : __('Click to mark.', 'instant_messenger') ); ?>">
          <a href="<?php echo osc_route_url( 'im-thread-flag', array('thread-flag-id' => $t['i_thread_id']) ); ?>"><i class="fa <?php echo ( $t['i_flag'] == 1 ? 'fa-flag' : 'fa-flag-o' ); ?>"></i></a>
        </div>

        <div class="im-col-2 im-special im-has-tooltip <?php echo ( $notify == 1 ? 'im-notify-yes' : 'im-notify-no' ); ?>" title="<?php echo ( $notify == 1 ? __('You will receive email when there is new message in this thread. Click to cancel notifications.', 'instant_messenger') : __('Click to enable notifications.', 'instant_messenger') ); ?>">
          <a href="<?php echo osc_route_url( 'im-thread-notify', array('thread-notify-id' => $t['i_thread_id']) ); ?>"><i class="fa <?php echo ( $notify == 1 ? 'fa-envelope' : 'fa-envelope-o' ); ?>"></i></a>
        </div>
      </div>
    <?php } ?>


    <!-- Pagination -->
    <?php if($page_count > 1) { ?>
      <div id="im-pagination">
        <div class="im-pagination-inside">
          <span><?php _e('Page', 'instant_messenger'); ?></span>
          <?php for($i = 1; $i <= $page_count; $i++) { ?>
            <a <?php if($i == $page) { ?>class="im-page-active"<?php } ?> href="<?php echo osc_route_url( 'im-thread-page', array('page-id' => $i) ); ?>"><?php echo $i; ?></a>
          <?php } ?>
        </div>
      </div>
    <?php } ?>

  </div>
<?php } else { ?>
  <?php if(!osc_is_web_user_logged_in()) { ?>
    <div class="im-empty flashmessage flashmessage-warning"><?php _e('Please log in to see your conversations.', 'instant_messenger'); ?></div>
  <?php } else { ?>
    <div class="im-empty flashmessage flashmessage-warning"><?php _e('You do not have any conversations', 'instant_messenger'); ?></div>
  <?php } ?>
<?php } ?>