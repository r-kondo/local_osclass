<?php
/*
Plugin Name: Select Region
Plugin URI: http://www.osclass.org/
Description: Set each region enable or disable.
Version: 1.0.0
Author: tos
Short Name: select_region
*/

require_once osc_plugin_path(__DIR__) . '/SelectRegionStats.php';
require_once osc_plugin_path(__DIR__) . '/SelectRegion.php';


function select_region_call_after_install() {
    // Insert here the code you want to execute after the plugin's install
    // for example you might want to create a table or modify some values

}

function select_region_call_after_uninstall() {
    // Insert here the code you want to execute after the plugin's uninstall
    // for example you might want to drop/remove a table or modify some values
    
}

function select_region_admin_configuration() {
    // Standard configuration page for plugin which extend item's attributes
    osc_admin_render_plugin('select_region/admin.php');
}

function change_region_list() {
    View::newInstance()->_exportVariableToView('list_regions', SelectRegionStats::newInstance()->listRegions() );
    return true;
}

function select_region_actions() {
    $option = Params::getParam('option');

    if( Params::getParam('file') != 'select_region/admin.php' ) {
        return '';
    }

    if( $option == 'stepone' ) {
        $regions = Params::getParam('region');
        $aRegions = SelectRegion::newInstance()->listAll();
        foreach ($aRegions as $item) {
            if (in_array($item['pk_i_id'], $regions)) {
                SelectRegion::newInstance()->setStatus($item['pk_i_id'], 1);
            }
            else {
                SelectRegion::newInstance()->setStatus($item['pk_i_id'], 0);
            }
        }
        osc_add_flash_ok_message('地域選択を更新しました', 'admin');
        
        osc_redirect_to(osc_admin_render_plugin_url('select_region/admin.php'));
    }
}
osc_add_hook('init_admin', 'select_region_actions');

function select_region_admin_menu() {
    osc_admin_menu_settings('地域選択', osc_admin_render_plugin_url('select_region/admin.php'), 'select_region_submenu');
}

// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'select_region_call_after_install');
// This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'select_region_admin_configuration');
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'select_region_call_after_uninstall');

//osc_add_hook('before_html', 'change_region_list') ;
osc_add_hook('admin_menu_init', 'select_region_admin_menu');
?>
