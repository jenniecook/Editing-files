<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_button extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'href'              => '',
        'target'            => '_self',
        'title'             => '',
        'align'             => '',
        'color'             => '',
        'style_button'      => '',
        'text_color'        => '',
        'size'              => '',
        'custom_color'      => '',
        'text_custom_color' => '',
        'el_class'          => '',
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
        <div class="vc_button-2-wrapper vc_button-2-align-<?php echo esc_attr( $align ); ?> <?php echo esc_attr($el_class); ?>">
          <a href="<?php echo esc_url( $href ); ?>" title="<?php echo esc_attr( $title ); ?>" target="<?php echo esc_attr( $target ); ?>" class="vc_btn vc_btn-<?php echo esc_attr( $color ); ?> vc_btn-<?php echo esc_attr( $size ); ?> vc_btn_<?php echo esc_attr( $style_button ); ?>" <?php echo esc_attr($style); ?>><?php echo esc_html( $title ); ?></a>
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
    'name'        => __( 'Button', "musicflow_theme" ),
    'base'        => 'musicflow_vc_button',
    'class'        => 'musicflow-vc-button',
    "icon"        => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
    "category"    => __('MusicFlow', "musicflow_theme"),
    'description' => __( 'Eye catching button', "musicflow_theme" ),
    'params'      => array(
      array(
        'type'        => 'href',
        'heading'     => __( 'URL (Link)', "musicflow_theme" ),
        'param_name'  => 'href',
        'description' => __( 'Button link.', "musicflow_theme" )
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
        'heading'     => __( 'Text on the button', "musicflow_theme" ),
        // 'holder'      => 'button',
        'class'       => 'vc_btn',
        'param_name'  => 'title',
        'value'       => __( 'Text on the button', "musicflow_theme" ),
        'description' => __( 'Text on the button.', "musicflow_theme" )
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => __( 'Button alignment', "musicflow_theme" ),
        'param_name' => 'align',
        'value'      => array(
          __( 'Inline', "musicflow_theme" ) => "inline",
          __( 'Left', "musicflow_theme" )   => 'left',
          __( 'Center', "musicflow_theme" ) => 'center',
          __( 'Right', "musicflow_theme" )  => "right"
        ),
        'description' => __( 'Select button alignment.', "musicflow_theme" )
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => __( 'Background Color', "musicflow_theme" ),
        'param_name' => 'color',
        'value'      => array_merge( VcLibrary::getColors(), array( __( 'Custom color', "musicflow_theme" ) => 'val_custom_color' ) ),
        // 'description'        => __( 'color.', "musicflow_theme" ),
        'param_holder_class' => 'vc_colored-dropdown',
      ),
      array(
        'type'        => 'colorpicker',
        'heading'     => __( 'Custom Background Color', "musicflow_theme" ),
        'param_name'  => 'custom_color',
        // 'description' => __( 'Select custom bag color.', "musicflow_theme" ),
        'dependency'  => array(
          'element' => 'color',
          'value'   => 'val_custom_color',
        ),
      ),
      array(
        'type'        => 'dropdown',
        'heading'     => __( 'Style', "musicflow_theme" ),
        'param_name'  => 'style_button',
        'value'       => VcLibrary::getButtonStyles(), //getVcShared( 'button styles' ),
        'description' => __( 'Button style.', "musicflow_theme" )
      ),
      // array(
      //   'type' => 'dropdown',
      //   'heading' => __( 'Color', "musicflow_theme" ),
      //   'param_name' => 'color',
      //   'value' => getVcShared( 'colors' ),
      //   'description' => __( 'Button color.', "musicflow_theme" ),
      //   'param_holder_class' => 'vc_colored-dropdown'
      // ),
      // array(
      //   'type' => 'dropdown',
      //   'heading' => __( 'Background Style', "musicflow_theme" ),
      //   'param_name' => 'background_style',
      //   'value' => array(
      //     __( 'None', "musicflow_theme" )            => '',
      //     __( 'Circle', "musicflow_theme" )          => 'rounded',
      //     __( 'Square', "musicflow_theme" )          => 'boxed',
      //     __( 'Rounded', "musicflow_theme" )         => 'rounded-less',
      //     __( 'Outline Circle', "musicflow_theme" )  => 'rounded-outline',
      //     __( 'Outline Square', "musicflow_theme" )  => 'boxed-outline',
      //     __( 'Outline Rounded', "musicflow_theme" ) => 'rounded-less-outline',
      //   ),
      //   'description' => __( 'Background style for button.', "musicflow_theme" )
      // ),
      array(
        'type'               => 'dropdown',
        'heading'            => __( 'Text Color', "musicflow_theme" ),
        'param_name'         => 'text_color',
        'value'              => array_merge( VcLibrary::getColors(), array( __( 'Custom color', "musicflow_theme" ) => 'val_text_custom_color' ) ),
        'std'                => 'white',
        'description'        => __( 'Text Color.', "musicflow_theme" ),
        'param_holder_class' => 'vc_colored-dropdown',
        // 'dependency'         => array(
        //   'element'   => 'background_style',
        //   'not_empty' => true,
        // ),
      ),
      array(
        'type'        => 'colorpicker',
        'heading'     => __( 'Custom Icon Color', "musicflow_theme" ),
        'param_name'  => 'text_custom_color',
        'description' => __( 'Select custom text color.', "musicflow_theme" ),
        'dependency'  => array(
          'element' => 'text_color',
          'value'   => 'val_text_custom_color',
        ),
      ),
      /*array(
          'type' => 'dropdown',
          'heading' => __( 'Icon', "musicflow_theme" ),
          'param_name' => 'icon',
          'value' => getVcShared( 'icons' ),
          'description' => __( 'Button icon.', "musicflow_theme" )
      ),*/
      array(
        'type'        => 'dropdown',
        'heading'     => __( 'Size', "musicflow_theme" ),
        'param_name'  => 'size',
        'value'       => VcLibrary::getSizes(), // getVcShared( 'sizes' ),
        'std'         => 'md',
        'description' => __( 'Button size.', "musicflow_theme" )
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