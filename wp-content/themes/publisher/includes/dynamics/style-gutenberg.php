<?php
/***
 *
 * Gutenberg specific styles for editor
 *
 */

$output = '';

// Print Gutenberg style
{
	ob_start();
	include 'style-gutenberg.css';
	$output .= ob_get_clean() . "\n\n";
}

return $output;
