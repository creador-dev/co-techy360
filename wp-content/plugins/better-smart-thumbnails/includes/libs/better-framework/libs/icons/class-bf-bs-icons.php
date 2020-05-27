<?php


/**
 * Used for handling all actions about BS Icons in PHP
 */
class BF_BS_Icons {

	/**
	 * List of all icons
	 *
	 * @var array
	 */
	public $icons = array();


	/**
	 * List of all categories
	 *
	 * @var array
	 */
	public $categories = array();


	/**
	 * Version on current BS Font Icons
	 *
	 * @var string
	 */
	public $version = '1.0.0';


	function __construct() {

		// Categories

		$this->categories = array(
			'bs-cat-1' => array(
				'id'    => 'bs-cat-1',
				'label' => 'BS Icons'
			),
		);

		$this->icons = array(
			'bsfi-facebook'     => array(
				'label'     => 'Facebook',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b000',
			),
			'bsfi-twitter'      => array(
				'label'     => 'Twitter',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b001',
			),
			'bsfi-dribbble'     => array(
				'label'     => 'Dribbble',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b002',
			),
			'bsfi-vimeo'        => array(
				'label'     => 'Viemo',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b003',
			),
			'bsfi-rss'          => array(
				'label'     => 'RSS',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b004',
			),
			'bsfi-github'       => array(
				'label'     => 'Github',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b005',
			),
			'bsfi-vk'           => array(
				'label'     => 'VK',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b006',
			),
			'bsfi-delicious'    => array(
				'label'     => 'Delicious',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b007',
			),
			'bsfi-youtube'      => array(
				'label'     => 'Youtube',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b008',
			),
			'bsfi-soundcloud'   => array(
				'label'     => 'SoundCloud',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b009',
			),
			'bsfi-behance'      => array(
				'label'     => 'Behance',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b00a',
			),
			'bsfi-pinterest'    => array(
				'label'     => 'Pinterest',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b00b',
			),
			'bsfi-vine'         => array(
				'label'     => 'Vine',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b00c',
			),
			'bsfi-steam'        => array(
				'label'     => 'Steam',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b00d',
			),
			'bsfi-flickr'       => array(
				'label'     => 'Flickr',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b00e',
			),
			'bsfi-envato'       => array(
				'label'     => 'Envato',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b00f',
			),
			'bsfi-forrst'       => array(
				'label'     => 'Forrst',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b010',
			),
			'bsfi-mailchimp'    => array(
				'label'     => 'MailChimp',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b011',
			),
			'bsfi-linkedin'     => array(
				'label'     => 'Linkedin',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b012',
			),
			'bsfi-tumblr'       => array(
				'label'     => 'Tumblr',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b013',
			),
			'bsfi-500px'        => array(
				'label'     => '500px',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b014',
			),
			'bsfi-members'      => array(
				'label'     => 'Members',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b015',
			),
			'bsfi-comments'     => array(
				'label'     => 'Comments',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b016',
			),
			'bsfi-posts'        => array(
				'label'     => 'Posts',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b017',
			),
			'bsfi-instagram'    => array(
				'label'     => 'Instagram',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b018',
			),
			'bsfi-whatsapp'     => array(
				'label'     => 'Whatsapp',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b019',
			),
			'bsfi-line'         => array(
				'label'     => 'Line',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01a',
			),
			'bsfi-blackberry'   => array(
				'label'     => 'BlackBerry',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01b',
			),
			'bsfi-viber'        => array(
				'label'     => 'Viber',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01c',
			),
			'bsfi-skype'        => array(
				'label'     => 'Skype',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01d',
			),
			'bsfi-gplus'        => array(
				'label'     => 'Google Plus',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01e',
			),
			'bsfi-telegram'     => array(
				'label'     => 'Telegram',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01f',
			),
			'bsfi-apple'        => array(
				'label'     => 'Apple',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b020',
			),
			'bsfi-android'      => array(
				'label'     => 'Android',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b021',
			),
			'bsfi-fire-1'       => array(
				'label'     => 'Fire 1',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b022',
			),
			'bsfi-fire-2'       => array(
				'label'     => 'Fire 2',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b023',
			),
			'bsfi-fire-3'       => array(
				'label'     => 'Fire 3',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b026',
			),
			'bsfi-fire-4'       => array(
				'label'     => 'Fire 4',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b027',
			),
			'bsfi-betterstudio' => array(
				'label'     => 'BetterStudio',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b025',
			),
			'bsfi-publisher'    => array(
				'label'     => 'Publisher',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b024',
			),
			'bsfi-google'       => array(
				'label'     => 'Google+ <span class="text-muted">Alias</span>',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01e',
			),
			'bsfi-bbm'          => array(
				'label'     => 'BBM <span class="text-muted">Alias</span>',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b01b',
			),
			'bsfi-appstore'     => array(
				'label'     => 'AppStore <span class="text-muted">Alias</span>',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b020',
			),
			'bsfi-quote-1'      => array(
				'label'     => 'Quote 1',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b040',
			),
			'bsfi-quote-2'      => array(
				'label'     => 'Quote 2',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b041',
			),
			'bsfi-quote-3'      => array(
				'label'     => 'Quote 3',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b042',
			),
			'bsfi-quote-4'      => array(
				'label'     => 'Quote 4',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b043',
			),
			'bsfi-quote-5'      => array(
				'label'     => 'Quote 5',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b044',
			),
			'bsfi-quote-6'      => array(
				'label'     => 'Quote 6',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b045',
			),
			'bsfi-quote-7'      => array(
				'label'     => 'Quote 7',
				'category'  => array( 'bs-cat-1' ),
				'font_code' => '\b046',
			),
			'bsfi-quote-1'      => array(
				'label'    => 'Quote 1',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-quote-2'      => array(
				'label'    => 'Quote 2',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-quote-3'      => array(
				'label'    => 'Quote 3',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-quote-4'      => array(
				'label'    => 'Quote 4',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-quote-5'      => array(
				'label'    => 'Quote 5',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-quote-6'      => array(
				'label'    => 'Quote 6',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-quote-7'      => array(
				'label'    => 'Quote 7',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-better-amp'   => array(
				'label'    => 'Better AMP',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-ok-ru'        => array(
				'label'    => 'Okru',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-snapchat'     => array(
				'label'    => 'Snapchat',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-1'   => array(
				'label'    => 'Comment 1',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-2'   => array(
				'label'    => 'Comment 2',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-3'   => array(
				'label'    => 'Comment 3',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-4'   => array(
				'label'    => 'Comment 4',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-5'   => array(
				'label'    => 'Comment 5',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-6'   => array(
				'label'    => 'Comment 6',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-comments-7'   => array(
				'label'    => 'Comment 7',
				'category' => array( 'bs-cat-1' )
			),
			'bsfi-calender'     => array(
				'label'    => 'Calender',
				'category' => array( 'bs-cat-1' )
			),
		);

		// Count each category icons
		$this->countCategoriesIcons();

	}


	/**
	 * Counts icons in each category
	 */
	function countCategoriesIcons() {

		foreach ( (array) $this->icons as $icon ) {

			if ( isset( $icon['category'] ) && count( $icon['category'] ) ) {

				foreach ( $icon['category'] as $key => $category ) {

					if ( ! isset( $this->categories[ $category ] ) ) {
						continue;
					}

					if ( isset( $this->categories[ $category ]['counts'] ) ) {
						$this->categories[ $category ]['counts'] = intval( $this->categories[ $category ]['counts'] ) + 1;
					} else {
						$this->categories[ $category ]['counts'] = 1;
					}
				}
			}
		}

	}


	/**
	 * Generate tag icon
	 *
	 * @param $icon_key
	 * @param $classes
	 *
	 * @return string
	 */
	function getIconTag( $icon_key, $classes = '' ) {

		$classes = apply_filters( 'better_bs_icons_classes', $classes );

		if ( ! isset( $this->icons[ $icon_key ] ) ) {
			return '';
		}

		return '<i class="bf-icon ' . $icon_key . ' ' . $classes . '"></i>';

	}
}
