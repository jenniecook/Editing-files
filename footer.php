<?php global $musicflow_admin; ?>
<!-- FOOTER -->

      <div class="footer skin-background-color11">
        <div class="center-wrapper skin-font-color12 regular">
          <?php if ($copyright = $musicflow_admin['general-settings-copyright']): ?>
            <span><?php echo esc_html($copyright); ?></span>
          <?php endif ?>

          <?php
            $defaults = array(
              'theme_location' => 'musicflow-footer-menu',
              'menu'           => __('Footer menu', "musicflow_theme"),
              'container'      => false,
              'menu_class'     => false,
              'echo'           => true,
              'fallback_cb'    => false,
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'          => -1,
              'walker'         => new MusicFlowCustomNavFooter
            );
            wp_nav_menu( $defaults );
          ?>
        </div>
      </div>

      <!-- /FOOTER -->

    <?php wp_footer(); ?>

    </body>

    <!-- /BODY -->

</html>