<?php


class CPP_Apache_Config_Manager extends CPP_Web_Server_Configuration {

	/**
	 * @var BF_Htaccess_Editor
	 *
	 * @since 1.0.0
	 */
	protected $editor;


	/**
	 * CPP_Apache_Config_Manager constructor.
	 */
	public function __construct() {

		$config_path = $this->htaccess_file_path();
		$file_system = bf_file_system_instance();

		$this->editor = Better_Framework::factory( 'htaccess-editor' );

		$this->editor->init(
			$file_system->exists( $config_path ) ? $file_system->get_contents( $config_path ) : '',
			'# Content Protector Pack START',
			'# Content Protector Pack STOP'
		);
	}


	/**
	 * Rollback all changes.
	 *
	 * @since 1.0.0
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	public function roll_back() {

		$this->editor->remove_context();

		return $this->save();
	}

	/**
	 * Enable hotlink protection.
	 *
	 * @param array $file_types list of file types to protect.
	 *
	 * @since 1.0.0
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	public function hotlink_protection_enable( $file_types ) {

		$contents = '';

		if ( ! $this->editor->exists( 'RewriteEngine On' ) ) {

			$contents .= "RewriteEngine On\n";
		}

		$GLOBALS['_debug_'] = true;

		if ( ! $this->editor->exists( 'RewriteCond %{HTTP_REFERER} !^$' ) ) {

			$contents .= "RewriteCond %{HTTP_REFERER} !^$\n";

			foreach ( cpp_hosts() as $host ) {

				$contents .= "RewriteCond %{HTTP_REFERER} !^https?://(www\.)?$host/.*$ [NC]\n";
			}

			$contents .= 'RewriteRule \.(' . implode( '|', $file_types ) . ')$ - [F]';
			$contents .= "\n";
		}

		if ( $contents ) {

			$this->editor->append_inside_condition( "\n$contents\n" );

			return $this->save();
		}

		return true;
	}


	/**
	 * Drop hotlink protection configs.
	 *
	 * @param array $file_types list of file types to protect.
	 *
	 * @since 1.0.0
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	public function hotlink_protection_disable( $file_types ) {

		$this->editor->remove( 'RewriteCond %{HTTP_REFERER} !^$' );

		foreach ( cpp_hosts() as $host ) {

			$this->editor->remove( 'RewriteCond %{HTTP_REFERER} !^https?://(www\.)?' . $host . '/.*$ [NC]' );
		}

		$this->editor->remove( 'RewriteRule \.(' . implode( '|', $file_types ) . ')$ - [F]' );

		return $this->save();
	}


	/**
	 * Block all iframe requests.
	 *
	 * @since 1.0.0
	 * @return bool true on success or false|WP_Error on failure.
	 */
	public function iframe_protection_enable() {

		if ( ! $this->editor->exists( 'Header always append X-Frame-Options SAMEORIGIN' ) ) {

			$this->editor->append( 'Header always append X-Frame-Options SAMEORIGIN' );

			return $this->save();
		}

		return true;
	}


	/**
	 * Allow any iframe requests.
	 *
	 * @since 1.0.0
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	public function iframe_protection_disable() {

		$this->editor->remove( 'Header always append X-Frame-Options SAMEORIGIN' );

		return $this->save();
	}


	/**
	 * @since 1.0.0
	 * @return bool|WP_Error true on success or WP_Error|false on error.
	 */
	protected function save() {

		$content     = $this->editor->apply();
		$file_system = bf_file_system_instance();
		$config_path = $this->htaccess_file_path();

		if ( $file_system->exists( $config_path ) ) {

			if ( ! $file_system->is_writable( $config_path ) ) {
				return new WP_Error(
					'write_error',
					__( 'Cannot update .htaccess file. please update .htaccess file with the following contents.', 'content-protector-pack' ), array(
					'contents' => $content,
					'path'     => $config_path,
				) );
			}

			return $file_system->put_contents( $config_path, $content );
		}

		if ( ! $file_system->put_contents( $config_path, $content ) ) {

			return new WP_Error(
				'write_error',
				__( 'Cannot create .htaccess file. please create .htaccess file and insert the following contents.', 'content-protector-pack' ),
				array(
					'contents' => $content,
					'path'     => $config_path,
				)
			);
		}

		return true;
	}

	/**
	 * Get absolute path to the htaccess file.
	 *
	 * @since 3.9.1
	 * @return string
	 */
	public function htaccess_file_path() {

		if ( ! function_exists( 'get_home_path' ) ) {
			require ABSPATH . '/wp-admin/includes/file.php';
		}

		return get_home_path() . '.htaccess';
	}

}