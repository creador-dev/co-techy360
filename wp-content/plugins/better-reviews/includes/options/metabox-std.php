<?php


$fields['_bs_review_enabled']            = array(
	'std' => '0',
);
$fields['_bs_review_pos']                = array(
	'std' => 'bottom',
);
$fields['_bs_review_rating_type']        = array(
	'std' => 'stars',
);
$fields['_bs_review_box_style']          = array(
	'std' => 'default',
);
$fields['_bs_review_align']              = array(
	'std' => 'left',
);
$fields['_bs_review_box_padding_top']    = array(
	'std' => '',
);
$fields['_bs_review_box_padding_bottom'] = array(
	'std' => '',
);
$fields['_bs_review_box_padding_left']   = array(
	'std' => '',
);
$fields['_bs_review_box_padding_right']  = array(
	'std' => '',
);
$fields['_bs_readers_rating']            = array(
	'std' => '',
);


/**
 * => Verdict Options
 */
$fields['_bs_review_heading']         = array(
	'std' => '',
);
$fields['_bs_review_verdict']         = array(
	'std' => __( 'Awesome', 'better-studio' ),
);
$fields['_bs_review_verdict_summary'] = array(
	'std' => '',
);
$fields['_bs_review_extra_desc']      = array(
	'std' => '',
);


/**
 * => Criteria Options
 */
$fields['_bs_review_criteria'] = array(
	'save-std' => true,
	'std'      => array(
		array(
			'label' => __( 'Design', 'better-studio' ),
			'rate'  => '8',
		)
	),
	'default'  => array(
		array(
			'label' => __( 'Design', 'better-studio' ),
			'rate'  => '8',
		)
	),
);


/**
 * => Affiliate
 */
$fields['_affiliate_desc'] = array(
	'std' => '',
);
$fields['_affiliate_btn']  = array(
	'std' => '',
);
$fields['_affiliate_icon'] = array(
	'std' => '',
);
$fields['_affiliate_link'] = array(
	'std' => '',
);

/**
 * => cons and pros
 */
$fields['_pros_heading'] = array(
	'std' => '',
);
$fields['_cons_heading'] = array(
	'std' => '',
);
$fields['_pros']         = array(
	'save-std' => true,
	'std'      => array(
		array(
			'label' => '',
		)
	),
	'default'  => array(
		array(
			'label' => '',
		)
	),
);

$fields['_cons']      = array(
	'save-std' => true,
	'std'      => array(
		array(
			'label' => '',
		)
	),
	'default'  => array(
		array(
			'label' => '',
		)
	),
);
$fields['_icon_pros'] = array(
	'std'      => Better_Reviews::get_option( 'icon_pros' ),
	'save-std' => false,
);
$fields['_icon_cons'] = array(
	'std'      => Better_Reviews::get_option( 'icon_cons' ),
	'save-std' => false,
);
