<?php get_header(); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

          <?php if (!have_posts()): ?>

              <!-- no news -->

              <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>
                <div class="news-open">
                  <h2 class="bold skin-font-color5 news-open-h2"><?php _e( 'News no found', "musicflow_theme" ); ?></h2>
                </div>
              </div>

          <?php else: ?>

            <?php the_post(); ?>

            <!-- news -->

            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>
              <div class="news-open">
                <?php if (!MusicFlowHelpers::is_big_header($post->ID)): ?>

                  <?php if (has_post_thumbnail( $post->ID )):  ?>
                    <?php
                      $img_attr = array(
                        'class' => "news-open-img",
                        'alt'   => the_title_attribute('echo=0')
                      );
                      the_post_thumbnail('mf-single-post-featured', $img_attr);
                    ?>
                  <?php endif ?>

                  <?php get_template_part('partials/title-tags') ?>

                <?php endif; ?>

                <?php the_content(); ?>

              </div>
            </div>

            <?php
              $defaults_wp_pages = array(
                  'before'           => '<p class="pagination">' . __( 'Pages:', 'musicflow_theme' ),
                  'after'            => '</p>',
                  'link_before'      => '',
                  'link_after'       => '',
                  'next_or_number'   => 'number',
                  'separator'        => ' ',
                  'nextpagelink'     => __( 'Next page', "musicflow_theme" ),
                  'previouspagelink' => __( 'Previous page', "musicflow_theme" ),
                  'pagelink'         => '%',
                  'echo'             => 1
              );
              wp_link_pages( $defaults_wp_pages );
            ?>

            <!-- /news -->

            <div class="clearfix"></div>

            <!-- comment form and comments -->

              <?php comments_template(); ?>

              <div class="hide">
                <?php paginate_comments_links(); ?>
              </div>
            <!-- comment form and comments -->

          <?php endif ?>

        </div>

        <!-- /MAIN CONTENT -->

        <!-- SIDEBAR -->

         <?php if ($sidebar_type = get_post_meta( $post->ID, 'musicflow-prefix-' . 'sidebar-type', true )): ?>
          <?php if ($sidebar_type == 'first'): ?>
            <?php get_sidebar(); ?>
          <?php else: ?>
            <?php get_sidebar($sidebar_type); ?>
          <?php endif ?>
        <?php else: ?>
          <?php get_sidebar(); ?>
        <?php endif ?>

        <!-- /SIDEBAR -->

      </div>

      <div class="clearfix"></div>

      <!-- BOTTOM -->

      <?php get_template_part( 'partials/footer/widgets' ); ?>

      <!-- /BOTTOM -->

      <div class="clearfix"></div>

<?php get_footer(); ?>