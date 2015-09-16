<?php get_header( 'page' ); ?>
      <!-- /HEADER -->

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

          <!-- normal page -->

          <?php if (have_posts()): the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>
              <div class="normal-page">
                <?php if (get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-title-visibility', true ) != 'title_hide'): ?>
                  <h2 class="skin-font-color5"><?php the_title(); ?></h2>
                <?php endif ?>
                <div class="one-one">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          <?php endif ?>

          <!-- /normal page -->

          <div class="clearfix"></div>

          <!-- comment form and comments -->

            <?php comments_template(); ?>

            <div class="hide">
              <?php paginate_comments_links(); ?>
            </div>
          <!-- comment form and comments -->

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