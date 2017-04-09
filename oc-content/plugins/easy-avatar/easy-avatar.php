<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by osclass to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://pixadrop.com
 * @since             1.0.0
 * @package           easy_avatar
 *
 */

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-avatar-activator.php
 */
function activate_easy_avatar() {
	require_once osc_plugin_path('easy-avatar/includes/class-easy-avatar-activator.php' );
	easy_avatar_Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-avatar-deactivator.php
 */
function deactivate_easy_avatar() {
	require_once (osc_plugin_path('easy-avatar/includes/class-easy-avatar-deactivator.php'));
	easy_avatar_Deactivator::deactivate();
	easy_avatar_Deactivator::esa_delete_dir();
}
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once(osc_plugins_path() . 'easy-avatar/includes/class-easy-avatar.php');
/**
* The class responsible for defining all actions that occur in the public view.
*/
require_once (osc_plugins_path() . 'easy-avatar/public/class-easy-avatar-public.php');
/**
* The class responsible for defining all actions that occur for social media links.
*/
require_once (osc_plugins_path() . 'easy-avatar/includes/class-easy-avatar-social-media.php');
/**
* The class responsible for defining all actions that occur in the admin area.
*/
require_once (osc_plugins_path() . 'easy-avatar/includes/class-easy-avatar-user-avatar.php');
/**
* The class responsible for defining all actions that occur in the admin area.
*/
require_once (osc_plugins_path() . 'easy-avatar/admin/class-easy-avatar-admin.php');

/**
* The class responsible for importing all the require helper finction.
*/
require_once (osc_plugin_path('easy-avatar/includes/easy-avatar-helpers.php'));

/**
* Begins execution of the plugin.
*
* Since everything within the plugin is registered via hooks,
* then kicking off the plugin from this point in the file does
* not affect the page life cycle.
*
* @since    1.0.0
*/
/*
*Runs in admin view
****************************************/
function run_admin_easy_avatar() {
    if(OC_ADMIN){
	  easy_avatar::newInstance();
    }

}
osc_add_hook('init_admin', 'run_admin_easy_avatar');

/*
*Runs in public view
****************************************/
function run_public_easy_avatar() {
    
	easy_avatar::newInstance()->define_public_hooks();

}
osc_add_hook('init', 'run_public_easy_avatar');

/**
 * The code that show configuration link at the panel.
 */
function configure_easy_avatar() {
	/**
	* run instances of the admin class
	*/
	easy_avatar_Admin::newInstance()->admin_view_easy_avatar();
}
/**
 * All the plugin helpers function,
 * admin-specific hooks, and public-facing site hooks.
 */
/*  Create user dependencies
/* ------------------------------------ */
function esa_create_user($userid){

    return easy_avatar::newInstance()->load_dependencies($userid);

}
osc_add_hook('user_register_completed', 'esa_create_user');
/*  Uploads Url
/* ------------------------------------ */
if( !function_exists('esv_uploads_url')) {
    function esv_uploads_url($item = '') {
        $path = str_replace(ABS_PATH, '', osc_uploads_path());
        return osc_base_url() . $path . $item;
    }
}
/*  Update User Infromation
/* ------------------------------------ */
function esa_update_user($userid){


    return easy_avatar::newInstance()->user_edit_dependenices($userid);

}
osc_add_hook('user_edit_completed','esa_update_user');

/* show avatar tags in the fron panel
/* ------------------------------------ */
if(!function_exists('esv_show_user_avatar')){
	function esv_show_user_avatar(){ 
		  return easy_avatar_Public::newInstance()->public_view_easy_avatar();
	}	
}

/* Get user avatar Url
/* ------------------------------------ */
if(!function_exists('esv_get_user_avatar_url')){
	function esv_get_user_avatar_url($userid){
		
		  return easy_avatar_user_avatar::newInstance()->esa_user_avatar_url($userid);
	}	
}

/* Get user default avatar Url
/* ------------------------------------ */
if(!function_exists('esv_get_user_default_avatar_url')){
	function esv_get_user_default_avatar_url(){
		  return easy_avatar_user_avatar::newInstance()->esa_user_default_avatar();
	}	
}

/* Get user avatar Url with container
/* ------------------------------------ */
if(!function_exists('esv_show_user_avatar_img')){
	function esv_show_user_avatar_img($userid){
		  ?>
             <div class="esv-avatar-img-wrapper">
         	 	<img class="esv-user-img-avatar" src="<?php echo esv_get_user_avatar_url($userid); ?>" alt="<?php echo 'user-avatar'; ?>">
         	 </div>
		  <?php
	}	
}

/* Get registered user comment avatar
/* ------------------------------------ */
if(!function_exists('esv_user_comment_avatar')){
	function esv_user_comment_avatar(){

		   $userid= osc_comment_user_id();
		  ?>
             <div class="esv-avatar-img-wrapper">
         	 	<img class="esv-comment-avatar" src="<?php echo esv_get_user_avatar_url($userid); ?>" alt="<?php echo 'user-avatar'; ?>">
         	 </div>
		  <?php
	}	
}

/* Show social media profile links
/* ------------------------------------ */
if(!function_exists('esv_show_user_sm_links')){
	function esv_show_user_avatar_links($userid){

		if(easy_avatar_checkbox_value('easy-avatar-sm-hide') != 'activated'){
		 return  easy_avatar_social_media::newInstance()->esa_user_sm_profiles($userid);
		}
	}	
}

/* apply custom styling
/* ------------------------------------ */
function esa_display_custom_style(){

	 return easy_avatar_Public::newInstance()->easy_avatar_custom_style();
	 
}
osc_add_hook('header', 'esa_display_custom_style');

/*  Genarate User facebook  Links
/* ------------------------------------ */
    if(!function_exists('esv_user_facebook_profile_url')){
	    function esv_user_facebook_profile_url($userid){
	        

	        $link = easy_avatar_social_media::newInstance()->esa_user_fb_link($userid);

	        return $link;

	    }
    }


/*  Genarate User twitter  Link
/* ------------------------------------ */
    if(!function_exists('esv_user_twitter_profile_url')){
	    function esv_user_twitter_profile_url($userid){
	        

	        $link = easy_avatar_social_media::newInstance()->esa_user_tw_link($userid);

	        return $link;

	    }
    }


/*  Genarate User LinkedIn  Link
/* ------------------------------------ */
    if(!function_exists('esv_user_LinkedIn_profile_url')){
	    function esv_user_LinkedIn_profile_url($userid){
	        

	        $link = easy_avatar_social_media::newInstance()->esa_user_lk_link($userid);

	        return $link;

	    }
    }

/*  Genarate User google plus  Link
/* ------------------------------------ */
    if(!function_exists('esv_user_google_plus_profile_url')){
	    function esv_user_google_plus_profile_url($userid){
	        

	        $link = easy_avatar_social_media::newInstance()->esa_user_gl_link($userid);

	        return $link;

	    }
    }

/*  Delete user
/* ------------------------------------ */
 function esa_user_removed(){
 	
 	/**
	 * The class responsible for deleting user related plugin arttributes when user is removed
	 */
 	require_once(osc_plugins_path() . 'easy-avatar/includes/class-easy-avatar-delete-user.php');
	return easy_avatar_delete_user::newInstance();

 }
 osc_add_hook('delete_user', 'esa_user_removed');

/*  Display user forms
/* ------------------------------------ */
     function esa_user_form_fields($userid){
     	/**
		 * The class responsible for displayin user form fields
		 */
		return easy_avatar_Public::newInstance()->easy_avatar_form_fields($userid);

     }
    osc_add_hook('user_profile_form', 'esa_user_form_fields');
/* show avatar tags in the fron panel
/* ------------------------------------ */
if(!function_exists('esv_user_avatar_prf')){
	function esv_user_avatar_prf($userid){
		  return easy_avatar_user_avatar::newInstance()->esa_user_avatar_prf($userid);
	}	
}



