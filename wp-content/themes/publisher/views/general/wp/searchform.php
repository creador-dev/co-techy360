<?php
/**
 * Search form
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
<form role="search" method="get" class="search-form clearfix" action="<?php echo home_url(); ?>">
	<input type="search" class="search-field"
	       placeholder="<?php publisher_translation()->_echo_esc_attr( 'search_dot' ); ?>"
	       value="<?php the_search_query() ?>" name="s"
	       title="<?php publisher_translation()->_echo_esc_attr( 'search_for' ); ?>"
	       autocomplete="off">
	<input type="submit" class="search-submit" value="<?php publisher_translation_echo( 'search' ); ?>">
</form><!-- .search-form -->
