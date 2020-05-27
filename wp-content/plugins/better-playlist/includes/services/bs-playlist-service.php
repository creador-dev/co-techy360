<?php


/**
 * Base interface of video source services that used to be more flexible in future
 */
interface BS_PlayList_Service_Interface {

	/**
	 * Fetch Videos Information
	 *
	 * @param array $videos List of Videos ID
	 *
	 * @return array {
	 *
	 *   'video id' => array of video information
	 *    .....
	 * }
	 */
	public function get_videos_info( $videos );

	public function get_playlist_info( $play_list_id );

	public function get_playlist_videos_info( $play_list_id );

	public function filter_atts( $atts );

	public function default_frame_url( $atts );

	public function change_video_frame_url( $atts );
}
