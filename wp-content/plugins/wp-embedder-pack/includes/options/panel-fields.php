<?php


$fields[] = array(
	'name' => __( 'Google Drive', 'better-studio' ),
	'id'   => 'google_drive_settings',
	'type' => 'tab',
	'icon' => array(
		'type'  => 'custom',
		'width' => '14',
		'icon'  => WP_Embedder_Pack::dir_url( 'assets/img/google-drive.svg' ),
	),
);

$fields['use-google-drive'] = array(
	'name'      => __( 'Use Google Drive', 'wp-embedder-pack' ),
	'desc'      => __( 'With this feature you can access your google drive files & directory right from the WordPress editor.', 'wp-embedder-pack' ),
	'id'        => 'use-google-drive',
	'type'      => 'switch',
	'on-label'  => __( 'Yes', 'wp-embedder-pack' ),
	'off-label' => __( 'No', 'wp-embedder-pack' ),
);

$fields['google-drive-api-key']   = array(
	'name'    => __( 'API Key', 'wp-embedder-pack' ),
	'id'      => 'google-drive-api-key',
	'desc'    => sprintf(
		__( 'Copy the API Key from <a href="%s" target="_blank">Google APIs & Services Credentials page</a>. <br/> read instruction bellow for more information.', 'wp-embedder-pack' ),
		'https://console.developers.google.com/apis/credentials'
	),
	'type'    => 'text',
	'show_on' => array(
		array( 'use-google-drive=1' ),
	)
);
$fields['google-drive-client-id'] = array(
	'name'    => __( 'Client ID', 'wp-embedder-pack' ),
	'id'      => 'google-drive-client-id',
	//
	'desc'    => sprintf(
		__( 'Copy the OAuth client ID from <a href="%s" target="_blank">Google APIs & Services Credentials page</a>. <br/> read instruction bellow for more information.', 'wp-embedder-pack' ),
		'https://console.developers.google.com/apis/credentials'
	),
	'type'    => 'text',
	'show_on' => array(
		array( 'use-google-drive=1' ),
	)
);

$site_url  = site_url();
$url       = trim( preg_replace( '#^(?: https?:)?// (?: w{3}.)? (.*?)/*#ix', '*.', $site_url ), '/' ) . '/*';

$fields['google-drive-config-instruction'] = array(
	'id'        => 'google-drive-config-instruction',
	'name'      => __( 'Instructions', 'wp-embedder-pack' ),
	'std'       => __( '<p>To integrate google drive, you need to first use the setup tool, which guides you through creating a project in the <a href="https://console.developers.google.com/" target="_blank">Google API Console</a>, enabling the API, and creating credentials.</p>
<ol>
    <li>First use <a href="https://console.developers.google.com/start/api?id=picker&credential=client_key" target="_blank">the setup tool</a>, and create new project if you don\'t have one.</li>
    <li>If you haven\'t done so already, create your application\'s API key by clicking <b>Create credentials > API key</b>. Next, look for your <b>API key</b> in the API keys section.</li>
    <li>Click on generated api Next look for your <b>Application restrictions</b>, click on <b>HTTP referrers (web sites)</b>, then add <code>' . $url . '</code> in input box bellow, then save changes.</li>
	<li>If you haven\'t done so already, create your OAuth 2.0 credentials by clicking <b>Create credentials > OAuth client ID</b>. After you\'ve created the credentials, you can see your client ID on the <b>Credentials</b> 
	<li>Click on generated client id and look for <b>Restrictions</b> section, find input box bellow <b>Authorized JavaScript origins</b> and enter site url, the save changes.</li>
	<li>Click <b>Library</b> on navigation and search for <code>Google Drive</code>, click on <code>Google Drive API</code> and the enable it by clicking on enable button.</li>
	<li>again in <b>Library</b> page search for <code>Picker</code>, the click on <code>Google Picker API</code> box and enable it.</li>
	<li>in <b>Credentials</b> page copy api key and client id, and paste on specified fields above.</li>
</li>
</ol>',
		'wp-embedder-pack' ),
	'id'        => 'aweber_help',
	'type'      => 'info',
	'state'     => 'open',
	'info-type' => 'help',
	'show_on'   => array(
		array(
			'use-google-drive=1',
		)
	)
);

$fields[] = array(
	'name' => __( 'Dropbox', 'better-studio' ),
	'id'   => 'dropbox_settings',
	'type' => 'tab',
	'icon' => 'fa-dropbox',
);

$fields['use-dropbox'] = array(
	'name'      => __( 'Use Dropbox', 'wp-embedder-pack' ),
	'desc'      => __( 'Access and pick your dropbox files directly from WordPress editor.', 'wp-embedder-pack' ),
	'id'        => 'use-dropbox',
	'type'      => 'switch',
	'on-label'  => __( 'Yes', 'wp-embedder-pack' ),
	'off-label' => __( 'No', 'wp-embedder-pack' ),
);

$fields['dropbox-api-key'] = array(
	'name'    => __( 'API Key', 'wp-embedder-pack' ),
	'id'      => 'dropbox-api-key',

	//
	'desc'    => sprintf(
		__( 'Put Dropbox App API key here. you can choose app and copy the api key in <a href="%s" target="_blank">Dropbox Apps Page</a> <br/> read instruction bellow for more information.', 'wp-embedder-pack' ),
		'https://www.dropbox.com/developers/apps/'
	),
	'type'    => 'text',
	'show_on' => array(
		array( 'use-dropbox=1' ),
	)
);


$url = trim( preg_replace( '#^(?: https?:)?// (?: w{3}.)? (.*?)/*#ix', '', $site_url ), '/' );

$fields['dropbox-config-instruction'] = array(
	'name'      => __( 'Instructions', 'wp-embedder-pack' ),
	'std'       => __( '<p>To integrate dropbox, you need to create new app in dropbox.</p>
<ol>
    <li>Sign in to <a href="https://dropbox.com" target="_blank">Dropbox.com</a></li>
	<li>Go to <a href="https://www.dropbox.com/developers/apps/">My Apps</a> page, then click on <b>Create app</b>.</li>
	<li>Choose <b>Dropbox API</b> and name your app whatever you want, then click <b>Create app</b>.</li>
	<li>If you got <b>This app name is already taken</b> Error, you can just add some random numbers at the end of the app name.</li>
	<li>In <b>Chooser/Saver domains</b> section, insert <code>' . $url . '</code> then click add button.</li>
	<li>Look for <b>App key</b> copy and paste it in the field above.</li>
</ol>', 'wp-embedder-pack' ),
	'id'        => 'dropbox-config-instruction',
	'type'      => 'info',
	'state'     => 'open',
	'info-type' => 'help',
	'show_on'   => array(
		array(
			'use-dropbox=1',
		)
	)
);

$fields[] = array(
	'name' => __( 'Translations', 'better-studio' ),
	'id'   => 'translations',
	'type' => 'tab',
	'icon' => 'bsai-global',
);


$fields['translation-download'] = array(
	'name' => __( 'Download', 'wp-embedder-pack' ),
	'id'   => 'translation-download',
	'type' => 'text',
);
