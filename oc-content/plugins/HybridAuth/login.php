<div class="hybrid_login">
	<?php 
		echo (osc_get_preference('GoogleEnabled', 'HybridAuth'))? HybridAuthClass::newInstance()->googleurl():'';
		echo (osc_get_preference('FacebookEnabled', 'HybridAuth'))? HybridAuthClass::newInstance()->facebookurl():'';
		echo (osc_get_preference('TwitterEnabled', 'HybridAuth'))? HybridAuthClass::newInstance()->twitterurl():'';
	?>
</div>