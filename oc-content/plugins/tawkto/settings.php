<?php

/**
 * @package Tawk.to Widget for Joomla! 2.5
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

            $page_id = osc_get_preference(TawkTo_Settings::TAWK_PAGE_ID_VARIABLE, 'tawkto');
            $widget_id = osc_get_preference(TawkTo_Settings::TAWK_WIDGET_ID_VARIABLE, 'tawkto');
            $base_url = 'https://plugins.tawk.to';
            $iframe_url = $base_url . '/generic/widgets'
                . '?currentWidgetId=' . $widget_id
                . '&currentPageId=' . $page_id
                . '&transparentBackground=1';

?>



            

<iframe
	id="tawkIframe"
	src=""
	style="min-height: 400px; width : 100%; border: none; margin-top: 20px">
</iframe>

<script type="text/javascript">
	var currentHost = window.location.protocol + "//" + window.location.host;
	var url = "<?php echo $iframe_url ?>&parentDomain=" + currentHost;

	jQuery('#tawkIframe').attr('src', url);

	var iframe = jQuery('#tawk_widget_customization')[0];

	window.addEventListener('message', function(e) {
		if(e.origin === '<?php echo $base_url ?>') {

			if(e.data.action === 'setWidget') {
				setWidget(e);
			}

			if(e.data.action === 'removeWidget') {
				removeWidget(e);
			}
		}
	});

	function setWidget(e) {
		jQuery.post('<?php echo osc_ajax_hook_url('tawkto_action_setwidget'); ?>', {
			pageId : e.data.pageId,
			widgetId : e.data.widgetId
		}, function(r) {
			if(r.success) {
                            alert('All set');
				e.source.postMessage({action: 'setDone'}, '<?php echo $base_url ?>');
			} else {
                            alert('Error');
				e.source.postMessage({action: 'setFail'}, '<?php echo $base_url ?>');
			}

		});
	}

	function removeWidget(e) {
		jQuery.post('<?php echo osc_ajax_hook_url('tawkto_removewidget'); ?>',{}, function(r) {
			if(r.success) {
                            alert('All removed');
				e.source.postMessage({action: 'removeDone'}, '<?php echo $base_url ?>');
			} else {
                            alert('Error');
				e.source.postMessage({action: 'removeFail'}, '<?php echo $base_url ?>');
			}
		});
	}
</script>