<?php global $musicflow_admin; ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9">    <![endif]-->

    <head>
      <meta charset="utf-8">
      <!-- Mobile viewport optimized: h5bp.com/viewport -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="format-detection" content="telephone=no">

      <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
      <![endif]-->
      <?php wp_head(); ?>

      <!-- Color Scheme -->
      <?php get_template_part( 'css/skin/scheme1' ); ?>
      <?php if ($custom_css = $musicflow_admin['general-settings-custom-css']): ?>
        <style>
          <?php echo esc_html($custom_css); ?>
        </style>
      <?php endif ?>
    </head>

    <!-- BODY -->