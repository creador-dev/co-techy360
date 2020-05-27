<?php
/**
 * Main DOM <head> section
 *
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
	<!DOCTYPE html>
	<?php

	// note: i know we can use get_language_attributes() instead of language_attributes()
	//  it's just for backward compatibility. :-P
	ob_start();
	language_attributes();
	$lang_attributes = ob_get_clean();

	?>
	<!--[if IE 8]>
	<html class="ie ie8" <?php echo $lang_attributes; ?>> <![endif]-->
	<!--[if IE 9]>
	<html class="ie ie9" <?php echo $lang_attributes; ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html <?php echo $lang_attributes; ?>> <!--<![endif]-->
	<head>
		<?php

		// GTM After <head> code
		if ( publisher_get_option( 'gtm_head' ) ) {
			echo publisher_get_option( 'gtm_head' );
		}

		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

		<?php wp_head(); ?>
	</head>

<body <?php publisher_attr( 'body' ); ?>>
<?php

// GTM After <body> code
if ( publisher_get_option( 'gtm_body' ) ) {
	echo publisher_get_option( 'gtm_body' );
}
