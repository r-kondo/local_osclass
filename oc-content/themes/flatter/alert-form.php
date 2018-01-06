<div class="widget subscribe hidden-xs hidden-sm">
    <h3><?php _e('Subscribe to this search', 'flatter'); ?></h3>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert" class="nocsrf">
            <?php AlertForm::page_hidden(); ?>
            <?php AlertForm::alert_hidden(); ?>

            <?php if(osc_is_web_user_logged_in()) { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <div class="form-group">
                <input type="text" class="form-control" value="<?php echo osc_logged_user_email() ?>" name="alert_email" id="alert_email">
                </div>
                <?php //AlertForm::email_hidden(); ?>
				<button type="submit" class="btn btn-default btn-sub"><?php _e('Subscribe now', 'flatter'); ?></button>	
            <?php } else { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php //AlertForm::email_text(); ?>
                <div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e('Enter your e-mail'); ?>" name="alert_email" id="alert_email">
                </div>
                <button type="submit" class="btn btn-default btn-sub"><?php _e('Subscribe now', 'flatter'); ?></button>
            <?php } ?>
    </form>
</div>