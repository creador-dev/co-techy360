<?php

Better_Ads_Manager()->enqueue_adblocker_detector();

if ( ! empty( $banner_data['caption'] ) ) {
	$title = $banner_data['caption'];
} else {
	$title = $banner_data['title'];
}

$caption = ! empty( $banner_data['caption'] ) && $args['show-caption'] ? Better_Ads_Manager::get_option( 'caption_position' ) : false;

$_ad = '';

if ( $caption == 'above' ) {
	$_ad .= "<p class='bsac-caption bsac-caption-above'>{$banner_data['caption']}</p>";
}

if ( ! empty( $banner_data['url'] ) ) {
	$_ad .= '<a itemprop="url" class="bsac-link" href="' . $banner_data['url'] . '"' . ( $banner_data['target'] ? ' target="' . $banner_data['target'] . '"' : '' ) . ' ';
	$_ad .= $banner_data['no_follow'] ? ' rel="nofollow" >' : '>';
}

$_ad .= '<img class="bsac-image" src="' . $banner_data['img'] . '" alt="' . $title . '" />';

if ( ! empty( $banner_data['url'] ) ) {
	$_ad .= '</a>';
}

if ( $caption === 'below' ) {
	$_ad .= "<p class='bsac-caption bsac-caption-below'>{$banner_data['caption']}</p>";
}

return $_ad;
