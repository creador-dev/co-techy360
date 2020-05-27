<?php


if ( ! function_exists( 'publisher_lazy_load_image_sizes' ) ) {
	/**
	 * Get image alternative sizes
	 *
	 * @since 1.8.0
	 *
	 * @return array
	 */
	function publisher_lazy_load_image_sizes() {

		return array(
			// Rectangle sizes
			'publisher-tb1'      => array(
				'publisher-sm',
			),
			'publisher-sm'       => array(
				'publisher-tb1',
				'publisher-md',
				'publisher-mg2',
				'publisher-lg',
			),
			'publisher-mg2'      => array(
				'publisher-sm',
				'publisher-mg2',
				'publisher-md',
				'publisher-lg',
			),
			'publisher-md'       => array(
				'publisher-sm',
				'publisher-mg2',
				'publisher-lg',
			),
			'publisher-lg'       => array(
				'publisher-sm',
				'publisher-mg2',
				'publisher-md',
				'publisher-lg',
			),
			// Tall sizes
			'publisher-tall-sm'  => array(
				'publisher-tall-lg',
				'publisher-tall-big',
			),
			'publisher-tall-lg'  => array(
				'publisher-tall-sm',
				'publisher-tall-big',
			),
			'publisher-tall-big' => array(
				'publisher-tall-sm',
				'publisher-tall-lg',
			),
		);
	}
}
