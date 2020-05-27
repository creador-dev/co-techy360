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

if ( class_exists( 'BF_Ajax_Select_Callbacks' ) ) {
	return;
}


/**
 * Contain General callbacks that used in BF Ajax Select field
 */
class BF_Ajax_Select_Callbacks {


	/**
	 * Used for finding post name from ID
	 *
	 * @param $id
	 *
	 * @return string
	 */
	static function post_name( $id ) {

		return get_the_title( $id );

	}


	/**
	 * Used to retrieving posts from an keyword
	 *
	 * @param $keyword
	 * @param $exclude
	 *
	 * @return array
	 */
	static function posts_callback( $keyword, $exclude ) {

		$exclude = explode( ',', $exclude );

		$q = new WP_Query( array(
			'post_type'      => array( 'post' ),
			'posts_per_page' => 10,
			's'              => $keyword,
			'post__not_in'   => $exclude
		) );

		$results = array();

		while( $q->have_posts() ) {

			$q->the_post();

			$results[ get_the_ID() ] = get_the_title();

		}

		return $results;
	}


	/**
	 * Used for finding Category Name from ID
	 *
	 * @param $id
	 *
	 * @return string
	 */
	static function cat_name( $id ) {

		$cat = get_term( $id, 'category' );

		return $cat->name;
	}


	/**
	 * Used for finding Category Name from slug
	 *
	 * @param $id
	 *
	 * @return string
	 */
	static function cat_by_slug_name( $id ) {

		$cat = get_term_by( 'slug', $id, 'category' );

		return $cat->name;
	}


	/**
	 * Used to retrieving Categories from an keyword
	 *
	 * @param $keyword
	 * @param $exclude
	 *
	 * @return array
	 */
	static function cats_callback( $keyword, $exclude ) {

		$results = array();

		$exclude = explode( ',', $exclude );

		$args = array(
			'search'  => $keyword,
			'exclude' => $exclude
		);

		$terms = get_terms( "category", $args );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {
				$results[ $term->term_id ] = $term->name;
			}

		}

		return $results;
	}


	/**
	 * Used to retrieving Categories from an keyword ( cat slug as id )
	 *
	 * @param $keyword
	 * @param $exclude
	 *
	 * @return array
	 */
	static function cats_slug_callback( $keyword, $exclude ) {

		$results = array();

		$exclude = explode( ',', $exclude );

		$args = array(
			'search'  => $keyword,
			'exclude' => $exclude
		);

		$terms = get_terms( "category", $args );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {
				$results[ $term->slug ] = $term->name;
			}
		}

		return $results;
	}


	/**
	 * Used for finding Category Name from ID
	 *
	 * @param $id
	 *
	 * @return string|void string on success or null on failure.
	 */
	static function tag_name( $id ) {

		$cat = get_term( $id, 'post_tag' );

		if ( $cat && ! is_wp_error( $cat ) ) {
			return $cat->name;
		}
	}


	/**
	 * Used for finding Category Name from slug
	 *
	 * @param $id
	 *
	 * @return string
	 */
	static function tag_by_slug_name( $id ) {

		$cat = get_term_by( 'slug', $id, 'post_tag' );

		return $cat->name;
	}


	/**
	 * Used to retrieving Tags from an keyword
	 *
	 * @param $keyword
	 * @param $exclude
	 *
	 * @return array
	 */
	static function tags_callback( $keyword, $exclude ) {

		$results = array();

		$exclude = explode( ',', $exclude );

		$args = array(
			'search'     => $keyword,
			'exclude'    => $exclude,
			'hide_empty' => false
		);

		$terms = get_terms( "post_tag", $args );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {
				$results[ $term->term_id ] = $term->name;
			}
		}

		return $results;
	}


	/**
	 * Used to retrieving Tags from an keyword
	 *
	 * @param $keyword
	 * @param $exclude
	 *
	 * @return array
	 */
	static function tags_slug_callback( $keyword, $exclude ) {

		$results = array();

		$exclude = explode( ',', $exclude );

		$args = array(
			'search'  => $keyword,
			'exclude' => $exclude
		);

		$terms = get_terms( "post_tag", $args );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {
				$results[ $term->slug ] = $term->name;
			}
		}

		return $results;
	}

}