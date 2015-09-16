<?php global $musicflow_admin; ?>

<?php get_template_part( 'partials/head' ); ?>

    <body id="body" <?php body_class(); ?>>

      <!-- MUSIC PLAYER -->

      <?php if ($musicflow_admin['general-settings-player-visible']): ?>

        <?php get_template_part( 'partials/music', 'player' ); ?>

      <?php endif ?>

      <!-- /MUSIC PLAYER -->

      <!-- HEADER -->
      <?php $default_header_image_bg = isset($musicflow_admin['archives-header-img-all']['url']) ? $musicflow_admin['archives-header-img-all']['url'] : false; ?>
      <?php echo MusicFlowHelpers::get_author_header_image_bg( get_query_var( 'author' ), $default_header_image_bg ); ?>
      <div class="top-wrapper big-wrapper skin-background-color2 <?php echo 'header-background-'.get_query_var( 'author' ); ?>">
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

                  <!-- Place info  -->

                  <?php get_template_part( 'partials/breadcrumb' ); ?>

                  <!-- /Place info  -->

                  <!-- Social  -->

                  <?php get_template_part('partials/social'); ?>

                  <!-- /Social  -->

                </div>

              </div>
            </div>

            <!-- Top content  -->

            <?php if (!have_posts()): ?>

              <div class="top-content">
                <div class="three-fourth main-content-responsive">
                  <h1 class="skin-font-color3"><?php _e( 'Author', "musicflow_theme" ); ?>: <span class="bold"><?php echo esc_html( get_query_var( 'author_name' )); ?></span></h1>
                    <?php echo MusicFlowHelpers::count_custom_posts_by_author(get_query_var( 'author' )); ?>
                    <p class="skin-font-color3 font-size-16px"><?php echo esc_html(get_the_author_meta('description', get_query_var( 'author' ))); ?></p>
                  </div>
                  <div class="one-fourth last">
                    <?php if ($user_avatar = get_user_meta( get_query_var( 'author' ), 'user_avatar', true )): ?>
                      <img src="<?php echo esc_url( $user_avatar ); ?>" alt="<?php echo esc_attr(get_the_author()); ?>">
                    <?php endif ?>
                  </div>
                </div>

            <?php else: ?>

              <?php the_post(); ?>

              <div class="top-content">
                <div class="three-fourth main-content-responsive">
                  <h1 class="skin-font-color3"><?php _e( 'Author', "musicflow_theme" ); ?>: <span class="bold"><?php echo get_the_author(); ?></span></h1>
                    <?php echo MusicFlowHelpers::count_custom_posts_by_author(get_the_author_meta('ID')); ?>
                    <p class="skin-font-color3 font-size-16px"><?php echo esc_html( get_the_author_meta('description')); ?></p>
                  </div>
                  <div class="one-fourth last">
                    <?php if ($user_avatar = get_user_meta( get_the_author_meta('ID'), 'user_avatar', true )): ?>
                      <img src="<?php echo esc_url( $user_avatar ); ?>" alt="<?php echo esc_attr( get_the_author()); ?>">
                    <?php endif ?>
                  </div>
                </div>

            <?php endif ?>
            <?php rewind_posts(); ?>

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