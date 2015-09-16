<?php global $musicflow_admin; ?>
<?php get_template_part( 'partials/head' ); ?>

    <!-- BODY -->

    <body id="body" <?php body_class(); ?>>

      <!-- MUSIC PLAYER -->

      <?php if ($musicflow_admin['general-settings-player-visible']): ?>

        <?php get_template_part( 'partials/music', 'player' ); ?>

      <?php endif ?>

      <!-- /MUSIC PLAYER -->

      <!-- HEADER -->
      <?php
        $default_header_image_bg = isset($musicflow_admin['custom-posts-header-img-all']['url']) ? $musicflow_admin['custom-posts-header-img-all']['url'] : false;
      ?>
      <?php echo MusicFlowHelpers::get_post_header_image_bg( 0, $default_header_image_bg ); ?>
      <div class="top-wrapper small-wrapper skin-background-color2 header-background-0">
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

          </div>

        </div>

        <!-- /bottom background - absolute -->

        <div class="bottom-background-position">
          <div class="bottom-background skin-background-color3"></div>
        </div>

        <!-- /bottom background - absolute -->

      </div>

      <!-- /HEADER -->