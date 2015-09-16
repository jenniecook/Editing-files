<div class="album-open-media-player">

  <?php if ($songs = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-songs', true )): ?>
    <h2 class="skin-font-color5"><?php _e( 'Listen', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'album', "musicflow_theme" ); ?></span></h2>
    <?php $album_img =  get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true ); ?>
    <?php global $artists_list; ?>
    <ul>
      <?php $item = 1; ?>
      <?php foreach ($songs as $song): ?>
        <li class="skin-border-color4">
          <a class="skin-font-color13 skin-color-hover1 fap-single-track"
            href="<?php echo esc_url( $song['url'] ); ?>"
            title="<?php echo isset($artists_list[0]) ? esc_attr($artists_list[0]) .' - ' : ''; ?><?php echo esc_attr( $song['title'] ); ?>"
            target="<?php echo site_url( '/' ); ?>"
            rel="<?php echo esc_attr( $album_img ); ?>"
            data-meta="#fap-meta-track1"><?php echo esc_html($item++); ?>. <?php echo esc_html($song['title']); ?>
            <div class="media-player-play-pause skin-border-color4">
              <span class="icon font-size-24px skin-font-color7">{</span>
            </div>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>

</div>