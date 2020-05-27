<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * Class BF_Product_Report
 */
class BF_Product_Report extends BF_Product_Item {

	public $id = 'report';

	public $check_remote_duration;
	/**
	 * store active item in loop
	 *
	 * @var array
	 */
	public $active_item = array();

	/**
	 * store item settings array if available
	 *
	 * @var array
	 */
	public $item_settings = array();

	/**
	 * Store theme headers data
	 *
	 * @var array
	 */
	public $theme_header = array();


	/**
	 * allow generate HTML?
	 *
	 * @var string
	 */
	public $render_context = 'html';

	/**
	 * BF_Product_Report constructor.
	 */
	public function __construct() {

		parent::__construct();

		$this->check_remote_duration = HOUR_IN_SECONDS;
	}


	protected function get_report_settings() {

		return apply_filters( 'better-framework/product-pages/system-report/config', array() );
	}

	protected function before_render() {

		parent::before_render();

		$this->test_http_remote();
	}


	/**
	 * Render HTML output
	 *
	 * @param array $item_data
	 */
	public function render_content( $item_data ) {

		if ( $boxes = $this->get_report_settings() ) :

			$this->sort_config( $boxes );

			foreach ( $boxes as $box ) :

				$this->prepare_box_params( $box );

				?>
				<div class="bs-product-pages-box-container bs-pages-row-one bf-clearfix">

					<div class="bs-pages-box-wrapper">
				<span class="bs-pages-box-header">
					<?php
					if ( isset( $box['box-settings']['icon'] ) ) {
						echo bf_get_icon_tag( $box['box-settings']['icon'] );
					}


					if ( isset( $box['box-settings']['header'] ) ) {
						echo $box['box-settings']['header']; // escaped before
					}

					?>
				</span>

						<div class="bs-pages-box-description bs-pages-box-description-fluid">
							<?php if ( ! empty( $box['items'] ) ) : ?>
							<div class="bs-pages-list-wrapper">
								<?php
								foreach ( $box['items'] as $item ) :
									$have_label = ! empty( $item['label'] );
									$this->item_settings = $this->get_item_settings( $item );

									?>
									<div class="bs-pages-list-item<?php
									if ( ! empty( $item['class'] ) ) {
										echo ' ', sanitize_html_class( $item['class'] ); // escaped before
									}
									?>">
										<?php

										if ( $have_label ) : ?>
											<div class="bs-pages-list-title">
												<?php

												if ( isset( $item['before_label'] ) ) {
													echo $item['before_label']; // escaped before
												}

												echo $item['label']; // escaped before

												if ( isset( $item['after_label'] ) ) {
													echo $item['after_label']; // escaped before
												}
												?>
											</div>
										<?php endif ?>
										<div class="bs-pages-list-data<?php if ( ! $have_label ) {
											echo ' no-label';
										} ?>">
											<?php
											if ( $data = $this->get_item_data( $item ) ) {

												$this->help_section_html( $data );
												$this->item_section_html( $data );
											}
											?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif ?>
					</div>
				</div>
				<?php

			endforeach;
		else:
			$this->error( 'System report was not configured!' );
		endif;
	}

	/**
	 * Render simple text
	 *
	 */
	public function render_text() {

		ob_start();

		$this->render_context = 'debug';

		if ( $boxes = $this->get_report_settings() ) {

			$this->sort_config( $boxes );

			//remove system report html before export as text
			foreach ( $boxes as $box_id => $info ) {
				if ( isset( $info['box-settings']['operation'] ) && $info['box-settings']['operation'] === 'report-export' ) {

					unset( $boxes[ $box_id ] );
					break;
				}
			}

			foreach ( $boxes as $box ) :

				$this->prepare_box_params( $box );

				echo "\n";
				echo '### ';
				if ( isset( $box['box-settings']['header'] ) ) {
					echo $box['box-settings']['header']; // escaped before
				}
				echo ' ###', "\n";

				if ( ! empty( $box['items'] ) ) {
					foreach ( $box['items'] as $item ) {

						echo "\n", $item['label'], ' '; // escaped before

						if ( $data = $this->get_item_data( $item ) ) {
							echo $data[1]; // escaped before
						} else {
							esc_html_e( 'NOTHING!', 'better-studio' );
						}
					}
				}
				echo "\n";
			endforeach;

			echo '### ', __( 'Error Log', 'better-studio' ), ' ###', "\n";
			print_r( get_option( 'bs-backend-error-log' ) );

		} else {
			esc_html_e( 'System report was not configured!', 'better-studio' );
		}

		return ob_get_clean();
	}

	private function get_item_settings( $item ) {

		if ( ! isset( $item['settings'] ) || ! is_array( $item['settings'] ) ) {

			return array();
		}

		return wp_parse_args( $item['settings'], array(
			'standard_value' => 0,
			'minimum_value'  => 0,
			'default'        => 'enabled'
		) );
	}

	/**
	 * process item and retrieve data
	 *
	 * @param array $item
	 *
	 * @return array empty array on failed
	 *
	 *  success array:
	 *  array {
	 *    0 => raw value
	 *    1 => print ready content
	 *  }
	 */
	protected function get_item_data( $item ) {

		if ( empty( $item['type'] ) ) {
			return array();
		}

		$this->active_item = &$item;

		$type     = explode( '.', $item['type'] );
		$method   = 'get_' . $type[0] . '_data';
		$callback = array( $this, $method );

		if ( is_callable( $callback ) ) {
			$params     = array_slice( $type, 1 );
			$raw_result = call_user_func_array( $callback, $params );


			/**
			 * Todo: test $type[0] param
			 */
			return array(
				$this->sanitize_item( $raw_result, $type[0], 'raw' ),
				$this->sanitize_item( $raw_result, $type[0], 'display' )
			);
		}

		return array();
	}

	/**
	 * @param string $data_type
	 *
	 * @return string
	 */
	private function get_bs_pages_data( $data_type ) {

		$result = '';
		switch ( $data_type ) {

			case 'history':

				/**
				 * get demo installation history
				 * @see bf_product_report_log_demo_install
				 */
				if ( $imported_demos = get_option( 'bs-demo-install-log' ) ) {

					$result = sprintf( 'imported demo(s): %s', implode( ', ', array_keys( (array) $imported_demos ) ) );
				} else {

					$result = __( 'Nothing!', 'better-studio' );
				}

				break;
		}


		return $result;
	}

	/**
	 * append data to box item by checking box-settings array => operation index value
	 *
	 * @param array $box
	 *
	 * @return bool true on success or false on failure.
	 */
	protected function prepare_box_params( &$box ) {

		if ( empty( $box['box-settings']['operation'] ) ) {
			return FALSE;
		}

		if ( ! isset( $box['items'] ) ) {
			$box['items'] = array();
		}


		switch ( $box['box-settings']['operation'] ) {

			case 'list-active-plugin':


				/** @noinspection SpellCheckingInspection */
				$plugins = array_merge(
					array_flip( (array) get_option( 'active_plugins', array() ) ),
					(array) get_site_option( 'active_sitewide_plugins', array() )
				);
				if ( $plugins = array_intersect_key( get_plugins(), $plugins ) ) {

					foreach ( $plugins as $plugin ) {

						$plugin_uri  = isset( $plugin['PluginURI'] ) ? esc_url( $plugin['PluginURI'] ) : '#';
						$plugin_name = isset( $plugin['Name'] ) ? $plugin['Name'] : __( 'unknown', 'better-studio' );

						$author_uri  = isset( $plugin['AuthorURI'] ) ? esc_url( $plugin['AuthorURI'] ) : '#';
						$author_name = isset( $plugin['Author'] ) ? $plugin['Author'] : __( 'unknown', 'better-studio' );

						if ( $this->render_context === 'html' ) {

							$box['items'][] = array(
								'type'        => 'raw',
								'label'       => wp_kses( sprintf( '<a href="%s" target="_blank">%s</a>', $plugin_uri, $plugin_name ), bf_trans_allowed_html() ),
								'description' => wp_kses( sprintf( __( 'by <a href="%s" target="_blank">%s</a>', 'better-studio' ), $author_uri, $author_name ), bf_trans_allowed_html() ),
							);
						} else {

							$plugin_version = isset( $plugin['Version'] ) ? $plugin['Version'] : 'unknown';

							$box['items'][] = array(
								'type'        => 'raw',
								'label'       => $plugin_name,
								'description' => sprintf( __( 'by %s (V %s)', 'better-studio' ), $author_name, $plugin_version ),
							);
						}
					}
				} else {
					$box['items'][] = array(
						'type'        => 'raw',
						'label'       => FALSE,
						'count_calc'  => FALSE,
						'description' => sprintf( '<div class="bs-product-notice bs-product-notice-warning">%s</div>', __( 'no active plugin was found!', 'better-studio' ) )
					);
				}

				break;

			case 'report-export':

				if ( $this->render_context === 'html' ) {

					$box['items'][] = array(
						'type'        => 'raw',
						'label'       => sprintf( '<a href="#" class="bf-btn-primary bs-pages-primary-btn bs-pages-success-btn" id="bs-get-system-report"><span class="loading" style="display: none;margin: 0 5px;"><i class="fa fa-refresh fa-spin"></i></span> %s</a>', __( 'Get Status Report', 'better-studio' ) ),
						'description' => __( 'Click the button to produce a report, then copy and paste into your support ticket.', 'better-studio' ),
					);
					$box['items'][] = array(
						'type'        => 'raw',
						'label'       => FALSE,
						'class'       => 'bs-item-hide',
						'description' => '<div id="bs-system-container" style="display: none;"><textarea rows="20" style="width: 100%;color: #595959;" class="bs-output">' . $this->render_text() . '</textarea><a href="#" class="bf-btn-primary" id="bs-copy-system-report">' . __( 'Copy status report', 'better-studio' ) . '</a></div>'
					);
				}

				break;

			case 'template-compatibility':

				$config = apply_filters( 'better-framework/product-pages/system-report/theme-compatibility', array() );
				$label  = __( 'current version: %s - updated version: %s', 'better-studio' );

				if ( $outdated_files = BF_Template_Compatibility::do_compatibility( $config, FALSE ) ) {
					foreach ( $outdated_files as $file ) {

						if ( empty( $file['override_version'] ) ) {
							$file['override_version'] = __( 'undefined', 'better-studio' );
						}

						$box['items'][] = array(
							'type'        => 'raw',
							'label'       => $file['path'],
							'description' => sprintf( $label, $file['override_version'], $file['parent_version'] ),
						);
					}
				} else {
					$box['items'][] = array(
						'type'  => 'raw',
						'label' => __( 'No outdated file was found in child-theme', 'better-studio' ),
					);
				}

				break;
			default:

				return FALSE;
		}

		$box['box-settings']['header'] =
			str_replace(
				array( '%%count%%' ),
				array( number_format_i18n( $this->count( $box['items'] ) ) ),
				$box['box-settings']['header']
			);

		return TRUE;
	}

	protected function count( $items ) {

		$count = 0;
		if ( is_array( $items ) ) {

			foreach ( $items as $item ) {

				if ( ! isset( $item['count_calc'] ) || $item['count_calc'] ) {

					$count ++;
				}
			}
		}

		return $count;
	}

	/**
	 * get current theme header data and cache
	 *
	 * @param string $data_type theme header index
	 *
	 * @see \WP_Theme::__isset $properties is valid value this var
	 *
	 * @return string|bool string on success otherwise false
	 */
	protected function get_wp_theme_data( $data_type ) {

		if ( ! $this->theme_header ) {
			$theme_data = wp_get_theme( get_template() );

			if ( $theme_data instanceof WP_Theme ) {
				$this->theme_header = $theme_data;
			}
		}

		if ( isset( $this->theme_header->$data_type ) ) {
			return $this->theme_header->$data_type;
		}

		return FALSE;
	}

	/**
	 * Retrieve information about the blog
	 *
	 * @param string $data_type
	 *
	 * @see get_bloginfo
	 *
	 * @return string string values, might be empty
	 */
	protected function get_bloginfo_data( $data_type ) {

		return get_bloginfo( $data_type, 'display' );
	}

	/**
	 * Sort report config array boxes by position value
	 *
	 * @param $boxes
	 */
	protected function sort_config( &$boxes ) {

		uasort( $boxes, array( $this, '_sort_box_by_position' ) );
	}

	/**
	 * Retrieve information about the wordpress
	 *
	 * @param string $data_type
	 *
	 * @return string string values, might be empty
	 */
	protected function get_wp_data( $data_type ) {
		$result = NULL;

		switch ( $data_type ) {

			case 'version':
				include ABSPATH . WPINC . '/version.php'; // include an unmodified $wp_version
				$result = $GLOBALS['wp_version'];
				break;

			case 'memory_limit':

				$wp_memory_limit  = WP_MEMORY_LIMIT;
				$php_memory_limit = get_cfg_var( 'memory_limit' );

				if ( bf_is_ini_value_changeable( 'memory_limit' ) &&
				     wp_convert_hr_to_bytes( $wp_memory_limit ) < wp_convert_hr_to_bytes( $php_memory_limit )
				) {
					$wp_memory_limit = $php_memory_limit;
				}

				$result = $wp_memory_limit . ', ' . WP_MAX_MEMORY_LIMIT;
				break;

			case 'debug_mode':

				$result = WP_DEBUG;
				break;

			case 'cache_exists':

				$cache_plugins = array(
					'w3-total-cache/w3-total-cache.php'   => 'W3 Total Cache',
					'wp-super-cache/wp-cache.php'         => 'WP Super Cache',
					'wprocket/wp-rocket.php'              => 'WP Rocket',
					'wp-fastest-cache/wpFastestCache.php' => 'WP Fastest Cache',
					'cache-enabler/cache-enabler.php'     => 'Cache Enabler - WordPress Cache',
					'wp-ffpc/wp-ffpc.php'                 => 'WP FFPC',
				);

				/**
				 * TODO: read plugin name from plugin file
				 * TODO: check caching status of each plugin
				 * TODO: check object-cache.php file
				 */
				$active_cache_plugin = FALSE;
				foreach ( $cache_plugins as $cache_plugin => $plugin_name ) {
					if ( is_plugin_active( $cache_plugin ) ) {
						$active_cache_plugin = $plugin_name;
						break;
					}
				}

				$result = $active_cache_plugin ? $active_cache_plugin : 'no cache plugin was found';
				break;
			default:
				$prefix   = 'wp_';
				$function = $prefix . $data_type;


				if ( is_callable( $function ) ) {

					$params = func_get_args();
					$result = call_user_func_array( $function, array_slice( $params, 1 ) );
				}
		}

		return $result;
	}

	/**
	 * Call custom function and return results
	 *
	 * @param string $function_name
	 *
	 * @return string|bool string on success
	 */
	protected function get_func_data( $function_name ) {

		if ( is_callable( $function_name ) ) {
			return call_user_func( $function_name );
		}

		return FALSE;
	}

	/**
	 * Translate data to valid printable output string
	 *
	 * @param mixed  $result
	 * @param string $data_type
	 * @param string $context raw or display context is available
	 *
	 * @return string|null string on success
	 */
	private function sanitize_item( $result, $data_type, $context = 'raw' ) {

		static $format_size = array(
			'max_upload_size',
			'memory_limit',
			'post_max_size'
		);
		$return = NULL;

		switch ( $context ) {

			case 'display':

				if ( is_bool( $result ) ) {

					$return = $result ? __( 'Enabled', 'better-studio' ) : __( 'Disabled', 'better-studio' );
				} else if ( is_string( $result ) || is_int( $result ) ) {

					if ( in_array( $data_type, $format_size ) ) {
						$return = size_format( is_string( $result ) ? $this->convert_hr_to_bytes( $result ) : $result );

					} else if ( is_int( $result ) ) {
						$return = number_format_i18n( $result );
					} else {

						$return = $result;
					}
				}

				break;


			case 'raw':

			default:

				if ( is_bool( $result ) ) {

					return $result;
				} else if ( is_string( $result ) || is_int( $result ) ) {

					if ( in_array( $data_type, $format_size ) ) {
						$result = is_string( $result ) ? $this->convert_hr_to_bytes( $result ) : $result;
					}

					return $result;
				}
		}


		return $return;
	}

	/***
	 * Get php.ini values
	 *
	 * @param string $data_type init_get input
	 *
	 * @return string|null string on success, empty string or null on failure or for null values.
	 */
	protected function get_ini_data( $data_type ) {
		$current_value = ini_get( $data_type );
		$org_value     = get_cfg_var( $data_type );

		if ( $org_value === FALSE ) {
			return $current_value;
		}

		if ( $current_value === $org_value ) {
			return $current_value;
		}

		return $org_value . ', ' . $current_value;
	}

	/**
	 * return raw html stored in description index
	 *
	 * @return string
	 */
	protected function get_raw_data() {

		if ( isset( $this->active_item['description'] ) ) {
			return $this->active_item['description'];
		}

		return '';
	}

	/**
	 * Get information about serve software
	 *
	 * @param string $data_type
	 *
	 * @global wpdb  $wpdb
	 *
	 * @return string|void string on success
	 */
	protected function get_server_data( $data_type ) {
		global $wpdb;

		$result = NULL;

		switch ( $data_type ) {

			case 'web_server':
			case 'software':

				$result = $_SERVER['SERVER_SOFTWARE'];
				break;

			case 'php_version':

				$result = phpversion();
				break;

			case 'mysql_version':

				$result = $wpdb->db_version();
				break;

			case 'suhosin_installed':

				$result = extension_loaded( 'suhosin' );
				break;

			case 'zip_archive':

				/** @noinspection SpellCheckingInspection */
				$result = class_exists( 'ZipArchive' ) || function_exists( 'gzopen' );
				break;

			case 'remote_get':
			case 'remote_post':

				$test_result = get_transient( 'bs_remote_test' );
				$result      = ! empty( $test_result[ $data_type ] );
				break;
		}

		return $result;
	}

	/**
	 *
	 * compare  ['box-settings']['position'] index to sort
	 *
	 * @see sort_config
	 *
	 * @param array $box_a
	 * @param array $box_b
	 *
	 * @return int
	 */
	protected function _sort_box_by_position( $box_a, $box_b ) {

		$position_a = isset( $box_a['box-settings']['position'] ) ? (int) $box_a['box-settings']['position'] : 10;
		$position_b = isset( $box_b['box-settings']['position'] ) ? (int) $box_b['box-settings']['position'] : 10;

		return $position_a > $position_b;
	}

	/**
	 * Test remote request working
	 *
	 * @return array {
	 *
	 * @type int  $last_checked last time remote status checked (timestamp)
	 * @type bool $remote_get   is remote get active?
	 * @type bool $remote_post  is remote post active?
	 * }
	 */
	protected function test_http_remote() {

		$prev_status = get_transient( 'bs_remote_test' );
		if ( ! is_array( $prev_status ) ) {
			$prev_status                 = array();
			$prev_status['last_checked'] = time();
			$skip_test                   = FALSE;
		} else {
			$skip_test = $this->check_remote_duration > ( time() - $prev_status['last_checked'] );
		}

		if ( $skip_test ) {
			return $prev_status;
		}

		$empty_array = wp_json_encode( array() );
		$api_url     = 'http://api.wordpress.org/plugins/update-check/1.1/';
		$options     = array(
			'body' => array(
				'plugins'      => $empty_array,
				'translations' => $empty_array,
				'locale'       => $empty_array,
				'all'          => wp_json_encode( TRUE ),
			),
		);

		$new_status                 = array();
		$new_status['last_checked'] = time();

		$raw_response             = wp_remote_post( $api_url, $options );
		$new_status['remote_get'] = ! is_wp_error( $raw_response ) && wp_remote_retrieve_response_code( $raw_response ) == 200;

		$raw_response              = wp_remote_get( $api_url, $options );
		$new_status['remote_post'] = ! is_wp_error( $raw_response ) && wp_remote_retrieve_response_code( $raw_response ) == 200;


		set_transient( 'bs_remote_test', $new_status, $this->check_remote_duration );

		return $new_status;
	}

	protected function convert_hr_to_bytes( $string ) {
		$string = explode( ',', $string );
		$string = $string[0];

		return wp_convert_hr_to_bytes( $string );
	}

	/**
	 * Generate help section HTML
	 *
	 * @param array $data description array generated by {@see get_item_description}
	 */
	protected function help_section_html( &$data ) {

		$raw_data = &$data[0];
		if ( ! empty( $this->active_item['help'] ) ) { ?>
			<div class="bs-pages-help-wrapper">

				<?php

				$icon_classes         = array( 'fa' );
				$icon_wrapper_classes = array( 'bs-pages-help' );

				if ( ! empty( $this->item_settings['standard_value'] ) ) {

					$std_value     = $this->item_settings['standard_value'];
					$std_value     = is_string( $std_value ) ? $this->convert_hr_to_bytes( $std_value ) : (int) $std_value;
					$current_value = is_string( $raw_data ) ? $this->convert_hr_to_bytes( $raw_data ) : (int) $raw_data;
					$min_value     = 0;

					if ( isset( $this->item_settings['minimum_value'] ) ) {

						$min_value = $this->item_settings['minimum_value'];
						$min_value = is_string( $min_value ) ? $this->convert_hr_to_bytes( $min_value ) : (int) $min_value;
					}

					if ( $min_value && $current_value < $min_value ) {

						$icon_wrapper_classes[] = 'danger';
						$icon_classes[]         = 'fa-bolt';
					} else if ( $current_value < $std_value ) {

						$icon_wrapper_classes[] = 'warning';
						$icon_classes[]         = 'fa-exclamation';
					} else {

						$icon_wrapper_classes[] = 'success';
						$icon_classes[]         = 'fa-check';
					}

				} else if ( is_bool( $raw_data ) && empty( $this->item_settings['hide_mark'] ) ) {

					$success_status = isset( $this->item_settings['default'] ) ? $this->item_settings['default'] : 'enabled';
					if ( ( $success_status === 'enabled' && $raw_data )
					     ||
					     ( $success_status === 'disable' && ! $raw_data )
					) {

						$icon_classes[]         = 'fa-check';
						$icon_wrapper_classes[] = 'success';
					} else {

						$icon_wrapper_classes[] = 'warning';
						$icon_classes[]         = 'fa-exclamation';
					}

				} else {

					$icon_classes[] = 'fa-question';
				}

				?>


				<div class="<?php echo esc_attr( implode( ' ', $icon_wrapper_classes ) ); ?>">
					<i class="<?php echo esc_html( implode( ' ', $icon_classes ) ); ?>"></i>
				</div>

				<div class="bs-pages-help-description">
					<?php
					if ( is_string( $this->active_item['help'] ) )
						echo $this->active_item['help'] // escaped before
					?>
				</div>
			</div>
		<?php }
	}

	/**
	 * Generate help section HTML
	 *
	 * @param array $data description array generated by {@see get_item_description}
	 */
	protected function item_section_html( &$data ) {
		?>

		<span class="bs-item-description">
		<?php


		if ( isset( $this->active_item['before_description'] ) ) {
			echo $this->active_item['before_description']; // escaped before
		}

		echo $data[1]; // escaped before

		if ( isset( $this->active_item['after_description'] ) ) {
			echo $this->active_item['after_description']; // escaped before
		}
		?>
		</span>
		<?php
	}
}
