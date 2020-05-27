<?php


class BF_Gutenberg_Shortcode_Render {

	public static function __callStatic( $shortcode_id, $arguments ) {

		$attrs   = &$arguments[0];
		$content = &$arguments[1];

		if ( ! $attrs ) {
			$attrs = array();
		}

		if ( ! is_array( $attrs ) ) {
			settype( $attrs, 'array' );
		}

		$rendered = BF_Shortcodes_Manager::handle_shortcodes( $attrs, $content, $shortcode_id );
		$rendered = trim( $rendered );

		if ( $rendered === '' || trim( strip_tags( html_entity_decode( $rendered ) ) ) === '' ) {

			return sprintf( '<h4 class="bf-gutenberg-shortocde-empty">[%1$s][/%1$s]</h4>', $shortcode_id );
		}

		return $rendered;
	}
}
