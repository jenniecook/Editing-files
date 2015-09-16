<?php get_template_part( 'partials/head' ); ?>

    <!-- BODY -->
    <?php
    $version = 'header-small';
    if (get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-version', true )) {
      $version = get_post_meta( $post->ID, 'musicflow-prefix-' . 'page-header-version', true );
    }

    get_template_part( 'partials/headers/' . $version); ?>