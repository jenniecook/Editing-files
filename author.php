<?php get_header('author'); ?>

        <div class="center-wrapper main-content-wrapper">

          <!-- MAIN CONTENT -->

          <div class="three-fourth main-content-responsive">

          <?php if (!have_posts()): ?>

              <!-- no found -->

              <div class="main-content">
                <h2 class="skin-font-color5"><?php _e( 'No found data or are pending', "musicflow_theme" ); ?>
                  <span class="bold"><?php echo esc_html(get_query_var( 'author_name' )); ?></span></h2>
              </div>

          <?php else: ?>

            <?php rewind_posts(); ?>
              <!-- found -->

              <div class="main-content">

                <h2 class="skin-font-color5"><?php _e( 'All content by', "musicflow_theme" ); ?> <span class="bold"><?php echo esc_html(get_the_author()); ?></span></h2>

                <?php while(have_posts()): the_post(); ?>

                    <div class="news news-wide">
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
                      <span class="skin-font-color6 bold"><?php echo esc_html(get_the_date()); ?> </span>
                      <span class="skin-font-color6 bold">/ </span>
                      <span class="skin-font-color6 bold"><?php comments_number(); ?> </span>
                      <?php echo MusicFlowHelpers::get_post_tags($post->ID, 'small'); ?>
                      <p><?php echo MusicFlowHelpers::cutText(get_the_excerpt(), 300); ?></p>
                    </div>

                <?php endwhile; ?>

                <?php

                  wp_reset_postdata();
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

          <?php endif; ?>

          </div>

          <!-- /MAIN CONTENT -->

          <!-- SIDEBAR -->

          <?php get_sidebar(); ?>

          <!-- /SIDEBAR -->

        </div>

        <div class="clearfix"></div>

        <!-- BOTTOM -->

      <?php get_template_part( 'partials/footer/widgets' ); ?>

      <!-- /BOTTOM -->

        <div class="clearfix"></div>

  <?php get_footer(); ?>