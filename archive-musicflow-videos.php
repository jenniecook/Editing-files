<?php get_header(); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <?php if ( ! have_posts() ) : ?>

          <div class="three-fourth main-content-responsive">

            <!-- no news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'No found', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'videos', "musicflow_theme" ); ?></span></h2>
            </div>

          </div>

        <?php else: ?>

          <div class="three-fourth main-content-responsive">

            <!-- news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'All', "musicflow_theme" ); ?>
                <span class="bold"><?php _e( 'videos', "musicflow_theme" ); ?></span>
              </h2>

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
                        <?php endif;
                      }
                    ?>
                    <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
                    <p><?php echo MusicFlowHelpers::cutText(get_the_excerpt()); ?></p>
                  </div>
                  <?php if (($counter++ % 3) == 0): ?>
                    <div class="clearfix"></div>
                  <?php endif ?>
              <?php endwhile; ?>

            </div>

            <!-- /news -->

            <div class="clearfix"></div>

            <!-- /pagination -->

            <div class="main-content">
              <?php
                  global $wp_query;
                  $big = 999999999; // need an unlikely integer

                  echo MusicFlowHelpers::pagination(
                    array(
                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'    => '?paged=%#%',
                        'type'      => 'list',
                        'current'   => max( 1, get_query_var('paged') ),
                        'prev_text' => __('Previous', "musicflow_theme" ),
                        'next_text' => __('Next', "musicflow_theme" ),
                        'total'     => $wp_query->max_num_pages
                    )
                  );
              ?>
            </div>
            <!-- /pagination -->

          </div>

        <?php endif; ?>

        <!-- /MAIN CONTENT -->

        <!-- SIDEBAR -->

        <?php get_sidebar('seventh'); ?>

        <!-- /SIDEBAR -->

      </div>

      <div class="clearfix"></div>

      <!-- BOTTOM -->

      <?php get_template_part( 'partials/footer/widgets' ); ?>

      <!-- /BOTTOM -->

      <div class="clearfix"></div>

<?php  get_footer(); ?>