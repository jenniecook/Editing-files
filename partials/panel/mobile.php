<?php global $current_user; ?>
<?php if ($current_user->ID): ?>

  <li class="skin-background-color4"><a class="skin-font-color3" href="<?php echo admin_url( 'profile.php' ); ?>"><?php _e( 'profile', "musicflow_theme" ); ?></a></li>
  <li class="skin-background-color4"><a class="skin-font-color3" href="<?php echo wp_logout_url(esc_url( home_url( '/' ) )); ?>"><?php _e( 'logout', "musicflow_theme" ); ?></a></li>

<?php else: ?>

  <li class="skin-background-color4"><a class="skin-font-color3" href="<?php echo wp_registration_url(); ?>"><?php _e( 'register', "musicflow_theme" ); ?></a></li>
  <?php if (is_home()): ?>
    <li class="skin-background-color4"><a class="skin-font-color3" href="<?php echo wp_login_url( esc_url( home_url( '/' ) ) ); ?>"><?php _e( 'login', "musicflow_theme" ); ?></a></li>
  <?php else: ?>
    <li class="skin-background-color4"><a class="skin-font-color3" href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e( 'login', "musicflow_theme" ); ?></a></li>
  <?php endif ?>

<?php endif ?>