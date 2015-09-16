<?php global $musicflow_admin; ?>
<?php if (!empty($musicflow_admin['general-settings-player-sliders'][0]['url'])): ?>
  <div class="music-player has-player">

    <?php $album = false; ?>
    <?php foreach ($musicflow_admin['general-settings-player-sliders'] as $music) : ?>
      <?php if ($music['description'] != $album) {
        $album = preg_replace('/\s+/', '', $music['description']); ?>
        <span id="fap-meta-<?php echo esc_attr( $album ); ?>"><?php echo esc_html( $music['description'] ); ?></span>
      <?php } ?>
      <a href="<?php echo esc_url( $music['url'] ); ?>" title="<?php echo esc_attr( $music['title'] ); ?>" target="<?php echo site_url( '/' ); ?>"  rel="<?php echo esc_attr( $music['thumb'] ); ?>" data-meta="#fap-meta-<?php echo esc_attr( $album ); ?>"></a>
    <?php endforeach; ?>

  </div>
<?php endif ?>