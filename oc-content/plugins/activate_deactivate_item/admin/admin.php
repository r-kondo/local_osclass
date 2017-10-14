<?php if (!defined('OC_ADMIN') || OC_ADMIN!==true) exit('Access is not allowed.');

	$dao_preference = new Preference();

	if(Params::getParam('activate') != '') {
		$activateRewriteRule = Params::getParam('activate');
	} else {
		$activateRewriteRule = 'item/activate';
	}

	if(Params::getParam('deactivate') != '') {
		$deactivateRewriteRule = Params::getParam('deactivate');
	} else {
		$deactivateRewriteRule = 'item/deactivate';
	}

	if( Params::getParam('plugin_action') == 'activate_deactivate_item_settings' ) {
		osc_set_preference('user_item_activate', $activateRewriteRule, 'activate-deactivate-item', 'STRING');
		osc_set_preference('user_item_deactivate', $deactivateRewriteRule, 'activate-deactivate-item', 'STRING');

		osc_add_flash_ok_message(__('Settings saved.', 'activate_deactivate_item'), 'admin');
		header('Location: ' . osc_admin_render_plugin_url('activate_deactivate_item/admin/admin.php')); exit;
	}
	unset($dao_preference);

?>

<!-- SETTINGS -->

<div id="settings_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<!-- Banner -->
		<p>
			<a href="http://market.osclass.org/plugins/ad-management/activate-deactivate-item_278" target="_blank"><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate_deactivate_item_banner.png'; ?>" style="float:right; width:200px; border:2px solid #676767; border-radius:4x; -moz-border-radius:4px; -webkit-border-radius:4px;" /></a>
		</p>

		<h2><?php _e('Activate-Deactivate Item Settings', 'activate_deactivate_item');?></h2>

		<form name="activate_deactivate_item_settings_form" id="activate_deactivate_item_settings_form" action="<?php osc_admin_base_url(true); ?>" method="post" enctype="multipart/form-data">

			<input type="hidden" name="page" value="plugins"/>
			<input type="hidden" name="action" value="renderplugin"/>
			<input type="hidden" name="file" value="activate_deactivate_item/admin/admin.php"/>
			<input type="hidden" name="plugin_action" value="activate_deactivate_item_settings"/>

			<div class="form-row">
				<div class="form-label"><?php _e('Item Activate URL Rewrite Rule', 'activate_deactivate_item') ?></div>
				<div class="form-controls"><input type="text" class="xlarge" name="activate" placeholder="item/activate" value="<?php echo osc_esc_html( osc_get_preference('user_item_activate', 'activate-deactivate-item') ); ?>"></div>
			</div>

			<br/>

			<div class="form-row">
				<div class="form-label"><?php _e('Item Deactivate URL Rewrite Rule', 'activate_deactivate_item') ?></div>
				<div class="form-controls"><input type="text" class="xlarge" name="deactivate" placeholder="item/deactivate" value="<?php echo osc_esc_html( osc_get_preference('user_item_deactivate', 'activate-deactivate-item') ); ?>"></div>
			</div>

			<br/>
			<br/>

			<div>
				<button type="submit" class="btn btn-submit"><?php _e('Save Settings', 'activate_deactivate_item');?></button>
			</div>
		</form>

	</div>
</div>

<br/>

<!-- HELP -->

<div id="help_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<h2><?php _e('Activate-Deactivate Item Plugin Code', 'activate_deactivate_item');?></h2>

		<p>
			This is a generic code which will show a plain <strong>&lt;a href&gt;</strong> links inside your theme's <strong>USER DASHBOARD</strong> or <strong>ITEM PAGE</strong>. You have to replace string 'theme' with your's theme translation string name (e.g. 'bender', 'modern', 'paris').
		</p>

		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_enabled() && osc_item_is_active()) { ?&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-deactivate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Deactivate', 'theme'); ?&gt;&lt;/a&gt;
&lt;?php } elseif(osc_item_is_enabled() && osc_item_is_inactive()) { ?&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-activate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Activate', 'theme'); ?&gt;&lt;/a&gt;
&lt;?php } ?&gt;
</pre>
		</div>

		<p>
			<strong>IMPORTANT NOTES:</strong>
		</p>

		<p>
			1. When implementing the above code inside user dashboard / user items page(s), you must be careful to put it inside items loop code, so that each item has a proper set of Activate-Deactivate links.
		</p>

		<p>
			2. If you wish, you can also place Activate-Deactivate links directly on ITEM page, next or below factory built-in EDIT link
			(for example, this is the most logical place), but be careful to <strong>place it inside if condition check if user is logged-in and if item user ID is equal to logged-in user ID</strong> (if item belongs to the logged-in user).
			Of course, if you make a mistake nothing wrong would happen (plugin protection system will reject guests, visitors/viewers and non-owners), but it will be strange to have those links shown if item does not belong to the logged-in author.
			Usually, you will simply have to open item.php page and place the code below <strong>&lt;a href&gt;</strong> edit link. Please note that below instructions do not include ITEM page implementation (only USER DASHBOARD / USER ITEMS).
		</p>

	</div>
</div>

<br/>

<!-- BENDER THEME -->

<div id="help_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<h2><?php _e('Bender Theme Implementation', 'activate_deactivate_item');?></h2>

		<p>In Bender Theme 3.0+: locate lines 49~52 inside <strong>loop-single.php</strong> file:</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-bender-original-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p>And overwrite/replace it with new code specifically adjusted for Bender theme:</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-bender-new-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p><strong>Original code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_inactive()) {?&gt;
&lt;span&gt;|&lt;/span&gt;
&lt;a href="&lt;?php echo osc_item_activate_url();?&gt;" &gt;&lt;?php _e('Activate', 'bender'); ?&gt;</a>
&lt;?php } ?&gt;
</pre>
		</div>

		<p><strong>New code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_enabled() && osc_item_is_active()) { ?&gt;
	&lt;span&gt;|&lt;/span&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-deactivate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Deactivate', 'bender'); ?>&lt;/a&gt;
&lt;?php } elseif(osc_item_is_enabled() && osc_item_is_inactive()) { ?&gt;
	&lt;span&gt;|&lt;/span&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-activate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Activate', 'bender'); ?&gt;&lt;/a&gt;
&lt;?php } ?&gt;
</pre>
		</div>

	</div>
</div>

<br/>

<!-- MODERN THEME -->

<div id="help_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<h2><?php _e('Modern Theme Implementation', 'activate_deactivate_item');?></h2>

		<p>In Modern Theme 3.0+: locate lines 59-62 inside <strong>user-items.php</strong> and lines 55-58 inside <strong>user-dashboard.php</strong> files</p>
		<p>As you can notice, both code blocks are exactly the same, and almost identical to the code from Bender theme (except 'bender' and 'modern' translation strings). We will replace these blocks with new plugin code:</p>

		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-modern-original-code_user-items.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-modern-original-code_user-dashboard.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p>Overwrite/replace new codes in <strong>both</strong> files (it is exactly the same)</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-modern-new-code_user-items.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p><strong>Original code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_inactive()) {?&gt;
&lt;span&gt;|&lt;/span&gt;
&lt;a href="&lt;?php echo osc_item_activate_url();?&gt;" &gt;&lt;?php _e('Activate', 'modern'); ?&gt;</a>
&lt;?php } ?&gt;
</pre>
		</div>

		<p><strong>New code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_enabled() && osc_item_is_active()) { ?&gt;
	&lt;span&gt;|&lt;/span&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-deactivate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Deactivate', 'modern'); ?&gt;&lt;/a&gt;
&lt;?php } elseif(osc_item_is_enabled() && osc_item_is_inactive()) { ?&gt;
	&lt;span&gt;|&lt;/span&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-activate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Activate', 'modern'); ?&gt;&lt;/a&gt;
&lt;?php } ?&gt;
</pre>
		</div>

	</div>
</div>

<br/>

<!-- FLATTER THEME -->

<div id="help_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<h2><?php _e('Flatter Theme Implementation', 'activate_deactivate_item');?></h2>

		<p>In Flatter Theme locate lines ~ 37-39 inside <strong>loop-single.php</strong> file:</p>

		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-flatter-original-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p>Overwrite/replace it with new code specifically adjusted for Flatter theme:</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-flatter-new-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p><strong>Original code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_inactive()) {?&gt;
&lt;a href="&lt;?php echo osc_item_activate_url();?&gt;" &gt;&lt;i class="fa fa-check"&gt; &lt;?php _e('Activate', 'flatter'); ?&gt;&lt;/a&gt;
&lt;?php } ?&gt;
</pre>
		</div>

		<p><strong>New code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_enabled() && osc_item_is_active()) { ?&gt;
    &lt;a class="edit" style="background-color:#4EA8F0;" href="&lt;?php echo osc_route_url('route-user-item-deactivate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;i class="fa fa-power-off"&gt;&lt;/i&gt; &lt;?php _e('Deactivate', 'flatter'); ?&gt&lt;/a&gt;
&lt;?php } elseif(osc_item_is_enabled() && osc_item_is_inactive()) { ?&gt;
    &lt;a class="edit" style="background-color:#4EF07E;" href="&lt;?php echo osc_route_url('route-user-item-activate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;i class="fa fa-play-circle"&gt;&lt;/i&gt; &lt;?php _e('Activate', 'flatter'); ?&gt&lt;/a&gt;
&lt;?php } ?&gt;
</pre>
		</div>

	</div>
</div>

<br/>

<!-- OSCLASSWIZARDS THEME -->

<div id="help_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<h2><?php _e('OsclassWizards Theme Implementation', 'activate_deactivate_item');?></h2>

		<p>In OsclassWizards theme locate lines 177-181 inside <strong>loop-user-list.php</strong> and lines 178-182 inside <strong>loop-user-grid.php</strong> files:</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-oscwiz-original-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p>And overwrite/replace it with code (similar as for Bender theme)</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-oscwiz-new-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p><strong>Original code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_inactive()) {?&gt;
&lt;span&gt;|&lt;/span&gt;
&lt;a href="&lt;?php echo osc_item_activate_url();?&gt;" &gt;&lt;?php _e('Activate', 'osclasswizards'); ?&gt;</a>
&lt;?php } ?&gt;
</pre>
		</div>

		<p><strong>New code:</strong></p>
		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_enabled() && osc_item_is_active()) { ?&gt;
	&lt;span&gt;|&lt;/span&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-deactivate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Deactivate', 'osclasswizards'); ?>&lt;/a&gt;
&lt;?php } elseif(osc_item_is_enabled() && osc_item_is_inactive()) { ?&gt;
	&lt;span&gt;|&lt;/span&gt;
    &lt;a href="&lt;?php echo osc_route_url('route-user-item-activate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Activate', 'osclasswizards'); ?&gt;&lt;/a&gt;
&lt;?php } ?&gt;
</pre>

		</div>
	</div>
</div>

<br/>

<!-- SYMNEL THEME -->

<div id="help_form" style="border:1px solid #CCC; background:#FFF;">
	<div style="padding:20px;">

		<h2><?php _e('Symnel Theme Implementation', 'activate_deactivate_item');?></h2>

		<p>In Symnel theme insert plugin's code between lines 34 and 35 inside <strong>loop-single.php</strong> file:</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-symnel.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p>Inserted code:</p>
		<p><img src="<?php echo osc_base_url() . 'oc-content/plugins/activate_deactivate_item/screenshots/activate-deactivate-item-symnel-new-code.png'; ?>" style="max-width:95%; border:2px solid #676767; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" /></p>

		<p><strong>New code:</strong></p>

		<div style="width:100%; line-height:32px;">
<pre style="border:none; background-color:#DAF2F5; padding:5px 20px; white-space:pre; word-wrap:normal; word-break:initial; overflow-x:scroll;">
&lt;?php if(osc_item_is_enabled() && osc_item_is_active()) { ?&gt;
    &lt;li&gt;&lt;a href="&lt;?php echo osc_route_url('route-user-item-deactivate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Deactivate', 'symnel'); ?&gt;&lt;/a&gt;&lt;/li&gt;
&lt;?php } elseif(osc_item_is_enabled() && osc_item_is_inactive()) { ?&gt;
    &lt;li&gt;&lt;a href="&lt;?php echo osc_route_url('route-user-item-activate', array('itemId' =&gt; osc_item_id())); ?&gt;"&gt;&lt;?php _e('Activate', 'symnel'); ?&gt;&lt;/a&gt;&lt;/li&gt;
&lt;?php } ?&gt;
</pre>
		</div>

	</div>
</div>