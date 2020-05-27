<?php


class CPP_Web_Server_Config_Modifier {

	/**
	 * Store web server config object.
	 *
	 * @var CPP_Web_Server_Configuration
	 *
	 * @since 1.0.0
	 */
	protected $web_server;


	/**
	 * Initialize the library.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// after saved panel event
		add_filter( 'better-framework/panel/save/result', array( $this, 'panel_saved' ), 20, 2 );
	}


	/**
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function setup() {

		if ( ! $this->find_web_server() ) {
			return false;
		}

		$image_protection_enabled  = $this->image_protection_config();
		$iframe_protection_enabled = $this->iframe_protection_config();

		if ( ! $image_protection_enabled && ! $iframe_protection_enabled ) {
			$this->web_server->roll_back();
		}

		return true;
	}


	/**
	 * @since 1.0.0
	 *
	 * @param bool $status
	 *
	 * @return bool
	 */
	public function image_protection_config( $status = null ) {

		if ( is_null( $status ) ) {

			$status = cpp_option( 'image_protection' ) && cpp_option( 'image_hotlink_protection' );
		}

		$image_formats = array( 'jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg' );

		if ( $status ) {

			$this->web_server->hotlink_protection_enable( $image_formats );

		} else {

			$this->web_server->hotlink_protection_disable( $image_formats );
		}

		return $status;
	}


	/**
	 * @since 1.0.0
	 *
	 * @param bool $status
	 *
	 * @return bool
	 */
	public function iframe_protection_config( $status = null ) {

		if ( is_null( $status ) ) {

			$status = 'full' === cpp_option( 'iframe_protection' );
		}

		if ( $status ) {

			$this->web_server->iframe_protection_enable();
		} else {

			$this->web_server->iframe_protection_disable();
		}

		return $status;
	}


	/**
	 * Apply changes after plugin options saved.
	 *
	 * @hooked better-framework/panel/save/result
	 *
	 * @param array  $output  contains result of save
	 * @param string $options contain options
	 *
	 * @since  1.0.0
	 * @return array
	 */
	public function panel_saved( $output, $options ) {

		if ( ! isset( $options['id'] ) || $options['id'] !== Content_Protector_Pack::$panel_id ) {
			return $output;
		}

		if ( ! class_exists( 'CPP_Web_Server_Configuration' ) ) {
			require Content_Protector_Pack::dir_path( 'includes/web-server/class-cpp-web-server-configuration.php' );
		}

		$this->setup();

		return $output;
	}


	/**
	 * @since 1.0.0
	 * @return self|false false on error
	 */
	public function find_web_server() {

		global $is_apache;

		$web_server = false;

		if ( $is_apache ) {

			if ( ! class_exists( 'CPP_Apache_Config_Manager' ) ) {

				require Content_Protector_Pack::dir_path( 'includes/web-server/class-cpp-apache-config-manager.php' );
			}

			$web_server = new CPP_Apache_Config_Manager();

		} else {

		}

		if ( $web_server ) {

			$this->set_web_server( $web_server );
		}

		return $web_server;
	}


	/**
	 * CPP_Web_Server_Config_Modifier constructor.
	 *
	 * @param CPP_Web_Server_Configuration $web_server
	 *
	 * @since 1.0.0
	 */
	public function set_web_server( CPP_Web_Server_Configuration $web_server ) {

		$this->web_server = $web_server;
	}


	/**
	 * @since 1.0.0
	 * @return CPP_Web_Server_Configuration
	 */
	public function get_web_server() {

		return $this->web_server;
	}
}
