<?php
/*
Plugin Name: Takw.to
Plugin URI: http://www.osclass.org/
Description: Takw.to, No account ? <a href="https://tawk.to/?utm_source=osclass_org&utm_medium=link_plugin&utm_campaign=signup" target="_blank">Get one for free here</a>
Version: 1.0.0
Author: OSClass
Author URI: http://www.osclass.org/
Short Name: takwto
Plugin update URI: tawkto
*/


if (!class_exists('TawkTo_Settings')) {

    class TawkTo_Settings {

        const TAWK_WIDGET_ID_VARIABLE = 'tawkto-embed-widget-widget-id';
        const TAWK_PAGE_ID_VARIABLE = 'tawkto-embed-widget-page-id';

        public function __construct() {
            osc_add_hook('init_admin', array(&$this, 'admin_init'));
            osc_add_hook('ajax_tawkto_action_setwidget',     array(&$this,'action_setwidget'));
            osc_add_hook('ajax_tawkto_removewidget', array(&$this, 'action_removewidget'));
            osc_add_route('tawkto-settings', 'tawkto-settings', 'tawkto-settings', 'tawkto/settings.php');
        }

        public function admin_init() {
            osc_add_admin_submenu_divider('plugins', __('Tawkto', 'tawkto'), 'tawkto_plugin_div');
            osc_admin_menu_plugins(__('Tawkto Embed Code', 'tawkto'), osc_route_admin_url('tawkto-settings'), 'tawkto_plugin');
        }

        public function action_setwidget() {
            header('Content-Type: application/json');
                $pageId = Params::getParam('pageId');
                $widgetId = Params::getParam('widgetId');
            if (!isset($pageId) || !isset($widgetId)) {
                echo json_encode(array('success' => FALSE));
                die();
            }

            if (!self::ids_are_correct($pageId, $widgetId)) {
                echo json_encode(array('success' => FALSE));
                die();
            }

            osc_set_preference(TawkTo_Settings::TAWK_PAGE_ID_VARIABLE, $pageId,  'tawkto');
            osc_set_preference(TawkTo_Settings::TAWK_WIDGET_ID_VARIABLE, $widgetId,   'tawkto');

            echo json_encode(array('success' => TRUE));
            die();
        }

        public function action_removewidget() {
            header('Content-Type: application/json');

            osc_set_preference(TawkTo_Settings::TAWK_PAGE_ID_VARIABLE, '',  'tawkto');
            osc_set_preference(TawkTo_Settings::TAWK_WIDGET_ID_VARIABLE, '',   'tawkto');

            echo json_encode(array('success' => TRUE));
            die();
        }

        public static function ids_are_correct($page_id, $widget_id) {
            return preg_match('/^[0-9A-Fa-f]{24}$/', $page_id) === 1 && preg_match('/^[a-z0-9]{1,50}$/i', $widget_id) === 1;
        }

    }

}

if (!class_exists('TawkTo')) {

    class TawkTo {

        public function __construct() {
            $tawkto_settings = new TawkTo_Settings();
        }

        public static function activate() {
            osc_set_preference(TawkTo_Settings::TAWK_PAGE_ID_VARIABLE, '',  'tawkto');
            osc_set_preference(TawkTo_Settings::TAWK_WIDGET_ID_VARIABLE, '',   'tawkto');
        }

        public static function deactivate() {
            Preference::newInstance()->delete(array('s_section' => 'tawkto'));
        }

        public function print_embed_code() {
            $page_id = osc_get_preference(TawkTo_Settings::TAWK_PAGE_ID_VARIABLE, 'tawkto');
            $widget_id = osc_get_preference(TawkTo_Settings::TAWK_WIDGET_ID_VARIABLE, 'tawkto');

            if (!empty($page_id) && !empty($widget_id)) {
                include osc_plugins_path()."/tawkto/widget.php";
            }
        }
    }
}

if (class_exists('TawkTo')) {
    osc_register_plugin( osc_plugin_path( __FILE__ ), array('TawkTo', 'activate') );
    osc_add_hook( osc_plugin_path( __FILE__ ) . '_uninstall', array('TawkTo', 'deactivate') );

    $tawkto = new TawkTo();

    osc_add_hook('footer', array($tawkto, 'print_embed_code'));
}