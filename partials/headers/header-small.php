<?php global $musicflow_admin; ?>
    <body id="body" <?php body_class(); ?>>

      <!-- MUSIC PLAYER -->

      <?php if ($musicflow_admin['general-settings-player-visible']): ?>

        <?php get_template_part( 'partials/music', 'player' ); ?>

      <?php endif ?>

      <!-- /MUSIC PLAYER -->

      <!-- HEADER -->

      <?php if (!$url_featured = MusicFlowHelpers::getUrlFeatured($post->ID)){
        $url_featured =  isset($musicflow_admin['archives-header-img-all']['url']) ? $musicflow_admin['archives-header-img-all']['url'] : false;
       }
       ?>
      <?php if ($url_featured ): ?>
        <div class="top-wrapper small-wrapper skin-background-color2" style="background: url('<?php echo esc_attr( $url_featured ); ?>') no-repeat;">
      <?php else: ?>
        <div class="top-wrapper small-wrapper skin-background-color2">
      <?php endif ?>
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
          </div>
        </div>

        <!-- /bottom background - absolute -->

        <div class="bottom-background-position">
          <div class="bottom-background skin-background-color3"></div>
        </div>

        <!-- /bottom background - absolute -->

      </div>