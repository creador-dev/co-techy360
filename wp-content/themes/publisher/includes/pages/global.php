<?php

add_filter( 'better-framework/product-pages/register-product/auth', 'publisher_bs_register_product_params' );
add_filter( 'better-framework/oculus/request/auth', 'publisher_bs_register_product_params' );
/**
 * @see \bf_register_product_get_info
 *
 * @return array
 */
function publisher_bs_register_product_params() {

	$item_id = Publisher_Setup::item_id;
	$version = Better_Framework()->theme( true )->get( 'Version' );
	//
	$option_name   = sprintf( '%s-register-info', $item_id );
	$data          = get_option( $option_name );
	$purchase_code = isset( $data['purchase_code'] ) ? $data['purchase_code'] : '';
	//
	$product_type   = 'theme';
	$product_folder = 'publisher';
	$active_theme   = true;

	return compact( 'item_id', 'version', 'purchase_code', 'product_type', 'product_folder', 'active_theme' );
}
