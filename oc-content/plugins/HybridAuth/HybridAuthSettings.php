<h2 class="render-title"><?php _e('HybridAuth Settings', 'HybridAuth'); ?></h2>
<form action="<?php echo osc_admin_render_plugin_url('hybridauth/HybridAuth.php'); ?>" method="post">
    <input type="hidden" name="action_specific" value="HybridAuth" />
	<fieldset>
        <div class="form-horizontal">
			<h2 class="render-title separate-top">Google</h2>
			<div class="form-row">
                <div class="form-label">Client Id</div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="GoogleId" value="<?php echo osc_get_preference('GoogleId', 'HybridAuth'); ?>" placeholder="Client Id">
                </div>
            </div>
			<div class="form-row">
                <div class="form-label">Client Secret</div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="GoogleSecrect" value="<?php echo osc_get_preference('GoogleSecrect', 'HybridAuth'); ?>" placeholder="Client Secret">
                </div>
            </div>
			<div class="form-row">
                <div class="form-label">Enabled</div>
                <div class="form-controls">
					<select name="GoogleEnabled">
                        <option value="1" <?php echo (osc_get_preference('GoogleEnabled', 'HybridAuth'))?'selected="selected"':''; ?>>Yes</option>
						<option value="0" <?php echo (!osc_get_preference('GoogleEnabled', 'HybridAuth'))?'selected="selected"':''; ?>>No</option>
                    </select>
                </div>
            </div>
			<h2 class="render-title separate-top">Facebook</h2>
			<div class="form-row">
                <div class="form-label">Id</div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="FacebookId" value="<?php echo osc_get_preference('FacebookId', 'HybridAuth'); ?>" placeholder="Id">
                </div>
            </div>
			<div class="form-row">
                <div class="form-label">Secret</div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="FacebookSecrect" value="<?php echo osc_get_preference('FacebookSecrect', 'HybridAuth'); ?>" placeholder="Secrect">
                </div>
            </div>
			<div class="form-row">
                <div class="form-label">Enabled</div>
                <div class="form-controls">
					<select name="FacebookEnabled">
                        <option value="1" <?php echo (osc_get_preference('FacebookEnabled', 'HybridAuth'))?'selected="selected"':''; ?>>Yes</option>
						<option value="0" <?php echo (!osc_get_preference('FacebookEnabled', 'HybridAuth'))?'selected="selected"':''; ?>>No</option>
                    </select>
                </div>
            </div>
			<h2 class="render-title separate-top">Twitter</h2>
			<div class="form-row">
                <div class="form-label">Consumer Key (API Key)</div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="TwitterId" value="<?php echo osc_get_preference('TwitterId', 'HybridAuth'); ?>" placeholder="Consumer Key (API Key)">
                </div>
            </div>
			<div class="form-row">
                <div class="form-label">Consumer Secret (API Secret)</div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="TwitterSecrect" value="<?php echo osc_get_preference('TwitterSecrect', 'HybridAuth'); ?>" placeholder="Consumer Secret (API Secret)">
                </div>
            </div>
			<div class="form-row">
                <div class="form-label">Enabled</div>
                <div class="form-controls">
					<select name="TwitterEnabled">
                        <option value="1" <?php echo (osc_get_preference('TwitterEnabled', 'HybridAuth'))?'selected="selected"':''; ?>>Yes</option>
						<option value="0" <?php echo (!osc_get_preference('TwitterEnabled', 'HybridAuth'))?'selected="selected"':''; ?>>No</option>
                    </select>
                </div>
            </div>
			<h2 class="render-title separate-top">Debug</h2>
			<div class="form-row">
                <div class="form-label">Enabled</div>
                <div class="form-controls">
					<select name="HybridAuthDebug">
                        <option value="1" <?php echo (osc_get_preference('HybridAuthDebug', 'HybridAuth'))?'selected="selected"':''; ?>>Yes</option>
						<option value="0" <?php echo (!osc_get_preference('HybridAuthDebug', 'HybridAuth'))?'selected="selected"':''; ?>>No</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save Changes', 'HybridAuth'); ?>" class="btn btn-submit">
            </div>
		</div>
    </fieldset>
    
</form>