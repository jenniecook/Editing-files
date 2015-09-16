<?php while ( have_posts() ) : the_post(); ?>

  <div class="one-third event">
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
    <p>
      <?php echo esc_html(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-location', true )); ?>
      <br>
      <?php if ($date_start = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-date-time-start', true )): ?>
        <?php echo esc_html(date( _x( 'F d, Y', 'Event date format', "musicflow_theme" ),  $date_start)); ?>
      <?php endif ?>
    </p>
    <?php echo MusicFlowHelpers::event_tickets($post->ID); ?>
  </div>

  <div class="two-third event event-wide last">
    <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
    <?php if (isset($date_start) && $date_start ): ?>
      <span class="skin-font-color8 font-size-18px bold-extra"><?php echo esc_html(date( _x( 'j/n/Y', 'Event date format', "musicflow_theme" ),  $date_start)); ?></span>
    <?php endif ?>
    <div class="clearfix"></div>
    <span class="skin-font-color6 bold">
      <?php if (isset($date_start) && $date_start ): ?>
        <?php echo esc_html(date( _x( 'H:i A', 'Event date format', "musicflow_theme" ),  $date_start)); ?>
      <?php endif ?>
      <?php
        if($end = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-date-time-end', true )):
          echo ' - ' . esc_html(date( _x( 'H:i A', 'Event date format', "musicflow_theme" ),  $end ));
        endif;
      ?>
    </span>
    <p><?php echo MusicFlowHelpers::cutText(get_the_content(), 750); ?></p>
  </div>
  <div class="clearfix"></div>

<?php endwhile; ?>