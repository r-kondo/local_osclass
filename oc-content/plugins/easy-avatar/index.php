<?php
/*
Plugin Name: Easy Avatar
Plugin URI: http://www.pixadrop.com/
Description: This plugin adds very nice Avatar with social media profiles/pages link for every registered user.
Version: 2.0.4
Author: Pixadrop
Author URI: http://www.pixadrop.com/
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:       easy-avatar
Domain Path:       /languages
Plugin update URI: easy-avatar
*/
require_once(osc_plugins_path() . 'easy-avatar/easy-avatar.php');
// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'activate_easy_avatar');
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'deactivate_easy_avatar');
// This is a hack to show a Configure link at plugins table (you can also use some other hook to show a custom option panel);
osc_add_hook(osc_plugin_path(__FILE__) . "_configure", 'configure_easy_avatar');

?>