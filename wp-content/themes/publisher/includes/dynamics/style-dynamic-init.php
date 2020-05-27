<?php
/***
 *
 * Global CSS used for Gutenberg & TinyMCE
 *
 */

$post_id                     = isset( $_GET['publisher-theme-editor-shortcodes'] ) ? $_GET['publisher-theme-editor-shortcodes'] : '';
$layout_2column              = BF_Editor_Shortcodes::get_config( 'layout-2-col' );
$layout_3column              = BF_Editor_Shortcodes::get_config( 'layout-3-col' );
$output                      = '';
$fonts                       = array();
$editor                      = '';
$fonts['post-title']         = publisher_get_option( 'typo_post_heading' );
$fonts['post-title']['size'] = publisher_get_option( 'typo_post_tp1_heading' );
$fonts['heading']            = publisher_get_option( 'typo_heading' );
$fonts['content']            = publisher_get_option( 'typo_entry_content' );

if ( ! empty( $_GET['editor'] ) && $_GET['editor'] == 'gutenberg' ) {
	$editor = 'gutenberg';
} else {
	$editor = 'tinymce';
}


//
// The editor specific style (TinyMCE or Gutenberg)
//
{
	$output = include "style-$editor.php";
}


//
// Render fonts
//
{

	//
	// Fonts fix regular size (replace by 400)
	//
	{
		$_check = array(
			'regular' => 400
		);

		foreach ( $fonts as $k => $v ) {
			if ( ! empty( $v['variant'] ) && isset( $_check[ $v['variant'] ] ) ) {
				$fonts[ $k ]['variant'] = $_check[ $v['variant'] ];
			}
		}
	}

	//
	// Initialize custom css generator
	//
	Better_Framework()->factory( 'custom-css' );
	$css_generator = new BF_Custom_CSS();

	foreach ( $fonts as $_font ) {
		$css_generator->set_fonts( @$_font['family'], @$_font['variant'], @$_font['subset'] );
	}

	$render = $css_generator->render_fonts();

	foreach ( (array) $render as $url ) {
		$output .= '@import url("' . $url . '");' . "\n\n";
	}

	$render = null;
}


//
// Replace Dynamic Constants
//
{
	$replaces = array(
		'inherit /* layout-2column-content */'         => $layout_2column['content'] . 'px',
		'1px /* layout-2column-content */'             => $layout_2column['content'] . 'px',
		'inherit /* layout-2column-width */'           => $layout_2column['width'] . 'px',
		//
		'inherit /* layout-3column-content */'         => $layout_3column['content'] . 'px',
		'inherit /* layout-3column-width */'           => $layout_3column['width'] . 'px',
		'1px /* layout-3column-content */'             => $layout_3column['content'] . 'px',
		//
		'1px /* font-size-h1 */'                       => publisher_get_option( 'typo_heading_h1' ),
		'1px /* font-size-h2 */'                       => publisher_get_option( 'typo_heading_h2' ),
		'1px /* font-size-h3 */'                       => publisher_get_option( 'typo_heading_h3' ),
		'1px /* font-size-h4 */'                       => publisher_get_option( 'typo_heading_h4' ),
		'1px /* font-size-h5 */'                       => publisher_get_option( 'typo_heading_h5' ),
		'1px /* font-size-h6 */'                       => publisher_get_option( 'typo_heading_h6' ),
		//
		'font-heading-family'                          => $fonts['heading']['family'],
		'inherit /* font-heading-variant */'           => $fonts['heading']['variant'],
		'inherit /* font-heading-transform */'         => $fonts['heading']['transform'],
		'inherit /* font-heading-letter-spacing */'    => $fonts['heading']['letter-spacing'],
		//
		'font-post-title-family'                       => $fonts['post-title']['family'],
		'inherit /* font-post-title-variant */'        => $fonts['post-title']['variant'],
		'inherit /* font-post-title-size */'           => $fonts['post-title']['size'],
		'inherit /* font-post-title-transform */'      => $fonts['post-title']['transform'],
		'inherit /* font-post-title-letter-spacing */' => $fonts['post-title']['letter-spacing'],
		//
		'font-content-family'                          => $fonts['content']['family'],
		'inherit /* font-content-variant */'           => $fonts['content']['variant'],
		'inherit /* font-content-size */'              => $fonts['content']['size'] . 'px',
		'inherit /* font-content-transform */'         => $fonts['content']['transform'],
		'inherit /* font-content-letter-spacing */'    => $fonts['content']['letter-spacing'],
		//
		'inherit /* highlight-color */'                => publisher_get_option( 'theme_color' ),
		//
		'inherit /* content-a-color */'                => publisher_get_option( 'content_a_color' ) ? publisher_get_option( 'content_a_color' ) : '',
		'inherit /* content-a-color-hover */'          => publisher_get_option( 'content_a_hover_color' ) ? publisher_get_option( 'content_a_hover_color' ) : '',
	);


	foreach ( $replaces as $k => $v ) {
		$output = str_replace( $k, $v, $output );
	}
}

// Print final CSS
echo $output . "\n";
