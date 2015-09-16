<?php global $musicflow_admin; ?>
    <body id="body" <?php body_class(); ?>>

      <!-- MUSIC PLAYER -->

      <?php if ($musicflow_admin['general-settings-player-visible']): ?>

        <?php get_template_part( 'partials/music', 'player' ); ?>

      <?php endif ?>

      <!-- /MUSIC PLAYER -->

      <!-- HEADER -->

      <?php
      if (!$url_featured = MusicFlowHelpers::getUrlFeatured($post->ID)){
        $url_featured =  isset($musicflow_admin['archives-header-img-all']['url']) ? $musicflow_admin['archives-header-img-all']['url'] : false;
      }
      ?>
      <?php if ($url_featured ): ?>
        <div class="top-wrapper big-wrapper skin-background-color2" style="background: url('<?php echo esc_attr( $url_featured ); ?>') no-repeat;">
      <?php else: ?>
        <div class="top-wrapper big-wrapper skin-background-color2">
      <?php endif ?>


        <?php
          $args = array(
            'post_type'      => 'musicflow-albums',
            'post_status'    => 'publish',
            'posts_per_page' => 4,
          );
          $albums = new WP_Query( $args );
        ?>

        <?php if ($albums->have_posts()): ?>

          <div class="album-wall">

            <?php $i = 1; ?>
            <?php while($albums->have_posts()): $albums->the_post(); ?>

              <div class="one-fourth<?php echo ($i==2) ? ' center-left' : ''; ?><?php echo ($i==3) ? ' center-right' : ''; ?><?php echo ($i++ == 4) ? ' last' : ''; ?>">
                <?php if ($album_image = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
                  <img src="<?php echo esc_url( $album_image ); ?>" alt="<?php the_title_attribute( 'echo=0' ); ?>">
                  <div class="img-hover-media-top font">
                    <a href="<?php the_permalink(); ?>">
                      <span class="skin-font-color3 font-size-120px icon">]</span>
                      <h6 class="bold skin-font-color3"><?php the_title(); ?></h6>
                    </a>
                  </div>
                <?php endif ?>
              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

        <div class="top-wrapper-mask">
          <div class="center-wrapper">
            <div class="top-content-position">
              <div class="top-content skin-font-color3">
                <div class="top-content-up skin-border-color3">

                  <!-- Logo  -->

                  <?php get_template_part( 'partials/logo' ); ?>

                  <!-- /Logo  -->

                  <!-- Main menu  -->

                  <?php get_template_part( 'partials/nav' ); ?>

                  <!-- /Mobile menu  -->

                </div>
                <div class="top-content-down skin-border-color3">

                  <!-- Social  -->

                  <?php get_template_part('partials/social'); ?>

                  <!-- /Social  -->

                </div>
              </div>
            </div>

            <!-- Top content  -->

            <div class="top-content">
              <?php
                $title = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-title', true );
                $title_bold = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-title-bold', true );
              ?>
              <?php if ($title || $title_bold): ?>
                <h1 class="skin-font-color3"><?php echo esc_html( $title ); ?> <span class="bold"><?php echo esc_html( $title_bold ); ?></span></h1>
              <?php endif ?>
              <?php if ($desc = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-desc', true )): ?>
                <p class="skin-font-color3 font-size-16px"><?php echo esc_html( $desc ); ?></p>
              <?php endif ?>

              <?php
              $button_text_left = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-text-button-left', true );
              if ($button_text_left):
                $button_bg_color_left       = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-bg-button-left', true );
                $button_hover_bg_color_left = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-hover-bg-button-left', true );
                $button_icon_left           = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-icon-button-left', true );
              ?>
                <a href="#" class="button-normal button-1 remove-mask skin-font-color3 skin-background-hover3" style="background-color:<?php echo esc_attr($button_bg_color_left); ?>;" onMouseOver="this.style.backgroundColor='<?php echo esc_attr($button_hover_bg_color_left); ?>'" onMouseOut="this.style.backgroundColor='<?php echo esc_attr($button_bg_color_left); ?>'">
                  <?php echo esc_html( $button_text_left ); ?>
                  <?php if ($button_icon_left): ?>
                    <div class="button-detail skin-background-color3">
                      <?php if ($button_icon_left == 10): ?>
                        <span class="icon font-size-46px skin-font-color5">0</span>
                      <?php elseif($button_icon_left == 11): ?>
                        <span class="icon font-size-46px skin-font-color5">\</span>
                      <?php else: ?>
                        <span class="icon font-size-46px skin-font-color5"><?php echo esc_html($button_icon_left); ?></span>
                      <?php endif ?>
                    </div>
                  <?php endif ?>
                </a>
              <?php endif ?>

              <?php
              $button_text_right = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-text-button-right', true );
              if ($button_text_right):
                $button_bg_color_right       = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-bg-button-right', true );
                $button_hover_bg_color_right = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-hover-bg-button-right', true );
                $button_url_right            = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-url-button-right', true );
                $button_icon_right           = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-album-wall-icon-button-right', true );
              ?>
                <a href="<?php echo esc_url( $button_url_right ); ?>" class="button-normal button-2 skin-font-color3 skin-background-hover3" style="background-color:<?php echo esc_attr( $button_bg_color_right ); ?>;" onMouseOver="this.style.backgroundColor='<?php echo esc_attr($button_hover_bg_color_right); ?>'" onMouseOut="this.style.backgroundColor='<?php echo esc_attr($button_bg_color_right); ?>'">
                  <?php echo esc_html( $button_text_right ); ?>
                  <?php if ($button_icon_right): ?>
                    <div class="button-detail skin-background-color3">
                      <?php if ($button_icon_right == 10): ?>
                        <span class="icon font-size-46px skin-font-color5">0</span>
                      <?php elseif($button_icon_right == 11): ?>
                        <span class="icon font-size-46px skin-font-color5">\</span>
                      <?php else: ?>
                        <span class="icon font-size-46px skin-font-color5"><?php echo esc_html($button_icon_right); ?></span>
                      <?php endif ?>
                    </div>
                  <?php endif ?>
                </a>
              <?php endif ?>

            </div>

            <!-- /Top content  -->

          </div>
        </div>

        <!-- /bottom background - absolute -->

        <div class="bottom-background-position">
          <div class="bottom-background skin-background-color3"></div>
        </div>

        <!-- /bottom background - absolute -->

      </div>

      <!-- /HEADER -->