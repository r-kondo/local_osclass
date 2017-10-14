<div class="control-group">
    <label class="control-label" for="name"><input type="checkbox" id="lopd_box" name="lopd_box" value="1"/></label>
    <div class="controls">
        <?php echo sprintf(__('He leído, entendido y acepto las <a id="lopd_a" %s >condiciones de uso</a> de <a href="%s" >%s</a>', 'lopd'), 'href="javascript:void(0);" onclick="$(\'#lopd_page\').dialog(\'open\');"', osc_base_url(), osc_base_url()) ; ?>
    </div>
</div>



<?php  View::newInstance()->_exportVariableToView('page', Page::newInstance()->findByInternalName('lopd')); ?>
<div id="lopd_page" style="display:none;">
    <?php echo osc_static_page_text(); ?>
</div>