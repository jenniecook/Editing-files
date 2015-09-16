<?php if (have_posts()): ?>
  <?php the_post(); ?>
    <div class="top-content">
      <div class="three-fourth main-content-responsive">
      <h1 class="skin-font-color3 bold"><?php the_title(); ?></h1>
      <?php if ($album_artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true )): ?>
          <?php foreach ($album_artists as $artist){ $artists_list[] = esc_html($artist['name']); } ?>
          <span class="font-size-24px skin-font-color1 bold"><?php echo implode(', ', $artists_list); ?></span>
        <?php endif; ?>
        <p class="skin-font-color3 font-size-16px"><?php echo get_the_excerpt(); ?></p>
      </div>
      <div class="one-fourth last">
        <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
          <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="album-img-center">
        <?php endif ?>
      </div>
    </div>
<?php endif ?>
<?php rewind_posts(); ?>