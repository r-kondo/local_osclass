<?php
    /*
     *       Royal Responsive Osclass Themes
     *       
     *       Copyright (C) 2016 OSCLASS.me
     * 
     *       This is Royal Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<script type="text/javascript">
$(document).ready(function(){
    $(".btn_sub").click(function(){
        $.post('<?php echo osc_base_url(true); ?>', {email:$("#alert_email").val(), userid:$("#alert_userId").val(), alert:$("#alert").val(), page:"ajax", action:"alerts"}, 
            function(data){
                if(data==1) { alert('<?php echo osc_esc_js(__('You have sucessfully subscribed to the alert', 'royal')); ?>'); }
                else if(data==-1) { alert('<?php echo osc_esc_js(__('Invalid email address', 'royal')); ?>'); }
                else { alert('<?php echo osc_esc_js(__('There was a problem with the alert', 'royal')); ?>');
                };
        });
        return false;
    });

    var sQuery = '<?php echo osc_esc_js(AlertForm::default_email_text()); ?>';

    if($('input[name=alert_email]').val() == sQuery) {
        $('input[name=alert_email]').css('color', 'gray');
    }
    $('input[name=alert_email]').click(function(){
        if($('input[name=alert_email]').val() == sQuery) {
            $('input[name=alert_email]').val('');
            $('input[name=alert_email]').css('color', '');
        }
    });
    $('input[name=alert_email]').blur(function(){
        if($('input[name=alert_email]').val() == '') {
            $('input[name=alert_email]').val(sQuery);
            $('input[name=alert_email]').css('color', 'gray');
        }
    });
    $('input[name=alert_email]').keypress(function(){
        $('input[name=alert_email]').css('background','');
    })
});
</script>
<div class="alert_form">
    <h3>
        <strong><?php _e("Subscribe to this search", 'royal'); ?></strong>
    </h3>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert">
        <fieldset>
            <?php AlertForm::page_hidden(); ?>
            <?php AlertForm::alert_hidden(); ?>
            <?php if(osc_is_web_user_logged_in()) { ?>
            <?php AlertForm::user_id_hidden(); ?>
            <?php AlertForm::email_hidden(); ?>
            <?php } else { ?>
            <?php AlertForm::user_id_hidden(); ?>
            <?php AlertForm::email_text(); ?>
            <?php }; ?>
            <button type="submit" class="btn btn-info btn_sub seratus">
                <?php _e("Subscribe now", 'royal'); ?></button>
        </fieldset>
    </form>
</div>