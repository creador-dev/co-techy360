<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   3.0.0
 */


/**
 * Fires before close of ".main-wrap"
 *
 * @since 1.9.0
 */
do_action( 'publisher/main-wrap/end' );


$page_layout   = publisher_get_page_boxed_layout();
$footer_layout = publisher_get_footer_layout();


//
// Boxed Page but Full Footer
//
{
	$_check = array(
		'out-full-width' => '',
		'out-stretched'  => '',
	);

	if ( isset( $_check[ $footer_layout ] ) ) {
		?>
		</div><!-- .main-wrap -->
		<?php
	}
}


// Footer style 1
if ( publisher_get_footer_style() !== 'disable' ) {
	publisher_get_view( 'footer', publisher_get_footer_style() );
}


//
// Full Width Page boxed Footer
//
{
	$_check = array(
		'boxed'      => '',
		'full-width' => '',
		'stretched'  => '',
	);

	if ( isset( $_check[ $footer_layout ] ) ) {
		?>
		</div><!-- .main-wrap -->
		<?php
	}
}


/**
 * Fires after ".main-wrap" close
 *
 * @since 1.9.0
 */
do_action( 'publisher/main-wrap/after' );

if ( publisher_get_option( 'back_to_top' ) == 'show' ) { ?>
	<span class="back-top"><i class="fa fa-arrow-up"></i></span>
<?php } ?>

<?php wp_footer(); // WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>

</body>
</html>