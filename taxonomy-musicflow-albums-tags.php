<?php get_header('taxonomy'); ?>

      <!-- /HEADER -->

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

          <?php if ( ! have_posts() ) : ?>


              <div class="main-content">

                <h2 class="skin-font-color5"><?php _e( 'No found albums by', "musicflow_theme" ); ?>
                  <span class="bold"><?php echo esc_html(get_queried_object()->name); ?></span>
                </h2>

              </div>


          <?php else: ?>

            <!-- albums -->

              <div class="main-content">

                <h2 class="skin-font-color5"><?php _e( 'All albums by', "musicflow_theme" ); ?>
                  <span class="bold"><?php echo esc_html(get_queried_object()->name); ?></span>
                </h2>

                <?php
                $musicflow_taxonomy = get_queried_object()->taxonomy;
                  $musicflow_version = get_option( get_queried_object()->taxonomy ."_list_version_". get_queried_object_id());
                  if (!$musicflow_version) {
                    $musicflow_version = 'one';
                  }
                  get_template_part( "partials/taxonomy/content/{$musicflow_taxonomy}/version", "{$musicflow_version}" );
                ?>

              </div>

              <!-- /albums -->

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

            <?php endif; ?>

          </div>

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