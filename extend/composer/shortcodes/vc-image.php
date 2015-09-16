<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_image extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'image'    => '',
        'el_class' => '',
    ), $atts));


    ob_start();
    ?>

    <?php if (!empty($image)): ?>
      <?php
        $medium =  wp_get_attachment_image_src( $image, 'medium' );
        $large =  wp_get_attachment_image_src( $image, 'large' );
      ?>
      <div class="photo <?php echo esc_attr( $el_class ); ?>">
        <img src="<?php echo  esc_url( $medium[0] ); ?>" alt="gallery">
        <div class="img-hover font">
          <a href="<?php echo esc_url( $large[0] ); ?>" data-rel="prettyPhoto">
            <span class="skin-font-color3 font-size-120px icon">]</span>
          </a>
        </div>
      </div>
    <?php endif ?>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

 vc_map(
    array(
      "name"                 => __("Image", "musicflow_theme"),
      "description"          => __('Upload image.', "musicflow_theme"),
      "base"                 => "musicflow_vc_image",
      "class"                => "musicflow-vc-image",
      "icon"                 => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
      "category"             => __('MusicFlow', "musicflow_theme"),
      // 'admin_enqueue_js'  => array(get_template_directory_uri().'/vc_extend/bartag.js'),
      // 'admin_enqueue_css' => array( MUSICFLOW_URL .'/extend/composer/css/vc-toogle.css'),
      "params"               => array(
          array(
              "type"        => "attach_image",
              "heading"     => __("Image", "musicflow_theme"),
              "param_name"  => "image",
              "value"       => "",
              "description" => __("Upload image.", "musicflow_theme")
          ),
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