<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link href="<?php echo osc_current_web_theme_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/iconmoon.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo osc_current_web_theme_url('js/bootstrap.min.js'); ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="http://ubilabs.github.io/geocomplete/jquery.geocomplete.js"></script>
<style type="text/css" media="screen">
	#content-page { background:#e5e5e5!important; }
	.flatter-admin a { color:#555; }
	.flatter-admin a:hover, .flatter-admin a:focus { color:#59BD56; }
	.flatter-admin a, .flatter-admin a:hover, .flatter-admin a:focus { outline:none; }
	.flatter-admin { width:850px; margin:0 auto; border:2px solid #ddd; }
	.flatter-admin .flatter-head h2 { background:#59BD56; color:#fff; margin:0px; padding:10px; font-size:22px; }
	.flatter-admin .flatter-head h2 span { font-size:14px; padding-top:4px; }
	.flatter-admin .flatter-head h2 span a { font-weight:bold; color:#fff;}
	.flatter-admin .flatter-content { background:#fff; border-top:0; }
	.flatter-admin .flatter-content ul { background:#f9f9f9;}
	.flatter-admin .flatter-content ul li a { border-radius: 0px; border-top:0; }
	.flatter-admin .flatter-content ul li a:hover { background:none!important;}
	.flatter-admin .flatter-content ul li.active a {  color:#59BD56; }
	.flatter-admin .flatter-content ul li:first-child a { border-left:0; }
	.flatter-admin .flatter-content .tab-content { padding:15px; padding-bottom:0;  }
	.flatter-admin .form-actions { margin: 0 -15px; padding: 15px;}
	.flatter-admin .tab-content .flashmessage { margin-bottom:10px!important; width:100%; border-radius:0!important; padding:10px; }
	#content-head { height:auto;}
    .form-control { height:auto!important; padding:7px!important; width:100%!important; }
	label { font-weight:normal; }
	input, select, textarea { border-radius:0 !important; }
	.select-box select { opacity:10!important;}
	.select-box.form-control { border:0;}
	small { font-size:11px; color:#aaa;}
	small a { color:#59BD56!important; }
	.navbar { border-radius: 0px; }
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus { border-top:0;}
	.downloads {
		padding:15px;
		margin:0 0 15px 0;
	}
	.downloads li {
		line-height:28px;
	}
	.downloads li label {
		width:200px;
	}
	.downloads li a {
		color:#59BD56;
	}
	
</style>
<div class="flatter-admin">
	<div class="flatter-head">
        <h2><?php _e('Flatter Settings', 'flatter'); ?>  <span class="pull-right"><?php _e('Powered by', 'flatter'); ?> <a href="http://www.drizzlethemes.com" target="_blank">DrizzleThemes</a></span></h2>
    </div>
    <div class="flatter-content">
    	<!-- Nav tabs -->
        <ul class="nav nav-tabs" id="adminTab">
          <li class="active"><a href="#general" data-toggle="tab"><?php _e('General', 'flatter'); ?></a></li>
          <li><a href="#page" data-toggle="tab"><?php _e('Page/Social', 'flatter'); ?></a></li>
          <li><a href="#logo" data-toggle="tab"><?php _e('Logo', 'flatter'); ?></a></li>
          <li><a href="#category" data-toggle="tab"><?php _e('Category icons', 'flatter'); ?></a></li>
          <li><a href="#adsense" data-toggle="tab"><?php _e('Adsense', 'flatter'); ?></a></li>
          <li><a href="#footerwidget" data-toggle="tab"><?php _e('Footer', 'flatter'); ?></a></li>
          <li><a href="#others" data-toggle="tab"><?php _e('Widgets', 'flatter'); ?></a></li>
          <li><a href="#requiredplugins" data-toggle="tab"><?php _e('Plugins', 'flatter'); ?></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="general">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
            	<input type="hidden" name="action_specific" value="settings" />
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Theme color', 'flatter'); ?></label>
                    <div class="col-md-5">
                        <select name="defaultColor@all" class="form-control">
                            <option value="green" <?php if(flatter_def_color() == 'green'){ echo 'selected="selected"' ; } ?>><?php _e('Default','flatter'); ?></option>
                            <option value="red" <?php if(flatter_def_color() == 'red'){ echo 'selected="selected"' ; } ?>><?php _e('Red/Blue','flatter'); ?></option>
                            <option value="yellow" <?php if(flatter_def_color() == 'yellow'){ echo 'selected="selected"' ; } ?>><?php _e('Yellow/Black','flatter'); ?></option>
                            <option value="blue" <?php if(flatter_def_color() == 'blue'){ echo 'selected="selected"' ; } ?>><?php _e('Blue/Orange','flatter'); ?></option>
                            <option value="gold" <?php if(flatter_def_color() == 'gold'){ echo 'selected="selected"' ; } ?>><?php _e('Orange/Black','flatter'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Search placeholder', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'flatter_theme') ); ?>">
                    </div>
                </div>
                
				<div class="form-group">
                    <label for="display" class="col-md-3 control-label"><?php _e('Show lists as', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <select name="defaultShowAs@all" class="form-control">
                        <option value="gallery" <?php if(flatter_default_show_as() == 'gallery'){ echo 'selected="selected"' ; } ?>><?php _e('Gallery','flatter'); ?></option>
                        <option value="list" <?php if(flatter_default_show_as() == 'list'){ echo 'selected="selected"' ; } ?>><?php _e('List','flatter'); ?></option>
                     </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Premium listings limit', 'flatter'); ?></label>
                    <div class="col-sm-1">
                      <input type="text" class="form-control" name="premium_count" value="<?php echo osc_esc_html( osc_get_preference('premium_count', 'flatter_theme') ); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Promotional text', 'flatter'); ?></label>
                    <div class="col-md-5">
                <input class="form-control" name="fpromo_text" placeholder="Post your ad Today. It's totally free!" value="<?php echo osc_esc_html( osc_get_preference('fpromo_text', 'flatter_theme') ); ?>" />
                    </div>
                </div>
                
                <hr />
                
                <div class="form-group">
                    <label for="display" class="col-md-3 control-label"><?php _e('Location list as', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <select name="location_input" class="form-control">
                            <option <?php if( osc_get_preference('location_input', 'flatter_theme') == '1') { echo"selected='selected'";} ?> value="1"><?php _e('Dropdown', 'flatter'); ?></option>
                            <option <?php if( osc_get_preference('location_input', 'flatter_theme') == '0') { echo"selected='selected'";} ?>value="0"><?php _e('Autocomplete', 'flatter'); ?></option>
                        </select>
                    </div>
                </div>
         
         		
                 <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Animation on scroll', 'flatter'); ?></label>
                    <div class="col-md-5">
                        <div class="">
                		<label><input type="checkbox" name="anim" value="1" <?php echo (osc_get_preference('anim', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('Check to enable', 'flatter'); ?></label>
                        </div>
                	</div>
                </div>
               
                 <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Subscription on search', 'flatter'); ?></label>
                    <div class="col-md-5">
                        <div class="">
                		<label><input type="checkbox" name="subscribe_show" value="1" <?php echo (osc_get_preference('subscribe_show', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('Check to enable', 'flatter'); ?></label>
                        </div>
                	</div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Useful information', 'flatter'); ?></label>
                    <div class="col-sm-6">
                		<textarea class="form-control" rows="6" name="usefulinfo_msg"><?php echo osc_get_preference('usefulinfo_msg', 'flatter_theme'); ?></textarea>
                    	<small><?php _e('HTML supported', 'flatter'); ?></small>
                	</div>
                </div>
                
                <hr />
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Contact address', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="contact_enable" value="1" <?php echo (osc_get_preference('contact_enable', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('Check to enable', 'flatter'); ?><br />
                    	<textarea class="form-control" rows="6" name="contact_address"><?php echo osc_get_preference('contact_address', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('HTML supported', 'flatter'); ?></small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Address map', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="text" class="form-control" id="geocomplete" name="address_map" placeholder="Disneyland, Paris" value="<?php echo (osc_get_preference('address_map', 'flatter_theme')); ?>">
                        <div class="map_canvas"></div>
                    </div>
                </div>
                
                <hr />
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Pop up', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="pop_enable" value="1" <?php echo (osc_get_preference('pop_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                    	<input class="form-control" type="text" name="pop_heading" value="<?php echo osc_get_preference('pop_heading', 'flatter_theme'); ?>" />
                    	<textarea class="form-control" rows="6" style="margin:10px 0 0 0;"  name="landing_pop"><?php echo osc_esc_html( osc_get_preference('landing_pop', 'flatter_theme') ); ?></textarea>
                        
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Custom CSS', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="custom_css"><?php echo osc_get_preference('custom_css', 'flatter_theme', "UTF-8"); ?></textarea>
                    </div>
        		</div><!-- field end -->
                
                <hr />
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Google analytics', 'flatter'); ?></label>
                    <div class="col-sm-3">
                    	<input class="form-control" name="g_analytics" placeholder="ie.UA-47816636-1" value="<?php echo osc_esc_html( osc_get_preference('g_analytics', 'flatter_theme') ); ?>" />
                        <small><a href="http://www.google.com/analytics/" rel="nofollow" target="_blank"><?php _e('Get it here', 'flatter'); ?></a></small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Google webmaster tools', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input class="form-control" name="g_webmaster" value="<?php echo osc_esc_html( osc_get_preference('g_webmaster', 'flatter_theme') ); ?>" />
                        <small>ie.QErL1uhzvjGYHQbu3lWgkic2UHryRLEo8gngTYmraFo - (<a href="http://www.google.com/webmasters/" rel="nofollow" target="_blank"><?php _e('Get it here', 'flatter'); ?></a>)</small>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- General Settings -->
          
          <div class="tab-pane" id="page">
          	  <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" class="form-horizontal nocsrf" role="form" method="post">
				<input type="hidden" name="action_specific" value="page_settings" />
                
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Terms of use', 'flatter'); ?></label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="terms_link" placeholder="<?php echo osc_base_url(); ?>terms-ofuse" value="<?php echo osc_esc_html( osc_get_preference('terms_link', 'flatter_theme') ); ?>" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Privacy policy', 'flatter'); ?></label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="privacy_link" placeholder="<?php echo osc_base_url(); ?>privacy-policy" value="<?php echo osc_esc_html( osc_get_preference('privacy_link', 'flatter_theme') ); ?>" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Facebook', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="facebook_page" value="<?php echo osc_esc_html( osc_get_preference('facebook_page', 'flatter_theme') ); ?>">
                      <small>Facebook Page Name. <a href="https://www.facebook.com/pages/create/" rel="nofollow" target="_blank"><?php _e('Get it here', 'flatter'); ?></a></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Twitter', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="twitter_page" value="<?php echo osc_esc_html( osc_get_preference('twitter_page', 'flatter_theme') ); ?>">
                      <small>Twitter Profile Name. <a href="https://twitter.com/signup" rel="nofollow" target="_blank"><?php _e('Get it here', 'flatter'); ?></a></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Google+', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="gplus_page" value="<?php echo osc_esc_html( osc_get_preference('gplus_page', 'flatter_theme') ); ?>">
                      <small>Google+ Page Name. <a href="https://plus.google.com/pages/create" rel="nofollow" target="_blank"><?php _e('Get it here', 'flatter'); ?></a></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php _e('Pinterest', 'flatter'); ?></label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="pinterest_page" value="<?php echo osc_esc_html( osc_get_preference('pinterest_page', 'flatter_theme') ); ?>">
                      <small>Pinterest Page Name. <a href="https://www.pinterest.com/business/create/" rel="nofollow" target="_blank"><?php _e('Get it here', 'flatter'); ?></a></small>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
              </form>
          </div><!-- Page Settings -->
          
          <div class="tab-pane" id="logo">
          	<?php $logo_prefence = osc_get_preference('logo', 'flatter_theme'); ?>
				<?php if( is_writable( osc_uploads_path()) ) { ?>
                    <?php if($logo_prefence) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong><?php _e('Logo Preview', 'flatter') ?></strong></div>
                            <div class="panel-body">
                            <img border="0" alt="<?php echo osc_esc_html( osc_page_title() ); ?>" src="<?php echo flatter_logo_url();?>" />
                            <br /><br />
                            <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php');?>" method="post" class="form-horizontal nocsrf" enctype="multipart/form-data" >
                                <input type="hidden" name="action_specific" value="remove" />
                                <div class="form-group">
                                    <div class="col-md-6">
                                      <button type="submit" id="button_remove" class="btn btn-danger"><?php echo osc_esc_html(__('Remove logo','flatter')); ?></button>
                                    </div>
                                </div>
                                <!-- field end -->
                            </form>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="flashmessage flashmessage-info flashmessage-inline" style="display: block;">
                            <p><?php _e('No logo has been uploaded yet', 'flatter'); ?></p>
                        </div>
                    <?php } ?>
                    <div class="panel panel-default">
                            <div class="panel-heading"><strong><?php _e('Upload logo', 'flatter') ?></strong></div>
                            <div class="panel-body">
                            <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal nocsrf">
                            <input type="hidden" name="action_specific" value="upload_logo" />
                            <div class="form-group">
                                <label for="search" class="col-sm-3 control-label"><?php _e('Logo image (png,gif,jpg)','flatter'); ?></label>
                                <div class="col-md-6">
                                  <input type="file" name="logo" id="package" />
                                  <small><?php _e('Flatter theme preferred size of the logo is 200x50.', 'flatter'); ?></small>
                                </div>
                            </div>
                            <!-- field end -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-md-6">
                                  <button type="submit" id="button_save" class="btn btn-success"><?php echo osc_esc_html(__('Upload','flatter')); ?></button>
                                </div>
                            </div>
                            </form>
                            </div>
                    </div>
                    <?php } else { ?>
                    <div class="flashmessage flashmessage-error" style="display: block;">
                        <p>
                            <?php
                                $msg  = sprintf(__('The images folder <strong>%s</strong> is not writable on your server', 'flatter'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                                $msg .= __("Osclass can't upload the logo image from the administration panel.", 'flatter') . ' ';
                                $msg .= __('Please make the aforementioned image folder writable.', 'flatter') . ' ';
                                echo $msg;
                            ?>
                        </p>
                        <p>
                            <?php _e('To make a directory writable under UNIX execute this command from the shell:','flatter'); ?>
                        </p>
                        <p class="command">
                            chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/"; ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if( $logo_prefence ) { ?>
                    <div class="flashmessage flashmessage-inline flashmessage-warning"><?php _e('<strong>Note:</strong> Uploading another logo will overwrite the current logo.', 'flatter'); ?></div>
                    <?php } ?>
          </div><!-- Logo Settings -->
          
          <div class="tab-pane" id="category">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="category_settings" />
                <div class="flashmessage flashmessage-info flashmessage-inline" style="display: block;">
                	<h4 style="margin:0 0 5px 0"><?php _e('You can use', 'flatter'); ?> <a href="http://fortawesome.github.io/Font-Awesome/icons/" rel="nofollow" target="_blank">FontAwesome Icons <i class="fa fa-external-link"></i></a>, <a href="http://getbootstrap.com/components/#glyphicons" rel="nofollow" target="_blank">Glyphicons <i class="fa fa-external-link"></i></a> <?php _e('and', 'flatter'); ?> <a href="https://icomoon.io/#preview-free" rel="nofollow" target="_blank">IcoMoon<i class="fa fa-external-link"></i></a></h4>
                    <small><?php _e('Example', 'flatter'); ?>: <strong>fa fa-star</strong> <?php _e('or', 'flatter'); ?> <strong>glyphicon glyphicon-star</strong> <?php _e('or', 'flatter'); ?> <strong>icon icon-star</strong></small>
                </div>
				<?php echo category_icons();?>
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- Category Icon Settings -->
          
          <div class="tab-pane" id="adsense">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="adsense_settings" />
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Google Adsense', 'flatter'); ?></label>
                    <div class="col-md-6">
                        <div class="">
                		<label><input type="checkbox" name="google_adsense" value="1" <?php echo (osc_get_preference('google_adsense', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('Check to enable', 'flatter'); ?></label>
                        </div>
                	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Sidebar', 'flatter'); ?></label>
                    <div class="col-sm-6">
                		<textarea class="form-control" rows="6" name="adsense_sidebar"><?php echo osc_get_preference('adsense_sidebar', 'flatter_theme'); ?></textarea>
                        <small><?php _e('This ad will be shown at the all sidebar.', 'flatter'); ?></small>
                	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Listing page', 'flatter'); ?></label>
                    <div class="col-sm-6">
                		<textarea class="form-control" rows="6" name="adsense_listing"><?php echo osc_get_preference('adsense_listing', 'flatter_theme'); ?></textarea>
                        <small><?php _e('This ad will be shown at listing page above comments section.', 'flatter'); ?></small>
                	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Search sidebar', 'flatter'); ?></label>
                    <div class="col-sm-6">
                		<textarea class="form-control" rows="6" name="adsense_searchside"><?php echo osc_get_preference('adsense_searchside', 'flatter_theme'); ?></textarea>
                        <small><?php _e('This ad will be shown at search page sidebar', 'flatter'); ?></small>
                	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Search top', 'flatter'); ?></label>
                    <div class="col-sm-6">
                		<textarea class="form-control" rows="6" name="adsense_searchtop"><?php echo osc_get_preference('adsense_searchtop', 'flatter_theme'); ?></textarea>
                        <small><?php _e('This ad will be shown at search page top below premium listings', 'flatter'); ?></small>
                	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Search bottom', 'flatter'); ?></label>
                    <div class="col-sm-6">
                		<textarea class="form-control" rows="6" name="adsense_searchbottom"><?php echo osc_get_preference('adsense_searchbottom', 'flatter_theme'); ?></textarea>
                        <small><?php _e('This ad will be shown at search page bottom above pagination', 'flatter'); ?></small>
                	</div>
                </div>
                
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
          	</form>
          </div>
          
          <div class="tab-pane" id="footerwidget">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="footer_settings" />
                <div class="form-group">
                    <label class="col-md-3" style="text-align:right;"><?php _e('Footer widget', 'flatter'); ?></label>
                    <div class="col-sm-6">
                    	<input type="text" class="form-control" name="fcwidget_title" placeholder="About <?php echo osc_page_title(); ?>" value="<?php echo osc_esc_html( osc_get_preference('fcwidget_title', 'flatter_theme') ); ?>"><br /><br />
                		<textarea class="form-control" rows="6" name="fcwidget_content"><?php echo osc_get_preference('fcwidget_content', 'flatter_theme'); ?></textarea>
                        <small><?php _e('Footer content widget', 'flatter'); ?></small>
                	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3"><?php _e('Facebook like box', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<div class="">
                            <label style="display:block; margin-bottom:0;"><input type="checkbox" name="facebook_likebox" value="1" <?php echo (osc_get_preference('facebook_likebox', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('Check to enable', 'flatter'); ?></label><small>(<?php _e('This will overwrite footer widget', 'flatter'); ?>)</small>
                    	</div>
                    	
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3"><?php _e('Footer credit', 'flatter'); ?></label>
                    <div class="col-md-6">
                        <div class="">
                            <label><input type="checkbox" name="footer_link" value="1" <?php echo (osc_get_preference('footer_link', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('I want to show <a href="http://osclass.org/">osclass.org</a> and <a href="http://www.drizzlethemes.com/">DrizzleThemes</a>', 'flatter'); ?></label>
                            </div>
                    </div>
                </div>
                
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- Footer Settings -->
          
          <div class="tab-pane" id="others">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="other_settings" />
               	<div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Homepage (Widget #1)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position1_enable" value="1" <?php echo (osc_get_preference('position1_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position1_hide" value="1" <?php echo (osc_get_preference('position1_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position1_content"><?php echo osc_get_preference('position1_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown between search and location(IP) based listings', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
              
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Homepage (Widget #2)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position2_enable" value="1" <?php echo (osc_get_preference('position2_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position2_hide" value="1" <?php echo (osc_get_preference('position2_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position2_content"><?php echo osc_get_preference('position2_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown above footer at home page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                 <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Search sidebar (Widget #3)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position3_enable" value="2" <?php echo (osc_get_preference('position3_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position3_hide" value="2" <?php echo (osc_get_preference('position3_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position3_content"><?php echo osc_get_preference('position3_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown at bottom sidebar', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Search top (Widget #4)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position4_enable" value="1" <?php echo (osc_get_preference('position4_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position4_hide" value="1" <?php echo (osc_get_preference('position4_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position4_content"><?php echo osc_get_preference('position4_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown at top on search page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Search bottom (Widget #5)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position5_enable" value="1" <?php echo (osc_get_preference('position5_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position5_hide" value="1" <?php echo (osc_get_preference('position5_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position5_content"><?php echo osc_get_preference('position5_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown at bottom on search page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Listing sidebar (Widget #6)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position6_enable" value="1" <?php echo (osc_get_preference('position6_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position6_hide" value="1" <?php echo (osc_get_preference('position6_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position6_content"><?php echo osc_get_preference('position6_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown at sidebar on listing page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Listing top (Widget #7)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position7_enable" value="1" <?php echo (osc_get_preference('position7_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position7_hide" value="1" <?php echo (osc_get_preference('position7_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position7_content"><?php echo osc_get_preference('position7_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown above images at listing page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Listing bottom (Widget #8)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position8_enable" value="1" <?php echo (osc_get_preference('position8_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position8_hide" value="1" <?php echo (osc_get_preference('position8_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position8_content"><?php echo osc_get_preference('position8_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown between comments and related listings at listing page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Post listing top (Widget #9)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position9_enable" value="1" <?php echo (osc_get_preference('position9_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position9_hide" value="1" <?php echo (osc_get_preference('position9_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position9_content"><?php echo osc_get_preference('position9_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown above post listing form at post listing page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                
                <div class="form-group">
        			<label class="col-md-3 control-label"><?php _e('Post listing bottom (Widget #10)', 'flatter'); ?></label>
                    <div class="col-md-6">
                    	<input type="checkbox" name="position10_enable" value="1" <?php echo (osc_get_preference('position10_enable', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Check to enable', 'flatter'); ?>
                        <input type="checkbox" name="position10_hide" value="1" <?php echo (osc_get_preference('position10_hide', 'flatter_theme') ? 'checked' : ''); ?>> <?php _e('Hide on Mobile view', 'flatter'); ?>
                       <textarea class="form-control" rows="5" style="margin:10px 0 0 0;"  name="position10_content"><?php echo osc_get_preference('position10_content', 'flatter_theme', "UTF-8"); ?></textarea>
                        <small><?php _e('This widget will shown below post listing form at post listing page', 'flatter'); ?></small>
                    </div>
        		</div><!-- field end -->
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- Widgets Settings -->
          
          <div class="tab-pane" id="requiredplugins">
          	<h4><?php _e('Download supported plugins', 'flatter'); ?></h4>
          	<ul class="downloads">
            	<li><label>Custom Attributes</label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/custom_attributes.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
                <li><label>Facebook Login</label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/facebook.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
                <li><label>Facebook Page Plugin</label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/fb_page_plugin.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
                <li><label>Profile picture <small>(Required)</small></label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/profile_picture.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
                <?php /*?><li><label>Popular ads</label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/popular_ads.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li><?php */?>
                <li><label>OSC Slider <small>(Required)</small></label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/slider.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
                <li><label>Watchlist <small>(Required)</small></label>:&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/watchlist.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
                <li><label>Youtube</label> :&nbsp;&nbsp;<a class="download-btn" href="<?php echo osc_current_web_theme_url('downloads/youtube.zip') ; ?>"><i class="fa fa-download"></i>&nbsp;<?php _e('Download', 'flatter'); ?></a></li>
            </ul>
          </div>
        </div>
    </div>
</div>

<script>
  $(function(){
  	var options = {
          map: ".map_canvas",
          //location: "NYC"
        };
	$("#geocomplete").geocomplete();
  });
</script>
<script>

$('#adminTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#adminTab a[href="' + hash + '"]').tab('show');
</script>