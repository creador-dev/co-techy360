<?php


/**
 * => Post Options
 */
$fields['_post_options']            = array(
	'name' => __( 'Post', 'publisher' ),
	'id'   => '_post_options',
	'type' => 'tab',
	'icon' => 'bsai-page-text',
);
$fields['bs_featured_image_credit'] = array(
	'name'       => __( 'Featured image credit', 'publisher' ),
	'id'         => 'bs_featured_image_credit',
	'desc'       => __( 'Simple note about featured image credit that will be shown in bottom of featured image.', 'publisher' ),
	'input-desc' => __( 'You can use HTML.', 'publisher' ),
	'type'       => 'editor',
	'lang'       => 'html',
	'min-lines'  => 4,
	'max-lines'  => 6,
);
$fields['_featured_embed_code']     = array(
	'name' => __( 'Featured Video/Audio Code', 'publisher' ),
	'id'   => '_featured_embed_code',
	'desc' => __( 'Paste YouTube, Vimeo or self hosted video URL then player automatically will be generated.', 'publisher' ),
	'type' => 'textarea',
);

$fields['page_layout'] = array(
	'name'             => __( 'Page Layout', 'publisher' ),
	'id'               => 'page_layout',
	'type'             => 'select_popup',
	'section_class'    => 'style-floated-left bordered affect-editor-on-change',
	'desc'             => __( 'Override page layout for this post.', 'publisher' ),
	'deferred-options' => array(
		'callback' => 'publisher_layout_option_list',
		'args'     => array(
			true,
		),
	),
	'texts'            => array(
		'modal_title'   => __( 'Choose Page Layout', 'publisher' ),
		'modal_current' => __( 'Current', 'publisher' ),
		'modal_button'  => __( 'Select', 'publisher' ),
		'box_pre_title' => __( 'Selected layout', 'publisher' ),
		'box_button'    => __( 'Change layout', 'publisher' ),
	),
	'column_class'     => 'four-column',
);

// Page template
if ( ! is_admin() || bf_get_admin_current_post_type() !== 'page' || publisher_is_valid_cpt( 'post' ) ) {
	$fields['post_template']        = array(
		'name'             => __( 'Post template', 'publisher' ),
		'id'               => 'post_template',
		'type'             => 'select_popup',
		'section_class'    => 'style-floated-left bordered',
		'desc'             => __( 'Select default template for post.', 'publisher' ),
		'deferred-options' => array(
			'callback' => 'publisher_get_single_template_option',
			'args'     => array(
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Post Template', 'publisher' ),
			'modal_current' => __( 'Current', 'publisher' ),
			'modal_button'  => __( 'Select', 'publisher' ),
			'box_pre_title' => __( 'Selected Template', 'publisher' ),
			'box_button'    => __( 'Change Template', 'publisher' ),
		),
		'column_class'     => 'three-column',
	);
	$fields['_bs_primary_category'] = array(
		'name'       => __( 'Primary Category', 'publisher' ),
		'desc'       => __( 'Select the main category for post to shown in blocks at first.', 'publisher' ),
		'input-desc' => __( 'When you have multiple categories for a post, auto detection chooses one in alphabetical order. These used for show an label above image in listings and breadcrumb.', 'publisher' ),
		'id'         => '_bs_primary_category',
		'type'       => 'select',
		'options'    => array(
			'auto-detect' => __( '-- Auto Detect --', 'publisher' ),
			array(
				'label'   => __( 'Categories', 'publisher' ),
				'options' => array( 'category_walker' => 'category_walker' ),
			)
		)
	);
	$fields['_bs_source_field']     = array(
		'name'            => __( 'Source', 'publisher' ),
		'id'              => 'publisher_cb_blocks_source_field',
		'type'            => 'custom',
		'container_class' => 'source-field',
		'input_callback'  => array(
			'callback' => 'publisher_cb_blocks_source_field',
			'args'     => array(
				array(
					'field' => 'source',
				)
			),
		),
		'desc'            => __( 'This links will appear at the end of the article in the "Source" section.', 'publisher' ),
	);
	$fields['_bs_via_field']        = array(
		'name'            => __( 'Via', 'publisher' ),
		'id'              => 'publisher_cb_blocks_source_field',
		'type'            => 'custom',
		'container_class' => 'source-field',
		'input_callback'  => array(
			'callback' => 'publisher_cb_blocks_source_field',
			'args'     => array(
				array(
					'field' => 'via',
				)
			),
		),
		'desc'            => __( 'This links will appear at the end of the article in the "Via" section.', 'publisher' ),
	);
	$fields['single_excerpt_type']  = array(
		'name'    => __( 'Show Post Excerpt in Single?', 'publisher' ),
		'id'      => 'single_excerpt_type',
		'desc'    => __( 'You can show/hide/override post excerpt in single page with this field.', 'publisher' ),
		'type'    => 'select',
		'options' => array(
			'default'        => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'hide'           => __( 'Hide', 'publisher' ),
			'after-title'    => __( 'After Title', 'publisher' ),
			'before-content' => __( 'Before Post Content', 'publisher' ),
		),
	);
}

$fields['post_comments'] = array(
	'name'    => __( 'Comments', 'publisher' ),
	'id'      => 'post_comments',
	'desc'    => __( 'Select to show or hide comments in bottom of post content.', 'publisher' ),
	'type'    => 'select',
	'options' => array(
		'default'        => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
		'show-simple'    => __( 'Show, Normal Comments', 'publisher' ),
		'show-ajaxified' => __( 'Ajax - Show Comments Button', 'publisher' ),
		'hide'           => __( 'Hide', 'publisher' ),
	),
);

$fields['post_breadcrumb'] = array(
	'name'    => __( 'Breadcrumb', 'publisher' ),
	'id'      => 'post_breadcrumb',
	'desc'    => __( 'Select to show or hide breadcrumb..', 'publisher' ),
	'type'    => 'select',
	'options' => array(
		'default' => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
		'show'    => __( 'Show', 'publisher' ),
		'hide'    => __( 'Hide', 'publisher' ),
	),
);

// page fields
if ( ! is_admin() || bf_get_admin_current_post_type() !== 'post' ) {

	$fields['_hide_title']                 = array(
		'name'      => __( 'Hide Page Title?', 'publisher' ),
		'id'        => '_hide_title',
		'type'      => 'switch',
		'on-label'  => __( 'Yes', 'publisher' ),
		'off-label' => __( 'No', 'publisher' ),
		'desc'      => __( 'Enable this for hiding page title', 'publisher' ),
	);
	$fields['_page_simple_in_pagebuilder'] = array(
		'name'    => __( 'Hide Page Title and Footer When Visual Composer Used', 'publisher' ),
		'id'      => '_page_simple_in_pagebuilder',
		'desc'    => __( 'By default theme removes page title and footer of page (includes comments section) when you have used page builder in content of that but you can change it with this option.', 'publisher' ),
		'type'    => 'select',
		'options' => array(
			'default' => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'hide'    => __( 'Hide', 'publisher' ),
			'show'    => __( 'Show, Title and Footer', 'publisher' ),
		),
	);
}

// Post fields
if ( ! is_admin() || bf_get_admin_current_post_type() !== 'page' || publisher_is_valid_cpt( 'post' ) ) {
	/**
	 * -> Related Posts Tab
	 */
	$fields['_related_posts'] = array(
		'name'     => __( 'Related Posts', 'publisher' ),
		'id'       => '_related_posts',
		'type'     => 'tab',
		'icon'     => 'fa-clone',
		'ajax-tab' => true
	);
	$fields['post_related']   = array(
		'name'           => __( 'Related Posts', 'publisher' ),
		'id'             => 'post_related',
		'desc'           => __( 'Enabling this will be adds related posts in in bottom of post content.', 'publisher' ),
		'type'           => 'select',
		'options'        => array(
			'default'               => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'show'                  => __( 'Show - Simple', 'publisher' ),
			'infinity-related-post' => __( 'Show - Infinity Ajax Load', 'publisher' ),
			'hide'                  => __( 'Hide', 'publisher' ),
		),
		'ajax-tab-field' => '_related_posts'
	);

	$show_condition = array( 'post_related!=hide' );
	if ( publisher_get_option( 'post_related' ) === 'hide' ) {
		$show_condition[] = 'post_related!=default';
	}

	$fields['post_related_keyword'] = array(
		'name'           => __( 'Posts With Custom Keyword', 'publisher' ),
		'desc'           => __( 'Show only posts with this keyword (search). This will overrides(disable) the algorithm field.', 'publisher' ),
		'id'             => 'post_related_keyword',
		'type'           => 'text',
		'show_on'        => array( $show_condition ),
		'ajax-tab-field' => '_related_posts'
	);

	$fields['post_related_type'] = array(
		'name'           => __( 'Related Posts Algorithm', 'publisher' ),
		'id'             => 'post_related_type',
		'desc'           => __( 'Choose the algorithm of related posts.', 'publisher' ),
		'type'           => 'select',
		'options'        => array(
			'default'        => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'cat'            => __( 'by Category', 'publisher' ),
			'selected-cat'   => __( 'by Selected Category', 'publisher' ),
			'tag'            => __( 'by Tag', 'publisher' ),
			'selected-tag'   => __( 'by Selected Tag', 'publisher' ),
			'author'         => __( 'by Author', 'publisher' ),
			'cat-tag'        => __( 'by Category & Tag', 'publisher' ),
			'cat-tag-author' => __( 'by Category, Tag & Author', 'publisher' ),
			'selected-posts' => __( 'by Selected Posts id', 'publisher' ),
			'random'         => __( 'Randomly', 'publisher' ),
		),
		'show_on'        => array( array_merge( $show_condition, array( 'post_related_keyword=' ) ) ),
		'ajax-tab-field' => '_related_posts'
	);

	$fields['post_related_posts_id'] = array(
		'name'           => __( 'Posts ID', 'publisher' ),
		'id'             => 'post_related_posts_id',
		'type'           => 'text',
		'desc'           => __( 'Enter here the post IDs separated by commas (ex: 10,27,233).', 'publisher' ),
		//
		'show_on'        => array(
			array_merge( $show_condition, array(
				'post_related_type=selected-posts',
				'post_related_keyword='
			) )
		),
		'ajax-tab-field' => '_related_posts'
	);

	$fields['post_related_selected_cats'] = array(
		'name'           => __( 'Categories', 'publisher' ),
		'id'             => 'post_related_selected_cats',
		'type'           => 'term_select',
		'taxonomy'       => 'category',
		//
		'show_on'        => array(
			array_merge( $show_condition, array(
				'post_related_type=selected-cat',
				'post_related_keyword='
			) )
		),
		'ajax-tab-field' => '_related_posts'
	);

	$fields['post_related_selected_tags'] = array(
		'name'           => __( 'Tags', 'publisher' ),
		'id'             => 'post_related_selected_tags',
		'desc'           => __( 'Show posts associated with certain tags', 'publisher' ),
		'type'           => 'ajax_select',
		"callback"       => 'BF_Ajax_Select_Callbacks::tags_callback',
		"get_name"       => 'BF_Ajax_Select_Callbacks::tag_name',
		'placeholder'    => __( "Search and find tag...", 'publisher' ),
		//
		'show_on'        => array(
			array_merge( $show_condition, array(
				'post_related_type=selected-tag',
				'post_related_keyword='
			) )
		),
		'ajax-tab-field' => '_related_posts'
	);

	$related_count_show_condition = array( 'post_related=show' );
	// START post_related_count field
	if ( publisher_get_option( 'post_related' ) === 'show' ) {
		$related_count_show_condition[] = 'post_related=default';
	}

	$fields['post_related_count'] = array(
		'name'           => __( 'Related Posts Count', 'publisher' ),
		'id'             => 'post_related_count',
		'desc'           => __( 'Enter related posts count.', 'publisher' ),
		'type'           => 'text',
		'show_on'        => $related_count_show_condition,
		'ajax-tab-field' => '_related_posts'
	);
	// END post_related_count field

	$fields['post_related_offset'] = array(
		'name'           => __( 'Offset posts', 'publisher' ),
		'id'             => 'post_related_offset',
		'desc'           => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
		'type'           => 'text',
		'show_on'        => $related_count_show_condition,
		'ajax-tab-field' => '_related_posts'
	);

	$related_count_show_condition = NULL;

	$ajaxified_related_count_show_condition = array( 'post_related=infinity-related-post' );
	// START ajaxified_related_count field
	if ( publisher_get_option( 'post_related' ) === 'infinity-related-post' ) {
		$ajaxified_related_count_show_condition[] = 'post_related=default';
	}
	$fields['ajaxified_related_count'] = array(
		'name'           => __( 'Ajaxified Related Posts Count', 'publisher' ),
		'id'             => 'ajaxified_related_count',
		'desc'           => __( 'Enter related posts count.', 'publisher' ),
		'type'           => 'text',
		'show_on'        => $ajaxified_related_count_show_condition,
		'ajax-tab-field' => '_related_posts'
	);
	// END ajaxified_related_count field

	$fields['ajaxified_related_offset'] = array(
		'name'           => __( 'Ajaxified Related Posts Offset', 'publisher' ),
		'id'             => 'ajaxified_related_offset',
		'desc'           => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
		'type'           => 'text',
		'show_on'        => $ajaxified_related_count_show_condition,
		'ajax-tab-field' => '_related_posts'
	);

	$ajaxified_related_count_show_condition = NULL;

	// START post_related_keyword field
	$post_related_show_condition   = array();
	$post_related_show_condition[] = array_merge( $show_condition, array( 'post_related_type=custom-keyword' ) );

	if ( publisher_get_option( 'post_related_type' ) === 'custom-keyword' ) {
		$post_related_show_condition[] = array_merge( $show_condition, array( 'post_related_type=default' ) );
	}

	$post_related_show_condition = NULL;
	// END post_related_keyword field

	$show_condition = NULL;


	/**
	 *  => Inline Post Content
	 */
	$fields['_inline_related_posts'] = array(
		'name'     => __( 'Inline Related Posts', 'publisher' ),
		'id'       => '_inline_related_posts',
		'type'     => 'tab',
		'icon'     => 'fa-sticky-note-o',
		'ajax-tab' => true
	);

	$fields['inline_related_posts_override'] = array(
		'name'           => __( 'Override Inline Related Posts?', 'publisher' ),
		'desc'           => __( 'You can override default settings for related posts.', 'publisher' ),
		'id'             => 'inline_related_posts_override',
		'type'           => 'switch',
		'on-label'       => __( 'Yes', 'publisher' ),
		'off-label'      => __( 'No', 'publisher' ),
		'ajax-tab-field' => '_inline_related_posts',
	);
	$fields['inline_related_posts_status']   = array(
		'name'           => __( 'Show Inline Related Posts?', 'publisher' ),
		'desc'           => __( 'Show/Hide Inline Related Posts for this post.', 'publisher' ),
		'id'             => 'inline_related_posts_status',
		'type'           => 'select',
		'options'        => array(
			'show' => __( 'Yes, Show', 'publisher' ),
			'hide' => __( 'Hide', 'publisher' ),
		),
		'ajax-tab-field' => '_inline_related_posts',
		'show_on'        => array(
			array( 'inline_related_posts_override=1' )
		),
	);
	$fields['inline_related_posts']          = array(
		'name'          => '',
		'id'            => 'inline_related_posts',
		'type'          => 'repeater',
		'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add New Inline Related Post', 'publisher' ),
		'delete_label'  => __( 'Delete', 'publisher' ),
		'item_title'    => __( 'Inline Related Post', 'publisher' ),
		'section_class' => 'full-with-both',
		'std'           => array(
			array(
				'heading'          => '',
				'type'             => 'cat',
				'selected-cats'    => '',
				'posts-id'         => '',
				'selected-tags'    => '',
				'keyword'          => '',
				'position'         => 'middle',
				'paragraph'        => '',
				'align'            => 'left',
				'listing'          => 'thumbnail-1',
				'count'            => '',
				'offset'           => '',
				'pagination'       => 'none',
				'pagination_label' => '1',
			),
		),
		'default'       => array(
			array(
				'heading'          => '',
				'type'             => 'cat',
				'selected-cats'    => '',
				'posts-id'         => '',
				'selected-tags'    => '',
				'keyword'          => '',
				'position'         => 'middle',
				'paragraph'        => '',
				'align'            => 'left',
				'listing'          => 'thumbnail-1',
				'count'            => '',
				'offset'           => '',
				'pagination'       => 'none',
				'pagination_label' => '1',
			),
		),
		'options'       => array(
			'heading'          => array(
				'name' => __( 'Custom Heading', 'publisher' ),
				'id'   => 'heading',
				'desc' => sprintf(
					__( 'Enter your custom heading for inline related posts section. <br> <strong style="color:#000;">Default heading:</strong> %s', 'publisher' ),
					publisher_translation_get( 'read_more' )
				),
				'type' => 'text',
			),
			'listing'          => array(
				'name'             => __( 'Related Posts Listing', 'publisher' ),
				'desc'             => __( 'Choose the listing of inline related posts.', 'publisher' ),
				'id'               => 'listing',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_irp_listing_option_list',
					'args'     => array(
						false
					),
				),
				'texts'            => array(
					'modal_title'   => __( 'Inline Related Post Listing', 'publisher' ),
					'modal_current' => __( 'Current', 'publisher' ),
					'modal_button'  => __( 'Select', 'publisher' ),
					'box_pre_title' => __( 'Selected listing', 'publisher' ),
					'box_button'    => __( 'Change listing', 'publisher' ),
				),
			),
			'keyword'          => array(
				'name' => __( 'Posts With Custom Keyword', 'publisher' ),
				'desc' => __( 'Show only posts with this keyword (search). This will overrides/disable the algorithm field.', 'publisher' ),
				'id'   => 'keyword',
				'type' => 'text',
			),
			'type'             => array(
				'name'    => __( 'Related Posts Algorithm', 'publisher' ),
				'id'      => 'type',
				'desc'    => __( 'Choose the algorithm of related posts.', 'publisher' ),
				'type'    => 'select',
				'options' => array(
					'cat'            => __( 'by Category', 'publisher' ),
					'selected-cat'   => __( 'by Selected Category', 'publisher' ),
					'tag'            => __( 'by Tag', 'publisher' ),
					'selected-tag'   => __( 'by Selected Tag', 'publisher' ),
					'author'         => __( 'by Author', 'publisher' ),
					'cat-tag'        => __( 'by Category & Tag', 'publisher' ),
					'cat-tag-author' => __( 'by Category, Tag & Author', 'publisher' ),
					'selected-posts' => __( 'by Selected Posts id', 'publisher' ),
					'random'         => __( 'Randomly', 'publisher' ),
				),
				'show_on' => array(
					array(
						'keyword='
					)
				),
			),
			'selected-cats'    => array(
				'name'    => __( 'Categories', 'publisher' ),
				'id'      => 'selected-cats',
				'type'    => 'term_select',
				//
				'show_on' => array(
					array(
						'keyword=',
						'type=selected-cat',
					)
				),
			),
			'selected-tags'    => array(
				'name'        => __( 'Tags', 'publisher' ),
				'id'          => 'selected-tags',
				'type'        => 'ajax_select',
				'callback'    => 'BF_Ajax_Select_Callbacks::tags_callback',
				'get_name'    => 'BF_Ajax_Select_Callbacks::tag_name',
				'placeholder' => __( 'Search and find tag...', 'publisher' ),
				//
				'show_on'     => array(
					array(
						'keyword=',
						'type=selected-tag',
					)
				),
			),
			'posts-id'         => array(
				'name'    => __( 'Posts ID', 'publisher' ),
				'id'      => 'posts-id',
				'type'    => 'text',
				'desc'    => __( 'Enter here the post IDs separated by commas (ex: 10,27,233).', 'publisher' ),
				//
				'show_on' => array(
					array(
						'keyword=',
						'type=selected-posts',
					)
				),
			),
			'position'         => array(
				'name'    => __( 'Related Posts Position', 'publisher' ),
				'desc'    => __( 'Chose to position of related post inside post content. Middle or after x paragraph?', 'publisher' ),
				'id'      => 'position',
				'type'    => 'select',
				'options' => array(
					'middle' => __( 'Middle of post content', 'publisher' ),
					'custom' => __( 'After X Paragraph', 'publisher' ),
				),
			),
			'paragraph'        => array(
				'name'       => __( 'After Paragraph?', 'publisher' ),
				'desc'       => __( 'Content of each post will analyzed and it will inject related posts after the selected number of paragraphs.', 'publisher' ),
				'input-desc' => __( 'After how many paragraphs the ad will display.', 'publisher' ),
				'id'         => 'paragraph',
				'type'       => 'text',
				'show_on'    => array(
					array( 'position=custom' )
				),
			),
			'align'            => array(
				'name'    => __( 'Align?', 'publisher' ),
				'desc'    => __( 'Enter align of related posts.', 'publisher' ),
				'id'      => 'align',
				'type'    => 'select',
				'options' => array(
					'left'  => is_rtl() ? __( 'Right', 'publisher' ) : __( 'Left', 'publisher' ),
					'right' => is_rtl() ? __( 'Left', 'publisher' ) : __( 'Right', 'publisher' ),
				),
				'show_on' => array(
					array( 'listing=thumbnail-1-full' ),
					array( 'listing!=thumbnail-2-full' ),
					array( 'listing!=thumbnail-3-full' ),
					array( 'listing!=text-1-full' ),
					array( 'listing!=text-2-full' ),
					array( 'listing!=text-3-full' ),
					array( 'listing!=text-4-full' ),
				),
			),
			'count'            => array(
				'name' => __( 'Posts Count', 'publisher' ),
				'desc' => __( 'Enter related posts count.', 'publisher' ),
				'id'   => 'count',
				'type' => 'text',
			),
			'offset'           => array(
				'name' => __( 'Offset posts', 'publisher' ),
				'desc' => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
				'id'   => 'offset',
				'type' => 'text',
			),
			'pagination'       => array(
				'name'    => __( 'Show Pagination?', 'publisher' ),
				'desc'    => __( 'Select pagination type.', 'publisher' ),
				'id'      => 'pagination',
				'type'    => 'select',
				'options' => array(
					'none'      => __( 'No Pagination', 'publisher' ),
					'next_prev' => __( 'Next Prev Buttons', 'publisher' ),
				),
			),
			'pagination_label' => array(
				'name'    => __( 'Show pagination number label', 'publisher' ),
				'desc'    => __( 'Shows current page and total pages count.', 'publisher' ),
				'id'      => 'pagination_label',
				'type'    => 'switch',
				'show_on' => array(
					array(
						'pagination=next_prev'
					)
				),
			),
		),

		'ajax-tab-field' => '_inline_related_posts',
		'show_on'        => array(
			array( 'inline_related_posts_status=show', 'inline_related_posts_override=1' )
		),
	);

	/**
	 * -> More Stories
	 */
	$fields['_more_stories'] = array(
		'name'     => __( 'More Stories', 'publisher' ),
		'id'       => '_more_stories',
		'type'     => 'tab',
		'icon'     => 'fa-sticky-note-o',
		'ajax-tab' => true
	);
	$fields['more_stories']  = array(
		'name'           => __( 'Show More Stories?', 'publisher' ),
		'desc'           => __( 'Show or hide more stories for this post.', 'publisher' ),
		'id'             => 'more_stories',
		'type'           => 'select',
		'options'        => array(
			'default' => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'show'    => __( 'Show', 'publisher' ),
			'hide'    => __( 'Hide', 'publisher' ),
		),
		'ajax-tab-field' => '_more_stories',
	);

	$show_condition = array( 'more_stories!=hide' );
	if ( publisher_get_option( 'more_stories' ) === 'hide' ) {
		$show_condition[] = 'more_stories!=default';
	}

	$fields['more_stories_keyword']  = array(
		'name'           => __( 'Posts With Custom Keyword', 'publisher' ),
		'desc'           => __( 'Show only posts with this keyword (search). This will overrides/disable the algorithm field.', 'publisher' ),
		'id'             => 'more_stories_keyword',
		'type'           => 'text',
		'show_on'        => array( $show_condition ),
		'ajax-tab-field' => '_more_stories',
	);
	$fields['more_stories_type']     = array(
		'name'           => __( 'More Stories Algorithm', 'publisher' ),
		'id'             => 'more_stories_type',
		'desc'           => __( 'Choose the algorithm of more stories posts. You can use custom keyword to show posts with specific keyword.', 'publisher' ),
		'type'           => 'select',
		'options'        => array(
			'default'        => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'cat'            => __( 'by Category', 'publisher' ),
			'selected-cat'   => __( 'by Selected Category', 'publisher' ),
			'tag'            => __( 'by Tag', 'publisher' ),
			'selected-tag'   => __( 'by Selected Tag', 'publisher' ),
			'author'         => __( 'by Author', 'publisher' ),
			'cat-tag'        => __( 'by Category & Tag', 'publisher' ),
			'cat-tag-author' => __( 'by Category, Tag & Author', 'publisher' ),
			'selected-posts' => __( 'by Selected Posts id', 'publisher' ),
			'random'         => __( 'Randomly', 'publisher' ),
		),
		'show_on'        => array( $show_condition ),
		'ajax-tab-field' => '_more_stories',
	);
	$fields['more_stories_posts_id'] = array(
		'name'           => __( 'Posts ID', 'publisher' ),
		'id'             => 'more_stories_posts_id',
		'type'           => 'text',
		'desc'           => __( 'Enter here the post IDs separated by commas (ex: 10,27,233).', 'publisher' ),
		//
		'show_on'        => array(
			array_merge( $show_condition, array(
				'more_stories_type=selected-posts',
			) )
		),
		'ajax-tab-field' => '_more_stories'
	);

	$fields['more_stories_selected_cats'] = array(
		'name'           => __( 'Categories', 'publisher' ),
		'id'             => 'more_stories_selected_cats',
		'type'           => 'term_select',
		'taxonomy'       => 'category',
		//
		'show_on'        => array(
			array_merge( $show_condition, array(
				'more_stories_type=selected-cat',
			) )
		),
		'ajax-tab-field' => '_more_stories'
	);

	$fields['more_stories_selected_tags'] = array(
		'name'           => __( 'Tags', 'publisher' ),
		'id'             => 'more_stories_selected_tags',
		'desc'           => __( 'Show posts associated with certain tags', 'publisher' ),
		'type'           => 'ajax_select',
		"callback"       => 'BF_Ajax_Select_Callbacks::tags_callback',
		"get_name"       => 'BF_Ajax_Select_Callbacks::tag_name',
		'placeholder'    => __( 'Search and find tag...', 'publisher' ),
		//
		'show_on'        => array(
			array_merge( $show_condition, array(
				'more_stories_type=selected-tag',
			) )
		),
		'ajax-tab-field' => '_more_stories'
	);

	$fields['more_stories_count']   = array(
		'name'           => __( 'Posts Count', 'publisher' ),
		'id'             => 'more_stories_count',
		'desc'           => __( 'Enter posts count.', 'publisher' ),
		'type'           => 'text',
		'show_on'        => array( $show_condition ),
		'ajax-tab-field' => '_more_stories',
	);
	$fields['more_stories_offset']  = array(
		'name'           => __( 'Offset posts', 'publisher' ),
		'id'             => 'more_stories_offset',
		'desc'           => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
		'type'           => 'text',
		'show_on'        => array( $show_condition ),
		'ajax-tab-field' => '_more_stories',
	);
	$fields['more_stories_listing'] = array(
		'name'             => __( 'More Stories Listing', 'publisher' ),
		'id'               => 'more_stories_listing',
		'style'            => Publisher_Theme_Styles_Manager::get_styles(),
		'type'             => 'select_popup',
		'desc'             => __( 'More Stories listing.', 'publisher' ),
		'deferred-options' => array(
			'callback' => 'publisher_more_stories_listing_option_list',
			'args'     => array(
				true
			),
		),
		'texts'            => array(
			'default'       => __( '-- Default [ From Theme Panel ] --', 'publisher' ),
			'modal_title'   => __( 'More Stories Listing', 'publisher' ),
			'modal_current' => __( 'Current', 'publisher' ),
			'modal_button'  => __( 'Select', 'publisher' ),
			'box_pre_title' => __( 'Selected listing', 'publisher' ),
			'box_button'    => __( 'Change listing', 'publisher' ),
		),
		'show_on'          => array( $show_condition ),
		'ajax-tab-field'   => '_more_stories',
		'column_class'     => 'three-column',
	);

} // posts fields


/**
 * => Header Options
 */
$fields['header_options'] = array(
	'name'     => __( 'Header', 'publisher' ),
	'id'       => 'header_options',
	'type'     => 'tab',
	'icon'     => 'bsai-header',
	'ajax-tab' => true
);
$fields[]                 = array(
	'name'           => __( 'Header', 'publisher' ),
	'type'           => 'group',
	'state'          => 'open',
	'ajax-tab-field' => 'header_options'
);
$fields['header_style']   = array(
	'name'             => __( 'Header Style', 'publisher' ),
	'id'               => 'header_style',
	'desc'             => __( 'Override header style for this page.', 'publisher' ),
	'type'             => 'image_radio',
	'section_class'    => 'style-floated-left bordered',
	'deferred-options' => array(
		'callback' => 'publisher_header_style_option_list',
		'args'     => array(
			true,
		),
	),
	'ajax-tab-field'   => 'header_options'
);
$fields['header_layout']  = array(
	'name'             => __( 'Header Boxed', 'publisher' ),
	'id'               => 'header_layout',
	'desc'             => __( 'Select header layout.', 'publisher' ),
	'type'             => 'select',
	'deferred-options' => array(
		'callback' => 'publisher_header_layout_option_list',
		'args'     => array(
			true,
		),
	),
	'ajax-tab-field'   => 'header_options'
);
$fields['main_nav_menu']  = array(
	'name'             => __( 'Main Navigation Menu', 'publisher' ),
	'id'               => 'main_nav_menu',
	'desc'             => __( 'Replace & change main menu for this page.', 'publisher' ),
	'type'             => 'select',
	'deferred-options' => array(
		'callback' => 'bf_get_menus_option',
		'args'     => array(
			true,
			__( '-- Default Main Navigation --', 'publisher' )
		),
	),
	'ajax-tab-field'   => 'header_options'
);


/**
 * -> Logo
 */
$fields[]                    = array(
	'name'           => __( 'Page Custom Logo', 'publisher' ),
	'type'           => 'group',
	'state'          => 'open',
	'ajax-tab-field' => 'header_options'
);
$fields['logo_image']        = array(
	'name'           => __( 'Logo Image', 'publisher' ),
	'id'             => 'logo_image',
	'desc'           => __( 'You can override default site logo for this page.', 'publisher' ),
	'type'           => 'media_image',
	'media_title'    => __( 'Select or Upload Logo', 'publisher' ),
	'media_button'   => __( 'Select Image', 'publisher' ),
	'upload_label'   => __( 'Upload Logo', 'publisher' ),
	'remove_label'   => __( 'Remove Logo', 'publisher' ),
	'ajax-tab-field' => 'header_options'
);
$fields['logo_image_retina'] = array(
	'name'           => __( 'Logo Image Retina (2x)', 'publisher' ),
	'id'             => 'logo_image_retina',
	'desc'           => __( 'You can override default site logo for this page. It requires WP Retina 2x plugin.', 'publisher' ),
	'type'           => 'media_image',
	'media_title'    => __( 'Select or Upload Retina Logo', 'publisher' ),
	'media_button'   => __( 'Select Retina Image', 'publisher' ),
	'upload_label'   => __( 'Upload Retina Logo', 'publisher' ),
	'remove_label'   => __( 'Remove Retina Logo', 'publisher' ),
	'ajax-tab-field' => 'header_options'
);
$fields[]                    = array(
	'name'           => __( 'Header Background Style', 'publisher' ),
	'type'           => 'group',
	'state'          => 'close',
	'ajax-tab-field' => 'header_options'
);
$fields['header_bg_color']   = array(
	'name'           => __( 'Header Background Color', 'publisher' ),
	'id'             => 'header_bg_color',
	'type'           => 'color',
	'desc'           => __( 'You can change header background color with this option.', 'publisher' ),
	'ajax-tab-field' => 'header_options',
);
$fields['header_bg_image']   = array(
	'name'           => __( 'Header Background Image', 'publisher' ),
	'id'             => 'header_bg_image',
	'type'           => 'background_image',
	'upload_label'   => __( 'Upload Image', 'publisher' ),
	'desc'           => __( 'Use light patterns in non-boxed layout. For patterns, use a repeating background. Use photo to fully cover the background with an image. Note that it will override the background color option.', 'publisher' ),
	'ajax-tab-field' => 'header_options',
);

$fields[]                        = array(
	'name'           => __( 'Header Padding', 'publisher' ),
	'type'           => 'group',
	'state'          => 'close',
	'ajax-tab-field' => 'header_options'
);
$fields['header-padding-help']   = array(
	'name'           => __( 'Warning', 'publisher' ),
	'id'             => 'header-padding-help',
	'type'           => 'info',
	'std'            => __( '<p>Please note following settings <strong>not works</strong> for <strong>Header 5, 6 and 8</strong></p>', 'publisher' ),
	'state'          => 'open',
	'info-type'      => 'warning',
	'section_class'  => 'widefat',
	'ajax-tab-field' => 'header_options',
);
$fields['header_top_padding']    = array(
	'name'           => __( 'Header Top Padding', 'publisher' ),
	'id'             => 'header_top_padding',
	'suffix'         => __( 'Pixel', 'publisher' ),
	'desc'           => __( 'In pixels without px, ex: 20. <br>Leave empty for default value.', 'publisher' ),
	'type'           => 'text',
	'ajax-tab-field' => 'header_options'
);
$fields['header_bottom_padding'] = array(
	'name'           => __( 'Header Bottom Padding', 'publisher' ),
	'id'             => 'header_bottom_padding',
	'suffix'         => __( 'Pixel', 'publisher' ),
	'desc'           => __( 'In pixels without px, ex: 20. <br>Leave empty for default value. Values lower than 60px will break the style.', 'publisher' ),
	'type'           => 'text',
	'ajax-tab-field' => 'header_options'
);


/**
 * => Footer Options
 */
$fields['footer_options'] = array(
	'name'     => __( 'Footer', 'publisher' ),
	'id'       => 'footer_options',
	'type'     => 'tab',
	'icon'     => 'bsai-footer',
	'ajax-tab' => true
);
$fields['footer_style']   = array(
	'name'             => __( 'Footer Style', 'publisher' ),
	'id'               => 'footer_style',
	'desc'             => __( 'Override footer style for this page.', 'publisher' ),
	'type'             => 'image_radio',
	'section_class'    => 'style-floated-left bordered',
	'deferred-options' => array(
		'callback' => 'publisher_footer_style_option_list',
		'args'     => array(
			true,
		),
	),
	'ajax-tab-field'   => 'footer_options'
);


/**
 * -> Background
 */
$fields['_background_tab'] = array(
	'name'     => __( 'Background', 'publisher' ),
	'id'       => '_background_tab',
	'type'     => 'tab',
	'icon'     => 'bsai-image',
	'ajax-tab' => true
);
$fields['bg_color']        = array(
	'name'           => __( 'Body Background Color', 'publisher' ),
	'id'             => 'bg_color',
	'type'           => 'color',
	'desc'           => __( 'Setting a body background image below will override it.', 'publisher' ),
	'ajax-tab-field' => '_background_tab'
);
$fields['bg_image']        = array(
	'name'           => __( 'Body Background Image', 'publisher' ),
	'id'             => 'bg_image',
	'type'           => 'background_image',
	'upload_label'   => __( 'Upload Image', 'publisher' ),
	'desc'           => __( 'Use light patterns in non-boxed layout. For patterns, use a repeating background. Use photo to fully cover the background with an image. Note that it will override the background color option.', 'publisher' ),
	'ajax-tab-field' => '_background_tab'
);


/**
 * -> Injection Locations
 */
$fields['_injection_tab']          = array(
	'name'     => __( 'Injection Locations', 'publisher' ),
	'id'       => '_injection_tab',
	'type'     => 'tab',
	'icon'     => 'bsai-inject',
	'ajax-tab' => true,
);
$fields['injection_disable_all']   = array(
	'name'           => __( 'Disable all Injection Locations?', 'publisher' ),
	'id'             => 'injection_disable_all',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove all injection locations ', 'publisher' ),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_before_header'] = array(
	'name'           => __( 'Disable Before Header Injection Locations?', 'publisher' ),
	'id'             => 'injection_before_header',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove Before Header injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_after_header']  = array(
	'name'           => __( 'Disable After Header Injection Locations?', 'publisher' ),
	'id'             => 'injection_after_header',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove After Header injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_before_footer'] = array(
	'name'           => __( 'Disable Before Footer Injection Locations?', 'publisher' ),
	'id'             => 'injection_before_footer',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove Before Footer injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_after_footer']  = array(
	'name'           => __( 'Disable After Footer Injection Locations?', 'publisher' ),
	'id'             => 'injection_after_footer',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove After Footer injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);


/**
 *
 * Adds custom CSS options for metabox
 *
 */
bf_inject_panel_custom_css_fields( $fields, array(
	'loop-css-class' => true
) );
