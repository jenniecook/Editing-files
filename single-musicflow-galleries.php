<?php get_header(); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

         <?php if (have_posts()): the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>
              <h2 class="skin-font-color5"><?php _e( 'Photo album', "musicflow_theme" ); ?>: <span class="bold"><?php the_title(); ?></span></h2>

              <?php get_template_part( 'partials/gallery/slider' ); ?>

              <?php
                $galleries = get_post_meta( $post->ID, 'musicflow-prefix-gallery-images', true );
                $i = 1;
                if ($galleries) {
                  foreach ($galleries as $index => $gallery) {
                    foreach ($gallery as $image) {
                    ?>
                      <div class="one-third photo photo-open<?php echo (($i++ %3) == 0) ? ' last' : ''; ?>">
                        <img src="<?php echo esc_url($image); ?>" alt="gallery">
                        <div class="img-hover font">
                          <a href="<?php echo esc_url($image); ?>" data-rel="prettyPhoto[<?php echo esc_attr($index); ?>]">
                            <span class="skin-font-color3 font-size-120px icon">]</span>
                          </a>
                        </div>
                      </div>
                  <?php
                    }
                  }
                }
              ?>

            </div>
            <div class="main-content">
              <div class="normal-page">
                <?php the_content(); ?>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- comment form and comments -->

            <?php comments_template(); ?>

            <!-- comment form and comments -->

          <?php endif; ?>

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

    <?php
      wp_enqueue_script( 'musicflow-prefix-gallery-slider', MUSICFLOW_URL . '/js/gallery-slider.js', array('jquery'), '', true );
    ?>

<?php get_footer(); ?>