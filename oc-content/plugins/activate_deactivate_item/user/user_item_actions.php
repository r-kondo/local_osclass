<?php
if (osc_is_web_user_logged_in()) {
	$route_arguments = Params::getParamsAsArray();
	$userId = osc_logged_user_id();
	$routeItemId = $route_arguments['itemId'];
	$itemData = Item::newInstance()->findByPrimaryKey($routeItemId);
	if (isset($itemData['fk_i_user_id']) && (osc_logged_user_id() == $itemData['fk_i_user_id'])) {
		if ($route_arguments['route'] == 'route-user-item-deactivate') {
			if (isset($itemData['b_active'])) {
				if ($itemData['b_active']) {
					ModelUserItemControl::newInstance()->UICdeactivateItem($userId,$routeItemId);
					if (osc_get_http_referer() != '') {
						header('Location: ' . osc_get_http_referer());
						osc_add_flash_ok_message(__('Your item has been deactivated', 'activate_deactivate_item'));
					} else {
						header('Location: ' . osc_user_list_items_url());
						osc_add_flash_ok_message(__('Your item has been deactivated', 'activate_deactivate_item'));
					}
				} else {
					header('Location: ' . osc_user_list_items_url());
					osc_add_flash_ok_message(__('Your item is already inactive', 'activate_deactivate_item'));
				}
			} else {
					header('Location: ' . osc_user_list_items_url());
			}
		} elseif ($route_arguments['route'] == 'route-user-item-activate') {
			if (isset($itemData['b_active'])) {
				if (!$itemData['b_active']) {
					ModelUserItemControl::newInstance()->UICactivateItem($userId,$routeItemId);
					if (osc_get_http_referer() != '') {
						header('Location: ' . osc_get_http_referer());
						osc_add_flash_ok_message(__('Your item has been activated', 'activate_deactivate_item'));
					} else {
						header('Location: ' . osc_user_list_items_url());
						osc_add_flash_ok_message(__('Your item has been activated', 'activate_deactivate_item'));
					}
				} else {
					header('Location: ' . osc_user_list_items_url());
					osc_add_flash_ok_message(__('Your item is already active', 'activate_deactivate_item'));
				}
			} else {
					header('Location: ' . osc_user_list_items_url());
			}
		}
	} else {
		header('Location: ' . osc_user_list_items_url());
	}
}
?>