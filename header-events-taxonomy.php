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
      $default_header_image_bg =  isset($musicflow_admin['archives-header-img-all']['url']) ? $musicflow_admin['archives-header-img-all']['url'] : false;

      if (isset(get_queried_object()->taxonomy)) {

        echo MusicFlowHelpers::get_term_header_image_bg( get_queried_object_id(), get_queried_object()->taxonomy, $default_header_image_bg );
      ?>

        <?php if (get_option( "musicflow_events_places_header_version_".get_queried_object_id()) == 'one') : ?>

          <div class="top-wrapper big-wrapper skin-background-color2 header-background-<?php echo get_queried_object_id(); ?>">

        <?php else: ?>

          <div class="top-wrapper small-wrapper skin-background-color2 header-background-<?php echo get_queried_object_id(); ?>">

        <?php endif; ?>

        <?php
      } else {
        echo MusicFlowHelpers::get_term_header_image_bg( get_queried_object_id(), '', $default_header_image_bg );
        ?>
        <div class="top-wrapper small-wrapper skin-background-color2 header-background-<?php echo get_queried_object_id(); ?>">
        <?php
      }
      ?>

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

            <!-- Top content only events places taxonomy -->
            <?php if (get_option( "musicflow_events_places_header_version_".get_queried_object_id()) == 'one'): ?>

              <?php if (have_posts()): ?>
                <?php the_post(); ?>

                <div class="top-content">
                  <div class="three-fourth main-content-responsive">
                    <h1 class="skin-font-color3">
                      <?php if ($text_header = get_option( "musicflow_events_places_text_header_".get_queried_object_id())): ?>
                        <?php echo esc_html( $text_header ); ?>
                      <?php endif ?>
                      <span class="bold"><?php echo esc_html( get_queried_object()->name); ?></span>
                    </h1>
                    <span class="font-size-24px skin-font-color1 bold">
                      <?php $count_event = MusicFlowHelpers::count_posts_by_term('musicflow-events', get_query_var('taxonomy'), get_query_var('term')) ?>
                      <?php printf(_nx( '%s event', '%s events', $count_event, "theme",  "musicflow_theme" ), $count_event); ?>
                    </span>
                    <p class="skin-font-color3 font-size-16px"><?php echo esc_html(get_queried_object()->description); ?></p>

                  </div>
                  <div class="one-fourth last">
                    <?php if ($places_img = get_option( "musicflow_events_places_img_".get_queried_object_id())): ?>
                      <img src="<?php echo esc_url( $places_img ); ?>" alt="<?php echo esc_attr( get_queried_object()->name ); ?>">
                    <?php endif ?>
                  </div>

                </div>

              <?php endif ?>
              <?php rewind_posts(); ?>

            <?php endif ?>
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