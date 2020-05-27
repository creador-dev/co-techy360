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


/**
 * Class Publisher_Page_Templates
 */
class Publisher_Page_Templates extends BF_Admin_Page {

	public static $config = array();

	public static $types = array();


	/**
	 * Initial Page Template
	 *
	 * @param array $args Configuration
	 */
	public function __construct( $args = array() ) {

		$args['id']    = 'publisher-page-templates';
		$args['class'] = 'hide-notices';
		$args['slug']  = 'page-templates';

		$args['template']      = 'custom';
		$args['template-file'] = Publisher_Theme_Core()->get_dir_path( 'page-templates/' ) . 'template.php';

		$args['dir-uri'] = Publisher_Theme_Core()->get_dir_url( 'page-templates/' );

		parent::__construct( $args );

		if ( is_admin() && ! empty( $_GET['page'] ) && $_GET['page'] === 'better-studio/page-templates' ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
			add_filter( 'admin_body_class', array( $this, 'admin_body_class' ), 999 );
		}

	}


	/**
	 * Enqueue Styles & Scripts
	 */
	public function enqueue_assets() {

		$version = Publisher_Theme_Core()->get_version();

		wp_enqueue_style( 'publisher-page-templates', $this->get_dir_uri() . 'assets/css/page-templates.css', $version );

		wp_enqueue_script( 'isotope', $this->get_dir_uri() . 'assets/js/isotope.pkgd.min.js', array( 'masonry' ), $version );
		wp_enqueue_script(
			'publisher-page-templates',
			$this->get_dir_uri() . 'assets/js/page-templates.js',
			array( 'isotope' ),
			$version
		);

		wp_localize_script(
			'publisher-page-templates',
			'BsPageTemplatesLoc',
			apply_filters( 'publisher-theme-core/page-templates/localized-items',
				array(
					'add_template' => array(
						'callback'      => 'Publisher_Page_Templates::ajax_add_template',
						'bf_call_token' => Better_Framework::callback_token( 'Publisher_Page_Templates::ajax_add_template' ),
					),
					'loading'      => '<i class="fa fa-refresh fa-spin fa-fw bspt-loading"></i>' . __( 'Installing', 'publisher' ),
					'btn_label'    => __( 'Install', 'publisher' ),
					'offline_img'  => $this->get_dir_uri() . 'assets/images/need-connection.png',
				)
			)
		);
	}


	/**
	 * Callback: Used for adding page custom classes to admin body
	 *
	 * @param $classes
	 *
	 * @return string
	 */
	function admin_body_class( $classes ) {
		return $classes . ' publisher-page-templates-body ';
	}


	/**
	 * Prepare Content & Apply Replacement Array
	 *
	 * @see get_config
	 *
	 * @param string $content
	 * @param array  $replacements
	 *
	 * @return string
	 */
	protected static function _post_content_replacement( $content, $replacements ) {

		if ( ! $replacements ) {
			return $content;
		}

		foreach ( $replacements as $replace_info ) {
			if ( isset( $replace_info['type'] ) && $replace_info['type'] === 'regex' ) {
				$content = preg_replace( $replace_info['search'], $replace_info['replace'], $content );
			} else {
				$content = str_replace( $replace_info['search'], $replace_info['replace'], $content );
			}
		}

		return $content;
	}


	/**
	 * Handle ajax install template
	 *
	 * @return array|void array on success
	 * @throws BF_Exception
	 */
	public static function ajax_add_template() {

		if ( empty( $_REQUEST['template_id'] ) || ! is_string( $_REQUEST['template_id'] ) || ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( ! bf_is_product_registered() ) {
			throw new BF_Exception( __( 'Product was not registered', 'publisher' ), 'register-product' );
		}

		$id = $_REQUEST['template_id'];

		$data = self::get_config();

		if ( empty( $data[ $id ] ) ) {
			throw new BF_Exception( __( 'invalid page template', 'publisher' ), 'invalid-id' );
		}

		$data = $data[ $id ];

		$post_content = '';

		// retry for local file if is set
		if ( isset( $data['template_file'] ) ) {
			$post_content = bf_get_local_file_content( $data['template_file'] );
		}

		// retry for file from the core
		if ( empty( $post_content ) ) {

			$template_data = BetterFramework_Oculus::request( 'get-page-template', array(
					'data' => array(
						'template' => $id
					)
				)
			);

			if ( is_wp_error( $template_data ) ) {
				throw new BF_Exception( $template_data->get_error_message(), $template_data->get_error_code() );
			}

			if ( ! empty( $template_data->success ) && ! empty( $template_data->template ) ) {
				$post_content = $template_data->template;
			}

			if ( empty( $post_content ) ) {
				throw new BF_Exception( __( 'Template content is empty', 'publisher' ), 'empty-template-content' );
			}
		}

		$post_args = array(
			'post_title'  => ! empty( $data['post_title'] ) ? $data['post_title'] : $data['name'],
			'post_type'   => ! empty( $data['post_type'] ) ? $data['post_type'] : 'page',
			'post_status' => 'publish',
		);

		if ( ! empty( $data['replacement'] ) ) {
			$post_args['post_content'] = self::_post_content_replacement( $post_content, $data['replacement'] );
		} else {
			$post_args['post_content'] = $post_content;
		}

		$post_args = apply_filters( 'publisher-theme-core/page-templates/before-insert-template', $post_args, $id, $data );

		$new_post = wp_insert_post( $post_args );

		if ( is_wp_error( $new_post ) ) {

			throw new BF_Exception( $new_post->get_error_message(), $new_post->get_error_code() );
		}

		if ( ! $new_post ) {
			throw new BF_Exception( __( 'Cannot insert new page!', 'publisher' ), 'insert-error' );
		}

		if ( ! empty( $data['post_meta'] ) ) {
			foreach ( $data['post_meta'] as $meta ) {
				add_post_meta( $new_post, $meta['meta_key'], $meta['meta_value'] );
			}
		}

		// Regenerates VC styles again because VC can not generate!
		if ( isset( $data['prepare_vc_css'] ) && $data['prepare_vc_css'] && ! empty( $post_args['post_content'] ) ) {

			// match all shortcodes
			preg_match_all( '/ css=\"([^\"]*)\"/', $post_args['post_content'], $shortcodes );

			$final_css = '';

			foreach ( $shortcodes[1] as $css ) {
				$final_css .= $css;
			}

			update_post_meta( $new_post, '_wpb_shortcodes_custom_css', $final_css );
		}

		$post_url = apply_filters(
			'publisher-theme-core/page-templates/after-insert-template',
			get_edit_post_link( $new_post, 'raw' ),
			$id,
			$data
		);

		return compact( 'post_url' );
	}


	/**
	 * Get All Templates Type
	 *
	 * @return array
	 */

	public function get_types() {
		return self::$types;
	}


	/**
	 * Get Type id by type label
	 *
	 * @param string $type Type name
	 *
	 * @return string|void
	 */
	public static function get_type_id( $type ) {

		if ( isset( self::$types[ $type ] ) ) {
			return self::$types[ $type ];
		}
	}


	/**
	 * Get Type id by type label
	 *
	 * @param string   $type Type name
	 *
	 * @param   string $id   Type Uniqu
	 *
	 * @return string|void
	 */
	public static function set_type_id( $type, $id ) {

		self::$types[ $type ] = sanitize_html_class( $id );
	}


	/**
	 * Get config array
	 *
	 * @return array {
	 *
	 * Template ID =>
	 * array {
	 *
	 * @type string $id            Template unique ID
	 * @type string $name          Template name
	 * @type string $template_file Template file path
	 * @type string $screenshot    Template ScreenShot URL
	 * @type string $post_title
	 * @type string $badge         Badge title
	 * @type string $preview       Preview url
	 *
	 * @type array  $category      Template Categories list
	 * @type array  $type          Template Types Slug list
	 * @type array  $post_meta     array{
	 *           array(
	 * @type string $key           Post meta key
	 * @type mixed  $value         meta value
	 *        )
	 *
	 *      ...
	 *      }
	 *
	 * @type array  $replacement   array {
	 *           array(
	 * @type string $search
	 * @type string $replace
	 * @type string $type          regex|simple
	 *          )
	 *      ...
	 *      }
	 *
	 * }
	 *  ...
	 * }
	 */
	public static function get_config() {

		if ( self::$config ) {
			return self::$config;
		}

		self::$types  = array();
		self::$config = apply_filters( 'publisher-theme-core/page-templates/config', array() );

		foreach ( self::$config as $unique_id => $template ) {


			foreach ( $template['type'] as $type ) {

				if ( ! isset( self::$types[ $type ] ) ) {

					self::set_type_id( $type, $unique_id );
				}
			}
		}

		return self::$config;
	}


	/**
	 * Callback: Used for registering menu to WordPress
	 *
	 * Action: publisher-theme-core/admin-menus/admin-menu/before
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @return  void
	 */
	function add_menu() {
		$badge = ' <span class="bs-admin-menu-badge bs-admin-menu-badge-smaller">' . __( 'New', 'publisher' ) . '</span>';

		Better_Framework()->admin_menus()->add_menupage( array(
				'id'           => $this->page_id,
				'slug'         => 'better-studio/' . $this->args['slug'],
				'name'         => __( 'Page Templates', 'publisher' ),
				'parent'       => 'bs-product-pages-welcome',
				'page_title'   => __( 'Page Templates', 'publisher' ),
				'menu_title'   => __( 'Page Templates', 'publisher' ) . $badge,
				'position'     => 45,
				'capability'   => 'edit_theme_options',
				'callback'     => array( $this, 'display' ),
				'on_admin_bar' => true,
			)
		);

	}


	/**
	 * Page Title
	 *
	 * @return string
	 */
	public function get_title() {
		return sprintf(
			__( '%s Page Templates', 'publisher' ),
			'Publisher'
		);
	}


	/**
	 * Page Description
	 *
	 * @return string
	 */
	public function get_desc() {
		return __( 'Use following pre-made page templates to create stunning website easily.', 'publisher' );
	}


	/**
	 * Page Body markup
	 *
	 * @return string
	 */
	public function get_body() {

		ob_start();

		?>
		<div
				class="bs-page-templates <?php echo bf_is_product_registered() ? 'is-active' : 'not-active'; ?> bf-clearfix">
			<?php

			$preview_label = __( 'Preview', 'publisher' );
			$install_label = __( 'Install', 'publisher' );

			$js_data   = array();

			foreach ( self::get_config() as $unique_ID => $template ) :

				$unique_ID = esc_attr( $unique_ID );
				$types = array_map( 'Publisher_Page_Templates::get_type_id', $template['type'] );
				$cats  = $template['category'];

				array_push( $js_data, array(
					'name' => $template['name'],
					'cat'  => $cats,
					'id'   => $unique_ID,
				) );

				?>
				<div
						class="bs-page-template <?php echo join( ' ', $types ) ?> <?php echo $unique_ID ?> <?php if ( empty( $template['template-file'] ) )
							echo 'need-internet' ?>">
					<div class="bspt-screenshot">
						<img src="<?php echo esc_url( $template['screenshot'] ) ?>">

						<div class="bspt-screenshot-hover">
							<a href="<?php echo esc_url( $template['preview'] ) ?>" class="bspt-btn" target="_blank">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<label><?php echo $preview_label ?></label>
							</a>
						</div>

						<?php if ( isset( $template['badge'] ) ): ?>
							<div class="bspt-badge">
								<?php echo $template['badge'] ?>
							</div>
						<?php endif ?>
					</div>
					<div class="bspt-info bf-clearfix">
						<span class="bspt-name"><?php echo esc_html( $template['name'] ) ?></span>

						<?php if ( bf_is_product_registered() ) { ?>
							<span class="bspt-install">
								<a href="#" class="bspt-btn bspt-install-btn"
								   data-template-id="<?php echo $unique_ID ?>"><?php echo esc_html( $install_label ) ?></a>
							</span>
							<span class="bspt-cat"><?php echo join( ' , ', $cats ) ?></span>

						<?php } else { ?>
							<span
									class="active-error"><?php _e( 'Please register your theme', 'publisher' ); ?></span>
						<?php } ?>

					</div>
				</div>
			<?php endforeach ?>
		</div>

		<script>
            var bsPageTemplatesData = <?php echo json_encode( $js_data ) ?>
		</script>
		<?php

		return ob_get_clean();

	}

}
