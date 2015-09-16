<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_header extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'header'   => '',
        'header_bold'   => '',
        'el_class' => '',
    ), $atts));

    ob_start();
    ?>

    <?php if (!empty($header)): ?>
		<h2 class="skin-font-color5 <?php echo esc_attr( $el_class ); ?>">
		   <?php echo wp_kses($header, array('span' => '')); ?>
		   <?php if (!empty($header_bold)): ?>
			 <span class="bold"><?php echo wp_kses($header_bold, array('span' => '')); ?></span>
		   <?php endif ?>
		</h2>
    <?php endif ?>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

wpb_map(
  array(
    "name"                 => __("Header", "musicflow_theme"),
    "description"          => __('Insert text into header', "musicflow_theme"),
    "base"                 => "musicflow_vc_header",
    "class"                => "musicflow-vc-header",
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