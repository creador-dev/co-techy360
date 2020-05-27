<?php
/***
 *
 * Special CSS for TinyMCE
 *
 */

$default_printed = FALSE;

?>
.mce-content-body *[data-wpview-type="better-ads"]{
	margin-bottom: 25px;
	outline: 1px dashed transparent !important;
	transition: all .5s ease;
}
.mce-content-body:hover *[data-wpview-type="better-ads"]{
	outline-color: #e9e9e9 !important;
}
.mce-content-body *[data-wpview-type="better-ads"][data-mce-selected]{
	outline-color: #3372a0 !important;
}
.mce-content-body *[data-wpview-type="better-ads"][data-wpview-text*="%22%20align%3D%22right"]{
	float: right;
width: auto !important;
	margin-left: 25px;
}
.mce-content-body *[data-wpview-type="better-ads"][data-wpview-text*="%22%20align%3D%22left"]{
	float: left;
	width: auto !important;
	margin-right: 25px;
}
