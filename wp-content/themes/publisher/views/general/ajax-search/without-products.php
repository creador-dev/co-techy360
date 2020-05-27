<?php
/**
 * Ajax search result (only posts)
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
<div class="ajax-search-results-wrapper ajax-search-no-product">
	<div class="ajax-search-results">
		<div class="ajax-ajax-posts-list">
			<div class="ajax-posts-column">
				<div class="clean-title heading-typo">
					<span><?php publisher_translation_echo( 'search_posts' ) ?></span>
				</div>
				<div class="posts-lists" data-section-name="posts"></div>
			</div>
		</div>
		<div class="ajax-taxonomy-list">
			<div class="ajax-categories-columns">
				<div class="clean-title heading-typo">
					<span><?php publisher_translation_echo( 'search_categories' ) ?></span>
				</div>
				<div class="posts-lists" data-section-name="categories"></div>
			</div>
			<div class="ajax-tags-columns">
				<div class="clean-title heading-typo">
					<span><?php publisher_translation_echo( 'search_tags' ) ?></span>
				</div>
				<div class="posts-lists" data-section-name="tags"></div>
			</div>
		</div>
	</div>
</div>
