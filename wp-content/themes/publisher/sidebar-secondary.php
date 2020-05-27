<?php
/**
 * sidebar-secondary.php
 *
 * The template for displaying sidebars.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.8.4
 */
?>
<aside <?php publisher_attr( 'sidebar', '', 'secondary-sidebar' ) ?>>
	<?php dynamic_sidebar( 'secondary-sidebar' ); ?>
</aside>
