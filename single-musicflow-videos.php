<?php get_header(); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

         <?php if (have_posts()): the_post(); ?>

          <!-- videos -->

            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>
              <div class="video-open">

                <?php echo MusicFlowHelpers::yotube_embed(get_post_meta( $post->ID, 'musicflow-prefix-' . 'video-embed' )); ?>

                <?php get_template_part('partials/title-tags'); ?>

                <?php the_content(); ?>

              </div>
            </div>

          <!-- /videos -->

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

       <!-- BOTTOM -->

      </div>

      <div class="clearfix"></div>

      <!-- BOTTOM -->

      <?php get_template_part( 'partials/footer/widgets' ); ?>

      <!-- /BOTTOM -->

      <div class="clearfix"></div>

<?php get_footer(); ?>