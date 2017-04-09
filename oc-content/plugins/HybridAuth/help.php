<div style="padding: 20px;">
    <h2 class="render-title"><?php _e('Help / FAQ', 'MathCaptcha'); ?></h2>
	
	<div class="google">
		<h2 class="render-title separate-top">Google User guide</h2>
		<ul class="hybridauth-guide">
			<li>
			Go to <a href="https://code.google.com/apis/console/" target="_blank">https://code.google.com/apis/console/</a> and create a new project.
			</li>
			<li>
			Go to <strong>API Access</strong> under <strong>API Project</strong>. After that click on <strong>Create an OAuth 2.0 client ID</strong> to <strong>create a new application</strong>.
			</li>
			<li>
			A pop-up named <strong>"Create Client ID"</strong> will appear, fill out any required fields such as the application name and description.
			</li>
			<li>
			Click on <strong>Next</strong>.
			</li>
			<li>
			On the popup set <strong>Application type</strong> to <strong>Web application</strong> and switch to advanced settings by clicking on <strong>(more options)</strong>.
			</li>
			<li>
			Provide this URL as the Callback URL for your application: <span style="color:green"><?php echo osc_base_url(true).'?endpoint=true&hauth.done=Google'; ?></span>
			</li>
			<li>
			Once you have registered, copy and past the created application credentials (Client ID and Secret) into the HybridAuth OSclass plugin.
			</li>
		</ul>
		</strong>Note:</strong> enable Google+ and Contacts API in the APIs google console.
	</div>
	
	<div class="facebook">
		<h2 class="render-title separate-top">Facebook User guide</h2>
		<ul class="hybridauth-guide">
            <li>
              Go to <a href="https://developers.facebook.com/apps" target="_blank">https://developers.facebook.com/apps</a> and <strong>create a new application</strong> by clicking "Create New App".
            </li>
            <li>
              Fill out any required fields such as the application name and description.
            </li>
            <li>
              Put your website domain in the <strong>Site Url</strong> field.
            </li>
            <li>
              Once you have registered, copy and past the created application credentials (App ID and Secret) into the HybridAuth OSclass plugin.
            </li>
          </ul>
	</div>

	<div class="twitter">
		<h2 class="render-title separate-top">Twitter User guide</h2>
		<ul class="hybridauth-guide">
            <li>
              Go to <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a> and <strong>create a new application</strong>.
            </li>
            <li>
              Fill out any required fields such as the application name and description.
            </li>
            <li>
              Put your website domain in the <strong>Website</strong> field.
            </li>
            <li>
				Provide this URL as the Callback URL for your application: <span style="color:green"><?php echo osc_base_url(true).'?endpoint=true&hauth.done=Twitter'; ?></span>
			</li>
            <li>
              Once you have registered, copy and past the created application credentials (Consumer Key and Secret) into the HybridAuth OSclass plugin.
            </li>
		</ul>
	</div>
	  
	 <div class="function-placement">
		<h2 class="render-title separate-top">Function Placement</h2>
            Place the functions on both user-register.php, user-login.php at the end of the form tag.
			<pre>&lt;?php if (function_exists('HybridAuth_Login')) { HybridAuth_Login(); } ?&gt;</pre>
	  </div>
</div>
<style>
	.hybridauth-guide li{
		line-height: 22px;
		padding: 5px 0;
	}
	.hybridauth-guide{
		list-style: decimal
	}
</style>