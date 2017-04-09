<?php
/*
Plugin Name: noCaptcha reCaptcha
Plugin URI: http://shamimsplugins.com/
Description: Show noCaptcha reCaptcha in Admin login, Login, Register, Item post, Comment, Contact, Contact listing, Send to a friend. Also can implement any other form easily.
Version: 1.2.1
Author: Shamim
Author URI: http://shamimsplugins.com/
Short Name: nocaptcha-recaptcha
Plugin update URI: nocaptcha-recaptcha
*/

require_once 'anr-captcha-class.php';

if ( !function_exists('anr_get_option') ) :
	
function anr_get_option( $option, $default = '', $section = 'plugin-anr_nocaptcha' ) {
	
    $options = osc_get_preference( $option, $section);
	

    if ( isset( $options ) ) {
        return trim($options);
    }

    return $default;
}
	
endif;

osc_add_hook('footer', 'anr_footer_script');

function anr_footer_script()
{
	anr_captcha_class::init()->footer_script();
}

osc_add_hook('anr_captcha_form_field', 'anr_captcha_form_field');

function anr_captcha_form_field( $echo = true )
	{
		$loggedin_hide 	= anr_get_option('loggedin_hide');
		
			if ( (osc_is_web_user_logged_in() || osc_is_admin_user_logged_in()) && $loggedin_hide )
				return;
				
		if ( $echo ) {
			echo anr_captcha_class::init()->captcha_form_field();
		} else {
			return anr_captcha_class::init()->captcha_form_field();
		}
		
	}

function anr_verify_captcha()
	{
		$secre_key 	= anr_get_option('secret_key'); 
		$response = Params::getParam('g-recaptcha-response');
		$remoteip = $_SERVER["REMOTE_ADDR"];
		$loggedin_hide 	= anr_get_option('loggedin_hide');
		
		if ( (osc_is_web_user_logged_in() || osc_is_admin_user_logged_in()) && $loggedin_hide )
				return true;
		
		if ( !$secre_key ) //if $secre_key is not set
			return true;
		
		if ( !$response || !$remoteip )
			return false;
			
		$request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secre_key."&response=".$response."&remoteip=".$remoteip);
			$result = json_decode( $request, true );
        if ( true == $result['success'] )
			return true;
		
        return false; 
	}

osc_register_plugin(osc_plugin_path(__FILE__), 'anr_call_after_install');

function anr_call_after_install() {
	
	osc_set_preference('theme', 'light', 'plugin-anr_nocaptcha');
	osc_set_preference('size', 'normal', 'plugin-anr_nocaptcha');
	osc_set_preference('error_message', 'ERROR: Please solve Captcha correctly.', 'plugin-anr_nocaptcha');
 

}

osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'anr_call_after_uninstall');

function anr_call_after_uninstall() {
	
	osc_delete_preference('site_key', 'plugin-anr_nocaptcha');
	osc_delete_preference('secret_key', 'plugin-anr_nocaptcha');
	osc_delete_preference('language', 'plugin-anr_nocaptcha');
	osc_delete_preference('theme', 'plugin-anr_nocaptcha');
	osc_delete_preference('size', 'plugin-anr_nocaptcha');
	osc_delete_preference('error_message', 'plugin-anr_nocaptcha');
	osc_delete_preference('no_js', 'plugin-anr_nocaptcha');

}

osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'anr_render_admin');

function anr_render_admin() {
        osc_admin_render_plugin(osc_plugin_folder(__FILE__) . 'admin/admin.php');
    }
	

function anr_admin_menu_new() {
	osc_add_admin_submenu_divider('plugins', 'noCaptcha reCaptcha', 'anr_divider', 'administrator');
    osc_add_admin_submenu_page('plugins', __('Settings', 'nocaptcha_recaptcha'), osc_route_admin_url('anr-admin-settings'), 'anr_settings', 'administrator');
}

osc_add_route('anr-admin-settings', 'anr/settings', 'anr/settings', osc_plugin_folder(__FILE__).'admin/admin.php');
osc_add_hook('admin_menu_init', 'anr_admin_menu_new');


osc_add_hook('login_admin_form', 'anr_admin_login_form', 10);

function anr_admin_login_form()
{
	if ( '1' != anr_get_option('admin_login'))
	return;
	
	anr_captcha_form_field();
	anr_captcha_class::init()->footer_script();
}

osc_add_hook('before_login_admin', 'anr_before_login_admin', 10);

function anr_before_login_admin()
{
	if ( '1' != anr_get_option('admin_login'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha'));
		osc_add_flash_error_message( $error_message, 'admin');
        osc_redirect_to( osc_admin_base_url(true)."?page=login" );
	}
}

function anr_user_login_check()
{
	if ( '1' != anr_get_option('login'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message ) ;
		osc_redirect_to( osc_user_login_url() );
		}
}
osc_add_hook('before_login', 'anr_user_login_check');

function anr_user_register_check()
{
	if ( '1' != anr_get_option('registration'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message ) ;
		osc_redirect_to( osc_register_account_url() );
		}
}
osc_add_hook('before_user_register', 'anr_user_register_check');


function anr_item_add_check()
{
	if ( '1' != anr_get_option('new'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message ) ;
		osc_redirect_to( osc_item_post_url() );
		}
}
osc_add_hook('pre_item_add',  'anr_item_add_check');


function anr_contact_check()
{
    if(Params::getParam('page')=='contact' && Params::getParam('action')=='contact_post'){
		if ( '1' != anr_get_option('contact'))
		return;
	
		if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message ) ;
		osc_redirect_to( osc_contact_url() );
		}
    }
}
osc_add_hook('init', 'anr_contact_check');


function anr_item_contact_check($item)
{
	if ( '1' != anr_get_option('contact_listing'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message ) ;
		View::newInstance()->_exportVariableToView('item', $item);
		osc_redirect_to( osc_item_url() );
		}
}
osc_add_hook('pre_item_contact_post', 'anr_item_contact_check');


function anr_item_send_friend_check($item)
{
	if ( '1' != anr_get_option('send_friend'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message ) ;
		View::newInstance()->_exportVariableToView('item', $item);
		osc_redirect_to( osc_item_send_friend_url() );
		}
}
osc_add_hook('pre_item_send_friend_post', 'anr_item_send_friend_check');

function anr_before_add_comment( $aComment )
{
	if ( '1' != anr_get_option('comment'))
	return;
	
	if ( !anr_verify_captcha() ) {
		$error_message 	= trim(osc_get_preference( 'error_message', 'plugin-anr_nocaptcha')); 
		osc_add_flash_error_message( $error_message );
		
		Session::newInstance()->_setForm('commentAuthorName', $aComment['s_author_name'] );
        Session::newInstance()->_setForm('commentAuthorEmail', $aComment['s_author_email'] );
        Session::newInstance()->_setForm('commentTitle', $aComment['s_title'] );
		Session::newInstance()->_setForm('commentBody', $aComment['s_body'] );
				
		osc_redirect_to( osc_item_url() );
		}
}
osc_add_hook('before_add_comment',  'anr_before_add_comment');

