<?php get_header('taxonomy'); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <?php if ( ! have_posts() ) : ?>

          <div class="three-fourth main-content-responsive">

            <!-- no news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'No found', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'archives', "musicflow_theme" ); ?></span></h2>
            </div>

          </div>

        <?php else: ?>

          <div class="three-fourth main-content-responsive">

            <!-- news -->

            <div class="main-content">

              <?php
              if ( is_day() ) :
                echo '<h2 class="skin-font-color5">' . __( 'Daily Archives', "musicflow_theme" ) .
                ' <span class="bold">'. get_the_date() .'</span></h2>';

              elseif ( is_category() ) :
                echo '<h2 class="skin-font-color5">' . __( 'Category Archives', "musicflow_theme" ) .
                ' <span class="bold">'. single_cat_title( '', false ) .'</span></h2>';

              elseif ( is_category() ) :
                echo '<h2 class="skin-font-color5">' . __( 'All posts by', "musicflow_theme" ) .
                ' <span class="bold">'. get_the_author() .'</span></h2>';

              elseif ( is_month() ) :
                echo '<h2 class="skin-font-color5">' . __( 'Monthly Archives', "musicflow_theme" ) .
                ' <span class="bold">'. get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyfourteen' ) ) .'</span></h2>';

              elseif ( is_category() ) :
                echo '<h2 class="skin-font-color5">' . __( 'Category Archives', "musicflow_theme" ) .
                ' <span class="bold">'. single_cat_title( '', false ) .'</span></h2>';

              elseif ( is_tag() ) :
                echo '<h2 class="skin-font-color5">' . __( 'Tag Archives', "musicflow_theme" ) .
                ' <span class="bold">'. single_cat_title( '', false ) .'</span></h2>';

              elseif ( is_year() ) :
                echo '<h2 class="skin-font-color5">' . __( 'Yearly Archives', "musicflow_theme" ) .
                ' <span class="bold">'. get_the_date( _x( 'Y', 'yearly archives date format', "musicflow_theme" ) ) .'</span></h2>';
              else :
                echo '<h2 class="skin-font-color5">' . __( 'All', "musicflow_theme" ) .
                ' <span class="bold">'.  __( 'news', "musicflow_theme" ) .'</span></h2>';
              endif;
              ?>

              <?php
              global $wp_query;

              if (isset(get_queried_object()->taxonomy)) {
                $musicflow_taxonomy = get_queried_object()->taxonomy;
                $musicflow_version = get_option( get_queried_object()->taxonomy ."_list_version_". get_queried_object_id());
                if (!$musicflow_version) {
                  $musicflow_version = 'one';
                }
              } else {
                $musicflow_taxonomy = 'other';
                $musicflow_version = 'one';
              }
              get_template_part( "partials/taxonomy/content/{$musicflow_taxonomy}/version", "{$musicflow_version}" );

              ?>

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