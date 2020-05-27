<?php

if ( ! class_exists( 'BF_KC_Compatibility' ) ) {

	/**
	 * @since 4.0.0
	 */
	class BF_KC_Compatibility {

		/**
		 * @var self
		 */
		protected static $instance;


		/**
		 * @var array
		 */
		public static $deferred_fields_maps = array();


		/**
		 * @var array
		 */
		public static $dynamic_fields_maps = array();


		/**
		 * Get singleton instance of class
		 */
		public static function instance() {

			if ( ! self::$instance instanceof self ) {
				self::$instance = new self();
				self::$instance->init();
			}

			return self::$instance;
		}


		/**
		 * Initialize the library
		 *
		 * @since 4.0.0
		 */
		public function init() {

			global $kc_pro;

			//		 TODO: load widget lists via ajax
			// add_action( 'admin_footer', array( $this, 'optimized_kc_admin_footer' ) );
			// remove_action( 'admin_footer', 'kc_admin_footer' );

			if ( bf_is_doing_ajax() ) {

				add_action( 'wp_ajax_bf_kc_tmpl_storage', array( $this, 'kc_tmpl_storage' ) );
			}

			if ( $kc_pro && isset( $kc_pro->action ) && 'live-editor' === $kc_pro->action ) {

				add_action( 'kc_after_admin_footer', array( $this, 'append_security_token' ), 0 );
			}

			add_action( 'wp_ajax_bf_load_kc_fields', array( $this, 'ajax_load_fields' ) );
			add_action( 'edit_form_after_editor', array( $this, 'append_security_token' ) );

			add_filter( 'kc_maps', array( $this, 'filter_kc_maps_var' ) );
		}


		/**
		 * @see kc_ajax::tmpl_storage
		 */
		public function kc_tmpl_storage() {

			check_ajax_referer( 'kc-nonce', 'security' );

			global $kc;

			/**
			 * $kc->param_types_cache don't have getter method >.< i have to take it force
			 */
			$reflectionClass   = new ReflectionClass( $kc );
			$param_types_cache = $reflectionClass->getProperty( 'param_types_cache' );
			$param_types_cache->setAccessible( true );
			$param_types = $param_types_cache->getValue( $kc );

			if ( ! empty( $param_types ) ) {

				foreach ( $param_types as $name => $func ) {
					if ( function_exists( $func ) ) {

						echo '<script type="text/html" id="tmpl-kc-field-type-' . esc_attr( $name ) . '-template">';
						ob_start();
						$func();
						$field = ob_get_clean();

						$this->wrap_show_on_atts( $field );

						echo "</script>\n";

					}
				}
			}

			require_once KC_PATH . '/includes/kc.templates.php';
			do_action( 'kc_tmpl_storage' );

			echo '<!----END_KC_TMPL---->';

			exit;
		}


		public function wrap_show_on_atts( $input ) {

			include BF_PATH . 'page-builder/generators/kc/templates/default-js.php';
		}


		/**
		 * Optimized version of the kc_admin_footer() callback
		 *
		 * @hooked admin_footer
		 */
		public function optimized_kc_admin_footer() {

			if ( ! function_exists( 'kc_admin_enable' ) ) {
				return;
			}

			if ( is_admin() && ! kc_admin_enable() ) {
				return;
			}

			do_action( 'kc_before_admin_footer' );

			require_once KC_PATH . '/includes/kc.js_languages.php';
			require_once BF_PATH . 'page-builder/compatibility/kc/kc.nocache_templates.php';

			do_action( 'kc_after_admin_footer' );
		}


		/**
		 * @hooked wp_ajax_bf_load_kc_fields
		 */
		public function ajax_load_fields() {

			if ( empty( $_REQUEST['shortcode'] ) || empty( $_REQUEST['token'] ) ) {
				return;
			}

			check_ajax_referer( 'ajax-load-kc-fields', 'token' );

			$shortcode = $_REQUEST['shortcode'];

			if ( ! $shortcode_instance = BF_Shortcodes_Manager::factory( $shortcode, array(), true ) ) {

				wp_send_json_error( new WP_Error( 'invalid_shortcode' ) );
			}

			$deferred_fields = $this->filter_deferred_fields( $shortcode_instance->page_builder_fields( 'KC' ) );
			$shortcode_atts  = isset( $_REQUEST['shortcode_atts'] ) && is_array( $_REQUEST['shortcode_atts'] )
				? $_REQUEST['shortcode_atts'] : array();

			foreach ( $deferred_fields as $field ) {

				if ( 'js' === $field['_render_engine'] ) {

					$global_fields[] = array(
						//				'html' => $this->get_field( $field_type ),
						'html' => $this->get_field( $field, array(
							'input_name' => '{{data.name}}',
							'value'      => '{{data.value}}',
						) ),
						'id'   => $field['name']
					);

				} elseif ( 'php' === $field['_render_engine'] ) {

					$name = $field['name'];

					//
					$dedicated_fields[] = array(
						'html' => $this->get_field( $field, array(
							'input_name' => $name,
							'value'      => isset( $shortcode_atts[ $name ] ) ? $shortcode_atts[ $name ] : '',
						) ),
						'id'   => $field['type'],
						'name' => $name,
					);
				}
			}

			wp_send_json_success( compact( 'dedicated_fields', 'global_fields' ) );
		}


		/**
		 * @hooked edit_form_after_editor
		 */
		public function append_security_token() {

			wp_nonce_field( 'ajax-load-kc-fields', 'bf_kc_ajax_field', false );
		}


		/**
		 * Mark map as deferred to load field HTML markup via ajax.
		 *
		 * @param string $map_id
		 * @param array  $fields_type
		 */
		public static function mark_fields_as_deferred( $map_id, $fields_type ) {

			self::$deferred_fields_maps[ $map_id ][] = array_unique( $fields_type );
		}


		/**
		 * @param string $map_id
		 */
		public static function always_fetch_map_fields( $map_id ) {

			if ( ! in_array( $map_id, self::$dynamic_fields_maps ) ) {
				self::$dynamic_fields_maps[] = $map_id;
			}
		}


		/**
		 * @param array $kc_maps
		 *
		 * @hooked kc_maps
		 *
		 * @return array
		 */
		public function filter_kc_maps_var( $kc_maps ) {

			foreach ( self::$dynamic_fields_maps as $map_id ) {

				$kc_maps[ $map_id ]['always_fetch_fields'] = true;
			}

			foreach ( self::$deferred_fields_maps as $map_id => $fields_type ) {

				if ( isset( $kc_maps[ $map_id ] ) && empty( $kc_maps[ $map_id ]['always_fetch_fields'] ) ) {
					$kc_maps[ $map_id ]['deferred_fields'] = $fields_type;
				}
			}

			return $kc_maps;
		}


		/**
		 * List deferred fields type.
		 *
		 * @param array $fields
		 *
		 * @return array
		 */
		public function filter_deferred_fields( $fields ) {

			/**
			 * @var BF_KC_Wrapper $kc_wrapper
			 */
			$kc_wrapper = Better_Framework::factory( 'page-builder' )->wrapper_class( 'KC' );
			$kc_wrapper = new $kc_wrapper();

			$deferred_fields         = array();
			$dynamic_deferred_fields = $kc_wrapper->dynamic_deferred_fields();
			$static_deferred_fields  = $kc_wrapper->static_deferred_fields();

			foreach ( $fields as $tab_fields ) {

				foreach ( $tab_fields as $field ) {

					if ( in_array( $field['type'], $dynamic_deferred_fields ) ) {

						$deferred_fields[ $field['name'] ]                   = $field;
						$deferred_fields[ $field['name'] ]['_render_engine'] = 'php';

					} elseif ( in_array( $field['type'], $static_deferred_fields ) ) {

						$deferred_fields[ $field['name'] ]                   = $field;
						$deferred_fields[ $field['name'] ]['_render_engine'] = 'js';
					}
				}
			}

			return $deferred_fields;
		}


		/**
		 * @param string $field
		 * @param array  $options
		 *
		 * @return string
		 */
		public function get_field( $field, $options = array() ) {

			$field = array_merge( $field, $options );

			if ( ! class_exists( 'BF_KC_Fields_Generator' ) ) {

				require BF_PATH . 'page-builder/generators/kc/class-bf-kc-fields-generator.php';
			}

			if ( isset( $field['name'] ) && ! isset( $field['id'] ) ) {
				$field['id'] = $field['name'];
			}

			$generator = new BF_KC_Fields_Generator( $field, $field['input_name'] );

			return $generator->get_field();
		}


		/**
		 * @param array $field
		 *
		 * @return string
		 */
		public function get_field_placeholder( $field ) {

			return sprintf( '<div class="bf-deferred-kc-field" data-field-name="%s"></div>', esc_attr( $field['name'] ) );
		}
	}


	BF_KC_Compatibility::instance();
}
