<?php
require_once osc_plugin_path(__DIR__) . '/SelectRegion.php';

?>
<h2 class="render-title">地域選択</h2>
<form action="<?php echo osc_admin_render_plugin_url('select_region/admin.php'); ?>" method="post">
    <input type="hidden" name="option" value="stepone" />
    <fieldset>
        <div class="form-horizontal">
        <div>
             <label><input type="checkbox" id="all">全選択</label>
        </div>
<?php
    $aRegions = SelectRegion::newInstance()->listAll(); 
    if(count($aRegions) > 0 ) { 
        $html = '<div">';
        foreach($aRegions as $region) { 
            $html .= '<label class="checkbox" style="display: inline-block;width: 110px;">';
            if ($region['b_active'] == 1) {
                $html .= '<input type="checkbox" name="region[]" value="'. $region['pk_i_id'].'"checked="checked">'. $region['s_name'];
            }
            else {
                $html .= '<input type="checkbox" name="region[]" value="'. $region['pk_i_id'].'">'. $region['s_name'];
            }
            $html .= '</label>';
        } 
		$html .= '</div>';
    } 

    echo $html;
?>
            <div class="form-actions">
                <input type="submit" value="保存" class="btn btn-submit">
                <input type="button" id="cancel" value="cancel" class="btn">
            </div>
        </div>
    </fieldset>
</form>
<script>
$('#all').on('change', function() {
    $('input[name="region[]"').prop('checked', this.checked);
});
$('#cancel').on('click', function() {
    location.reload();
});
</script>
