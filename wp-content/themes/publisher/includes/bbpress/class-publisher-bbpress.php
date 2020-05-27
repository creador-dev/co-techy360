<?php


/**
 * Publisher bbPress Compatibility handler
 */
class Publisher_bbPress {

	/**
	 * Publisher_bbPress constructor.
	 */
	function __construct() {

		include PUBLISHER_THEME_PATH . 'includes/bbpress/options/metabox.php';

		// say it to WP & bbPress
		add_theme_support( 'bbpress' );

		add_filter( 'init', array( $this, 'init' ) );

	}


	/**
	 * Callback: adds some code change to bbPress and other simple things
	 *
	 * Filter: init
	 */
	function init() {

		add_action( 'bbp_after_get_user_favorites_link_parse_args', array( $this, 'get_user_favorites_link' ) );

		add_action( 'bbp_after_get_user_subscribe_link_parse_args', array( $this, 'get_user_subscribe_link' ) );

		add_action( 'bbp_after_get_topic_tag_list_parse_args', array( $this, 'get_topic_tag_list' ) );

	}


	/**
	 * Callback: Adding Icon to favorite
	 *
	 * Action: bbp_after_get_user_favorites_link_parse_args
	 */
	public function get_user_favorites_link( $attr ) {

		$attr['favorite']  = '<i class="fa fa-heart-o"></i> ' . $attr['favorite'];
		$attr['favorited'] = '<i class="fa fa-heart"></i> ' . $attr['favorited'];

		return $attr;
	}


	/**
	 * Callback: Adding Icon to subscribe
	 *
	 * Action: bbp_after_get_user_subscribe_link_parse_args
	 */
	public function get_user_subscribe_link( $attr ) {

		$attr['subscribe']   = '<i class="fa fa-star-o"></i> ' . $attr['subscribe'];
		$attr['unsubscribe'] = '<i class="fa fa-star"></i> ' . $attr['unsubscribe'];

		return $attr;
	}


	/**
	 * Callback: Adding Icon to tags
	 *
	 * bbp_after_get_topic_tag_list_parse_args
	 */
	public function get_topic_tag_list( $attr ) {

		$attr['before'] = '<div class="bbp-topic-tags"><p><i class="fa fa-tags"></i> ' . esc_html( publisher_translation_get( 'bbp_tagged' ) ) . '&nbsp;';

		return $attr;
	}
}// Publisher_bbPress