<?php
/***
 *
 * Special CSS for TinyMCE
 *
 */

?>
.mce-content-body *[data-wpview-type="bs_smart_list_pack_end"],
.mce-content-body *[data-wpview-type="bs_smart_list_pack_start"] {
	outline: 2px dashed #DFEBF3 !important;
	transition: all .5s ease;
	opacity: 0.7;
}

.mce-content-body *[data-wpview-type="bs_smart_list_pack_end"]:hover,
.mce-content-body *[data-wpview-type="bs_smart_list_pack_end"][data-mce-selected],
.mce-content-body *[data-wpview-type="bs_smart_list_pack_start"]:hover,
.mce-content-body *[data-wpview-type="bs_smart_list_pack_start"][data-mce-selected]{
	opacity: 1;
	outline-color: #2d8ac7 !important;
}
