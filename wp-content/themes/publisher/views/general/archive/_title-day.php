<?php
/**
 * Daily archive title template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// date raw name
$date_name = get_the_date();

// Pre title
$pre_title = sprintf( publisher_translation_get( 'archive_daily_title' ), '<i>' . $date_name . '</i>' );

?>
<section class="archive-title daily-title">
	<div class="pre-title"><span><?php echo $pre_title; // escaped before ?></span></div>
	<h1 class="page-heading"><span class="h-title"><?php echo $date_name; // escaped before ?></span></h1>
	<?php publisher_archive_total_badge_code(); ?>
</section>
