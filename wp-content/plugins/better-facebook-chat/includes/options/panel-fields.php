<?php

$fields['instruction_help'] = array(
	'name'          => __( 'Instruction', 'better-studio' ),
	'id'            => 'instruction_help',
	'type'          => 'info',
	'std'           => __( '<ol>
<li>Go to your Facebook page</li>
<li>Click on the <strong>Settings</strong> on the top right: <a href="https://goo.gl/hTTrLB" target="_blank">i.imgur.com/3aCRzxA.jpg</a></li>
<li>Click on the <strong>Messenger platform</strong> from the left navigation: <a href="https://goo.gl/HQnKPP" target="_blank">i.imgur.com/Lks19oE.jpg</a></li>
<li>Find the <strong>White-listed domains</strong> and enter your site domain name and hit the save button: <a href="https://goo.gl/CCZidq" target="_blank">i.imgur.com/0abAJrU.jpg</a></li>
<li>Finished.</li>
</ol>', 'better-studio' ),
	'state'         => 'open',
	'info-type'     => 'help',
	'section_class' => 'widefat',
);

$fields['chat_enabled'] = array(
	'name'      => __( 'Facebook Chat Status', 'better-studio' ),
	'desc'      => __( 'Show the messenger chat button on the site or not.', 'better-studio' ),
	'id'        => 'chat_enabled',
	'type'      => 'switch',
	'on-label'  => __( 'Enable', 'better-studio' ),
	'off-label' => __( 'Disable', 'better-studio' ),
);

$fields['facebook_page'] = array(
	'name'    => __( 'Your Facebook Page ID', 'better-studio' ),
	'id'      => 'facebook_page',
	'type'    => 'text',
	'desc'    => __( 'Enter your Facebook page ID here. Example: BetterSTU', 'better-studio' ),
	'show_on' => array(
		array(
			'chat_enabled=1'
		)
	),
);

$fields['theme_color'] = array(
	'name'    => __( 'Messenger Color', 'better-studio' ),
	'id'      => 'theme_color',
	'type'    => 'color',
	'desc'    => __( 'The color to use as a theme for the messenger, including the background color of the customer chat plugin icon and the background color of any messages sent by users', 'better-studio' ),
	'show_on' => array(
		array(
			'chat_enabled=1'
		)
	),
);

$fields['position'] = array(
	'name'    => __( 'Messenger Chat Position', 'better-studio' ),
	'id'      => 'position',
	'type'    => 'select',
	'options' => array(
		'right-bottom' => __( 'Right, Bottom', 'better-studio' ),
		'right-top'    => __( 'Right, Top', 'better-studio' ),
		'left-bottom'  => __( 'Left, Bottom', 'better-studio' ),
		'left-top'     => __( 'Left, Top', 'better-studio' ),
	),
	'desc'    => __( 'The position of chat messenger in the page.', 'better-studio' ),
	'show_on' => array(
		array(
			'chat_enabled=1'
		)
	),
);

$fields['logged_out_greeting'] = array(
	'name'    => __( 'Guest user greeting text', 'better-studio' ),
	'id'      => 'logged_out_greeting',
	'desc'    => __( 'The greeting text that will be displayed if the user is currently not logged in to Facebook.<br/> <b>Maximum 80 characters.</b>', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'chat_enabled=1'
		)
	),
);

$fields['logged_in_greeting'] = array(
	'name'    => __( 'Logged in greeting text', 'better-studio' ),
	'id'      => 'logged_in_greeting',
	'desc'    => __( 'The greeting text that will be displayed if the user is currently logged in to Facebook.<br/> <b>Maximum 80 characters.</b>', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'chat_enabled=1'
		)
	),
);
