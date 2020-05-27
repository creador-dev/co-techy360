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


/**
 * BF Field Generator
 */
class BF_HTML_Generator {


	/**
	 * Holds All Data
	 *
	 * @since  1.0
	 * @access private
	 * @var array
	 */
	private $options = array(
		'attrs' => array(),
		'sub'   => array()
	);


	/**
	 * @var $allowed_tags
	 *
	 */
	private $allowed_tags = array(
		'span',
		'p',
		'div',
		'img',
		'br',
		'a',
		'table',
		'tbody',
		'link',
		'script',
		'meta',
		'form',
		'input',
		'select',
		'ul',
		'ol',
		'h1',
		'h2',
		'h3',
		'h4',
		'h5',
		'h6',
		'strong',
		'textarea',
		'label',
		'button',
		'li',
		'optgroup'
	);


	/**
	 * @var $self_closing_tags
	 *
	 */
	private $self_closing_tags = array(
		'img',
		'br',
		'link',
		'meta',
		'input'
	);


	/**
	 * @var $self_closing_tags
	 *
	 */
	private $form_methods = array(
		'post',
		'get'
	);


	/**
	 * Add New Element
	 *
	 * Return $this for method chaining
	 *
	 * @param string $tag HTML tag name
	 *
	 * @return BF_HTML_Generator
	 */
	public function add( $tag ) {

		if ( ! empty( $this->options['tag'] ) ) {
			$this->options['sub'][] = (string) $tag;

			return $this;
		}

		$this->options['tag'] = $tag;

		return $this;
	}


	/**
	 * Add The Element Content
	 *
	 * Return $this for method chaining
	 *
	 * @param string $val User defined value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _text_( $val ) {

		$this->options['sub'][] = $val;

		return $this;

	}


	/**
	 * Element type attribute
	 *
	 * Return $this for method chaining
	 *
	 * @param string $type Attribute value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _type_( $type ) {

		$this->options['attrs']['type'] = $type;

		return $this;

	}


	/**
	 * Element name attribute
	 *
	 * Return $this for method chaining
	 *
	 * @param string $type Attribute value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _name_( $type ) {

		$this->options['attrs']['name'] = $type;

		return $this;

	}


	/**
	 * Makes CSS Inline Styles For Element
	 *
	 * Return $this for method chaining
	 *
	 * @return BF_HTML_Generator
	 */
	public function _css_() {

		$args     = func_get_args();
		$args_num = func_num_args();
		$css      = '';

		if ( $args_num === 1 ) {
			$css .= ltrim( rtrim( $args[0], ';' ), ';' );
		} elseif ( $args_num === 2 ) {
			$css .= "{$args['0']}:{$args['1']};";
		}

		if ( empty( $this->options['attrs']['style'] ) ) {
			$this->options['attrs']['style'] = '';
		}

		$this->options['attrs']['style'] .= ";{$css};";
		$this->options['attrs']['style'] = preg_replace( '/(^;)|(;$)|(;{,1})/', '', $this->options['attrs']['style'] );

		return $this;
	}


	/**
	 * Add New Attribute To Element
	 *
	 * Return $this for method chaining
	 *
	 * @param string $attr The name of attr
	 * @param string $val  Value if value
	 *
	 * @return BF_HTML_Generator
	 */
	public function attr( $attr, $val ) {

		$this->options['attrs'][ $attr ] = $val;

		return $this;

	}


	/**
	 * Set Action Attribute For Element
	 *
	 * @param string $val Action Value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _action_( $val ) {

		$this->options['attrs']['action'] = $val;

		return $this;

	}


	/**
	 * Set Value Attribute For Element
	 *
	 * @return BF_HTML_Generator
	 */
	public function _val_() {

		$params = func_get_args();

		return call_user_func_array( array( $this, '_value_' ), $params );

	}


	/**
	 * Set Value Attribute For Element
	 *
	 * @param string $val Value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _value_( $val ) {

		if ( $this->options['tag'] == 'textarea' ) {
			$this->options['sub'][] = $val;
		} else {
			$this->options['attrs']['value'] = $val;
		}

		return $this;

	}


	/**
	 * Set ID Attribute For Element
	 *
	 * @param string $val Value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _id_( $val ) {

		$this->options['attrs']['id'] = $val;

		return $this;

	}


	/**
	 * Set Class Attribute For Element
	 *
	 * @param string $val Value
	 *
	 * @return BF_HTML_Generator
	 */
	public function _class_( $val ) {

		$this->options['attrs']['class'][] = $val;

		return $this;

	}


	/**
	 * Set Element SRC Attribute
	 *
	 * @param string $src image src
	 *
	 * @return BF_HTML_Generator
	 */
	public function _src_( $src ) {

		$this->options['attrs']['src'] = $src;

		return $this;

	}


	/**
	 * Set place holder attr
	 *
	 * @param string $val image src
	 *
	 * @return BF_HTML_Generator
	 */
	public function _placeholder_( $val ) {

		$this->options['attrs']['placeholder'] = $val;

		return $this;

	}


	/**
	 * Set title attribute
	 *
	 * @param string $val title
	 *
	 * @return BF_HTML_Generator
	 */
	public function _title_( $val ) {

		$this->options['attrs']['title'] = $val;

		return $this;

	}


	/**
	 * Set alt attribute
	 *
	 * @param string $val alt
	 *
	 * @return BF_HTML_Generator
	 */
	public function _alt_( $val ) {

		$this->options['attrs']['alt'] = $val;

		return $this;

	}


	/**
	 * Set Element Data Attribute
	 *
	 * @param string $name  name of data attr
	 * @param string $value value of data attr
	 *
	 * @return BF_HTML_Generator
	 */
	public function _data_( $name, $value ) {

		$this->options['attrs'][ 'data-' . $name ] = $value;

		return $this;

	}


	/**
	 * Set Method Attribute For Element
	 *
	 * @param string $method Action Value
	 *
	 * @throws Exception if method is not valid
	 *
	 * @return BF_HTML_Generator
	 */
	public function _method_( $method ) {

		// Check for correct form method
		if ( ! in_array( strtolower( $method ), $this->form_methods ) ) {
			throw new Exception( 'Form method should be either post or get.' );
		}

		$this->options['attrs']['method'] = $method;

		return $this;

	}


	public function __call( $name, $arguments ) {

		if ( method_exists( $this, "_{$name}_" ) ) {
			call_user_func_array( array( $this, "_{$name}_" ), $arguments );

			return $this;
		} else {
			throw new Exception( 'Method is inaccessible in object context.' );
		}

	}


	/**
	 * Generate String Of Element Attributes
	 *
	 * @return String
	 */
	public function generate_attrs_string() {

		$attrs  = (array) $this->options['attrs'];
		$output = ' ';
		$i      = 0;

		foreach ( $attrs as $name => $val ) {
			$i ++;
			if ( $name == 'class' ) {
				$output .= $name . '="' . implode( ' ', $val ) . '"';
			} else {
				$output .= $name . '="' . $val . '"';
			}
			if ( $i != bf_count( $attrs ) ) {
				$output .= ' ';
			}
		}

		return $output;

	}


	/**
	 * Display HTML
	 *
	 * @throws Exception if tag is not defined
	 * @since 1.0
	 * @return string
	 */
	public function display() {

		// Stop process if tag name is not defined
		if ( empty( $this->options['tag'] ) ) {
			throw new Exception( 'Tag is not defined.' );
		}

		$tag = $this->options['tag'];

		// Stop process if the tag is not allowed
		if ( ! in_array( $this->options['tag'], $this->allowed_tags ) ) {
			throw new Exception( 'Tag Name is not allowed.' );
		}

		$attrs_string = $this->generate_attrs_string();
		$output       = "<{$tag}{$attrs_string}";
		$output       .= in_array( $tag, $this->self_closing_tags ) ? ' />' : ' >';

		if ( bf_count( $this->options['sub'] ) > 0 ) {
			foreach ( $this->options['sub'] as $sub ) {
				$output .= $sub;
			}
		}

		if ( ! in_array( $tag, $this->self_closing_tags ) ) {
			$output .= "</{$tag}>";
		}

		return $output;

	}


	/**
	 * toString
	 *
	 * Displaying the HTML if object is echoing
	 *
	 * @since 1.0
	 * @return string
	 */
	public function __toString() {

		try {
			return $this->display();
		} catch( Exception $e ) {
			die( $e->getMessage() );
		}

	}

} // BF_HTML_Generator