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

            <div class="top-content just-text">
             <?php
                $title = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-just-text-title', true );
                $title_bold = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-just-text-title-bold', true );
              ?>
              <?php if ($title || $title_bold): ?>
                <h1 class="skin-font-color3"><?php echo esc_html( $title ); ?> <span class="bold"><?php echo esc_html( $title_bold ); ?></span></h1>
              <?php endif ?>
              <?php if ($desc = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-just-text-desc', true )): ?>
                <p class="skin-font-color3 font-size-16px"><?php echo esc_html( $desc ); ?></p>
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