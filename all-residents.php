<?php
/**
 * Template Name: All Residents
 */
?>
<?php get_header('page'); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->
      <?php
        $number              = 9;
        $all_residents       = get_users('&who=authors');
        $total_all_residents = count($all_residents);
        $total_pages         = intval($total_all_residents / $number);

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $args = array(
          'number' => $number,
          'offset' => ($paged - 1) * $number,
          'who'    => 'authors',
          'include' => array( 1, 14 ),
        );
        $all_residents_per_page = new WP_User_Query( $args );

        if ( empty( $all_residents_per_page->results ) ): ?>

          <div class="three-fourth main-content-responsive">

            <!-- no news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php _e( 'No found', "musicflow_theme" ); ?>
                <span class="bold"><?php _e( 'residents', "musicflow_theme" ); ?></span>
              </h2>
            </div>

          </div>

        <?php else: ?>

          <div class="three-fourth main-content-responsive">

            <!-- news -->

            <div class="main-content">

              <h2 class="skin-font-color5"><?php the_title(); ?></h2>

              <?php $counter = 1; ?>

              <?php foreach ( $all_residents_per_page->results as $resident ) : ?>
                <div class="one-third resident<?php echo (($counter % 3) == 0) ? ' last' : ''; ?>">

                  <?php if ($user_avatar = get_the_author_meta( 'user_avatar', $resident->ID )): ?>
                    <img src="<?php echo esc_url( $user_avatar ); ?>" alt="album">
                    <div class="img-hover-resident font">
                      <a href="<?php echo esc_url(get_author_posts_url($resident->ID)); ?>">
                        <span class="skin-font-color3 font-size-120px icon">]</span>
                      </a>
                    </div>
                  <?php endif ?>

                  <h4 class="bold"><a href="<?php echo esc_url(get_author_posts_url($resident->ID)); ?>" class="skin-font-color5 skin-color-hover1"><?php echo esc_html($resident->display_name);?></a></h4>
                  <span class="skin-font-color6 bold"><?php echo esc_html( get_the_author_meta( 'user_profession', $resident->ID )); ?></span>
                  <p><?php echo esc_html( MusicFlowHelpers::cutText(get_the_author_meta('description', $resident->ID))); ?></p>

                </div>
                <?php if (($counter++ % 3) == 0): ?>
                    <div class="clearfix"></div>
                  <?php endif ?>
              <?php endforeach; ?>

            </div>

            <!-- /news -->

            <div class="clearfix"></div>

            <!-- /pagination -->

            <div class="main-content">
              <?php
                  $big = 999999999; // need an unlikely integer

                  echo MusicFlowHelpers::pagination(
                    array(
                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'    => '?paged=%#%',
                        'type'      => 'list',
                        'current'   => max( 1, get_query_var('paged') ),
                        'prev_text' => __('Previous', "musicflow_theme" ),
                        'next_text' => __('Next', "musicflow_theme" ),
                        'total'     => $total_pages,
                    )
                  );
              ?>
            </div>
            <!-- /pagination -->

          </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

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

<?php  get_footer(); ?>