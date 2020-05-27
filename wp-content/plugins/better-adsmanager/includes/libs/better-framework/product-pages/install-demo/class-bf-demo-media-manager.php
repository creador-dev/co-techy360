<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


/**
 * Class BF_Demo_Media_Manager
 *
 * Import and rollback Media file
 */
class BF_Demo_Media_Manager {

	/**
	 *
	 *
	 * @param string       $image_url   remote image url
	 * @param string|array $args        {
	 *
	 *  Optional. Array or string of arguments to handle upload & resize image.
	 *
	 * @type int           $post_id     The post ID the media is associated with
	 *
	 * @type string        $description Description of the sideloaded file
	 *
	 * @type string        $filename    basename of the file
	 *              default remote file ($image_url) basename
	 *
	 * $type bool   $resize enable generating thumbnail image.
	 *              default true.
	 * }
	 *
	 * @return bool|int|WP_Error int attachment_id  on success WP_Error or False otherwise.
	 */
	public function add_image( $image_url, $args = array() ) {

		//check file type

		$file_basename = basename( $image_url );
		$file_type     = wp_check_filetype( $file_basename );
		if ( empty( $file_type['type'] ) || substr( $file_type['type'], 0, 6 ) !== 'image/' ) {
			return false;
		};


		//some functions need such as media_handle_sideload() exists in this files
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';

		//download image and save in /tmp folder
		$temp_file = download_url( $image_url );
		if ( is_wp_error( $temp_file ) ) {
			return $temp_file;
		}

		$args = wp_parse_args( $args, array(
			'post_id'     => null,
			'description' => null,
			'file_name'   => $file_basename,
			'resize'      => true,
		) );

		//prepare a variable similar to $_FILES to pass media_handle_sideload() function
		$file_data = array(
			'name'     => $args['file_name'],
			'tmp_name' => $temp_file
		);

		//disable generate thumbnails by empty list of image sizes
		if ( ! $args['resize'] ) {

			add_filter( 'intermediate_image_sizes', '__return_empty_array', 9999 );
		}

		$maybe_attachment_id = media_handle_sideload( $file_data, $args['post_id'], $args['description'] );

		if ( is_wp_error( $maybe_attachment_id ) ) {
			return $maybe_attachment_id;
		}


		if ( ! $args['resize'] ) {

			remove_filter( 'intermediate_image_sizes', '__return_empty_array', 9999 );
		}

		$attachment_id = &$maybe_attachment_id;

		return $attachment_id;
	}


	/**
	 * force delete attachment by media ID
	 *
	 * @param $media_id attachment post id in database
	 *
	 * @return bool true on success or false on failure
	 */

	public function remove_image( $media_id ) {


		return (bool) wp_delete_attachment( $media_id, true );
	}
}