<?php
  $args = array(
    'post_type'      => 'musicflow-videos',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
  );
  $new_videos = new WP_Query( $args );

  if ($new_videos->have_posts()): ?>

    <div class="main-content">
      <a href="<?php echo site_url( 'video' ); ?>" class="main-content-link-absolute skin-font-color6 skin-color-hover1 bold"><?php _e( 'view all videos', "musicflow_theme" ); ?></a>
      <h2 class="skin-font-color5"><?php _e( 'New', "musicflow_theme" ); ?>
        <span class="bold"><?php _e( 'videos', "musicflow_theme" ); ?></span>
      </h2>

      <?php $i = 1; ?>
      <?php while($new_videos->have_posts()): $new_videos->the_post(); ?>

          <div class="one-third event<?php echo ($i == 3)? ' last' : '';?>">
            <?php
            if ($mf_thumb = MusicFlowHelpers::get_thumbnail($post->ID, 'mf-categories-featured')) :
              echo wp_kses_post($mf_thumb);
            ?>
              <div class="img-hover font">
                <a href="<?php the_permalink(); ?>">
                  <span class="skin-font-color3 font-size-120px icon">]</span>
                </a>
              </div>
            <?php endif; ?>
            <h4 class="bold"><a href="<?php echo the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
            <span class="skin-font-color6 bold"><?php echo get_the_date(); ?></span>
            <p><?php echo MusicFlowHelpers::cutText(get_the_content(), 200); ?></p>
          </div>
          <?php $i++; ?>
      <?php endwhile; ?>

    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
