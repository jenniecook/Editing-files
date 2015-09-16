<?php get_header(); ?>

      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">

          <?php if (have_posts()): ?>

            <?php the_post(); ?>

            <!-- album -->

            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>
              <div class="album-open">
                <?php
                  $artists_list = array();
                  if ($artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true)){
                    foreach ($artists as $artist) {
                        $artists_list[] = esc_html($artist['name']);
                    }
                  }
                ?>

                <?php if (!MusicFlowHelpers::is_big_header($post->ID)): ?>

                  <?php if ($album_bg_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-bg-image', true )): ?>
                    <style> .album-background-<?php echo esc_attr($post->ID); ?> { background: url('<?php echo esc_url($album_bg_img); ?>') no-repeat; }</style>
                    <div class="album-img-place skin-background-color4 <?php echo isset($album_bg_img) ? 'album-background-'.$post->ID : ''; ?>">
                      <div class="album-mask">
                        <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
                          <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="album-img-center">
                        <?php endif ?>
                      </div>
                    </div>
                  <?php endif ?>
                  <h2 class="bold skin-font-color5 album-open-h2"><?php the_title(); ?></h2>
                  <?php if ($artists_list){
                    echo '<span class="skin-font-color6 bold">'. implode(', ', $artists_list).'</span>';
                  }
                  ?>

                <?php endif ?>

                <div class="info-button-box">
                  <?php $count_one_third = 0; ?>

                  <?php if ($genere = MusicFlowHelpers::get_terms('musicflow-albums-genres')): ?>
                    <?php $count_one_third++; ?>
                    <div class="one-third">
                      <span class="button-normal skin-background-color4 skin-font-color3"><?php echo esc_html( 'Genere', "musicflow_theme" ); ?>: <?php echo esc_html($genere); ?></span>
                    </div>
                  <?php endif ?>

                  <?php if ($artists_list): ?>
                    <?php $count_one_third++; ?>
                    <div class="one-third">
                        <span class="button-normal skin-background-color4 skin-font-color3"><?php _e( 'Artist:', "musicflow_theme" ); ?> <?php echo esc_html( $artists_list[0] ); ?></span>
                    </div>
                  <?php endif ?>

                  <?php if (get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-buy', true) != 'hide'): ?>
                    <?php $count_one_third++; ?>
                    <div class="one-third<?php echo ($count_one_third % 3 == 0 ) ? ' last': '';?>">
                      <?php
                        switch (get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-buy', true)) {
                          case 'free':
                            $buy_text = __('Free in store', "musicflow_theme");
                            ?>
                              <a href="<?php echo esc_url( get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-shop', true)); ?>" class="button-normal skin-background-color9 skin-font-color3 skin-background-hover3"><?php echo esc_html($buy_text); ?></a>
                            <?php
                            break;
                          case 'buy':
                            $buy_text = __('Buy in store', "musicflow_theme");
                            ?>
                              <a href="<?php echo esc_url( get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-shop', true)); ?>" class="button-normal skin-background-color1 skin-font-color3 skin-background-hover1"><?php echo esc_html($buy_text); ?></a>
                            <?php
                            break;
                        }
                      ?>
                    </div>
                  <?php endif ?>

                  <?php if ($album_relase_date = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-relase-date', true )): ?>
                    <?php $count_one_third++; ?>
                    <div class="one-third<?php echo ($count_one_third % 3 == 0 ) ? ' last': '';?>">
                      <span class="button-normal skin-background-color4 skin-font-color3"><?php _e( 'Relase date:', "musicflow_theme" ); ?> <?php echo esc_html(date('F j Y', strtotime($album_relase_date))); ?> </span>
                    </div>
                  <?php endif ?>

                  <?php if ($album_category_id = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-category-id', true )): ?>
                    <?php $count_one_third++; ?>
                    <div class="one-third<?php echo ($count_one_third % 3 == 0 ) ? ' last': '';?>">
                      <span class="button-normal skin-background-color4 skin-font-color3"><?php _e( 'Catalog ID:', "musicflow_theme" ); ?> <?php echo esc_html($album_category_id); ?></span>
                    </div>
                  <?php endif ?>

                  <?php if ($album_songs_number= get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-songs-number', true )): ?>
                    <?php $count_one_third++; ?>
                    <div class="one-third<?php echo ($count_one_third % 3 == 0 ) ? ' last': '';?>">
                      <span class="button-normal skin-background-color4 skin-font-color3"><?php _e( 'Songs:', "musicflow_theme" ); ?> <?php echo esc_html($album_songs_number); ?></span>
                    </div>
                  <?php endif ?>

                </div>

                <?php the_content(); ?>

              </div>
            </div>

            <!-- /album -->

            <!-- Media player -->

            <?php get_template_part('partials/album/player') ?>

            <!-- /Media player -->

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

<?php get_footer(); ?>