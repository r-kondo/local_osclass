<?php if(!defined('ABS_PATH')) exit();
/*
Plugin Name: Activate Deactivate Item
Plugin URI: http://www.osclass.org/
Description: Enables users to Deactivate & Activate items in User Dashboard
Version: 3.0.1
Author: dev101
Author URI:
Short Name: activate-deactivate-item
Plugin update URI: activate-deactivate-item
*/

## MODEL

// Model
require_once 'model/ModelUserItemControl.php';

## INSTALL / UNINSTALL

function activate_deactivate_item_install() {
	osc_set_preference('user_item_activate', 'item/activation', 'activate-deactivate-item', 'STRING');
	osc_set_preference('user_item_deactivate', 'item/deactivation', 'activate-deactivate-item', 'STRING');
}

function activate_deactivate_item_uninstall() {
	osc_delete_preference('user_item_activate', 'activate-deactivate-item');
	osc_delete_preference('user_item_deactivate', 'activate-deactivate-item');
}

osc_add_route('route-user-item-activate', osc_get_preference('user_item_activate', 'activate-deactivate-item').'/([0-9]+)', osc_get_preference('user_item_activate', 'activate-deactivate-item').'/{itemId}', osc_plugin_folder(__FILE__).'/user/user_item_actions.php', $usermenu = true);
osc_add_route('route-user-item-deactivate', osc_get_preference('user_item_deactivate', 'activate-deactivate-item').'/([0-9]+)', osc_get_preference('user_item_deactivate', 'activate-deactivate-item').'/{itemId}', osc_plugin_folder(__FILE__).'/user/user_item_actions.php', $usermenu = true);

## ADMIN MENU

// Admin
function activate_deactivate_item_admin_menu() {
	if(osc_version()<320) {
		echo '<h3><a href="#">Activate-Deactivate</a></h3>
		<ul>
			<li><a href="' . osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/admin/admin.php') . '">&raquo; ' . __('Settings', 'activate_deactivate_item') . '</a></li>
		</ul>';
	} else {
		osc_add_admin_submenu_divider('plugins', 'Activate-Deactivate', 'activate_deactivate_item_divider', 'administrator');
		osc_add_admin_submenu_page('plugins', '&raquo;' . ' ' . __('Settings', 'activate_deactivate_item'), osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin/admin.php'), 'activate_deactivate_item_settings', 'administrator');
	}
}

// Config
function activate_deactivate_item_config() {
	osc_admin_render_plugin(osc_plugin_path(dirname(__FILE__)) . '/admin/admin.php');
}

## HOOKS

// Activate Plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'activate_deactivate_item_install');

// Uninstall Plugin
osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', 'activate_deactivate_item_uninstall');

// Admin Menu
if(osc_version()<320) {
	osc_add_hook('admin_menu', 'activate_deactivate_item_admin_menu');
} else {
	osc_add_hook('admin_menu_init', 'activate_deactivate_item_admin_menu');
}

// Configure Link
osc_add_hook(__FILE__ . '_configure', 'activate_deactivate_item_config');

?>