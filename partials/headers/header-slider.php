<?php global $musicflow_admin; ?>
 <body id="body" <?php body_class( 'has-slider' ); ?>>

      <!-- MUSIC PLAYER -->

      <?php if ($musicflow_admin['general-settings-player-visible']): ?>

        <?php get_template_part( 'partials/music', 'player' ); ?>

      <?php endif ?>

      <!-- /MUSIC PLAYER -->

      <!-- HEADER -->

      <div class="top-wrapper big-wrapper skin-background-color2">


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

                  <?php get_template_part('partials/social'); ?>

                </div>

              </div>
            </div>
          </div>

          <!-- Slider  -->

          <?php get_template_part( 'partials/pages/slider' ); ?>

          <!-- /Slider  -->

        </div>


        <!-- /bottom background - absolute -->

        <div class="bottom-background-position">
          <div class="bottom-background skin-background-color3"></div>
        </div>

        <!-- /bottom background - absolute -->

      </div>

      <!-- /HEADER -->

    <?php
      wp_enqueue_script( 'musicflow-prefix-header-slider', MUSICFLOW_URL . '/js/header-slider.js', array('jquery'), '', true );
    ?>