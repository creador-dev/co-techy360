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


if ( ! class_exists( 'Better_Framework_Factory' ) ) {

	class Better_Framework_Factory {

		static $frameworks = array();

		static $active_framework;

		public static function setup_framework() {

			self::$frameworks = apply_filters( 'better-framework/loader', array() );

			$count = count( self::$frameworks );

			if ( ! $count ) {
				return FALSE;
			}

			if ( $count == 1 ) {
				self::load_framework( current( self::$frameworks ) );
			} else {

				$latest_version = NULL;

				foreach ( self::$frameworks as $framework ) {

					if ( $latest_version == NULL ) {
						$latest_version = $framework;
						continue;
					}

					if ( version_compare( $latest_version['version'], $framework['version'] ) <= 0 ) {
						$latest_version = $framework;
					}

				}

				self::$active_framework = $latest_version;

				self::load_framework( $latest_version );

			}

			/**
			 * Fires after BetterFramework fully loaded.
			 */
			do_action( 'better-framework/after_setup' );
		}


		/**
		 * Loads framework
		 *
		 * @param $framework
		 */
		public static function load_framework( $framework ) {

			define( 'BF_URI', trailingslashit( $framework['uri'] ) );
			define( 'BF_PATH', trailingslashit( $framework['path'] ) );

			include_once $framework['path'] . 'class-better-framework.php';

		}

	}

	add_action( 'after_setup_theme', array( 'Better_Framework_Factory', 'setup_framework' ) );
}