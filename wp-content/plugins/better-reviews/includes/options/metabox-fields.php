<?php

$fields['_style_options']         = array(
	'name' => __( 'Style', 'better-studio' ),
	'id'   => '_style_options',
	'type' => 'tab',
	'icon' => 'bsai-paint',
);
$fields['_bs_review_enabled']     = array(
	'name'      => __( 'Enable Review', 'better-studio' ),
	'id'        => '_bs_review_enabled',
	'type'      => 'switch',
	'on-label'  => __( 'Enable', 'better-studio' ),
	'off-label' => __( 'Disable', 'better-studio' ),
	'desc'      => __( 'Enabling this will adds review box to post', 'better-studio' ),
);
$fields['_bs_review_pos']         = array(
	'name'    => __( 'Review Box Position', 'better-studio' ),
	'id'      => '_bs_review_pos',
	'type'    => 'select',
	'desc'    => __( 'Chose position of review box on page. <br> For showing review box between post texts you should chose "<code>Do Not Display</code>" and use <br>"<code>[better-reviews]</code>" shrotcode.', 'better-studio' ),
	'options' => array(
		'none'       => __( 'Do Not Display', 'better-studio' ),
		'top'        => __( 'Top', 'better-studio' ),
		'bottom'     => __( 'Bottom', 'better-studio' ),
		'top-bottom' => __( 'Top & Bottom', 'better-studio' ),
	)
);
$fields['_bs_review_box_style']   = array(
	'name'             => __( 'Review Box Style', 'better-studio' ),
	'desc'             => __( 'Chose style of review box.', 'better-studio' ),
	'id'               => '_bs_review_box_style',
	'type'             => 'select_popup',
	'section_class'    => 'style-floated-left bordered',
	'deferred-options' => array(
		'callback' => 'better_reviews_review_box_style_options',
		'args'     => array(
			true,
		),
	),
);
$fields['_bs_review_align']       = array(
	'name'    => __( 'Review Box Align', 'better-studio' ),
	'id'      => '_bs_review_align',
	'type'    => 'select',
	'options' => array(
		'left'  => is_rtl() ? __( 'Right', 'better-studio' ) : __( 'Left', 'better-studio' ),
		'right' => is_rtl() ? __( 'Left', 'better-studio' ) : __( 'Right', 'better-studio' ),
	),
	'show_on' => array(
		array( '_bs_review_rating_style=tall-1' ),
		array( '_bs_review_rating_style=tall-2' ),
	),
);
$fields['_bs_review_rating_type'] = array(
	'name'          => __( 'Rating Format', 'better-studio' ),
	'desc'          => __( 'Chose format of review', 'better-studio' ),
	'id'            => '_bs_review_rating_type',
	'type'          => 'image_radio',
	'section_class' => 'style-floated-left bordered',
	'options'       => array(
		'stars'      => array(
			'img'   => Better_Reviews::dir_url( 'img/review-star.png' ),
			'label' => __( 'Stars', 'better-studio' ),
		),
		'percentage' => array(
			'img'   => Better_Reviews::dir_url( 'img/review-bar.png' ),
			'label' => __( 'Percentage', 'better-studio' ),
		),
		'points'     => array(
			'img'   => Better_Reviews::dir_url( 'img/review-point.png' ),
			'label' => __( 'Points', 'better-studio' ),
		)
	)
);
$fields['_bs_readers_rating']     = array(
	'name'    => __( 'Visitors Rating?', 'better-studio' ),
	'desc'    => __( 'Enables users to enter their review in review boxes.', 'better-studio' ),
	'id'      => '_bs_readers_rating',
	'type'    => 'select',
	'options' => array(
		''        => __( '-- Default --', 'better-studio' ),
		'enable'  => __( 'Enable', 'better-studio' ),
		'disable' => __( 'Disable', 'better-studio' ),
	),
);


/**
 * => Verdict Options
 */
$fields['_verdict_options']           = array(
	'name' => __( 'Verdict', 'better-studio' ),
	'id'   => '_verdict_options',
	'type' => 'tab',
	'icon' => 'bsai-verdict',
);
$fields['_bs_review_heading']         = array(
	'name' => __( 'Heading', 'better-studio' ),
	'id'   => '_bs_review_heading',
	'type' => 'text',
	'desc' => __( 'Optional title for review box', 'better-studio' ),
);
$fields['_bs_review_verdict']         = array(
	'name' => __( 'Verdict', 'better-studio' ),
	'id'   => '_bs_review_verdict',
	'type' => 'text',
	'desc' => __( '1 or 2 word for overall verdict. ex: Awesome', 'better-studio' ),
);
$fields['_bs_review_verdict_summary'] = array(
	'name' => __( 'Verdict Description - Top', 'better-studio' ),
	'desc' => __( 'Verdict description that will be shown on top of criteria', 'better-studio' ),
	'id'   => '_bs_review_verdict_summary',
	'type' => 'textarea',
);
$fields['_bs_review_extra_desc']      = array(
	'name' => __( 'Verdict Description - Bottom', 'better-studio' ),
	'desc' => __( 'Verdict description that will be shown under criteria', 'better-studio' ),
	'id'   => '_bs_review_extra_desc',
	'type' => 'textarea',
);


/**
 * => Criteria Options
 */
$fields['_criteria_options']   = array(
	'name' => __( 'Criteria', 'better-studio' ),
	'id'   => '_criteria_options',
	'type' => 'tab',
	'icon' => 'bsai-list-bullet',
);
$fields['_bs_review_criteria'] = array(
	'name'          => __( 'Criteria', 'better-studio' ),
	'id'            => '_bs_review_criteria',
	'type'          => 'repeater',
	'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add Criterion', 'better-studio' ),
	'delete_label'  => __( 'Delete Criterion', 'better-studio' ),
	'item_title'    => __( 'Criterion', 'better-studio' ),
	'section_class' => 'full-with-both',
	'std'           => array(
		array(
			'label' => __( 'Design', 'better-studio' ),
			'rate'  => '8',
			'icon'  => '',
			'color' => '',
		)
	),
	'default'       => array(
		array(
			'label' => __( 'Design', 'better-studio' ),
			'rate'  => '8',
			'icon'  => '',
			'color' => '',
		)
	),
	'options'       => array(
		'label' => array(
			'name'          => __( 'Label', 'better-studio' ),
			'id'            => 'label',
			'std'           => '',
			'type'          => 'text',
			'section_class' => 'bs-review-field-label',
			'repeater_item' => true
		),
		'rate'  => array(
			'name'          => __( 'Rating / 10', 'better-studio' ),
			'id'            => 'rate',
			'type'          => 'text',
			'std'           => '',
			'section_class' => 'bs-review-field-rating',
			'repeater_item' => true,
		),
		'icon'  => array(
			'name'          => __( 'Icon', 'better-studio' ),
			'id'            => 'icon',
			'std'           => '',
			'type'          => 'icon_select',
			'section_class' => 'bs-review-field-label',
			'repeater_item' => true
		),
		'color' => array(
			'name'          => __( 'Color', 'better-studio' ),
			'id'            => 'color',
			'type'          => 'color',
			'std'           => '',
			'section_class' => 'bs-review-field-color',
			'repeater_item' => true,
		),
	)
);


/**
 * => Pros tab
 */
$fields['_pros_tab']     = array(
	'name'       => __( 'Pros', 'better-studio' ),
	'id'         => '_pros_tab',
	'type'       => 'tab',
	'icon'       => 'bsai-check',
	'margin-top' => '20',
);
$fields['_pros_heading'] = array(
	'name'        => __( 'Pros Heading', 'better-studio' ),
	'id'          => '_pros_heading',
	'type'        => 'text',
	'desc'        => __( 'Optional title for pros section heading', 'better-studio' ),
	'placeholder' => __( 'Pros', 'better-studio' ),
);
$fields['_icon_pros']    = array(
	'name' => __( 'Pros Icon', 'better-studio' ),
	'id'   => '_icon_pros',
	'type' => 'icon_select',
);
$fields['_pros']         = array(
	'name'          => '',
	'id'            => '_pros',
	'type'          => 'repeater',
	'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add Advantage', 'better-studio' ),
	'delete_label'  => __( 'Delete Advantage', 'better-studio' ),
	'item_title'    => __( 'Advantage', 'better-studio' ),
	'section_class' => 'full-with-both',
	'std'           => array(
		array(
			'label' => '',
		)
	),
	'default'       => array(
		array(
			'label' => '',
		)
	),
	'options'       => array(
		'label' => array(
			'name'          => __( 'Label', 'better-studio' ),
			'id'            => 'label',
			'std'           => '',
			'type'          => 'text',
			'section_class' => 'bs-review-field-label',
			'repeater_item' => true
		),
	)
);


/**
 * => Pros tab
 */
$fields['_cons_tab']     = array(
	'name' => __( 'Cons', 'better-studio' ),
	'id'   => '_cons_tab',
	'type' => 'tab',
	'icon' => 'bsai-delete',
);
$fields['_cons_heading'] = array(
	'name'        => __( 'Cons Heading', 'better-studio' ),
	'id'          => '_cons_heading',
	'type'        => 'text',
	'desc'        => __( 'Optional title for cons section heading', 'better-studio' ),
	'placeholder' => __( 'Cons', 'better-studio' ),
);
$fields['_icon_cons']    = array(
	'name' => __( 'Cons Icon', 'better-studio' ),
	'id'   => '_icon_cons',
	'type' => 'icon_select',
);
$fields['_cons']         = array(
	'name'          => '',
	'id'            => '_cons',
	'type'          => 'repeater',
	'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add Disadvantage', 'better-studio' ),
	'delete_label'  => __( 'Delete Disadvantage', 'better-studio' ),
	'item_title'    => __( 'Disadvantage', 'better-studio' ),
	'section_class' => 'full-with-both',
	'std'           => array(
		array(
			'label' => '',
		)
	),
	'default'       => array(
		array(
			'label' => '',
		)
	),
	'options'       => array(
		'label' => array(
			'name'          => __( 'Label', 'better-studio' ),
			'id'            => 'label',
			'std'           => '',
			'type'          => 'text',
			'section_class' => 'bs-review-field-label',
			'repeater_item' => true
		),
	)
);


/**
 * => Affiliate
 */
$fields['_affiliate_tab']  = array(
	'name'       => __( 'Affiliate', 'better-studio' ),
	'id'         => '_affiliate_tab',
	'type'       => 'tab',
	'icon'       => 'bsai-advertise',
	'margin-top' => '20',
);
$fields['_affiliate_desc'] = array(
	'name' => __( 'Description', 'better-studio' ),
	'id'   => '_affiliate_desc',
	'type' => 'text',
);
$fields['_affiliate_btn']  = array(
	'name' => __( 'Button', 'better-studio' ),
	'id'   => '_affiliate_btn',
	'type' => 'text',
);
$fields['_affiliate_icon'] = array(
	'name' => __( 'Button Icon', 'better-studio' ),
	'id'   => '_affiliate_icon',
	'type' => 'icon_select',
);
$fields['_affiliate_link'] = array(
	'name' => __( 'Link', 'better-studio' ),
	'id'   => '_affiliate_link',
	'type' => 'text',
);