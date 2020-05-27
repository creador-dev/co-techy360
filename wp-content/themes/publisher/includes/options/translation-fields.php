<?php


//
// Times
//
$fields[]                     = array(
	'name'  => __( 'Date & Times', 'publisher' ),
	'desc'  => sprintf( __( 'You can use <a target="_blank" href="%s">WordPress Formatting Date and Time</a> documentation translating following words', 'publisher' ), 'https://goo.gl/isGmRf' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['post_time']          = array(
	'name'            => __( 'Post Publish Time', 'publisher' ),
	'id'              => 'post_time',
	'std'             => 'M j, Y',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_time']       = array(
	'name'            => __( 'Listings Time', 'publisher' ),
	'id'              => 'comment_time',
	'std'             => 'M j, Y',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['topbar_date_format'] = array(
	'name'            => __( 'Topbar Date Format', 'publisher' ),
	'id'              => 'topbar_date_format',
	'std'             => 'l, F j, Y',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// General Texts
//
$fields[]                  = array(
	'name'  => __( 'General Texts', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['heading']         = array(
	'name'            => __( 'Heading', 'publisher' ),
	'id'              => 'heading',
	'std'             => 'Heading',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['menu_all']        = array(
	'name'            => __( 'All', 'publisher' ),
	'id'              => 'menu_all',
	'std'             => 'All',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['select_main_nav'] = array(
	'name'            => __( 'Select a menu for "Main Navigation"', 'publisher' ),
	'id'              => 'select_main_nav',
	'std'             => 'Select a menu for "Main Navigation"',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['select_top_nav']  = array(
	'name'            => __( 'Select a menu for "Topbar Navigation"', 'publisher' ),
	'id'              => 'select_top_nav',
	'std'             => 'Select a menu for "Topbar Navigation"',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['lightbox_expand'] = array(
	'name'            => __( 'Lightbox: Expand the image', 'publisher' ),
	'id'              => 'lightbox_expand',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['lightbox_close']  = array(
	'name'            => __( 'Lightbox: Close', 'publisher' ),
	'id'              => 'lightbox_close',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Posts & Pages
//
$fields[]                          = array(
	'name'  => __( 'Posts and Pages', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['via']                     = array(
	'name'            => __( 'Via', 'publisher' ),
	'id'              => 'via',
	'std'             => 'Via',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['source']                  = array(
	'name'            => __( 'Source', 'publisher' ),
	'id'              => 'source',
	'std'             => 'Source',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['edit_post']               = array(
	'name'            => __( 'Edit post', 'publisher' ),
	'id'              => 'edit_post',
	'std'             => 'Edit',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['related_heading']         = array(
	'name'            => __( 'You might also like', 'publisher' ),
	'id'              => 'related_heading',
	'std'             => 'You might also like',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['this_author_posts']       = array(
	'name'            => __( 'This author posts', 'publisher' ),
	'id'              => 'this_author_posts',
	'std'             => 'More from author',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['continue_reading']        = array(
	'name'            => __( 'Read more...', 'publisher' ),
	'id'              => 'continue_reading',
	'std'             => 'Read More...',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['continue_reading_mobile'] = array(
	'name'            => __( 'Continue Reading', 'publisher' ),
	'id'              => 'continue_reading_mobile',
	'std'             => 'Continue Reading',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['pm_by']                   = array(
	'name' => __( 'By', 'publisher' ),
	'id'   => 'pm_by',
	'type' => 'text',
	'desc' => __( '%s will be replaced with author name', 'publisher' ),
);
$fields['pm_on']                   = array(
	'name' => __( 'Published On', 'publisher' ),
	'id'   => 'pm_on',
	'type' => 'text',
	'desc' => __( '%s will be replaced with post publish date', 'publisher' ),
);
$fields['pm_last_updated']         = array(
	'name' => __( 'Last Updated', 'publisher' ),
	'id'   => 'pm_last_updated',
	'type' => 'text',
	'desc' => __( '%s will be replaced with post updated date', 'publisher' ),
);
$fields['post_next_post']          = array(
	'name' => __( 'Next Post', 'publisher' ),
	'id'   => 'post_next_post',
	'type' => 'text',
);
$fields['post_prev_post']          = array(
	'name' => __( 'Prev Post', 'publisher' ),
	'id'   => 'post_prev_post',
	'type' => 'text',
);
$fields['post_share']              = array(
	'name' => __( 'Post Share Button', 'publisher' ),
	'id'   => 'post_share',
	'type' => 'text',
);
$fields['more_stories']            = array(
	'name' => __( 'More Stories', 'publisher' ),
	'id'   => 'more_stories',
	'type' => 'text',
);
$fields['read_more']               = array(
	'name' => __( 'Read More', 'publisher' ),
	'id'   => 'read_more',
	'type' => 'text',
);
$fields['related_posts']           = array(
	'name' => __( 'Related Posts', 'publisher' ),
	'id'   => 'related_posts',
	'type' => 'text',
);
$fields['view_all_posts']          = array(
	'name' => __( 'View all posts', 'publisher' ),
	'id'   => 'view_all_posts',
	'type' => 'text',
);
$fields['print']                   = array(
	'name' => __( 'Share Print Button', 'publisher' ),
	'id'   => 'print',
	'type' => 'text',
);
$fields['email']                   = array(
	'name' => __( 'Share Email Button', 'publisher' ),
	'id'   => 'email',
	'type' => 'text',
);


//
// Search
//
$fields[]                = array(
	'name'  => __( 'Search', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['search_dot']    = array(
	'name'            => __( 'Search..."', 'publisher' ),
	'id'              => 'search_dot',
	'std'             => 'Search...',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_for']    = array(
	'name'            => __( 'Search for', 'publisher' ),
	'id'              => 'search_for',
	'std'             => 'Search for:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search']        = array(
	'name'            => __( 'Search', 'publisher' ),
	'id'              => 'search',
	'std'             => 'Search',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['products']      = array(
	'name'            => __( 'Products', 'publisher' ),
	'id'              => 'products',
	'std'             => 'Products',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['categories']    = array(
	'name'            => __( 'Categories', 'publisher' ),
	'id'              => 'categories',
	'std'             => 'Categories',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['tags']          = array(
	'name'            => __( 'Tags', 'publisher' ),
	'id'              => 'tags',
	'std'             => 'Tags',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['searched_cats'] = array(
	'name'            => __( 'Categories:', 'publisher' ),
	'id'              => 'searched_cats',
	'std'             => 'Categories:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['searched_tags'] = array(
	'name'            => __( 'Tags:', 'publisher' ),
	'id'              => 'searched_tags',
	'std'             => 'Tags:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Footer
//
$fields[]                          = array(
	'name'  => __( 'Footer', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['footer_instagram_follow'] = array(
	'name'            => __( 'Follow Us', 'publisher' ),
	'id'              => 'footer_instagram_follow',
	'std'             => 'Follow Us',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Breadcrumb
//
$fields[]                    = array(
	'name'  => __( 'Breadcrumb', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['bc_home']           = array(
	'name'            => __( 'Home', 'publisher' ),
	'id'              => 'bc_home',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bc_archives']       = array(
	'name'            => __( 'Archives', 'publisher' ),
	'id'              => 'bc_archives',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bc_search']         = array(
	'name'            => __( 'Search page', 'publisher' ),
	'id'              => 'bc_search',
	'desc'            => __( '<code>%s</code> is the search query. The HTML entities are opening and closing curly quotes.', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bc_paged']          = array(
	'name'            => __( 'Paginated page', 'publisher' ),
	'id'              => 'bc_paged',
	'desc'            => __( '<code>%s</code> is the page number.', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bc_archive_minute'] = array(
	'name'            => __( 'Minute archive title', 'publisher' ),
	'id'              => 'bc_archive_minute',
	'desc'            => __( '<code>%s</code> is the minute time format.', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bc_archive_week']   = array(
	'name'            => __( 'Weekly archive title', 'publisher' ),
	'id'              => 'bc_archive_week',
	'desc'            => __( '<code>%s</code> is the week date format.', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bc_404']            = array(
	'name'            => __( '404 Not Found', 'publisher' ),
	'id'              => 'bc_404',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Attachment
//
$fields[]                       = array(
	'name'  => __( 'Attachment Page', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['attachment_return_to'] = array(
	'name'            => __( 'Return to ""', 'publisher' ),
	'id'              => 'attachment_return_to',
	'std'             => 'Return to "%s"',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['attachment_next']      = array(
	'name'            => __( 'Next Attachment', 'publisher' ),
	'id'              => 'attachment_next',
	'std'             => 'Next',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['attachment_prev']      = array(
	'name'            => __( 'Previous Attachment', 'publisher' ),
	'id'              => 'attachment_prev',
	'std'             => 'Previous',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_posts']         = array(
	'name'            => __( 'Posts', 'publisher' ),
	'id'              => 'search_posts',
	'std'             => 'Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_products']      = array(
	'name'            => __( 'Products', 'publisher' ),
	'id'              => 'search_products',
	'std'             => 'Products',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_categories']    = array(
	'name'            => __( 'Categories', 'publisher' ),
	'id'              => 'search_categories',
	'std'             => 'Categories',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_tags']          = array(
	'name'            => __( 'Tags', 'publisher' ),
	'id'              => 'search_tags',
	'std'             => 'Tags',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_not_found']     = array(
	'name'            => __( 'Nothing Found', 'publisher' ),
	'id'              => 'search_not_found',
	'std'             => 'Pot not found!',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_cat_not_found'] = array(
	'name'            => __( 'No category found', 'publisher' ),
	'id'              => 'search_cat_not_found',
	'std'             => 'Category not found!',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['search_tag_not_found'] = array(
	'name'            => __( 'No tag found', 'publisher' ),
	'id'              => 'search_tag_not_found',
	'std'             => 'Tag not found!',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['more_products']        = array(
	'name'            => __( 'More Products...', 'publisher' ),
	'id'              => 'more_products',
	'std'             => 'More Products&hellip;',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['more_posts']           = array(
	'name'            => __( 'More Posts...', 'publisher' ),
	'id'              => 'more_posts',
	'std'             => 'More Posts&hellip;',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Archives
//
$fields[]                         = array(
	'name'  => __( 'Archive Pages', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['archive_cat_title']      = array(
	'name'            => __( 'Category Archive Page Title', 'publisher' ),
	'id'              => 'archive_cat_title',
	'std'             => 'Browsing Category',
	'type'            => 'text',
	'desc'            => __( '%s can be replaced with category title.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_tag_title']      = array(
	'name'            => __( 'Tag Archive Page Title', 'publisher' ),
	'id'              => 'archive_tag_title',
	'std'             => 'Browsing Tag',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with tag title.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_tax_title']      = array(
	'name'            => __( 'Custom Taxonomy Archive Page Title', 'publisher' ),
	'id'              => 'archive_tax_title',
	'std'             => 'Browsing',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with term title.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_search_title']   = array(
	'name'            => __( 'Search Archive Page Title', 'publisher' ),
	'id'              => 'archive_search_title',
	'std'             => 'Search Results',
	'type'            => 'text',
	'desc'            => __( 'First %s will be replaced with search keyword and second %s will be replaced with search result count.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_daily_title']    = array(
	'name'            => __( 'Daily Archive Page Title', 'publisher' ),
	'id'              => 'archive_daily_title',
	'std'             => 'Daily Archives',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with day.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_monthly_title']  = array(
	'name'            => __( 'Month Archive Page Title', 'publisher' ),
	'id'              => 'archive_monthly_title',
	'std'             => 'Monthly Archives',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with month.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_monthly_format'] = array(
	'name'            => __( 'Month Archive Page Date Format', 'publisher' ),
	'desc'            => __( 'You can use <a target="_blank" href="%s">WordPress Formatting Date and Time</a> documentation translating this text.', 'publisher' ),
	'id'              => 'archive_monthly_format',
	'std'             => 'F Y',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['archive_yearly_title']   = array(
	'name'            => __( 'Year Archive Page Title', 'publisher' ),
	'id'              => 'archive_yearly_title',
	'std'             => 'Yearly Archives',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with year.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['archive_year_format']    = array(
	'name'            => __( 'Year Archive Page Date Format', 'publisher' ),
	'desc'            => __( 'You can use <a target="_blank" href="%s">WordPress Formatting Date and Time</a> documentation translating this text.', 'publisher' ),
	'id'              => 'archive_year_format',
	'std'             => 'Y',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Post Author
//
$fields[]                        = array(
	'name'  => __( 'Post Author', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['browse_auth_articles']  = array(
	'name'            => __( 'Browse Author Articles', 'publisher' ),
	'id'              => 'browse_auth_articles',
	'std'             => 'Browse Author Articles',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['author']                = array(
	'name'            => __( 'Author', 'publisher' ),
	'id'              => 'author',
	'std'             => 'Author',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['author_all_posts']      = array(
	'name'            => __( 'All Posts', 'publisher' ),
	'id'              => 'author_all_posts',
	'std'             => 'All Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['author_posts_count']    = array(
	'name'            => __( 'Posts count', 'publisher' ),
	'desc'            => __( 'The %s will be replaced by the user posts count.', 'publisher' ),
	'id'              => 'author_posts_count',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['author_comments_count'] = array(
	'name'            => __( 'Comments count', 'publisher' ),
	'desc'            => __( 'The %s will be replaced by the user comments count.', 'publisher' ),
	'id'              => 'author_comments_count',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);

//
// Human time
//
$fields[]                       = array(
	'name'  => __( 'Human Time', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['readable_time_ago']    = array(
	'name'            => __( 'Ago', 'publisher' ),
	'id'              => 'readable_time_ago',
	'desc'            => __( '%s will be replaced with time, ex: 23 min', 'publisher' ),
	'std'             => '%s ago',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_min']    = array(
	'name'            => __( 'min', 'publisher' ),
	'id'              => 'readable_time_min',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s min',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_mins']   = array(
	'name'            => __( 'mins', 'publisher' ),
	'id'              => 'readable_time_mins',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s mins',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_hour']   = array(
	'name'            => __( 'hour', 'publisher' ),
	'id'              => 'readable_time_hour',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s hour',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_hours']  = array(
	'name'            => __( 'hours', 'publisher' ),
	'id'              => 'readable_time_hours',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s hours',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_day']    = array(
	'name'            => __( 'day', 'publisher' ),
	'id'              => 'readable_time_day',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s day',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_days']   = array(
	'name'            => __( 'days', 'publisher' ),
	'id'              => 'readable_time_days',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s days',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_week']   = array(
	'name'            => __( 'week', 'publisher' ),
	'id'              => 'readable_time_week',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s week',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_weeks']  = array(
	'name'            => __( 'weeks', 'publisher' ),
	'id'              => 'readable_time_weeks',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s weeks',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_month']  = array(
	'name'            => __( 'month', 'publisher' ),
	'id'              => 'readable_time_month',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s month',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_months'] = array(
	'name'            => __( 'months', 'publisher' ),
	'id'              => 'readable_time_months',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s months',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_year']   = array(
	'name'            => __( 'year', 'publisher' ),
	'id'              => 'readable_time_year',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s year',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['readable_time_years']  = array(
	'name'            => __( 'years', 'publisher' ),
	'id'              => 'readable_time_years',
	'desc'            => __( '%s will be replaced with number', 'publisher' ),
	'std'             => '%s years',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * Post Formats
 */
$fields['format_video']   = array(
	'name'            => __( 'Video Format', 'publisher' ),
	'id'              => 'format_video',
	'std'             => 'Video',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_aside']   = array(
	'name'            => __( 'Aside Format', 'publisher' ),
	'id'              => 'format_aside',
	'std'             => 'Aside',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_quote']   = array(
	'name'            => __( 'Quote Format', 'publisher' ),
	'id'              => 'format_quote',
	'std'             => 'Quote',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_gallery'] = array(
	'name'            => __( 'Gallery Format', 'publisher' ),
	'id'              => 'format_gallery',
	'std'             => 'Gallery',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_image']   = array(
	'name'            => __( 'Image Format', 'publisher' ),
	'id'              => 'format_image',
	'std'             => 'Image',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_status']  = array(
	'name'            => __( 'Status Format', 'publisher' ),
	'id'              => 'format_status',
	'std'             => 'Status',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_music']   = array(
	'name'            => __( 'Music Format', 'publisher' ),
	'id'              => 'format_music',
	'std'             => 'Music',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_chat']    = array(
	'name'            => __( 'Chat Format', 'publisher' ),
	'id'              => 'format_chat',
	'std'             => 'Chat',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['format_link']    = array(
	'name'            => __( 'Link Format', 'publisher' ),
	'id'              => 'format_link',
	'std'             => 'Link',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * Comments
 */
$fields[]                              = array(
	'name'  => __( 'Comments', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['leave_comment_on']            = array(
	'name'            => __( 'Leave a comment on', 'publisher' ),
	'id'              => 'leave_comment_on',
	'desc'            => __( '%s will be replaced with post title', 'publisher' ),
	'std'             => 'Leave a comment on: &ldquo;%s&rdquo;',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_show_comment']        = array(
	'name'            => __( 'Leave a comment Button', 'publisher' ),
	'id'              => 'comment_show_comment',
	'std'             => 'Leave a comment',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_show_comments']       = array(
	'name'            => __( 'Show Comments Button', 'publisher' ),
	'id'              => 'comment_show_comments',
	'std'             => 'Show Comments (%d)',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['enter_pass_to_see_comment']   = array(
	'name'            => __( 'Enter password to view comment message', 'publisher' ),
	'id'              => 'enter_pass_to_see_comment',
	'std'             => 'This post is password protected. Enter the password to view comments.',
	'type'            => 'textarea',
	'container_class' => 'highlight-hover',
);
$fields['fb-comments']                 = array(
	'name'            => __( 'Facebook Comments', 'publisher' ),
	'id'              => 'fb-comments',
	'std'             => 'Comments',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['disq-comments']               = array(
	'name'            => __( 'Disqus Comments', 'publisher' ),
	'id'              => 'disq-comments',
	'std'             => 'Comments',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments']                    = array(
	'name'            => __( 'Comments', 'publisher' ),
	'id'              => 'comments',
	'std'             => 'Comments',
	'desc'            => __( 'Will be as header for Facebook Comments and Disqus Comments', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['no_comment_title']            = array(
	'name'            => __( 'No Comments Title', 'publisher' ),
	'id'              => 'no_comment_title',
	'std'             => 'No Comments',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_count_title']        = array(
	'name'            => __( 'Comments Count Title', 'publisher' ),
	'id'              => 'comments_count_title',
	'std'             => '%s Comments',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with comments count number.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['comments_1_comment']          = array(
	'name'            => __( '1 Comment Title', 'publisher' ),
	'id'              => 'comments_1_comment',
	'std'             => '1 Comment',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_older']              = array(
	'name'            => __( 'Older Comments', 'publisher' ),
	'id'              => 'comments_older',
	'std'             => '&larr; Older Comments',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_newer']              = array(
	'name'            => __( 'Newer Comments', 'publisher' ),
	'id'              => 'comments_newer',
	'std'             => 'Newer Comments &rarr;',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_closed']             = array(
	'name'            => __( 'Comments are closed', 'publisher' ),
	'id'              => 'comments_closed',
	'std'             => 'Comments are closed',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_leave_reply']        = array(
	'name'            => __( 'Leave A Reply', 'publisher' ),
	'id'              => 'comments_leave_reply',
	'std'             => 'Leave A Reply',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_reply']              = array(
	'name'            => __( 'Reply', 'publisher' ),
	'id'              => 'comments_reply',
	'std'             => 'Reply',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_login_to_reply']     = array(
	'name'            => __( 'Login to reply', 'publisher' ),
	'id'              => 'comments_login_to_reply',
	'std'             => 'Reply To %s',
	'type'            => 'text',
	'desc'            => __( 'This text only will shown if you restricted users to post comment only if they was login and the registration was active in your site.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['comments_reply_to']           = array(
	'name'            => __( 'Reply To', 'publisher' ),
	'id'              => 'comments_reply_to',
	'std'             => 'Reply To %s',
	'type'            => 'text',
	'desc'            => __( '%s will be replaced with user name.', 'publisher' ),
	'container_class' => 'highlight-hover',
);
$fields['comments_logged_as']          = array(
	'name'            => __( 'Logged in as', 'publisher' ),
	'id'              => 'comments_logged_as',
	'std'             => 'Logged in as',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_logout_this']        = array(
	'name'            => __( 'Log out of this account', 'publisher' ),
	'id'              => 'comments_logout_this',
	'std'             => 'Log out of this account',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_logout']             = array(
	'name'            => __( 'Log out?', 'publisher' ),
	'id'              => 'comments_logout',
	'std'             => 'Log out?',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_your_comment']       = array(
	'name'            => __( 'Your Comment', 'publisher' ),
	'id'              => 'comments_your_comment',
	'std'             => 'Your Comment',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_post_comment']       = array(
	'name'            => __( 'Post Comment', 'publisher' ),
	'id'              => 'comments_post_comment',
	'std'             => 'Post Comment',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_cancel_reply']       = array(
	'name'            => __( 'Cancel Reply', 'publisher' ),
	'id'              => 'comments_cancel_reply',
	'std'             => 'Cancel Reply',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_your_name']          = array(
	'name'            => __( 'Your Name', 'publisher' ),
	'id'              => 'comments_your_name',
	'std'             => 'Your Name',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_your_email']         = array(
	'name'            => __( 'Your Email', 'publisher' ),
	'id'              => 'comments_your_email',
	'std'             => 'Your Email',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_your_website']       = array(
	'name'            => __( 'Your Website', 'publisher' ),
	'id'              => 'comments_your_website',
	'std'             => 'Your Website',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_save_cookie_notice'] = array(
	'name'            => __( 'Save comment cookie notice.', 'publisher' ),
	'id'              => 'comments_save_cookie_notice',
	'std'             => 'Save my name, email, and website in this browser for the next time I comment.',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_pingback']           = array(
	'name'            => __( 'Pingback', 'publisher' ),
	'id'              => 'comments_pingback',
	'std'             => 'Pingback:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_edit']               = array(
	'name'            => __( 'Edit', 'publisher' ),
	'id'              => 'comments_edit',
	'std'             => 'Edit',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comments_awaiting_message']   = array(
	'name'            => __( 'Comment Awaiting Message', 'publisher' ),
	'id'              => 'comments_awaiting_message',
	'std'             => 'Your comment is awaiting moderation.',
	'type'            => 'textarea',
	'container_class' => 'highlight-hover',
);
$fields['comment_notes_before']        = array(
	'name'       => __( 'Note Before Comment Form', 'publisher' ),
	'id'         => 'comment_notes_before',
	'desc'       => __( 'Note to be displayed before the comment form fields.', 'publisher' ),
	'input-desc' => __( 'Will be shown only for not logged in users.', 'publisher' ),
	'type'       => 'textarea',
	'std'        => 'Your email address will not be published.',
);
$fields['comment_notes_after']         = array(
	'name' => __( 'Note After Comment Form', 'publisher' ),
	'id'   => 'comment_notes_after',
	'desc' => __( 'Note to be displayed after the comment form fields.', 'publisher' ),
	'type' => 'textarea',
	'std'  => '',
);
$fields['comment_says']                = array(
	'name'            => __( 'User Says', 'publisher' ),
	'id'              => 'comment_says',
	'std'             => 'says',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_previous']            = array(
	'name'            => __( 'Comment Previous', 'publisher' ),
	'id'              => 'comment_previous',
	'std'             => 'Previous',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_next']                = array(
	'name'            => __( 'Comment Next', 'publisher' ),
	'id'              => 'comment_next',
	'std'             => 'Next',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_page_numbers']        = array(
	'name'            => __( 'Comment Page Numbers', 'publisher' ),
	'id'              => 'comment_page_numbers',
	'std'             => 'Page %1$s of %2$s',
	'desc'            => __( 'Comments page numbers. 1 is current page and 2 is total pages', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_closed']              = array(
	'name'            => __( 'Comments are closed.', 'publisher' ),
	'id'              => 'comment_closed',
	'std'             => 'Comments are closed.',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_closed_tra_open']     = array(
	'name'            => __( 'Comment Closed. Trackback Open.', 'publisher' ),
	'id'              => 'comment_closed_tra_open',
	'std'             => 'Comments are closed, but %strackbacks%s and pingbacks are open.',
	'desc'            => __( 'The two %s are placeholders for HTML. The order can\'t be changed.', 'publisher' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['comment_moderation']          = array(
	'name'            => __( 'Your comment is awaiting moderation', 'publisher' ),
	'id'              => 'comment_moderation',
	'std'             => 'Your comment is awaiting moderation.',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


//
// Widgets & Blocks
//
$fields[]                            = array(
	'name'  => __( 'Widgets', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['newsticker_trending']       = array(
	'name'            => __( 'Trending', 'publisher' ),
	'id'              => 'newsticker_trending',
	'std'             => 'Trending',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['pretty_tabs_all']           = array(
	'name'            => __( 'Tabs All Text', 'publisher' ),
	'id'              => 'pretty_tabs_all',
	'std'             => 'All',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['pretty_tabs_more']          = array(
	'name'            => __( 'Tabs More Text', 'publisher' ),
	'id'              => 'pretty_tabs_more',
	'std'             => 'More',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_email']              = array(
	'name'            => __( 'Email', 'publisher' ),
	'id'              => 'widget_email',
	'std'             => 'Email',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_popular_categories'] = array(
	'name'            => __( 'Popular Categories', 'publisher' ),
	'id'              => 'widget_popular_categories',
	'std'             => 'Popular Categories',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['recent_posts']              = array(
	'name'            => __( 'Recent Posts', 'publisher' ),
	'id'              => 'recent_posts',
	'std'             => 'Recent Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['about_us']                  = array(
	'name'            => __( 'About Us', 'publisher' ),
	'id'              => 'about_us',
	'std'             => 'About Us',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_readmore']           = array(
	'name'            => __( 'Read More...', 'publisher' ),
	'id'              => 'widget_readmore',
	'std'             => 'Read More...',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_share']              = array(
	'name'            => __( 'Share', 'publisher' ),
	'id'              => 'widget_share',
	'std'             => 'Share',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_subscribe']          = array(
	'name'            => __( 'Subscribe', 'publisher' ),
	'id'              => 'widget_subscribe',
	'std'             => 'Subscribe',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_enter_email']        = array(
	'name'            => __( 'Enter your e-mail ..', 'publisher' ),
	'id'              => 'widget_enter_email',
	'std'             => 'Enter your e-mail ..',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_flickr_photos']      = array(
	'name'            => __( 'Flickr Photos', 'publisher' ),
	'id'              => 'widget_flickr_photos',
	'std'             => 'Flickr Photos',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_instagram']          = array(
	'name'            => __( 'Instagram Photos', 'publisher' ),
	'id'              => 'widget_instagram',
	'std'             => 'Instagram',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_dribbble_shots']     = array(
	'name'            => __( 'Dribbble Shots', 'publisher' ),
	'id'              => 'widget_dribbble_shots',
	'std'             => 'Dribbble Shots',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_video']              = array(
	'name'            => __( 'Video', 'publisher' ),
	'id'              => 'widget_video',
	'std'             => 'Video / Embed',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_follow_at_inst']     = array(
	'name'            => __( 'FOLLOW @ INSTAGRAM', 'publisher' ),
	'id'              => 'widget_follow_at_inst',
	'std'             => 'FOLLOW @ INSTAGRAM',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_google_plus']        = array(
	'name'            => __( 'Google+', 'publisher' ),
	'id'              => 'widget_google_plus',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_newsletter']         = array(
	'name'            => __( 'Newsletter', 'publisher' ),
	'id'              => 'widget_newsletter',
	'std'             => 'Newsletter',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_newsletter_msg']     = array(
	'name'            => __( 'Newsletter Message', 'publisher' ),
	'id'              => 'widget_newsletter_msg',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_newsletter_powered'] = array(
	'name'            => __( 'Newsletter Powered by', 'publisher' ),
	'id'              => 'widget_newsletter_powered',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * Push Notification
 */
$fields[]                                = array(
	'name'  => __( 'Push Notification', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['push_notification_desc']        = array(
	'name'            => __( 'Description', 'publisher' ),
	'id'              => 'push_notification_desc',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['push_notification_subscribe']   = array(
	'name'            => __( 'Subscribe', 'publisher' ),
	'id'              => 'push_notification_subscribe',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['push_notification_unsubscribe'] = array(
	'name'            => __( 'Unsubscribe', 'publisher' ),
	'id'              => 'push_notification_unsubscribe',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['widget_push_notification']      = array(
	'name'            => __( 'Subscribe for updates', 'publisher' ),
	'id'              => 'widget_push_notification',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['notification_subscribe_now']    = array(
	'name'            => __( 'Subscribe text', 'publisher' ),
	'id'              => 'notification_subscribe_now',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['notification_subscribed']       = array(
	'name'            => __( 'Subscribed text', 'publisher' ),
	'id'              => 'notification_subscribed',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * 404 Page
 */
$fields[]                        = array(
	'name'  => __( '404 Page', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['404_not_found']         = array(
	'name'            => __( 'Page Not Found', 'publisher' ),
	'id'              => '404_not_found',
	'std'             => 'Page Not Found!',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['404_not_found_message'] = array(
	'name'            => __( '404 Not Found Message', 'publisher' ),
	'id'              => '404_not_found_message',
	'std'             => "We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it and we'll try to fix it. In the meantime, try one of these options:",
	'type'            => 'textarea',
	'container_class' => 'highlight-hover',
);
$fields['404_go_previous_page']  = array(
	'name'            => __( 'Go to Previous Page', 'publisher' ),
	'id'              => '404_go_previous_page',
	'std'             => 'Go to Previous Page',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['404_go_homepage']       = array(
	'name'            => __( 'Go to Homepage', 'publisher' ),
	'id'              => '404_go_homepage',
	'std'             => 'Go to Homepage',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);

/**
 * No Result
 */
$fields[]                        = array(
	'name'  => __( 'No Result message in loops', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['no_res_nothing_found']  = array(
	'name'            => __( 'Nothing Found', 'publisher' ),
	'id'              => 'no_res_nothing_found',
	'std'             => 'Nothing Found',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['no_res_publish_first']  = array(
	'name'            => __( 'Publish First Post Message', 'publisher' ),
	'id'              => 'no_res_publish_first',
	'desc'            => __( '%s will be replaced with url of new post creating page.', 'publisher' ),
	'std'             => 'Ready to publish your first post? <a href="%1$s">Get started here</a>.',
	'type'            => 'textarea',
	'container_class' => 'highlight-hover',
);
$fields['no_res_search_nothing'] = array(
	'name'            => __( 'Search Result Empty', 'publisher' ),
	'id'              => 'no_res_search_nothing',
	'std'             => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
	'type'            => 'textarea',
	'container_class' => 'highlight-hover',
);
$fields['no_res_message']        = array(
	'name'            => __( 'Nothing Result Message', 'publisher' ),
	'id'              => 'no_res_message',
	'std'             => 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
	'type'            => 'textarea',
	'container_class' => 'highlight-hover',
);

/**
 * Pagination
 */
$fields[]                         = array(
	'name'  => __( 'Pagination', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['pagination_next']        = array(
	'name'            => __( 'Next Page', 'publisher' ),
	'id'              => 'pagination_next',
	'std'             => 'Next',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['pagination_prev']        = array(
	'name'            => __( 'Previous Page', 'publisher' ),
	'id'              => 'pagination_prev',
	'std'             => 'Previous',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['pagination_older']       = array(
	'name'            => __( 'Older Posts', 'publisher' ),
	'id'              => 'pagination_older',
	'std'             => 'Older Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['pagination_newer']       = array(
	'name'            => __( 'Newer Posts', 'publisher' ),
	'id'              => 'pagination_newer',
	'std'             => 'Newer Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['post_pages']             = array(
	'name'            => __( 'Pages Pagination Title', 'publisher' ),
	'id'              => 'post_pages',
	'std'             => 'Pages:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_pages_label']   = array(
	'name'            => __( 'Pagination Pages Label', 'publisher' ),
	'id'              => 'bs_pagin_pages_label',
	'std'             => '%s of %s',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_prev']          = array(
	'name'            => __( 'Pagination Previous Button', 'publisher' ),
	'id'              => 'bs_pagin_prev',
	'std'             => 'Previous',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_prev_label']    = array(
	'name'            => __( 'Pagination Previous Button Label', 'publisher' ),
	'id'              => 'bs_pagin_prev_label',
	'std'             => 'Previous',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_next']          = array(
	'name'            => __( 'Pagination Next Button', 'publisher' ),
	'id'              => 'bs_pagin_next',
	'std'             => 'Next',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_next_label']    = array(
	'name'            => __( 'Pagination Next Button Label', 'publisher' ),
	'id'              => 'bs_pagin_next_label',
	'std'             => 'Next',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_more_label']    = array(
	'name'            => __( 'Pagination Load More Button Label', 'publisher' ),
	'id'              => 'bs_pagin_more_label',
	'std'             => 'Load More Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_loading_label'] = array(
	'name'            => __( 'Pagination Load More Button Label', 'publisher' ),
	'id'              => 'bs_pagin_loading_label',
	'std'             => 'Loading ...',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bs_pagin_no_more']       = array(
	'name'            => __( 'No more posts in pagination', 'publisher' ),
	'id'              => 'bs_pagin_no_more',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * Playlist
 */
$fields[]         = array(
	'name'  => __( 'Playlist', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['bsp_by'] = array(
	'name'            => __( 'By (on Playlist)', 'publisher' ),
	'id'              => 'bsp_by',
	'std'             => 'by %s',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * Login Form
 */
$fields[]                        = array(
	'name'  => __( 'Login Form', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['login_login']           = array(
	'name'            => __( 'Sign In', 'publisher' ),
	'id'              => 'login_login',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_register']        = array(
	'name'            => __( 'Sign In / Join', 'publisher' ),
	'id'              => 'login_register',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_profile']         = array(
	'name'            => __( 'Profile', 'publisher' ),
	'id'              => 'login_profile',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_username']        = array(
	'name'            => __( 'Username or Email...', 'publisher' ),
	'id'              => 'login_username',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_password']        = array(
	'name'            => __( 'Password...', 'publisher' ),
	'id'              => 'login_password',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_remember']        = array(
	'name'            => __( 'Remember me', 'publisher' ),
	'id'              => 'login_remember',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_button']          = array(
	'name'            => __( 'Log In Button', 'publisher' ),
	'id'              => 'login_button',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_message']         = array(
	'name'            => __( 'Login form message', 'publisher' ),
	'id'              => 'login_message',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_forget_pass_btn'] = array(
	'name'            => __( 'Forget password?', 'publisher' ),
	'id'              => 'login_forget_pass_btn',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_no_account']      = array(
	'name'            => __( 'No account?', 'publisher' ),
	'id'              => 'login_no_account',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_signup']          = array(
	'name'            => __( 'Sign Up', 'publisher' ),
	'id'              => 'login_signup',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_reset_msg_1']     = array(
	'name'            => __( 'Recover your password.', 'publisher' ),
	'id'              => 'login_reset_msg_1',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_reset_msg_2']     = array(
	'name'            => __( 'A password will be e-mailed to you.', 'publisher' ),
	'id'              => 'login_reset_msg_2',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_reset_username']  = array(
	'name'            => __( 'Username or Email', 'publisher' ),
	'id'              => 'login_reset_username',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_reset_send']      = array(
	'name'            => __( 'Send My Password', 'publisher' ),
	'id'              => 'login_reset_send',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_welcome_back']    = array(
	'name'            => __( 'Welcome back, %s', 'publisher' ),
	'id'              => 'login_welcome_back',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_logout_btn']      = array(
	'name'            => __( 'Logout button', 'publisher' ),
	'id'              => 'login_logout_btn',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_with']            = array(
	'name'            => __( 'Login With Social Networks', 'publisher' ),
	'id'              => 'login_with',
	'desc'            => __( '%s will be replaced with site name', 'desc' ),
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['login_or']              = array(
	'name'            => __( 'Or', 'publisher' ),
	'id'              => 'login_or',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * GDPR
 */
$fields[]                     = array(
	'name'  => __( 'GDPR', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['gdpr_cookie_policy'] = array(
	'name'            => __( 'Cookie Law Policy', 'publisher' ),
	'id'              => 'gdpr_cookie_policy',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['gdpr_cookie_accept'] = array(
	'name'            => __( 'Accept Button', 'publisher' ),
	'id'              => 'gdpr_cookie_accept',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['gdpr_cookie_more']   = array(
	'name'            => __( 'Read More', 'publisher' ),
	'id'              => 'gdpr_cookie_more',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['gdpr_cookie_button'] = array(
	'name'            => __( 'Privacy & Cookies Policy', 'publisher' ),
	'id'              => 'gdpr_cookie_button',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);


/**
 * bbPress
 */
$fields[]                       = array(
	'name'  => __( 'bbPress', 'publisher' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['bbp_tagged']           = array(
	'name'            => __( 'Tagged', 'publisher' ),
	'id'              => 'bbp_tagged',
	'std'             => 'Tagged:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_topics']           = array(
	'name'            => __( 'Topics', 'publisher' ),
	'id'              => 'bbp_topics',
	'std'             => 'Topics',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_topics_freshness'] = array(
	'name'            => __( 'Topics & Freshness', 'publisher' ),
	'id'              => 'bbp_topics_freshness',
	'std'             => 'Topics & Freshness',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_replies']          = array(
	'name'            => __( 'Replies', 'publisher' ),
	'id'              => 'bbp_replies',
	'std'             => 'Replies',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_posts']            = array(
	'name'            => __( 'Posts', 'publisher' ),
	'id'              => 'bbp_posts',
	'std'             => 'Posts',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_freshness']        = array(
	'name'            => __( 'Freshness', 'publisher' ),
	'id'              => 'bbp_freshness',
	'std'             => 'Freshness',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_posted_in']        = array(
	'name'            => __( 'Posted In:', 'publisher' ),
	'id'              => 'bbp_posted_in',
	'std'             => 'Posted In:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_by']               = array(
	'name'            => __( 'by', 'publisher' ),
	'id'              => 'bbp_by',
	'std'             => 'by',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_on']               = array(
	'name'            => __( 'On', 'publisher' ),
	'id'              => 'bbp_on',
	'std'             => 'On',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_in_reply_to']      = array(
	'name'            => __( 'in reply to', 'publisher' ),
	'id'              => 'bbp_in_reply_to',
	'std'             => 'in reply to:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_voices']           = array(
	'name'            => __( 'Voices', 'publisher' ),
	'id'              => 'bbp_voices',
	'std'             => 'Voices',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_started_by']       = array(
	'name'            => __( 'Started by:', 'publisher' ),
	'id'              => 'bbp_started_by',
	'std'             => 'Started by:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_in']               = array(
	'name'            => __( 'in:', 'publisher' ),
	'id'              => 'bbp_in',
	'std'             => 'in:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
$fields['bbp_last_post']        = array(
	'name'            => __( 'Last post:', 'publisher' ),
	'id'              => 'bbp_last_post',
	'std'             => 'Last post:',
	'type'            => 'text',
	'container_class' => 'highlight-hover',
);
