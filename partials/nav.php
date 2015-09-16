<?php global $musicflow_admin; ?>
<!-- Main menu  -->
<ul id="%1$s" class="%2$s main-menu regular">
  <?php
  $defaults = array(
    'theme_location' => 'musicflow-main-menu',
    'menu'           => __('Main menu', "musicflow_theme"),
    'container'      => false,
    'menu_class'     => false,
    'echo'           => true,
    'fallback_cb'    => false,
    'items_wrap'     => '%3$s',
    'depth'          => 0,
    'walker'         => new MusicFlowCustomNav
  );
    wp_nav_menu( $defaults );
  ?>
  <?php if ($musicflow_admin['general-settings-show-panel']): ?>
    <?php get_template_part( 'partials/panel/main' ); ?>
  <?php endif ?>
</ul>

<!-- /Main menu  -->

<!-- Mobile menu -->

<span class="mobile-button icon font-size-46px skin-color-hover1">i</span>

<ul id="%1$s" class="%2$s mobile-menu regular">
<?php
  $defaults = array(
  'theme_location' => 'musicflow-main-menu',
  'menu'           => __('Main menu', "musicflow_theme"),
  'container'      => false,
  'menu_class'     => false,
  'echo'           => true,
  'fallback_cb'    => false,
  'items_wrap'     => '%3$s',
  'depth'          => -1,
  'walker'         => new MusicFlowCustomNavMobile
);
  wp_nav_menu( $defaults );
?>
<?php if ($musicflow_admin['general-settings-show-panel']): ?>
  <?php get_template_part( 'partials/panel/mobile' ); ?>
<?php endif ?>
</ul>