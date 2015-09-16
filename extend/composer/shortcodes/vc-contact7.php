<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_contact7 extends  WPBakeryShortCode
{

  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'header'      => '',
        'header_bold' => '',
        'contact7_form'  => '',
        'el_class'    => '',
    ), $atts));

    ob_start();
    ?>

    <?php if (!empty($header)): ?>
      <div class="main-content <?php echo esc_attr( $el_class ); ?>">
        <h2 class="skin-font-color5">
           <?php echo wp_kses($header, array('span' => '')); ?>
           <?php if (!empty($header_bold)): ?>
             <span class="bold"><?php echo wp_kses($header_bold, array('span' => '')); ?></span>
           <?php endif ?>
        </h2>
        <?php //echo wp_kses($mf_google_map, array('iframe' => '')); ?>
      </div>
    <?php endif ?>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

$cf7 = get_posts( 'post_type="wpcf7_contact_form"&orderby=post_title&order=ASC&posts_per_page=-1' );

$contact_forms = array();
if ( $cf7 ) {
  foreach ( $cf7 as $cform ) {
    $contact_forms[ $cform->post_title ] = $cform->ID;
  }
} else {
  $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
}

 vc_map(
    array(
      "name"                 => __("Contact 7", "musicflow_theme"),
      "base"                 => "musicflow_vc_contact7",
      "class"                => "musicflow-vc-contact7",
      "icon"                 => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
      "category"             => __('MusicFlow', "musicflow_theme"),
      // 'admin_enqueue_js'  => array(get_template_directory_uri().'/vc_extend/bartag.js'),
      // 'admin_enqueue_css' => array( MUSICFLOW_URL .'/extend/composer/css/vc-toogle.css'),
      "params"               => array(
          array(
              "type"        => "textfield",
              "heading"     => __("Header", "musicflow_theme"),
              "param_name"  => "header",
              "value"       => "",
              "description" => __("Add text for your header", "musicflow_theme")
          ),
           array(
              "type"        => "textfield",
              "heading"     => __("Header Bold", "musicflow_theme"),
              "param_name"  => "header_bold",
              "value"       => "",
              "description" => __("Add bold text for your header", "musicflow_theme")
          ),
          array(
            'type'        => 'dropdown',
            'heading'     => __( 'Select contact form', "musicflow_theme" ),
            'description' => __( 'Choose previously created contact form from the drop down list.', "musicflow_theme" ),
            'param_name'  => 'contact7_form',
            'value'       => $contact_forms,
          ),              array(
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