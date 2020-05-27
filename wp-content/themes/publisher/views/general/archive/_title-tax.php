<?php
/**
 * Other taxonomies title template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$container_class = array(); // temp

// tax term raw name
$term_name = single_term_title( '', false );

// Custom title
if ( bf_get_term_meta( 'term_custom_title' ) != '' ) {
	$title = sprintf( bf_get_term_meta( 'term_custom_title' ), $term_name );;
} else {
	$title = $term_name;
}

// Pre title
if ( bf_get_term_meta( 'term_custom_pre_title' ) != '' ) {
	$pre_title = sprintf( bf_get_term_meta( 'term_custom_pre_title' ), $term_name );
} else {
	$pre_title = sprintf( publisher_translation_get( 'archive_tax_title' ), $term_name );
}

// Term Description
$term_desc = '';
if ( ! bf_get_term_meta( 'hide_term_description' ) && term_description() ) {

	$term_desc = '<div class="desc">' . do_shortcode( term_description() ) . '</div>';

	$container_class[] = 'with-desc';
}

?>
<section class="archive-title tax-title <?php echo esc_attr( implode( ' ', $container_class ) ); ?>">
	<div class="pre-title"><span><?php echo $pre_title; // escaped before ?></span></div>
	<h1 class="page-heading"><span class="h-title"><?php echo $title; // escaped before ?></span></h1>
	<?php echo $term_desc; // escaped before ?>
</section>
