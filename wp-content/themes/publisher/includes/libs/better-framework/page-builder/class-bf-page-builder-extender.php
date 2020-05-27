<?php


class BF_Page_Builder_Extender {


	public function __construct() {

		/**
		 * @var BF_Page_Builder_Wrapper $wrapper
		 */

		foreach ( self::active_page_builders() as $page_builder ) {

			if ( ! $wrapper_class = $this->wrapper_class( $page_builder ) ) {
				continue;
			}

			if ( $hook = call_user_func( array( $wrapper_class, 'register_fields_hook' ) ) ) {

				add_action( $hook, array( $this, 'register_fields_hook' ) );

			} else {

				$wrapper = new $wrapper_class();
				$wrapper->register_fields();
			}
		}

		if ( self::is_kc_active() ) {

			require BF_PATH . 'page-builder/compatibility/kc/class-bf-kc-compatibility.php';
		}
	}


	/**
	 * @return bool
	 */
	public function register_fields_hook() {

		foreach ( self::active_page_builders() as $page_builder ) {

			if ( $wrapper_class = $this->wrapper_class( $page_builder ) ) {

				$wrapper = new $wrapper_class();
				$wrapper->register_fields();
			}
		}

		return true;
	}


	/**
	 * Detect current running page builder plugin.
	 *
	 * @since 4.0.0
	 * @return string empty string on error or plugin short name on success.
	 */
	public static function active_page_builders() {

		$page_builders = array();

		if ( defined( 'WPB_VC_VERSION' ) && WPB_VC_VERSION ) {
			$page_builders[] = 'VC';
		}

		if ( defined( 'KCP_VERSION' ) && KCP_VERSION ) {
			$page_builders[] = 'KCP';
		}

		if ( defined( 'KC_VERSION' ) && KC_VERSION ) {
			$page_builders[] = 'KC';
		}

		if ( defined( 'ELEMENTOR_VERSION' ) && ELEMENTOR_VERSION ) {
			$page_builders[] = 'Elementor';
		}

		if ( defined( 'SITEORIGIN_PANELS_VERSION' ) && SITEORIGIN_PANELS_VERSION ) {
			$page_builders[] = 'SiteOrigin';
		}

		if ( ! class_exists( 'BF_Gutenberg_Shortcode_Wrapper' ) ) {
			require BF_PATH . 'gutenberg/class-bf-gutenberg-shortcode-wrapper.php';
		}

		if ( BF_Gutenberg_Shortcode_Wrapper::is_gutenberg_active() ) {
			$page_builders[] = 'Gutenberg';
		}

		return $page_builders;
	}

	public static function is_kc_active() {

		return in_array( 'KCP', self::active_page_builders() )
		       ||
		       in_array( 'KC', self::active_page_builders() );
	}


	/**
	 * Get current active page builder wrapper class.
	 *
	 * @param $page_builder
	 *
	 * @since 4.0.0
	 * @return string empty on failure.
	 */
	public function wrapper_class( $page_builder ) {

		if ( ! class_exists( 'BF_Page_Builder_Wrapper' ) ) {

			require BF_PATH . '/page-builder/class-bf-page-builder-wrapper.php';
		}

		$class_name = '';

		switch ( $page_builder ) {

			case 'VC':

				if ( ! class_exists( 'BF_VC_Wrapper' ) ) {

					require BF_PATH . '/page-builder/wrappers/class-bf-vc-wrapper.php';
				}

				$class_name = 'BF_VC_Wrapper';

				break;

			case 'KC':
			case 'KCP':

				if ( ! class_exists( 'BF_KC_Wrapper' ) ) {

					require BF_PATH . '/page-builder/wrappers/class-bf-kc-wrapper.php';
				}

				$class_name = 'BF_KC_Wrapper';

				break;
			/*
						case 'Elementor':

							if ( ! class_exists( 'BF_Elementor_Wrapper' ) ) {

								require BF_PATH . '/page-builder/wrappers/class-bf-elementor-wrapper.php';
							}

							$class_name = 'BF_Elementor_Wrapper';

							break;

			*/
		}

		return $class_name;
	}


	/**
	 * Get current active page builder adapter class.
	 *
	 * @param string $page_builder
	 *
	 * @since 4.0.0
	 * @return bool|BF_Fields_Adapter false on failure.
	 */
	public function adapter_class( $page_builder ) {

		if ( ! class_exists( 'BF_Fields_Adapter' ) ) {

			require BF_PATH . '/page-builder/class-bf-fields-adapter.php';
		}

		switch ( $page_builder ) {

			case 'VC':

				if ( ! class_exists( 'BF_To_VC_Fields_Adapter' ) ) {

					require BF_PATH . 'page-builder/adapters/class-bf-to-vc-fields-adapter.php';
				}

				$class_name = 'BF_To_VC_Fields_Adapter';

				break;

			case 'KC':
			case 'KCP':

				if ( ! class_exists( 'BF_To_KC_Fields_Adapter' ) ) {

					require BF_PATH . 'page-builder/adapters/class-bf-to-kc-fields-adapter.php';
				}

				$class_name = 'BF_To_KC_Fields_Adapter';

				break;
		}

		if ( ! empty( $class_name ) ) {
			return $class_name;
		}

		return false;
	}


	/**
	 * Transform standard BF fields format to active page builder style.
	 *
	 * @param string      $page_builder_id
	 * @param array $fields
	 * @param array $defaults
	 *
	 * @return mixed WP_Error|false on failure otherwise array|object
	 * @since 4.0.0
	 */
	public function transform( $page_builder_id, array $fields, $defaults = array() ) {

		if ( ! $adapter_class = $this->adapter_class( $page_builder_id ) ) {
			return false;
		}

		$adapter = new $adapter_class();
		$adapter->load_fields( $fields );
		$adapter->load_defaults( $defaults );

		return $adapter->transform();
	}
}
