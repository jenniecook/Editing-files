<?php get_header(); ?>

  <div class="center-wrapper main-content-wrapper">

    <!-- MAIN CONTENT -->

    <div class="three-fourth main-content-responsive">

      <!-- news -->

      <?php get_template_part( 'partials/home/latest', 'news' ); ?>

      <!-- /news -->

      <div class="clearfix"></div>

      <!-- search -->

      <div class="main-content">
        <div class="skin-background-color7 search-box">

          <form role="search" action="<?php echo esc_url(site_url('/')); ?>" method="get" id="searchform" class="search" >
            <input type="text" id="search-s" name="s" class="skin-background-color2 skin-font-color7 font-size-14px font" value="<?php esc_attr_e( 'Search for music', "musicflow_theme" ); ?>" onblur="if(this.value == '') { this.value='<?php _e('Search for music', "musicflow_theme" ); ?>'}" onfocus="if (this.value == '<?php _e( 'Search for music', "musicflow_theme" ); ?>') {this.value=''}" >
            <input type="hidden" name="post_type" value="musicflow-albums" />
            <input type="submit" id="search-submit" class="icon font-size-72px skin-font-color2 skin-color-hover4" value="r">
          </form>
        </div>
      </div>

      <!-- /search -->

      <div class="clearfix"></div>

      <!-- events -->

      <?php get_template_part( 'partials/home/upcoming', 'events' ); ?>

      <!-- /events -->

      <div class="clearfix"></div>

      <!-- videos -->

      <?php get_template_part( 'partials/home/new', 'videos' ); ?>

      <!-- /videos -->

      <div class="clearfix"></div>

    </div>

    <!-- /MAIN CONTENT -->

    <!-- SIDEBAR -->

    <?php get_sidebar(); ?>

    <!-- /SIDEBAR -->

  </div>

  <div class="clearfix"></div>

  <!-- BOTTOM -->

  <?php get_template_part( 'partials/footer/widgets' ); ?>

  <!-- /BOTTOM -->

  <div class="clearfix"></div>

<?php get_footer(); ?>
