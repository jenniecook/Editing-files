<?php if (have_posts()): ?>
  <?php the_post(); ?>
    <div class="top-content">
      <div class="three-fourth main-content-responsive">
      <h1 class="skin-font-color3 bold"><?php the_title(); ?></h1>
        <span class="skin-font-color1 bold font-size-24px"><?php echo esc_html(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-location', true ));?> </span>
        <p class="skin-font-color3 font-size-16px"><?php echo get_the_excerpt(); ?></p>
      </div>
      <div class="one-fourth last"></div>
  </div>
<?php endif ?>
<?php rewind_posts(); ?>
