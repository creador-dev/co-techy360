<?php
/**
 * sidebar-primary.php
 *
 * The template for displaying sidebars.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.8.4
 */
?>
<aside <?php publisher_attr( 'sidebar', '', 'primary-sidebar' ) ?>>
	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside>
