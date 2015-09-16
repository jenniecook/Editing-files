<?php get_header('search'); ?>

      <!-- /HEADER -->

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

            <!-- news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'All search albums', "musicflow_theme" ); ?>
                <span class="bold"><?php echo esc_html( $s ); ?></span></h2>

              <?php if (! have_posts() ): ?>

                <div class="one-one album">
                   <h5 class="bold"><?php _e( 'Nothing found Albums', "musicflow_theme" ); ?></h5>
                </div>

              <?php else: ?>

                <?php $counter = 1; ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="one-third album<?php echo (($counter++ % 3) == 0) ? ' last' : ''; ?>">
                      <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
                        <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="album-img-center">
                        <div class="img-hover-album font">
                          <a href="<?php the_permalink(); ?>">
                            <span class="skin-font-color3 font-size-120px icon">]</span>
                          </a>
                        </div>
                      <?php endif ?>
                      <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
                      <?php if ($album_artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true )): ?>
                        <span class="skin-font-color6 bold">
                          <?php $count_artists = count($album_artists); $i = 0; ?>
                          <?php foreach ($album_artists as $artist_key => $artist_val):
                            if ($count_artists == ++$i) { echo ', '; }
                            echo esc_html($artist_val['name']);
                           endforeach
                          ?>
                        </span>
                      <?php endif; ?>
                      <p><?php echo MusicFlowHelpers::cutText(get_the_excerpt()); ?></p>
                    </div>
                <?php endwhile; ?>

              <?php endif; ?>
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

      <!-- FOOTER -->

<?php get_footer(); ?>