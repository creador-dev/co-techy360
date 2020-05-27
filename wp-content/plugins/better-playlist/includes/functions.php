<?php


if ( ! function_exists( 'bsp_get_video_thumbnail' ) ) {
	/**
	 *
	 * @param $video_thumbnails
	 *
	 * @return bool
	 */
	function bsp_get_video_thumbnail( $video_thumbnails ) {

		if ( ! is_object( $video_thumbnails ) ) {
			return FALSE;
		}

		foreach ( array( 'default', 'medium', 'small' ) as $size ) {
			if ( property_exists( $video_thumbnails, $size ) ) {

				$thumb_obj = (object) $video_thumbnails->$size;
				if ( ! empty( $thumb_obj->url ) ) {
					return $thumb_obj->url;
				}
			}
		}

	}
}


if ( ! function_exists( 'bsp_get_video_duration' ) ) {
	/**
	 * Format ISO 8601 date to display user
	 *
	 * @param int|string $duration
	 *
	 *   int type means the duration is in seconds
	 *   sting type means the date is in iso 8601 format
	 *
	 * @return bool|string
	 */
	function bsp_get_video_duration( $duration ) {

		if ( is_int( $duration ) ) {
			return bsp_format_second_duration( $duration );
		}

		$duration = trim( $duration );
		if ( ! isset( $duration[0] ) || ( $duration[0] !== 'P' && $duration[0] !== 'p' ) ) {
			return FALSE;
		}

		$duration = bf_get_date_interval( $duration );
		if ( $duration->h ) {

			return sprintf( '%02d:%02d:%02d', $duration->h, $duration->i, $duration->s );
		} else {

			return sprintf( '%02d:%02d', $duration->i, $duration->s );
		}
	}
}


if ( ! function_exists( 'bsp_format_second_duration' ) ) {
	/**
	 * Format Seconds as duration
	 *
	 * @param string|int $seconds
	 *
	 * @return bool|string string on success false otherwise
	 */
	function bsp_format_second_duration( $seconds ) {
		$duration = (int) $seconds;
		if ( $duration ) {

			$hours = floor( $seconds / 3600 );
			$mins  = floor( $seconds / 60 % 60 );
			$secs  = floor( $seconds % 60 );

			if ( $hours ) {

				return sprintf( '%02d:%02d:%02d', $hours, $mins, $secs );
			} else {

				return sprintf( '%02d:%02d', $mins, $secs );
			}
		}

		return FALSE;
	}
}


if ( ! function_exists( 'bsp_get_google_api_key' ) ) {

	/**
	 * Better Studio Google API Key
	 *
	 * @return string
	 */
	function bsp_get_google_api_key() {

		return 'AIzaSyBAwpfyAadivJ6EimaAOLh-F1gBeuwyVoY';
	}
}


//
//
// Global variable that used for save playlist property for making changing template files easily ;)
//
//

// Used to save all playlist properties
$GLOBALS['bsp_props_cache'] = array();

if ( ! function_exists( 'bsp_set_prop' ) ) {
	/**
	 * Used to set a block property value.
	 *
	 * @param   string $id
	 * @param   mixed  $value
	 *
	 * @return  mixed
	 */
	function bsp_set_prop( $id, $value ) {

		global $bsp_props_cache;

		$bsp_props_cache[ $id ] = $value;

	}
}


if ( ! function_exists( 'bsp_get_prop' ) ) {
	/**
	 * Used to get a property value.
	 *
	 * @param   string $id
	 * @param   mixed  $default
	 *
	 * @return  mixed
	 */
	function bsp_get_prop( $id, $default = NULL ) {

		global $bsp_props_cache;

		if ( isset( $bsp_props_cache[ $id ] ) ) {
			return $bsp_props_cache[ $id ];
		} else {
			return $default;
		}

	}
}


if ( ! function_exists( 'bsp_clear_prop' ) ) {
	/**
	 * Used to clear all properties.
	 *
	 * @return  void
	 */
	function bsp_clear_prop() {

		global $bsp_props_cache;

		$bsp_props_cache = array();

	}
}
