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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */

BetterFramework_Oculus_Message_Manager::init();


class BetterFramework_Oculus_Message_Manager {

	/**
	 * Apply hooks
	 */
	public static function init() {

		add_action( 'init', array( __CLASS__, 'append_fixed_message_menu' ) );
		add_action( 'switch_theme', array( __CLASS__, 'theme_change_notification' ), 9, 3 );
		add_action( 'admin_head', array( __CLASS__, 'display_custom_messages' ) );
		add_action( 'admin_head', array( __CLASS__, 'register_admin_notices' ) );


		$ocs_slug = BetterFramework_Oculus::$slug;

		add_action( "better-framework/$ocs_slug/check-update/done", array( __CLASS__, 'save_messages' ) );
		add_filter( "better-framework/$ocs_slug/check-update/data", array( __CLASS__, 'check_data' ) );
	}


	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public static function check_data( $data ) {

		$data['watched-messages'] = get_option( 'oculus-messages-watched' );

		return $data;
	}


	/**
	 *  Callback: Register menu for 'fixed page' Message
	 *  action   : init
	 */
	public static function append_fixed_message_menu() {

		$messages = get_option( 'oculus-messages' );
		if ( ! empty( $messages['fixed_page'] ) ) {
			$default_id    = 'bs-product-pages-message-';
			$default_menu  = array(
				'parent'       => 'bs-product-pages-welcome',
				'name'         => __( 'Message', 'publisher' ),
				'icon'         => '\\E034',
				'callback'     => array( __CLASS__, 'menu_callback' ),
				'capability'   => 'edit_theme_options',
				'position'     => '9.5',
				'on_admin_bar' => true,
				'id'           => 'betterstudio-message',
				'slug'         => 'betterstudio-message',
			);
			$page_settings = &$messages['fixed_page'];
			if ( ! empty( $page_settings->menu ) ) {
				$default_menu['id'] = $default_menu['slug'] = $default_id . $page_settings->id;

				$menu    = wp_parse_args( $page_settings->menu, $default_menu );
				$watched = get_option( 'oculus-messages-watched', array() );

				/**
				 * Hide menu if watched previously.
				 */
				if ( ! empty( $page_settings->menu['message_id'] ) ) {
					$nid = &$page_settings->menu['message_id'];
					if ( ! empty( $watched[ $nid ] ) ) {
						if ( $GLOBALS['pagenow'] !== 'admin.php' || ! isset( $_GET['page'] ) || $_GET['page'] !== $menu['slug'] ) {
							$menu['parent'] = null;
						} // null parent make menu invisible
					}
				}

				Better_Framework()->admin_menus()->add_menupage( $menu );
			}
		}
	}


	/**
	 * Callback: report theme changes
	 * action  : switch_theme
	 *
	 * @param string   $new_name
	 * @param WP_Theme $new_theme
	 * @param WP_Theme $old_theme
	 */
	public static function theme_change_notification( $new_name, $new_theme, $old_theme = null ) {

		$new_theme_headers = array(
			'Name'        => $new_theme->get( 'Name' ),
			'ThemeURI'    => $new_theme->get( 'ThemeURI' ),
			'Description' => $new_theme->get( 'Description' ),
			'Author'      => $new_theme->get( 'Author' ),
			'AuthorURI'   => $new_theme->get( 'AuthorURI' ),
			'Version'     => $new_theme->get( 'Version' ),
			'Template'    => $new_theme->get( 'Template' ),
		);

		if ( $old_theme instanceof WP_Theme ) {

			$old_theme_headers = array(
				'Name'     => $old_theme->get( 'Name' ),
				'Version'  => $old_theme->get( 'Version' ),
				'Template' => $old_theme->get( 'Template' ),
			);
		}

		BetterFramework_Oculus::request( 'product-disabled', array(
			'data'         => array(
				'new-theme-headers' => $new_theme_headers,
				'old-theme-headers' => $old_theme_headers,
			),
			'use_wp_error' => false,
		) );
	}


	/**
	 * Display custom remote messages to user
	 */
	public static function display_custom_messages() {

		if ( ! function_exists( 'bf_enqueue_style' ) ) {
			return;
		}

		$watched = get_option( 'oculus-messages-watched', array() );
		$message = get_option( 'oculus-messages', array() );

		if ( ! $message ) {
			return;
		}

		$need_update = false;

		if ( ! empty( $message['custom'] ) ) {
			/*
						bf_enqueue_script( 'bf-modal' );
						bf_enqueue_style( 'bf-modal' );
			*/

			foreach ( (array) $message['custom'] as $index => $custom ) {
				if ( empty( $custom->id ) || isset( $watched[ $custom->id ] ) ) {
					continue;
				}
				self::mark_as_watched( $custom->id );
				self::enqueue_dependencies( $custom );
				self::print_html_css( $custom );

				$need_update = true;
				unset( $message['custom'][ $index ] );
				break;
			}
		}

		if ( $need_update ) {
			update_option( 'oculus-messages', $message, 'no' );
		}
	}


	/**
	 * Register custom remote admin notices
	 */
	public static function register_admin_notices() {

		if ( ! function_exists( 'bf_add_notice' ) ) {
			return;
		}

		$watched = get_option( 'aoculus-messages-watched', array() );
		$message = get_option( 'oculus-messages', array() );

		if ( ! $message ) {
			return;
		}

		$need_update = false;

		if ( ! empty( $message['notices'] ) ) {

			foreach ( (array) $message['notices'] as $index => $notice ) {

				if ( empty( $notice->id ) ) {
					continue;
				}

				$notice = get_object_vars( $notice );

				bf_add_notice( $notice );

				$need_update = true;
				unset( $message['notices'][ $index ] );
				break;
			}
		}

		if ( $need_update ) {
			update_option( 'oculus-messages', $message, 'no' );
		}
	}


	/**
	 * Enqueue static file dependencies
	 *
	 * @param object $object
	 */
	protected static function enqueue_dependencies( $object ) {

		if ( ! empty( $object->js_deps ) && is_array( $object->js_deps ) ) {
			foreach ( $object->js_deps as $args ) {
				$function = sizeof( $args ) === 1 ? 'bf_enqueue_script' : 'wp_enqueue_script';
				call_user_func_array( $function, $args );
			}
		}

		if ( ! empty( $object->css_deps ) && is_array( $object->css_deps ) ) {
			foreach ( $object->css_deps as $args ) {
				$function = sizeof( $args ) === 1 ? 'bf_enqueue_style' : 'wp_enqueue_style';
				call_user_func_array( $function, $args );
			}
		}
	}


	/**
	 * mark a message as watched
	 *
	 * @param string|int $message_id
	 */
	protected static function mark_as_watched( $message_id ) {

		$watched                = get_option( 'oculus-messages-watched', array() );
		$watched[ $message_id ] = time();

		update_option( 'oculus-messages-watched', $watched, 'no' );
	}


	/**
	 * Fixed page message, menu callback
	 */
	public static function menu_callback() {

		$messages = get_option( 'oculus-messages' );
		if ( ! empty( $messages['fixed_page'] ) ) {
			$message = &$messages['fixed_page'];
			if ( ! empty( $message->menu['message_id'] ) ) {
				self::mark_as_watched( $message->menu['message_id'] );
			}

			self::print_html_css( $message );
			echo $message->html;  // escaped before
			self::mark_as_watched( $message->id );

		}
	}


	/**
	 * @param object $msg_object message object
	 */
	protected static function print_html_css( $msg_object ) {

		if ( isset( $msg_object->css ) ) {
			echo '<style>', $msg_object->css, '</style>'; // escaped before
		}
		if ( isset( $msg_object->js ) ) {
			echo '<script>', $msg_object->js, '</script>'; // escaped before
		}
	}


	/**
	 * @param object $response
	 */
	public static function save_messages( $response ) {

		if ( empty( $response->messages ) ) {
			return;
		}
		$messages = $response->messages;
		$db       = get_option( 'oculus-messages', array() );

		if ( isset( $messages->fixed_page ) ) {
			$page_data = &$messages->fixed_page;

			if ( isset( $page_data->html ) && isset( $page_data->id ) ) {
				if ( isset( $page_data->menu ) ) {
					$page_data->menu = (array) $page_data->menu;
				}
				$db['fixed_page'] = $page_data;
			}
		}
		if ( isset( $messages->custom ) && is_array( $messages->custom ) ) {
			if ( ! isset( $db['custom'] ) ) {
				$db['custom'] = array();
			}

			foreach ( $messages->custom as $custom ) {
				if ( isset( $custom->id ) ) {
					$id                  = &$custom->id;
					$db['custom'][ $id ] = $custom;
				}
			}
		}
		if ( isset( $messages->admin_notices ) && is_array( $messages->admin_notices ) ) {
			if ( ! isset( $db['notices'] ) ) {
				$db['notices'] = array();
			}

			foreach ( $messages->admin_notices as $notice ) {
				if ( isset( $notice->id ) ) {
					$id                   = &$notice->id;
					$db['notices'][ $id ] = $notice;
				}
			}
		}

		update_option( 'oculus-messages', $db, 'no' );
	}
}
