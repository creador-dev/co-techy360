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


$fields['custom_fonts'] = array(
	'default' => array(
		array(
			'id'    => __( 'Font %i%', 'better-studio' ),
			'woff2' => '',
			'woff'  => '',
			'ttf'   => '',
			'svg'   => '',
			'eot'   => '',
			'otf'   => '',
		),
	),
);

$font_stacks['id']                = array(
	'std' => '',
);
$font_stacks['stack']             = array(
	'std' => '',
);
$fields['font_stacks']            = array(
	'default' => array(
		array(
			'id'    => 'Arial',
			'stack' => 'Arial,"Helvetica Neue",Helvetica,sans-serif',
		),
		array(
			'id'    => 'Arial Black',
			'stack' => '"Arial Black","Arial Bold",Gadget,sans-serif',
		),
		array(
			'id'    => 'Arial Narrow',
			'stack' => '"Arial Narrow",Arial,sans-serif',
		),
		array(
			'id'    => 'Calibri',
			'stack' => 'Calibri,Candara,Segoe,"Segoe UI",Optima,Arial,sans-serif',
		),
		array(
			'id'    => 'Gill Sans',
			'stack' => '"Gill Sans","Gill Sans MT",Calibri,sans-serif',
		),
		array(
			'id'    => 'Helvetica',
			'stack' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		),
		array(
			'id'    => 'Tahoma',
			'stack' => 'Tahoma,Verdana,Segoe,sans-serif',
		),
		array(
			'id'    => 'Trebuchet MS',
			'stack' => '"Trebuchet MS","Lucida Grande","Lucida Sans Unicode","Lucida Sans",Tahoma,sans-serif',
		),
		array(
			'id'    => 'Verdana',
			'stack' => 'Verdana,Geneva,sans-serif',
		),
		array(
			'id'    => 'Georgia',
			'stack' => 'Georgia,Times,"Times New Roman",serif',
		),
		array(
			'id'    => 'Palatino',
			'stack' => 'Palatino,"Palatino Linotype","Palatino LT STD","Book Antiqua",Georgia,serif',
		),
		array(
			'id'    => 'Courier New',
			'stack' => '"Courier New",Courier,"Lucida Sans Typewriter","Lucida Typewriter",monospace',
		),
		array(
			'id'    => 'Lucida Sans Typewriter',
			'stack' => '"Lucida Sans Typewriter","Lucida Console",monaco,"Bitstream Vera Sans Mono",monospace',
		),
		array(
			'id'    => 'Copperplate',
			'stack' => 'Copperplate,"Copperplate Gothic Light",fantasy',
		),
		array(
			'id'    => 'Papyrus',
			'stack' => 'Papyrus,fantasy',
		),
		array(
			'id'    => 'Brush Script MT',
			'stack' => '"Brush Script MT",cursive',
		),
		array(
			'id'    => 'System Font',
			'stack' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", "Open Sans", sans-serif',
		),
	),
);
$fields['typekit_code']           = array(
	'std' => '',
);
$fields['typekit_fonts']          = array(
	'default' => array(
		array(
			'name' => '',
			'id'   => '',
		),
	),
);
$fields['google_fonts_protocol']  = array(
	'std' => 'http',
);
$fields['typo_text_heading']      = array(
	'std' => __( 'This is a test heading text', 'better-studio' ),
);
$fields['typo_text_font_manager'] = array(
	'std' => __( 'The face of the moon was in shadow', 'better-studio' ),
);
$fields['typo_text_paragraph']    = array(
	'std' => __( 'Grumpy wizards make toxic brew for the evil Queen and Jack. One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.', 'better-studio' ),
);
$fields['typo_text_divided']      = array(
	'std' => __( 'a b c d e f g h i j k l m n o p q r s t u v w x y z
A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
0123456789 (!@#$%&.,?:;)', 'better-studio' ),
);

