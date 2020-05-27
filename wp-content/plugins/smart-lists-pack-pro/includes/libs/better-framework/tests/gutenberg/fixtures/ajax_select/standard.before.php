<?php

return array(
	'sample' => array(
		'name'        => 'Tags',
		'id'          => 'sample',
		'desc'        => 'Show posts associated with certain tags in homepage.',
		'type'        => 'ajax_select',
		"callback"    => 'BF_Ajax_Select_Callbacks::tags_callback',
		'placeholder' => 'Search and find tag...',
	),
);
