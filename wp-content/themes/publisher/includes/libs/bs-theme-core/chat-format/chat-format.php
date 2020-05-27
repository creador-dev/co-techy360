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


/* Filter the content of chat posts. */
add_filter( 'the_content', 'publisher_theme_format_chat_content', 9 );

if ( ! function_exists( 'publisher_theme_format_chat_content' ) ) {
	/**
	 * This function filters the post content when viewing a post with the "chat" post format.
	 *
	 * @author BetterStudio
	 *
	 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
	 *
	 * @param string $content               The content of the post.
	 *
	 * @return string $chat_output The formatted content of the post.
	 */
	function publisher_theme_format_chat_content( $content ) {

		global $publisher_theme_post_format_chat_ids;

		/* If this is not a 'chat' post, return the content. */
		if ( ! has_post_format( 'chat' ) ) {
			return $content;
		}

		$publisher_theme_post_format_chat_ids = array();

		$separator = apply_filters( 'publisher-theme-core/chat-format/separator', ':' );

		/* Split the content to get individual chat rows. */
		$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

		$last_speaker_id = $speaker_id = '';
		$collected_chat  = array();

		$counter = 1;

		foreach ( $chat_rows as $chat_row ) {

			if ( strpos( $chat_row, $separator ) ) {

				$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

				$chat_author = strip_tags( trim( $chat_row_split[0] ) );

				$speaker_id = publisher_theme_format_chat_row_id( $chat_author );

				if ( $last_speaker_id == $speaker_id ) {
					$collected_chat[ $counter - 1 ]['speaker_id']   = $last_speaker_id;
					$collected_chat[ $counter - 1 ]['speaker_name'] = '';
					$collected_chat[ $counter - 1 ]['class']        = 'chat-next-author';
				}

				$collected_chat[ $counter ] = array(
					'text'         => $chat_row_split[1],
					'speaker_id'   => $speaker_id,
					'speaker_name' => $chat_author,
					'class'        => '',
				);

			} elseif ( ! empty( $chat_row ) ) {

				if ( empty( $last_speaker_id ) ) {

					$collected_chat[ $counter ] = array(
						'text'         => $chat_row,
						'speaker_id'   => 'unknown',
						'speaker_name' => '',
						'class'        => 'chat-no-author',
					);


				} else {
					$collected_chat[ $counter ] = array(
						'text'         => $chat_row,
						'speaker_id'   => $last_speaker_id,
						'speaker_name' => '',
						'class'        => 'chat-next-author',
					);
				}

			}

			if ( ! empty( $speaker_id ) ) {
				$last_speaker_id = $speaker_id;
			}

			$counter ++;
		}

		/***
		 *
		 * Filters collected chat
		 *
		 */
		$collected_chat = apply_filters( 'publisher-theme-core/chat-format/collected-chat', $collected_chat );

		if ( count( $collected_chat ) <= 0 ) {
			return $content;
		}

		$chat_output = '<ul class="better-chat clearfix">';

		foreach ( $collected_chat as $chat_row ) {

			$chat_output .= '<li class="chat-item chat-speaker-' . sanitize_html_class( $chat_row['speaker_id'] ) . ' ' . $chat_row['class'] . '">';

			if ( ! empty( $chat_row['speaker_name'] ) ) {
				$chat_output .= '<span class="user-name">' . $chat_row['speaker_name'] /* escaped before */ . '</span>';
			}

			$chat_output .= str_replace( array( "\r", "\n", "\t", "<p></p>" ), '', $chat_row['text'] );

			$chat_output .= "</li>";

		}

		$chat_output .= "</ul>";


		/***
		 *
		 * Filters final chat content
		 *
		 */
		return apply_filters( 'publisher-theme-core/chat-format/content', $chat_output );

	} // publisher_theme_format_chat_content
} // if


if ( ! function_exists( 'publisher_theme_format_chat_row_id' ) ) {
	/**
	 * This function returns an ID based on the provided chat author name.
	 *
	 * @author BetterStudio
	 *
	 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
	 *
	 * @param string $chat_author           Author of the current chat row.
	 *
	 * @return int The ID for the chat row based on the author.
	 */
	function publisher_theme_format_chat_row_id( $chat_author ) {

		global $publisher_theme_post_format_chat_ids;

		$chat_author = strtolower( strip_tags( trim( $chat_author ) ) );

		if ( ! array_search( $chat_author, $publisher_theme_post_format_chat_ids ) ) {
			$publisher_theme_post_format_chat_ids[ count( $publisher_theme_post_format_chat_ids ) + 1 ] = $chat_author;
		}

		return absint( array_search( $chat_author, $publisher_theme_post_format_chat_ids ) );
	} // publisher_theme_format_chat_row_id
} // if
