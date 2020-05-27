<?php


/**
 * List of quote styles used as BF field callback
 *
 * @param bool $default
 *
 * @return array
 */
function bs_smart_lists_pack_styles_option( $default = FALSE ) {

	$version = BS_Smart_Lists_Pack_Pro::$version;

	$option = array();

	if ( $default ) {
		$option['default'] = array(
			'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-' . BS_Smart_Lists_Pack_Pro::get_option( 'list-style' ) . '.png?v=' . $version ),
			'label' => __( 'Default Style', 'better-studio' ),
		);
	}

	$option['style-1'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-1.png?v=' . $version ),
		'label' => __( 'Style 1', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-2'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-2.png?v=' . $version ),
		'label' => __( 'Style 2', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-3'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-3.png?v=' . $version ),
		'label' => __( 'Style 3', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-4'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-4.png?v=' . $version ),
		'label' => __( 'Style 4', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-5'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-5.png?v=' . $version ),
		'label' => __( 'Style 5', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-6'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-6.png?v=' . $version ),
		'label' => __( 'Style 6', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-7'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-7.png?v=' . $version ),
		'label' => __( 'Style 7', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-8'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-8.png?v=' . $version ),
		'label' => __( 'Style 8', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-9'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-9.png?v=' . $version ),
		'label' => __( 'Style 9', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-10'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-10.png?v=' . $version ),
		'label' => __( 'Style 10', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-11'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-11.png?v=' . $version ),
		'label' => __( 'Style 11', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-12'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-12.png?v=' . $version ),
		'label' => __( 'Style 12', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Scroll', 'better-studio' ),
			),
		),
	);

	$option['style-13'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-13.png?v=' . $version ),
		'label' => __( 'Style 13', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Static Paged', 'better-studio' ),
			),
		),
	);

	$option['style-14'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-14.png?v=' . $version ),
		'label' => __( 'Style 14', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Static Paged', 'better-studio' ),
			),
		),
	);

	$option['style-15'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-15.png?v=' . $version ),
		'label' => __( 'Style 15', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-16'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-16.png?v=' . $version ),
		'label' => __( 'Style 16', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Static Paged', 'better-studio' ),
			),
		),
	);

	$option['style-17'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-17.png?v=' . $version ),
		'label' => __( 'Style 17', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Static Paged', 'better-studio' ),
			),
		),
	);

	$option['style-18'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-18.png?v=' . $version ),
		'label' => __( 'Style 18', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	$option['style-19'] = array(
		'img'    => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-19.png?v=' . $version ),
		'label'  => __( 'Style 19', 'better-studio' ),
		'info'   => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
		'badges' => array(
			'Long Image',
		),
	);

	$option['style-20'] = array(
		'img'   => BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/list-style-20.png?v=' . $version ),
		'label' => __( 'Style 20', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Slider', 'better-studio' ),
			),
		),
	);

	return $option;
} // bs_smart_lists_pack_styles_option


/**
 * Handy function to increase or decrease item number based on current order
 *
 * @param int    $current
 * @param int    $max
 * @param string $order
 *
 * @return int
 */
function bs_smart_lists_get_current_item_number( $current = 0, $max = 0, $order = 'asc' ) {

	if ( $order === 'asc' ) {

		if ( $current < $max ) {
			$current ++;
		}
	} else {

		if ( $current === 0 ) {
			$current = $max;
		} else {
			$current --;
		}
	}

	return $current;
}


/**
 * Handy function to get image size of list item
 *
 * @param        $item
 * @param string $size
 *
 * @return string
 */
function bs_smart_lists_get_item_image_src( $item, $size = 'default' ) {

	if ( empty( $item['image_id'] ) || $size === 'default' ) {
		return $item['image_src'];
	} else {

		$src = wp_get_attachment_image_src( $item['image_id'], $size );

		// default src
		if ( ! $src ) {
			return $item['image_src'];
		}

		return $src[0];
	}
}
