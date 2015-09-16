<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_albums_search_form extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'el_class' => '',
    ), $atts));

    ob_start();
    ?>

    <div class="main-content">
      <div class="skin-background-color7 search-box">
        <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="search <?php echo esc_attr( $el_class ); ?>">
          <input type="text" name="s" class="skin-background-color2 skin-font-color7 font-size-14px font" value="<?php echo esc_attr( 'Search for music', "musicflow_theme" ); ?>" onblur="if(this.value == '') { this.value='<?php _e('Search for music', "musicflow_theme" ); ?>'}" onfocus="if (this.value == '<?php _e( 'Search for music', "musicflow_theme" ); ?>') {this.value=''}" >
          <input type="hidden" name="post_type" value="musicflow-albums" />
          <input type="submit" class="icon font-size-72px skin-font-color2 skin-color-hover4" value="r">
        </form>
      </div>
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

vc_map(
    array(
      "name"                 => __("Albums Search Form", "musicflow_theme"),
      "base"                 => "musicflow_vc_albums_search_form",
      "class"                => "musicflow-vc-albums-search-form",
      "icon"                 => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
      "category"             => __('MusicFlow', "musicflow_theme"),
      "params"               => array(
          array(
            'type'        => 'textfield',
            'heading'     => __( 'Extra class name', "musicflow_theme" ),
            'param_name'  => 'el_class',
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', "musicflow_theme" ),
          ),
      )
    )
);
}
?>