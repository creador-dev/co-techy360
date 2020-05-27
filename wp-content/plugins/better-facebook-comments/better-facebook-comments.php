<?php
/*
Plugin Name: Better Facebook Comments
Plugin URI: http://betterstudio.com
Description: Take advantage of powerful and unique features by integrating Facebook comments on your website instead of the standard WordPress commenting system.
Version: 1.5.3
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/

// TODO: sync comments on page when new comment was added

/**
 * Better_Facebook_Comments class wrapper for make changes safe in future
 *
 * @return Better_Facebook_Comments
 */
function Better_Facebook_Comments() {

	return Better_Facebook_Comments::self();
}


// Initialize Better Facebook Comments
Better_Facebook_Comments();


/**
 * Class Better_Facebook_Comments
 */
class Better_Facebook_Comments {


	/**
	 * Contains Better_Facebook_Comments version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	private static $version = '1.5.3';


	/**
	 * Contains plugin option panel ID
	 *
	 * @var string
	 */
	private static $panel_id = 'better_facebook_comments';


	/**
	 * Comments loading type: ajaxified|plain
	 *
	 * @var string
	 */
	private $comments_type;

	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	function __construct() {

		// make sure following code only one time run
		static $initialized;
		if ( $initialized ) {
			return;
		} else {
			$initialized = TRUE;
		}

		// Admin panel options
		include self::dir_path( 'includes/options/panel.php' );

		// Initialize
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		load_plugin_textdomain( 'better-studio', FALSE, 'better-facebook-comments/languages' );

	}


	/**
	 * Used for accessing plugin directory URL
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_url( $address = '' ) {

		static $url;

		if ( is_null( $url ) ) {
			$url = plugin_dir_url( __FILE__ );
		}

		return $url . $address;
	}


	/**
	 * Used for accessing plugin directory path
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_path( $address = '' ) {

		static $path;

		if ( is_null( $path ) ) {
			$path = plugin_dir_path( __FILE__ );
		}

		return $path . $address;
	}


	/**
	 * Returns plugin current Version
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;

	}


	/**
	 * Build the required object instance
	 *
	 * @param   string $object
	 * @param   bool   $fresh
	 * @param   bool   $just_include
	 *
	 * @return  Better_Facebook_Comments|null
	 */
	public static function factory( $object = 'self', $fresh = FALSE, $just_include = FALSE ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Better_Facebook_Comments Class
			 */
			case 'self':
				$class = 'Better_Facebook_Comments';
				break;

			default:
				return NULL;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return;
		}

		// don't cache fresh objects
		if ( $fresh ) {
			return new $class;
		}

		self::$instances[ $object ] = new $class;

		return self::$instances[ $object ];
	}


	/**
	 * Used for accessing alive instance of Better_Facebook_Comments
	 *
	 * @since 1.0
	 *
	 * @return Better_Facebook_Comments
	 */
	public static function self() {

		return self::factory();

	}


	/**
	 * Used for retrieving options simply and safely for next versions
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	public static function get_option( $option_key ) {

		return bf_get_option( $option_key, self::$panel_id );
	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		if ( is_admin() && ! apply_filters( 'better-facebook-comments/allow-multiple', FALSE ) ) {

			if ( $this->get_option( 'app_id' ) && function_exists( 'Better_Disqus_Comments' ) && Better_Disqus_Comments()->get_option( 'shortname' ) ) {
				Better_Framework()->admin_notices()->add_notice( array(
					'id'  => 'facebook-and-disqus-same-time',
					'msg' => __( 'You activated both <strong>Facebook Comments</strong> and <strong>Disqus Comments</strong>. Please ensure that only one comment plugin is active at a time.', 'better-studio' )
				) );
			} else {
				Better_Framework()->admin_notices()->remove_notice( 'facebook-and-disqus-same-time' );
			}
		}

		if ( $this->get_option( 'app_id' ) === '' ) {
			return;
		}

		// Add ajax action to do views increment
		add_action( 'wp_ajax_clear_better_facebook_comments', array( $this, 'clear_comments_cache' ) );
		add_action( 'wp_ajax_nopriv_clear_better_facebook_comments', array( $this, 'clear_comments_cache' ) );

		// Change default template
		if ( apply_filters( 'better-facebook-comments/override-template', TRUE ) ) {
			add_filter( 'comments_template', array( $this, 'custom_comments_template' ), 40 );

			if ( ! is_admin() ) {
				// Add App ID Meta
				add_action( 'wp_head', array( $this, 'wp_head' ) );

				// Clear themes comments count text in meta
				add_filter( 'better-studio/themes/meta/comments/text', array(
					$this,
					'better_studio_themes_comment_text'
				) );

				// Add JS
				add_action( 'wp_footer', array( $this, 'wp_footer' ) );

			}
		}

		add_filter( 'get_comments_number', array( $this, 'filter_get_comments_number' ), 10, 2 );

	}


	/**
	 * Creates script for comments loading
	 *
	 * @return mixed|string
	 */
	public function get_script() {

		$script = bf_get_local_file_content( $this->dir_path( 'js/script.js' ) );

		if ( $this->comments_type === 'ajaxified' ) {
			$type = 'jQuery(document).on("ajaxified-comments-loaded",appendFbScript);';
		} else {
			$type = 'appendFbScript();';
		}

		$script = str_replace(
			array(
				'%%LOCALE%%',
				'%%APP-ID%%',
				'%%ADMIN-AJAX%%',
				'//%%TYPE%%',
				'%%POST-ID%%',
			),
			array(
				$this->get_option( 'locale' ),
				$this->get_option( 'app_id' ),
				admin_url( 'admin-ajax.php' ),
				$type,
				get_the_ID(),
			),
			$script
		);

		return $script;
	}


	public function output() {

		ob_start();
		?>
		<div id="fb-root"></div>
		<script>
			<?php echo $this->get_script() ?>
		</script>
		<?php

		return ob_get_clean();
	}


	/**
	 *  Add FB js and tags
	 */
	function wp_footer() {

		$print = is_singular() && ! ( is_front_page() || is_home() );

		// Print fb.js only in homepages that was not create with Visual Composer.
		if ( is_front_page() && function_exists( 'publisher_is_pagebuilder_used' ) ) {
			$print = ! publisher_is_pagebuilder_used();
		}

		// Add Facebook js and tags
		if ( $print ) {
			echo $this->output();
		}
	}


	/**
	 * Finds appropriate template file and return path
	 * This make option to change template in themes
	 *
	 * @return string
	 */
	function get_template() {

		if ( is_child_theme() ) {
			// Use child theme specified template for comments page
			if ( file_exists( get_stylesheet_directory() . '/better-facebook-comments.php' ) ) {
				return get_stylesheet_directory() . '/better-facebook-comments.php';
			}
		}

		// Use theme specified template for comments page
		if ( file_exists( get_template_directory() . '/better-facebook-comments.php' ) ) {
			return get_template_directory() . '/better-facebook-comments.php';
		}

		return $this->dir_path( 'templates/better-facebook-comments.php' );
	}


	/**
	 * Changes WP comments template with Facebook template
	 *
	 * @param string $template absolute path to comment template file
	 *
	 * @return string
	 */
	function custom_comments_template( $template ) {

		// Automatic AMP
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return $template;
		}

		// Better AMP
		if ( function_exists( 'is_better_amp' ) && is_better_amp() ) {
			return $template;
		}

		if ( ! apply_filters( 'better-facebook-comments/override-template', TRUE ) ) {
			return $template;
		}

		$is_ajaxified = basename( $template ) === 'comments-ajaxified.php';

		$this->comments_type = $is_ajaxified ? 'ajaxified' : 'plain';
		if ( $is_ajaxified ) {
			return $template;
		}

		return $this->get_template();
	}


	/**
	 * Ajax callback: clears comments count.
	 *
	 * @return string|void
	 */
	function clear_comments_cache() {

		if ( empty( $_GET['post_id'] ) ) {
			wp_send_json( array(
				'status'  => 'error',
				'message' => __( 'Post ID was not received.', 'better-studio' ),
			) );
		}

		delete_transient( 'bfc_post_' . $_GET['post_id'] );

		$result = array(
			'status'   => 'success',
			'post'     => $_GET['post_id'],
			'fb_count' => $this->get_comment_count( $_GET['post_id'] ),
		);

		add_filter( 'better-facebook-comments/disable-aggregate', '__return_false' );
		add_filter( 'better-facebook-comments/allow-multiple', '__return_true' );

		$result['count'] = get_comments_number( $_GET['post_id'] );

		wp_send_json( $result );

	}


	/**
	 * Retrieves post Facebook comments count.
	 *
	 * @return int|mixed
	 */
	function get_comment_count( $post_id = 0 ) {

		if ( $post_id == 0 ) {
			$post_id = get_the_ID();
		}

		$id = 'bfc_post_' . $post_id;

		if ( ( $count = get_transient( $id ) ) === FALSE ) {

			$request = wp_remote_get( 'https://graph.facebook.com/v2.1/?fields=share{comment_count}&id=' . esc_url( get_permalink( $post_id ) ) );

			if ( ! is_wp_error( $request ) ) {

				$request = json_decode( wp_remote_retrieve_body( $request ), TRUE );

				if ( isset( $request['error'] ) ) {
					$count = 0;
					set_transient( $id, $count, MINUTE_IN_SECONDS * 10 );
				} elseif ( ! empty( $request['share']['comment_count'] ) ) {
					$count = $request['share']['comment_count'];
					set_transient( $id, $count, HOUR_IN_SECONDS * 2 );
					add_post_meta( $post_id, '_facebook_comments_count', $count, TRUE );
				}
			}
		}

		if ( $count === FALSE ) {
			if ( get_post_meta( $post_id, '_facebook_comments_count', TRUE ) !== FALSE ) {
				$count = get_post_meta( $post_id, '_facebook_comments_count', TRUE );
			} else {
				$count = 0;
			}
		}

		if ( empty( $count ) ) {
			$count = 0;
		}

		return $count;
	}


	/**
	 * Filters comment count and multiplies comments count in when multiple comments is active
	 *
	 * @param $count
	 * @param $post_id
	 *
	 * @return int|mixed
	 */
	function filter_get_comments_number( $count, $post_id ) {

		if ( apply_filters( 'better-facebook-comments/disable-aggregate', FALSE ) ) {
			return $count;
		}

		$fb_count = $this->get_comment_count( $post_id );

		if ( apply_filters( 'better-facebook-comments/allow-multiple', FALSE ) ) {
			$fb_count += $count;
		}

		return $fb_count;
	}


	/**
	 * Callback: Used to clear themes meta text to better style in front-end
	 *
	 * Filter: better-studio/themes/meta/comments/text
	 *
	 * @param $text
	 *
	 * @return string
	 */
	function better_studio_themes_comment_text( $text ) {

		return is_int( $text ) ? $text : $this->get_comment_count();
	}


	/**
	 * Callback: Adds Facebook App data to header
	 *
	 * Action: wp_head
	 */
	function wp_head() {

		echo '<meta property="fb:app_id" content="' . $this->get_option( 'app_id' ) . '">';
	}
}
