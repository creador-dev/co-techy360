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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * Class BF_Demo_Posts_Manager
 *
 * add or remove post & post meta
 */
class BF_Demo_Posts_Manager {

	/**
	 * Insert or update a post.
	 *
	 * array {
	 *
	 * @see wp_insert_post() $postarr params
	 *
	 * @type integer $thumbnail_id      Future Image Attachment Post ID
	 * @type string  $post_content_file Optional if 'post_content' index exists.file path to post content.
	 *      for long post content can save on file.
	 *
	 * @type string  $post_content      Optional if 'post_content_file' index exists.
	 * }
	 *
	 *
	 * @param Array  $post_params
	 *
	 * @return int|WP_Error WP_Error on Failure or post id on success.
	 */
	public function add_post( $post_params ) {

		$post_params = bf_merge_args( $post_params, array(
			'post_title'        => '',
			'post_status'       => 'publish',
			'post_content_file' => '',
			'post_content'      => '',
			'post_terms'        => '',
			'post_excerpt'      => '',
			'post_type'         => 'post',
			'post_excerpt_file' => '',
		) );

		/**
		 * Remove buggy plugins actions
		 */
		remove_action( 'save_post', 'kgvid_save_post' );

		try {

			if ( empty( $post_params['post_title'] ) ) {
				throw new Exception( 'post title could not be empty.' );
			}

			if ( ! empty( $post_params['post_content_file'] ) && ! is_readable( $post_params['post_content_file'] ) ) {
				throw new Exception( 'cannot read content of post.' );
			}

			if ( $post_params['post_excerpt_file'] && ! is_readable( $post_params['post_excerpt_file'] ) ) {
				throw new Exception( 'cannot read excerpt of post.' );
			}

			if ( ! empty( $post_params['thumbnail_id'] ) && ! wp_attachment_is_image( $post_params['thumbnail_id'] ) ) {
				throw new Exception( 'invalid post thumbnail.' );
			}

			//validate post terms
			$post_terms = array();

			if ( $post_params['post_terms'] && is_array( $post_params['post_terms'] ) ) {

				foreach ( $post_params['post_terms'] as $taxonomy => $terms_id ) {

					if ( ! taxonomy_exists( $taxonomy ) ) {
						throw new Exception( sprintf( 'invalid taxonomy %s', $taxonomy ) );
					}

					$post_terms[ $taxonomy ] = array_map( 'intval', explode( ',', $terms_id ) );
				}
			}


			if ( $post_params['post_content_file'] ) {
				$post_params['post_content'] = BF_Product_Demo_Installer::Run()->apply_pattern( bf_get_local_file_content( $post_params['post_content_file'] ) );
				unset( $post_params['post_content_file'] );
			} elseif ( $post_params['post_content'] ) {

				$post_params['post_content'] = BF_Product_Demo_Installer::Run()->apply_pattern( $post_params['post_content'] );
			}

			// read excerpt from file
			if ( $post_params['post_excerpt_file'] ) {
				$post_params['post_excerpt'] = BF_Product_Demo_Installer::Run()->apply_pattern( bf_get_local_file_content( $post_params['post_excerpt_file'] ) );
				unset( $post_params['post_excerpt_file'] );
			}

			// adds "bs" to slug
			if ( empty( $post_params['post_name'] ) ) {
				$post_params['post_name'] = 'bs-' . $post_params['post_title'];
			}

			BF_Product_Demo_Installer::data_params_filter( $post_params );

			$maybe_post_id = wp_insert_post( $post_params );

			if ( is_wp_error( $maybe_post_id ) ) {
				return $maybe_post_id;
			}

			$post_id = &$maybe_post_id;

			foreach ( $post_terms as $taxonomy => $terms_id ) {
				wp_set_post_terms( $post_id, $terms_id, $taxonomy );
			}

			if ( ! empty( $post_params['thumbnail_id'] ) ) {
				set_post_thumbnail( $post_id, $post_params['thumbnail_id'] );
			}


			if ( ! empty( $post_params['post_format'] ) ) {
				set_post_format( $post_id, $post_params['post_format'] );
			}

			// Regenerates VC styles again because VC can not generate!
			if ( isset( $post_params['prepare_vc_css'] ) && $post_params['prepare_vc_css'] && ! empty( $post_params['post_content'] ) ) {

				// match all shortcodes
				preg_match_all( '/ css=\"([^\"]*)\"/', $post_params['post_content'], $shortcodes );

				$final_css = '';

				foreach ( $shortcodes[1] as $css ) {
					$final_css .= $css;
				}

				update_post_meta( $post_id, '_wpb_shortcodes_custom_css', $final_css );
			}

			return $post_id;

		} catch( Exception $e ) {

			return new WP_Error( 'add_post_error', $e->getMessage() );
		}
	}


	/**
	 * delete a post
	 *
	 * @param $post_id post ID to delete
	 *
	 * @return bool true on success or false on failure
	 */

	public function remove_post( $post_id ) {

		return (bool) wp_delete_post( $post_id, TRUE );
	}


	/**
	 * @param Array $post_params
	 *
	 * @see add_post()
	 *
	 * @return int|WP_Error WP_Error on Failure or post id on success.
	 */

	public function add_page( $post_params ) {

		$post_params['post_type'] = 'page';

		return $this->add_post( $post_params );
	}


	/**
	 *
	 * prepare a array with three index to pass update_post_meta, add_post_meta,
	 * delete_post_meta function via call_user_func_array function.
	 *
	 * @param Array $term_meta_params
	 *
	 * @return array
	 */
	protected function get_meta_params( $term_meta_params ) {

		$required_params = array(
			'post_id'    => '',
			'meta_key'   => '',
			'meta_value' => '',
		);

		if ( ! array_diff_key( $required_params, $term_meta_params ) ) {

			return array(
				$term_meta_params['post_id'],
				$term_meta_params['meta_key'],
				$term_meta_params['meta_value']
			);
		}
	}


	/**
	 * @param Array $post_meta_params
	 *
	 * @see get_meta_params()
	 *
	 * @return int|false Meta ID on success, false on failure.
	 */
	public function add_post_meta( $post_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $post_meta_params ) ) {

			return call_user_func_array( 'add_post_meta', $meta_params );
		}
	}


	/**
	 * @param $post_meta_id post meta unique id in database
	 *
	 * @return bool True on successful delete, false on failure.
	 */
	public function remove_post_meta( $post_meta_id ) {

		return delete_metadata_by_mid( 'post', $post_meta_id );
	}


	/**
	 * delete a post meta from database
	 *
	 * @param Array $post_meta_params
	 *
	 * @see get_meta_params()
	 *
	 * @return int|false Meta ID on success, false on failure.
	 */
	public function delete_post_meta( $post_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $post_meta_params ) ) {

			return call_user_func_array( 'delete_post_meta', $meta_params );
		}
	}


	/**
	 * Update post meta field
	 *
	 * @param Array $post_meta_params
	 *
	 * @see get_meta_params()
	 *
	 * @return int|bool Meta ID if the key didn't exist, true on successful update, false on failure.
	 */

	public function update_post_meta( $post_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $post_meta_params ) ) {

			return call_user_func_array( 'update_post_meta', $meta_params );
		}
	}


	/**
	 * get post meta field value
	 *
	 * @param $post_meta_params
	 *
	 * @see get_meta_params()
	 *
	 * @return mixed  value of meta data
	 */
	public function get_post_meta( $post_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $post_meta_params ) ) {

			unset( $meta_params[2] );

			return call_user_func_array( 'get_post_meta', $meta_params );
		}
	}

}
