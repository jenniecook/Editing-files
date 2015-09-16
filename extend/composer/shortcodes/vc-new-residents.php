<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_residents extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'number_residents' => '',
        'icon'             => '',
        'el_class'         => '',
    ), $atts));


    $number      = $number_residents;
    $paged       = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $offset      = ($paged - 1) * $number;
    $users       = get_users();
    $query       = get_users('&offset='.$offset.'&number='.$number);
    $total_users = count($users);
    $total_query = count($query);
    $total_pages = intval($total_users / $number) + 1;

    ob_start();
    ?>

    <?php

      if ($query) : ?>

        <div class="main-content <?php echo esc_attr( $el_class ); ?>">
          <h2 class="skin-font-color5"><?php _e( 'All', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'residents', "musicflow_theme" ); ?></span></h2>

          <?php $i = 1; ?>
          <?php foreach ($query as $q) : ?>

              <div class="one-third resident<?php echo (($i % 3) == 0)? ' last' : '';?>">
                <img src="images/artists/1.jpg" alt="album">
                <div class="img-hover-resident font">
                  <?php if ($icon): ?>
                    <a href="<?php the_permalink(); ?>">
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
                      <span class="skin-font-color3 font-size-120px icon"><?php echo esc_html($icon_arr[0]); ?></span>
                    </a>
                  <?php endif; ?>
                </div>
                <h4 class="bold"><a href="resident_open.html" class="skin-font-color5 skin-color-hover1">wtxinc</a></h4>
                <span class="skin-font-color6 bold">DJ</span>
                <p>
                Donec gravida augue at mi dapibus, vel posuere sapien gravida. Nulla vel leo in nulla ultrices lobortis vitae ut lacus. Donec gravida tincidunt tortor.
                Phasellus quis nibh nec turpis egestas malesuada...
                </p>
              </div>
              <?php if (($i++ % 3) == 0): ?>
                <div class="clearfix"></div>
              <?php endif ?>
          <?php endforeach; ?>

        </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

 vc_map(
    array(
      "name"                 => __("Residents", "musicflow_theme"),
      "base"                 => "musicflow_vc_residents",
      "class"                => "musicflow-vc-residents",
      "icon"                 => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
      "category"             => __('MusicFlow', "musicflow_theme"),
      // 'admin_enqueue_js'  => array(get_template_directory_uri().'/vc_extend/bartag.js'),
      // 'admin_enqueue_css' => array( MUSICFLOW_URL .'/extend/composer/css/vc-toogle.css'),
      "params"               => array(
          array(
            'type'        => 'dropdown',
            'heading'     => __( 'Number Residents', "musicflow_theme" ),
            'description' => __( 'Number of residents to show per page.', "musicflow_theme" ),
            'param_name'  => 'number_residents',
            'value'       => array(
              __( 'Six', "musicflow_theme" )      => "6",
              __( 'Twelve', "musicflow_theme" )   => '12',
              __( 'Eighteen', "musicflow_theme" ) => '18',
            ),
            'std' => '18',
          ),
          array(
            'type'       => 'checkbox',
            'heading'    => __( 'Icon', "musicflow_theme" ),
            'param_name' => 'icon',
            'value'      => VcLibrary::$entypo_icons,
            'std'        => ']',
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