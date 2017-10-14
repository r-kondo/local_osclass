<?php
  // Create menu
  $title = __('Configure', 'instant_messenger');
  im_menu($title);


  // GET & UPDATE PARAMETERS
  // $variable = mb_param_update( 'param_name', 'form_name', 'input_type', 'plugin_var_name' );
  // input_type: check or value

  $contact_seller = mb_param_update( 'contact_seller', 'plugin_action', 'check', 'plugin-instant_messenger' );
  $notify_once = mb_param_update( 'notify_once', 'plugin_action', 'check', 'plugin-instant_messenger' );
  $item_hook = mb_param_update( 'item_hook', 'plugin_action', 'check', 'plugin-instant_messenger' );
  $att_enable = mb_param_update( 'att_enable', 'plugin_action', 'check', 'plugin-instant_messenger' );
  $att_max_size = mb_param_update( 'att_max_size', 'plugin_action', 'value', 'plugin-instant_messenger' );
  $att_extension = mb_param_update( 'att_extension', 'plugin_action', 'value', 'plugin-instant_messenger' );
  $message_delete = mb_param_update( 'message_delete', 'plugin_action', 'check', 'plugin-instant_messenger' );
  $threads_per_page = mb_param_update( 'threads_per_page', 'plugin_action', 'value', 'plugin-instant_messenger' );
  $link_reg_only = mb_param_update( 'link_reg_only', 'plugin_action', 'check', 'plugin-instant_messenger' );


  if(Params::getParam('plugin_action') == 'done') {
    message_ok( __('Settings were successfully saved', 'instant_messenger') );
  }
?>



<div class="mb-body">
  <!-- CONFIGURE SECTION -->
  <div class="mb-box">
    <div class="mb-head"><i class="fa fa-cog"></i> <?php _e('Configure', 'instant_messenger'); ?></div>

    <div class="mb-inside">
      <form name="promo_form" id="promo_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="page" value="plugins" />
        <input type="hidden" name="action" value="renderplugin" />
        <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>configure.php" />
        <input type="hidden" name="plugin_action" value="done" />

        
        <div class="mb-row">
          <label for="contact_seller" class="h1"><span><?php _e('Replace Contact Seller Functionality', 'instant_messenger'); ?></span></label> 
          <input name="contact_seller" id="contact_seller" class="element-slide" type="checkbox" <?php echo ($contact_seller == 1 ? 'checked' : ''); ?> />
          
          <div class="mb-explain"><?php _e('Contact seller functionality will be replaced with instant messages.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="link_reg_only"><span><?php _e('Show Header Link to Registered Only', 'instant_messenger'); ?></span></label> 
          <input name="link_reg_only" id="link_reg_only" class="element-slide" type="checkbox" <?php echo ($link_reg_only == 1 ? 'checked' : ''); ?> />
          
          <div class="mb-explain"><?php _e('When enabled, link in header to show messages will be shown to logged in users only. <br/>Link is shown via code', 'instant_messenger'); ?> &lt;?php if(function_exists('im_messages')) { echo im_messages(); } ?&gt;</div>
        </div>

        <div class="mb-row">
          <label for="notify_once" class="h2"><span><?php _e('Notify User only Once', 'instant_messenger'); ?></span></label> 
          <input name="notify_once" id="notify_once" class="element-slide" type="checkbox" <?php echo ($notify_once == 1 ? 'checked' : ''); ?> />
          
          <div class="mb-explain"><?php _e('User will not be notified about new messages only if previous messages in same conversation has been read.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="item_hook" class="h3"><span><?php _e('Hook Button to Item Page', 'instant_messenger'); ?></span></label> 
          <input name="item_hook" id="item_hook" class="element-slide" type="checkbox" <?php echo ($item_hook == 1 ? 'checked' : ''); ?> />
          
          <div class="mb-explain"><?php _e('"Send Message" button will be shown on listing page without need of theme modifications.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="att_enable" class="h4"><span><?php _e('Enable Attachments in Messages', 'instant_messenger'); ?></span></label> 
          <input name="att_enable" id="att_enable" class="element-slide" type="checkbox" <?php echo ($att_enable == 1 ? 'checked' : ''); ?> />
          
          <div class="mb-explain"><?php _e('Users will be able to upload attachment when sending message.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="att_max_size" class="h5"><span><?php _e('Attachment Maximum Size', 'instant_messenger'); ?></span></label> 
          <input size="6" name="att_max_size" id="att_max_size" class="mb-short" type="text" value="<?php echo $att_max_size; ?>" />
          <div class="mb-input-desc"><?php _e('kb', 'instant_messenger'); ?></div>

          <div class="mb-explain"><?php _e('When attachment is larger, it will not be sent.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="att_extension" class="h6"><span><?php _e('Allowed File Extensions in Attachment', 'instant_messenger'); ?></span></label> 
          <input size="100" name="att_extension" id="att_extension" type="text" value="<?php echo $att_extension; ?>" />

          <div class="mb-explain"><?php _e('Delimit extensions with comma. Example: png, jpg, gif', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="message_delete" class="h7"><span><?php _e('Allow Users to Remove Messages', 'instant_messenger'); ?></span></label> 
          <input name="message_delete" id="message_delete" class="element-slide" type="checkbox" <?php echo ($message_delete == 1 ? 'checked' : ''); ?> />
          
          <div class="mb-explain"><?php _e('Users will be able to remove their own messages from conversation, but still will not be able to remove whole conversation.', 'instant_messenger'); ?></div>
        </div>

        <div class="mb-row">
          <label for="threads_per_page" class="h8"><span><?php _e('Threads per Page', 'instant_messenger'); ?></span></label> 
          <input size="6" name="threads_per_page" id="att_max_size" class="mb-short" type="text" value="<?php echo $threads_per_page; ?>" />
          <div class="mb-input-desc"><?php _e('threads', 'instant_messenger'); ?></div>

          <div class="mb-explain"><?php _e('Set how many threads are shown on 1 page in user profile (pagination).', 'instant_messenger'); ?></div>
        </div>

      </div>

      <div class="mb-foot">
        <button type="submit" class="mb-button"><?php _e('Save', 'instant_messenger');?></button>
      </div>
    </form>
  </div>



  <!-- PLUGIN INTEGRATION -->
  <div class="mb-box">
    <div class="mb-head"><i class="fa fa-wrench"></i> <?php _e('Plugin Setup', 'instant_messenger'); ?></div>

    <div class="mb-inside">

      <div class="mb-row">
        <div class="mb-line"><?php _e('To show link to message center and count of unread messages of user, place following link to your theme files', 'instant_messenger'); ?>:</div>
        <span class="mb-code">&lt;?php if(function_exists('im_messages')) { echo im_messages(); } ?&gt;</span>
      </div>

      <div class="mb-row">&nbsp;</div>

      <div class="mb-row">
        <div class="mb-line"><?php _e('To show "Send message" button, place following link to your theme files (item.php, search-list.php, ...)', 'instant_messenger'); ?>:</div>
        <span class="mb-code">&lt;?php if(function_exists('im_contact_button')) { im_contact_button(); } ?&gt;</span>
      </div>
    </div>
  </div>



  <!-- HELP TOPICS -->
  <div class="mb-box" id="mb-help">
    <div class="mb-head"><i class="fa fa-question-circle"></i> <?php _e('Help', 'instant_messenger'); ?></div>

    <div class="mb-inside">
      <div class="mb-row mb-help"><div><?php _e('Each user can access messages in user account clicking on "Message center".', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><div><?php _e('Each thread can be flagged by user (for personal preference - as important or not solved yet). Flag is shared between both users in conversation.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><div><?php _e('On each conversation can be set if user want to be notified by email or not.', 'instant_messenger'); ?></div></div>

      <div class="mb-row">&nbsp;</div>

      <div class="mb-row mb-help"><span class="sup">(1)</span> <div class="h1"><?php _e('Original "Contact Seller" functionality will be replaced with Instant Messenger plugin. This means that instead of sending mail to seller, message will be sent and seller can see this message in it\'s profile.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(2)</span> <div class="h2"><?php _e('It is highly recommended to enable this. When disabled, each time there is new message, user will receive email notification, no matter if previous message was read or not. When enabled, user will receive email notification only in case when previous message was read. This avoid sending multiple emails when sending more messages at once. This also avoid spamming your users.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(3)</span> <div class="h3"><?php _e('Enable to add "Send message" button to listing page via hook. This means you do not need to modify theme files. Button will be added to item_detail hook.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(4)</span> <div class="h4"><?php _e('Allow or deny sending attachments in messages. When enabled, user can upload files and send it with message. Note that files are stored on your server in folder oc-content/plugins/instant_messenger/download.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(5)</span> <div class="h5"><?php _e('Set what is maximum allowed file size of attachment send in message. Note that attachments are stored on your server so it is recommended to set this to acceptable value, i.e. 1024kb.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(6)</span> <div class="h6"><?php _e('Choose which kind of files can be sent in attachments. It is recommended not to allow sending PHP file as this might be security risk for your site (script could be executed).', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(7)</span> <div class="h7"><?php _e('Enable if you want to allow users to remove their messages in threads. Note that users will not be able to remove threads. In case you want to use this plugin as way of support delivery, this option should be disabled.', 'instant_messenger'); ?></div></div>
      <div class="mb-row mb-help"><span class="sup">(8)</span> <div class="h8"><?php _e('Set how many threads should be shown on 1 page. It is recommended to set not more than 50 threads to avoid server performance issues.', 'instant_messenger'); ?></div></div>
    </div>
  </div>
</div>

<?php echo im_footer(); ?>
	