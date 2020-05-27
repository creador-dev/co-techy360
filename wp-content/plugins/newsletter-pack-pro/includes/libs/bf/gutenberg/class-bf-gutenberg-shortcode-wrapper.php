<?php


class BF_Gutenberg_Shortcode_Wrapper {


	/**
	 * Store list of blocks for gutenberg.
	 *
	 * @var array
	 *
	 * @since 3.9.0
	 */
	protected static $gutenberg_blocks = array();


	/**
	 * Cache storage for gutenberg_blocks_attributes method
	 *
	 * @var array
	 */
	protected static $blocks_attributes = array();


	/**
	 * Cache storage for gutenberg_blocks_attributes method
	 *
	 * @var array
	 */
	protected static $additional_attributes = array();


	/**
	 * @since 3.9.1
	 * @return self
	 */
	public static function instance() {

		$instance = new self();
		$instance->init();

		return $instance;
	}


	/**
	 * Initialize
	 */
	public function init() {

		///
		/// Gutenberg Compatibility
		///
		//
		//add_action( 'init', array( $this, 'register_gutenberg_blocks' ) );

		add_action( 'admin_footer', array( $this, 'enqueue_gutenberg_scripts' ) );

		add_filter( 'block_categories', array( $this, 'register_custom_categories' ) );

		add_action( 'better-framework/fields/term-select-items', array( $this, 'render_term_select_items' ) );

		$this->early_load_all_shortcodes();

	}


	/**
	 * Enqueue gutenberg static dependencies.
	 *
	 * @since 3.9.0
	 * @return bool true when enqueue fired.
	 */
	public function enqueue_gutenberg_scripts() {

		if ( ! $this->is_gutenberg_active() ) {
			return false;
		}

		if ( function_exists( 'is_gutenberg_page' ) && ! is_gutenberg_page() ) {
			return false;
		}

		bf_enqueue_script( 'bf-gutenberg' );

		bf_localize_script(
			'bf-gutenberg',
			'BF_Gutenberg',
			array(

				'blocks'          => self::$gutenberg_blocks,
				'liveEdit'        => self::gutenberg_live_edit_templates(),
				'blockFields'     => self::gutenberg_blocks_fields(),
				'stickyFields'    => self::gutenberg_sticky_fields(),
				'extraAttributes' => self::$additional_attributes,
			)
		);

		return true;
	}


	/**
	 * Is gutenberg active?
	 *
	 * @since 3.9.0
	 * @return bool
	 */
	public static function is_gutenberg_active() {


		if (
			bf_is_block_render_request()
			||
			in_array( $GLOBALS['pagenow'], array( 'post.php', 'post-new.php' ) )
		) {

			if ( function_exists( 'disable_gutenberg' ) ) {

				return ! disable_gutenberg();
			}

			if ( class_exists( 'Classic_Editor' ) ) {

				return self::active_editor() === 'block';
			}

			return true;
		}

		return false;
	}


	/**
	 * Check default active editor in 'Classic Editor' plugin.
	 *
	 * @since 3.10.6
	 * @return string
	 */
	protected static function active_editor() {

		if ( ! class_exists( 'Classic_Editor' ) ) {
			return '';
		}

		$default_editor = get_option( 'classic-editor-replace' );

		if ( get_option( 'classic-editor-allow-users' ) === 'allow' ) {

			$user_options = get_user_option( 'classic-editor-settings' );

			if ( $user_options === 'block' || $user_options === 'classic' ) {

				$default_editor = $user_options;
			}
		}

		return $default_editor;
	}


	/**
	 * @param string $shortcode
	 * @param array  $settings
	 */
	public static function register( $shortcode, $settings = array() ) {

		$settings['id'] = $shortcode;

		if ( isset( $settings['category'] ) ) {
			$settings['category'] = self::sanitize_gutenberg_category( $settings['category'] );
		}

		self::$gutenberg_blocks[ $shortcode ] = $settings;

	}


	/**
	 * @return array
	 */
	public static function gutenberg_blocks_fields() {

		if ( ! class_exists( 'BF_Gutenberg_Fields_Transformer' ) ) {
			require BF_PATH . 'gutenberg/class-bf-gutenberg-fields-transformer.php';
		}

		return BF_Gutenberg_Fields_Transformer::instance()->prepare_blocks_fields(
			array_keys( self::$gutenberg_blocks )
		);
	}


	/**
	 * @return array
	 */
	public static function gutenberg_sticky_fields() {

		if ( ! class_exists( 'BF_Fields_To_Gutenberg' ) ) {
			require BF_PATH . 'gutenberg/class-bf-fields-to-gutenberg.php';
		}

		$fields = $stds = array();

		apply_filters_ref_array( 'better-framework/gutenberg/sticky-fields', array( &$fields ) );
		apply_filters_ref_array( 'better-framework/gutenberg/sticky-stds', array( &$stds ) );

		if ( empty( $fields ) ) {
			return array();
		}

		$converter = new BF_Fields_To_Gutenberg(
			$fields,
			$stds
		);

		self::$additional_attributes = array_merge(
			$converter->list_attributes(),
			self::$additional_attributes
		);

		return $converter->transform();
	}


	/**
	 * @return array
	 */
	public static function gutenberg_blocks_attributes() {

		if ( ! class_exists( 'BF_Gutenberg_Fields_Transformer' ) ) {
			require BF_PATH . 'gutenberg/class-bf-gutenberg-fields-transformer.php';
		}

		return BF_Gutenberg_Fields_Transformer::instance()->prepare_blocks_attributes(
			array_keys( self::$gutenberg_blocks )
		);
	}


	/**
	 * @return array
	 */
	public static function gutenberg_live_edit_templates() {

		if ( ! class_exists( 'BF_Gutenberg_Fields_Transformer' ) ) {
			require BF_PATH . 'gutenberg/class-bf-gutenberg-fields-transformer.php';
		}

		return BF_Gutenberg_Fields_Transformer::instance()->prepare_edit_templates(
			array_keys( self::$gutenberg_blocks )
		);
	}


	/**
	 * @param string $shortcode the shortcode unique ID
	 */
	public static function register_block( $shortcode ) {

		if ( ! self::is_gutenberg_active() ) {
			return;
		}

		$block_id = str_replace( '_', '-', $shortcode );
		$block_id = strtolower( $block_id ); // uppercase letters are not allowed

		if ( ! self::$blocks_attributes ) {

			self::$blocks_attributes = self::gutenberg_blocks_attributes();
		}

		if ( ! class_exists( 'BF_Gutenberg_Shortcode_Render' ) ) {

			require BF_PATH . 'gutenberg/class-bf-gutenberg-shortcode-render.php';
		}

		$render_callback = "BF_Gutenberg_Shortcode_Render::$shortcode";
		$attributes      = isset( self::$blocks_attributes[ $shortcode ] ) ? self::$blocks_attributes[ $shortcode ] : array();
		//

		if ( ! empty( $attributes ) ) {
			$attributes['className'] = array( 'type' => 'string' );
		}

		$args = array_filter( compact( 'render_callback', 'attributes' ) );

		register_block_type( "better-studio/$block_id", apply_filters( 'better-framework/gutenberg/block-type-args', $args, $shortcode ) );
	}


	/**
	 * @param array $categories
	 *
	 * @return array
	 */
	public function register_custom_categories( $categories ) {

		$pushed_categories = array();

		foreach ( $categories as $category ) {
			$pushed_categories[] = $category['slug'];
		}

		foreach ( self::$gutenberg_blocks as $block ) {

			if ( empty( $block['category'] ) ) {
				continue;
			}

			$title = $block['category'];
			$slug  = self::sanitize_gutenberg_category( $title );

			if ( ! in_array( $slug, $pushed_categories ) ) {

				array_push( $categories, compact( 'slug', 'title' ) );
				$pushed_categories[] = $slug;
			}
		}

		// Register default category

		if ( ! in_array( 'betterstudio', $pushed_categories ) ) {

			array_push( $categories, array(
				'slug'  => 'betterstudio',
				'title' => __( 'BetterStudio', 'better-studio' ),
			) );
		}

		return $categories;
	}


	/**
	 * @param string $category
	 *
	 * @return string
	 */
	public static function sanitize_gutenberg_category( $category ) {

		$slug = sanitize_title_with_dashes( trim( $category ) );

		if ( $slug === 'embeds' ) {

			return 'embed';
		}

		return $slug;
	}


	/**
	 *
	 */
	public function early_load_all_shortcodes() {

		if ( bf_is_block_render_request() ) {

			BF_Shortcodes_Manager::init_shortcodes( true );
		}
	}


	public function render_term_select_items( $items ) {

		if ( ! class_exists( 'BF_Term_Select' ) ) {
			require BF_PATH . '/core/field-generator/class-bf-term-select.php';
		}

		$results = array();

		foreach ( $items as $id => $item ) {

			if ( ! isset( $item['taxonomy'] ) ) {
				continue;
			}

			ob_start();

			wp_list_categories( array(
				'style'          => 'list',
				'title_li'       => false,
				'taxonomy'       => $item['taxonomy'],
				'walker'         => new BF_Term_Select,
				'selected_terms' => isset( $item['value'] ) ? $item['value'] : '',
				'input_name'     => isset( $item['input_name'] ) ? $item['input_name'] : 'bf-term-select',
				'hide_empty'     => false,
			) );

			$results[ $id ] = ob_get_contents();

			ob_end_clean();
		}

		wp_send_json_success( $results );
	}


	public function gutenberg_additional_attributes() {


	}
}
