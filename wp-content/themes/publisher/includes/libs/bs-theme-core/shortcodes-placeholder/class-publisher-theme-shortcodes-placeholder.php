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


Publisher_Theme_Shortcodes_Placeholder::Run();

class Publisher_Theme_Shortcodes_Placeholder {


	/**
	 * Contains config for all shortcodes
	 *
	 * @var array
	 */
	private $shortcodes_config = array();


	/**
	 * Flag for loading all one time
	 *
	 * @var bool
	 */
	private $_configs_loaded = false;


	/**
	 * Contains alive instance of class
	 *
	 * @var  self
	 */
	protected static $instance;


	/**
	 * [ create and ] Returns life version
	 *
	 * @return \Publisher_Theme_Shortcodes_Placeholder
	 */
	public static function Run() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * Initialize base
	 */
	public function __construct() {

		// Performs the Bf setup
		add_action( 'better-framework/after_setup', array( $this, 'theme_init' ) );

	}


	/**
	 * Get configs after BF
	 */
	function theme_init() {
		$this->load_shortcodes_config();
		$this->init_shortcodes();
	}


	/**
	 * Loads all configs once time
	 *
	 * @param bool $force
	 */
	function load_shortcodes_config( $force = false ) {
		if ( $force || ! $this->_configs_loaded ) {
			$this->_configs_loaded   = true;
			$this->shortcodes_config = apply_filters( 'publisher-theme-core/shortcodes-placeholder/config', $this->shortcodes_config );
		}
	}


	/**
	 * Initialize all registered shortcodes
	 */
	function init_shortcodes() {

		$this->load_shortcodes_config();

		foreach ( (array) $this->shortcodes_config as $shortcode ) {

			if ( empty( $shortcode['id'] ) ) {
				continue;
			}

			if ( empty( $shortcode['condition']['type'] ) ) {
				$type = 'shortcode';
			} else {
				$type = $shortcode['condition']['type'];
			}

			// check multiple conditions
			switch ( $type ) {

				// default shortcode check
				case 'shortcode':
					if ( ! shortcode_exists( $shortcode['id'] ) ) {
						$this->register( $shortcode );
					}

					break;

				// function name
				case 'function':
					if ( ! function_exists( $shortcode['condition']['callback'] ) ) {
						$this->register( $shortcode );
					}

					break;

				// class name
				case 'class':
					if ( ! class_exists( $shortcode['condition']['callback'] ) ) {
						$this->register( $shortcode );
					}

					break;

				// custom function to firing and getting result from that
				case 'callback':
					if ( ! function_exists( $shortcode['condition']['callback'] ) || ! call_user_func( $shortcode['condition']['callback'], $shortcode ) ) {
						$this->register( $shortcode );
					}

					break;

			}

		}

	}


	/**
	 * Registers shortcodes
	 *
	 * @param array $shortcode
	 */
	function register( $shortcode = array() ) {

		if ( empty( $shortcode['id'] ) ) {
			return;
		}

		// register shortcode and be theme check plugin friend
		call_user_func( 'add' . '_' . 'shortcode', $shortcode['id'], array( $this, 'handle_shortcode' ) );

	}


	/**
	 * Handles all fired shortcodes
	 *
	 * @param array  $atts
	 * @param string $content
	 * @param string $tag
	 *
	 * @return string
	 */
	function handle_shortcode( $atts = array(), $content = '', $tag = '' ) {

		foreach ( $this->shortcodes_config as $shortcode ) {

			if ( ! empty( $shortcode['id'] ) && $shortcode['id'] == $tag ) {
				return $this->show_placeholder( $shortcode, $atts, $content );
			}

		}

		return '';
	}


	/**
	 * Prints placeholder for shortcode
	 *
	 * @param string $shortcode
	 * @param array  $atts
	 * @param        $content
	 *
	 * @return string
	 */
	function show_placeholder( $shortcode = '', $atts = array(), $content ) {

		if ( empty( $shortcode ) ) {
			return '';
		}

		$raw_shortcode = $this->get_shortcode_text( $shortcode['id'], $atts, $content );

		ob_start();

		if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
			return $raw_shortcode;
		}

		$shortcode = wp_parse_args( $shortcode, array(
			'id'               => '',
			'special_sidebars' => array(),
			'notice_long'      => wp_kses( sprintf( __( 'The <b>%s</b> shortcode is not registered!', 'publisher' ), $shortcode['id'] ), bf_trans_allowed_html() ),
			'notice_small'     => '',
			'notice_type'      => 'long',
		) );


		//
		// Detect special sidebars
		//
		if ( ! empty( $shortcode['special_sidebars'] ) ) {

			if ( is_string( $shortcode['special_sidebars'] ) ) {

				if ( bf_get_current_sidebar() == $shortcode['special_sidebars'] ) {
					$shortcode['notice_type'] = 'small';
				}

			} elseif ( is_array( $shortcode['special_sidebars'] ) ) {

				foreach ( $shortcode['special_sidebars'] as $sidebar ) {

					if ( bf_get_current_sidebar() == $sidebar ) {
						$shortcode['notice_type'] = 'small';
					}

				}

			}

		}

		echo '<p class="bsbt-shortcode-placeholder-p">', esc_html( $raw_shortcode ), '</p>';

		?>
		<div class="bsbt-shortcode-placeholder type-<?php echo esc_attr( $shortcode['notice_type'] ); ?>">
			<?php

			if ( $shortcode['notice_type'] == 'small' && ! empty( $shortcode['notice_small'] ) ) {
				echo $shortcode['notice_small']; // escaped before in top
			} else {
				echo $shortcode['notice_long']; // escaped before in top
			}

			?>
		</div>
		<?php

		return ob_get_clean();
	}


	/**
	 * Method returns a string of complete shortcode
	 */
	function get_shortcode_text( $id = '', $atts = array(), $content = '' ) {

		$attr = ' ';
		foreach ( (array) $atts as $key => $value ) {
			$attr .= " $key='" . trim( $value ) . "'";
		}

		if ( ! empty( $content ) ) {
			$content .= '[/' . $id . ']';
		}

		return '[' . $id . $attr . ']' . $content;
	}

}
