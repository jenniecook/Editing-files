<?php
  $args = array(
    'post_type'      => 'musicflow-events',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'meta_key'       => 'musicflow-prefix-' . 'event-date-time-start',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
  );

  $upcoming_events = new WP_Query( $args );

  if ($upcoming_events->have_posts()): ?>

    <div class="main-content">
        <a href="<?php echo site_url( 'event' ); ?>" class="main-content-link-absolute skin-font-color6 skin-color-hover1 bold"><?php _e( 'view all events', "musicflow_theme" ); ?></a>
        <h2 class="skin-font-color5"><?php _e( 'Upcoming', "musicflow_theme" ); ?>
          <span class="bold"><?php _e( 'events', "musicflow_theme" ); ?></span>
        </h2>

        <?php $i = 1; ?>
        <?php while($upcoming_events->have_posts()): $upcoming_events->the_post(); ?>

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
            <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
            <?php if ($date_start = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-date-time-start', true )): ?>
              <span class="skin-font-color8 font-size-18px bold-extra"><?php echo esc_html(date( _x( 'j/n/Y', 'Event date format', "musicflow_theme" ),  $date_start)); ?></span>
            <?php endif ?>
            <div class="clearfix"></div>
            <?php if ($event_start_date = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-date-time-start', false )): ?>
              <span class="skin-font-color6 bold">
                <?php echo esc_html( date("j F, Y H:i A", $event_start_date[0]) );  ?>
              </span>
            <?php endif ?>
            <p>
              <?php echo esc_html(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-location', true ));?><br>
              <?php if ($date_start): ?>
                <?php echo esc_html(date( _x( 'F j, Y', 'Event date format', "musicflow_theme" ),  $date_start)); ?>
              <?php endif ?>
            </p>
            <?php echo MusicFlowHelpers::event_tickets($post->ID); ?>
          </div>
          <?php $i++; ?>
      <?php endwhile; ?>

    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>