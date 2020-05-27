<?php
/**
 * comments-multiple.php
 *
 * The template for displaying multiple comments.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.8.4
 */

$providers = Publisher_Comments::get_comments_providers();

?>
<section id="comments-template-<?php the_ID() ?>"
         class="comments-template comments-template-multiple providers-<?php echo bf_count( $providers ) ?>">
	<?php

	publisher_multiple_comments_form();

	?>
</section>
