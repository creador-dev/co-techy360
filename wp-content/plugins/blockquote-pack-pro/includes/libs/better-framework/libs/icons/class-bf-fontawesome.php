<?php


/**
 * Used for handling all actions about Fontawesome in PHP
 */
class BF_Fontawesome {

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
	 * Version on current Awesomefont
	 *
	 * @var string
	 */
	public $version = '4.7.0';


	function __construct() {

		// Categories


		$this->categories = array(
			1  => array(
				'id'    => 1,
				'label' => '41 New Icons In 4.7'
			),
			2  => array(
				'id'    => 2,
				'label' => 'Web Application Icons'
			),
			3  => array(
				'id'    => 3,
				'label' => 'Accessibility Icons'
			),
			4  => array(
				'id'    => 4,
				'label' => 'Hand Icons'
			),
			5  => array(
				'id'    => 5,
				'label' => 'Transportation Icons'
			),
			6  => array(
				'id'    => 6,
				'label' => 'Gender Icons'
			),
			7  => array(
				'id'    => 7,
				'label' => 'File Type Icons'
			),
			8  => array(
				'id'    => 8,
				'label' => 'Spinner Icons'
			),
			9  => array(
				'id'    => 9,
				'label' => 'Form Control Icons'
			),
			10 => array(
				'id'    => 10,
				'label' => 'Payment Icons'
			),
			11 => array(
				'id'    => 11,
				'label' => 'Chart Icons'
			),
			12 => array(
				'id'    => 12,
				'label' => 'Currency Icons'
			),
			13 => array(
				'id'    => 13,
				'label' => 'Text Editor Icons'
			),
			14 => array(
				'id'    => 14,
				'label' => 'Directional Icons'
			),
			15 => array(
				'id'    => 15,
				'label' => 'Video Player Icons'
			),
			16 => array(
				'id'    => 16,
				'label' => 'Brand Icons'
			),
			17 => array(
				'id'    => 17,
				'label' => 'Medical Icons'
			),
		);

		// Cat 1


		$this->icons = array(
			'fa-address-book'                        => array(
				'label'     => 'Address Book',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2b9',
			),
			'fa-address-book-o'                      => array(
				'label'     => 'Address Book <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2ba',
			),
			'fa-address-card'                        => array(
				'label'     => 'Address Card',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2bb',
			),
			'fa-address-card-o'                      => array(
				'label'     => 'Address Card <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2bc',
			),
			'fa-bandcamp'                            => array(
				'label'     => 'Bandcamp',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2d5',
			),
			'fa-bath'                                => array(
				'label'     => 'Bath',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2cd',
			),
			'fa-bathtub'                             => array(
				'label'     => 'Bathtub',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2cd',
			),
			'fa-drivers-license'                     => array(
				'label'     => 'Drivers License',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c2',
			),
			'fa-drivers-license-o'                   => array(
				'label'     => 'Drivers License <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c3',
			),
			'fa-eercast'                             => array(
				'label'     => 'Eercast',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2da',
			),
			'fa-envelope-open'                       => array(
				'label'     => 'Envelope Open',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2b6',
			),
			'fa-envelope-open-o'                     => array(
				'label'     => 'Envelope Open <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2b7',
			),
			'fa-etsy'                                => array(
				'label'     => 'Etsy',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2d7',
			),
			'fa-free-code-camp'                      => array(
				'label'     => 'Free Code Camp',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2c5',
			),
			'fa-grav'                                => array(
				'label'     => 'Grav',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2d6',
			),
			'fa-handshake-o'                         => array(
				'label'     => 'Handshake <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2b5',
			),
			'fa-id-badge'                            => array(
				'label'     => 'Id Badge',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c1',
			),
			'fa-id-card'                             => array(
				'label'     => 'Id Card',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c2',
			),
			'fa-id-card-o'                           => array(
				'label'     => 'Id Card <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c3',
			),
			'fa-imdb'                                => array(
				'label'     => 'Imdb',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2d8',
			),
			'fa-linode'                              => array(
				'label'     => 'Linode',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2b8',
			),
			'fa-meetup'                              => array(
				'label'     => 'Meetup',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2e0',
			),
			'fa-microchip'                           => array(
				'label'     => 'Microchip',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2db',
			),
			'fa-podcast'                             => array(
				'label'     => 'Podcast',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2ce',
			),
			'fa-quora'                               => array(
				'label'     => 'Quora',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2c4',
			),
			'fa-ravelry'                             => array(
				'label'     => 'Ravelry',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2d9',
			),
			'fa-s15'                                 => array(
				'label'     => 'S15',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2cd',
			),
			'fa-shower'                              => array(
				'label'     => 'Shower',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2cc',
			),
			'fa-snowflake-o'                         => array(
				'label'     => 'Snowflake <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2dc',
			),
			'fa-superpowers'                         => array(
				'label'     => 'Superpowers',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2dd',
			),
			'fa-telegram'                            => array(
				'label'     => 'Telegram',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2c6',
			),
			'fa-thermometer'                         => array(
				'label'     => 'Thermometer',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c7',
			),
			'fa-thermometer-0'                       => array(
				'label'     => 'Thermometer 0',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2cb',
			),
			'fa-thermometer-1'                       => array(
				'label'     => 'Thermometer 1',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2ca',
			),
			'fa-thermometer-2'                       => array(
				'label'     => 'Thermometer 2',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c9',
			),
			'fa-thermometer-3'                       => array(
				'label'     => 'Thermometer 3',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c8',
			),
			'fa-thermometer-4'                       => array(
				'label'     => 'Thermometer 4',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c7',
			),
			'fa-thermometer-empty'                   => array(
				'label'     => 'Thermometer Empty',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2cb',
			),
			'fa-thermometer-full'                    => array(
				'label'     => 'Thermometer Full',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c7',
			),
			'fa-thermometer-half'                    => array(
				'label'     => 'Thermometer Half',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c9',
			),
			'fa-thermometer-quarter'                 => array(
				'label'     => 'Thermometer Quarter',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2ca',
			),
			'fa-thermometer-three-quarters'          => array(
				'label'     => 'Thermometer Three Quarters',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c8',
			),
			'fa-times-rectangle'                     => array(
				'label'     => 'Times Rectangle',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d3',
			),
			'fa-times-rectangle-o'                   => array(
				'label'     => 'Times Rectangle <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d4',
			),
			'fa-user-circle'                         => array(
				'label'     => 'User Circle',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2bd',
			),
			'fa-user-circle-o'                       => array(
				'label'     => 'User Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2be',
			),
			'fa-user-o'                              => array(
				'label'     => 'User <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2c0',
			),
			'fa-vcard'                               => array(
				'label'     => 'Vcard',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2bb',
			),
			'fa-vcard-o'                             => array(
				'label'     => 'Vcard <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2bc',
			),
			'fa-window-close'                        => array(
				'label'     => 'Window Close',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d3',
			),
			'fa-window-close-o'                      => array(
				'label'     => 'Window Close <span class="text-muted">(Outline)</span>',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d4',
			),
			'fa-window-maximize'                     => array(
				'label'     => 'Window Maximize',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d0',
			),
			'fa-window-minimize'                     => array(
				'label'     => 'Window Minimize',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d1',
			),
			'fa-window-restore'                      => array(
				'label'     => 'Window Restore',
				'category'  => array( 1, 2 ),
				'font_code' => '\f2d2',
			),
			'fa-wpexplorer'                          => array(
				'label'     => 'Wpexplorer',
				'category'  => array( 1, 16 ),
				'font_code' => '\f2de',
			),
			'fa-adjust'                              => array(
				'label'     => 'Adjust',
				'category'  => array( 2 ),
				'font_code' => '\f042',
			),
			'fa-american-sign-language-interpreting' => array(
				'label'     => 'American Sign Language Interpreting',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a3',
			),
			'fa-anchor'                              => array(
				'label'     => 'Anchor',
				'category'  => array( 2 ),
				'font_code' => '\f13d',
			),
			'fa-archive'                             => array(
				'label'     => 'Archive',
				'category'  => array( 2 ),
				'font_code' => '\f187',
			),
			'fa-area-chart'                          => array(
				'label'     => 'Area Chart',
				'category'  => array( 2, 11 ),
				'font_code' => '\f1fe',
			),
			'fa-arrows'                              => array(
				'label'     => 'Arrows',
				'category'  => array( 2, 14 ),
				'font_code' => '\f047',
			),
			'fa-arrows-h'                            => array(
				'label'     => 'Arrows H',
				'category'  => array( 2, 14 ),
				'font_code' => '\f07e',
			),
			'fa-arrows-v'                            => array(
				'label'     => 'Arrows V',
				'category'  => array( 2, 14 ),
				'font_code' => '\f07d',
			),
			'fa-asl-interpreting'                    => array(
				'label'     => 'Asl Interpreting',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a3',
			),
			'fa-assistive-listening-systems'         => array(
				'label'     => 'Assistive Listening Systems',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a2',
			),
			'fa-asterisk'                            => array(
				'label'     => 'Asterisk',
				'category'  => array( 2 ),
				'font_code' => '\f069',
			),
			'fa-at'                                  => array(
				'label'     => 'At',
				'category'  => array( 2 ),
				'font_code' => '\f1fa',
			),
			'fa-audio-description'                   => array(
				'label'     => 'Audio Description',
				'category'  => array( 2, 3 ),
				'font_code' => '\f29e',
			),
			'fa-automobile'                          => array(
				'label'     => 'Automobile',
				'category'  => array( 2, 5 ),
				'font_code' => '\f1b9',
			),
			'fa-balance-scale'                       => array(
				'label'     => 'Balance Scale',
				'category'  => array( 2 ),
				'font_code' => '\f24e',
			),
			'fa-ban'                                 => array(
				'label'     => 'Ban',
				'category'  => array( 2 ),
				'font_code' => '\f05e',
			),
			'fa-bank'                                => array(
				'label'     => 'Bank',
				'category'  => array( 2 ),
				'font_code' => '\f19c',
			),
			'fa-bar-chart'                           => array(
				'label'     => 'Bar Chart',
				'category'  => array( 2, 11 ),
				'font_code' => '\f080',
			),
			'fa-bar-chart-o'                         => array(
				'label'     => 'Bar Chart <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 11 ),
				'font_code' => '\f080',
			),
			'fa-barcode'                             => array(
				'label'     => 'Barcode',
				'category'  => array( 2 ),
				'font_code' => '\f02a',
			),
			'fa-bars'                                => array(
				'label'     => 'Bars',
				'category'  => array( 2 ),
				'font_code' => '\f0c9',
			),
			'fa-battery'                             => array(
				'label'     => 'Battery',
				'category'  => array( 2 ),
				'font_code' => '\f240',
			),
			'fa-battery-0'                           => array(
				'label'     => 'Battery 0',
				'category'  => array( 2 ),
				'font_code' => '\f244',
			),
			'fa-battery-1'                           => array(
				'label'     => 'Battery 1',
				'category'  => array( 2 ),
				'font_code' => '\f243',
			),
			'fa-battery-2'                           => array(
				'label'     => 'Battery 2',
				'category'  => array( 2 ),
				'font_code' => '\f242',
			),
			'fa-battery-3'                           => array(
				'label'     => 'Battery 3',
				'category'  => array( 2 ),
				'font_code' => '\f241',
			),
			'fa-battery-4'                           => array(
				'label'     => 'Battery 4',
				'category'  => array( 2 ),
				'font_code' => '\f240',
			),
			'fa-battery-empty'                       => array(
				'label'     => 'Battery Empty',
				'category'  => array( 2 ),
				'font_code' => '\f244',
			),
			'fa-battery-full'                        => array(
				'label'     => 'Battery Full',
				'category'  => array( 2 ),
				'font_code' => '\f240',
			),
			'fa-battery-half'                        => array(
				'label'     => 'Battery Half',
				'category'  => array( 2 ),
				'font_code' => '\f242',
			),
			'fa-battery-quarter'                     => array(
				'label'     => 'Battery Quarter',
				'category'  => array( 2 ),
				'font_code' => '\f243',
			),
			'fa-battery-three-quarters'              => array(
				'label'     => 'Battery Three Quarters',
				'category'  => array( 2 ),
				'font_code' => '\f241',
			),
			'fa-bed'                                 => array(
				'label'     => 'Bed',
				'category'  => array( 2 ),
				'font_code' => '\f236',
			),
			'fa-beer'                                => array(
				'label'     => 'Beer',
				'category'  => array( 2 ),
				'font_code' => '\f0fc',
			),
			'fa-bell'                                => array(
				'label'     => 'Bell',
				'category'  => array( 2 ),
				'font_code' => '\f0f3',
			),
			'fa-bell-o'                              => array(
				'label'     => 'Bell <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f0a2',
			),
			'fa-bell-slash'                          => array(
				'label'     => 'Bell Slash',
				'category'  => array( 2 ),
				'font_code' => '\f1f6',
			),
			'fa-bell-slash-o'                        => array(
				'label'     => 'Bell Slash <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f1f7',
			),
			'fa-bicycle'                             => array(
				'label'     => 'Bicycle',
				'category'  => array( 2, 5 ),
				'font_code' => '\f206',
			),
			'fa-binoculars'                          => array(
				'label'     => 'Binoculars',
				'category'  => array( 2 ),
				'font_code' => '\f1e5',
			),
			'fa-birthday-cake'                       => array(
				'label'     => 'Birthday Cake',
				'category'  => array( 2 ),
				'font_code' => '\f1fd',
			),
			'fa-blind'                               => array(
				'label'     => 'Blind',
				'category'  => array( 2, 3 ),
				'font_code' => '\f29d',
			),
			'fa-bluetooth'                           => array(
				'label'     => 'Bluetooth',
				'category'  => array( 2, 16 ),
				'font_code' => '\f293',
			),
			'fa-bluetooth-b'                         => array(
				'label'     => 'Bluetooth B',
				'category'  => array( 2, 16 ),
				'font_code' => '\f294',
			),
			'fa-bolt'                                => array(
				'label'     => 'Bolt',
				'category'  => array( 2 ),
				'font_code' => '\f0e7',
			),
			'fa-bomb'                                => array(
				'label'     => 'Bomb',
				'category'  => array( 2 ),
				'font_code' => '\f1e2',
			),
			'fa-book'                                => array(
				'label'     => 'Book',
				'category'  => array( 2 ),
				'font_code' => '\f02d',
			),
			'fa-bookmark'                            => array(
				'label'     => 'Bookmark',
				'category'  => array( 2 ),
				'font_code' => '\f02e',
			),
			'fa-bookmark-o'                          => array(
				'label'     => 'Bookmark <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f097',
			),
			'fa-braille'                             => array(
				'label'     => 'Braille',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a1',
			),
			'fa-briefcase'                           => array(
				'label'     => 'Briefcase',
				'category'  => array( 2 ),
				'font_code' => '\f0b1',
			),
			'fa-bug'                                 => array(
				'label'     => 'Bug',
				'category'  => array( 2 ),
				'font_code' => '\f188',
			),
			'fa-building'                            => array(
				'label'     => 'Building',
				'category'  => array( 2 ),
				'font_code' => '\f1ad',
			),
			'fa-building-o'                          => array(
				'label'     => 'Building <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f0f7',
			),
			'fa-bullhorn'                            => array(
				'label'     => 'Bullhorn',
				'category'  => array( 2 ),
				'font_code' => '\f0a1',
			),
			'fa-bullseye'                            => array(
				'label'     => 'Bullseye',
				'category'  => array( 2 ),
				'font_code' => '\f140',
			),
			'fa-bus'                                 => array(
				'label'     => 'Bus',
				'category'  => array( 2, 5 ),
				'font_code' => '\f207',
			),
			'fa-cab'                                 => array(
				'label'     => 'Cab',
				'category'  => array( 2, 5 ),
				'font_code' => '\f1ba',
			),
			'fa-calculator'                          => array(
				'label'     => 'Calculator',
				'category'  => array( 2 ),
				'font_code' => '\f1ec',
			),
			'fa-calendar'                            => array(
				'label'     => 'Calendar',
				'category'  => array( 2 ),
				'font_code' => '\f073',
			),
			'fa-calendar-check-o'                    => array(
				'label'     => 'Calendar Check <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f274',
			),
			'fa-calendar-minus-o'                    => array(
				'label'     => 'Calendar Minus <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f272',
			),
			'fa-calendar-o'                          => array(
				'label'     => 'Calendar <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f133',
			),
			'fa-calendar-plus-o'                     => array(
				'label'     => 'Calendar Plus <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f271',
			),
			'fa-calendar-times-o'                    => array(
				'label'     => 'Calendar Times <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f273',
			),
			'fa-camera'                              => array(
				'label'     => 'Camera',
				'category'  => array( 2 ),
				'font_code' => '\f030',
			),
			'fa-camera-retro'                        => array(
				'label'     => 'Camera Retro',
				'category'  => array( 2 ),
				'font_code' => '\f083',
			),
			'fa-car'                                 => array(
				'label'     => 'Car',
				'category'  => array( 2, 5 ),
				'font_code' => '\f1b9',
			),
			'fa-caret-square-o-down'                 => array(
				'label'     => 'Caret Square Down <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 14 ),
				'font_code' => '\f150',
			),
			'fa-caret-square-o-left'                 => array(
				'label'     => 'Caret Square Left <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 14 ),
				'font_code' => '\f191',
			),
			'fa-caret-square-o-right'                => array(
				'label'     => 'Caret Square Right <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 14 ),
				'font_code' => '\f152',
			),
			'fa-caret-square-o-up'                   => array(
				'label'     => 'Caret Square Up <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 14 ),
				'font_code' => '\f151',
			),
			'fa-cart-arrow-down'                     => array(
				'label'     => 'Cart Arrow Down',
				'category'  => array( 2 ),
				'font_code' => '\f218',
			),
			'fa-cart-plus'                           => array(
				'label'     => 'Cart Plus',
				'category'  => array( 2 ),
				'font_code' => '\f217',
			),
			'fa-cc'                                  => array(
				'label'     => 'Cc',
				'category'  => array( 2, 3 ),
				'font_code' => '\f20a',
			),
			'fa-certificate'                         => array(
				'label'     => 'Certificate',
				'category'  => array( 2 ),
				'font_code' => '\f0a3',
			),
			'fa-check'                               => array(
				'label'     => 'Check',
				'category'  => array( 2 ),
				'font_code' => '\f00c',
			),
			'fa-check-circle'                        => array(
				'label'     => 'Check Circle',
				'category'  => array( 2 ),
				'font_code' => '\f058',
			),
			'fa-check-circle-o'                      => array(
				'label'     => 'Check Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f05d',
			),
			'fa-check-square'                        => array(
				'label'     => 'Check Square',
				'category'  => array( 2, 9 ),
				'font_code' => '\f14a',
			),
			'fa-check-square-o'                      => array(
				'label'     => 'Check Square <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 9 ),
				'font_code' => '\f046',
			),
			'fa-child'                               => array(
				'label'     => 'Child',
				'category'  => array( 2 ),
				'font_code' => '\f1ae',
			),
			'fa-circle'                              => array(
				'label'     => 'Circle',
				'category'  => array( 2, 9 ),
				'font_code' => '\f111',
			),
			'fa-circle-o'                            => array(
				'label'     => 'Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 9 ),
				'font_code' => '\f10c',
			),
			'fa-circle-o-notch'                      => array(
				'label'     => 'Circle Notch <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 8 ),
				'font_code' => '\f1ce',
			),
			'fa-circle-thin'                         => array(
				'label'     => 'Circle Thin',
				'category'  => array( 2 ),
				'font_code' => '\f1db',
			),
			'fa-clock-o'                             => array(
				'label'     => 'Clock <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f017',
			),
			'fa-clone'                               => array(
				'label'     => 'Clone',
				'category'  => array( 2 ),
				'font_code' => '\f24d',
			),
			'fa-close'                               => array(
				'label'     => 'Close',
				'category'  => array( 2 ),
				'font_code' => '\f00d',
			),
			'fa-cloud'                               => array(
				'label'     => 'Cloud',
				'category'  => array( 2 ),
				'font_code' => '\f0c2',
			),
			'fa-cloud-download'                      => array(
				'label'     => 'Cloud Download',
				'category'  => array( 2 ),
				'font_code' => '\f0ed',
			),
			'fa-cloud-upload'                        => array(
				'label'     => 'Cloud Upload',
				'category'  => array( 2 ),
				'font_code' => '\f0ee',
			),
			'fa-code'                                => array(
				'label'     => 'Code',
				'category'  => array( 2 ),
				'font_code' => '\f121',
			),
			'fa-code-fork'                           => array(
				'label'     => 'Code Fork',
				'category'  => array( 2 ),
				'font_code' => '\f126',
			),
			'fa-coffee'                              => array(
				'label'     => 'Coffee',
				'category'  => array( 2 ),
				'font_code' => '\f0f4',
			),
			'fa-cog'                                 => array(
				'label'     => 'Cog',
				'category'  => array( 2, 8 ),
				'font_code' => '\f013',
			),
			'fa-cogs'                                => array(
				'label'     => 'Cogs',
				'category'  => array( 2 ),
				'font_code' => '\f085',
			),
			'fa-comment'                             => array(
				'label'     => 'Comment',
				'category'  => array( 2 ),
				'font_code' => '\f075',
			),
			'fa-comment-o'                           => array(
				'label'     => 'Comment <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f0e5',
			),
			'fa-commenting'                          => array(
				'label'     => 'Commenting',
				'category'  => array( 2 ),
				'font_code' => '\f27a',
			),
			'fa-commenting-o'                        => array(
				'label'     => 'Commenting <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f27b',
			),
			'fa-comments'                            => array(
				'label'     => 'Comments',
				'category'  => array( 2 ),
				'font_code' => '\f086',
			),
			'fa-comments-o'                          => array(
				'label'     => 'Comments <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f0e6',
			),
			'fa-compass'                             => array(
				'label'     => 'Compass',
				'category'  => array( 2 ),
				'font_code' => '\f14e',
			),
			'fa-copyright'                           => array(
				'label'     => 'Copyright',
				'category'  => array( 2 ),
				'font_code' => '\f1f9',
			),
			'fa-creative-commons'                    => array(
				'label'     => 'Creative Commons',
				'category'  => array( 2 ),
				'font_code' => '\f25e',
			),
			'fa-credit-card'                         => array(
				'label'     => 'Credit Card',
				'category'  => array( 2, 10 ),
				'font_code' => '\f09d',
			),
			'fa-credit-card-alt'                     => array(
				'label'     => 'Credit Card Alt',
				'category'  => array( 2, 10 ),
				'font_code' => '\f283',
			),
			'fa-crop'                                => array(
				'label'     => 'Crop',
				'category'  => array( 2 ),
				'font_code' => '\f125',
			),
			'fa-crosshairs'                          => array(
				'label'     => 'Crosshairs',
				'category'  => array( 2 ),
				'font_code' => '\f05b',
			),
			'fa-cube'                                => array(
				'label'     => 'Cube',
				'category'  => array( 2 ),
				'font_code' => '\f1b2',
			),
			'fa-cubes'                               => array(
				'label'     => 'Cubes',
				'category'  => array( 2 ),
				'font_code' => '\f1b3',
			),
			'fa-cutlery'                             => array(
				'label'     => 'Cutlery',
				'category'  => array( 2 ),
				'font_code' => '\f0f5',
			),
			'fa-dashboard'                           => array(
				'label'     => 'Dashboard',
				'category'  => array( 2 ),
				'font_code' => '\f0e4',
			),
			'fa-database'                            => array(
				'label'     => 'Database',
				'category'  => array( 2 ),
				'font_code' => '\f1c0',
			),
			'fa-deaf'                                => array(
				'label'     => 'Deaf',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a4',
			),
			'fa-deafness'                            => array(
				'label'     => 'Deafness',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a4',
			),
			'fa-desktop'                             => array(
				'label'     => 'Desktop',
				'category'  => array( 2 ),
				'font_code' => '\f108',
			),
			'fa-diamond'                             => array(
				'label'     => 'Diamond',
				'category'  => array( 2 ),
				'font_code' => '\f219',
			),
			'fa-dot-circle-o'                        => array(
				'label'     => 'Dot Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 9 ),
				'font_code' => '\f192',
			),
			'fa-download'                            => array(
				'label'     => 'Download',
				'category'  => array( 2 ),
				'font_code' => '\f019',
			),
			'fa-edit'                                => array(
				'label'     => 'Edit',
				'category'  => array( 2 ),
				'font_code' => '\f044',
			),
			'fa-ellipsis-h'                          => array(
				'label'     => 'Ellipsis H',
				'category'  => array( 2 ),
				'font_code' => '\f141',
			),
			'fa-ellipsis-v'                          => array(
				'label'     => 'Ellipsis V',
				'category'  => array( 2 ),
				'font_code' => '\f142',
			),
			'fa-envelope'                            => array(
				'label'     => 'Envelope',
				'category'  => array( 2 ),
				'font_code' => '\f0e0',
			),
			'fa-envelope-o'                          => array(
				'label'     => 'Envelope <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f003',
			),
			'fa-envelope-square'                     => array(
				'label'     => 'Envelope Square',
				'category'  => array( 2 ),
				'font_code' => '\f199',
			),
			'fa-eraser'                              => array(
				'label'     => 'Eraser',
				'category'  => array( 2, 13 ),
				'font_code' => '\f12d',
			),
			'fa-exchange'                            => array(
				'label'     => 'Exchange',
				'category'  => array( 2, 14 ),
				'font_code' => '\f0ec',
			),
			'fa-exclamation'                         => array(
				'label'     => 'Exclamation',
				'category'  => array( 2 ),
				'font_code' => '\f12a',
			),
			'fa-exclamation-circle'                  => array(
				'label'     => 'Exclamation Circle',
				'category'  => array( 2 ),
				'font_code' => '\f06a',
			),
			'fa-exclamation-triangle'                => array(
				'label'     => 'Exclamation Triangle',
				'category'  => array( 2 ),
				'font_code' => '\f071',
			),
			'fa-external-link'                       => array(
				'label'     => 'External Link',
				'category'  => array( 2 ),
				'font_code' => '\f08e',
			),
			'fa-external-link-square'                => array(
				'label'     => 'External Link Square',
				'category'  => array( 2 ),
				'font_code' => '\f14c',
			),
			'fa-eye'                                 => array(
				'label'     => 'Eye',
				'category'  => array( 2 ),
				'font_code' => '\f06e',
			),
			'fa-eye-slash'                           => array(
				'label'     => 'Eye Slash',
				'category'  => array( 2 ),
				'font_code' => '\f070',
			),
			'fa-eyedropper'                          => array(
				'label'     => 'Eyedropper',
				'category'  => array( 2 ),
				'font_code' => '\f1fb',
			),
			'fa-fax'                                 => array(
				'label'     => 'Fax',
				'category'  => array( 2 ),
				'font_code' => '\f1ac',
			),
			'fa-feed'                                => array(
				'label'     => 'Feed',
				'category'  => array( 2 ),
				'font_code' => '\f09e',
			),
			'fa-female'                              => array(
				'label'     => 'Female',
				'category'  => array( 2 ),
				'font_code' => '\f182',
			),
			'fa-fighter-jet'                         => array(
				'label'     => 'Fighter Jet',
				'category'  => array( 2, 5 ),
				'font_code' => '\f0fb',
			),
			'fa-file-archive-o'                      => array(
				'label'     => 'File Archive <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c6',
			),
			'fa-file-audio-o'                        => array(
				'label'     => 'File Audio <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c7',
			),
			'fa-file-code-o'                         => array(
				'label'     => 'File Code <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c9',
			),
			'fa-file-excel-o'                        => array(
				'label'     => 'File Excel <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c3',
			),
			'fa-file-image-o'                        => array(
				'label'     => 'File Image <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c5',
			),
			'fa-file-movie-o'                        => array(
				'label'     => 'File Movie <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c8',
			),
			'fa-file-pdf-o'                          => array(
				'label'     => 'File Pdf <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c1',
			),
			'fa-file-photo-o'                        => array(
				'label'     => 'File Photo <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c5',
			),
			'fa-file-picture-o'                      => array(
				'label'     => 'File Picture <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c5',
			),
			'fa-file-powerpoint-o'                   => array(
				'label'     => 'File Powerpoint <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c4',
			),
			'fa-file-sound-o'                        => array(
				'label'     => 'File Sound <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c7',
			),
			'fa-file-video-o'                        => array(
				'label'     => 'File Video <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c8',
			),
			'fa-file-word-o'                         => array(
				'label'     => 'File Word <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c2',
			),
			'fa-file-zip-o'                          => array(
				'label'     => 'File Zip <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 7 ),
				'font_code' => '\f1c6',
			),
			'fa-film'                                => array(
				'label'     => 'Film',
				'category'  => array( 2 ),
				'font_code' => '\f008',
			),
			'fa-filter'                              => array(
				'label'     => 'Filter',
				'category'  => array( 2 ),
				'font_code' => '\f0b0',
			),
			'fa-fire'                                => array(
				'label'     => 'Fire',
				'category'  => array( 2 ),
				'font_code' => '\f06d',
			),
			'fa-fire-extinguisher'                   => array(
				'label'     => 'Fire Extinguisher',
				'category'  => array( 2 ),
				'font_code' => '\f134',
			),
			'fa-flag'                                => array(
				'label'     => 'Flag',
				'category'  => array( 2 ),
				'font_code' => '\f024',
			),
			'fa-flag-checkered'                      => array(
				'label'     => 'Flag Checkered',
				'category'  => array( 2 ),
				'font_code' => '\f11e',
			),
			'fa-flag-o'                              => array(
				'label'     => 'Flag <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f11d',
			),
			'fa-flash'                               => array(
				'label'     => 'Flash',
				'category'  => array( 2 ),
				'font_code' => '\f0e7',
			),
			'fa-flask'                               => array(
				'label'     => 'Flask',
				'category'  => array( 2 ),
				'font_code' => '\f0c3',
			),
			'fa-folder'                              => array(
				'label'     => 'Folder',
				'category'  => array( 2 ),
				'font_code' => '\f07b',
			),
			'fa-folder-o'                            => array(
				'label'     => 'Folder <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f114',
			),
			'fa-folder-open'                         => array(
				'label'     => 'Folder Open',
				'category'  => array( 2 ),
				'font_code' => '\f07c',
			),
			'fa-folder-open-o'                       => array(
				'label'     => 'Folder Open <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f115',
			),
			'fa-frown-o'                             => array(
				'label'     => 'Frown <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f119',
			),
			'fa-futbol-o'                            => array(
				'label'     => 'Futbol <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f1e3',
			),
			'fa-gamepad'                             => array(
				'label'     => 'Gamepad',
				'category'  => array( 2 ),
				'font_code' => '\f11b',
			),
			'fa-gavel'                               => array(
				'label'     => 'Gavel',
				'category'  => array( 2 ),
				'font_code' => '\f0e3',
			),
			'fa-gear'                                => array(
				'label'     => 'Gear',
				'category'  => array( 2, 8 ),
				'font_code' => '\f013',
			),
			'fa-gears'                               => array(
				'label'     => 'Gears',
				'category'  => array( 2 ),
				'font_code' => '\f085',
			),
			'fa-gift'                                => array(
				'label'     => 'Gift',
				'category'  => array( 2 ),
				'font_code' => '\f06b',
			),
			'fa-glass'                               => array(
				'label'     => 'Glass',
				'category'  => array( 2 ),
				'font_code' => '\f000',
			),
			'fa-globe'                               => array(
				'label'     => 'Globe',
				'category'  => array( 2 ),
				'font_code' => '\f0ac',
			),
			'fa-graduation-cap'                      => array(
				'label'     => 'Graduation Cap',
				'category'  => array( 2 ),
				'font_code' => '\f19d',
			),
			'fa-group'                               => array(
				'label'     => 'Group',
				'category'  => array( 2 ),
				'font_code' => '\f0c0',
			),
			'fa-hand-grab-o'                         => array(
				'label'     => 'Hand Grab <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f255',
			),
			'fa-hand-lizard-o'                       => array(
				'label'     => 'Hand Lizard <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f258',
			),
			'fa-hand-paper-o'                        => array(
				'label'     => 'Hand Paper <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f256',
			),
			'fa-hand-peace-o'                        => array(
				'label'     => 'Hand Peace <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f25b',
			),
			'fa-hand-pointer-o'                      => array(
				'label'     => 'Hand Pointer <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f25a',
			),
			'fa-hand-rock-o'                         => array(
				'label'     => 'Hand Rock <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f255',
			),
			'fa-hand-scissors-o'                     => array(
				'label'     => 'Hand Scissors <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f257',
			),
			'fa-hand-spock-o'                        => array(
				'label'     => 'Hand Spock <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f259',
			),
			'fa-hand-stop-o'                         => array(
				'label'     => 'Hand Stop <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f256',
			),
			'fa-hard-of-hearing'                     => array(
				'label'     => 'Hard Of Hearing',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a4',
			),
			'fa-hashtag'                             => array(
				'label'     => 'Hashtag',
				'category'  => array( 2 ),
				'font_code' => '\f292',
			),
			'fa-hdd-o'                               => array(
				'label'     => 'Hdd <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f0a0',
			),
			'fa-headphones'                          => array(
				'label'     => 'Headphones',
				'category'  => array( 2 ),
				'font_code' => '\f025',
			),
			'fa-heart'                               => array(
				'label'     => 'Heart',
				'category'  => array( 2, 17 ),
				'font_code' => '\f004',
			),
			'fa-heart-o'                             => array(
				'label'     => 'Heart <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 17 ),
				'font_code' => '\f08a',
			),
			'fa-heartbeat'                           => array(
				'label'     => 'Heartbeat',
				'category'  => array( 2, 17 ),
				'font_code' => '\f21e',
			),
			'fa-history'                             => array(
				'label'     => 'History',
				'category'  => array( 2 ),
				'font_code' => '\f1da',
			),
			'fa-home'                                => array(
				'label'     => 'Home',
				'category'  => array( 2 ),
				'font_code' => '\f015',
			),
			'fa-hotel'                               => array(
				'label'     => 'Hotel',
				'category'  => array( 2 ),
				'font_code' => '\f236',
			),
			'fa-hourglass'                           => array(
				'label'     => 'Hourglass',
				'category'  => array( 2 ),
				'font_code' => '\f254',
			),
			'fa-hourglass-1'                         => array(
				'label'     => 'Hourglass 1',
				'category'  => array( 2 ),
				'font_code' => '\f251',
			),
			'fa-hourglass-2'                         => array(
				'label'     => 'Hourglass 2',
				'category'  => array( 2 ),
				'font_code' => '\f252',
			),
			'fa-hourglass-3'                         => array(
				'label'     => 'Hourglass 3',
				'category'  => array( 2 ),
				'font_code' => '\f253',
			),
			'fa-hourglass-end'                       => array(
				'label'     => 'Hourglass End',
				'category'  => array( 2 ),
				'font_code' => '\f253',
			),
			'fa-hourglass-half'                      => array(
				'label'     => 'Hourglass Half',
				'category'  => array( 2 ),
				'font_code' => '\f252',
			),
			'fa-hourglass-o'                         => array(
				'label'     => 'Hourglass <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f250',
			),
			'fa-hourglass-start'                     => array(
				'label'     => 'Hourglass Start',
				'category'  => array( 2 ),
				'font_code' => '\f251',
			),
			'fa-i-cursor'                            => array(
				'label'     => 'I Cursor',
				'category'  => array( 2 ),
				'font_code' => '\f246',
			),
			'fa-image'                               => array(
				'label'     => 'Image',
				'category'  => array( 2 ),
				'font_code' => '\f03e',
			),
			'fa-inbox'                               => array(
				'label'     => 'Inbox',
				'category'  => array( 2 ),
				'font_code' => '\f01c',
			),
			'fa-industry'                            => array(
				'label'     => 'Industry',
				'category'  => array( 2 ),
				'font_code' => '\f275',
			),
			'fa-info'                                => array(
				'label'     => 'Info',
				'category'  => array( 2 ),
				'font_code' => '\f129',
			),
			'fa-info-circle'                         => array(
				'label'     => 'Info Circle',
				'category'  => array( 2 ),
				'font_code' => '\f05a',
			),
			'fa-institution'                         => array(
				'label'     => 'Institution',
				'category'  => array( 2 ),
				'font_code' => '\f19c',
			),
			'fa-key'                                 => array(
				'label'     => 'Key',
				'category'  => array( 2 ),
				'font_code' => '\f084',
			),
			'fa-keyboard-o'                          => array(
				'label'     => 'Keyboard <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f11c',
			),
			'fa-language'                            => array(
				'label'     => 'Language',
				'category'  => array( 2 ),
				'font_code' => '\f1ab',
			),
			'fa-laptop'                              => array(
				'label'     => 'Laptop',
				'category'  => array( 2 ),
				'font_code' => '\f109',
			),
			'fa-leaf'                                => array(
				'label'     => 'Leaf',
				'category'  => array( 2 ),
				'font_code' => '\f06c',
			),
			'fa-legal'                               => array(
				'label'     => 'Legal',
				'category'  => array( 2 ),
				'font_code' => '\f0e3',
			),
			'fa-lemon-o'                             => array(
				'label'     => 'Lemon <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f094',
			),
			'fa-level-down'                          => array(
				'label'     => 'Level Down',
				'category'  => array( 2 ),
				'font_code' => '\f149',
			),
			'fa-level-up'                            => array(
				'label'     => 'Level Up',
				'category'  => array( 2 ),
				'font_code' => '\f148',
			),
			'fa-life-bouy'                           => array(
				'label'     => 'Life Bouy',
				'category'  => array( 2 ),
				'font_code' => '\f1cd',
			),
			'fa-life-buoy'                           => array(
				'label'     => 'Life Buoy',
				'category'  => array( 2 ),
				'font_code' => '\f1cd',
			),
			'fa-life-ring'                           => array(
				'label'     => 'Life Ring',
				'category'  => array( 2 ),
				'font_code' => '\f1cd',
			),
			'fa-life-saver'                          => array(
				'label'     => 'Life Saver',
				'category'  => array( 2 ),
				'font_code' => '\f1cd',
			),
			'fa-lightbulb-o'                         => array(
				'label'     => 'Lightbulb <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f0eb',
			),
			'fa-line-chart'                          => array(
				'label'     => 'Line Chart',
				'category'  => array( 2, 11 ),
				'font_code' => '\f201',
			),
			'fa-location-arrow'                      => array(
				'label'     => 'Location Arrow',
				'category'  => array( 2 ),
				'font_code' => '\f124',
			),
			'fa-lock'                                => array(
				'label'     => 'Lock',
				'category'  => array( 2 ),
				'font_code' => '\f023',
			),
			'fa-low-vision'                          => array(
				'label'     => 'Low Vision',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a8',
			),
			'fa-magic'                               => array(
				'label'     => 'Magic',
				'category'  => array( 2 ),
				'font_code' => '\f0d0',
			),
			'fa-magnet'                              => array(
				'label'     => 'Magnet',
				'category'  => array( 2 ),
				'font_code' => '\f076',
			),
			'fa-mail-forward'                        => array(
				'label'     => 'Mail Forward',
				'category'  => array( 2 ),
				'font_code' => '\f064',
			),
			'fa-mail-reply'                          => array(
				'label'     => 'Mail Reply',
				'category'  => array( 2 ),
				'font_code' => '\f112',
			),
			'fa-mail-reply-all'                      => array(
				'label'     => 'Mail Reply All',
				'category'  => array( 2 ),
				'font_code' => '\f122',
			),
			'fa-male'                                => array(
				'label'     => 'Male',
				'category'  => array( 2 ),
				'font_code' => '\f183',
			),
			'fa-map'                                 => array(
				'label'     => 'Map',
				'category'  => array( 2 ),
				'font_code' => '\f279',
			),
			'fa-map-marker'                          => array(
				'label'     => 'Map Marker',
				'category'  => array( 2 ),
				'font_code' => '\f041',
			),
			'fa-map-o'                               => array(
				'label'     => 'Map <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f278',
			),
			'fa-map-pin'                             => array(
				'label'     => 'Map Pin',
				'category'  => array( 2 ),
				'font_code' => '\f276',
			),
			'fa-map-signs'                           => array(
				'label'     => 'Map Signs',
				'category'  => array( 2 ),
				'font_code' => '\f277',
			),
			'fa-meh-o'                               => array(
				'label'     => 'Meh <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f11a',
			),
			'fa-microphone'                          => array(
				'label'     => 'Microphone',
				'category'  => array( 2 ),
				'font_code' => '\f130',
			),
			'fa-microphone-slash'                    => array(
				'label'     => 'Microphone Slash',
				'category'  => array( 2 ),
				'font_code' => '\f131',
			),
			'fa-minus'                               => array(
				'label'     => 'Minus',
				'category'  => array( 2 ),
				'font_code' => '\f068',
			),
			'fa-minus-circle'                        => array(
				'label'     => 'Minus Circle',
				'category'  => array( 2 ),
				'font_code' => '\f056',
			),
			'fa-minus-square'                        => array(
				'label'     => 'Minus Square',
				'category'  => array( 2, 9 ),
				'font_code' => '\f146',
			),
			'fa-minus-square-o'                      => array(
				'label'     => 'Minus Square <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 9 ),
				'font_code' => '\f147',
			),
			'fa-mobile'                              => array(
				'label'     => 'Mobile',
				'category'  => array( 2 ),
				'font_code' => '\f10b',
			),
			'fa-mobile-phone'                        => array(
				'label'     => 'Mobile Phone',
				'category'  => array( 2 ),
				'font_code' => '\f10b',
			),
			'fa-money'                               => array(
				'label'     => 'Money',
				'category'  => array( 2, 12 ),
				'font_code' => '\f0d6',
			),
			'fa-moon-o'                              => array(
				'label'     => 'Moon <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f186',
			),
			'fa-mortar-board'                        => array(
				'label'     => 'Mortar Board',
				'category'  => array( 2 ),
				'font_code' => '\f19d',
			),
			'fa-motorcycle'                          => array(
				'label'     => 'Motorcycle',
				'category'  => array( 2, 5 ),
				'font_code' => '\f21c',
			),
			'fa-mouse-pointer'                       => array(
				'label'     => 'Mouse Pointer',
				'category'  => array( 2 ),
				'font_code' => '\f245',
			),
			'fa-music'                               => array(
				'label'     => 'Music',
				'category'  => array( 2 ),
				'font_code' => '\f001',
			),
			'fa-navicon'                             => array(
				'label'     => 'Navicon',
				'category'  => array( 2 ),
				'font_code' => '\f0c9',
			),
			'fa-newspaper-o'                         => array(
				'label'     => 'Newspaper <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f1ea',
			),
			'fa-object-group'                        => array(
				'label'     => 'Object Group',
				'category'  => array( 2 ),
				'font_code' => '\f247',
			),
			'fa-object-ungroup'                      => array(
				'label'     => 'Object Ungroup',
				'category'  => array( 2 ),
				'font_code' => '\f248',
			),
			'fa-paint-brush'                         => array(
				'label'     => 'Paint Brush',
				'category'  => array( 2 ),
				'font_code' => '\f1fc',
			),
			'fa-paper-plane'                         => array(
				'label'     => 'Paper Plane',
				'category'  => array( 2 ),
				'font_code' => '\f1d8',
			),
			'fa-paper-plane-o'                       => array(
				'label'     => 'Paper Plane <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f1d9',
			),
			'fa-paw'                                 => array(
				'label'     => 'Paw',
				'category'  => array( 2 ),
				'font_code' => '\f1b0',
			),
			'fa-pencil'                              => array(
				'label'     => 'Pencil',
				'category'  => array( 2 ),
				'font_code' => '\f040',
			),
			'fa-pencil-square'                       => array(
				'label'     => 'Pencil Square',
				'category'  => array( 2 ),
				'font_code' => '\f14b',
			),
			'fa-pencil-square-o'                     => array(
				'label'     => 'Pencil Square <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f044',
			),
			'fa-percent'                             => array(
				'label'     => 'Percent',
				'category'  => array( 2 ),
				'font_code' => '\f295',
			),
			'fa-phone'                               => array(
				'label'     => 'Phone',
				'category'  => array( 2 ),
				'font_code' => '\f095',
			),
			'fa-phone-square'                        => array(
				'label'     => 'Phone Square',
				'category'  => array( 2 ),
				'font_code' => '\f098',
			),
			'fa-photo'                               => array(
				'label'     => 'Photo',
				'category'  => array( 2 ),
				'font_code' => '\f03e',
			),
			'fa-picture-o'                           => array(
				'label'     => 'Picture <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f03e',
			),
			'fa-pie-chart'                           => array(
				'label'     => 'Pie Chart',
				'category'  => array( 2, 11 ),
				'font_code' => '\f200',
			),
			'fa-plane'                               => array(
				'label'     => 'Plane',
				'category'  => array( 2, 5 ),
				'font_code' => '\f072',
			),
			'fa-plug'                                => array(
				'label'     => 'Plug',
				'category'  => array( 2 ),
				'font_code' => '\f1e6',
			),
			'fa-plus'                                => array(
				'label'     => 'Plus',
				'category'  => array( 2 ),
				'font_code' => '\f067',
			),
			'fa-plus-circle'                         => array(
				'label'     => 'Plus Circle',
				'category'  => array( 2 ),
				'font_code' => '\f055',
			),
			'fa-plus-square'                         => array(
				'label'     => 'Plus Square',
				'category'  => array( 2, 9, 17 ),
				'font_code' => '\f0fe',
			),
			'fa-plus-square-o'                       => array(
				'label'     => 'Plus Square <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 9 ),
				'font_code' => '\f196',
			),
			'fa-power-off'                           => array(
				'label'     => 'Power Off',
				'category'  => array( 2 ),
				'font_code' => '\f011',
			),
			'fa-print'                               => array(
				'label'     => 'Print',
				'category'  => array( 2 ),
				'font_code' => '\f02f',
			),
			'fa-puzzle-piece'                        => array(
				'label'     => 'Puzzle Piece',
				'category'  => array( 2 ),
				'font_code' => '\f12e',
			),
			'fa-qrcode'                              => array(
				'label'     => 'Qrcode',
				'category'  => array( 2 ),
				'font_code' => '\f029',
			),
			'fa-question'                            => array(
				'label'     => 'Question',
				'category'  => array( 2 ),
				'font_code' => '\f128',
			),
			'fa-question-circle'                     => array(
				'label'     => 'Question Circle',
				'category'  => array( 2 ),
				'font_code' => '\f059',
			),
			'fa-question-circle-o'                   => array(
				'label'     => 'Question Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 3 ),
				'font_code' => '\f29c',
			),
			'fa-quote-left'                          => array(
				'label'     => 'Quote Left',
				'category'  => array( 2 ),
				'font_code' => '\f10d',
			),
			'fa-quote-right'                         => array(
				'label'     => 'Quote Right',
				'category'  => array( 2 ),
				'font_code' => '\f10e',
			),
			'fa-random'                              => array(
				'label'     => 'Random',
				'category'  => array( 2, 15 ),
				'font_code' => '\f074',
			),
			'fa-recycle'                             => array(
				'label'     => 'Recycle',
				'category'  => array( 2 ),
				'font_code' => '\f1b8',
			),
			'fa-refresh'                             => array(
				'label'     => 'Refresh',
				'category'  => array( 2, 8 ),
				'font_code' => '\f021',
			),
			'fa-registered'                          => array(
				'label'     => 'Registered',
				'category'  => array( 2 ),
				'font_code' => '\f25d',
			),
			'fa-remove'                              => array(
				'label'     => 'Remove',
				'category'  => array( 2 ),
				'font_code' => '\f00d',
			),
			'fa-reorder'                             => array(
				'label'     => 'Reorder',
				'category'  => array( 2 ),
				'font_code' => '\f0c9',
			),
			'fa-reply'                               => array(
				'label'     => 'Reply',
				'category'  => array( 2 ),
				'font_code' => '\f112',
			),
			'fa-reply-all'                           => array(
				'label'     => 'Reply All',
				'category'  => array( 2 ),
				'font_code' => '\f122',
			),
			'fa-retweet'                             => array(
				'label'     => 'Retweet',
				'category'  => array( 2 ),
				'font_code' => '\f079',
			),
			'fa-road'                                => array(
				'label'     => 'Road',
				'category'  => array( 2 ),
				'font_code' => '\f018',
			),
			'fa-rocket'                              => array(
				'label'     => 'Rocket',
				'category'  => array( 2, 5 ),
				'font_code' => '\f135',
			),
			'fa-rss'                                 => array(
				'label'     => 'Rss',
				'category'  => array( 2 ),
				'font_code' => '\f09e',
			),
			'fa-rss-square'                          => array(
				'label'     => 'Rss Square',
				'category'  => array( 2 ),
				'font_code' => '\f143',
			),
			'fa-search'                              => array(
				'label'     => 'Search',
				'category'  => array( 2 ),
				'font_code' => '\f002',
			),
			'fa-search-minus'                        => array(
				'label'     => 'Search Minus',
				'category'  => array( 2 ),
				'font_code' => '\f010',
			),
			'fa-search-plus'                         => array(
				'label'     => 'Search Plus',
				'category'  => array( 2 ),
				'font_code' => '\f00e',
			),
			'fa-send'                                => array(
				'label'     => 'Send',
				'category'  => array( 2 ),
				'font_code' => '\f1d8',
			),
			'fa-send-o'                              => array(
				'label'     => 'Send <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f1d9',
			),
			'fa-server'                              => array(
				'label'     => 'Server',
				'category'  => array( 2 ),
				'font_code' => '\f233',
			),
			'fa-share'                               => array(
				'label'     => 'Share',
				'category'  => array( 2 ),
				'font_code' => '\f064',
			),
			'fa-share-alt'                           => array(
				'label'     => 'Share Alt',
				'category'  => array( 2, 16 ),
				'font_code' => '\f1e0',
			),
			'fa-share-alt-square'                    => array(
				'label'     => 'Share Alt Square',
				'category'  => array( 2, 16 ),
				'font_code' => '\f1e1',
			),
			'fa-share-square'                        => array(
				'label'     => 'Share Square',
				'category'  => array( 2 ),
				'font_code' => '\f14d',
			),
			'fa-share-square-o'                      => array(
				'label'     => 'Share Square <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f045',
			),
			'fa-shield'                              => array(
				'label'     => 'Shield',
				'category'  => array( 2 ),
				'font_code' => '\f132',
			),
			'fa-ship'                                => array(
				'label'     => 'Ship',
				'category'  => array( 2, 5 ),
				'font_code' => '\f21a',
			),
			'fa-shopping-bag'                        => array(
				'label'     => 'Shopping Bag',
				'category'  => array( 2 ),
				'font_code' => '\f290',
			),
			'fa-shopping-basket'                     => array(
				'label'     => 'Shopping Basket',
				'category'  => array( 2 ),
				'font_code' => '\f291',
			),
			'fa-shopping-cart'                       => array(
				'label'     => 'Shopping Cart',
				'category'  => array( 2 ),
				'font_code' => '\f07a',
			),
			'fa-sign-in'                             => array(
				'label'     => 'Sign In',
				'category'  => array( 2 ),
				'font_code' => '\f090',
			),
			'fa-sign-language'                       => array(
				'label'     => 'Sign Language',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a7',
			),
			'fa-sign-out'                            => array(
				'label'     => 'Sign Out',
				'category'  => array( 2 ),
				'font_code' => '\f08b',
			),
			'fa-signal'                              => array(
				'label'     => 'Signal',
				'category'  => array( 2 ),
				'font_code' => '\f012',
			),
			'fa-signing'                             => array(
				'label'     => 'Signing',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a7',
			),
			'fa-sitemap'                             => array(
				'label'     => 'Sitemap',
				'category'  => array( 2 ),
				'font_code' => '\f0e8',
			),
			'fa-sliders'                             => array(
				'label'     => 'Sliders',
				'category'  => array( 2 ),
				'font_code' => '\f1de',
			),
			'fa-smile-o'                             => array(
				'label'     => 'Smile <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f118',
			),
			'fa-soccer-ball-o'                       => array(
				'label'     => 'Soccer Ball <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f1e3',
			),
			'fa-sort'                                => array(
				'label'     => 'Sort',
				'category'  => array( 2 ),
				'font_code' => '\f0dc',
			),
			'fa-sort-alpha-asc'                      => array(
				'label'     => 'Sort Alpha Asc',
				'category'  => array( 2 ),
				'font_code' => '\f15d',
			),
			'fa-sort-alpha-desc'                     => array(
				'label'     => 'Sort Alpha Desc',
				'category'  => array( 2 ),
				'font_code' => '\f15e',
			),
			'fa-sort-amount-asc'                     => array(
				'label'     => 'Sort Amount Asc',
				'category'  => array( 2 ),
				'font_code' => '\f160',
			),
			'fa-sort-amount-desc'                    => array(
				'label'     => 'Sort Amount Desc',
				'category'  => array( 2 ),
				'font_code' => '\f161',
			),
			'fa-sort-asc'                            => array(
				'label'     => 'Sort Asc',
				'category'  => array( 2 ),
				'font_code' => '\f0de',
			),
			'fa-sort-desc'                           => array(
				'label'     => 'Sort Desc',
				'category'  => array( 2 ),
				'font_code' => '\f0dd',
			),
			'fa-sort-down'                           => array(
				'label'     => 'Sort Down',
				'category'  => array( 2 ),
				'font_code' => '\f0dd',
			),
			'fa-sort-numeric-asc'                    => array(
				'label'     => 'Sort Numeric Asc',
				'category'  => array( 2 ),
				'font_code' => '\f162',
			),
			'fa-sort-numeric-desc'                   => array(
				'label'     => 'Sort Numeric Desc',
				'category'  => array( 2 ),
				'font_code' => '\f163',
			),
			'fa-sort-up'                             => array(
				'label'     => 'Sort Up',
				'category'  => array( 2 ),
				'font_code' => '\f0de',
			),
			'fa-space-shuttle'                       => array(
				'label'     => 'Space Shuttle',
				'category'  => array( 2, 5 ),
				'font_code' => '\f197',
			),
			'fa-spinner'                             => array(
				'label'     => 'Spinner',
				'category'  => array( 2, 8 ),
				'font_code' => '\f110',
			),
			'fa-spoon'                               => array(
				'label'     => 'Spoon',
				'category'  => array( 2 ),
				'font_code' => '\f1b1',
			),
			'fa-square'                              => array(
				'label'     => 'Square',
				'category'  => array( 2, 9 ),
				'font_code' => '\f0c8',
			),
			'fa-square-o'                            => array(
				'label'     => 'Square <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 9 ),
				'font_code' => '\f096',
			),
			'fa-star'                                => array(
				'label'     => 'Star',
				'category'  => array( 2 ),
				'font_code' => '\f005',
			),
			'fa-star-half'                           => array(
				'label'     => 'Star Half',
				'category'  => array( 2 ),
				'font_code' => '\f089',
			),
			'fa-star-half-empty'                     => array(
				'label'     => 'Star Half Empty',
				'category'  => array( 2 ),
				'font_code' => '\f123',
			),
			'fa-star-half-full'                      => array(
				'label'     => 'Star Half Full',
				'category'  => array( 2 ),
				'font_code' => '\f123',
			),
			'fa-star-half-o'                         => array(
				'label'     => 'Star Half <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f123',
			),
			'fa-star-o'                              => array(
				'label'     => 'Star <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f006',
			),
			'fa-sticky-note'                         => array(
				'label'     => 'Sticky Note',
				'category'  => array( 2 ),
				'font_code' => '\f249',
			),
			'fa-sticky-note-o'                       => array(
				'label'     => 'Sticky Note <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f24a',
			),
			'fa-street-view'                         => array(
				'label'     => 'Street View',
				'category'  => array( 2 ),
				'font_code' => '\f21d',
			),
			'fa-suitcase'                            => array(
				'label'     => 'Suitcase',
				'category'  => array( 2 ),
				'font_code' => '\f0f2',
			),
			'fa-sun-o'                               => array(
				'label'     => 'Sun <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f185',
			),
			'fa-support'                             => array(
				'label'     => 'Support',
				'category'  => array( 2 ),
				'font_code' => '\f1cd',
			),
			'fa-tablet'                              => array(
				'label'     => 'Tablet',
				'category'  => array( 2 ),
				'font_code' => '\f10a',
			),
			'fa-tachometer'                          => array(
				'label'     => 'Tachometer',
				'category'  => array( 2 ),
				'font_code' => '\f0e4',
			),
			'fa-tag'                                 => array(
				'label'     => 'Tag',
				'category'  => array( 2 ),
				'font_code' => '\f02b',
			),
			'fa-tags'                                => array(
				'label'     => 'Tags',
				'category'  => array( 2 ),
				'font_code' => '\f02c',
			),
			'fa-tasks'                               => array(
				'label'     => 'Tasks',
				'category'  => array( 2 ),
				'font_code' => '\f0ae',
			),
			'fa-taxi'                                => array(
				'label'     => 'Taxi',
				'category'  => array( 2, 5 ),
				'font_code' => '\f1ba',
			),
			'fa-television'                          => array(
				'label'     => 'Television',
				'category'  => array( 2 ),
				'font_code' => '\f26c',
			),
			'fa-terminal'                            => array(
				'label'     => 'Terminal',
				'category'  => array( 2 ),
				'font_code' => '\f120',
			),
			'fa-thumb-tack'                          => array(
				'label'     => 'Thumb Tack',
				'category'  => array( 2 ),
				'font_code' => '\f08d',
			),
			'fa-thumbs-down'                         => array(
				'label'     => 'Thumbs Down',
				'category'  => array( 2, 4 ),
				'font_code' => '\f165',
			),
			'fa-thumbs-o-down'                       => array(
				'label'     => 'Thumbs Down <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f088',
			),
			'fa-thumbs-o-up'                         => array(
				'label'     => 'Thumbs Up <span class="text-muted">(Outline)</span>',
				'category'  => array( 2, 4 ),
				'font_code' => '\f087',
			),
			'fa-thumbs-up'                           => array(
				'label'     => 'Thumbs Up',
				'category'  => array( 2, 4 ),
				'font_code' => '\f164',
			),
			'fa-ticket'                              => array(
				'label'     => 'Ticket',
				'category'  => array( 2 ),
				'font_code' => '\f145',
			),
			'fa-times'                               => array(
				'label'     => 'Times',
				'category'  => array( 2 ),
				'font_code' => '\f00d',
			),
			'fa-times-circle'                        => array(
				'label'     => 'Times Circle',
				'category'  => array( 2 ),
				'font_code' => '\f057',
			),
			'fa-times-circle-o'                      => array(
				'label'     => 'Times Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f05c',
			),
			'fa-tint'                                => array(
				'label'     => 'Tint',
				'category'  => array( 2 ),
				'font_code' => '\f043',
			),
			'fa-toggle-down'                         => array(
				'label'     => 'Toggle Down',
				'category'  => array( 2, 14 ),
				'font_code' => '\f150',
			),
			'fa-toggle-left'                         => array(
				'label'     => 'Toggle Left',
				'category'  => array( 2, 14 ),
				'font_code' => '\f191',
			),
			'fa-toggle-off'                          => array(
				'label'     => 'Toggle Off',
				'category'  => array( 2 ),
				'font_code' => '\f204',
			),
			'fa-toggle-on'                           => array(
				'label'     => 'Toggle On',
				'category'  => array( 2 ),
				'font_code' => '\f205',
			),
			'fa-toggle-right'                        => array(
				'label'     => 'Toggle Right',
				'category'  => array( 2, 14 ),
				'font_code' => '\f152',
			),
			'fa-toggle-up'                           => array(
				'label'     => 'Toggle Up',
				'category'  => array( 2, 14 ),
				'font_code' => '\f151',
			),
			'fa-trademark'                           => array(
				'label'     => 'Trademark',
				'category'  => array( 2 ),
				'font_code' => '\f25c',
			),
			'fa-trash'                               => array(
				'label'     => 'Trash',
				'category'  => array( 2 ),
				'font_code' => '\f1f8',
			),
			'fa-trash-o'                             => array(
				'label'     => 'Trash <span class="text-muted">(Outline)</span>',
				'category'  => array( 2 ),
				'font_code' => '\f014',
			),
			'fa-tree'                                => array(
				'label'     => 'Tree',
				'category'  => array( 2 ),
				'font_code' => '\f1bb',
			),
			'fa-trophy'                              => array(
				'label'     => 'Trophy',
				'category'  => array( 2 ),
				'font_code' => '\f091',
			),
			'fa-truck'                               => array(
				'label'     => 'Truck',
				'category'  => array( 2, 5 ),
				'font_code' => '\f0d1',
			),
			'fa-tty'                                 => array(
				'label'     => 'Tty',
				'category'  => array( 2, 3 ),
				'font_code' => '\f1e4',
			),
			'fa-tv'                                  => array(
				'label'     => 'Tv',
				'category'  => array( 2 ),
				'font_code' => '\f26c',
			),
			'fa-umbrella'                            => array(
				'label'     => 'Umbrella',
				'category'  => array( 2 ),
				'font_code' => '\f0e9',
			),
			'fa-universal-access'                    => array(
				'label'     => 'Universal Access',
				'category'  => array( 2, 3 ),
				'font_code' => '\f29a',
			),
			'fa-university'                          => array(
				'label'     => 'University',
				'category'  => array( 2 ),
				'font_code' => '\f19c',
			),
			'fa-unlock'                              => array(
				'label'     => 'Unlock',
				'category'  => array( 2 ),
				'font_code' => '\f09c',
			),
			'fa-unlock-alt'                          => array(
				'label'     => 'Unlock Alt',
				'category'  => array( 2 ),
				'font_code' => '\f13e',
			),
			'fa-unsorted'                            => array(
				'label'     => 'Unsorted',
				'category'  => array( 2 ),
				'font_code' => '\f0dc',
			),
			'fa-upload'                              => array(
				'label'     => 'Upload',
				'category'  => array( 2 ),
				'font_code' => '\f093',
			),
			'fa-user'                                => array(
				'label'     => 'User',
				'category'  => array( 2 ),
				'font_code' => '\f007',
			),
			'fa-user-plus'                           => array(
				'label'     => 'User Plus',
				'category'  => array( 2 ),
				'font_code' => '\f234',
			),
			'fa-user-secret'                         => array(
				'label'     => 'User Secret',
				'category'  => array( 2 ),
				'font_code' => '\f21b',
			),
			'fa-user-times'                          => array(
				'label'     => 'User Times',
				'category'  => array( 2 ),
				'font_code' => '\f235',
			),
			'fa-users'                               => array(
				'label'     => 'Users',
				'category'  => array( 2 ),
				'font_code' => '\f0c0',
			),
			'fa-video-camera'                        => array(
				'label'     => 'Video Camera',
				'category'  => array( 2 ),
				'font_code' => '\f03d',
			),
			'fa-volume-control-phone'                => array(
				'label'     => 'Volume Control Phone',
				'category'  => array( 2, 3 ),
				'font_code' => '\f2a0',
			),
			'fa-volume-down'                         => array(
				'label'     => 'Volume Down',
				'category'  => array( 2 ),
				'font_code' => '\f027',
			),
			'fa-volume-off'                          => array(
				'label'     => 'Volume Off',
				'category'  => array( 2 ),
				'font_code' => '\f026',
			),
			'fa-volume-up'                           => array(
				'label'     => 'Volume Up',
				'category'  => array( 2 ),
				'font_code' => '\f028',
			),
			'fa-warning'                             => array(
				'label'     => 'Warning',
				'category'  => array( 2 ),
				'font_code' => '\f071',
			),
			'fa-wheelchair'                          => array(
				'label'     => 'Wheelchair',
				'category'  => array( 2, 3, 5, 17 ),
				'font_code' => '\f193',
			),
			'fa-wheelchair-alt'                      => array(
				'label'     => 'Wheelchair Alt',
				'category'  => array( 2, 3, 5, 17 ),
				'font_code' => '\f29b',
			),
			'fa-wifi'                                => array(
				'label'     => 'Wifi',
				'category'  => array( 2 ),
				'font_code' => '\f1eb',
			),
			'fa-wrench'                              => array(
				'label'     => 'Wrench',
				'category'  => array( 2 ),
				'font_code' => '\f0ad',
			),
			'fa-hand-o-down'                         => array(
				'label'     => 'Hand Down <span class="text-muted">(Outline)</span>',
				'category'  => array( 4, 14 ),
				'font_code' => '\f0a7',
			),
			'fa-hand-o-left'                         => array(
				'label'     => 'Hand Left <span class="text-muted">(Outline)</span>',
				'category'  => array( 4, 14 ),
				'font_code' => '\f0a5',
			),
			'fa-hand-o-right'                        => array(
				'label'     => 'Hand Right <span class="text-muted">(Outline)</span>',
				'category'  => array( 4, 14 ),
				'font_code' => '\f0a4',
			),
			'fa-hand-o-up'                           => array(
				'label'     => 'Hand Up <span class="text-muted">(Outline)</span>',
				'category'  => array( 4, 14 ),
				'font_code' => '\f0a6',
			),
			'fa-ambulance'                           => array(
				'label'     => 'Ambulance',
				'category'  => array( 5, 17 ),
				'font_code' => '\f0f9',
			),
			'fa-subway'                              => array(
				'label'     => 'Subway',
				'category'  => array( 5 ),
				'font_code' => '\f239',
			),
			'fa-train'                               => array(
				'label'     => 'Train',
				'category'  => array( 5 ),
				'font_code' => '\f238',
			),
			'fa-genderless'                          => array(
				'label'     => 'Genderless',
				'category'  => array( 6 ),
				'font_code' => '\f22d',
			),
			'fa-intersex'                            => array(
				'label'     => 'Intersex',
				'category'  => array( 6 ),
				'font_code' => '\f224',
			),
			'fa-mars'                                => array(
				'label'     => 'Mars',
				'category'  => array( 6 ),
				'font_code' => '\f222',
			),
			'fa-mars-double'                         => array(
				'label'     => 'Mars Double',
				'category'  => array( 6 ),
				'font_code' => '\f227',
			),
			'fa-mars-stroke'                         => array(
				'label'     => 'Mars Stroke',
				'category'  => array( 6 ),
				'font_code' => '\f229',
			),
			'fa-mars-stroke-h'                       => array(
				'label'     => 'Mars Stroke H',
				'category'  => array( 6 ),
				'font_code' => '\f22b',
			),
			'fa-mars-stroke-v'                       => array(
				'label'     => 'Mars Stroke V',
				'category'  => array( 6 ),
				'font_code' => '\f22a',
			),
			'fa-mercury'                             => array(
				'label'     => 'Mercury',
				'category'  => array( 6 ),
				'font_code' => '\f223',
			),
			'fa-neuter'                              => array(
				'label'     => 'Neuter',
				'category'  => array( 6 ),
				'font_code' => '\f22c',
			),
			'fa-transgender'                         => array(
				'label'     => 'Transgender',
				'category'  => array( 6 ),
				'font_code' => '\f224',
			),
			'fa-transgender-alt'                     => array(
				'label'     => 'Transgender Alt',
				'category'  => array( 6 ),
				'font_code' => '\f225',
			),
			'fa-venus'                               => array(
				'label'     => 'Venus',
				'category'  => array( 6 ),
				'font_code' => '\f221',
			),
			'fa-venus-double'                        => array(
				'label'     => 'Venus Double',
				'category'  => array( 6 ),
				'font_code' => '\f226',
			),
			'fa-venus-mars'                          => array(
				'label'     => 'Venus Mars',
				'category'  => array( 6 ),
				'font_code' => '\f228',
			),
			'fa-file'                                => array(
				'label'     => 'File',
				'category'  => array( 7, 13 ),
				'font_code' => '\f15b',
			),
			'fa-file-o'                              => array(
				'label'     => 'File <span class="text-muted">(Outline)</span>',
				'category'  => array( 7, 13 ),
				'font_code' => '\f016',
			),
			'fa-file-text'                           => array(
				'label'     => 'File Text',
				'category'  => array( 7, 13 ),
				'font_code' => '\f15c',
			),
			'fa-file-text-o'                         => array(
				'label'     => 'File Text <span class="text-muted">(Outline)</span>',
				'category'  => array( 7, 13 ),
				'font_code' => '\f0f6',
			),
			'fa-cc-amex'                             => array(
				'label'     => 'Cc Amex',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1f3',
			),
			'fa-cc-diners-club'                      => array(
				'label'     => 'Cc Diners Club',
				'category'  => array( 10, 16 ),
				'font_code' => '\f24c',
			),
			'fa-cc-discover'                         => array(
				'label'     => 'Cc Discover',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1f2',
			),
			'fa-cc-jcb'                              => array(
				'label'     => 'Cc Jcb',
				'category'  => array( 10, 16 ),
				'font_code' => '\f24b',
			),
			'fa-cc-mastercard'                       => array(
				'label'     => 'Cc Mastercard',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1f1',
			),
			'fa-cc-paypal'                           => array(
				'label'     => 'Cc Paypal',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1f4',
			),
			'fa-cc-stripe'                           => array(
				'label'     => 'Cc Stripe',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1f5',
			),
			'fa-cc-visa'                             => array(
				'label'     => 'Cc Visa',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1f0',
			),
			'fa-google-wallet'                       => array(
				'label'     => 'Google Wallet',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1ee',
			),
			'fa-paypal'                              => array(
				'label'     => 'Paypal',
				'category'  => array( 10, 16 ),
				'font_code' => '\f1ed',
			),
			'fa-bitcoin'                             => array(
				'label'     => 'Bitcoin',
				'category'  => array( 12, 16 ),
				'font_code' => '\f15a',
			),
			'fa-btc'                                 => array(
				'label'     => 'Btc',
				'category'  => array( 12, 16 ),
				'font_code' => '\f15a',
			),
			'fa-cny'                                 => array(
				'label'     => 'Cny',
				'category'  => array( 12 ),
				'font_code' => '\f157',
			),
			'fa-dollar'                              => array(
				'label'     => 'Dollar',
				'category'  => array( 12 ),
				'font_code' => '\f155',
			),
			'fa-eur'                                 => array(
				'label'     => 'Eur',
				'category'  => array( 12 ),
				'font_code' => '\f153',
			),
			'fa-euro'                                => array(
				'label'     => 'Euro',
				'category'  => array( 12 ),
				'font_code' => '\f153',
			),
			'fa-gbp'                                 => array(
				'label'     => 'Gbp',
				'category'  => array( 12 ),
				'font_code' => '\f154',
			),
			'fa-gg'                                  => array(
				'label'     => 'Gg',
				'category'  => array( 12, 16 ),
				'font_code' => '\f260',
			),
			'fa-gg-circle'                           => array(
				'label'     => 'Gg Circle',
				'category'  => array( 12, 16 ),
				'font_code' => '\f261',
			),
			'fa-ils'                                 => array(
				'label'     => 'Ils',
				'category'  => array( 12 ),
				'font_code' => '\f20b',
			),
			'fa-inr'                                 => array(
				'label'     => 'Inr',
				'category'  => array( 12 ),
				'font_code' => '\f156',
			),
			'fa-jpy'                                 => array(
				'label'     => 'Jpy',
				'category'  => array( 12 ),
				'font_code' => '\f157',
			),
			'fa-krw'                                 => array(
				'label'     => 'Krw',
				'category'  => array( 12 ),
				'font_code' => '\f159',
			),
			'fa-rmb'                                 => array(
				'label'     => 'Rmb',
				'category'  => array( 12 ),
				'font_code' => '\f157',
			),
			'fa-rouble'                              => array(
				'label'     => 'Rouble',
				'category'  => array( 12 ),
				'font_code' => '\f158',
			),
			'fa-rub'                                 => array(
				'label'     => 'Rub',
				'category'  => array( 12 ),
				'font_code' => '\f158',
			),
			'fa-ruble'                               => array(
				'label'     => 'Ruble',
				'category'  => array( 12 ),
				'font_code' => '\f158',
			),
			'fa-rupee'                               => array(
				'label'     => 'Rupee',
				'category'  => array( 12 ),
				'font_code' => '\f156',
			),
			'fa-shekel'                              => array(
				'label'     => 'Shekel',
				'category'  => array( 12 ),
				'font_code' => '\f20b',
			),
			'fa-sheqel'                              => array(
				'label'     => 'Sheqel',
				'category'  => array( 12 ),
				'font_code' => '\f20b',
			),
			'fa-try'                                 => array(
				'label'     => 'Try',
				'category'  => array( 12 ),
				'font_code' => '\f195',
			),
			'fa-turkish-lira'                        => array(
				'label'     => 'Turkish Lira',
				'category'  => array( 12 ),
				'font_code' => '\f195',
			),
			'fa-usd'                                 => array(
				'label'     => 'Usd',
				'category'  => array( 12 ),
				'font_code' => '\f155',
			),
			'fa-won'                                 => array(
				'label'     => 'Won',
				'category'  => array( 12 ),
				'font_code' => '\f159',
			),
			'fa-yen'                                 => array(
				'label'     => 'Yen',
				'category'  => array( 12 ),
				'font_code' => '\f157',
			),
			'fa-align-center'                        => array(
				'label'     => 'Align Center',
				'category'  => array( 13 ),
				'font_code' => '\f037',
			),
			'fa-align-justify'                       => array(
				'label'     => 'Align Justify',
				'category'  => array( 13 ),
				'font_code' => '\f039',
			),
			'fa-align-left'                          => array(
				'label'     => 'Align Left',
				'category'  => array( 13 ),
				'font_code' => '\f036',
			),
			'fa-align-right'                         => array(
				'label'     => 'Align Right',
				'category'  => array( 13 ),
				'font_code' => '\f038',
			),
			'fa-bold'                                => array(
				'label'     => 'Bold',
				'category'  => array( 13 ),
				'font_code' => '\f032',
			),
			'fa-chain'                               => array(
				'label'     => 'Chain',
				'category'  => array( 13 ),
				'font_code' => '\f0c1',
			),
			'fa-chain-broken'                        => array(
				'label'     => 'Chain Broken',
				'category'  => array( 13 ),
				'font_code' => '\f127',
			),
			'fa-clipboard'                           => array(
				'label'     => 'Clipboard',
				'category'  => array( 13 ),
				'font_code' => '\f0ea',
			),
			'fa-columns'                             => array(
				'label'     => 'Columns',
				'category'  => array( 13 ),
				'font_code' => '\f0db',
			),
			'fa-copy'                                => array(
				'label'     => 'Copy',
				'category'  => array( 13 ),
				'font_code' => '\f0c5',
			),
			'fa-cut'                                 => array(
				'label'     => 'Cut',
				'category'  => array( 13 ),
				'font_code' => '\f0c4',
			),
			'fa-dedent'                              => array(
				'label'     => 'Dedent',
				'category'  => array( 13 ),
				'font_code' => '\f03b',
			),
			'fa-files-o'                             => array(
				'label'     => 'Files <span class="text-muted">(Outline)</span>',
				'category'  => array( 13 ),
				'font_code' => '\f0c5',
			),
			'fa-floppy-o'                            => array(
				'label'     => 'Floppy <span class="text-muted">(Outline)</span>',
				'category'  => array( 13 ),
				'font_code' => '\f0c7',
			),
			'fa-font'                                => array(
				'label'     => 'Font',
				'category'  => array( 13 ),
				'font_code' => '\f031',
			),
			'fa-header'                              => array(
				'label'     => 'Header',
				'category'  => array( 13 ),
				'font_code' => '\f1dc',
			),
			'fa-indent'                              => array(
				'label'     => 'Indent',
				'category'  => array( 13 ),
				'font_code' => '\f03c',
			),
			'fa-italic'                              => array(
				'label'     => 'Italic',
				'category'  => array( 13 ),
				'font_code' => '\f033',
			),
			'fa-link'                                => array(
				'label'     => 'Link',
				'category'  => array( 13 ),
				'font_code' => '\f0c1',
			),
			'fa-list'                                => array(
				'label'     => 'List',
				'category'  => array( 13 ),
				'font_code' => '\f03a',
			),
			'fa-list-alt'                            => array(
				'label'     => 'List Alt',
				'category'  => array( 13 ),
				'font_code' => '\f022',
			),
			'fa-list-ol'                             => array(
				'label'     => 'List Ol',
				'category'  => array( 13 ),
				'font_code' => '\f0cb',
			),
			'fa-list-ul'                             => array(
				'label'     => 'List Ul',
				'category'  => array( 13 ),
				'font_code' => '\f0ca',
			),
			'fa-outdent'                             => array(
				'label'     => 'Outdent',
				'category'  => array( 13 ),
				'font_code' => '\f03b',
			),
			'fa-paperclip'                           => array(
				'label'     => 'Paperclip',
				'category'  => array( 13 ),
				'font_code' => '\f0c6',
			),
			'fa-paragraph'                           => array(
				'label'     => 'Paragraph',
				'category'  => array( 13 ),
				'font_code' => '\f1dd',
			),
			'fa-paste'                               => array(
				'label'     => 'Paste',
				'category'  => array( 13 ),
				'font_code' => '\f0ea',
			),
			'fa-repeat'                              => array(
				'label'     => 'Repeat',
				'category'  => array( 13 ),
				'font_code' => '\f01e',
			),
			'fa-rotate-left'                         => array(
				'label'     => 'Rotate Left',
				'category'  => array( 13 ),
				'font_code' => '\f0e2',
			),
			'fa-rotate-right'                        => array(
				'label'     => 'Rotate Right',
				'category'  => array( 13 ),
				'font_code' => '\f01e',
			),
			'fa-save'                                => array(
				'label'     => 'Save',
				'category'  => array( 13 ),
				'font_code' => '\f0c7',
			),
			'fa-scissors'                            => array(
				'label'     => 'Scissors',
				'category'  => array( 13 ),
				'font_code' => '\f0c4',
			),
			'fa-strikethrough'                       => array(
				'label'     => 'Strikethrough',
				'category'  => array( 13 ),
				'font_code' => '\f0cc',
			),
			'fa-subscript'                           => array(
				'label'     => 'Subscript',
				'category'  => array( 13 ),
				'font_code' => '\f12c',
			),
			'fa-superscript'                         => array(
				'label'     => 'Superscript',
				'category'  => array( 13 ),
				'font_code' => '\f12b',
			),
			'fa-table'                               => array(
				'label'     => 'Table',
				'category'  => array( 13 ),
				'font_code' => '\f0ce',
			),
			'fa-text-height'                         => array(
				'label'     => 'Text Height',
				'category'  => array( 13 ),
				'font_code' => '\f034',
			),
			'fa-text-width'                          => array(
				'label'     => 'Text Width',
				'category'  => array( 13 ),
				'font_code' => '\f035',
			),
			'fa-th'                                  => array(
				'label'     => 'Th',
				'category'  => array( 13 ),
				'font_code' => '\f00a',
			),
			'fa-th-large'                            => array(
				'label'     => 'Th Large',
				'category'  => array( 13 ),
				'font_code' => '\f009',
			),
			'fa-th-list'                             => array(
				'label'     => 'Th List',
				'category'  => array( 13 ),
				'font_code' => '\f00b',
			),
			'fa-underline'                           => array(
				'label'     => 'Underline',
				'category'  => array( 13 ),
				'font_code' => '\f0cd',
			),
			'fa-undo'                                => array(
				'label'     => 'Undo',
				'category'  => array( 13 ),
				'font_code' => '\f0e2',
			),
			'fa-unlink'                              => array(
				'label'     => 'Unlink',
				'category'  => array( 13 ),
				'font_code' => '\f127',
			),
			'fa-angle-double-down'                   => array(
				'label'     => 'Angle Double Down',
				'category'  => array( 14 ),
				'font_code' => '\f103',
			),
			'fa-angle-double-left'                   => array(
				'label'     => 'Angle Double Left',
				'category'  => array( 14 ),
				'font_code' => '\f100',
			),
			'fa-angle-double-right'                  => array(
				'label'     => 'Angle Double Right',
				'category'  => array( 14 ),
				'font_code' => '\f101',
			),
			'fa-angle-double-up'                     => array(
				'label'     => 'Angle Double Up',
				'category'  => array( 14 ),
				'font_code' => '\f102',
			),
			'fa-angle-down'                          => array(
				'label'     => 'Angle Down',
				'category'  => array( 14 ),
				'font_code' => '\f107',
			),
			'fa-angle-left'                          => array(
				'label'     => 'Angle Left',
				'category'  => array( 14 ),
				'font_code' => '\f104',
			),
			'fa-angle-right'                         => array(
				'label'     => 'Angle Right',
				'category'  => array( 14 ),
				'font_code' => '\f105',
			),
			'fa-angle-up'                            => array(
				'label'     => 'Angle Up',
				'category'  => array( 14 ),
				'font_code' => '\f106',
			),
			'fa-arrow-circle-down'                   => array(
				'label'     => 'Arrow Circle Down',
				'category'  => array( 14 ),
				'font_code' => '\f0ab',
			),
			'fa-arrow-circle-left'                   => array(
				'label'     => 'Arrow Circle Left',
				'category'  => array( 14 ),
				'font_code' => '\f0a8',
			),
			'fa-arrow-circle-o-down'                 => array(
				'label'     => 'Arrow Circle Down <span class="text-muted">(Outline)</span>',
				'category'  => array( 14 ),
				'font_code' => '\f01a',
			),
			'fa-arrow-circle-o-left'                 => array(
				'label'     => 'Arrow Circle Left <span class="text-muted">(Outline)</span>',
				'category'  => array( 14 ),
				'font_code' => '\f190',
			),
			'fa-arrow-circle-o-right'                => array(
				'label'     => 'Arrow Circle Right <span class="text-muted">(Outline)</span>',
				'category'  => array( 14 ),
				'font_code' => '\f18e',
			),
			'fa-arrow-circle-o-up'                   => array(
				'label'     => 'Arrow Circle Up <span class="text-muted">(Outline)</span>',
				'category'  => array( 14 ),
				'font_code' => '\f01b',
			),
			'fa-arrow-circle-right'                  => array(
				'label'     => 'Arrow Circle Right',
				'category'  => array( 14 ),
				'font_code' => '\f0a9',
			),
			'fa-arrow-circle-up'                     => array(
				'label'     => 'Arrow Circle Up',
				'category'  => array( 14 ),
				'font_code' => '\f0aa',
			),
			'fa-arrow-down'                          => array(
				'label'     => 'Arrow Down',
				'category'  => array( 14 ),
				'font_code' => '\f063',
			),
			'fa-arrow-left'                          => array(
				'label'     => 'Arrow Left',
				'category'  => array( 14 ),
				'font_code' => '\f060',
			),
			'fa-arrow-right'                         => array(
				'label'     => 'Arrow Right',
				'category'  => array( 14 ),
				'font_code' => '\f061',
			),
			'fa-arrow-up'                            => array(
				'label'     => 'Arrow Up',
				'category'  => array( 14 ),
				'font_code' => '\f062',
			),
			'fa-arrows-alt'                          => array(
				'label'     => 'Arrows Alt',
				'category'  => array( 14, 15 ),
				'font_code' => '\f0b2',
			),
			'fa-caret-down'                          => array(
				'label'     => 'Caret Down',
				'category'  => array( 14 ),
				'font_code' => '\f0d7',
			),
			'fa-caret-left'                          => array(
				'label'     => 'Caret Left',
				'category'  => array( 14 ),
				'font_code' => '\f0d9',
			),
			'fa-caret-right'                         => array(
				'label'     => 'Caret Right',
				'category'  => array( 14 ),
				'font_code' => '\f0da',
			),
			'fa-caret-up'                            => array(
				'label'     => 'Caret Up',
				'category'  => array( 14 ),
				'font_code' => '\f0d8',
			),
			'fa-chevron-circle-down'                 => array(
				'label'     => 'Chevron Circle Down',
				'category'  => array( 14 ),
				'font_code' => '\f13a',
			),
			'fa-chevron-circle-left'                 => array(
				'label'     => 'Chevron Circle Left',
				'category'  => array( 14 ),
				'font_code' => '\f137',
			),
			'fa-chevron-circle-right'                => array(
				'label'     => 'Chevron Circle Right',
				'category'  => array( 14 ),
				'font_code' => '\f138',
			),
			'fa-chevron-circle-up'                   => array(
				'label'     => 'Chevron Circle Up',
				'category'  => array( 14 ),
				'font_code' => '\f139',
			),
			'fa-chevron-down'                        => array(
				'label'     => 'Chevron Down',
				'category'  => array( 14 ),
				'font_code' => '\f078',
			),
			'fa-chevron-left'                        => array(
				'label'     => 'Chevron Left',
				'category'  => array( 14 ),
				'font_code' => '\f053',
			),
			'fa-chevron-right'                       => array(
				'label'     => 'Chevron Right',
				'category'  => array( 14 ),
				'font_code' => '\f054',
			),
			'fa-chevron-up'                          => array(
				'label'     => 'Chevron Up',
				'category'  => array( 14 ),
				'font_code' => '\f077',
			),
			'fa-long-arrow-down'                     => array(
				'label'     => 'Long Arrow Down',
				'category'  => array( 14 ),
				'font_code' => '\f175',
			),
			'fa-long-arrow-left'                     => array(
				'label'     => 'Long Arrow Left',
				'category'  => array( 14 ),
				'font_code' => '\f177',
			),
			'fa-long-arrow-right'                    => array(
				'label'     => 'Long Arrow Right',
				'category'  => array( 14 ),
				'font_code' => '\f178',
			),
			'fa-long-arrow-up'                       => array(
				'label'     => 'Long Arrow Up',
				'category'  => array( 14 ),
				'font_code' => '\f176',
			),
			'fa-backward'                            => array(
				'label'     => 'Backward',
				'category'  => array( 15 ),
				'font_code' => '\f04a',
			),
			'fa-compress'                            => array(
				'label'     => 'Compress',
				'category'  => array( 15 ),
				'font_code' => '\f066',
			),
			'fa-eject'                               => array(
				'label'     => 'Eject',
				'category'  => array( 15 ),
				'font_code' => '\f052',
			),
			'fa-expand'                              => array(
				'label'     => 'Expand',
				'category'  => array( 15 ),
				'font_code' => '\f065',
			),
			'fa-fast-backward'                       => array(
				'label'     => 'Fast Backward',
				'category'  => array( 15 ),
				'font_code' => '\f049',
			),
			'fa-fast-forward'                        => array(
				'label'     => 'Fast Forward',
				'category'  => array( 15 ),
				'font_code' => '\f050',
			),
			'fa-forward'                             => array(
				'label'     => 'Forward',
				'category'  => array( 15 ),
				'font_code' => '\f04e',
			),
			'fa-pause'                               => array(
				'label'     => 'Pause',
				'category'  => array( 15 ),
				'font_code' => '\f04c',
			),
			'fa-pause-circle'                        => array(
				'label'     => 'Pause Circle',
				'category'  => array( 15 ),
				'font_code' => '\f28b',
			),
			'fa-pause-circle-o'                      => array(
				'label'     => 'Pause Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 15 ),
				'font_code' => '\f28c',
			),
			'fa-play'                                => array(
				'label'     => 'Play',
				'category'  => array( 15 ),
				'font_code' => '\f04b',
			),
			'fa-play-circle'                         => array(
				'label'     => 'Play Circle',
				'category'  => array( 15 ),
				'font_code' => '\f144',
			),
			'fa-play-circle-o'                       => array(
				'label'     => 'Play Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 15 ),
				'font_code' => '\f01d',
			),
			'fa-step-backward'                       => array(
				'label'     => 'Step Backward',
				'category'  => array( 15 ),
				'font_code' => '\f048',
			),
			'fa-step-forward'                        => array(
				'label'     => 'Step Forward',
				'category'  => array( 15 ),
				'font_code' => '\f051',
			),
			'fa-stop'                                => array(
				'label'     => 'Stop',
				'category'  => array( 15 ),
				'font_code' => '\f04d',
			),
			'fa-stop-circle'                         => array(
				'label'     => 'Stop Circle',
				'category'  => array( 15 ),
				'font_code' => '\f28d',
			),
			'fa-stop-circle-o'                       => array(
				'label'     => 'Stop Circle <span class="text-muted">(Outline)</span>',
				'category'  => array( 15 ),
				'font_code' => '\f28e',
			),
			'fa-youtube-play'                        => array(
				'label'     => 'Youtube Play',
				'category'  => array( 15, 16 ),
				'font_code' => '\f16a',
			),
			'fa-500px'                               => array(
				'label'     => '500px',
				'category'  => array( 16 ),
				'font_code' => '\f26e',
			),
			'fa-adn'                                 => array(
				'label'     => 'Adn',
				'category'  => array( 16 ),
				'font_code' => '\f170',
			),
			'fa-amazon'                              => array(
				'label'     => 'Amazon',
				'category'  => array( 16 ),
				'font_code' => '\f270',
			),
			'fa-android'                             => array(
				'label'     => 'Android',
				'category'  => array( 16 ),
				'font_code' => '\f17b',
			),
			'fa-angellist'                           => array(
				'label'     => 'Angellist',
				'category'  => array( 16 ),
				'font_code' => '\f209',
			),
			'fa-apple'                               => array(
				'label'     => 'Apple',
				'category'  => array( 16 ),
				'font_code' => '\f179',
			),
			'fa-behance'                             => array(
				'label'     => 'Behance',
				'category'  => array( 16 ),
				'font_code' => '\f1b4',
			),
			'fa-behance-square'                      => array(
				'label'     => 'Behance Square',
				'category'  => array( 16 ),
				'font_code' => '\f1b5',
			),
			'fa-bitbucket'                           => array(
				'label'     => 'Bitbucket',
				'category'  => array( 16 ),
				'font_code' => '\f171',
			),
			'fa-bitbucket-square'                    => array(
				'label'     => 'Bitbucket Square',
				'category'  => array( 16 ),
				'font_code' => '\f172',
			),
			'fa-black-tie'                           => array(
				'label'     => 'Black Tie',
				'category'  => array( 16 ),
				'font_code' => '\f27e',
			),
			'fa-buysellads'                          => array(
				'label'     => 'Buysellads',
				'category'  => array( 16 ),
				'font_code' => '\f20d',
			),
			'fa-chrome'                              => array(
				'label'     => 'Chrome',
				'category'  => array( 16 ),
				'font_code' => '\f268',
			),
			'fa-codepen'                             => array(
				'label'     => 'Codepen',
				'category'  => array( 16 ),
				'font_code' => '\f1cb',
			),
			'fa-codiepie'                            => array(
				'label'     => 'Codiepie',
				'category'  => array( 16 ),
				'font_code' => '\f284',
			),
			'fa-connectdevelop'                      => array(
				'label'     => 'Connectdevelop',
				'category'  => array( 16 ),
				'font_code' => '\f20e',
			),
			'fa-contao'                              => array(
				'label'     => 'Contao',
				'category'  => array( 16 ),
				'font_code' => '\f26d',
			),
			'fa-css3'                                => array(
				'label'     => 'Css3',
				'category'  => array( 16 ),
				'font_code' => '\f13c',
			),
			'fa-dashcube'                            => array(
				'label'     => 'Dashcube',
				'category'  => array( 16 ),
				'font_code' => '\f210',
			),
			'fa-delicious'                           => array(
				'label'     => 'Delicious',
				'category'  => array( 16 ),
				'font_code' => '\f1a5',
			),
			'fa-deviantart'                          => array(
				'label'     => 'Deviantart',
				'category'  => array( 16 ),
				'font_code' => '\f1bd',
			),
			'fa-digg'                                => array(
				'label'     => 'Digg',
				'category'  => array( 16 ),
				'font_code' => '\f1a6',
			),
			'fa-dribbble'                            => array(
				'label'     => 'Dribbble',
				'category'  => array( 16 ),
				'font_code' => '\f17d',
			),
			'fa-dropbox'                             => array(
				'label'     => 'Dropbox',
				'category'  => array( 16 ),
				'font_code' => '\f16b',
			),
			'fa-drupal'                              => array(
				'label'     => 'Drupal',
				'category'  => array( 16 ),
				'font_code' => '\f1a9',
			),
			'fa-edge'                                => array(
				'label'     => 'Edge',
				'category'  => array( 16 ),
				'font_code' => '\f282',
			),
			'fa-empire'                              => array(
				'label'     => 'Empire',
				'category'  => array( 16 ),
				'font_code' => '\f1d1',
			),
			'fa-envira'                              => array(
				'label'     => 'Envira',
				'category'  => array( 16 ),
				'font_code' => '\f299',
			),
			'fa-expeditedssl'                        => array(
				'label'     => 'Expeditedssl',
				'category'  => array( 16 ),
				'font_code' => '\f23e',
			),
			'fa-fa'                                  => array(
				'label'     => 'Fa',
				'category'  => array( 16 ),
				'font_code' => '\f2b4',
			),
			'fa-facebook'                            => array(
				'label'     => 'Facebook',
				'category'  => array( 16 ),
				'font_code' => '\f09a',
			),
			'fa-facebook-f'                          => array(
				'label'     => 'Facebook F',
				'category'  => array( 16 ),
				'font_code' => '\f09a',
			),
			'fa-facebook-official'                   => array(
				'label'     => 'Facebook Official',
				'category'  => array( 16 ),
				'font_code' => '\f230',
			),
			'fa-facebook-square'                     => array(
				'label'     => 'Facebook Square',
				'category'  => array( 16 ),
				'font_code' => '\f082',
			),
			'fa-firefox'                             => array(
				'label'     => 'Firefox',
				'category'  => array( 16 ),
				'font_code' => '\f269',
			),
			'fa-first-order'                         => array(
				'label'     => 'First Order',
				'category'  => array( 16 ),
				'font_code' => '\f2b0',
			),
			'fa-flickr'                              => array(
				'label'     => 'Flickr',
				'category'  => array( 16 ),
				'font_code' => '\f16e',
			),
			'fa-font-awesome'                        => array(
				'label'     => 'Font Awesome',
				'category'  => array( 16 ),
				'font_code' => '\f2b4',
			),
			'fa-fonticons'                           => array(
				'label'     => 'Fonticons',
				'category'  => array( 16 ),
				'font_code' => '\f280',
			),
			'fa-fort-awesome'                        => array(
				'label'     => 'Fort Awesome',
				'category'  => array( 16 ),
				'font_code' => '\f286',
			),
			'fa-forumbee'                            => array(
				'label'     => 'Forumbee',
				'category'  => array( 16 ),
				'font_code' => '\f211',
			),
			'fa-foursquare'                          => array(
				'label'     => 'Foursquare',
				'category'  => array( 16 ),
				'font_code' => '\f180',
			),
			'fa-ge'                                  => array(
				'label'     => 'Ge',
				'category'  => array( 16 ),
				'font_code' => '\f1d1',
			),
			'fa-get-pocket'                          => array(
				'label'     => 'Get Pocket',
				'category'  => array( 16 ),
				'font_code' => '\f265',
			),
			'fa-git'                                 => array(
				'label'     => 'Git',
				'category'  => array( 16 ),
				'font_code' => '\f1d3',
			),
			'fa-git-square'                          => array(
				'label'     => 'Git Square',
				'category'  => array( 16 ),
				'font_code' => '\f1d2',
			),
			'fa-github'                              => array(
				'label'     => 'Github',
				'category'  => array( 16 ),
				'font_code' => '\f09b',
			),
			'fa-github-alt'                          => array(
				'label'     => 'Github Alt',
				'category'  => array( 16 ),
				'font_code' => '\f113',
			),
			'fa-github-square'                       => array(
				'label'     => 'Github Square',
				'category'  => array( 16 ),
				'font_code' => '\f092',
			),
			'fa-gitlab'                              => array(
				'label'     => 'Gitlab',
				'category'  => array( 16 ),
				'font_code' => '\f296',
			),
			'fa-gittip'                              => array(
				'label'     => 'Gittip',
				'category'  => array( 16 ),
				'font_code' => '\f184',
			),
			'fa-glide'                               => array(
				'label'     => 'Glide',
				'category'  => array( 16 ),
				'font_code' => '\f2a5',
			),
			'fa-glide-g'                             => array(
				'label'     => 'Glide G',
				'category'  => array( 16 ),
				'font_code' => '\f2a6',
			),
			'fa-google'                              => array(
				'label'     => 'Google',
				'category'  => array( 16 ),
				'font_code' => '\f1a0',
			),
			'fa-google-plus'                         => array(
				'label'     => 'Google Plus',
				'category'  => array( 16 ),
				'font_code' => '\f0d5',
			),
			'fa-google-plus-circle'                  => array(
				'label'     => 'Google Plus Circle',
				'category'  => array( 16 ),
				'font_code' => '\f2b3',
			),
			'fa-google-plus-official'                => array(
				'label'     => 'Google Plus Official',
				'category'  => array( 16 ),
				'font_code' => '\f2b3',
			),
			'fa-google-plus-square'                  => array(
				'label'     => 'Google Plus Square',
				'category'  => array( 16 ),
				'font_code' => '\f0d4',
			),
			'fa-gratipay'                            => array(
				'label'     => 'Gratipay',
				'category'  => array( 16 ),
				'font_code' => '\f184',
			),
			'fa-hacker-news'                         => array(
				'label'     => 'Hacker News',
				'category'  => array( 16 ),
				'font_code' => '\f1d4',
			),
			'fa-houzz'                               => array(
				'label'     => 'Houzz',
				'category'  => array( 16 ),
				'font_code' => '\f27c',
			),
			'fa-html5'                               => array(
				'label'     => 'Html5',
				'category'  => array( 16 ),
				'font_code' => '\f13b',
			),
			'fa-instagram'                           => array(
				'label'     => 'Instagram',
				'category'  => array( 16 ),
				'font_code' => '\f16d',
			),
			'fa-internet-explorer'                   => array(
				'label'     => 'Internet Explorer',
				'category'  => array( 16 ),
				'font_code' => '\f26b',
			),
			'fa-ioxhost'                             => array(
				'label'     => 'Ioxhost',
				'category'  => array( 16 ),
				'font_code' => '\f208',
			),
			'fa-joomla'                              => array(
				'label'     => 'Joomla',
				'category'  => array( 16 ),
				'font_code' => '\f1aa',
			),
			'fa-jsfiddle'                            => array(
				'label'     => 'Jsfiddle',
				'category'  => array( 16 ),
				'font_code' => '\f1cc',
			),
			'fa-lastfm'                              => array(
				'label'     => 'Lastfm',
				'category'  => array( 16 ),
				'font_code' => '\f202',
			),
			'fa-lastfm-square'                       => array(
				'label'     => 'Lastfm Square',
				'category'  => array( 16 ),
				'font_code' => '\f203',
			),
			'fa-leanpub'                             => array(
				'label'     => 'Leanpub',
				'category'  => array( 16 ),
				'font_code' => '\f212',
			),
			'fa-linkedin'                            => array(
				'label'     => 'Linkedin',
				'category'  => array( 16 ),
				'font_code' => '\f0e1',
			),
			'fa-linkedin-square'                     => array(
				'label'     => 'Linkedin Square',
				'category'  => array( 16 ),
				'font_code' => '\f08c',
			),
			'fa-linux'                               => array(
				'label'     => 'Linux',
				'category'  => array( 16 ),
				'font_code' => '\f17c',
			),
			'fa-maxcdn'                              => array(
				'label'     => 'Maxcdn',
				'category'  => array( 16 ),
				'font_code' => '\f136',
			),
			'fa-meanpath'                            => array(
				'label'     => 'Meanpath',
				'category'  => array( 16 ),
				'font_code' => '\f20c',
			),
			'fa-medium'                              => array(
				'label'     => 'Medium',
				'category'  => array( 16 ),
				'font_code' => '\f23a',
			),
			'fa-mixcloud'                            => array(
				'label'     => 'Mixcloud',
				'category'  => array( 16 ),
				'font_code' => '\f289',
			),
			'fa-modx'                                => array(
				'label'     => 'Modx',
				'category'  => array( 16 ),
				'font_code' => '\f285',
			),
			'fa-odnoklassniki'                       => array(
				'label'     => 'Odnoklassniki',
				'category'  => array( 16 ),
				'font_code' => '\f263',
			),
			'fa-odnoklassniki-square'                => array(
				'label'     => 'Odnoklassniki Square',
				'category'  => array( 16 ),
				'font_code' => '\f264',
			),
			'fa-opencart'                            => array(
				'label'     => 'Opencart',
				'category'  => array( 16 ),
				'font_code' => '\f23d',
			),
			'fa-openid'                              => array(
				'label'     => 'Openid',
				'category'  => array( 16 ),
				'font_code' => '\f19b',
			),
			'fa-opera'                               => array(
				'label'     => 'Opera',
				'category'  => array( 16 ),
				'font_code' => '\f26a',
			),
			'fa-optin-monster'                       => array(
				'label'     => 'Optin Monster',
				'category'  => array( 16 ),
				'font_code' => '\f23c',
			),
			'fa-pagelines'                           => array(
				'label'     => 'Pagelines',
				'category'  => array( 16 ),
				'font_code' => '\f18c',
			),
			'fa-pied-piper'                          => array(
				'label'     => 'Pied Piper',
				'category'  => array( 16 ),
				'font_code' => '\f2ae',
			),
			'fa-pied-piper-alt'                      => array(
				'label'     => 'Pied Piper Alt',
				'category'  => array( 16 ),
				'font_code' => '\f1a8',
			),
			'fa-pied-piper-pp'                       => array(
				'label'     => 'Pied Piper Pp',
				'category'  => array( 16 ),
				'font_code' => '\f1a7',
			),
			'fa-pinterest'                           => array(
				'label'     => 'Pinterest',
				'category'  => array( 16 ),
				'font_code' => '\f0d2',
			),
			'fa-pinterest-p'                         => array(
				'label'     => 'Pinterest P',
				'category'  => array( 16 ),
				'font_code' => '\f231',
			),
			'fa-pinterest-square'                    => array(
				'label'     => 'Pinterest Square',
				'category'  => array( 16 ),
				'font_code' => '\f0d3',
			),
			'fa-product-hunt'                        => array(
				'label'     => 'Product Hunt',
				'category'  => array( 16 ),
				'font_code' => '\f288',
			),
			'fa-qq'                                  => array(
				'label'     => 'Qq',
				'category'  => array( 16 ),
				'font_code' => '\f1d6',
			),
			'fa-ra'                                  => array(
				'label'     => 'Ra',
				'category'  => array( 16 ),
				'font_code' => '\f1d0',
			),
			'fa-rebel'                               => array(
				'label'     => 'Rebel',
				'category'  => array( 16 ),
				'font_code' => '\f1d0',
			),
			'fa-reddit'                              => array(
				'label'     => 'Reddit',
				'category'  => array( 16 ),
				'font_code' => '\f1a1',
			),
			'fa-reddit-alien'                        => array(
				'label'     => 'Reddit Alien',
				'category'  => array( 16 ),
				'font_code' => '\f281',
			),
			'fa-reddit-square'                       => array(
				'label'     => 'Reddit Square',
				'category'  => array( 16 ),
				'font_code' => '\f1a2',
			),
			'fa-renren'                              => array(
				'label'     => 'Renren',
				'category'  => array( 16 ),
				'font_code' => '\f18b',
			),
			'fa-resistance'                          => array(
				'label'     => 'Resistance',
				'category'  => array( 16 ),
				'font_code' => '\f1d0',
			),
			'fa-safari'                              => array(
				'label'     => 'Safari',
				'category'  => array( 16 ),
				'font_code' => '\f267',
			),
			'fa-scribd'                              => array(
				'label'     => 'Scribd',
				'category'  => array( 16 ),
				'font_code' => '\f28a',
			),
			'fa-sellsy'                              => array(
				'label'     => 'Sellsy',
				'category'  => array( 16 ),
				'font_code' => '\f213',
			),
			'fa-shirtsinbulk'                        => array(
				'label'     => 'Shirtsinbulk',
				'category'  => array( 16 ),
				'font_code' => '\f214',
			),
			'fa-simplybuilt'                         => array(
				'label'     => 'Simplybuilt',
				'category'  => array( 16 ),
				'font_code' => '\f215',
			),
			'fa-skyatlas'                            => array(
				'label'     => 'Skyatlas',
				'category'  => array( 16 ),
				'font_code' => '\f216',
			),
			'fa-skype'                               => array(
				'label'     => 'Skype',
				'category'  => array( 16 ),
				'font_code' => '\f17e',
			),
			'fa-slack'                               => array(
				'label'     => 'Slack',
				'category'  => array( 16 ),
				'font_code' => '\f198',
			),
			'fa-slideshare'                          => array(
				'label'     => 'Slideshare',
				'category'  => array( 16 ),
				'font_code' => '\f1e7',
			),
			'fa-snapchat'                            => array(
				'label'     => 'Snapchat',
				'category'  => array( 16 ),
				'font_code' => '\f2ab',
			),
			'fa-snapchat-ghost'                      => array(
				'label'     => 'Snapchat Ghost',
				'category'  => array( 16 ),
				'font_code' => '\f2ac',
			),
			'fa-snapchat-square'                     => array(
				'label'     => 'Snapchat Square',
				'category'  => array( 16 ),
				'font_code' => '\f2ad',
			),
			'fa-soundcloud'                          => array(
				'label'     => 'Soundcloud',
				'category'  => array( 16 ),
				'font_code' => '\f1be',
			),
			'fa-spotify'                             => array(
				'label'     => 'Spotify',
				'category'  => array( 16 ),
				'font_code' => '\f1bc',
			),
			'fa-stack-exchange'                      => array(
				'label'     => 'Stack Exchange',
				'category'  => array( 16 ),
				'font_code' => '\f18d',
			),
			'fa-stack-overflow'                      => array(
				'label'     => 'Stack Overflow',
				'category'  => array( 16 ),
				'font_code' => '\f16c',
			),
			'fa-steam'                               => array(
				'label'     => 'Steam',
				'category'  => array( 16 ),
				'font_code' => '\f1b6',
			),
			'fa-steam-square'                        => array(
				'label'     => 'Steam Square',
				'category'  => array( 16 ),
				'font_code' => '\f1b7',
			),
			'fa-stumbleupon'                         => array(
				'label'     => 'Stumbleupon',
				'category'  => array( 16 ),
				'font_code' => '\f1a4',
			),
			'fa-stumbleupon-circle'                  => array(
				'label'     => 'Stumbleupon Circle',
				'category'  => array( 16 ),
				'font_code' => '\f1a3',
			),
			'fa-tencent-weibo'                       => array(
				'label'     => 'Tencent Weibo',
				'category'  => array( 16 ),
				'font_code' => '\f1d5',
			),
			'fa-themeisle'                           => array(
				'label'     => 'Themeisle',
				'category'  => array( 16 ),
				'font_code' => '\f2b2',
			),
			'fa-trello'                              => array(
				'label'     => 'Trello',
				'category'  => array( 16 ),
				'font_code' => '\f181',
			),
			'fa-tripadvisor'                         => array(
				'label'     => 'Tripadvisor',
				'category'  => array( 16 ),
				'font_code' => '\f262',
			),
			'fa-tumblr'                              => array(
				'label'     => 'Tumblr',
				'category'  => array( 16 ),
				'font_code' => '\f173',
			),
			'fa-tumblr-square'                       => array(
				'label'     => 'Tumblr Square',
				'category'  => array( 16 ),
				'font_code' => '\f174',
			),
			'fa-twitch'                              => array(
				'label'     => 'Twitch',
				'category'  => array( 16 ),
				'font_code' => '\f1e8',
			),
			'fa-twitter'                             => array(
				'label'     => 'Twitter',
				'category'  => array( 16 ),
				'font_code' => '\f099',
			),
			'fa-twitter-square'                      => array(
				'label'     => 'Twitter Square',
				'category'  => array( 16 ),
				'font_code' => '\f081',
			),
			'fa-usb'                                 => array(
				'label'     => 'Usb',
				'category'  => array( 16 ),
				'font_code' => '\f287',
			),
			'fa-viacoin'                             => array(
				'label'     => 'Viacoin',
				'category'  => array( 16 ),
				'font_code' => '\f237',
			),
			'fa-viadeo'                              => array(
				'label'     => 'Viadeo',
				'category'  => array( 16 ),
				'font_code' => '\f2a9',
			),
			'fa-viadeo-square'                       => array(
				'label'     => 'Viadeo Square',
				'category'  => array( 16 ),
				'font_code' => '\f2aa',
			),
			'fa-vimeo'                               => array(
				'label'     => 'Vimeo',
				'category'  => array( 16 ),
				'font_code' => '\f27d',
			),
			'fa-vimeo-square'                        => array(
				'label'     => 'Vimeo Square',
				'category'  => array( 16 ),
				'font_code' => '\f194',
			),
			'fa-vine'                                => array(
				'label'     => 'Vine',
				'category'  => array( 16 ),
				'font_code' => '\f1ca',
			),
			'fa-vk'                                  => array(
				'label'     => 'Vk',
				'category'  => array( 16 ),
				'font_code' => '\f189',
			),
			'fa-wechat'                              => array(
				'label'     => 'Wechat',
				'category'  => array( 16 ),
				'font_code' => '\f1d7',
			),
			'fa-weibo'                               => array(
				'label'     => 'Weibo',
				'category'  => array( 16 ),
				'font_code' => '\f18a',
			),
			'fa-weixin'                              => array(
				'label'     => 'Weixin',
				'category'  => array( 16 ),
				'font_code' => '\f1d7',
			),
			'fa-whatsapp'                            => array(
				'label'     => 'Whatsapp',
				'category'  => array( 16 ),
				'font_code' => '\f232',
			),
			'fa-wikipedia-w'                         => array(
				'label'     => 'Wikipedia W',
				'category'  => array( 16 ),
				'font_code' => '\f266',
			),
			'fa-windows'                             => array(
				'label'     => 'Windows',
				'category'  => array( 16 ),
				'font_code' => '\f17a',
			),
			'fa-wordpress'                           => array(
				'label'     => 'Wordpress',
				'category'  => array( 16 ),
				'font_code' => '\f19a',
			),
			'fa-wpbeginner'                          => array(
				'label'     => 'Wpbeginner',
				'category'  => array( 16 ),
				'font_code' => '\f297',
			),
			'fa-wpforms'                             => array(
				'label'     => 'Wpforms',
				'category'  => array( 16 ),
				'font_code' => '\f298',
			),
			'fa-xing'                                => array(
				'label'     => 'Xing',
				'category'  => array( 16 ),
				'font_code' => '\f168',
			),
			'fa-xing-square'                         => array(
				'label'     => 'Xing Square',
				'category'  => array( 16 ),
				'font_code' => '\f169',
			),
			'fa-y-combinator'                        => array(
				'label'     => 'Y Combinator',
				'category'  => array( 16 ),
				'font_code' => '\f23b',
			),
			'fa-y-combinator-square'                 => array(
				'label'     => 'Y Combinator Square',
				'category'  => array( 16 ),
				'font_code' => '\f1d4',
			),
			'fa-yahoo'                               => array(
				'label'     => 'Yahoo',
				'category'  => array( 16 ),
				'font_code' => '\f19e',
			),
			'fa-yc'                                  => array(
				'label'     => 'Yc',
				'category'  => array( 16 ),
				'font_code' => '\f23b',
			),
			'fa-yc-square'                           => array(
				'label'     => 'Yc Square',
				'category'  => array( 16 ),
				'font_code' => '\f1d4',
			),
			'fa-yelp'                                => array(
				'label'     => 'Yelp',
				'category'  => array( 16 ),
				'font_code' => '\f1e9',
			),
			'fa-yoast'                               => array(
				'label'     => 'Yoast',
				'category'  => array( 16 ),
				'font_code' => '\f2b1',
			),
			'fa-youtube'                             => array(
				'label'     => 'Youtube',
				'category'  => array( 16 ),
				'font_code' => '\f167',
			),
			'fa-youtube-square'                      => array(
				'label'     => 'Youtube Square',
				'category'  => array( 16 ),
				'font_code' => '\f166',
			),
			'fa-h-square'                            => array(
				'label'     => 'H Square',
				'category'  => array( 17 ),
				'font_code' => '\f0fd',
			),
			'fa-hospital-o'                          => array(
				'label'     => 'Hospital <span class="text-muted">(Outline)</span>',
				'category'  => array( 17 ),
				'font_code' => '\f0f8',
			),
			'fa-medkit'                              => array(
				'label'     => 'Medkit',
				'category'  => array( 17 ),
				'font_code' => '\f0fa',
			),
			'fa-stethoscope'                         => array(
				'label'     => 'Stethoscope',
				'category'  => array( 17 ),
				'font_code' => '\f0f1',
			),
			'fa-user-md'                             => array(
				'label'     => 'User Md',
				'category'  => array( 17 ),
				'font_code' => '\f0f0',
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

			if ( isset( $icon['category'] ) && bf_count( $icon['category'] ) ) {

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

		$classes = apply_filters( 'better_fontawesome_icons_classes', $classes );

		if ( ! isset( $this->icons[ $icon_key ] ) ) {
			return '';
		}

		return '<i class="bf-icon fa ' . $icon_key . ' ' . $classes . '"></i>';

	}
}
