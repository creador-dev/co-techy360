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


include Publisher_Theme_Core()->get_dir_path( 'post-fields/functions.php' ); // Will return full path

Publisher_Theme_Post_Fields::Run();

/**
 * Publisher Post Advanced Fields
 *
 * @package  Publisher Post Fields
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.0.0
 * @access   public
 * @see      http://betterstudio.com
 */
class Publisher_Theme_Post_Fields {

	/**
	 * Subtitle field
	 *
	 * @var string
	 */
	public $subtitle = true;


	/**
	 * Subtitle meta ID
	 *
	 * @var string
	 */
	public $subtitle_meta_id = 'bs_subtitle';


	/**
	 * Subtitle default value
	 *
	 * @var string
	 */
	public $subtitle_default = '';


	/**
	 * Excerpt movement is active
	 *
	 * @var string
	 */
	public $excerpt = true;


	/**
	 * Contains alive instance of class
	 *
	 * @var  self
	 */
	protected static $instance;


	/**
	 * [ create and ] Returns life version
	 *
	 * @return \Publisher_Theme_Post_Fields
	 */
	public static function Run() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * Initialize base
	 */
	public function __construct() {

		// Performs the BF setup
		add_action( 'better-framework/after_setup', array( $this, 'theme_init' ), 1000 );

	}


	/**
	 * Get configs after BF
	 */
	function theme_init() {

		static $loaded;

		if ( $loaded ) {
			return;
		} else {
			$loaded = true;
		}

		$config = apply_filters( 'publisher-theme-core/post-fields/config', array(
			'subtitle'         => $this->subtitle,
			'subtitle-meta-id' => $this->subtitle_meta_id,
			'subtitle-default' => $this->subtitle_default,
			'excerpt'          => $this->excerpt,
		) );

		$this->subtitle = isset( $config['subtitle'] ) ? $config['subtitle'] : $this->subtitle;

		$this->subtitle_meta_id = isset( $config['subtitle-meta-id'] ) ? $config['subtitle-meta-id'] : $this->subtitle_meta_id;

		$this->subtitle_default = isset( $config['subtitle-default'] ) ? $config['subtitle-default'] : $this->subtitle_default;

		$this->excerpt = isset( $config['excerpt'] ) ? $config['excerpt'] : $this->excerpt;

		// Compatibility for third party plugins with same functionality
		if ( $this->subtitle ) {
			$this->other_plugin_compatibility();
		}

		if ( $this->subtitle ) {

			// Add subtitle support to posts
			add_post_type_support( 'post', 'bs_subtitle' );

		}

		if ( ( is_admin() && ! bf_is_doing_ajax() ) && ( $this->subtitle || $this->excerpt ) ) {
			add_action( 'admin_init', array( $this, 'admin_init' ) );
		}

	} // theme_init


	/**
	 * Makes BS subtitle feature compatible with WP Subtitle plugin.
	 */
	function other_plugin_compatibility() {

		if ( ! class_exists( 'WPSubtitle' ) ) {
			return;
		}

		/**
		 * "WP Subtitle" plugin compatibility.
		 * https://wordpress.org/plugins/wp-subtitle/
		 *
		 * the backend field will be removed and the meta id will be used as fallback check in showing data!
		 */
		remove_action( 'admin_init', array( 'WPSubtitle_Admin', '_admin_init' ), 10 );
		remove_action( 'save_post', array( 'WPSubtitle_Admin', '_save_post' ), 10 );
		remove_action( 'admin_enqueue_scripts', array( 'WPSubtitle_Admin', '_add_admin_scripts' ), 10 );

	}


	/**
	 * Get all subtitle supported post types
	 *
	 * @param string $feature
	 *
	 * @return array
	 */
	function get_supported_post_types( $feature = '' ) {

		if ( empty( $feature ) ) {
			return array();
		}

		static $supported;

		if ( is_null( $supported ) ) {
			$supported = array();
		} elseif ( isset( $supported[ $feature ] ) ) {
			return $supported[ $feature ];
		}

		$supported[ $feature ] = array();

		// all post types
		$post_types = (array) get_post_types( array(
			'_builtin' => false
		) );

		// posts is supported by default
		$post_types['post'] = 'post';

		foreach ( $post_types as $post_type ) {
			if ( post_type_supports( $post_type, $feature ) ) {
				$supported[ $feature ][ $post_type ] = $post_type;
			}
		}

		return $supported;
	}


	/**
	 * Is supported post type
	 *
	 * @param string $post_type
	 * @param string $feature
	 *
	 * @return bool
	 */
	public function is_supported_post_type( $post_type = '', $feature = '' ) {

		if ( empty( $post_type ) ) {
			return false;
		}

		$post_types = $this->get_supported_post_types( $feature );

		return isset( $post_types[ $post_type ] );
	}


	/**
	 * Admin Init
	 */
	public function admin_init() {

		$post_type = bf_get_admin_current_post_type();

		if ( is_null( $post_type ) ) {
			return;
		}

		if (
			! ( $this->subtitle && ! $this->is_supported_post_type( $post_type, 'bs_subtitle' ) ) &&
			! ( $this->excerpt && ! $this->is_supported_post_type( $post_type, 'excerpt' ) )
		) {
			return;
		}

		// Add top fields
		add_action( 'edit_form_after_title', array( $this, 'add_post_top_fields' ) );

		// Pre-save and save for post fields
		add_filter( 'wp_insert_post_data', array( $this, 'before_save_post' ), 1, 2 );
		add_action( 'save_post', array( $this, 'save_post' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ), 99 );

		global $pagenow;

		// Callback for adding page custom classes
		if ( $pagenow === 'post-new.php' || $pagenow === 'post.php' ) {
			add_filter( 'admin_body_class', array( $this, 'admin_body_class' ), 999 );
		}
	}


	/**
	 * Callback: Used for adding page custom classes to admin body
	 *
	 * @since   2.0
	 *
	 * @param $classes
	 *
	 * @return string
	 */
	function admin_body_class( $classes ) {

		$custom_class = '';

		if ( $this->subtitle ) {
			$custom_class .= ' publisher-field-subtitle ';
		}

		if ( $this->excerpt ) {
			$custom_class .= ' publisher-field-excerpt ';
		}

		if ( empty( $custom_class ) ) {
			return $classes;
		} else {
			return $classes . ' publisher-fields-page' . $custom_class;
		}
	}


	/**
	 * Styles and scripts
	 */
	function add_admin_scripts() {

		wp_enqueue_style( 'bs-post-fields',
			Publisher_Theme_Core()->get_dir_url( 'post-fields/assets/css/bs-post-fields.css' ),
			array(),
			Publisher_Theme_Core()->get_version()
		);

		wp_enqueue_script( 'bs-post-fields',
			Publisher_Theme_Core()->get_dir_url( 'post-fields/assets/js/bs-post-fields.js' ),
			array(),
			Publisher_Theme_Core()->get_version()
		);

	}


	/**
	 * Adds post top advanced fields
	 */
	public function add_post_top_fields() {

		global $post;

		?>
		<div class="bs-post-fields bs-post-top-fields">
			<input type="hidden" name="publisher_post_fields_nonce" id="publisher_post_fields_nonce"
			       value="<?php echo wp_create_nonce( 'publisher-post-fields-nonce' ); ?>"/>
			<?php

			if ( $this->subtitle && post_type_supports( $post->post_type, 'bs_subtitle' ) ) {

				$subtitle = bf_get_post_meta( $this->subtitle_meta_id, NULL, '' );

				// Fallback for "WP Subtitle" plugin field
				if ( empty( $subtitle ) ) {
					$subtitle = bf_get_post_meta( 'wps_subtitle', NULL, '' );
				}

				?>
				<div class="post-subtitle-field">
					<textarea name="bs-post-subtitle" autocomplete="off"
					          placeholder="<?php echo esc_attr( __( 'Enter subtitle here...', 'publisher' ) ); ?>"><?php echo $subtitle; ?></textarea>
				</div>
				<?php
			}

			if ( $this->excerpt && post_type_supports( $post->post_type, 'excerpt' ) ) {
				?>
				<div class="post-excerpt-field">
					<textarea placeholder="<?php echo esc_attr( __( 'Enter excerpt here...', 'publisher' ) ); ?>"
					          type="text" name="bs-post-excerpt"><?php echo $post->post_excerpt ?></textarea>
				</div>
				<?php
			}

			?>
		</div>
		<?php

	}


	/**
	 * Save subtitle
	 *
	 * @param  int $post_id
	 */
	public function save_post( $post_id ) {

		// detect autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// security
		if ( ! isset( $_POST['publisher_post_fields_nonce'] ) ||
		     ! wp_verify_nonce( $_POST['publisher_post_fields_nonce'], 'publisher-post-fields-nonce' ) ||
		     ! $this->current_user_can_edit( $post_id )
		) {
			return;
		}

		// subtitle field
		if ( isset( $_POST['bs-post-subtitle'] ) ) {
			update_post_meta( $post_id, $this->subtitle_meta_id, $_POST['bs-post-subtitle'] );

			// save fallback for "WP Subtitle" to not be theme lock!
			update_post_meta( $post_id, 'wps_subtitle', $_POST['bs-post-subtitle'] );
		}
	}


	/**
	 * Move excerpt to post excerpt befor post save!
	 *
	 * @param $post_data
	 * @param $post_attr
	 *
	 * @return array
	 */
	public function before_save_post( $post_data, $post_attr ) {

		// detect autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_data;
		}

		// security
		if ( ! isset( $_POST['publisher_post_fields_nonce'] ) ||
		     ! wp_verify_nonce( $_POST['publisher_post_fields_nonce'], 'publisher-post-fields-nonce' ) ||
		     ! $this->current_user_can_edit( $post_attr['ID'], $post_data['post_type'] )
		) {
			return $post_data;
		}

		// Post type supports excerpt
		if ( ! $this->excerpt && ! post_type_supports( $post_data['post_type'], 'excerpt' ) ) {
			return $post_data;
		}

		// Save lead into excerpt
		if ( isset( $post_attr['bs-post-excerpt'] ) ) {
			$post_data['post_excerpt'] = $post_attr['bs-post-excerpt'];
			unset( $post_attr['bs-post-excerpt'] );
		}

		return $post_data;
	}


	/**
	 * Checks user permission for edititng post type
	 *
	 * @param        $post_id
	 * @param string $post_type
	 *
	 * @return bool
	 */
	public function current_user_can_edit( $post_id, $post_type = '' ) {

		if ( empty( $post_type ) ) {
			$post_type = get_post_type( $post_id );
		}

		switch ( $post_type ) {

			case 'page':
				return current_user_can( 'edit_page', $post_id );

			case 'post':
				return current_user_can( 'edit_post', $post_id );

			default:

				// All post types
				$post_types = (array) get_post_types(
					array(),
					'objects'
				);

				return isset( $post_types[ $post_type ]->cap->edit_post ) &&
				       current_user_can( $post_types[ $post_type ]->cap->edit_post, $post_id );

		}

	} // current_user_can_edit

}
