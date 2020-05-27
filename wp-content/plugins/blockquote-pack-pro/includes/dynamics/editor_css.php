<?php
/***
 *
 * Special CSS for TinyMCE
 *
 */

$default         = BS_Blockquote_Pack_Pro::get_option( 'quote-style' );
$default_printed = FALSE;

?>
.mce-content-body *[data-wpview-type="bs-quote"]{
	outline: 1px dashed transparent !important;
	transition: all .5s ease;
}
.mce-content-body:hover *[data-wpview-type="bs-quote"]{
	outline-color: #e9e9e9 !important;
}
.mce-content-body:hover *[data-wpview-type="bs-quote"][data-mce-selected]{
	outline-color: #3372a0 !important;
}

.mce-content-body *[data-wpview-type="bs-quote"][data-wpview-text*="%22%20align%3D%22left"]{
	float: left;
	width: 300px !important;
	margin-right: 25px;
}
.mce-content-body *[data-wpview-type="bs-quote"][data-wpview-text*="%22%20align%3D%22right"]{
	float: right;
	width: 300px !important;
	margin-left: 25px;
}
<?php

if ( ! $default_printed ) {

	$_check = array(
		'style-14' => '',
		'style-13' => '',
		'style-8'  => '',
		'style-4'  => '',
	);

	if ( isset( $_check[ $default ] ) ) {
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22left"], ';
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22right"], ';
		$default_printed = TRUE;
	}
}

?>
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-14"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-14"][data-wpview-text*="%22%20align%3D%22right"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-13"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-13"][data-wpview-text*="%22%20align%3D%22right"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-8"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-8"][data-wpview-text*="%22%20align%3D%22right"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-4"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-4"][data-wpview-text*="%22%20align%3D%22right"]{
	width: 402px !important;
}
<?php

if ( ! $default_printed ) {

	$_check = array(
		'style-12' => '',
		'style-11' => '',
		'style-10' => '',
		'style-9'  => '',
	);

	if ( isset( $_check[ $default ] ) ) {
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22left"],';
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22right"],';
		$default_printed = TRUE;
	}
}

?>
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-12"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-12"][data-wpview-text*="%22%20align%3D%22right"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-11"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-11"][data-wpview-text*="%22%20align%3D%22right"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-10"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-10"][data-wpview-text*="%22%20align%3D%22right"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-9"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-9"][data-wpview-text*="%22%20align%3D%22right"]{
	width: 362px !important;
}
<?php

if ( ! $default_printed ) {

	$_check = array(
		'style-17' => '',
	);

	if ( isset( $_check[ $default ] ) ) {
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22left"],';
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22right"],';
		$default_printed = TRUE;
	}
}

?>
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-17"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-17"][data-wpview-text*="%22%20align%3D%22right"]{
	width: 342px !important;
}
<?php

if ( ! $default_printed ) {

	$_check = array(
		'style-16' => '',
	);

	if ( isset( $_check[ $default ] ) ) {
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22left"],';
		echo '.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22default"][data-wpview-text*="%22%20align%3D%22right"],';
		$default_printed = TRUE;
	}
}

?>
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-16"][data-wpview-text*="%22%20align%3D%22left"],
.mce-content-body *[data-wpview-type^="bs-quote"][data-wpview-text*="%20style%3D%22style-16"][data-wpview-text*="%22%20align%3D%22right"]{
	width: 322px !important;
}
.mce-content-body .bs-quote.bsq-right,
.mce-content-body .bs-quote.bsq-left,
.mce-content-body .bs-quote{
	float: none !important;
	width: 100% !important;
	clear:both !important;
	margin-left: 0 !important;
	margin-right: 0 !important;
}

html .mceContentBody p:empty {
	display: none;
}
