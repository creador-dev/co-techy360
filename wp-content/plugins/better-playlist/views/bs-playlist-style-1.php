<?php
/**
 * bs-playlist-style-1.php
 *---------------------------
 * [bs-playlist-style-1] shortcode
 */


$atts = bsp_get_prop( 'shortcode-bs-playlist-atts' );

$playlist = BS_PlayList::get_playlist( $atts );

$type = $atts['shortcode-id'] === 'bs-youtube-playlist-1' ? 'youtube' : 'vimeo';

$frame_url_js = BS_PlayList::change_video_frame_url( $atts );
$frame_url    = BS_PlayList::default_frame_url( $atts );
$custom_id    = empty( $atts['custom-id'] ) ? '' : sanitize_html_class( $atts['custom-id'] );

//
// Layout of player
//
{
	$layout = 'full';

	if ( bf_get_current_sidebar() ) {
		$layout = '1-column';
	} else {
		$vc_state = bf_vc_layout_state();

		if ( isset( $vc_state['column']['width'] ) && $vc_state['column']['width'] != '1' ) {

			$layout = '1-column';

			$check = array(
				'2/3' => '',
				'1/2' => '',
			);

			if ( isset( $check[ $vc_state['column']['width'] ] ) ) {
				$layout .= ' long';
			}
		}
	}
}


if ( $playlist && ! empty( $playlist['videos'] ) ) :

	$first_video_ID = key( $playlist['videos'] );

	// detect by
	$by = '';
	if ( $atts['type'] == 'playlist' ) {
		if ( isset( $playlist['info']->channelTitle ) ) {
			$by = $playlist['info']->channelTitle;
		} elseif ( isset( $playlist['info']->username ) ) {
			$by = $playlist['info']->username;
		}
	} else {
		$by = $atts['by'];
	}

	if ( isset( $atts['class'] ) ) {
		$atts['class'] .= ' playlist-title-' . ( $atts['show_playlist_title'] ? 'show' : 'hide' );
	} else {
		$atts['class'] = 'playlist-title-' . ( $atts['show_playlist_title'] ? 'show' : 'hide' );
	}

	?>
<div <?php
if ( $custom_id ) {
	echo 'id="', $custom_id, '"';
}
?> class="bsp-wrapper <?php echo esc_attr( $atts['class'] ) ?> layout-<?php echo $layout; ?>">
	<?php

	bf_shortcode_show_title( $atts ); // show title

	// Custom and Auto Generated CSS Codes
	if ( ! empty( $atts['css-code'] ) ) {
		bf_add_css( $atts['css-code'], TRUE, TRUE );
	}

	$_video_cus = '';

	if ( $type === 'youtube' ) {
		$_video_cus = '&showinfo=0';
	}

	?>
	<div class="bsp-player-wrapper">
		<div class="bsp-player" data-frame-url="<?php echo esc_attr( $frame_url_js ), $_video_cus ?>">
			<iframe type="text/html" width="100%" height="100%"
			        src="<?php echo esc_attr( str_replace( '{video-id}', $first_video_ID, $frame_url ) ), $_video_cus; ?>"
			        allowfullscreen="allowfullscreen"
			        mozallowfullscreen="mozallowfullscreen"
			        msallowfullscreen="msallowfullscreen"
			        oallowfullscreen="oallowfullscreen"
			        webkitallowfullscreen="webkitallowfullscreen"
			        frameborder="0"></iframe>
		</div>
	</div>

	<div class="bsp-videos">
		<?php if ( $atts['show_playlist_title'] ) { ?>
			<div class="bsp-playlist-info">
				<div class="bsp-video-name heading-typo">
					<i class="fa fa-bars"></i>
					<?php
					if ( ! empty( $atts['playlist_title'] ) ) {
						echo $atts['playlist_title'];
					} elseif ( isset( $playlist['info']->title ) ) {
						echo $playlist['info']->title;
					}
					?>
				</div>
				<?php if ( ! empty( $by ) ) { ?>
					<div class="bsp-video-by bsp-small body-typo">
						<?php

						echo Better_Playlist::_get( 'bsp_by' ), ' ', $by;

						?>
					</div>
				<?php } ?>
				<div class="bsp-video-position bsp-small">
					<span class="bsp-current-index">1</span> /
					<?php

					echo number_format_i18n( bf_count( $playlist['videos'] ) );

					?>
				</div>
			</div>
		<?php } ?>

		<div class="bsp-videos-items">
			<ol>
				<?php
				$_video_index = 0;
				foreach ( $playlist['videos'] as $video_ID => $video_info ) : ?>
					<li class="bsp-videos-item <?php if ( ! $_video_index )
						echo 'bsp-current-item' ?>">
						<span class="bsp-video-index"><?php echo ++ $_video_index ?></span>
						<a href="#" class="bsp-clearfix bsp-item" data-video-id="<?php echo $video_ID ?>">
								<span class="bsp-video-icon-wrapper">
								<span class="bsp-video-icon"></span>
							</span>
							<span class="bsp-video-thumbnail">
								<?php if ( $thumbnail = bsp_get_video_thumbnail( $video_info['thumbnails'] ) ): ?>
									<img src="<?php echo esc_attr( $thumbnail ) ?>"
									     alt="<?php echo esc_attr( $video_info['title'] ) ?>">
								<?php endif ?>
							</span>
							<span class="bsp-video-info">
								<span class="bsp-video-name heading-typo"><?php echo $video_info['title'] ?></span>
								<span class="bsp-small bsp-video-duration body-typo"><?php echo bsp_get_video_duration( $video_info['duration'] ) ?></span>
							</span>
						</a>
					</li>
				<?php endforeach ?>
			</ol>
		</div>
	</div>
	</div><?php

elseif ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) :

	_e( 'Playlist Error: cannot fetch data', 'better-studio' );

endif ?>