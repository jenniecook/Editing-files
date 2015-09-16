<?php get_header('events-taxonomy'); ?>

      <!-- /HEADER -->

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->


        <?php if ( ! have_posts() ) : ?>

          <div class="three-fourth main-content-responsive">

            <!-- no news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'No found', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'events', "musicflow_theme" ); ?></span></h2>
            </div>

          </div>

        <?php else: ?>

          <div class="three-fourth main-content-responsive">

            <!-- events -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'All events by', "musicflow_theme" ); ?>
                <span class="bold"><?php echo esc_html(get_queried_object()->name); ?></span>
              </h2>

              <?php

                if (get_option( "musicflow_events_places_list_version_".get_queried_object_id() ) == 'two'){

                  get_template_part( 'partials/taxonomy/event-content/version', 'two' );

                } else {

                  get_template_part( 'partials/taxonomy/event-content/version', 'one' );

                }
              ?>

            </div>

            <!-- /events -->

            <div class="clearfix"></div>

            <!-- /pagination -->

            <div class="main-content">
              <?php
                  global $wp_query;
                  $big = 999999999; // need an unlikely integer

                  MusicFlowHelpers::pagination(
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

      <!-- FOOTER -->

<?php get_footer(); ?>