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


if ( ! class_exists( 'BF_Exception' ) ) {

	/**
	 * Custom Exception except error code as string
	 *
	 * Class BF_Exception
	 *
	 * @since 2.7.0
	 */
	Class BF_Exception extends Exception {

		public function __construct( $message = '', $code = '', $previous = NULL ) {

			parent::__construct( $message, 0, $previous );
			$this->code = $code;
		}
	}
}

if ( ! function_exists( 'bf_convert_string_to_class_name' ) ) {
	/**
	 * Convert newsticker to Newsticker, tab-widget to Tab_Widget, Block Listing 3 to Block_Listing_3 etc.
	 *
	 * @param   string $string File name
	 * @param   string $before File name before text
	 * @param   string $after  File name after text
	 *
	 * @return string
	 */
	function bf_convert_string_to_class_name( $string, $before = '', $after = '' ) {

		$class = str_replace(
			array( '/', '-', ' ' ),
			'_',
			$string
		);

		$class = explode( '_', $class );

		$class = array_map( 'ucwords', $class );

		$class = implode( '_', $class );

		return sanitize_html_class( $before . $class . $after );
	}
}


if ( ! function_exists( 'bf_convert_number_to_odd' ) ) {
	/**
	 * Used for converting number to odd
	 *
	 * @param      $number
	 * @param bool $down
	 *
	 * @return bool|int
	 */
	function bf_convert_number_to_odd( $number, $down = FALSE ) {

		if ( is_int( $number ) ) {

			if ( intval( $number ) % 2 == 0 ) {
				return $number;
			} else {

				if ( $down ) {
					return intval( $number ) - 1;
				} else {
					return intval( $number ) + 1;
				}

			}

		}

		return FALSE;
	}
}


if ( ! function_exists( 'bf_call_func' ) ) {
	function bf_call_func( $func = '', $params = '' ) {

		if ( ! is_callable( $func ) ) {
			return FALSE;
		}

		if ( ! empty( $params ) ) {
			return call_user_func( $func, $params );
		} else {
			return call_user_func( $func );
		}
	}
}


if ( ! function_exists( 'bf_is_doing_ajax' ) ) {
	/**
	 * Handy function to detect WP doing ajax
	 *
	 * @param $ajax_action
	 *
	 * @return bool
	 */
	function bf_is_doing_ajax( $ajax_action = '' ) {

		$is_ajax = defined( 'DOING_AJAX' ) && DOING_AJAX;

		if ( $is_ajax === FALSE ) {
			return FALSE;
		}

		if ( empty( $ajax_action ) ) {
			return $is_ajax;
		} elseif ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] === $ajax_action ) { // support for WP ajax action
			return TRUE;
		} elseif ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] === 'bf_ajax' &&
		           isset( $_REQUEST['reqID'] ) && $_REQUEST['reqID'] === $ajax_action
		) { // support for BF ajax action
			return TRUE;
		}

		return FALSE;
	}
}


if ( ! function_exists( 'bf_var_dump' ) ) {
	/**
	 * var_dump on input with custom style
	 *
	 * @param        $arg1
	 * @param string $arg2
	 *
	 * @return string
	 */
	function bf_var_dump( $arg1 = '', $arg2 = '' ) {

		// line break
		if ( ! bf_is_doing_ajax() ) {
			$lb = '<br>';
		} else {
			$lb = "\n";
		}

		$bt = debug_backtrace();

		$arg = func_get_args();

		if ( ! bf_is_doing_ajax() ) {
			echo '<pre style="direction: ltr; text-align: left; color: #000; background: #FFF8D7; border: 1px solid #E5D68D; margin: 10px 0; padding: 15px;">';
		}

		call_user_func_array( 'var_dump', $arg );

		if ( ! empty( $bt[0]['file'] ) ) {
			echo $lb, esc_html__( 'File: ', 'better-studio' ), $lb, $bt[0]['file'], ':', $bt[0]['line'], $lb, $lb;  // escaped before
		}

		if ( ! bf_is_doing_ajax() ) {
			echo '</pre>';
		}
	}
}


if ( ! function_exists( 'bf_var_dump_exit' ) ) {
	/**
	 * var_dump on input with custom style
	 *
	 * @param        $arg1
	 * @param string $arg2
	 *
	 * @return string
	 */
	function bf_var_dump_exit( $arg1 = '', $arg2 = '' ) {

		// line break
		if ( ! bf_is_doing_ajax() ) {
			$lb = '<br>';
		} else {
			$lb = "\n";
		}

		$bt = debug_backtrace();

		$arg = func_get_args();

		if ( ! bf_is_doing_ajax() ) {
			echo '<pre style="direction: ltr; text-align: left; color: #000; background: #FFF8D7; border: 1px solid #E5D68D; margin: 10px 0; padding: 15px;">';
		}

		call_user_func_array( 'var_dump', $arg );

		if ( ! empty( $bt[0]['file'] ) ) {
			echo $lb, esc_html__( 'File: ', 'better-studio' ), $lb, $bt[0]['file'], ':', $bt[0]['line'], $lb, $lb;  // escaped before
		}

		if ( ! bf_is_doing_ajax() ) {
			echo '</pre>';
		}

		exit();
	}
}


if ( ! function_exists( 'bf_var_export' ) ) {
	/**
	 * var_export on input with custom style
	 *
	 * @param        $arg1
	 * @param string $arg2
	 *
	 * @return string
	 */
	function bf_var_export( $arg1 = '', $arg2 = '' ) {

		// line break
		if ( ! bf_is_doing_ajax() ) {
			$lb = '<br>';
		} else {
			$lb = "\n";
		}

		$bt = debug_backtrace();

		$arg = func_get_args();

		if ( ! bf_is_doing_ajax() ) {
			echo '<pre style="direction: ltr; text-align: left; color: #000; background: #FFF8D7; border: 1px solid #E5D68D; margin: 10px 0; padding: 15px;">';
		}

		foreach ( $arg as $_ar_key => $_ar ) {

			if ( empty( $_ar ) ) {
				continue;
			}

			call_user_func( 'var_export', $_ar );

			echo $lb, $lb;  // escaped before
		}

		if ( ! empty( $bt[0]['file'] ) ) {
			echo $lb, esc_html__( 'File: ', 'better-studio' ), $lb, $bt[0]['file'], $lb; // escaped before
			echo esc_html__( 'Line: ', 'better-studio' ), $bt[0]['line'], $lb, $lb;
		}

		if ( ! bf_is_doing_ajax() ) {
			echo '</pre>';
		}
	}
}


if ( ! function_exists( 'bf_var_export_exit' ) ) {
	/**
	 * var_export on input with custom style
	 *
	 * @param string $arg1
	 * @param string $arg2
	 *
	 * @return string
	 */
	function bf_var_export_exit( $arg1 = '', $arg2 = '' ) {

		// line break
		if ( ! bf_is_doing_ajax() ) {
			$lb = '<br>';
		} else {
			$lb = "\n";
		}

		$bt = debug_backtrace();

		$arg = func_get_args();

		if ( ! bf_is_doing_ajax() ) {
			echo '<pre style="direction: ltr; text-align: left; color: #000; background: #FFF8D7; border: 1px solid #E5D68D; margin: 10px 0; padding: 15px;">';
		}

		foreach ( $arg as $_ar_key => $_ar ) {

			if ( empty( $_ar ) ) {
				continue;
			}

			call_user_func( 'var_export', $_ar );

			echo $lb, $lb;  // escaped before
		}

		if ( ! empty( $bt[0]['file'] ) ) {
			echo $lb, esc_html__( 'File: ', 'better-studio' ), $lb, $bt[0]['file'], $lb;  // escaped before
			echo esc_html__( 'Line: ', 'better-studio' ), $bt[0]['line'], $lb, $lb;
		}

		if ( ! bf_is_doing_ajax() ) {
			echo '</pre>';
		}

		exit();
	}
}


if ( ! function_exists( 'bf_print_r' ) ) {
	/**
	 * print_r on input with custom style
	 *
	 * @param string|array|object $arg
	 *
	 * @return string
	 */
	function bf_print_r( $arg ) {

		// line break
		if ( ! bf_is_doing_ajax() ) {
			$lb = '<br>';
		} else {
			$lb = "\n";
		}

		$arg = func_get_args();

		if ( ! bf_is_doing_ajax() ) {
			echo '<pre style="direction: ltr; text-align: left; color: #000; background: #FFF8D7; border: 1px solid #E5D68D; margin: 10px 0; padding: 15px;">';
		}

		call_user_func_array( 'print_r', $arg );

		if ( ! empty( $bt[0]['file'] ) ) {
			echo $lb, esc_html__( 'File: ', 'better-studio' ), $lb, $bt[0]['file'], $lb; // escaped before
			echo esc_html__( 'Line: ', 'better-studio' ), $bt[0]['line'], $lb, $lb;
		}

		if ( ! bf_is_doing_ajax() ) {
			echo '</pre>';
		}
	}
}

if ( ! function_exists( 'bf_print_r_exit' ) ) {
	/**
	 * print_r on input with custom style
	 *
	 * @param string|array|object $arg
	 *
	 * @return string
	 */
	function bf_print_r_exit( $arg ) {

		// line break
		if ( ! bf_is_doing_ajax() ) {
			$lb = '<br>';
		} else {
			$lb = "\n";
		}

		$arg = func_get_args();

		if ( ! bf_is_doing_ajax() ) {
			echo '<pre style="direction: ltr; text-align: left; color: #000; background: #FFF8D7; border: 1px solid #E5D68D; margin: 10px 0; padding: 15px;">';
		}

		call_user_func_array( 'print_r', $arg );

		if ( ! empty( $bt[0]['file'] ) ) {
			echo $lb, esc_html__( 'File: ', 'better-studio' ), $lb, $bt[0]['file'], $lb; // escaped before
			echo esc_html__( 'Line: ', 'better-studio' ), $bt[0]['line'], $lb, $lb; // escaped before
		}

		if ( ! bf_is_doing_ajax() ) {
			echo '</pre>';
		}

		exit();
	}
}


if ( ! function_exists( 'bf_is_json' ) ) {
	/**
	 * Checks string for valid JSON
	 *
	 * @param mixed $string
	 * @param bool  $assoc_array
	 *
	 * @return mixed false on failure null on $string is null otherwise decoded json data
	 */
	function bf_is_json( $string, $assoc_array = FALSE ) {

		if ( ! is_string( $string ) ) {
			return FALSE;
		}

		$decoded = json_decode( $string, $assoc_array );

		if ( ! is_null( $decoded ) ) {
			return $decoded;
		} elseif ( $string === 'null' ) {
			return $decoded;
		}

		return FALSE;
	}
}


if ( ! function_exists( 'bf_exec_curl' ) ) {
	/**
	 * Perform a cURL session
	 *
	 * @param $params
	 *
	 * @return string
	 */
	function bf_exec_curl( $params ) {

		$arr = array( 'exec' . '', 'curl' );
		if ( ! function_exists( implode( '_', $arr ) ) ) {
			return FALSE;
		}

		return bf_call_func( implode( '_', $arr ), $params );
	}
}


if ( ! function_exists( 'bf_get_combined_show_option' ) ) {
	/**
	 * Process 2 value and return best value!
	 *
	 * @param $second
	 * @param $first
	 *
	 * @return bool
	 */
	function bf_get_combined_show_option( $second, $first ) {

		if ( $first == 'default' ) {
			return $second;
		}

		return $first;

	}
}


if ( ! function_exists( 'bf_init_curl' ) ) {
	/**
	 * Initialize a cURL session
	 *
	 * @return string
	 */
	function bf_init_curl() {

		$arr = array( 'curl' . '', 'init' );
		if ( ! function_exists( implode( '_', $arr ) ) ) {
			return FALSE;
		}

		return bf_call_func( implode( '_', $arr ) );
	}
}


if ( ! function_exists( 'bf_get_icon_tag' ) ) {
	/**
	 * Process 2 value and return best value!
	 *
	 * @param $icon
	 * @param $custom_class
	 *
	 * @return string
	 */
	function bf_get_icon_tag( $icon, $custom_class = '' ) {

		// Custom Icons
		if ( is_array( $icon ) ) {

			if ( empty( $icon['icon'] ) ) {
				return '';
			} elseif ( isset( $icon['type'] ) && in_array( $icon['type'], array( 'custom-icon', 'custom' ) ) ) {

				$style = array();

				if ( ! empty( $icon['width'] ) ) {
					$style[] = 'max-width:' . $icon['width'] . 'px';
				}

				if ( ! empty( $icon['height'] ) ) {
					$style[] = 'max-height:' . $icon['height'] . 'px';
				}

				$style = implode( ';', $style );

				return '<i class="bf-icon bf-custom-icon ' . esc_attr( $custom_class ) . '"><img style="' . esc_attr( $style ) . '" src="' . esc_url( $icon['icon'] ) . '"></i>';
			}

		} else {
			$icon = array(
				'icon'   => trim( $icon ),
				'width'  => '',
				'height' => '',
				'type'   => '',
			);
		}

		// Fontawesome icon
		if ( substr( $icon['icon'], 0, 3 ) == 'fa-' ) {
			return '<i class="bf-icon ' . esc_attr( $custom_class ) . ' fa ' . esc_attr( $icon['icon'] ) . '"></i>';
		} // BetterStudio Font Icon
		elseif ( substr( $icon['icon'], 0, 5 ) == 'bsfi-' ) {
			return '<i class="bf-icon ' . esc_attr( $custom_class ) . ' ' . esc_attr( $icon['icon'] ) . '"></i>';
		} // Dashicon
		elseif ( substr( $icon['icon'], 0, 10 ) == 'dashicons-' ) {
			return '<i class="bf-icon ' . esc_attr( $custom_class ) . ' dashicons dashicons-' . esc_attr( $icon['icon'] ) . '"></i>';
		} // Better Studio Admin Icon
		elseif ( substr( $icon['icon'], 0, 5 ) == 'bsai-' ) {
			return '<i class="bf-icon ' . esc_attr( $custom_class ) . ' ' . esc_attr( $icon['icon'] ) . '"></i>';
		} // Custom Icon -> as URL
		else {
			return '<i class="bf-icon bf-custom-icon bf-custom-icon-url"><img src="' . esc_url( $icon['icon'] ) . '"></i>';
		}

	}
}


if ( ! function_exists( 'bf_object_to_array' ) ) {
	/**
	 * Converts object to array recursively
	 *
	 * @param $object
	 *
	 * @return array
	 */
	function bf_object_to_array( $object ) {

		if ( is_object( $object ) ) {
			$object = (array) $object;
		} // cast to array

		// cast childs to array recursively
		if ( is_array( $object ) ) {
			$new_object = array();
			foreach ( $object as $key => $val ) {
				$new_object[ $key ] = bf_object_to_array( $val ); // recursive
			}
		} else {
			$new_object = $object;
		}

		return $new_object;
	}
}


if ( ! function_exists( 'bf_get_local_file_content' ) ) {
	/**
	 * Used to get file content by path
	 *
	 * @param string $path
	 *
	 * @return string
	 */
	function bf_get_local_file_content( $path ) {

		if ( function_exists( 'file' . '_get' . '_contents' ) ) {
			return call_user_func( 'file' . '_get' . '_contents', $path );
		} else {
			ob_start();

			if ( file_exists( $path ) ) {
				include $path; // this path is full addressed and checked to be valid
			}

			return ob_get_clean();
		}

	}
}


if ( ! function_exists( 'bf_is_crawler' ) ) {
	/**
	 * Detect crawler.
	 *
	 * Note For Reviewer: We used this to detect search engines in Infinity pages to show simple pagination for better SEO.
	 *
	 * @return array
	 */
	function bf_is_crawler( $user_agent = '' ) {

		static $is_crawler;

		if ( ! is_null( $is_crawler ) ) {
			return $is_crawler;
		}

		if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			return $is_crawler = FALSE;
		}

		if ( empty( $user_agent ) ) {
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
		}

		$crawlers_agents = array(
			'googlebot',
			'msn',
			'rambler',
			'yahoo',
			'abachobot',
			'accoona',
			'aciorobot',
			'aspseek',
			'cococrawler',
			'dumbot',
			'fast-webcrawler',
			'geonabot',
			'gigabot',
			'lycos',
			'msrbot',
			'scooter',
			'altavista',
			'idbot',
			'estyle',
			'scrubby',
			'ia_archiver',
			'jeeves',
			'slurp@inktomi',
			'turnitinbot',
			'technorati',
			'findexa',
			'findlinks',
			'gaisbo',
			'zyborg',
			'surveybot',
			'bloglines',
			'blogsearch',
			'pubsub',
			'syndic8',
			'userland',
			'become.com',
			'baiduspider',
			'360spider',
			'spider',
			'sosospider',
			'yandex',
		);

		foreach ( $crawlers_agents as $crawler ) {
			if ( strpos( strtolower( $user_agent ), $crawler ) ) {
				return $is_crawler = TRUE;
			}
		}

		return $is_crawler = FALSE;

	} // bf_is_crawler
}


if ( ! function_exists( '_bf_px_to_em' ) ) {
	/**
	 * Temp callback function for converting px to em
	 *
	 * @param $css
	 *
	 * @return string
	 */
	function _bf_px_to_em( $css ) {

		return $css[1] / 12 . 'em';
	}
}

if ( ! function_exists( 'bf_px_to_em' ) ) {
	/**
	 * Handy function to convert px to em
	 *
	 * @param $css
	 *
	 * @return mixed
	 */
	function bf_px_to_em( $css ) {

		return preg_replace_callback( '/([0-9]+)px/', '_bf_px_to_em', $css );
	}
}


if ( ! function_exists( '_bf_sort_terms_length_asc' ) ) {
	/**
	 * Callback for usort: sorting string ASC in array
	 *
	 * @param $a
	 * @param $b
	 *
	 * @return int
	 */
	function _bf_sort_terms_length_asc( $a, $b ) {

		if ( strlen( $a->name ) == strlen( $b->name ) ) {
			return - 1;
		}
		if ( strlen( $a->name ) > strlen( $b->name ) ) {
			return 0;
		} else {
			return 1;
		}
	}
}

if ( ! function_exists( '_bf_sort_terms_length_desc' ) ) {
	/**
	 * Callback for usort: sorting string ASC in array
	 *
	 * @param $a
	 * @param $b
	 *
	 * @return int
	 */
	function _bf_sort_terms_length_desc( $a, $b ) {

		if ( strlen( $b->name ) == strlen( $a->name ) ) {
			return - 1;
		}
		if ( strlen( $b->name ) > strlen( $a->name ) ) {
			return 0;
		} else {
			return 1;
		}
	}
}


if ( ! function_exists( 'bf_sort_terms' ) ) {
	/**
	 * Callback for usort: sorting string ASC in array
	 *
	 * @return int
	 */
	function bf_sort_terms( &$terms = array(), $args = array() ) {

		$defaults = array(
			'orderby' => 'length',
			'order'   => 'desc',
		);

		$args = bf_merge_args( $args, $defaults );

		switch ( $args['orderby'] ) {

			// sort terms by name length
			case 'length':

				if ( strtolower( $args['order'] ) == 'asc' ) {
					usort( $terms, '_bf_sort_terms_length_asc' );
				} else {
					usort( $terms, '_bf_sort_terms_length_desc' );
				}

				break;

		}

	} // bf_sort_terms
}


if ( ! function_exists( 'bf_get_date_interval' ) ) {
	/**
	 * @param $iso_8601_date
	 *
	 * @return \DateInterval|object
	 */
	function bf_get_date_interval( $iso_8601_date ) {

		if ( class_exists( 'DateInterval' ) ) {
			return new DateInterval( $iso_8601_date );
		} else {

			/**
			 * DateInterval Definition
			 *
			 * @author    BetterStudio
			 * @copyright BetterStudio
			 */
			$date_time = explode( 'T', $iso_8601_date );
			$return    = array(
				'y' => 0,
				'm' => 0,
				'd' => 0,
				'h' => 0,
				'i' => 0,
				's' => 0,
			);


			$formats = array(
				//date format
				array(
					'y' => 'y',
					'm' => 'm',
					'd' => 'd',
				),
				//time format
				array(
					'h' => 'h',
					'm' => 'i',
					's' => 's'
				)
			);

			foreach ( $date_time as $format_id => $iso_8601 ) {

				if ( preg_match_all( '#(\d+)([a-z]{1})*#i', $iso_8601, $match ) ) {
					$length = count( $match[1] );

					for ( $i = 0; $i < $length; $i ++ ) {
						$number = intval( $match[1][ $i ] );
						$char   = strtolower( $match[2][ $i ] );

						if ( isset( $formats[ $format_id ][ $char ] ) ) {
							$idx = &$formats[ $format_id ][ $char ];

							$return[ $idx ] = $number;
						}

					}


				}
			}

			return (object) $return;
		}
	}
}


if ( ! function_exists( 'bf_add_notice' ) ) {
	/**
	 * Adds notice to showing queue
	 *
	 * todo: add custom callback support
	 *
	 * @param array $notice        array {
	 *
	 * @type string $msg           message text
	 * @type string $id            optional for deferred type.notice unique id
	 * @type string $state         optional. success|warning|danger - default:success
	 * @type string $thumbnail     optional. thumbnail image url
	 * @type array  $class         optional. notice custom classes
	 * @type string $type          optional. Notice type is one of the deferred|fixed. - default: deferred.
	 * @type array  $page          optional. display notice on specific page. its an array of $pagenow values
	 * @type bool   $dismissible   optional. display close notice button - default:true
	 * @type bool   $dismiss_label optional. dismiss button label - default:none
	 * }
	 *
	 * @since 2.5.7
	 * @return bool true on success or false on error.
	 */
	function bf_add_notice( $notice ) {

		return Better_Framework()->admin_notices()->add_notice( $notice );
	}
}


if ( ! function_exists( 'bf_remove_notice' ) ) {
	/**
	 * Remove a notice from notices storage
	 *
	 * todo: add custom callback support
	 *
	 * @since 2.14.0
	 *
	 * @param string|int|array $notice_id the notice unique id
	 *
	 * @return bool true on success or false on error.
	 */
	function bf_remove_notice( $notice_id ) {

		return Better_Framework()->admin_notices()->remove_notice( $notice_id );
	}
}


if ( ! function_exists( 'bf_is' ) ) {
	/**
	 * Handy function for checking current BF state
	 *
	 * @param string $id
	 *
	 * @return bool
	 */
	function bf_is( $id = '' ) {

		switch ( $id ) {

			/*
			 *
			 * Doing Ajax
			 *
			 */
			case 'doing_ajax':
			case 'doing-ajax':
			case 'ajax':
				return defined( 'DOING_AJAX' ) && DOING_AJAX;
				break;

			/*
			 *
			 * Development Mode
			 *
			 */
			case 'dev':
				return defined( 'BF_DEV_MODE' ) && BF_DEV_MODE;
				break;

			/*
			 *
			 * Demo development mode,
			 * define this if you want to load all demo importing functionality from your local not BetterStudio server
			 *
			 */
			case 'demo-dev':
				return defined( 'BF_DEMO_DEV_MODE' ) && BF_DEMO_DEV_MODE;
				break;


			default:
				return FALSE;
		}

	} // bf_is
}


if ( ! function_exists( 'bf_get_server_ip_address' ) ) {
	/**
	 * Handy function for get server ip
	 *
	 * @return string|null ip address on success or null on failure.
	 */
	function bf_get_server_ip_address() {

		$transient_id = 'bf_server_ip_address';

		if ( $server_ip = get_transient( $transient_id ) ) {
			return $server_ip;
		}

		global $is_IIS;

		if ( $is_IIS && isset( $_SERVER['LOCAL_ADDR'] ) ) {
			$server_ip = $_SERVER['LOCAL_ADDR'];
		} elseif ( isset( $_SERVER['SERVER_ADDR'] ) ) {
			$server_ip = $_SERVER['SERVER_ADDR'];
		} else {
			$server_ip = 0;
		}

		if ( ( $server_ip == 0 || $server_ip == '127.0.0.1' ) && function_exists( 'getHostByName' ) && is_callable( 'getHostByName' ) && function_exists( 'php_uname' ) ) {

			$server_ip = getHostByName( php_uname( 'n' ) );

			set_transient( $transient_id, $server_ip, HOUR_IN_SECONDS * 2 );

			return $server_ip;
		}

		//if ( $ip === '::1' || filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) !== FALSE ) {
		if ( $server_ip === '::1' || filter_var( $server_ip, FILTER_VALIDATE_IP ) !== FALSE ) {
			return $server_ip;
		}

		return NULL;
	}
}


if ( ! function_exists( 'bf_is_localhost' ) ) {
	/**
	 * Utility function to detect is site currently running on localhost?
	 *
	 * @return bool
	 */
	function bf_is_localhost() {

		$server_ip      = bf_get_server_ip_address();
		$server_ip_long = ip2long( $server_ip );

		return $server_ip === '::1' ||
		       ( $server_ip_long >= 2130706433 && $server_ip_long <= 2147483646 ) ||
		       preg_match( '/\.local(:?host)?$/', $server_ip );
	}
}

if ( ! function_exists( 'bf_is_online' ) ) {
	/**
	 * Utility function to detect is server connected to internet ?
	 *
	 * @return bool
	 */
	function bf_is_online() {

		if ( bf_is_localhost() ) {

			$test = wp_remote_get( 'http://api.wordpress.org/core/version-check/1.7/' );

			return ! is_wp_error( $test );
		}

		return TRUE;
	}
}


if ( ! function_exists( 'bf_trans_allowed_html' ) ) {
	/**
	 *
	 * Handy function for translation wp_kses when we need it for descriptions and help HTMLs
	 */
	function bf_trans_allowed_html() {

		return array(
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'id'     => array(),
				'class'  => array(),
				'rel'    => array(),
				'style'  => array(),
			),
			'span'   => array(
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'p'      => array(
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'strong' => array(
				'class' => array(),
				'style' => array(),
			),
			'hr'     => array(
				'class' => array(),
			),
			'br'     => '',
			'b'      => '',
			'h6'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h5'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h4'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h3'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h2'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h1'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'code'   => array(
				'class' => array(),
				'id'    => array(),
			),
			'em'     => array(
				'class' => array(),
			),
			'i'      => array(
				'class' => array(),
			),
			'img'    => array(
				'class' => array(),
				'style' => array(),
			),
			'label'  => array(
				'for'   => array(),
				'style' => array(),
			),
			'ol'     => array(
				'class' => array(),
			),
			'ul'     => array(
				'class' => array(),
			),
			'li'     => array(
				'class' => array(),
			),
		);
	}
}

if ( ! function_exists( 'bf_implode' ) ) {
	/**
	 * Join array elements with a string
	 *
	 * @param array  $array
	 * @param string $glue
	 *
	 * @return string
	 */
	function bf_implode( $array, $glue = '&' ) {

		return implode( $glue, $array );
	}
}
if ( ! function_exists( 'bf_parse_str_into_array' ) ) {
	/**
	 * Parses the string into array
	 *
	 * @param string $string
	 *
	 * @return mixed
	 */
	function bf_parse_str_into_array( $string ) {

		parse_str( $string, $array );

		return $array;
	}
}
if ( ! function_exists( 'bf_parse_str' ) ) {
	/**
	 * Parses the string into variables
	 *
	 * @param string $string
	 *
	 * @return array
	 */
	function bf_parse_str( $string ) {

		$max_vars = @ini_get( 'max_input_vars' );
		$max_vars = $max_vars ? $max_vars : 500;

		$array = explode( '&', $string );
		$array = array_chunk( $array, $max_vars );

		$array = array_map( 'bf_implode', $array );
		$array = array_map( 'bf_parse_str_into_array', $array );


		$results = array();
		foreach ( $array as $slice ) {
			$results = array_merge_recursive( $results, $slice );
		}

		return $results;
	}
}

if ( ! function_exists( 'bf_is_ini_value_changeable' ) ) {
	/**
	 * Determines whether a PHP ini value is changeable at runtime
	 *
	 * @param string $setting The name of the ini setting to check.
	 *
	 * @return bool True if the value is changeable at runtime. False otherwise.
	 */
	function bf_is_ini_value_changeable( $setting = 'memory_limit' ) {

		if ( is_callable( 'wp_is_ini_value_changeable' ) ) {
			$args = func_get_args();

			if ( empty( $args ) ) {
				$args = array(
					$setting
				);
			}

			return call_user_func_array( 'wp_is_ini_value_changeable', $args );
		}

		/**
		 * implementation of wp_is_ini_value_changeable
		 */

		static $ini_all;

		if ( ! isset( $ini_all ) ) {
			$ini_all = ini_get_all();
		}

		// Bit operator to workaround https://bugs.php.net/bug.php?id=44936 which changes access level to 63 in PHP 5.2.6 - 5.2.17.
		if ( isset( $ini_all[ $setting ]['access'] ) && ( INI_ALL === ( $ini_all[ $setting ]['access'] & 7 ) || INI_USER === ( $ini_all[ $setting ]['access'] & 7 ) ) ) {
			return TRUE;
		}

		return FALSE;
	}
}

if ( ! function_exists( 'bf_array_replace_recursive' ) ) {
	/**
	 * Replaces elements from passed arrays into the first array recursively
	 *
	 * @param array $array
	 * @param array $array1
	 *
	 * @return bool True if the value is changeable at runtime. False otherwise.
	 */
	function bf_array_replace_recursive( $array, $array1 ) {

		$args = func_get_args();

		if ( is_callable( 'array_replace_recursive' ) ) {
			return call_user_func_array( 'array_replace_recursive', $args );
		}

		// handle the arguments, merge one by one
		$array = $args[0];
		if ( ! is_array( $array ) ) {
			return $array;
		}

		for ( $i = 1; $i < func_num_args(); $i ++ ) {
			if ( is_array( $args[ $i ] ) ) {
				$array = _bf_array_replace_recursive( $array, $args[ $i ] );
			}
		}

		return $array;
	}

	if ( ! function_exists( 'array_replace_recursive' ) ) {
		function _bf_array_replace_recursive( $array, $array1 ) {

			foreach ( $array1 as $key => $value ) {
				// create new key in $array, if it is empty or not an array
				if ( ! isset( $array[ $key ] ) || ( isset( $array[ $key ] ) && ! is_array( $array[ $key ] ) ) ) {
					$array[ $key ] = array();
				}

				// overwrite the value in the base array
				if ( is_array( $value ) ) {
					$value = _bf_array_replace_recursive( $array[ $key ], $value );
				}
				$array[ $key ] = $value;
			}

			return $array;
		}
	}
}

if ( ! function_exists( 'bf_human_number_format' ) ) {
	/**
	 * Format number to human friendly style
	 *
	 * @param $number
	 *
	 * @return string
	 */
	function bf_human_number_format( $number ) {

		if ( ! is_numeric( $number ) ) {
			return $number;
		}

		if ( $number >= 1000000 ) {
			return round( ( $number / 1000 ) / 1000, 1 ) . "M";
		} elseif ( $number >= 100000 ) {
			return round( $number / 1000, 0 ) . "k";
		} else {
			return @number_format( $number );
		}

	}
}


if ( ! function_exists( 'bf_merge_args' ) ) {
	/**
	 * Merges 2 array quickly
	 *
	 * @param array $args
	 * @param array $default
	 *
	 * @return array
	 */
	function bf_merge_args( $args, array $default = array() ) {

		if ( is_string( $args ) ) {
			$_args = array();
			$args  = wp_parse_str( $args, $_args );
			$args  = $_args;
		}

		if ( empty( $default ) ) {
			return $args;
		}

		foreach ( $default as $_def => $value ) {
			if ( ! isset( $args[ $_def ] ) ) {
				$args[ $_def ] = $value;
			}
		}

		return $args;
	}
}


if ( ! function_exists( 'bf_map_deep' ) ) {

	/**
	 * Maps a function to all non-iterable elements of an array or an object.
	 *
	 * @param mixed    $value    The array, object, or scalar.
	 * @param callable $callback The function to map onto $value.
	 *
	 * @see map_deep
	 * @return mixed
	 */
	function bf_map_deep( $value, $callback ) {

		if ( function_exists( 'map_deep' ) ) {
			return map_deep( $value, $callback );
		}

		/**
		 * map_deep function implementation for WP < 4.4.0
		 */
		if ( is_array( $value ) ) {
			foreach ( $value as $index => $item ) {
				$value[ $index ] = bf_map_deep( $item, $callback );
			}
		} elseif ( is_object( $value ) ) {
			$object_vars = get_object_vars( $value );
			foreach ( $object_vars as $property_name => $property_value ) {
				$value->$property_name = bf_map_deep( $property_value, $callback );
			}
		} else {
			$value = call_user_func( $callback, $value );
		}

		return $value;
	}
}


if ( ! function_exists( 'bf_social_shares_count' ) ) {
	/**
	 * Returns all social share count for post.
	 *
	 * @param $sites
	 *
	 * @return array|mixed|void
	 */
	function bf_social_shares_count( $sites ) {

		$sites = array_intersect_key( $sites, array( // Valid sites
		                                             'facebook'    => '',
		                                             'twitter'     => '',
		                                             'google_plus' => '',
		                                             'pinterest'   => '',
		                                             'linkedin'    => '',
		                                             'tumblr'      => '',
		                                             'reddit'      => '',
		                                             'stumbleupon' => '',
		) );

		// Disable social share in localhost
		if ( bf_is_localhost() ) {
			return array();
		}

		$post_id = get_the_ID();
		$expired = (int) get_post_meta( $post_id, 'bs_social_share_interval', TRUE );
		$results = array();

		$update_cache = FALSE;

		if ( $expired < time() ) {
			$update_cache = TRUE;
		} else {

			// get count from cache storage
			foreach ( $sites as $site_id => $is_active ) {
				if ( ! $is_active ) {
					continue;
				}

				$count_number = get_post_meta( $post_id, 'bs_social_share_' . $site_id, TRUE );
				$update_cache = $count_number === '';

				if ( $update_cache ) {
					break;
				}

				$results[ $site_id ] = $count_number;
			}
		}

		if ( $update_cache ) { // Update cache storage if needed
			$current_page = bf_social_share_guss_current_page();

			foreach ( $sites as $site_id => $is_active ) {
				if ( ! $is_active ) {
					continue;
				}

				$count_number = bf_social_share_fetch_count( $site_id, $current_page['page_permalink'] );

				update_post_meta( $post_id, 'bs_social_share_' . $site_id, $count_number );

				$results[ $site_id ] = $count_number;
			}

			/**
			 *
			 * This filter can be used to change share count time.
			 *
			 */
			$cache_time = apply_filters( 'bs-social-share/cache-time', MINUTE_IN_SECONDS * 120, $post_id );

			update_post_meta( $post_id, 'bs_social_share_interval', time() + $cache_time );
		}

		return apply_filters( 'bs-social-share/shares-count', $results );
	} // bf_social_shares_count
}


if ( ! function_exists( 'bf_social_share_guss_current_page' ) ) {
	/**
	 * Detects and returns current page info for social share
	 *
	 * @param WP_Query $query
	 *
	 * @return array
	 */
	function bf_social_share_guss_current_page( $query = NULL ) {

		if ( is_null( $query ) ) {
			global $wp_query;
			$query = $wp_query;
		}

		if ( bf_is_doing_ajax() ) {
			$page_title = get_the_title();

			if ( bf_social_share_permalink_type() === 'permalink' ) {
				$page_permalink = get_the_permalink();
			} else {
				$page_permalink = wp_get_shortlink();
			}
		} elseif ( $query->is_singular() ) {
			$page_title = get_the_title();

			if ( bf_social_share_permalink_type() === 'permalink' ) {
				$page_permalink = get_the_permalink();
			} else {
				$page_permalink = wp_get_shortlink();
			}
		} elseif ( $query->is_home() || $query->is_front_page() ) {
			$page_title     = get_bloginfo( 'name' );
			$page_permalink = home_url( '/' );
		} elseif ( $query->is_category() || $query->is_tag() || $query->is_tax() ) {
			$page_title     = single_term_title( '', FALSE );
			$page_permalink = '';

			if ( bf_social_share_permalink_type() === 'shortlink' ) {

				$queried_object = get_queried_object();

				if ( ! empty( $queried_object->taxonomy ) ) {

					if ( 'category' == $queried_object->taxonomy ) {
						$page_permalink = "?cat=$queried_object->term_id";
					} else {
						$tax = get_taxonomy( $queried_object->taxonomy );

						if ( $tax->query_var ) {
							$page_permalink = "?$tax->query_var=$queried_object->slug";
						} else {
							$page_permalink = "?taxonomy=$queried_object->taxonomy&term=$queried_object->term_id";
						}
					}

					$page_permalink = home_url( $page_permalink );
				}
			}

			if ( empty( $page_permalink ) ) {
				$page_permalink = get_term_link( $query->get_queried_object_id() );
			}

		} else {
			$page_title     = get_bloginfo( 'name' );
			$page_permalink = get_home_url();
		}

		if ( ! empty( $page_title ) ) {
			$page_title = urlencode( strip_tags( $page_title ) );
		}

		return compact( 'page_title', 'page_permalink' );
	}
}


if ( ! function_exists( 'bf_social_share_permalink_type' ) ) {
	/**
	 * Returns permalink type for share system
	 *
	 * @return array
	 */
	function bf_social_share_permalink_type() {

		static $type;

		if ( $type ) {
			return $type;
		}

		return $type = apply_filters( 'better-framework/share/permalink/type', 'permalink' );
	}
}


if ( ! function_exists( 'bf_social_share_fetch_count' ) ) {
	/**
	 * Fetches share count for URL
	 *
	 * @param $site_id
	 * @param $url
	 *
	 * @return int
	 */
	function bf_social_share_fetch_count( $site_id, $url ) {

		$count       = 0;
		$remote_args = array(
			'sslverify' => FALSE,
		);

		switch ( $site_id ) {

			case 'facebook':

				static $fb_api;

				if ( ! $fb_api ) {
					$fb_api = apply_filters( 'better-framework/api/token/facebook', array(
						'id'     => '',
						'secret' => '',
					) );
				}

				if ( ! empty( $fb_api['id'] ) && ! empty( $fb_api['secret'] ) ) {
					$api_url = 'https://graph.facebook.com/v2.9/?id=' . urlencode( $url ) . '&fields=engagement&access_token=' . $fb_api['id'] . '|' . $fb_api['secret'];
				} else {
					$api_url = 'http://graph.facebook.com/?id=' . urlencode( $url );
				}

				$remote = wp_remote_get( $api_url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( wp_remote_retrieve_body( $remote ), TRUE );

					$count = 0;

					if ( isset( $response['engagement']['reaction_count'] ) ) {
						$count += $response['engagement']['reaction_count'];
					}

					if ( isset( $response['engagement']['comment_count'] ) ) {
						$count += $response['engagement']['comment_count'];
					}

					if ( isset( $response['engagement']['comment_plugin_count'] ) ) {
						$count += $response['engagement']['comment_plugin_count'];
					}

					if ( isset( $response['engagement']['share_count'] ) ) {
						$count += $response['engagement']['share_count'];
					} elseif ( isset( $response['share']['share_count'] ) ) {
						$count += $response['share']['share_count'];
					}
				}

				// FB limit
				if ( wp_remote_retrieve_response_code( $remote ) == 403 ) {
					Better_Framework()->admin_notices()->add_notice( array(
						'type'        => 'static',
						'dismissible' => TRUE,
						'id'          => 'share-facebook-rate-limit',
						'state'       => 'warning',
						'msg'         => __( 'Facebook API rate limitation was reached. You\'r site will have some limitation in Facebook share count.', 'better-studio' ),
						'user_role'   => array( 'administrator' ),
					) );
				}

				break;

			case 'twitter':

				$remote = wp_remote_get( 'http://public.newsharecounts.com/count.json?callback=&url=' . $url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( wp_remote_retrieve_body( $remote ), TRUE );

					if ( isset( $response['count'] ) ) {
						$count = $response['count'];
					}

				}

				break;

			case 'google_plus':
				$post_data = '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . rawurldecode( $url ) . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]';

				$remote = wp_remote_post( 'https://clients6.google.com/rpc', array(
					'body'      => $post_data,
					'headers'   => 'Content-type: application/json',
					'sslverify' => FALSE,
				) );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( wp_remote_retrieve_body( $remote ), TRUE );

					if ( isset( $response[0]['result']['metadata']['globalCounts']['count'] ) ) {
						$count = $response[0]['result']['metadata']['globalCounts']['count'];
					}

				}

				break;

			case 'pinterest':
				$remote = wp_remote_get( 'http://api.pinterest.com/v1/urls/count.json?callback=CALLBACK&url=' . $url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					if ( preg_match( '/^\s*CALLBACK\s*\((.+)\)\s*$/', wp_remote_retrieve_body( $remote ), $match ) ) {
						$response = json_decode( $match[1], TRUE );

						if ( isset( $response['count'] ) ) {
							$count = $response['count'];
						}
					}

				}

				break;

			case 'linkedin':
				$remote = wp_remote_get( 'https://www.linkedin.com/countserv/count/share?format=json&url=' . $url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( wp_remote_retrieve_body( $remote ), TRUE );

					if ( isset( $response['count'] ) ) {
						$count = $response['count'];
					}

				}

				break;

			case 'tumblr':
				$remote = wp_remote_get( 'http://api.tumblr.com/v2/share/stats?url=' . $url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( wp_remote_retrieve_body( $remote ), TRUE );

					if ( isset( $response['response']['note_count'] ) ) {
						$count = $response['response']['note_count'];
					}

				}

				break;


			case 'reddit':
				$remote = wp_remote_get( 'http://www.reddit.com/api/info.json?url=' . $url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( $remote['body'], TRUE );

					if ( isset( $response['data']['children']['0']['data']['score'] ) ) {
						$count = $response['data']['children']['0']['data']['score'];
					}

				}

				break;

			case 'stumbleupon':
				$remote = wp_remote_get( 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $url, $remote_args );

				if ( ! is_wp_error( $remote ) ) {

					$response = json_decode( $remote['body'], TRUE );

					if ( isset( $response['result']['views'] ) ) {
						$count = $response['result']['views'];
					}

				}


				break;

		}

		return $count;
	} // bf_social_share_fetch_count
}

if ( ! function_exists( 'bf_esc_file_path' ) ) {

	/**
	 * Sanitize file path
	 *
	 * @param string $path
	 *
	 * @since 2.9.0
	 * @return string
	 */
	function bf_esc_file_path( $path ) {

		$path = str_replace( '/./', '/', $path );
		if ( strstr( $path, '..' ) ) {
			$join = explode( '/', $path );
			$key  = - 1;
			foreach ( $join as $j ) {
				$key ++;
				if ( trim( $j ) == '..' ) {
					unset( $join[ $key - 1 ] );
					unset( $join[ $key ] );
					$key  -= 2;
					$join = array_merge( $join, array() );//sort keys
				}
			}
			$path = implode( '/', $join );
		}

		return $path;
	}
}


if ( ! function_exists( 'bf_array_insert_before' ) ) {

	/**
	 * Inserts a new key/value before the key in the array.
	 *
	 * @param  string $key       The key to insert before.
	 * @param  array  $array     An array to insert in to.
	 * @param  string $new_key   The key to insert.
	 * @param  mixed  $new_value An value to insert.
	 *
	 * @since 2.10.0
	 * @return array The new array if the key exists, FALSE otherwise.
	 */
	function bf_array_insert_before( $key, array &$array, $new_key, $new_value ) {

		if ( array_key_exists( $key, $array ) ) {
			$new = array();
			foreach ( $array as $k => $value ) {
				if ( $k === $key ) {
					$new[ $new_key ] = $new_value;
				}
				$new[ $k ] = $value;
			}

			return $new;
		}

		return FALSE;
	}
}


if ( ! function_exists( 'bf_array_insert_after' ) ) {

	/**
	 * Inserts a new key/value after the key in the array.
	 *
	 * @param string $key       The key to insert after.
	 * @param array  $array     An array to insert in to.
	 * @param string $new_key   The key to insert.
	 * @param mixed  $new_value An value to insert.
	 *
	 * @since 2.10.0
	 * @return array The new array if the key exists, FALSE otherwise.
	 */
	function bf_array_insert_after( $key, array &$array, $new_key, $new_value ) {

		if ( array_key_exists( $key, $array ) ) {

			$new = array();

			foreach ( $array as $k => $value ) {

				$new[ $k ] = $value;

				if ( $k === $key ) {
					$new[ $new_key ] = $new_value;
				}
			}

			return $array = $new;

		} else {
			$array[ $new_key ] = $new_value;
		}

		return $array;
	}
}


if ( ! function_exists( 'bf_list_attributes' ) ) {

	/**
	 * List all html tag attributes
	 *
	 * @note
	 *
	 * use wp_kses_hair to parse attributes in more detail
	 *
	 * @param string $tag
	 *
	 * @note  use wp_kses_hair to parse attributes in more detail
	 *
	 * @since 2.10.0
	 * @return array|bool array on success or false on failure.
	 */
	function bf_list_attributes( $tag ) {

		if ( ! preg_match_all( "'\s+(.*?)\s*=\s*	    # find  attribute=
						([\"\'])?					    # find single or double quote
						(?(2) (.*?)\\2 | ([^\s\>]+))	# if quote found, match up to next matching
						'isx", $tag, $match )
		) {
			return FALSE;
		}

		$atts = array();

		foreach ( $match[1] as $index => $attr_key ) {

			$value_index = $match[2][ $index ] ? 3 : 4;
			$attr_value  = $match[ $value_index ][ $index ];

			$atts[ $attr_key ] = $attr_value;
		}

		return $atts;
	}
}


if ( ! function_exists( 'bf_get_align' ) ) {
	/**
	 * Get current direction
	 *
	 * @param boolean $opposite
	 *
	 * @since 2.10.0
	 * @return string
	 */
	function bf_get_align( $opposite = FALSE ) {

		return ( ( is_rtl() xor $opposite ) ? 'right' : 'left' );
	}
}


if ( ! function_exists( '_bf_reverse_right_left' ) ) {
	/**
	 *
	 *
	 * @param array $matches
	 *
	 * @use   private
	 *
	 * @since 2.10.0
	 * @return string
	 */
	function _bf_reverse_right_left( $matches ) {

		return $matches[1] === 'right' ? 'left' : 'right';
	}
}


if ( ! function_exists( 'bf_reverse_direction' ) ) {
	/**
	 * Reverse right/left words in RTL site direction
	 *
	 * @param string $string
	 *
	 * @since 2.10.0
	 * @return string
	 */
	function bf_reverse_direction( $string ) {

		if ( is_rtl() ) {
			$string = preg_replace_callback( '/\b(left|right)\b/', '_bf_reverse_right_left', $string );
		}

		return $string;
	}
}


if ( ! function_exists( 'bf_remove_class_filter' ) ) {
	/**
	 * Remove Class Filter Without Access to Class Object
	 *
	 * In order to use the core WordPress remove_filter() on a filter added with the callback
	 * to a class, you either have to have access to that class object, or it has to be a call
	 * to a static method.  This method allows you to remove filters with a callback to a class
	 * you don't have access to.
	 *
	 * Works with WordPress 1.2+ (4.7+ support added 9-19-2016)
	 * Updated 2-27-2017 to use internal WordPress removal for 4.7+ (to prevent PHP warnings output)
	 *
	 * @param string $tag         Filter to remove
	 * @param string $class_name  Class name for the filter's callback
	 * @param string $method_name Method name for the filter's callback
	 * @param int    $priority    Priority of the filter (default 10)
	 *
	 *
	 * Copyright: https://gist.github.com/tripflex/c6518efc1753cf2392559866b4bd1a53
	 *
	 * @return bool Whether the function is removed.
	 */
	function bf_remove_class_filter( $tag, $class_name = '', $method_name = '', $priority = 10 ) {

		global $wp_filter;

		// Check that filter actually exists first
		if ( ! isset( $wp_filter[ $tag ] ) ) {
			return FALSE;
		}

		/**
		 * If filter config is an object, means we're using WordPress 4.7+ and the config is no longer
		 * a simple array, rather it is an object that implements the ArrayAccess interface.
		 *
		 * To be backwards compatible, we set $callbacks equal to the correct array as a reference (so $wp_filter is updated)
		 *
		 * @see https://make.wordpress.org/core/2016/09/08/wp_hook-next-generation-actions-and-filters/
		 */
		if ( is_object( $wp_filter[ $tag ] ) && isset( $wp_filter[ $tag ]->callbacks ) ) {
			// Create $fob object from filter tag, to use below
			$fob       = $wp_filter[ $tag ];
			$callbacks = &$wp_filter[ $tag ]->callbacks;
		} else {
			$callbacks = &$wp_filter[ $tag ];
		}

		// Exit if there aren't any callbacks for specified priority
		if ( ! isset( $callbacks[ $priority ] ) || empty( $callbacks[ $priority ] ) ) {
			return FALSE;
		}

		// Loop through each filter for the specified priority, looking for our class & method
		foreach ( (array) $callbacks[ $priority ] as $filter_id => $filter ) {
			// Filter should always be an array - array( $this, 'method' ), if not goto next
			if ( ! isset( $filter['function'] ) || ! is_array( $filter['function'] ) ) {
				continue;
			}
			// If first value in array is not an object, it can't be a class
			if ( ! is_object( $filter['function'][0] ) ) {
				continue;
			}
			// Method doesn't match the one we're looking for, goto next
			if ( $filter['function'][1] !== $method_name ) {
				continue;
			}
			// Method matched, now let's check the Class
			if ( get_class( $filter['function'][0] ) === $class_name ) {
				// WordPress 4.7+ use core remove_filter() since we found the class object
				if ( isset( $fob ) ) {
					// Handles removing filter, reseting callback priority keys mid-iteration, etc.
					$fob->remove_filter( $tag, $filter['function'], $priority );
				} else {
					// Use legacy removal process (pre 4.7)
					unset( $callbacks[ $priority ][ $filter_id ] );
					// and if it was the only filter in that priority, unset that priority
					if ( empty( $callbacks[ $priority ] ) ) {
						unset( $callbacks[ $priority ] );
					}
					// and if the only filter for that tag, set the tag to an empty array
					if ( empty( $callbacks ) ) {
						$callbacks = array();
					}
					// Remove this filter from merged_filters, which specifies if filters have been sorted
					unset( $GLOBALS['merged_filters'][ $tag ] );
				}

				return TRUE;
			}
		}

		return FALSE;
	} // bf_remove_class_filter
}


if ( ! function_exists( 'bf_remove_class_action' ) ) {
	/**
	 * Remove Class Action Without Access to Class Object
	 *
	 * In order to use the core WordPress remove_action() on an action added with the callback
	 * to a class, you either have to have access to that class object, or it has to be a call
	 * to a static method.  This method allows you to remove actions with a callback to a class
	 * you don't have access to.
	 *
	 * Works with WordPress 1.2+ (4.7+ support added 9-19-2016)
	 *
	 * @param string $tag         Action to remove
	 * @param string $class_name  Class name for the action's callback
	 * @param string $method_name Method name for the action's callback
	 * @param int    $priority    Priority of the action (default 10)
	 *
	 * Copyright: https://gist.github.com/tripflex/c6518efc1753cf2392559866b4bd1a53
	 *
	 * @return bool               Whether the function is removed.
	 */
	function bf_remove_class_action( $tag, $class_name = '', $method_name = '', $priority = 10 ) {

		return bf_remove_class_filter( $tag, $class_name, $method_name, $priority );
	}
}


if ( ! function_exists( 'bf_item_can_shown' ) ) {
	/**
	 * detects item can shown or not
	 *
	 * @param array $item
	 *
	 * @return bool
	 */
	function bf_item_can_shown( $item = array() ) {

		if ( empty( $item ) ) {
			return FALSE;
		}

		// Page filter
		if ( ! empty( $item['page'] ) ) {

			if ( is_admin() ) {
				global $pagenow;

				return in_array( $pagenow, (array) $item['page'] );
			}
		}


		// User role filter
		if ( ! empty( $item['user_role'] ) ) {

			if ( is_string( $item['user_role'] ) ) {
				$item['user_role'] = array( $item['user_role'] );
			}

			$user = wp_get_current_user();

			if ( ! array_intersect( $item['user_role'], (array) $user->roles ) ) {
				return FALSE;
			}
		}

		return TRUE;
	}
}


if ( ! function_exists( 'bf_render_css_block_array' ) ) {
	/**
	 * Converts BF CSS Array to CSS code
	 *
	 * @param array $block
	 * @param       $value
	 *
	 * @return array
	 */
	function bf_render_css_block_array( $block, $value ) {

		if ( empty( $block ) || ! is_array( $block ) ) {
			return array( 'code' => '' );
		}

		$result = array(
			'code' => '',
		);

		$skip_validation = empty( $block['skip_validation'] );

		// if value is empty
		if ( ( $value === FALSE || $value == '' ) && $skip_validation ) {
			return $result;
		} elseif ( ! $skip_validation ) {
			unset( $block['skip_validation'] );
		}

		// Custom callbacks for generating CSS
		if ( isset( $block['callback'] ) && is_callable( $block['callback'] ) ) {
			call_user_func_array( $block['callback'], array( &$block, &$value ) );
		}


		$after_value = '';
		$after_block = '';

		// Uncompressed in dev mode
		if ( bf_is( 'dev' ) ) {
			$ln_char  = "\n";
			$tab_char = "\t";
		} else {
			$ln_char  = "";
			$tab_char = "";
		}

		if ( isset( $block['newline'] ) ) {
			$result['code'] .= "\r\n";
		}

		if ( isset( $block['comment'] ) || ! empty( $block['comment'] ) ) {
			$result['code'] .= '/* ' . $block['comment'] . ' */' . "\r\n";
		}


		// Filters
		if ( isset( $block['filter'] ) ) {

			//
			// Last versions compatibility
			//
			if ( ( $index = array_search( 'woocommerce', $block['filter'] ) ) !== FALSE ) {
				$block['filter'][ $index ] = array(
					'type'      => 'function',
					'condition' => 'is_woocommerce',
				);
			}
			if ( ( $index = array_search( 'bbpress', $block['filter'] ) ) !== FALSE ) {
				$block['filter'][ $index ] = array(
					'type'      => 'class',
					'condition' => 'bbpress',
				);
			}
			if ( ( $index = array_search( 'buddypress', $block['filter'] ) ) !== FALSE ) {
				$block['filter'][ $index ] = array(
					'type'      => 'function',
					'condition' => 'bp_is_active',
				);
			}

			if ( ( $index = array_search( 'wpml', $block['filter'] ) ) !== FALSE ) {
				$block['filter'][ $index ] = array(
					'type'      => 'constantn',
					'condition' => 'ICL_SITEPRESS_VERSIOe',
				);
			}

			//
			// /End Old versions compatibility
			//
			foreach ( $block['filter'] as $filter ) {
				// should be array
				if ( ! is_array( $filter ) ) {
					continue;
				}

				switch ( $filter['type'] ) {

					case 'function':
						if ( ! function_exists( $filter['condition'] ) ) {
							return array(
								'code' => ''
							);
						}
						break;

					case 'class':
						if ( ! class_exists( $filter['condition'] ) ) {
							return array(
								'code' => ''
							);
						}
						break;

					case 'constant':
						if ( ! defined( $filter['condition'] ) ) {
							return array(
								'code' => ''
							);
						}
						break;

				}

			}

		}

		// Before than css code. For example used for adding media queries!.
		if ( isset( $block['before'] ) ) {

			if ( is_string( $value ) ) {
				$result['code'] .= str_replace( '%%value%%', $value, $block['before'] ) . $ln_char;
			} else {
				$result['code'] .= $block['before'] . $ln_char;
			}
		}

		// Prepare Selectors.
		if ( isset( $block['selector'] ) ) {
			if ( ! is_array( $block['selector'] ) ) {
				$result['code'] .= $block['selector'] . '{' . $ln_char;
			} else {
				$result['code'] .= implode( ',' . $ln_char, $block['selector'] ) . '{' . $ln_char;
			}
		}

		// Prepare Value For Font Field
		if ( isset( $block['type'] ) && $block['type'] == 'font' ) {

			// If font is not enable then don't echo css
			if ( isset( $value['enable'] ) && ! $value['enable'] ) {
				return array(
					'code' => ''
				);
			}

			if ( isset( $block['exclude'] ) ) {
				foreach ( (array) $block['exclude'] as $exclude ) {
					unset( $value[ $exclude ] );
				}
			}

			$font_stacks = Better_Framework::fonts_manager()->font_stacks()->get_font( $value['family'] );

			if ( isset( $block['important-attr'] ) && in_array( 'font-family', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( $font_stacks ) {
				$result['code'] .= $tab_char . 'font-family:' . $font_stacks['stack'] . $_temp . ';' . $ln_char;
			} else {
				$result['code'] .= $tab_char . 'font-family:\'' . $value['family'] . $_temp . '\';' . $ln_char;
			}

			// new api fix
			if ( $value['variant'] == 'regular' ) {
				$value['variant'] = '400';
			} elseif ( $value['variant'] == 'italic' ) {
				$value['variant'] = '400italic';
			}

			if ( preg_match( '/\d{3}\w./i', $value['variant'] ) ) {
				$pretty_variant = preg_replace( '/(\d{3})/i', '${1} ', $value['variant'] );
				$pretty_variant = explode( ' ', $pretty_variant );
			} else {
				$pretty_variant[] = $value['variant'];
			}

			if ( isset( $block['important-attr'] ) && in_array( 'font-weight', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $pretty_variant[0] ) ) {
				$result['code'] .= $tab_char . 'font-weight:' . $pretty_variant[0] . $_temp . ';' . $ln_char;
			}

			if ( isset( $block['important-attr'] ) && in_array( 'font-style', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $pretty_variant[1] ) ) {
				$result['code'] .= $tab_char . 'font-style:' . $pretty_variant[1] . $_temp . ';' . $ln_char;
			}


			$line_height_id = 'line-height';

			if ( isset( $value['line_height'] ) ) {
				$line_height_id = 'line_height';
			} // older versions compatibility

			if ( isset( $block['important-attr'] ) && in_array( $line_height_id, $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $value[ $line_height_id ] ) && ! empty( $value[ $line_height_id ] ) ) {
				$result['code'] .= $tab_char . 'line-height:' . $value[ $line_height_id ] . 'px;' . $_temp . $ln_char;
			}

			if ( isset( $block['important-attr'] ) && in_array( 'size', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $value['size'] ) ) {
				$result['code'] .= $tab_char . 'font-size:' . $value['size'] . 'px;' . $_temp . $ln_char;
			}

			if ( isset( $block['important-attr'] ) && in_array( 'align', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $value['align'] ) ) {
				$result['code'] .= $tab_char . 'text-align:' . $value['align'] . $_temp . ';' . $ln_char;
			}

			if ( isset( $block['important-attr'] ) && in_array( 'transform', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $value['transform'] ) ) {
				$result['code'] .= $tab_char . 'text-transform:' . $value['transform'] . $_temp . ';' . $ln_char;
			}

			if ( isset( $block['important-attr'] ) && in_array( 'color', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( isset( $value['color'] ) ) {
				$result['code'] .= $tab_char . 'color:' . $value['color'] . $_temp . ';' . $ln_char;
			}

			if ( isset( $block['important-attr'] ) && in_array( 'letter-spacing', $block['important-attr'] ) ) {
				$_temp = '!important';
			} else {
				$_temp = '';
			}

			if ( ! empty( $value['letter-spacing'] ) ) {
				$result['code'] .= $tab_char . 'letter-spacing:' . $value['letter-spacing'] . $_temp . ';' . $ln_char;
			}

			// Add Font To Fonts Queue
			$result['font'] = array(
				'family'  => $value['family'],
				'variant' => $value['variant'],
				'subset'  => $value['subset'],
			);
		}

		// prepare value for "background-image" type
		if ( isset( $block['type'] ) && $block['type'] == 'background-image' ) {

			if ( empty( $value['img'] ) ) {
				return array(
					'code' => ''
				);
			}

			// Full Cover Image
			if ( $value['type'] == 'cover' ) {
				$after_value .= $tab_char . 'background-repeat: no-repeat;background-position: center center; -webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover; background-size: cover;'
				                . 'filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' . $value['img'] . '\', sizingMethod=\'scale\');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' . $value['img'] . '\', sizingMethod=\'scale\')";'
				                . $ln_char;

				$value = 'url(' . $value['img'] . ')';
			} // Fit Cover
			elseif ( $value['type'] == 'fit-cover' ) {
				$after_value .= $tab_char . 'background-repeat: no-repeat;background-position: center center; -webkit-background-size: contain; -moz-background-size: contain;-o-background-size: contain; background-size: contain;'
				                . 'filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' . $value['img'] . '\', sizingMethod=\'scale\');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' . $value['img'] . '\', sizingMethod=\'scale\')";'
				                . $ln_char;

				$value = 'url(' . $value['img'] . ')';
			} // Parallax Image
			elseif ( $value['type'] == 'parallax' ) {
				$after_value .= $tab_char . 'background-repeat: no-repeat;background-attachment: fixed; background-position: center center; -webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover; background-size: cover;'
				                . 'filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' . $value['img'] . '\', sizingMethod=\'scale\');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' . $value['img'] . '\', sizingMethod=\'scale\')";'
				                . $ln_char;

				$value = 'url(' . $value['img'] . ')';
			} else {
				switch ( $value['type'] ) {

					case 'repeat':
					case 'cover':
					case 'repeat-y':
					case 'repeat-x':
						$after_value .= $tab_char . 'background-repeat:' . $value['type'] . ';' . $ln_char;
						break;

					case 'top-left':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: top left;' . $ln_char;
						break;

					case 'top-center':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: top center;' . $ln_char;
						break;

					case 'top-right':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: top right;' . $ln_char;
						break;

					case 'left-center':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: left center;' . $ln_char;
						break;

					case 'center-center':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: center center;' . $ln_char;
						break;

					case 'right-center':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: right center;' . $ln_char;
						break;

					case 'bottom-left':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: bottom left;' . $ln_char;
						break;

					case 'bottom-center':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: bottom center;' . $ln_char;
						break;

					case 'bottom-right':
						$after_value .= $tab_char . 'background-repeat: no-repeat;' . $ln_char;
						$after_value .= $tab_char . 'background-position: bottom right;' . $ln_char;
						break;

				}
				$value = 'url(' . $value['img'] . ')';
			}

		}

		// prepare value for "color" type
		if ( isset( $block['type'] ) && $block['type'] == 'color' ) {
			if ( preg_match( '/%%value([-|+]\d*)%%/', $block['value'], $change ) ) {
				Better_Framework::factory( 'color' );
				$value = preg_replace( '/(%%value[-|+]\d*%%)/', BF_Color::change_color( $value, intval( $change[1] ) ), $block['value'] );
			} elseif ( preg_match( '/%%value-opacity-(.*)%%/', $block['value'], $opacity ) ) {
				Better_Framework::factory( 'color' );
				$value = preg_replace( '/(%%value-opacity-.*%%)/', BF_Color::hex_to_rgba( $value, $opacity[1] ), $block['value'] );
			}
		}

		// prepare value for "border" type
		if ( isset( $block['type'] ) && $block['type'] == 'border' ) {

			if ( isset( $value['all'] ) ) {

				$result['code'] .= $tab_char . 'border:';

				if ( isset( $value['all']['width'] ) ) {
					$result['code'] .= $value['all']['width'] . 'px ';
				}
				if ( isset( $value['all']['style'] ) ) {
					$result['code'] .= $value['all']['style'] . ' ';
				}
				if ( isset( $value['all']['color'] ) ) {
					$result['code'] .= $value['all']['color'] . ' ';
				}

				$result['code'] .= ';' . $ln_char;

			} else {

				if ( isset( $value['top'] ) ) {

					$result['code'] .= $tab_char . 'border-top:';

					if ( isset( $value['top']['width'] ) ) {
						$result['code'] .= $value['top']['width'] . 'px ';
					}
					if ( isset( $value['top']['style'] ) ) {
						$result .= $value['top']['style'] . ' ';
					}
					if ( isset( $value['top']['color'] ) ) {
						$result['code'] .= $value['top']['color'] . ' ';
					}

					$result['code'] .= ';' . $ln_char;

				}

				if ( isset( $value['right'] ) ) {

					$result['code'] .= $tab_char . 'border-right:';

					if ( isset( $value['right']['width'] ) ) {
						$result['code'] .= $value['right']['width'] . 'px ';
					}
					if ( isset( $value['right']['style'] ) ) {
						$result['code'] .= $value['right']['style'] . ' ';
					}
					if ( isset( $value['right']['color'] ) ) {
						$result['code'] .= $value['right']['color'] . ' ';
					}

					$result['code'] .= ';' . $ln_char;

				}
				if ( isset( $value['bottom'] ) ) {

					$result['code'] .= $tab_char . 'border-bottom:';

					if ( isset( $value['bottom']['width'] ) ) {
						$result['code'] .= $value['bottom']['width'] . 'px ';
					}
					if ( isset( $value['bottom']['style'] ) ) {
						$result['code'] .= $value['bottom']['style'] . ' ';
					}
					if ( isset( $value['bottom']['color'] ) ) {
						$result['code'] .= $value['bottom']['color'] . ' ';
					}

					$result['code'] .= ';' . $ln_char;

				}

				if ( isset( $value['left'] ) ) {

					$result['code'] .= $tab_char . 'border-left:';

					if ( isset( $value['left']['width'] ) ) {
						$result['code'] .= $value['left']['width'] . 'px ';
					}
					if ( isset( $value['left']['style'] ) ) {
						$result['code'] .= $value['left']['style'] . ' ';
					}
					if ( isset( $value['left']['color'] ) ) {
						$result['code'] .= $value['left']['color'] . ' ';
					}

					$result['code'] .= ';' . $ln_char;

				}

			}

		}

		// Prepare Properties
		if ( isset( $block['prop'] ) ) {

			foreach ( (array) $block['prop'] as $key => $val ) {

				// Customized value template for property
				if ( strpos( $val, '%%value%%' ) !== FALSE ) {

					$result['code'] .= $tab_char . $key . ':';
					$result['code'] .= str_replace( '%%value%%', $value, $val ) . ';' . $ln_char;

				} // Simply set value to property
				else {

					if ( ! is_int( $key ) ) {

						$result['code'] .= $tab_char . $key . ':' . $val . ';' . $ln_char;

					} elseif ( ! is_array( $value ) ) {

						$result['code'] .= $tab_char . $val . ':' . $value . ';' . $ln_char;

					}

				}
			}

		}

		// add after value
		if ( isset( $after_value ) && $after_value != '' ) {
			$result['code'] .= $after_value;
		}

		// Remove last ';'
		$result['code'] = rtrim( $result['code'], ';' );

		if ( isset( $block['selector'] ) ) {
			$result['code'] .= "}" . $ln_char;
		}

		// After css code. For example used for adding media queries!.
		if ( isset( $block['after'] ) && is_string( $value ) ) {
			$result['code'] .= str_replace( '%%value%%', $value, $block['after'] ) . $ln_char;
		}

		return $result;
	}
}

if ( ! function_exists( 'bf_starts_with' ) ) {
	/**
	 * Check string start with
	 *
	 * @param $haystack
	 * @param $needle
	 *
	 * @return bool
	 */
	function bf_starts_with( $haystack, $needle ) {

		return $needle === '' || strrpos( $haystack, $needle, - strlen( $haystack ) ) !== FALSE;
	}
}

if ( ! function_exists( 'bf_ends_with' ) ) {

	/**
	 * Check string end with
	 *
	 * @param $haystack
	 * @param $needle
	 *
	 * @return bool
	 */
	function bf_ends_with( $haystack, $needle ) {

		return $needle === '' || ( ( $temp = strlen( $haystack ) - strlen( $needle ) ) >= 0 && strpos( $haystack, $needle, $temp ) !== FALSE );
	}
}

if ( ! function_exists( 'bf_found_closest_number' ) ) {

	/**
	 * Find closest number in the array
	 *
	 * @param array  $array  Ascending sorted array
	 * @param int    $number number you are looking for
	 * @param string $round  up|down  round fractions up/down
	 *
	 * TODO: optimized it!
	 *
	 * @since 3.0.1
	 * @return void|int index of array on success
	 */
	function bf_found_closest_number( $array, $number, $round = 'up' ) {

		$pivot       = array_rand( $array );
		$status      = 0; // 1: increasing, 2: decreasing
		$found_pivot = NULL;


		while( isset( $array[ $pivot ] ) ) {

			if ( $array[ $pivot ] === $number ) {
				return $array[ $pivot ];
			}

			if ( $array[ $pivot ] > $number ) {

				if ( $status === 1 ) {
					$found_pivot = $pivot;
					break;
				}

				$pivot --;
				$status = 2;

			} else {

				$pivot ++;

				if ( $status === 2 ) {
					$found_pivot = $pivot;
					break;
				}

				$status = 1;
			}
		}

		if ( is_null( $found_pivot ) ) {

			$first = $array[ key( $array ) ];
			if ( $first > $number ) {

				if ( $round === 'up' ) {
					return $first;
				}

			} else {

				if ( $round === 'down' ) {

					return end( $array );
				}
			}
		}

		if ( ! is_null( $found_pivot ) ) {

			if ( $round === 'up' ) {
				return $array[ $found_pivot ];
			}

			return $array[ $found_pivot - 1 ];
		}
	}
}


if ( ! function_exists( 'bf_is_user_logged_in' ) ) {
	/**
	 * Performance optimized function to check current user login status
	 *
	 * @return bool
	 */
	function bf_is_user_logged_in() {

		static $logged_in;

		if ( is_null( $logged_in ) ) {
			$logged_in = is_user_logged_in();
		}

		return $logged_in;
	}
}


if ( ! function_exists( 'bf_is_amp' ) ) {
	/**
	 * Detects active AMP page & plugin
	 *
	 * @return bool
	 */
	function bf_is_amp() {

		static $is_amp;

		if ( ! is_null( $is_amp ) ) {
			return $is_amp;
		}

		// BetterAMP plugin
		if ( function_exists( 'is_better_amp' ) && is_better_amp() ) {
			$is_amp = 'better';
		} // Official AMP Plugin
		elseif ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			$is_amp = 'amp';
		} else {
			$is_amp = FALSE;
		}

		return $is_amp;
	}
}


if ( ! function_exists( 'bf_is_fia' ) ) {
	/**
	 * Detects active Facebook Instant Article plugin
	 *
	 * @return bool
	 */
	function bf_is_fia() {

		static $state;

		if ( ! is_null( $state ) ) {
			return $state;
		}

		$state = defined( 'IA_PLUGIN_VERSION' ) && function_exists( 'is_transforming_instant_article' ) && is_transforming_instant_article();

		return $state;
	}
}

if ( ! function_exists( 'bf_the_content_by_id' ) ) {
	/**
	 * Prints content of post by the ID.
	 * It handles extra actions like custom CSS prints of blocks and page.
	 *
	 * @param null  $post_id
	 * @param array $args
	 *
	 * @return mixed|string|void
	 */
	function bf_the_content_by_id( $post_id = NULL, $args = array() ) {

		if ( ! $post_id ) {
			return;
		}

		$post_object = get_post( $post_id );
		$args        = bf_merge_args( $args, array(
			'echo'         => TRUE,
			'context'      => '',
			'add_vs_style' => FALSE,
		) );

		if ( ! $post_object ) {
			return;
		} else {
			$content = apply_filters( 'the_content', $post_object->post_content, $args['context'] );
		}

		//
		// Add custom css of VC page
		//

		if ( apply_filters( 'better-framework/the-content/append-styles', $args['add_vs_style'], $post_object, $args ) ) {
			//
			// Post custom CSS
			//
			$post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', TRUE );
			if ( ! empty( $post_custom_css ) ) {
				$post_custom_css = strip_tags( $post_custom_css );
				$content         .= '<style type="text/css" data-type="vc_custom-css">';
				$content         .= $post_custom_css;
				$content         .= '</style>';
			}


			//
			// Post shortcodes CSS
			//
			$shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', TRUE );
			if ( ! empty( $shortcodes_custom_css ) ) {
				$shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
				$content               .= '<style type="text/css" data-type="vc_shortcodes-custom-css">';
				$content               .= $shortcodes_custom_css;
				$content               .= '</style>';
			}
		}

		if ( $args['echo'] ) {
			echo $content;
		} else {
			return $content;
		}

	}
}

if ( ! function_exists( 'bf_bp_get_current_core_component' ) ) {

	/**
	 * Return current BuddyPress component ID
	 *
	 * @since 3.5.4
	 * @return string
	 */
	function bf_bp_get_current_core_component() {

		if ( ! function_exists( 'bp_core_get_packaged_component_ids' ) ||
		     ! function_exists( 'bp_is_current_component' )
		) {
			return '';
		}

		foreach ( bp_core_get_packaged_component_ids() as $active_component ) {

			if ( bp_is_current_component( $active_component ) ) {

				return $active_component;
			}
		}

		return '';
	}
}

if ( ! function_exists( 'bf_bp_get_component_page_id' ) ) {

	/**
	 * Get page ID of given BuddyPress component
	 *
	 * @param string      $component . optional. default:current component
	 *
	 * @global BuddyPress $bp        Main BuddyPress Class.
	 *
	 * @since 3.5.4
	 * @return int
	 */
	function bf_bp_get_component_page_id( $component = 'auto' ) {

		global $bp;

		if ( ! $bp || ! isset( $bp->pages ) ) {
			return 0;
		}

		if ( 'auto' === $component ) {
			$component = bf_bp_get_current_core_component();
		}

		if ( $component && isset( $bp->pages->$component->id ) ) {
			return $bp->pages->$component->id;
		}

		return 0;
	}
}