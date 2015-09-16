<?php
/**
 * Template Name: Full Width Page
 */
?>
<?php get_header( 'page' ); ?>

      <!-- /HEADER -->

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="fullwidth">

          <!-- normal page -->

          <?php if (have_posts()): the_post(); ?>
            <div class="main-content">
              <div class="normal-page">
                <?php if (get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-title-visibility', true ) == 'title_show'): ?>
                  <h2 class="skin-font-color5"><?php the_title(); ?></h2>
                <?php endif ?>
                <div class="one-one">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          <?php endif ?>

          <!-- /normal page -->

        </div>

        <!-- /MAIN CONTENT -->

      </div>

      <div class="clearfix"></div>

      <!-- BOTTOM -->

        <?php get_template_part( 'partials/footer/widgets' ); ?>

      <!-- /BOTTOM -->

      <div class="clearfix"></div>

      <!-- FOOTER -->

<?php get_footer(); ?>