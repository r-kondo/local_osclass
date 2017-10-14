<?php
EmailVariables::newInstance()->add('{TO_NAME}', __('Name of user that will receive email notification', 'instant_messenger'));
EmailVariables::newInstance()->add('{FROM_NAME}', __('Name of user that has send message', 'instant_messenger'));
EmailVariables::newInstance()->add('{ITEM_LINK}', __('Link to listing', 'instant_messenger'));
EmailVariables::newInstance()->add('{THREAD_TITLE}', __('Title of conversation', 'instant_messenger'));
EmailVariables::newInstance()->add('{THREAD_URL}', __('Link to conversation', 'instant_messenger'));
EmailVariables::newInstance()->add('{MESSAGE}', __('Message in conversation', 'instant_messenger'));



// Create email when message is sent (notify user)
function im_email_message_notify( $send_to_user_name, $send_to_user_email, $send_from_user_name, $item_id, $item_title, $thread_id, $thread_title, $message, $file, $secret ) {
  $page = new Page() ;
  $page = $page->findByInternalName('im_email_message_notify');
  if(empty($page)) { exit(); }

  $locale = osc_current_user_locale() ;
  $content = array();
  if(isset($page['locale'][$locale]['s_title'])) {
    $content = $page['locale'][$locale];
  } else {
    $content = current($page['locale']);
  }

  $attachment_path = '';
  if( $file <> '') {
    $attachment_path = osc_base_path() . 'oc-content/plugins/instant_messenger/download/' . $file;
  }

  $item_title = stripslashes(strip_tags(osc_highlight($item_title, 35)));
  $item_url  = '<a href="' . osc_item_url_ns($item_id) . '" >' . $item_title . '</a>';
  $thread_url  = osc_route_url( 'im-messages', array('thread-id' => $thread_id, 'secret' => $secret) );


  $words   = array();
  $words[] = array( '{TO_NAME}', '{FROM_NAME}', '{ITEM_TITLE}', '{ITEM_LINK}', '{THREAD_TITLE}', '{THREAD_LINK}', '{MESSAGE}', '{WEB_TITLE}' );
  $words[] = array( $send_to_user_name, $send_from_user_name, $item_title, $item_url, stripslashes(strip_tags($thread_title)), $thread_url, $message, stripslashes(strip_tags(osc_page_title())) ) ;

  $title = osc_mailBeauty($content['s_title'], $words) ;
  $body  = osc_mailBeauty($content['s_text'], $words) ;

  $email_build = array(
    'subject'  => $title, 
    'to' => $send_to_user_email, 
    'to_name'  => $send_to_user_name,
    'body' => $body,
    'alt_body' => $body
  );

  if( $attachment_path <> '' ) {
    $email_build = array(
      'subject'  => $title, 
      'to' => $send_to_user_email, 
      'to_name'  => $send_to_user_name,
      'body' => $body,
      'alt_body' => $body,
      'attachment' => $attachment_path
    );
  } else {
    $email_build = array(
      'subject'  => $title, 
      'to' => $send_to_user_email, 
      'to_name'  => $send_to_user_name,
      'body' => $body,
      'alt_body' => $body
    );
  }
  osc_sendMail($email_build);
}

?>