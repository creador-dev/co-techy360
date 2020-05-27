<?php


class WEP_TinyMce {

	/**
	 * Store self instance
	 *
	 * @var self
	 *
	 * @since 1.0.0
	 */
	protected static $instance;

	/**
	 * Get singleton instance object of self class
	 *
	 * @since 1.0.0
	 * @return self
	 */
	public static function instance() {

		if ( ! self::$instance instanceof self ) {

			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * @since 1.0.0
	 */
	public function init() {

		add_action( 'media_buttons', array( $this, 'append_button' ) );

		add_action( 'after_wp_tiny_mce', array( $this, 'print_templates' ) );
	}


	/**
	 * Print embed button.
	 *
	 * @param string $editor_id
	 *
	 * @since 1.0.0
	 */
	public function append_button( $editor_id = 'content' ) {

		/**
		 * FIXME: change button icon
		 *
		 * @assigned ali
		 */
		$img = '<span class="dashicons dashicons-welcome-add-page" style="vertical-align: text-bottom;"></span>';

		printf( '<button type="button" class="button wp-embedder-pack" data-editor="%s">%s %s</button>',
			esc_attr( $editor_id ),
			$img,
			__( 'Embed Document', 'wp-embedder-pack' )
		);
	}

	/**
	 * Print modal template
	 */
	public function print_templates() {

		static $printed;

		if ( $printed ) {
			return;
		}

		?>

		<script type="text/template" id="wp-embedder-pack-modal-template">
			<?php wep_view( 'embed-modal' ); ?>
		</script>


		<script type="text/template" id="wp-embedder-pack-shortcode-template">
			<?php wep_view( 'shortcode-modal' ); ?>
		</script>

		<script type="text/template" id="wp-embedder-pack-custom-url-template">
			<?php wep_view( 'custom-url' ); ?>
		</script>

		<?php

		$printed = TRUE;
	}
}


WEP_TinyMce::instance();
