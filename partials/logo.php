<?php global $musicflow_admin; ?>
<a class="logo-link skin-font-color3 font-size-24px" href="<?php echo site_url(); ?>">
  <?php if (isset($musicflow_admin['general-settings-logo']) && isset($musicflow_admin['general-settings-logo']['url']) && $musicflow_admin['general-settings-logo']['url']): ?>
    <img src="<?php echo esc_url( $musicflow_admin['general-settings-logo']['url'] ); ?>" class="logo" alt="<?php echo esc_attr(bloginfo( 'name' )); ?>">
  <?php else: ?>
    <?php echo esc_html(bloginfo( 'name' )); ?>
  <?php endif ?>
</a>