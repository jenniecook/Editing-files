<?php $counter = 1; ?>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="one-third album<?php echo (($counter % 3) == 0) ? ' last' : ''; ?>">
      <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
        <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="album-img-center">
        <div class="img-hover-album font">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>">
            <span class="skin-font-color3 font-size-120px icon">]</span>
          </a>
        </div>
      <?php endif ?>
      <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
      <?php if ($album_artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true )): ?>
        <span class="skin-font-color6 bold">
          <?php $count_artists = count($album_artists); $i = 0; ?>
          <?php foreach ($album_artists as $artist_key => $artist_val):
            if ($count_artists == ++$i) { echo ', '; }
            echo esc_html($artist_val['name']);
           endforeach
          ?>
        </span>
      <?php endif; ?>
    </div>
  <?php if (($counter++ % 3) == 0): ?>
    <div class="clearfix"></div>
  <?php endif ?>
<?php endwhile; ?>