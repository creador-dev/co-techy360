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


/**
 * Class Publisher_Theme_Listing_Shortcode
 */
class Publisher_Theme_Listing_Shortcode extends BF_Shortcode {

	/**
	 * Type of pagination bs_post_listing or callback
	 *
	 * @var string
	 */
	public $type;

	/**
	 * pagination view name. class name for bs_post_listing type or valid callback for other types
	 *
	 * @var string
	 */
	public $view;

	/**
	 * Main query type
	 *
	 * @var string user|comment|post
	 */
	public $query_type;


	/**
	 * Current active query
	 *
	 * @var WP_Comment_Query|WP_User_Query|WP_Query
	 */
	public $active_query;


	/**
	 * @var array
	 */
	public $block_atts = array();

	/**
	 * @var array
	 */
	public $tab_atts = array();

	/**
	 * @var array
	 */
	public $tabs = array();

	/**
	 * @var array
	 */
	public $tab = array();

	/**
	 * @var bool
	 */
	public $is_multi_tab = false;


	function __construct( $id, $options ) {

		if ( ! isset( $options['defaults']['pagination-show-label'] ) ) {
			$options['defaults']['pagination-show-label'] = false;
		}

		if ( ! isset( $options['defaults']['pagination-slides-count'] ) ) {
			$options['defaults']['pagination-slides-count'] = 3;
		}

		if ( ! isset( $options['defaults']['slider-autoplay'] ) ) {
			$options['defaults']['slider-autoplay'] = true;
		}

		if ( ! isset( $options['defaults']['slider-animation-speed'] ) ) {
			$options['defaults']['slider-animation-speed'] = 750;
		}

		if ( ! isset( $options['defaults']['slider-speed'] ) ) {
			$options['defaults']['slider-speed'] = 3000;
		}

		if ( ! isset( $options['defaults']['slider-speed'] ) ) {
			$options['defaults']['slider-speed'] = 3000;
		}

		if ( ! isset( $options['defaults']['slider-control-dots'] ) ) {
			$options['defaults']['slider-control-dots'] = 'off';
		}

		if ( ! isset( $options['defaults']['slider-control-next-prev'] ) ) {
			$options['defaults']['slider-control-next-prev'] = 'style-1';
		}

		if ( ! isset( $options['defaults']['bs-show-desktop'] ) ) {
			$options['defaults']['bs-show-desktop'] = true;
		}

		if ( ! isset( $options['defaults']['bs-show-tablet'] ) ) {
			$options['defaults']['bs-show-tablet'] = true;
		}

		if ( ! isset( $options['defaults']['bs-show-phone'] ) ) {
			$options['defaults']['bs-show-phone'] = true;
		}

		if ( ! isset( $options['defaults']['tabs_content_type'] ) ) {
			$options['defaults']['tabs_content_type'] = 'deferred';
		}

		if ( ! isset( $options['defaults']['taxonomy'] ) ) {
			$options['defaults']['taxonomy'] = '';
		}

		if ( ! isset( $options['defaults']['cats-tags-condition'] ) ) {
			$options['defaults']['cats-tags-condition'] = 'and';
		}

		if ( ! isset( $options['defaults']['cats-condition'] ) ) {
			$options['defaults']['cats-condition'] = 'in';
		}

		if ( ! isset( $options['defaults']['tags-condition'] ) ) {
			$options['defaults']['tags-condition'] = 'in';
		}

		if ( ! isset( $options['defaults']['text-color'] ) ) {
			$options['defaults']['text-color'] = '';
		}

		if ( ! isset( $options['defaults']['heading_color'] ) ) {
			$options['defaults']['heading_color'] = '';
		}

		if ( ! isset( $options['defaults']['title_link'] ) ) {
			$options['defaults']['title_link'] = '';
		}

		if ( ! isset( $options['defaults']['bs-text-color-scheme'] ) ) {
			$options['defaults']['bs-text-color-scheme'] = '';
		}

		if ( ! isset( $options['defaults']['heading_style'] ) ) {
			$options['defaults']['heading_style'] = 'default';
		}

		if ( ! isset( $options['defaults']['listing-settings'] ) ) {
			$options['defaults']['listing-settings'] = '';
		}

		if ( ! isset( $options['defaults']['featured_image'] ) ) {
			$options['defaults']['featured_image'] = false;
		}

		if ( ! isset( $options['defaults']['ignore_sticky_posts'] ) ) {
			$options['defaults']['ignore_sticky_posts'] = true;
		}

		if ( ! isset( $options['defaults']['author_ids'] ) ) {
			$options['defaults']['author_ids'] = '';
		}

		if ( ! isset( $options['defaults']['ad-active'] ) ) {
			$options['defaults']['ad-active'] = false;
		}

		if ( ! isset( $options['defaults']['disable_duplicate'] ) ) {
			$options['defaults']['disable_duplicate'] = '';
		}

		if ( ! isset( $options['query_type'] ) ) {
			$options['query_type'] = 'post';
		}

		$this->view       = get_class( $this );
		$this->query_type = $options['query_type'];
		$this->type       = sprintf( 'bs_%s_listing', $options['query_type'] );

		parent::__construct( $id, $options );
	}


	/**
	 * set view and type. children classes use this method
	 *
	 * @param $view Type of pagination bs_post_listing or callback
	 * @param $type string pagination view. class name if $type = bs_post_listing otherwise name of valid callback
	 *
	 * @return bool
	 */
	public function set_view_type( $view, $type ) {

		if ( $type === 'bs_post_listing' ) {
			$class  = &$view;
			$method = 'display_content';
			if ( ! is_callable( "$class::$method" ) ) {
				return false;
			}

			$this->type = 'bs_post_listing';
			$this->view = $class;
		} else {
			$callback = &$view;
			if ( ! is_callable( $callback ) ) {
				return false;
			}

			$this->type = 'callback';
			$this->view = $callback;
		}

		return true;
	}


	protected function slider_settings_atts( &$atts ) {

		foreach (
			array_intersect_key( $atts, array(
				'slider-control-dots'      => '',
				'slider-animation-speed'   => '',
				'slider-control-next-prev' => '',
				'slider-autoplay'          => '',
			) ) as $key => $value
		) {

			echo ' data-', esc_attr( $key ), '=', '"', esc_attr( $value ), '"';
		}

		if ( ! empty( $atts['slider-speed'] ) ) {
			echo ' data-autoplaySpeed="', esc_attr( $atts['slider-speed'] ), '"';
		}
	}


	/**
	 * Used to detect slider have controller
	 *
	 * @param array  $atts
	 * @param string $type
	 *
	 * @return bool
	 */
	function have_slider_controller( &$atts, $type = 'all' ) {

		$_have = false;

		// no slider == no slider controller!
		if ( empty( $atts['have_slider'] ) ) {
			return false;
		}

		switch ( $type ) {

			case 'all':
				$_have = isset( $atts['slider-control-next-prev'] ) && $atts['slider-control-next-prev'] !== 'off';
				if ( ! $_have ) {
					$_have = isset( $atts['slider-control-dots'] ) && $atts['slider-control-dots'] !== 'off';
				}
				break;

			case 'next_prev':
				$_have = isset( $atts['slider-control-next-prev'] ) && $atts['slider-control-next-prev'] !== 'off';
				break;

			case 'dots':
				$_have = isset( $atts['slider-control-dots'] ) && $atts['slider-control-dots'] !== 'off';
				break;

		}

		return $_have;

	}


	protected function append_defer_data_atts( $tabs ) {

		$length = count( $tabs );

		for ( $idx = 1; $idx < $length; $idx ++ ) {
			$tab = &$tabs[ $idx ];

			$tab['data']['deferred-init']  = mt_rand();
			$tab['data']['deferred-event'] = 'shown.bs.tab';
		}

		return $tabs;
	}


	protected function filter_atts( &$atts ) {

		if ( ! empty( $atts['category'] ) ) {
			if ( preg_match( '/\+(\d+)\b/', $atts['category'], $match ) ) {
				$atts['category']        = str_replace( '+' . $match[1], $match[1], $atts['category'] );
				$atts['query-main-term'] = $match[1];
			} elseif ( preg_match( '/\b((?<!\-)\d+)/', $atts['category'], $match ) ) {
				// choose first category as primary
				$atts['query-main-term'] = $match[1];
			}
		}
	}


	/**
	 * @param array $atts
	 */
	public function prepare_attributes( &$atts ) {

		publisher_theme_pagin_manager()->set_tabs_atts( $atts );

		$this->filter_atts( $atts );

		Publisher_Theme_Listing_Pagin_Manager::set_general_props( $atts );

		publisher_set_prop( 'shortcode-' . $this->id, $atts );

		if ( empty( $atts['css-class'] ) ) {
			$atts['css-class'] = '';
		}

		if ( empty( $atts['slider-control-next-prev'] ) ) {
			$atts['slider-control-next-prev'] = 'style-1';
		}

		$this->block_atts = $atts;
	}


	/**
	 *
	 */
	public function get_tab_wrapper_atts() {

		$id    = '';
		$class = array(
			$this->block_atts['css-class'],
			'bs-listing',
		);

		$class[] = sprintf( 'bs-listing-%s', isset( $this->block_atts['style'] ) ? $this->block_atts['style'] : 'none' );
		$class[] = sprintf( 'bs-listing-%s-tab', $this->is_multi_tab ? 'multi' : 'single' );

		if ( ! empty( $this->block_atts['have_pagination'] ) ) {
			$class[] = 'pagination-animate';
		}

		if ( ! empty( $this->block_atts['custom-css-class'] ) ) {
			$class[] = sanitize_html_class( $this->block_atts['custom-css-class'] );
		}

		if ( ! empty( $this->block_atts['custom-id'] ) ) {
			$id = sanitize_html_class( $this->block_atts['custom-id'] );
		}

		$class = implode( ' ', $class );

		return compact( 'id', 'class' );
	}


	/**
	 * @return array
	 */
	public function prepare_tabs() {

		$tabs = publisher_block_create_tabs( $this->block_atts );

		if ( ! empty( $this->block_atts['deferred_load_block'] ) ) {
			$tabs = $this->append_defer_data_atts( $tabs );
		}

		$this->tabs         = $tabs;
		$this->is_multi_tab = count( $tabs ) > 1;

		if ( $this->is_multi_tab ) {
			$this->block_atts['_is_multi_tab'] = true;
		}
	}


	/**
	 * Handle displaying of shortcode
	 *
	 * @param array  $block_atts
	 * @param string $content
	 *
	 * @return string
	 */
	function display( array $block_atts, $content = '' ) {

		$this->prepare_attributes( $block_atts );
		$this->prepare_tabs();

		if ( ! $this->block_atts ) {
			// Return nothing if tabs are empty
			return '';
		}

		$is_deferred_block = ! empty( $this->block_atts['deferred_load_block'] );
		$append_wrapper    = empty( $this->block_atts['hide_main_wrapper'] );

		ob_start();

		if ( $append_wrapper ) {

			echo '<div';
			foreach ( $this->get_tab_wrapper_atts() as $attr_key => $attr_value ) {
				echo ' ', $attr_key, '="', $attr_value, '"';
			}
			echo '>';
		}

		if ( empty( $this->block_atts['hide_heading'] ) && ! publisher_get_prop( 'hide_heading' ) ) {
			publisher_block_the_heading( $this->block_atts, $this->tabs, $this->is_multi_tab );
		}

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $this->block_atts['css-code'] ) ) {
			bf_add_css( $this->block_atts['css-code'], true, true );
		}

		if ( $this->is_multi_tab ) {
			echo "\n\t",
			'<div class="tab-content">';
		}

		foreach ( (array) $this->tabs as $idx => $tab ) {

			$this->tab      = $tab;
			$this->tab_atts = $this->get_tab_atts( $tab );

			// Deferred tab options
			$is_tab_deferred = $is_deferred_block && ! $tab['active'];

			//
			// Removes extra fields for other tabs
			// it has to work only in main tab
			//
			if ( $idx ) {
				unset( $this->tab_atts['post_ids'] );
				unset( $this->tab_atts['offset'] );
			}

			if ( $this->is_multi_tab ) {
				printf(
					'<div class="tab-pane bs-tab-anim %s %s" id="%s">',
					$tab['active'] ? ' active' : '',
					$is_tab_deferred ? ' bs-deferred-container' : '',
					esc_attr( $tab['id'] )
				);
			}

			if ( $is_tab_deferred ) {

				$this->print_deferred_tab_content();
			} else {

				$this->print_general_tab_content();

				publisher_clear_props();
			}


			if ( $this->is_multi_tab ) {
				echo '</div>';
			}

		}

		if ( $this->is_multi_tab ) {
			echo '</div>';
		}

		if ( $append_wrapper ) {
			echo '</div>';
		}

		publisher_clear_props();
		publisher_clear_query();

		return ob_get_clean();
	} // display


	/**
	 * Prepare tab exclusive attributes
	 *
	 * @param array $tab Tab attributes
	 *
	 * @return array
	 */
	public function get_tab_atts( & $tab ) {

		$tab_attributes = $this->block_atts;

		// Fix tabs terms
		switch ( $tab['type'] ) {

			// change atts category to tab category to fix query
			case 'category':
				// tags only will be included inside first tab
				if ( $tab['active'] ) {
					// $_tab_atts['tag'] = '';
				} else {
					$tab_attributes['category'] = $tab['term_id'];
				}

				$tab_attributes['query-main-term'] = $tab['term_id'];

				break;

		}

		return $tab_attributes;
	}


	public function print_deferred_tab_content() {

		publisher_set_prop( 'listing-main-term', isset( $this->tab_atts['query-main-term'] ) ? $this->tab_atts['query-main-term'] : 'none' );


		publisher_theme_pagin_manager()->wrapper_start( $this->block_atts, $this->number_of_iterations() );
		publisher_theme_pagin_manager()->display_deferred_html( $this->tab_atts, $this->view, $this->type, isset( $this->tab['data']['deferred-init'] ) ? $this->tab['data']['deferred-init'] : 0 );
		publisher_theme_pagin_manager()->wrapper_end();

	}


	public function print_general_tab_content() {

		$have_slider            = ! empty( $this->block_atts['have_slider'] );
		$have_slider_controller = $this->have_slider_controller( $this->block_atts );

		if ( $have_slider ) {

			echo '<div class="bs-slider-items-container"';
			$this->slider_settings_atts( $this->tab_atts );
			echo '>';
		}

		if ( $this->tab['type'] === 'category' ) {
			publisher_set_prop( 'listing-main-term', $this->tab_atts['query-main-term'] );
		}

		$this->print_query_items();

		if ( $have_slider ) {

			// slider controller when it's enabled
			if ( $have_slider_controller ) {
				echo '<div class="bs-slider-controls main-term-', sanitize_html_class( publisher_get_prop( 'listing-main-term', 'none' ) ), '">';
				if ( $this->have_slider_controller( $this->tab_atts, 'next_prev' ) ) {
					echo '<div class="bs-control-nav ', ' bs-control-nav-', sanitize_html_class( $this->tab_atts['slider-control-next-prev'] ), '"></div>';
				}
				echo '</div>'; // bs-slider-controls
			}

			echo '</div>';
		}
	}


	public function print_query_items() {

		$query_args = $this->get_query_args();

		switch ( $this->query_type ) {
			case 'user':
				$this->print_user_items( $query_args );
				break;

			case 'comment':
				$this->print_comment_items( $query_args );

				break;

			default:
				$this->print_post_items( $query_args );
		}

	}


	/**
	 * @return int
	 */
	public function number_of_iterations() {

		$iteration = empty( $this->tab_atts['pagination_query_count'] ) ? 1 : intval( $this->tab_atts['pagination_query_count'] );

		return max( 1, $iteration );
	}


	/**
	 * @param array $query_args
	 */
	public function print_user_items( $query_args ) {


		// Fixes count issue for "Slider" pagination
		{
			$fix_slider_query = ! empty( $this->tab_atts['paginate'] ) && $this->tab_atts['paginate'] === 'slider';

			if ( $fix_slider_query ) {
				$query_args['number'] = absint( $this->tab_atts['count'] ) * ( ! empty( $this->tab_atts['pagination-slides-count'] ) && absint( $this->tab_atts['pagination-slides-count'] ) ? absint( $this->tab_atts['pagination-slides-count'] ) : 1 );
			}
		}


		$query = $this->set_query( $query_args, $this->is_multi_tab && ! $this->tab['active'] ? $this->tab_atts : $this->block_atts );

		if ( ! empty( $this->tab_atts['have_pagination'] ) ) {

			$iteration = $this->number_of_iterations( $this->tab_atts );

			for ( $i = 0; $i < $iteration; $i ++ ) {

				if ( $fix_slider_query ) {
					publisher_set_prop( 'user-query-loop-offset', $i * absint( $this->tab_atts['count'] ) ); // Start from query result index
					publisher_set_prop( 'user-query-loop-count', absint( $this->tab_atts['count'] ) ); // users count to print
				}

				publisher_theme_pagin_manager()->wrapper_start( $this->tab_atts, $iteration, ( $i ? '' : 'bs-slider-first-item' ) );
				$this->display_content( $this->tab_atts, $this->tab );
				publisher_theme_pagin_manager()->wrapper_end();

			}

			// Display pagination
			publisher_theme_pagin_manager()->display_pagination( $this->tab_atts, $query, $this->view, $this->type );


		} else {

			$this->display_content( $this->tab_atts, $this->tab );
		}
	}


	/**
	 * @param array $query_args
	 */
	public function print_comment_items( $query_args ) {

		$this->print_user_items( $query_args );
	}


	/**
	 * @param array $query_args
	 */
	public function print_post_items( $query_args ) {

		if ( ! empty( $this->tab_atts['have_pagination'] ) ) {

			$iteration = $this->number_of_iterations( $this->tab_atts );

			/**
			 * modify posts_per_page value
			 */
			$slide_posts = 0;
			if ( ! empty( $query_args['posts_per_page'] ) ) {

				$slide_posts                  = $query_args['posts_per_page'];
				$query_args['posts_per_page'] *= $iteration;
			} elseif ( ! empty( $query_args['showposts'] ) ) {

				$slide_posts             = $query_args['showposts'];
				$query_args['showposts'] *= $iteration;
			}

			if ( $slide_posts ) {
				publisher_set_prop( 'posts-count', $slide_posts );
			}

			$query = $this->set_query( $query_args, $this->is_multi_tab && ! $this->tab['active'] ? $this->tab_atts : $this->block_atts );

			// cache it for preventing each slide to shit this!
			global $publisher_theme_core_props_cache;
			$_listing_prop = $publisher_theme_core_props_cache;

			for ( $i = 0; $i < $iteration; $i ++ ) {

				if ( ! publisher_have_posts() ) {
					break;
				}

				publisher_theme_pagin_manager()->wrapper_start( $this->tab_atts, $iteration, ( $i ? '' : 'bs-slider-first-item' ) );
				$this->display_content( $this->tab_atts, $this->tab );
				publisher_theme_pagin_manager()->wrapper_end();

				// return back props for next slide to fix props changing problems
				$GLOBALS['publisher_theme_core_props_cache'] = $_listing_prop;
			}

			// Display pagination
			publisher_theme_pagin_manager()->display_pagination( $this->tab_atts, $query, $this->view, $this->type );


		} else {

			$this->set_query( $query_args, $this->is_multi_tab && ! empty( $this->tab_atts['active'] ) ? $this->tab_atts : $this->block_atts );

			$this->display_content( $this->tab_atts, $this->tab );

			// Disable the "disable duplicate" posts of block.
			if ( ! empty( $this->tab_atts['disable_duplicate'] ) && class_exists( 'Publisher_Theme_Duplicate_Posts' ) ) {
				publisher_unset_global( Publisher_Theme_Duplicate_Posts::$temporary_disable_global ); // enable it again
			}
		}

	}


	/**
	 * Get list of query arguments
	 *
	 * @return array
	 */
	public function get_query_args() {

		if ( $this->query_type === 'user' ) {
			$query_args = publisher_pagin_create_user_query_args( $this->tab_atts );
		} elseif ( $this->query_type === 'comment' ) {
			$query_args = publisher_pagin_create_comment_query_args( $this->tab_atts );
		} else {
			$query_args = publisher_pagin_create_wp_query_args( $this->tab_atts, 1, $this->tab );
		}

		return apply_filters( 'publisher-theme-core/pagination/bs-theme-listing/args', $query_args, $this->tab_atts, $this->tabs, $this->query_type );
	}


	/**
	 * Handy function to set query args
	 *
	 * @param array $query_args
	 * @param array $atts
	 *
	 * @return WP_Query|WP_User_Query|WP_Comment_Query
	 */
	function set_query( $query_args, $atts = array() ) {

		if ( is_array( $query_args ) ) {
			$query = publisher_theme_pagin_manager()->build_query( $this->query_type, $query_args, '', $atts );
		} elseif ( is_object( $query_args ) ) {
			$query = $query_args;
		} else {
			$query = null;
		}
		$this->active_query = $query;

		return $query;
	}


	/**
	 * Get current active query
	 *
	 * @return WP_Comment_Query|WP_Query|WP_User_Query|null
	 */
	public function get_query() {

		return $this->active_query;
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		trigger_error( sprintf( __( 'You should override display content in child of Publisher_Theme_Listing_Shortcode class.', 'publisher' ) ) );
	}


	function page_builder_settings() {

		if ( empty( $this->name ) ) {
			return array();
		}

		return array(
			'name'           => $this->name,
			'base'           => $this->id,
			'icon'           => $this->icon,
			'desc'           => isset( $this->desc ) ? $this->desc : $this->description,
			'weight'         => 10,
			'wrapper_height' => 'full',
			'category'       => __( 'Content', 'publisher' ),
		);
	}


	/**
	 *
	 * @return array
	 */
	public static function pagination_styles() {

		return Publisher_Theme_Listing_Pagin_Manager::pagination_styles();
	}


	protected function pagination_styles_group() {

		return array(
			'ajax'   => 'Ajax',
			'slider' => 'Slider'
		);
	}


	/**
	 * Get fields config array
	 *
	 * @since 1.2.0
	 * @return array
	 */
	public function get_fields() {

		return array_merge(
			$this->heading_fields(),
			$this->filter_fields(),
			$this->tab_fields(),
			$this->pagination_fields(),
			$this->option_fields()
		);
	}


	public static function user_role_option() {

		$roles = array();

		foreach ( get_editable_roles() as $role => $options ) {
			$roles[ $role ] = $options['name'];
		}

		return $roles;
	}


	//
	// VC Maps Functions
	//


	/**
	 * Handy function used to add posts filters fields array to VC_Map
	 *
	 * @return array
	 */
	function filter_fields() {

		if ( $this->query_type === 'user' ) {

			$fields = array(
				array(
					'type' => 'tab',
					'name' => __( 'User Filter', 'publisher' ),
					'id'   => 'users_filter',
				),
				array(
					'name'           => __( 'Filter user roles', 'publisher' ),
					'type'           => 'switch',
					'id'             => 'filter_roles',
					//
					'on-label'       => __( 'Yes', 'publisher' ),
					'off-label'      => __( 'No', 'publisher' ),
					//
					'vc_admin_label' => true,
				),
				array(
					'type'             => 'select',
					//
					'name'             => __( 'User Roles', 'publisher' ),
					'id'               => 'roles',
					//
					'multiple'         => true,
					'deferred-options' => 'Publisher_Theme_Listing_Shortcode::user_role_option',
					//
					'show_on'          => array( array( 'filter_roles=1' ) ),
					'vc_admin_label'   => false,
				),
				array(
					'desc'           => __( 'Default: 10', 'publisher' ),
					'name'           => __( 'Number of Users', 'publisher' ),
					'type'           => 'text',
					'id'             => 'count',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'A string value to search for in the fields of the users table', 'publisher' ),
					'name'           => __( 'Search', 'publisher' ),
					'type'           => 'text',
					'id'             => 'search',
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Order', 'publisher' ),
					'id'             => 'order',
					//
					'type'           => 'select',
					'options'        => array(
						'DESC' => __( 'Latest First - Descending', 'publisher' ),
						'ASC'  => __( 'Oldest First - Ascending', 'publisher' ),
					),
					//
					'vc_admin_label' => false,
				),
				array(
					'name'           => __( 'Order By', 'publisher' ),
					'id'             => 'order_by',
					//
					'options'        => array(
						'user_registered' => __( 'User registered', 'publisher' ),
						'user_nicename'   => __( 'User nicename', 'publisher' ),
						'display_name'    => __( 'Display name', 'publisher' ),
						'user_login'      => __( 'User login', 'publisher' ),
						'user_email'      => __( 'User email', 'publisher' ),
						'post_count'      => __( 'Post count', 'publisher' ),
						'user_url'        => __( 'User url', 'publisher' ),
						'id'              => __( 'ID', 'publisher' ),
					),
					'type'           => 'select',
					//
					'vc_admin_label' => false,
				),
				array(
					'desc'           => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
					'name'           => __( 'Offset', 'publisher' ),
					'id'             => 'offset',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),

				array(
					'desc'           => __( 'List of users to include in the result. Enter here the users IDs separated by commas (ex: 10,27,233)', 'publisher' ),
					'name'           => __( 'Include Users', 'publisher' ),
					'id'             => 'include',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),

				array(
					'desc'           => __( 'List of users to exclude in the result. Enter here the users IDs separated by commas (ex: 10,27,233)', 'publisher' ),
					'name'           => __( 'Exclude Users', 'publisher' ),
					'id'             => 'exclude',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),
			);
		} elseif ( $this->query_type === 'comment' ) {

			$fields = array(
				array(
					'type' => 'tab',
					'name' => __( 'Comment Filter', 'publisher' ),
					'id'   => 'comments_filter',
				),
				array(
					'name'           => __( 'Comment author email address', 'publisher' ),
					'type'           => 'text',
					'id'             => 'author_email',
					//
					'vc_admin_label' => false,
				),

				array(
					'desc'           => __( 'List of author users to include in the result. Enter here the users IDs separated by commas (ex: 10,27,233)', 'publisher' ),
					'name'           => __( 'Include Users', 'publisher' ),
					'id'             => 'include',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),

				array(
					'desc'           => __( 'List of author users to exclude in the result. Enter here the users IDs separated by commas (ex: 10,27,233)', 'publisher' ),
					'name'           => __( 'Exclude Users', 'publisher' ),
					'id'             => 'exclude',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),

				array(
					'desc'           => __( 'List of posts to include in the result. Enter here the posts IDs separated by commas (ex: 10,27,233)', 'publisher' ),
					'name'           => __( 'Exclude Users', 'publisher' ),
					'id'             => 'include_posts',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),

				array(
					'desc'           => __( 'List of posts to exclude in the result. Enter here the posts IDs separated by commas (ex: 10,27,233)', 'publisher' ),
					'name'           => __( 'Exclude Users', 'publisher' ),
					'id'             => 'exclude_posts',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),

				array(
					'desc'           => __( 'Default: 10', 'publisher' ),
					'name'           => __( 'Number of Comments', 'publisher' ),
					'type'           => 'text',
					'id'             => 'count',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'A string value to search for in the fields of the comments table', 'publisher' ),
					'name'           => __( 'Search', 'publisher' ),
					'type'           => 'text',
					'id'             => 'search',
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Order', 'publisher' ),
					'id'             => 'order',
					//
					'type'           => 'select',
					'options'        => array(
						'DESC' => __( 'Latest First - Descending', 'publisher' ),
						'ASC'  => __( 'Oldest First - Ascending', 'publisher' ),
					),
					//
					'vc_admin_label' => false,
				),
				array(
					'name'           => __( 'Order By', 'publisher' ),
					'id'             => 'order_by',
					//
					'options'        => array(
						'comment_author_email' => __( 'Author email', 'publisher' ),
						'comment_author_url'   => __( 'Author url', 'publisher' ),
						'comment_author_IP'    => __( 'Author IP', 'publisher' ),
						'comment_approved'     => __( 'Approved', 'publisher' ),
						'comment_date_gmt'     => __( 'Date gmt', 'publisher' ),
						'comment_content'      => __( 'Content', 'publisher' ),
						'comment_post_ID'      => __( 'Post ID', 'publisher' ),
						'user_id'              => __( 'User id', 'publisher' ),
						'comment_parent'       => __( 'Parent', 'publisher' ),
						'comment_author'       => __( 'Author', 'publisher' ),
						'comment_karma'        => __( 'Karma', 'publisher' ),
						'comment_agent'        => __( 'Agent', 'publisher' ),
						'comment_date'         => __( 'Date', 'publisher' ),
						'comment_type'         => __( 'Type', 'publisher' ),
						'comment_ID'           => __( 'ID', 'publisher' ),
					),
					'type'           => 'select',
					//
					'vc_admin_label' => false,
				),
				array(
					'desc'           => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4). Please note offset works only for the main tab and it will not work for other tabs.', 'publisher' ),
					'name'           => __( 'Offset', 'publisher' ),
					'id'             => 'offset',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),
			);
		} else {
			$fields = array(
				array(
					'type' => 'tab',
					'name' => __( 'Posts Filter', 'publisher' ),
					'id'   => 'posts_filter',
				),
				array(
					'type'           => 'term_select',
					'taxonomy'       => 'category',
					//
					'input-desc'     => __( 'If you need Custom Taxonomy you can find in bottom of this form.', 'publisher' ),
					'name'           => __( 'Categories', 'publisher' ),
					'id'             => 'category',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'Search and select tags. You can use combination of Category and Tags!', 'publisher' ),
					'callback'       => 'BF_Ajax_Select_Callbacks::tags_callback',
					'placeholder'    => __( 'Search tag...', 'publisher' ),
					'get_name'       => 'BF_Ajax_Select_Callbacks::tag_name',
					'name'           => __( 'Tags', 'publisher' ),
					'type'           => 'ajax_select',
					'id'             => 'tag',
					//
					'vc_admin_label' => false,
				),
				array(
					'desc'           => __( 'If the field is empty the limit post number will be the number from WordPress Settings -> Reading.', 'publisher' ),
					'name'           => __( 'Number of Posts', 'publisher' ),
					'type'           => 'text',
					'id'             => 'count',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'Filter multiple posts by ID. Enter here the post IDs separated by commas (ex: 10,27,233). To exclude posts from this block add them with "-" (ex: -7, -16)', 'publisher' ),
					'name'           => __( 'Post ID filter', 'publisher' ),
					'id'             => 'post_ids',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
					'name'           => __( 'Offset posts', 'publisher' ),
					'id'             => 'offset',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'You can show only posts that have featured image with enabling this option.', 'publisher' ),
					'name'           => __( 'Only Posts With Featured Image?', 'publisher' ),
					'id'             => 'featured_image',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
				),
				array(
					'desc'           => __( 'You can remove sticky posts from result with enabling this option.', 'publisher' ),
					'name'           => __( 'Remove Sticky Posts?', 'publisher' ),
					'id'             => 'ignore_sticky_posts',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
				),
				array(
					'desc'           => __( 'Filter multiple authors by ID. Enter here the author IDs separated by commas (ex: 10,27,233). To exclude author from this block add them with \'-\' (ex: -7, -16)', 'publisher' ),
					'name'           => __( 'Post Author ID filter', 'publisher' ),
					'id'             => 'author_ids',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Disable Duplicate Posts Removal', 'publisher' ),
					'desc'           => __( 'With enabling this option the duplicates posts removal feature will be disabled only for this block.', 'publisher' ),
					'id'             => 'disable_duplicate',
					'type'           => 'switch',
					//
					'vc_admin_label' => true,
				),
				array(
					'type'           => 'select',
					'options'        => array(
						''          => __( 'No Filter', 'publisher' ),
						'today'     => __( 'Today Posts', 'publisher' ),
						'yesterday' => __( 'Today + Yesterday Posts', 'publisher' ),
						'week'      => __( 'This Week Posts', 'publisher' ),
						'month'     => __( 'This Month Posts', 'publisher' ),
						'year'      => __( 'This Year Posts', 'publisher' ),
					),
					//
					'name'           => __( 'Time Filter', 'publisher' ),
					'id'             => 'time_filter',
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Order', 'publisher' ),
					'id'             => 'order',
					//
					'type'           => 'select',
					'options'        => array(
						'DESC' => __( 'Latest First - Descending', 'publisher' ),
						'ASC'  => __( 'Oldest First - Ascending', 'publisher' ),
					),
					//
					'vc_admin_label' => false,
				),
				array(
					'name'             => __( 'Order By', 'publisher' ),
					'id'               => 'order_by',
					//
					'deferred-options' => 'publisher_get_order_field_option',
					'type'             => 'select',
					//
					'vc_admin_label'   => false,
				),

				array(
					"name" => __( 'Custom Post type and Taxonomy', 'publisher' ),
					"type" => 'heading',
					"id"   => '_name_1',
				),
				array(
					'desc'           => __( 'Enter here post type ID\'s separated by commas ( ex: book,movie,product ).', 'publisher' ),
					'name'           => __( 'Custom Post Type', 'publisher' ),
					'id'             => 'post_type',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'Enter here custom taxonomies with "taxonomy:term_id" pattern also you can separate multiple with commas. ( ex: genre:200,genre:212,writer:120 )', 'publisher' ),
					'name'           => __( 'Custom Taxonomy', 'publisher' ),
					'id'             => 'taxonomy',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),

				array(
					"name" => __( 'Query Conditions', 'publisher' ),
					"type" => 'heading',
					"id"   => '_name_2',
				),
				array(
					"name"           => __( 'Between Cats & Tags', 'publisher' ),
					"id"             => 'cats-tags-condition',
					'section_class'  => 'bf-vc-third-col',
					//
					"type"           => 'select',
					'options'        => array(
						'and' => __( 'And (Both Cats & Tags)', 'publisher' ),
						'or'  => __( 'OR (One or more cat/ tag)', 'publisher' ),
					),
					//
					"vc_admin_label" => false,
				),
				array(
					"name"           => __( 'Between Cats', 'publisher' ),
					"id"             => 'cats-condition',
					'section_class'  => 'bf-vc-third-col',
					//
					"type"           => 'select',
					'options'        => array(
						'and' => __( 'And (All Cats)', 'publisher' ),
						'in'  => __( 'OR (One or more cat)', 'publisher' ),
					),
					//
					"vc_admin_label" => false,
				),
				array(
					"name"           => __( 'Between Tags', 'publisher' ),
					'section_class'  => 'bf-vc-third-col',
					"id"             => 'tags-condition',
					//
					"type"           => 'select',
					'options'        => array(
						'and' => __( 'And (All Tags)', 'publisher' ),
						'in'  => __( 'OR (One or more tag)', 'publisher' ),
					),
					//
					"vc_admin_label" => false,
				),

			);
		}

		return $fields;
	} // filter_fields


	/**
	 * Handy function used to add posts filters fields array to VC_Map
	 *
	 * @return array
	 */
	function tab_fields() {

		if ( $this->query_type !== 'post' ) {
			return array();
		}

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Multi Tabs', 'publisher' ),
				'id'   => 'multi_tabs',
			),
			array(
				'name'           => __( 'Tabs', 'publisher' ),
				'id'             => 'tabs',
				//
				'type'           => 'select',
				'options'        => array(
					''               => __( 'No Tab', 'publisher' ),
					'cat_filter'     => __( 'Categories as Tab', 'publisher' ),
					'sub_cat_filter' => __( 'Sub Categories as Tab', 'publisher' ),
					'tax_filter'     => __( 'Taxonomies as Tab', 'publisher' ),
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'     => __( 'Select multiple categories with holding "Control" button. this will create multi tab header.', 'publisher' ),
				'name'     => __( 'Selected Categories as Tab', 'publisher' ),
				'show_on'  => array( array( 'tabs=cat_filter' ) ),
				'id'       => 'tabs_cat_filter',
				//
				'type'     => 'select',
				'options'  => array(
					'category_walker' => 'category_walker'
				),
				//
				'multiple' => true,
			),
			array(
				'desc'           => __( 'Enter here custom taxonomies with "taxonomy:term_id" pattern also you can separate multiple with commas. ( ex: genre:200,genre:212,writer:120 )', 'publisher' ),
				'name'           => __( 'Taxonomies as tab', 'publisher' ),
				'show_on'        => array( array( 'tabs=tax_filter' ) ),
				'id'             => 'tabs_tax_filter',
				'type'           => 'text',
				//
				'vc_admin_label' => true,
			),
			array(
				'desc'           => __( '<strong>Recommended</strong>: Deferred. <br> Use deferred content type to make site loading faster, There is no need to load content\'s in tabs that maybe users didn\'t see them.', 'publisher' ),
				'show_on'        => array( array( 'tabs=cat_filter' ), array( 'tabs=sub_cat_filter' ) ),
				'name'           => __( 'Tabs content type', 'publisher' ),
				'value'          => $this->defaults['tabs_content_type'],
				'id'             => 'tabs_content_type',
				//
				'type'           => 'select',
				'options'        => array(
					'deferred'  => __( 'Deferred Content', 'publisher' ),
					'preloaded' => __( 'Preloaded Content', 'publisher' ),
				),
				//
				'vc_admin_label' => false,
			),
		);
	} // tab_fields


	/**
	 * Handy function used to add posts filters fields array to VC_Map
	 *
	 * @return array
	 */
	function heading_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Heading', 'publisher' ),
				'id'   => 'heading',
			),
			array(
				'name'           => __( 'Custom name (Optional)', 'publisher' ),
				'id'             => 'title',
				'type'           => 'text',
				//
				'vc_admin_label' => true,
			),
			array(
				'desc'           => __( 'Select custom icon for listing.', 'publisher' ),
				'name'           => __( 'Custom name Icon (Optional)', 'publisher' ),
				'type'           => 'icon_select',
				'id'             => 'icon',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'You can hide listing name with turning on this field.', 'publisher' ),
				'name'           => __( 'Hide listing name?', 'publisher' ),
				'section_class'  => 'style-floated-left bordered',
				'id'             => 'hide_title',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Heading Custom Color', 'publisher' ),
				'desc'           => __( 'Change block heading color.', 'publisher' ),
				'id'             => 'heading_color',
				'type'           => 'color',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'             => __( 'Custom Heading Style', 'publisher' ),
				'desc'             => __( 'Specialize this block with custom heading.', 'publisher' ),
				'id'               => 'heading_style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_heading_option_list',
					'args'     => array(
						true
					),
				),
				'column_class'     => 'one-column',
				//
				'vc_admin_label'   => false,
			),
			array(
				'name'           => __( 'Custom link (Optional)', 'publisher' ),
				'desc'           => __( 'Title will be linked to this URL.', 'publisher' ),
				'id'             => 'title_link',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
		);
	} // tab_fields


	/**
	 *  Handy function used to add pagination fields array to VC_Map
	 *
	 * @return array
	 */
	function pagination_fields() {

		$groups = $this->pagination_styles_group();

		$options = array( 'none' => __( 'No Pagination', 'publisher' ) );
		foreach ( self::pagination_styles() as $key => $data ) {
			$group = &$data['group'];

			if ( ! isset( $options[ $group ] ) ) {
				$options[ $group ] = array(
					'label'   => isset( $groups[ $group ] ) ? $groups[ $group ] : $group,
					'options' => array()
				);
			}

			$options[ $group ]['options'][ $key ] = $data['name'];
		}

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Pagination', 'publisher' ),
				'id'   => 'pagination',
			),
			array(
				'name'           => __( 'Pagination Type', 'publisher' ),
				'id'             => 'paginate',
				'always_show'    => true,
				//
				'type'           => 'select',
				'options'        => $options,
				//
				'vc_admin_label' => false,
			),

			array(
				'name'           => __( 'Show pagination number label', 'publisher' ),
				'show_on'        => array( array( 'paginate=next_prev' ) ),
				'id'             => 'pagination-show-label',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),

			array(
				'name'           => __( 'Number of slides', 'publisher' ),
				'show_on'        => array( 'paginate=slider' ),
				'id'             => 'pagination-slides-count',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),

			array(
				'name'           => __( 'Animation Speed', 'publisher' ),
				'show_on'        => array( 'paginate=slider' ),
				'id'             => 'slider-animation-speed',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'AutoPlay', 'publisher' ),
				'show_on'        => array( 'paginate=slider' ),
				'id'             => 'slider-autoplay',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Slide duration', 'publisher' ),
				'show_on'        => array(
					array( 'paginate=slider', 'slider-autoplay=1' ),
				),
				'id'             => 'slider-speed',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Display Dot Navigation', 'publisher' ),
				'show_on'        => array( 'paginate=slider' ),
				'id'             => 'slider-control-dots',
				//
				'type'           => 'select',
				'options'        => array(
					'off'     => __( 'Don\'t Show', 'publisher' ),
					'style-1' => __( 'Style 1', 'publisher' ),
					'style-2' => __( 'Style 2', 'publisher' ),
					'style-3' => __( 'Style 3', 'publisher' ),
					'style-4' => __( 'Style 4', 'publisher' ),
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Display Control Navigation', 'publisher' ),
				'show_on'        => array( 'paginate=slider' ),
				'id'             => 'slider-control-next-prev',
				//
				'type'           => 'select',
				'options'        => array(
					'off'     => __( 'Don\'t Show', 'publisher' ),
					'style-1' => __( 'Style 1', 'publisher' ),
					'style-2' => __( 'Style 2', 'publisher' ),
					'style-3' => __( 'Style 3', 'publisher' ),
					'style-4' => __( 'Style 4', 'publisher' ),
				),
				//
				'vc_admin_label' => false,
			),
		);
	} // pagination_fields


	function option_fields() {

		$fields = array(
			'design_options'   => array(
				'type' => 'tab',
				'name' => __( 'Design options', 'publisher' ),
				'id'   => 'design_options',
			),
			'bs-show-desktop'  => array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Desktop', 'publisher' ),
				'id'             => 'bs-show-desktop',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			'bs-show-tablet'   => array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Tablet Portrait', 'publisher' ),
				'id'             => 'bs-show-tablet',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			'bs-show-phone'    => array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Phone', 'publisher' ),
				'id'             => 'bs-show-phone',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			'custom-css-class' => array(
				'name'           => __( 'Custom CSS Class', 'publisher' ),
				'section_class'  => 'bf-section-two-column',
				'id'             => 'custom-css-class',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			'custom-id'        => array(
				'name'           => __( 'Custom ID', 'publisher' ),
				'section_class'  => 'bf-section-two-column',
				'id'             => 'custom-id',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
		);

		if ( $listing_option_id = $this->get_listing_option_id() ) {

			$fields['override-listing-settings'] = array(
				'name' => __( 'Override Listing Settings?', 'publisher' ),
				'id'   => 'override-listing-settings',
				'type' => 'switch',
			);

			$fields['listing-settings'] = array(
				'show_on'         => array( array( 'override-listing-settings=1' ) ),
				'container_class' => 'advanced-block-settings',
				'id'              => 'listing-settings',
				'name'            => '',
				//
				'type'            => 'custom',
				'input_callback'  => array(
					'callback' => 'publisher_cb_blocks_setting_field',
					'args'     => array(
						array(
							'field'         => $listing_option_id,
							'use_group'     => false,
							'print_images'  => false,
							'vc_input_name' => true,
						)
					),
				),
				//
			);
		}

		$fields['bs-text-color-scheme'] = array(
			'name'           => __( 'Block Text Color Scheme', 'publisher' ),
			'id'             => 'bs-text-color-scheme',
			//
			'type'           => 'select',
			'options'        => array(
				''      => __( '-- Default --', 'publisher' ),
				'light' => __( 'White Color Texts', 'publisher' ),
			),
			//
			'vc_admin_label' => false,
		);

		$fields['css'] = array(
			'name' => __( 'CSS box', 'publisher' ),
			'type' => 'css_editor',
			'id'   => 'css',
		);

		return $fields;
	}


	/**
	 * Used to add listing level ads to each block
	 *
	 * @return array
	 */
	function block_ad_fields() {

		//
		// Better Ads Manager needed for this option
		//
		if ( ! publisher_is_ad_plugin_active() ) {
			return array(
				array(
					'type' => 'tab',
					'name' => __( 'Ad', 'publisher' ),
					'id'   => 'ad_options',
				),
				array(
					'name'           => __( 'Better Ads Manager Plugin Needed.', 'publisher' ),
					'desc'           => __( 'Please activate <strong style="color: red">Better Ads Manager</strong> plugin to use this option.', 'publisher' ),
					'id'             => 'ad-help',
					'type'           => 'bf-info',
					//
					'vc_admin_label' => false,
				),
			);
		}


		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Ad', 'publisher' ),
				'id'   => 'ad_options',
			),

			array(
				'name'           => __( 'Activate ad for this listing?', 'publisher' ),
				'desc'           => __( 'By enabling this option you can show ads after X post in this block.', 'publisher' ),
				'id'             => 'ad-active',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'After each X number of post? ', 'publisher' ),
				'id'             => 'ad-after_each',
				'type'           => 'text',
				'show_on'        => array(
					array(
						'ad-active=1'
					)
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Ad Type', 'publisher' ),
				'desc'           => __( 'Choose campaign or banner.', 'publisher' ),
				'id'             => 'ad-type',
				'type'           => 'select',
				'options'        => array(
					''         => __( '-- Select Ad Type --', 'publisher' ),
					'campaign' => __( 'Campaign', 'publisher' ),
					'banner'   => __( 'Banner', 'publisher' ),
				),
				'show_on'        => array(
					array(
						'ad-active=1'
					)
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'             => __( 'Banner', 'publisher' ),
				'desc'             => __( 'Choose banner.', 'publisher' ),
				'id'               => 'ad-banner',
				'type'             => 'select',
				'deferred-options' => array(
					'callback' => 'better_ads_get_banners_option',
					'args'     => array(
						- 1,
						true,
						'normal' // normal ads not AMP
					),
				),
				'show_on'          => array(
					array(
						'ad-active=1',
						'ad-type=banner',
					)
				),
				//
				'vc_admin_label'   => false,
			),
			array(
				'name'             => __( 'Campaign', 'publisher' ),
				'desc'             => __( 'Choose campaign.', 'publisher' ),
				'id'               => 'ad-campaign',
				'type'             => 'select',
				'deferred-options' => array(
					'callback' => 'better_ads_get_campaigns_option',
					'args'     => array(
						- 1,
						true
					),
				),
				'show_on'          => array(
					array(
						'ad-active=1',
						'ad-type=campaign',
					),
				),
				//
				'vc_admin_label'   => false,
			),
			array(
				'name'           => __( 'Max Amount of Allowed Banners', 'publisher' ),
				'desc'           => __( 'How many banners are allowed?.', 'publisher' ),
				'input-desc'     => __( 'Leave empty to show all banners.', 'publisher' ),
				'id'             => 'ad-count',
				'type'           => 'text',
				'show_on'        => array(
					array(
						'ad-active=1',
						'ad-type=campaign',
					),
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Columns', 'publisher' ),
				'desc'           => __( 'Show ads in multiple columns.', 'publisher' ),
				'id'             => 'ad-columns',
				'type'           => 'select',
				"options"        => array(
					1 => __( '1 Column', 'publisher' ),
					2 => __( '2 Column', 'publisher' ),
					3 => __( '3 Column', 'publisher' ),
				),
				'show_on'        => array(
					array(
						'ad-active=1',
						'ad-type=campaign',
					),
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Order By', 'publisher' ),
				'id'             => 'ad-orderby',
				'type'           => 'select',
				"options"        => array(
					'date'  => __( 'Date', 'publisher' ),
					'title' => __( 'Title', 'publisher' ),
					'rand'  => __( 'Rand', 'publisher' ),
				),
				'show_on'        => array(
					array(
						'ad-active=1',
						'ad-type=campaign',
					),
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Order', 'publisher' ),
				'desc'           => __( 'Show ads in multiple columns.', 'publisher' ),
				'id'             => 'ad-order',
				'type'           => 'select',
				"options"        => array(
					'ASC'  => __( 'Ascending', 'publisher' ),
					'DESC' => __( 'Descending', 'publisher' ),
				),
				'show_on'        => array(
					array(
						'ad-active=1',
						'ad-type=campaign',
					),
				),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Align', 'publisher' ),
				'desc'           => __( 'Choose align of ad.', 'publisher' ),
				'id'             => 'ad-align',
				'type'           => 'select',
				"options"        => array(
					'left'   => __( 'Left', 'publisher' ),
					'center' => __( 'Center', 'publisher' ),
					'right'  => __( 'Right', 'publisher' ),
				),
				'show_on'        => array(
					array(
						'ad-active=1',
						'ad-type=campaign',
					),
					array(
						'ad-active=1',
						'ad-type=banner',
					),
				),
				//
				'vc_admin_label' => false,
			),


		);

		return $fields;
	}


	/**
	 * Get listing settings option id
	 *
	 * @since 1.1.0
	 *
	 * @return bool|string
	 */
	public function get_listing_option_id() {

		if ( preg_match( '#^bs-(.*?)-listing-(.*?)$#i', $this->id, $match ) ) {

			return 'listing-' . $match[1] . '-' . $match[2];

		} elseif ( preg_match( '#^bs-slider-(.+)#', $this->id, $match ) ) {

			return 'listing-bs-slider-' . $match[1];
		}
	}

}

