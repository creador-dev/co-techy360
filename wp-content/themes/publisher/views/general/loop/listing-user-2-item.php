<?php
/**
 * Thumbnail listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.5.5
 */

$heading_tag = publisher_get_prop( 'item-heading-tag', 'h5' );

$user     = publisher_get_prop( 'user-object' );
$user_url = get_author_posts_url( $user->ID );

/**
 * @var WP_User $user
 */

?>
<div class="listing-item listing-item-user type-1 style-2 clearfix">
	<div class="bs-user-item">

		<div class="user-avatar">
			<a href="<?php echo $user_url; ?>">
				<?php

				echo get_avatar(
					$user->ID,
					100,
					'',
					'',
					array(
						'force_display' => true, // Display avatar
					)
				);

				if ( $ranking = publisher_get_prop( 'user-rank' ) ) { ?>
					<div class="user-badge">
						<?php echo number_format_i18n( $ranking ) ?>
					</div>
					<?php
				}

				?>
			</a>
		</div>

		<div class="user-meta">
			<?php

			echo '<', $heading_tag, ' class="user-display-name">';
			echo '<a href="' . $user_url . '">';
			publisher_echo_html_limit_words( get_the_author_meta( 'display_name', $user->ID ), publisher_get_prop( 'title-limit' ) );
			echo '</a>';
			echo '</', $heading_tag, '>';


			if ( publisher_get_prop( 'show-biography' ) ) {

				?>
				<div class="biography">
					<?php echo wpautop( publisher_html_limit_words( get_the_author_meta( 'description', $user->ID ), publisher_get_prop( 'biography-limit' ) ) ); ?>
				</div>
				<?php
			}

			if ( publisher_get_prop( 'show-posts-url' ) ) { ?>
				<a href="<?php echo $user_url; ?>"
				   class="btn btn-light"><?php publisher_translation_echo( 'view_all_posts' ) ?></a>
				<?php
			}


			if ( publisher_get_prop( 'social-icons' ) ) {

				publisher_the_author_social_icons( $user->ID, array(
					'wrapper_class' => 'user-social-icons',
					'max-links'     => publisher_get_prop( 'social-icons-limit' ),
				) );
			}

			?>
		</div>
	</div>
</div>
