<?php
/*
Plugin Name: HybridAuth
Plugin URI: http://rajasekar.co.in/
Description: HybridAuth A PHP Library for authentication through Facebook, Twitter, Google
Version: 1.1.2
Author: RajaSekar
Author URI: http://rajasekar.co.in/
Plugin update URI: hybridauth
*/

require_once(osc_plugins_path() . 'HybridAuth/HybridAuthClass.php');

/* HybridAuth Install */
function HybridAuth_install() {
	osc_set_preference('GoogleEnabled',0,'HybridAuth','BOOLEAN');
	osc_set_preference('GoogleId','','HybridAuth');
	osc_set_preference('GoogleSecrect','','HybridAuth');
	
	osc_set_preference('FacebookEnabled',0,'HybridAuth','BOOLEAN');
	osc_set_preference('FacebookId','','HybridAuth');
	osc_set_preference('FacebookSecrect','','HybridAuth');
	
	osc_set_preference('TwitterEnabled',0,'HybridAuth','BOOLEAN');
	osc_set_preference('TwitterId','','HybridAuth');
	osc_set_preference('TwitterSecrect','','HybridAuth');
	
	osc_set_preference('HybridAuthDebug','1','HybridAuth','BOOLEAN');
}
osc_register_plugin(osc_plugin_path(__FILE__), 'HybridAuth_install') ;

/* HybridAuth Uninstall */
function HybridAuth_uninstall() {
	Preference::newInstance()->delete(array('s_section' => 'HybridAuth'));
}
osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', 'HybridAuth_uninstall') ;

function HybridAuth_settings(){
	if(Params::getParam('action_specific') =='HybridAuth' ){
		$GoogleId = Params::getParam('GoogleId');
		Preference::newInstance()->update(array("s_value" => $GoogleId),array("s_section" => "HybridAuth", "s_name" => "GoogleId"));
		$GoogleSecrect = Params::getParam('GoogleSecrect');
		Preference::newInstance()->update(array("s_value" => $GoogleSecrect),array("s_section" => "HybridAuth", "s_name" => "GoogleSecrect"));
		$GoogleEnabled = Params::getParam('GoogleEnabled');
		Preference::newInstance()->update(array("s_value" => $GoogleEnabled),array("s_section" => "HybridAuth", "s_name" => "GoogleEnabled"));
		
		$FacebookId = Params::getParam('FacebookId');
		Preference::newInstance()->update(array("s_value" => $FacebookId),array("s_section" => "HybridAuth", "s_name" => "FacebookId"));
		$FacebookSecrect = Params::getParam('FacebookSecrect');
		Preference::newInstance()->update(array("s_value" => $FacebookSecrect),array("s_section" => "HybridAuth", "s_name" => "FacebookSecrect"));
		$FacebookEnabled = Params::getParam('FacebookEnabled');
		Preference::newInstance()->update(array("s_value" => $FacebookEnabled),array("s_section" => "HybridAuth", "s_name" => "FacebookEnabled"));
		
		$TwitterId = Params::getParam('TwitterId');
		Preference::newInstance()->update(array("s_value" => $TwitterId),array("s_section" => "HybridAuth", "s_name" => "TwitterId"));
		$TwitterSecrect = Params::getParam('TwitterSecrect');
		Preference::newInstance()->update(array("s_value" => $TwitterSecrect),array("s_section" => "HybridAuth", "s_name" => "TwitterSecrect"));
		$TwitterEnabled = Params::getParam('TwitterEnabled');
		Preference::newInstance()->update(array("s_value" => $TwitterEnabled),array("s_section" => "HybridAuth", "s_name" => "TwitterEnabled"));
		
		$HybridAuthDebug = Params::getParam('HybridAuthDebug');
		Preference::newInstance()->update(array("s_value" => $HybridAuthDebug),array("s_section" => "HybridAuth", "s_name" => "HybridAuthDebug"));
		
		osc_add_flash_ok_message(__('HybridAuth updated correctly', 'HybridAuth'), 'admin');
		osc_redirect_to(osc_admin_render_plugin_url('HybridAuth/HybridAuthSettings.php'));
	}
}
osc_add_hook('init_admin', 'HybridAuth_settings');

/* HybridAuth Init  */
function HybridAuth_init(){
	$providers = array('Google','Facebook','Twitter');
	$provider = Params::getParam('login');
	if (in_array($provider, $providers)) {
		HybridAuthClass::newInstance()->loginwith($provider);
	}
	if(Params::getParam('endpoint') == 'true'){
		HybridAuthClass::newInstance()->endpoint();
	}
}
osc_add_hook( 'before_html', 'HybridAuth_init' ) ;
 
/* HybridAuth Logout */
function HybridAuth_logout(){
	HybridAuthClass::newInstance()->logout();
}

/* HybridAuth Login url */
function HybridAuth_Login(){
	require_once(osc_plugins_path() . 'HybridAuth/login.php');
}

osc_add_hook('logout','HybridAuth_logout');

/* Add CSS */
function HybridAuth_CSS() {
	?>
	<link href="<?php echo osc_plugin_url('HybridAuth/css/style.css'). 'style.css'; ?>" rel="stylesheet" type="text/css" />
	<?php
}
osc_add_hook('header', 'HybridAuth_CSS', 10);

/* Admin Menu */
function HybridAuth_Admin() {
	echo '<h3><a href="#">HybridAuth</a></h3>
	<ul>
		<li><a href="'.osc_admin_render_plugin_url('HybridAuth/HybridAuthSettings.php').'">&raquo; ' . __('HybridAuth', 'HybridAuth') . '</a></li>
		<li><a href="'.osc_admin_render_plugin_url('HybridAuth/help.php').'">&raquo; ' . __('Help / FAQ', 'HybridAuth') . '</a></li>
	</ul>';
}
osc_add_hook('admin_menu', 'HybridAuth_Admin');

/* Configure */
function HybridAuth_Configure() {
	osc_admin_render_plugin('HybridAuth/HybridAuthSettings.php');
}
osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'HybridAuth_Configure');

?>