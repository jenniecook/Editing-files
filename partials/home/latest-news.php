<?php

  if (have_posts()): ?>

    <div class="main-content">
      <?php if (get_page_by_path( 'all-news' )): ?>
        <a href="<?php echo site_url( 'all-news' ); ?>" class="main-content-link-absolute skin-font-color6 skin-color-hover1 bold"><?php _e( 'view all news', "musicflow_theme" ); ?></a>
      <?php endif ?>
      <h2 class="skin-font-color5"><?php _e( 'Latest', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'news', "musicflow_theme" ); ?></span></h2>
      <?php $i = 1; ?>
      <?php while(have_posts()): the_post(); ?>

        <div class="one-third news<?php echo (($i % 3) == 0)? ' last' : '';?>">
          <?php
          if ($mf_thumb = MusicFlowHelpers::get_thumbnail($post->ID)) :
            echo wp_kses_post($mf_thumb);
          ?>
            <div class="img-hover font">
              <a href="<?php the_permalink(); ?>">
                <span class="skin-font-color3 font-size-120px icon">]</span>
              </a>
            </div>
          <?php endif; ?>
          <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
            <?php if (get_the_title()): ?>
              <span class="skin-font-color6 bold"><?php echo get_the_date(); ?></span>
            <?php else: ?>
              <a href="<?php the_permalink(); ?>">
                <span class="skin-font-color6 bold skin-color-hover1"><?php echo get_the_date(); ?></span>
              </a>
            <?php endif ?>
          <p>
            <?php the_excerpt(); ?>
          </p>
        </div>
        <?php if (($i++ % 3) == 0): ?>
          <div class="clearfix"></div>
        <?php endif ?>

      <?php endwhile; ?>
    </div>
    <div class="clearfix"></div>

    <!-- /pagination -->

      <?php
          global $wp_query;
          $big = 999999999; // need an unlikely integer

          echo MusicFlowHelpers::pagination_main_content(
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
    <!-- /pagination -->

    <div class="hide">
      <?php wp_link_pages(); ?>
    </div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
