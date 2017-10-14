<?php
/*
Plugin Name: Required Fields at Registration
Plugin URI: http://www.osclass.org/
Description: Require more fields at registration process
Version: 1.0.5
Author: OSClass
Author URI: http://www.osclass.org/
Short Name: requiredreg
Plugin update URI: required-fields
*/


    // NO NEED TO MODIFY ANYTHING ON THIS FILE
    function requiredreg_form() {
        include_once 'form.php';
    }

    function requiredreg_footer() {
        if(Params::getParam('page')=='register' && Params::getParam('action')=='register') {
            include_once 'footer.php';
        }
    }

    // NO NEED TO MODIFY ANYTHING ON THIS FILE
    function requiredreg_save($userId) {
        require_once LIB_PATH . 'osclass/UserActions.php';
        $userActions = new UserActions(false);
        $input = $userActions->prepareData(false) ;
        User::newInstance()->update($input, array('pk_i_id' => $userId)) ;
    }


    /**
     * ADD HOOKS
     */
    osc_register_plugin(osc_plugin_path(__FILE__), '');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", '');

    // run at registration form
    osc_add_hook('user_register_form', 'requiredreg_form');
    osc_add_hook('footer', 'requiredreg_footer');

    // run ONCE the user is registered
    osc_add_hook('user_register_completed', 'requiredreg_save');

?>
