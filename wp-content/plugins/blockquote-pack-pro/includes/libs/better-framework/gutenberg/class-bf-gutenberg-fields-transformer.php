<?php


class BF_Gutenberg_Fields_Transformer {

	public static function instance() {

		$instance = new self();
		$instance->init();

		return $instance;
	}


	/**
	 *
	 */
	public function init() {

		if ( is_admin() ) {
			add_action( 'better-framework/shortcodes/gutenberg-fields', array( $this, 'ajax_prepare_fields' ) );
		}
	}


	public function ajax_prepare_fields( $blocks ) {

		wp_send_json_success( $this->prepare_blocks_fields( $blocks ) );
	}


	/**
	 * @param array $blocks
	 *
	 * @return array
	 */
	public function prepare_blocks_fields( $blocks ) {

		$results = array();

		if ( ! class_exists( 'BF_Fields_To_Gutenberg' ) ) {
			require BF_PATH . 'gutenberg/class-bf-fields-to-gutenberg.php';
		}

		foreach ( $blocks as $block ) {

			if ( ! $shortcode = BF_Shortcodes_Manager::factory( $block, array(), true ) ) {
				continue;
			}

			if ( ! $block_fields = $shortcode->get_fields() ) {
				continue;
			}
			$converter = new BF_Fields_To_Gutenberg(
				$block_fields,
				$shortcode->defaults
			);

			$results[ $block ] = $converter->transform();
		}

		return $results;
	}


	/**
	 * @param array $blocks
	 *
	 * @return array
	 */
	public function prepare_blocks_attributes( $blocks ) {

		$results = array();

		if ( ! class_exists( 'BF_Fields_To_Gutenberg' ) ) {
			require BF_PATH . 'gutenberg/class-bf-fields-to-gutenberg.php';
		}

		foreach ( $blocks as $block ) {

			if ( ! $shortcode = BF_Shortcodes_Manager::factory( $block, array(), true ) ) {
				continue;
			}

			if ( ! $block_fields = $shortcode->get_fields() ) {
				continue;
			}

			$converter = new BF_Fields_To_Gutenberg(
				$block_fields
			);
			$fields    = $converter->list_attributes();

			$results[ $block ] = $fields;
		}

		return $results;
	}

	/**
	 * @param array $blocks
	 *
	 * @return array
	 */
	public function prepare_edit_templates( $blocks ) {

		if ( ! class_exists( 'BF_HTML_To_React' ) ) {
			require BF_PATH . 'gutenberg/class-bf-html-to-react.php';
		}

		$converter = new BF_HTML_To_React();

		$results   = array();
		$templates = array();

		foreach ( $blocks as $block ) {

			if ( ! $shortcode = BF_Shortcodes_Manager::factory( $block, array(), true ) ) {
				continue;
			}

			if ( $attrs = $shortcode->gutenberg_attributes() ) {
				$results[ $block ]['attributes'] = $attrs;
			}

			if ( $template = $shortcode->gutenberg_live_edit() ) {
				$results[ $block ]['template'] = $converter->transform( $template );
			}
		}

		return $results;
	}
}
