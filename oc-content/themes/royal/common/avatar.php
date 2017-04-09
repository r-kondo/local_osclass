<?php if (function_exists('mdh_avatar_preview_url')) { ?>

<center><img class="img-responsive" src="<?php echo mdh_avatar_preview_url(osc_user_id()); ?>" /></center>

<?php } else { ?>

<center><img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/user_default.gif') ; ?>" /></center>

<?php } ?>