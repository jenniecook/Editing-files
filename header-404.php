<?php global $musicflow_admin; ?>

<?php get_template_part( 'partials/head' ); ?>

    <body id="body" <?php body_class(); ?>>

      <!-- MUSIC PLAYER -->

      <?php if ($musicflow_admin['general-settings-player-visible']): ?>

        <?php get_template_part( 'partials/music', 'player' ); ?>

      <?php endif ?>

      <!-- /MUSIC PLAYER -->

      <!-- HEADER -->
      <?php $header_404_image_bg = isset($musicflow_admin['page-404-settings-header-img']['url']) ? $musicflow_admin['page-404-settings-header-img']['url'] : false; ?>
      <?php if ($header_404_image_bg): ?>
        <style>.header-background-404 { background: url('<?php echo esc_url( $header_404_image_bg ); ?>') no-repeat; }</style>
      <?php endif ?>
      <div class="top-wrapper big-wrapper skin-background-color2 header-background-404">
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

            <!-- Top content only posts type  -->

            <div class="top-content just-text">
              <h1 class="skin-font-color3"><?php _e( '404', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'sorry we are lost', "musicflow_theme" ); ?></span></h1>
              <?php if (isset($musicflow_admin['page-404-settings-header-text'])): ?>
                <p class="skin-font-color3 font-size-16px"><?php echo esc_html($musicflow_admin['page-404-settings-header-text']); ?></p>
              <?php endif ?>
            </div>

            <!-- /Top content  -->


          </div>

        </div>

      </div>