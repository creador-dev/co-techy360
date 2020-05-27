<?php
/**
 * taxonomy.php
 *---------------------------
 * Used to display taxonomy archive page.
 *
 * Content is output based on which layout has been selected in theme option panel.
 * To view and/or edit the markup of layouts, go to "views/general/taxonomy" there is
 * some files tht handles multiple layouts.
 *
 * Layout files:
 *  - 1-col.php  : 1 column layout
 *  - 2-col.php  : 2 column layout
 *  - 3-col.php  : 3 column layout
 *
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.8.4
 */

get_header();

publisher_get_view( 'taxonomy', 'layout-' . publisher_get_page_layout_file() );

get_footer();
