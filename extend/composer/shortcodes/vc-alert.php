<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_alert extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'href' => '',
        'target' => '_self',
        'title' => '',
        'color' => '',
        'style_alert' => '',
        'text_color' => '',
        'custom_color' => '',
        'text_custom_color' => '',
    ), $atts));

    ob_start();

    if ($text_color == 'val_text_custom_color' && isset($text_custom_color)) {
      $text_color = $text_custom_color;
    }
    $style = 'style="color:'. esc_attr( $text_color ). ' !important;';
    if ($color == 'val_custom_color' && !empty($custom_color)){
      $style .= "background-color:{$custom_color};";
    }
    $style .= '"';
    ?>
    <?php if (!empty($title)): ?>
        <a href="<?php echo esc_url( $href ); ?>" title="<?php echo esc_attr( $title ); ?>" target="<?php echo esc_attr( $target ); ?>" class="skin-background-hover3 vc_btn vc_btn-<?php echo esc_attr( $color ); ?> vc_btn_<?php echo esc_attr( $style_alert ); ?> button-normal alert" <?php echo esc_attr($style); ?>><?php echo esc_html( $title ); ?></a>
    <?php endif ?>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

  }
}

vc_map(
    array(
      'name' => __( 'Alert', "musicflow_theme" ),
      'base' => 'musicflow_vc_alert',
      'class' => 'musicflow-vc-alert',
      "icon"        => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
      "category"    => __('MusicFlow', "musicflow_theme"),
      'description' => __( 'Eye catching button', "musicflow_theme" ),
      'params' => array(
        array(
          'type'        => 'href',
          'heading'     => __( 'URL (Link)', "musicflow_theme" ),
          'param_name'  => 'href',
          'description' => __( 'Alert link.', "musicflow_theme" )
        ),
        array(
          'type'       => 'dropdown',
          'heading'    => __( 'Target', "musicflow_theme" ),
          'param_name' => 'target',
          'value'      => array(
              __( 'Same window', "musicflow_theme" ) => '_self',
              __( 'New window', "musicflow_theme" ) => "_blank",
          ),
          'dependency' => array(
            'element'   => 'href',
            'not_empty' => true,
            'callback'  => 'vc_cta_button_param_target_callback'
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Text on the alert', "musicflow_theme" ),
          'class'       => 'vc_btn',
          'param_name'  => 'title',
          'value'       => __( 'Text on the alert', "musicflow_theme" ),
        ),
        array(
          'type'               => 'dropdown',
          'heading'            => __( 'Background Color', "musicflow_theme" ),
          'param_name'         => 'color',
          'value'              => array_merge( VcLibrary::getColors(), array( __( 'Custom color', "musicflow_theme" ) => 'val_custom_color' ) ),
          'param_holder_class' => 'vc_colored-dropdown',
        ),
        array(
          'type'        => 'colorpicker',
          'heading'     => __( 'Custom Background Color', "musicflow_theme" ),
          'param_name'  => 'custom_color',
          'dependency'  => array(
            'element' => 'color',
            'value'   => 'val_custom_color',
          ),
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => __( 'Style', "musicflow_theme" ),
          'param_name'  => 'style_alert',
          'value'       => VcLibrary::getButtonStyles(),
          'std'         => 'square',
          'description' => __( 'Alert style.', "musicflow_theme" )
        ),
       array(
          'type'               => 'dropdown',
          'heading'            => __( 'Text Color', "musicflow_theme" ),
          'param_name'         => 'text_color',
          'value'              => array_merge( VcLibrary::getColors(), array( __( 'Custom color', "musicflow_theme" ) => 'val_text_custom_color' ) ),
          'std'                => 'white',
          'param_holder_class' => 'vc_colored-dropdown',
        ),
          array(
          'type'        => 'colorpicker',
          'heading'     => __( 'Custom Text Color', "musicflow_theme" ),
          'param_name'  => 'text_custom_color',
          'dependency'  => array(
            'element' => 'text_color',
            'value'   => 'val_text_custom_color',
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Extra class name', "musicflow_theme" ),
          'param_name'  => 'el_class',
          'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', "musicflow_theme" )
        )
      )
    )
);
}
?>