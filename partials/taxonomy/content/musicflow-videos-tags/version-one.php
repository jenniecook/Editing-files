<?php $counter = 1; ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="one-third video-box<?php echo (($counter % 3) == 0) ? ' last' : ''; ?>">
      <?php if ($video = get_post_meta( $post->ID, 'musicflow-prefix-' .'video-embed' )){
           echo MusicFlowHelpers::yotube_embed($video);
        } else {
          if ($mf_thumb = MusicFlowHelpers::get_thumbnail($post->ID, 'mf-categories-featured')) :
          echo wp_kses_post($mf_thumb);
        ?>
          <div class="img-hover font">
            <a href="<?php the_permalink(); ?>">
              <span class="skin-font-color3 font-size-120px icon">]</span>
            </a>
          </div>
        <?php endif; ?>
      <?php
        }
      ?>
      <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
      <p><?php echo MusicFlowHelpers::cutText(get_the_excerpt()); ?></p>
    </div>
  <?php if (($counter++ % 3) == 0): ?>
    <div class="clearfix"></div>
  <?php endif ?>
<?php endwhile; ?>