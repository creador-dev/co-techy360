<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( ! function_exists( 'publisher_meta_tag' ) ) {
	/**
	 * Outputs an HTML meta tag.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $prop    Meta itemprop value
	 * @param   string $content Default meta content value
	 *
	 * @return void
	 */
	function publisher_meta_tag( $prop, $content = '' ) {
		echo publisher_get_meta_tag( $prop, $content ); // escaped before
	}
}


if ( ! function_exists( 'publisher_get_meta_tag' ) ) {
	/**
	 * Gets an HTML meta tag.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $prop    Meta itemprop value
	 * @param   string $content Default meta content value
	 *
	 * @return string
	 */
	function publisher_get_meta_tag( $prop, $content = '' ) {

		$_check = array(
			'headline'    => '',
			'url'         => '',
			'date'        => '',
			'image'       => '',
			'author'      => '',
			'comments'    => '',
			'description' => '',
			'name'        => '',
			'date_upload' => '',
		);

		if ( $prop == 'full' ) {

			$list = array(
				'headline' => 'headline',
				'url'      => 'url',
				'date'     => 'date',
				'image'    => 'image',
				'author'   => 'author',
				'comments' => 'comments',
			);

			switch ( publisher_get_post_format() ) {

				case 'video':
					unset( $list['headline'] );
					$list[] = 'name';

					$list[] = 'description';
					$list[] = 'date_upload';
					break;

			}

			foreach ( $list as $item ) {
				publisher_meta_tag( $item, '' );
			}

		} elseif ( isset( $_check[ $prop ] ) ) {

			$output = '';

			$attr = apply_filters( "publisher_meta_tag_{$prop}", $content );

			// exception for empty data, ex when there is no featured image
			if ( isset( $attr['empty'] ) ) {
				return '';
			}

			if ( empty( $attr ) ) {
				$attr['itemprop'] = $prop;
				$attr['content']  = $content;
			}

			foreach ( $attr as $name => $value ) {
				$output .= $value != '' ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
			}

			return '<meta ' . trim( $output ) . ' />';

		} else {

			$output = '';

			$attr['itemprop'] = $prop;
			$attr['content']  = $content;

			foreach ( $attr as $name => $value ) {

				$output .= ! empty( $value ) ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );

			}

			return '<meta ' . trim( $output ) . ' />';

		}

	} // publisher_get_meta_tag
}
