<?php


class BF_Page_Builder_Extender {


	public function __construct() {

		/**
		 * @var BF_Page_Builder_Wrapper $wrapper
		 */
		if ( ! $wrapper_class = $this->wrapper_class() ) {
			return false;
		}

		if ( $hook = call_user_func( array( $wrapper_class, 'register_fields_hook' ) ) ) {

			add_action( $hook, array( $this, 'register_fields_hook' ) );

		} else {

			$wrapper = new $wrapper_class();
			$wrapper->register_fields();
		}

		switch ( $this->current_page_builder() ) {

			case 'KC':
			case 'KCP':

				require BF_PATH . 'page-builder/compatibility/kc/class-bf-kc-compatibility.php';

				break;
		}


		return true;
	}


	/**
	 * @return bool
	 */
	public function register_fields_hook() {

		if ( ! $wrapper_class = $this->wrapper_class() ) {
			return false;
		}

		$wrapper = new $wrapper_class();
		$wrapper->register_fields();

		return true;
	}


	/**
	 * Detect current running page builder plugin.
	 *
	 * @since 4.0.0
	 * @return string empty string on error or plugin short name on success.
	 */
	public function current_page_builder() {

		if ( defined( 'WPB_VC_VERSION' ) && WPB_VC_VERSION ) {

			return 'VC';
		}

		if ( defined( 'KCP_VERSION' ) && KCP_VERSION ) {
			return 'KCP';
		}

		if ( defined( 'KC_VERSION' ) && KC_VERSION ) {
			return 'KC';
		}

		if ( defined( 'ELEMENTOR_VERSION' ) && ELEMENTOR_VERSION ) {
			return 'Elementor';
		}

		if ( defined( 'SITEORIGIN_PANELS_VERSION' ) && SITEORIGIN_PANELS_VERSION ) {
			return 'SiteOrigin';
		}

		if ( function_exists( 'register_block_type' ) ) {
			return 'Gutenberg';
		}

		return '';
	}


	/**
	 * Get current active page builder wrapper class.
	 *
	 * @since 4.0.0
	 * @return string empty on failure.
	 */
	public function wrapper_class() {

		if ( ! class_exists( 'BF_Page_Builder_Wrapper' ) ) {

			require BF_PATH . '/page-builder/class-bf-page-builder-wrapper.php';
		}

		$class_name = '';

		switch ( $this->current_page_builder() ) {

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
	 * @since 4.0.0
	 * @return bool|BF_Fields_Adapter false on failure.
	 */
	public function adapter_class() {

		if ( ! class_exists( 'BF_Fields_Adapter' ) ) {

			require BF_PATH . '/page-builder/class-bf-fields-adapter.php';
		}

		$class_name = '';

		switch ( $this->current_page_builder() ) {

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
	 * @param array $fields
	 * @param array $defaults
	 *
	 * @return mixed WP_Error|false on failure otherwise array|object
	 * @since 4.0.0
	 */
	public function transform( array $fields, $defaults = array() ) {

		if ( ! $adapter_class = $this->adapter_class() ) {
			return false;
		}

		$adapter = new $adapter_class();
		$adapter->load_fields( $fields );
		$adapter->load_defaults( $defaults );

		return $adapter->transform();
	}
}
