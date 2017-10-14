<?php
/*
Plugin Name: HybridAuth
Plugin URI: http://www.osclass.org/
Description: HybridAuth A PHP Library for authentication through Facebook, Twitter, Google
Version: 1.0.0
Author: RajaSekar
Author URI: http://rajasekar.co.in/
Plugin update URI: hybridauth
*/
class HybridAuthClass{
	
	public $hybridauth = null;
    public $adapter = null;
	public $provider = null;
    private static $instance ;
	
    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
        return self::$instance ;
    }
    private function init(){
	   require_once(osc_plugins_path() . 'HybridAuth/hybridauth-2.6.0/hybridauth/Hybrid/Auth.php');
       $config = array(
            "base_url" => osc_base_url(true).'?endpoint=true',
            "providers" => array(
				"Google" => array(
					"enabled" => osc_get_preference('GoogleEnabled', 'HybridAuth'),
					"keys" => array("id" => osc_get_preference('GoogleId', 'HybridAuth'),"secret" => osc_get_preference('GoogleSecrect', 'HybridAuth'))
				),
				'Facebook' => array(
					"enabled" => osc_get_preference('FacebookEnabled', 'HybridAuth'),
					"keys" => array("id" => osc_get_preference('FacebookId', 'HybridAuth'),"secret" => osc_get_preference('FacebookSecrect', 'HybridAuth'))
				),
				'Twitter' => array(
					"enabled" => osc_get_preference('TwitterEnabled', 'HybridAuth'),
					"keys" => array("key" => osc_get_preference('TwitterId', 'HybridAuth'),"secret" => osc_get_preference('TwitterSecrect', 'HybridAuth'))
				)
			),
            "debug_mode" => osc_get_preference('HybridAuthDebug', 'HybridAuth'),
			"debug_file" => '/tmp/hauth.log'
        );
        $this->hybridauth = new Hybrid_Auth( $config );
    }
	
	public function loginwith($provider){
		try{
			if( !$this->hybridauth ) $this->init();
			$this->provider = $provider;
			$this->adapter = $this->hybridauth->authenticate($this->provider);
			$user_profile = (array)$this->adapter->getUserProfile();
			$manager = User::newInstance();
			$oscUser = $manager->findByEmail($user_profile['email']);
			if( count($oscUser) > 0 ) {
				$manager->update( array('b_active' => '1'),array('pk_i_id' => $oscUser['pk_i_id']) ) ;
				osc_add_flash_ok_message( __( "You already have an user with this e-mail address. We've merged your accounts", 'HybridAuth' ) ) ;
				require_once osc_lib_path() . 'osclass/UserActions.php';
				$uActions = new UserActions( false );
				$logged = $uActions->bootstrap_login( $oscUser['pk_i_id'] );
			} else {
				$this->register_user($user_profile) ;
			}
		}
		catch( Exception $e ){
			switch( $e->getCode() ){
				case 0 : 
					osc_add_flash_error_message( __( "Unspecified error.", 'HybridAuth' ) ) ;
					break;
				case 1 :
					osc_add_flash_error_message( __( "Hybriauth configuration error.", 'HybridAuth' ) ) ;
					break;
				case 2 :
					osc_add_flash_error_message( __( "Provider not properly configured.", 'HybridAuth' ) ) ;
					break;
				case 3 :
					osc_add_flash_error_message( __( "Unknown or disabled provider.", 'HybridAuth' ) ) ;
					break;
				case 4 :
					osc_add_flash_error_message( __( "Missing provider application credentials.", 'HybridAuth' ) ) ;
					break;
				case 5 : 
					osc_add_flash_error_message( __( "Authentification failed. The user has canceled the authentication or the provider refused the connection.", 'HybridAuth' ) ) ;
					break;
				case 6 : 
					osc_add_flash_error_message( __( "User profile request failed. Most likely the user is not connected to the provider and he should authenticate again.", 'HybridAuth' ) ) ;
					$twitter->logout();
					break;
				case 7 : 
					osc_add_flash_error_message( __( "User not connected to the provider.", 'HybridAuth' ) ) ;
					$twitter->logout();
					break;
				case 8 : 
					osc_add_flash_error_message( __( "Provider does not support this feature.", 'HybridAuth' ) ) ;
					break;
			}
		}
		osc_redirect_to(osc_base_url());
	}
	
	public function endpoint(){
		require_once(osc_plugins_path() . 'HybridAuth/hybridauth-2.6.0/hybridauth/Hybrid/Endpoint.php');
		if( !$this->hybridauth ) $this->init();
        Hybrid_Endpoint::process();
    }
	
	public function logout(){
		if( !$this->hybridauth ) $this->init();
		Hybrid_Auth::logoutAllProviders();
	}
	
    private function register_user($user_profile){
        $manager = User::newInstance();
        $input['s_name']      = $user_profile['displayName'];
        $input['s_username'] = $user_profile['displayName'];
        $input['s_email']     = $user_profile['email'];
        $input['s_password']  = sha1( osc_genRandomPassword() ) ;
        $input['dt_reg_date'] = date( 'Y-m-d H:i:s' ) ;
        $input['s_secret']    = osc_genRandomPassword();
		
        $email_taken = $manager->findByEmail( $input['s_email'] ) ;
        $manager->insert( $input ) ;
        $userID = $manager->dao->insertedId() ;

        osc_run_hook( 'user_register_completed', $userID ) ;
        $userDB = $manager->findByPrimaryKey( $userID ) ;
        if( osc_notify_new_user() ) {
            osc_run_hook( 'hook_email_admin_new_user', $userDB ) ;
        }
        $manager->update( array('b_active' => '1'),array('pk_i_id' => $userID) ) ;
        osc_run_hook('hook_email_user_registration', $userDB) ;
        osc_run_hook('validate_user', $userDB) ;
        osc_add_flash_ok_message( sprintf( __('Your account has been created successfully', 'HybridAuth' ), osc_page_title() ) ) ;
        require_once osc_lib_path() . 'osclass/UserActions.php';
		$uActions = new UserActions( false );
		$logged = $uActions->bootstrap_login($userID);
    }
	
	public function googleurl(){
		return '<a href="'.osc_base_url(true) . '?login=Google" class="hybrid_btn google"><i class="fa fa-google-plus"></i> '.__( 'Login with Google', 'HybridAuth' ).'</a>';
	}
	
	public function facebookurl(){
		return '<a href="'.osc_base_url(true) . '?login=Facebook" class="hybrid_btn facebook"><i class="fa fa-facebook"></i> '.__( 'Login with Facebook', 'HybridAuth' ).'</a>';
	}
	
	public function twitterurl(){
		return '<a href="'.osc_base_url(true) . '?login=Twitter" class="hybrid_btn twitter"><i class="fa fa-twitter"></i> '.__( 'Login with Twitter', 'HybridAuth' ).'</a>';
	}
	
}
?>