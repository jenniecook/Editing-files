<?php
if (class_exists('WPBakeryShortCode')) {

  class WPBakeryShortCode_musicflow_vc_toggle extends  WPBakeryShortCode
  {
    public function content( $atts,  $content = "" ) {
      extract(shortcode_atts(array(
        'title'              => '',
        'bg_color'           => '',
        'title_color'        => '',
        'text_content'       => '',
        'content_bg_color'   => '',
        'content_text_color' => '',
        'icon'               => '',
        'el_class'           => '',
      ), $atts ));

      $title_color = esc_attr( $title_color );
      $bg_color = esc_attr( $bg_color );
      $content_bg_color = esc_attr( $content_bg_color );
      $content_text_color = esc_attr( $content_text_color );

      ob_start();
      ?>

      <div class="toggle <?php echo esc_attr( $el_class ); ?>">
        <a href="#" class="button-normal skin-background-hover3" style="color: <?php echo VcLibrary::$musicflow_colors[$title_color]; ?>; background-color: <?php echo VcLibrary::$musicflow_colors[$bg_color]; ?>;">
          <?php echo esc_html( $title ); ?>
          <?php if ($icon): ?>
            <?php $icon_arr = explode(',', $icon); ?>
            <?php switch ($icon_arr[0]) {
              case '10':
                $icon_arr[0] = 0;
                break;
              case '12':
                $icon_arr[0] = '[';
                break;
              case '13':
                $icon_arr[0] = ']';
                break;
              case '14':
                $icon_arr[0] = '"';
                break;
              case '15':
                $icon_arr[0] = ',';
                break;
            } ?>
            <div class="button-detail" style="background-color: <?php echo VcLibrary::$musicflow_colors[$content_bg_color]; ?>;">
              <span class="icon font-size-46px skin-font-color3"><?php echo esc_html($icon_arr[0]); ?></span>
            </div>
          </a>
          <?php endif ?>
        </a>
        <div class="toggle-content" style="color: <?php echo VcLibrary::$musicflow_colors[$content_text_color];?>; background-color: <?php echo VcLibrary::$musicflow_colors[$content_bg_color]; ?>;">
          <p><?php echo esc_html($text_content); ?></p>
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
        "name"              => __( "Toogle", "musicflow_theme" ),
        "base"              => "musicflow_vc_toggle",
        "class"             => "musicflow-vc-toggle",
        "icon"              => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
        "category"          => __( "MusicFlow", "musicflow_theme"),
        // 'admin_enqueue_js'  => array(get_template_directory_uri().'/vc_extend/bartag.js'),
        'admin_enqueue_css' => array( MUSICFLOW_URL .'/extend/composer/css/vc-toogle.css'),
        "params" => array(
           array(
              'type'        => 'textfield',
              'heading'     => __( 'Title', "musicflow_theme" ),
              'param_name'  => 'title',
              'description' => __( 'Title toogle.', "musicflow_theme" ),
              "holder"      => "div",
              "class"       => "",
              // 'admin_label' => true,
           ),
           array(
            'type'               => 'dropdown',
            'heading'            => __( 'Title Background Color', "musicflow_theme" ),
            'param_name'         => 'bg_color',
            'value'              => VcLibrary::getColors(),
            'std'                => 'juicy_pink',
            'description'        => __( 'Text color.', "musicflow_theme" ),
            'param_holder_class' => 'vc_colored-dropdown',
          ),
          array(
            'type'               => 'dropdown',
            'heading'            => __( 'Title Text Color', "musicflow_theme" ),
            'param_name'         => 'title_color',
            'value'              => VcLibrary::getColors(),
            'std'                => 'white',
            'description'        => __( 'Title Text Color.', "musicflow_theme" ),
            'param_holder_class' => 'vc_colored-dropdown',
          ),
          array(
            'type'        => 'textarea',
            'heading'     => __( 'Content', "musicflow_theme" ),
            'param_name'  => 'text_content',
            'value'       => __( 'This is custom content text for toggle.', "musicflow_theme" ),
          ),
          array(
              'type'               => 'dropdown',
              'heading'            => __( 'Content Background Color', "musicflow_theme" ),
              'param_name'         => 'content_bg_color',
              'value'              => VcLibrary::getColors(),
              'std'                => 'black',
              'param_holder_class' => 'vc_colored-dropdown',
            ),
          array(
              'type'               => 'dropdown',
              'heading'            => __( 'Content Text Color', "musicflow_theme" ),
              'param_name'         => 'content_text_color',
              'value'              => VcLibrary::getColors(),
              'std'                => 'grey',
              'param_holder_class' => 'vc_colored-dropdown',
          ),
          array(
            'type'       => 'checkbox',
            'heading'    => __( 'Icon', "musicflow_theme" ),
            'param_name' => 'icon',
            'value'      => VcLibrary::$entypo_icons,
            'std'        => '*',
            'description' => __( 'Choose one, if you select more will show up first.', "musicflow_theme" ),
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