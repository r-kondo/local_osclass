<?php

if (!class_exists('anr_captcha_class'))
{
  class anr_captcha_class
  {
 	private static $instance;
	
	private static $captcha_count = 0;
	
	public static function init()
        {
            if(!self::$instance instanceof self) {
                self::$instance = new self;
            }
            return self::$instance;
        }
		
	function total_captcha()
	{
		return self::$captcha_count;
	}
	
	function captcha_form_field()
	{
		self::$captcha_count++;
		
		$no_js		= anr_get_option( 'no_js' );
		$site_key 	= trim(anr_get_option( 'site_key' ));
		$number 	= $this->total_captcha();
		
		$field = '<div id="anr_captcha_field_' . $number . '"></div>';
		
		if ( 1 == $no_js )
			{
			$field .='<noscript>
						  <div>
							<div style="width: 302px; height: 422px; position: relative;">
							  <div style="width: 302px; height: 422px; position: absolute;">
								<iframe src="https://www.google.com/recaptcha/api/fallback?k='. $site_key .'"
										frameborder="0" scrolling="no"
										style="width: 302px; height:422px; border-style: none;">
								</iframe>
							  </div>
							</div>
							<div style="width: 300px; height: 60px; border-style: none;
										   bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px;
										   background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
							  <textarea id="g-recaptcha-response-'.$number.'" name="g-recaptcha-response"
										   class="g-recaptcha-response"
										   style="width: 250px; height: 40px; border: 1px solid #c1c1c1;
												  margin: 10px 25px; padding: 0px; resize: none;" ></textarea>
							</div>
						  </div>
						</noscript>';
				}
				
			return $field;
	}
	
	function footer_script()
	{
		$number = $this->total_captcha();
		static $included = false;
		
		if ( !$number )
			return;
			
		if ( $included )
			return;
		
		$included = true;
		
			$site_key 	= trim(anr_get_option( 'site_key' ));
			$theme		= anr_get_option( 'theme', 'light' );
			$size		= anr_get_option( 'size', 'normal' );
			$language	= trim(anr_get_option( 'language' ));
		
				$lang	= "";
				if ( $language )
					$lang = "&hl=$language";
		
		?>
	<script type="text/javascript">
      var anr_onloadCallback = function() {
	  <?php for ( $num = 1; $num <= $number; $num++ ) { ?>
				var anr_captcha_<?php echo $num; ?>;
				anr_captcha_<?php echo $num; ?> = grecaptcha.render('anr_captcha_field_<?php echo $num; ?>', {
				  'sitekey' : '<?php echo osc_esc_js( $site_key ); ?>',
				  'theme' : '<?php echo osc_esc_js( $theme ); ?>',
				  'size' : '<?php echo osc_esc_js( $size ); ?>'
				});
		<?php } ?>
      };
    </script>
	<script src="https://www.google.com/recaptcha/api.js?onload=anr_onloadCallback&render=explicit<?php echo osc_esc_js( $lang ); ?>"
        async defer>
    </script>

		<?php 

	}	
	
  } //END CLASS
} //ENDIF


