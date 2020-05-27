<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


// Better translation style
wp_enqueue_style( 'publisher-translation', $this->get_dir_url() . 'css/style.css', array(), $this->get_version() );

// Better translation script
wp_enqueue_script( 'publisher-translation', $this->get_dir_url() . 'js/script.js', array(), $this->get_version(), true );

bf_enqueue_script( 'bf-modal' );
bf_enqueue_style( 'bf-modal' );

$change_translation_callback = 'Publisher_Translation::change_translation';
$share_translation_callback  = 'Publisher_Translation::callback_send_translation';

wp_localize_script(
	'publisher-translation',
	'publisher_theme_translation_loc',
	apply_filters(
		'publisher-theme-core/translation/localized-items',
		array(
			'ajax_url'                          => admin_url( 'admin-ajax.php' ),
			'nonce'                             => wp_create_nonce( 'bf_nonce' ),
			'type'                              => 'panel',
			'callback_change_translation'       => $change_translation_callback,
			'callback_change_translation_token' => Better_Framework::callback_token( $change_translation_callback ),
			'callback_send_translation'         => $share_translation_callback,
			'callback_send_translation_token'   => Better_Framework::callback_token( $share_translation_callback ),
			'current_lang'                      => $this->get_current_lang(),
			'lang'                              => bf_get_current_lang(),

			'change_confirm' => array(
				'header'     => __( 'Change Translation', 'publisher' ),
				'title'      => __( 'Are you sure to change translation?', 'publisher' ),
				'body'       => __( 'Do you want to change translation? all current translations will be lost!', 'publisher' ),
				'button_yes' => __( 'Yes, Change', 'publisher' ),
				'button_no'  => __( 'No', 'publisher' ),
				'loading'    => __( 'Changing language', 'publisher' ),
				'success'    => __( 'New Language Activated Successfully', 'publisher' ),
			),

			'share_confirm' => array(
				'icon'       => 'fa-share-alt',
				'header'     => __( 'Share your translation or correction', 'publisher' ),
				'title'      => '',
				'body'       => __( 'Your translations will be sent to our server and after a review process it will be available to all of the members of the community. Please make sure that you sent it for the correct language.<br/>%%language_dropdown%%<br/>Thank you for your trust and contribution and we will do our best to give back.', 'publisher' ),
				'button_yes' => __( 'Send translation or correction', 'publisher' ),
				'loading'    => __( 'Sending Translation ...', 'publisher' ),
				'success'    => __( 'Translation sent. thank you', 'publisher' ),
			),

			'on_error' => array(
				'button_ok'       => __( 'Ok', 'publisher' ),
				'default_message' => __( 'Error!', 'publisher' ),
				'body'            => __( 'please try again several minutes later or contact better studio team support.', 'publisher' ),
				'header'          => __( 'Translation error', 'publisher' ),
				'title'           => __( 'an error occurred', 'publisher' ),
				'titles'          => array(
					'share'  => __( 'an error occurred while sharing the language', 'publisher' ),
					'switch' => __( 'an error occurred while changing the language', 'publisher' ),
				),
				'display_error'   => __( '<div class="bs-pages-error-section">
					<a href="#" class="btn bs-pages-error-copy" data-copied="' . esc_attr__( 'Copied !', 'publisher' ) . '">
						<i class="fa fa-files-o" aria-hidden="true"></i> Copy</a>  <textarea> Error:  %ERROR_CODE% %ERROR_MSG% </textarea>
				</div>', 'publisher' ),
			)
		)
	)
);
