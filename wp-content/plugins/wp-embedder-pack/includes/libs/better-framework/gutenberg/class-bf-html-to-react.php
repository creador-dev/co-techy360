<?php


class BF_HTML_To_React {

	protected $index = 0;

	/**
	 * @param string $markup
	 *
	 * @return array
	 */
	public function transform( $markup ) {

		$prev = libxml_use_internal_errors( true );

		$doc = new DOMDocument( null, 'UTF-8' );

		$doc->loadXml( $markup, null );

		$container = array();

		$this->parse_html( $container, $doc->childNodes );

		libxml_use_internal_errors( $prev );

		return $container;
	}


	protected function parse_html( &$container, DOMNodeList $nodes ) {

		for ( $i = 0; $i < $nodes->length; $i ++ ) {

			$item = $nodes->item( $i );

			if ( ! isset( $item->tagName ) ) {

				if ( trim( $item->nodeValue ) === '' ) {
					continue;
				}
			}

			$children = array();
			$id       = 'tag_' . ++ $this->index;

			$args = $this->get_node_attributes( $item );

			if ( isset( $args['key'] ) ) {

				$key = $args['key'];

				unset( $args['key'] );

			} else {

				$key = $id;
			}

			if ( $this->node_only_contains_text( $item ) ) {
				$args['innerText'] = $item->nodeValue;
			}

			if ( isset( $item->tagName ) ) {

				$tag_name = $item->tagName;

			} else {

				$tag_name          = 'p';
				$args['innerText'] = $item->nodeValue;
			}

			$container[] = array(
				'id'        => $key,
				'key'       => $key,
				'args'      => $args,
				'children'  => $children,
				'component' => self::is_html_tag( $tag_name ) ? 'tag_' . $tag_name : $tag_name,
			);

			if ( ! empty( $item->childNodes->length ) && ! $this->node_only_contains_text( $item ) ) {

				end( $container );
				$key = key( $container );


				$this->parse_html( $container[ $key ]['children'], $item->childNodes );
			}
		}

	}


	protected function node_only_contains_text( $node ) {

		return isset( $node->childNodes ) && $node->childNodes->length === 1 && $this->is_text_node( $node->childNodes->item( 0 ) );
	}

	protected function is_text_node( $node ) {

		return $node instanceof DOMText;
	}

	/**
	 *
	 * Get attributes of the element
	 *
	 * @param DOMElement $node
	 *
	 * @since 1.0.0
	 *
	 * @return array key-value paired attributes
	 */
	public function get_node_attributes( $node ) {

		$attributes = array();

		if ( empty( $node->attributes ) ) {
			return $attributes;
		}

		foreach ( $node->attributes as $attribute ) {
			$attributes[ $attribute->nodeName ] = $attribute->nodeValue;
		}

		return $attributes;
	}

	/**
	 * @param string $tag
	 *
	 * @return bool
	 */
	public static function is_html_tag( $tag ) {

		static $tags = array(
			# HTML Tags
			'button'     => '',
			'a'          => '',
			'abbr'       => '',
			'acronym'    => '',
			'address'    => '',
			'applet'     => '',
			'area'       => '',
			'article'    => '',
			'aside'      => '',
			'audio'      => '',
			'b'          => '',
			'base'       => '',
			'basefont'   => '',
			'bdi'        => '',
			'bdo'        => '',
			'big'        => '',
			'blockquote' => '',
			'body'       => '',
			'br'         => '',
			'canvas'     => '',
			'caption'    => '',
			'center'     => '',
			'cite'       => '',
			'code'       => '',
			'col'        => '',
			'colgroup'   => '',
			'datalist'   => '',
			'dd'         => '',
			'del'        => '',
			'details'    => '',
			'dfn'        => '',
			'dialog'     => '',
			'dir'        => '',
			'div'        => '',
			'dl'         => '',
			'dt'         => '',
			'em'         => '',
			'embed'      => '',
			'fieldset'   => '',
			'figcaption' => '',
			'figure'     => '',
			'font'       => '',
			'footer'     => '',
			'form'       => '',
			'frame'      => '',
			'frameset'   => '',
			'h1'         => '',
			'h2'         => '',
			'h3'         => '',
			'h4'         => '',
			'h5'         => '',
			'h6'         => '',
			'head'       => '',
			'header'     => '',
			'hr'         => '',
			'html'       => '',
			'i'          => '',
			'iframe'     => '',
			'img'        => '',
			'input'      => '',
			'ins'        => '',
			'kbd'        => '',
			'keygen'     => '',
			'label'      => '',
			'legend'     => '',
			'li'         => '',
			'link'       => '',
			'main'       => '',
			'map'        => '',
			'mark'       => '',
			'menu'       => '',
			'menuitem'   => '',
			'meta'       => '',
			'meter'      => '',
			'nav'        => '',
			'noframes'   => '',
			'noscript'   => '',
			'object'     => '',
			'ol'         => '',
			'optgroup'   => '',
			'option'     => '',
			'output'     => '',
			'p'          => '',
			'param'      => '',
			'picture'    => '',
			'pre'        => '',
			'progress'   => '',
			'q'          => '',
			'rp'         => '',
			'rt'         => '',
			'ruby'       => '',
			's'          => '',
			'samp'       => '',
			'script'     => '',
			'section'    => '',
			'select'     => '',
			'small'      => '',
			'source'     => '',
			'span'       => '',
			'strike'     => '',
			'strong'     => '',
			'style'      => '',
			'sub'        => '',
			'summary'    => '',
			'sup'        => '',
			'table'      => '',
			'tbody'      => '',
			'td'         => '',
			'textarea'   => '',
			'tfoot'      => '',
			'th'         => '',
			'thead'      => '',
			'time'       => '',
			'title'      => '',
			'tr'         => '',
			'track'      => '',
			'tt'         => '',
			'u'          => '',
			'ul'         => '',
			'var'        => '',
			'video'      => '',
			'wbr'        => '',
		);

		return isset( $tags[ $tag ] );
	}
}
