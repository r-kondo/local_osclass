<?php

    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    flatter_add_body_class('contact');
    osc_current_web_theme_path('header.php');
?>
<div class="sendtofriend">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 page-title">
        		<h2><?php _e('Send to a friend', 'flatter'); ?></h2>
            </div>
        </div>
    	<div class="row">
        	<div class="col-md-12">
                <div id="content">
                	<p><i class="fa fa-envelope"></i> <strong><a href="<?php echo osc_item_url(); ?>" rel="nofollow"><?php echo osc_item_title(); ?></a></strong></p>
                	<ul id="error_list"></ul>
                	<form name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post" >
                    <input type="hidden" name="action" value="send_friend_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                    <?php if(osc_is_web_user_logged_in()) { ?>
                                    <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                    <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
                    <?php } else { ?>
                    <div class="form-group">
                            <input type="text" class="form-control" value="" name="yourName" id="yourName" placeholder="<?php _e("Your name",'flatter'); ?>"><?php //SendFriendForm::your_name(); ?>
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control" value="" name="yourEmail" id="yourEmail" placeholder="<?php _e("Your e-mail",'flatter'); ?>"><?php //SendFriendForm::your_email(); ?>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                            <input type="text" class="form-control" value="" name="friendName" id="friendName" placeholder="<?php _e("Your friend's name",'flatter'); ?>">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control" value="" name="friendEmail" id="friendEmail" placeholder="<?php _e("Your friend's e-mail address", 'flatter'); ?>">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control" value="" name="subject" id="subject" placeholder="<?php _e('Subject (optional)', 'flatter'); ?>">
                    </div>
                    <div class="form-group">
                            <textarea rows="5" class="form-control" name="message" id="message" placeholder="<?php _e('Message', 'flatter'); ?>"></textarea>
                    </div>
                    <div class="form-group">
                            <?php osc_run_hook('contact_form'); ?>
                            <?php echo responsive_recaptcha(); ?>
                            <?php osc_show_recaptcha(); ?>
                            <?php osc_run_hook('admin_contact_form'); ?>
                    </div>
                	<button type="submit" class="btn btn-success"><?php _e("Send", 'flatter');?></button>
              		</form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php SendFriendForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php'); ?>