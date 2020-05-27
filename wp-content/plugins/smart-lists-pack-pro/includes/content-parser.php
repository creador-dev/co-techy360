<?php
/***
 *   _____                      _     _     _     _        ______          _
 *  /  ___|                    | |   | |   (_)   | |       | ___ \        | |
 *  \ `--. _ __ ___   __ _ _ __| |_  | |    _ ___| |_ ___  | |_/ /_ _  ___| | __
 *   `--. \ '_ ` _ \ / _` | '__| __| | |   | / __| __/ __| |  __/ _` |/ __| |/ /
 *  /\__/ / | | | | | (_| | |  | |_  | |___| \__ \ |_\__ \ | | | (_| | (__|   <
 *  \____/|_| |_| |_|\__,_|_|   \__| \_____/_|___/\__|___/ \_|  \__,_|\___|_|\_\
 *
 *
 * \--> BetterStudio, 2017 <--/
 *
 * Thanks for using our plugin!
 *
 * Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 */


/**
 * Smart list content parser
 *
 * @copyright Copyright (c) 2017, BetterStudio.com
 * @package   Smart Lists Pack
 * @author    BetterStudio
 * @since     1.0.0
 */
class BS_SLP_Content_Parser {

	/**
	 * Smart list configuration
	 *
	 * @var array
	 *
	 * @param string $title_tag Heading tag name
	 */
	protected $config = array(
		'title_tag' => 'h3',
	);


	/**
	 * @param array $config
	 */
	public function __construct( $config ) {

		$this->set_config( $config );
	}


	/**
	 * Set configuration array
	 *
	 * @see $config for more documentation
	 *
	 * @param array $config
	 *
	 * @return bool true on success or false on failure.
	 */
	public function set_config( $config ) {

		if ( is_array( $config ) && $config ) {
			$this->config = $config;
		}

		return TRUE;
	}


	/**
	 * Get configuration array
	 *
	 * @since array
	 */
	public function get_config() {

		return $this->config;
	}


	/**
	 * Look for smart list structure in given html
	 *
	 * @param string $html
	 *
	 * @return array none empty array on success
	 */
	public function parse_html( $html ) {

		$result = array(
			'items' => array(),
		);

		$pattern = $this->pattern();

		$title_tag = $this->config['title_tag'];

		//
		// Extract before
		//
		{
			$html = explode( '<span class="bs-smart-list-start"></span>', $html );

			if ( ! empty( $html[1] ) ) {
				$result['before'] = $html[0];
				$html             = $html[1];
			} else {
				$html = $html[0];
			}
		}

		//
		// Extract after
		//
		{
			$html = explode( '<span class="bs-smart-list-end"></span>', $html );

			if ( ! empty( $html[1] ) ) {
				$result['after'] = $html[1];
			}

			$html = $html[0];
		}


		if ( preg_match_all( $pattern, $html . "<$title_tag>", $matches ) ) {

			$total_items = bf_count( $matches[0] );

			for ( $i = 0; $i < $total_items; $i ++ ) {

				$image_info = $this->parse_image( $matches[3][ $i ] );

				$content_raw = $this->trim( $matches[3][ $i ] );
				$content     = $content_raw;

				if ( ! empty( $image_info['el'] ) ) {
					$content = str_replace( $image_info['el'], '', $content );
				}

				$item = array(
					'title'         => $matches[2][ $i ],
					'content_raw'   => $content_raw,
					'content'       => trim( $content ),
					//
					'image_id'      => $image_info['id'],
					'image_src'     => $image_info['src'],
					'image_link'    => $image_info['link'],
					'image_caption' => $image_info['caption'],
					'image_alt'     => $image_info['alt'],
				);

				array_push( $result['items'], $item );
			}


			// There is content before smart list
			// Start break not used or content after start break!
			if ( ! empty( $matches[1][0] ) ) {
				if ( isset( $result['before'] ) ) {
					$result['before'] .= $matches[1][0];
				} else {
					$result['before'] = $matches[1][0];
				}
			}
		}

		return $result;
	}


	/**
	 * List item content pattern
	 *
	 * @return string
	 */
	public function pattern() {

		$pattern = "'
		
			( .*? )                                     # Content Before title tag (smart list)
		
			< \s* %title_tag% .*? >  					# Find open title tag
				( .*? )  	   							# Capture inner text
			< \s* / \s* %title_tag% .*? > 				# Find close title tag element
			
		
			 \s* (.*?)	 \s* 					        # Capture trimmed inner html 
			 (?= < \s* %title_tag% .*? >)				# until the next open tag
			
			'isx";


		return self::compile_pattern( $pattern );
	}


	/**
	 * Replace placeholders in pattern and prepare it for usage
	 *
	 * @param string $pattern
	 *
	 * @return string
	 */
	public function compile_pattern( $pattern ) {

		return str_replace(

			array(
				'%title_tag%',
				'%capture_quote%',
			),
			array(
				$this->config['title_tag'],
				'([\"\\\'])?',
			),
			$pattern
		);
	}


	/**
	 * Get value of the specific attribute
	 *
	 * @param string $string all attributes  of a html element
	 * @param string $attr   attribute key
	 * @param bool   $default
	 *
	 * @return bool|string attribute value on success or false otherwise.
	 */
	public function attr( $string, $attr, $default = FALSE ) {

		$pattern = '/
	
			%attr% \s* = \s* 					# find attribute
			([\"\'])?							# find single or double quote
			
			(?(1) (.*?)\\1 | ([^\s\>]+))		# if quote found, match up to next matching

		/isx';

		$pattern = str_replace( '%attr%', $attr, $pattern );


		if ( preg_match( $pattern, $string, $match ) ) {
			return $match[2];
		}

		return $default;
	}


	/**
	 * Determine if given id is for featured post image
	 *
	 * @param int|string $id
	 *
	 * @return bool
	 */
	public function is_valid_image_id( $id ) {

		$post = get_post( intval( $id ) );

		if ( $post && ! is_wp_error( $post ) ) {

			return $post->post_type === 'attachment' &&
			       substr( $post->post_mime_type, 0, 5 ) === 'image';
		}

		return FALSE;
	}


	/**
	 * Look for image in given content and slice important parts
	 *
	 * @param string $content
	 *
	 * @return array {
	 *
	 * @type string  $el sound image tag
	 * @type string  $src
	 * @type string  $link
	 * @type string  $id
	 * }
	 */
	public function parse_image( $content ) {

		$result = array(
			'caption'        => '',
			'src'            => '',
			'link'           => '',
			'alt'            => '',
			'id'             => '',
			'el'             => '',
			'valid_image_id' => FALSE,
		);

		$pattern = "'
			
			(?:                                     # Find figure tag -> Optional (HTML5)
				< \s*figure.*? >
			)?
			
				(?:                                 # Find link href. -> Optional
					<\s* a \s+  					# a open
					href\s*=\s* 					# href attribute
					%capture_quote%  				# single or double quote
					
					(?(1) (.*?)\\1 | ([^\s\>]+))	# Capture attribute value
					
					.*?
				)?
				
					<\s* img \s+ 					# img tag
						(.*?)						# capture any attribute before class 
						class\s*=\s* 				# href attribute
				
						.*?  \b  wp\-image\-(\d+) \b .*? 
				
						([^\>]+)>					# capture any attribute after class
					
				(?: # Find link close tag
					< \s* / \s* a .*? > 		    # Find link close tag
				)?
				
				
				(?:                                 # Find figcaption tag -> Optional (HTML5)
				< \s*figcaption .*? >  				
					( .*? )  	   					# Capture inner text
				< \s* / \s* figcaption .*? >
				)?
				
				(?:                                 # Find figure close tag -> Optional (HTML5)
					< \s* / \s* figure .*? >
				)?
		'isx";


		$pattern = $this->compile_pattern( $pattern );

		preg_match( $pattern, $content, $match );

		if ( ! empty( $match[0] ) ) {

			$attr = $match[4] . $match[6];

			$result['el']      = $match[0];
			$result['src']     = $this->attr( $attr, 'src', '' );
			$result['alt']     = $this->attr( $attr, 'alt', '' );
			$result['link']    = $match[2];
			$result['id']      = $match[5];
			$result['caption'] = isset( $match[7] ) ? $match[7] : '';
		}

		return $result;
	}


	/**
	 * Trim html string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function trim( $string ) {

		$string = preg_replace( '/(&nbsp;)+$/', '', $string );

		return trim( $string );
	}
}

