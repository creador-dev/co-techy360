<?php

/**
 * Class BF_Htaccess_Editor
 *
 * @since 3.9.1
 */


/**
 * Class BF_Htaccess_Editor
 *
 * @package core/utilites/IO
 *
 * @since   3.9.1
 */
final class BF_Htaccess_Editor {

	const VERSION = '1.0.0';

	/**
	 * @var array
	 *
	 * @since 3.9.1
	 */
	protected $pointers = array();


	/**
	 * @var string
	 *
	 * @since 3.9.1
	 */
	protected $buffer;


	/**
	 * @var string
	 *
	 * @since 3.9.1
	 */
	protected $content;


	/**
	 * Initialize props
	 *
	 * @param string $content
	 * @param string $head_pointer
	 * @param string $tail_pointer
	 */
	public function init( $content, $head_pointer, $tail_pointer ) {

		$this->content  = $content;
		$this->pointers = array( $head_pointer, $tail_pointer );

		///
		/// Read content between pointers
		///

		if ( preg_match( $this->pointer_pattern(), $this->content, $match ) ) {

			$this->buffer = $match[2];

		} else {

			$this->buffer  = '';
			$this->content = sprintf( "%s\n%s\n\n%s\n", $this->content, $this->pointers[0], $this->pointers[1] );
		}
	}


	/**
	 * Remove everything between pointers.
	 *
	 * @since 3.9.1
	 */
	public function remove_context() {

		$this->content = preg_replace( $this->pointer_pattern(), '', $this->content );
	}


	/**
	 * Look for custom string.
	 *
	 * @param string $string
	 * @param bool   $limit_context search only in pointed context or whole content
	 *
	 * @since 3.9.1
	 * @return bool true whether found or false on failure.
	 */
	public function exists( $string, $limit_context = true ) {

		$regex = preg_quote( $string, '/' );
		$regex = preg_replace( '/\s+/', '\s+', trim( $regex ) );
		$regex = '\s*' . $regex . '(?:\b|\n+)';

		return (bool) preg_match( "/$regex/i", $limit_context ? $this->buffer : $this->content );
	}


	/**
	 * @param string $string
	 *
	 * @since 1.0.0
	 */
	public function remove( $string ) {

		$config = preg_quote( $string, '/' );
		$config = preg_replace( '/\s+/', '\s+', $config );
		$regex  = '\b' . $config . '(?:\b|\n+)';

		$this->buffer = preg_replace( "/$regex/i", '', $this->buffer );
	}


	/**
	 * @param string $string
	 *
	 * @since 3.9.1
	 */
	public function append( $string ) {

		$this->buffer .= "\n$string";
	}


	/**
	 * Wrap string between IfModule mod_rewrite condition.
	 *
	 * @param string $string
	 */
	public function append_inside_condition( $string ) {


		if ( preg_match( '/(\<\s*IfModule\s+mod_rewrite.c\s*\>.*?)\s*(\<\s*\/\s*IfModule\s*\>)(.*?)/is', $this->buffer, $matches ) ) {

			$this->buffer = $matches[1] . "\n$string\n" . $matches[2];

		} else {

			$this->buffer .= "\n<IfModule mod_rewrite.c>\n$string\n</IfModule>";
		}
	}


	/**
	 * Apply changes to htaccess contents.
	 *
	 * @since 3.9.1
	 * @return string changed string on success.
	 */
	public function apply() {

		$replacement = sprintf( "\$1\n %s \n\$3", $this->buffer );

		$this->content = preg_replace( $this->pointer_pattern(), $replacement, $this->content );

		return $this->content;
	}


	/**
	 * @param string $string
	 * @param string $regex_quote
	 *
	 * @since 3.9.1
	 * @return string
	 */
	public static function normalize_string( $string, $regex_quote = '/' ) {

		if ( $regex_quote ) {
			$string = preg_quote( $string, $regex_quote );
		}

		$string = preg_replace( '/\s+/', '\s+', $string );

		return $string;
	}


	/**
	 * @access private
	 *
	 * @since  3.9.1
	 * @return string
	 */
	protected function pointer_pattern() {

		$pattern = sprintf( '(%s)', self::normalize_string( $this->pointers[0] ) );
		$pattern .= '\s*(.*?)\s*';
		$pattern .= sprintf( '(%s)', self::normalize_string( $this->pointers[1] ) );

		return "/$pattern/si";
	}
}
