<?php
if (class_exists('WPBakeryShortCode')) {
class WPBakeryShortCode_musicflow_vc_latest_news extends  WPBakeryShortCode
{
  public function content( $atts,  $content = "" ) {
    extract(shortcode_atts(array(
        'number_news' => 3,
        'icon'        => '',
        'el_class'    => '',
    ), $atts));

    ob_start();
    ?>

    <?php
      $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $number_news,
      );
      $latest_news = new WP_Query( $args );

      if ($latest_news->have_posts()): ?>

        <div class="main-content <?php echo esc_attr( $el_class ); ?>">
          <?php $i = 1; ?>
          <?php while($latest_news->have_posts()): $latest_news->the_post(); ?>
            <?php global $post; ?>
            <div class="one-third news<?php echo (($i % 3) == 0)? ' last' : '';?>">
            <?php if ($mf_thumb = MusicFlowHelpers::get_thumbnail($post->ID, 'mf-categories-featured')) :
                  echo wp_kses_post($mf_thumb);
              ?>
                <div class="img-hover font">
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
              <?php endif; ?>

              <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
              <span class="skin-font-color6 bold"><?php echo esc_html(get_the_date()); ?></span>
              <p><?php echo MusicFlowHelpers::cutText(get_the_content(), 200); ?></p>
            </div>
            <?php if (($i++ % 3) == 0): ?>
              <div class="clearfix"></div>
            <?php endif ?>
          <?php endwhile; ?>

        </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

vc_map(
    array(
      "name"                 => __("Latest News", "musicflow_theme"),
      "base"                 => "musicflow_vc_latest_news",
      "class"                => "musicflow-vc-latest-news",
      "icon"                 => MUSICFLOW_URL . "/extend/composer/images/vc-musicflow-icon.png",
      "category"             => __('MusicFlow', "musicflow_theme"),
      // 'admin_enqueue_js'  => array(get_template_directory_uri().'/vc_extend/bartag.js'),
      // 'admin_enqueue_css' => array( MUSICFLOW_URL .'/extend/composer/css/vc-toogle.css'),
      "params"               => array(
          array(
            'type'       => 'dropdown',
            'heading'    => __( 'Number News', "musicflow_theme" ),
            'description' => __( 'Number of news to show.', "musicflow_theme" ),
            'param_name' => 'number_news',
            'value'      => array(
              __( 'Three', "musicflow_theme" ) => "3",
              __( 'Six', "musicflow_theme" )   => '6',
              __( 'Nine', "musicflow_theme" ) => '9',
              __( 'Twelve', "musicflow_theme" )  => "12"
            ),
            'std' => '3',
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