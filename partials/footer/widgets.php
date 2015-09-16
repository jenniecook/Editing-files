<?php global $musicflow_admin; ?>

<?php if (isset($musicflow_admin['footer-settings-widget']) && $musicflow_admin['footer-settings-widget']): ?>

  <div class="bottom skin-background-color2">

    <div class="center-wrapper widget-bottom-contact-us skin-font-color10">

      <?php
          $count_widgets = 0;
          if ($musicflow_admin['footer-settings-widget-contact-us']){
            $count_widgets++;
          }
          if ($musicflow_admin['footer-settings-widget-latest-posts']){
            $count_widgets++;
          }
          if ($musicflow_admin['footer-settings-widget-tag-cloud']){
            $count_widgets++;
          }
          if ($musicflow_admin['footer-settings-widget-flickr']){
            $count_widgets++;
          }

          $class_part = '';
          switch ($count_widgets) {
            case 1:
              $class_part = 'one';
              break;
            case 2:
              $class_part = 'half';
              break;
            case 3:
              $class_part = 'third';
              break;
            case 4:
              $class_part = 'fourth';
              break;
          }

      ?>

      <?php $set_last = 0; ?>
      <?php if ($musicflow_admin['footer-settings-widget-contact-us']): ?>

        <div class="one-<?php echo esc_attr($class_part); ?> regular">
          <?php $set_last++; ?>
          <h2 class="skin-font-color3"><?php _e( 'Contact', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'us', "musicflow_theme" ); ?></span></h2>
          <?php if ($musicflow_admin['footer-settings-widget-contact-us-text']): ?>
              <p><?php echo esc_html($musicflow_admin['footer-settings-widget-contact-us-text']); ?></p>
          <?php endif ?>
          <?php if (isset($musicflow_admin['footer-settings-widget-contact-us-fields']) && isset($musicflow_admin['footer-settings-widget-contact-us-fields'][0])): ?>
            <ul>
              <?php for ($i=0; $i < count($musicflow_admin['footer-settings-widget-contact-us-fields']); $i = $i+2) : ?>

                  <?php if (isset($musicflow_admin['footer-settings-widget-contact-us-fields'][$i])): ?>
                    <li>
                      <span class="skin-font-color1"><?php echo esc_html( $musicflow_admin['footer-settings-widget-contact-us-fields'][$i] ); ?></span>
                      <?php if (isset($musicflow_admin['footer-settings-widget-contact-us-fields'][$i+1])): ?>
                          <?php echo esc_html( $musicflow_admin['footer-settings-widget-contact-us-fields'][$i+1] ); ?>
                    </li>
                      <?php endif ?>

                  <?php endif ?>

              <?php endfor; ?>
            </ul>

          <?php endif ?>
        </div>

      <?php endif; ?>


      <?php if ($musicflow_admin['footer-settings-widget-latest-posts']): ?>

        <?php $set_last++; ?>
        <div class="one-<?php echo esc_attr($class_part); ?> widget-bottom-latest-posts regular<?php echo ($count_widgets == $set_last)? ' last' : ''; ?>">

          <h2 class="skin-font-color3"><?php _e( 'Latest', "musicflow_theme" ); ?>
            <span class="bold">
            <?php switch ($musicflow_admin['footer-settings-widget-latest-posts-choose']) {
              case 'post' :
                  _e('posts', "musicflow_theme");
                  break;
              case 'musicflow-events' :
                  _e('events', "musicflow_theme");
                  break;
              case 'musicflow-galleries' :
                  _e('galleries', "musicflow_theme");
              case 'musicflow-videos' :
                  _e('videos',  "musicflow_theme");
                  break;
              case 'musicflow-albums' :
                  _e('albums',  "musicflow_theme");
                  break;
            } ?>
            </span>
          </h2>

          <?php if ($musicflow_admin['footer-settings-widget-latest-posts-choose']): ?>
            <?php
                $args = array(
                  'post_type'      => $musicflow_admin['footer-settings-widget-latest-posts-choose'],
                  'post_status'    => 'publish',
                  'posts_per_page' => 5,
                );
                $latest_posts = new WP_Query( $args );
            ?>
            <?php if ($latest_posts->have_posts()): ?>
              <ul>
                <?php while($latest_posts->have_posts()): $latest_posts->the_post(); ?>
                  <li><a href="<?php the_permalink(); ?>" class="skin-font-color10 skin-color-hover1"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
              </ul>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>

        <?php endif ?>

        </div>

      <?php endif; ?>



      <?php if ($musicflow_admin['footer-settings-widget-tag-cloud']): ?>
        <?php $set_last++; ?>
        <div class="one-<?php echo esc_attr($class_part); ?> widget-bottom-tags regular<?php echo ($count_widgets == $set_last)? ' last' : ''; ?>">

          <h2 class="skin-font-color3"><?php _e( 'Tag', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'cloud', "musicflow_theme" ); ?></span></h2>
          <?php if (isset($musicflow_admin['footer-settings-widget-tag-cloud-taxonomy'])): ?>
            <?php foreach ($musicflow_admin['footer-settings-widget-tag-cloud-taxonomy'] as $taxonomy): ?>
              <?php switch ($taxonomy) {
                case 'post_tags':
                    $tags = get_tags();
                    foreach ($tags as $tag) : ?>
                      <a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="button-small skin-background-color1 skin-font-color3 skin-background-hover3"><?php echo esc_html($tag->name); ?></a>
                    <?php
                    endforeach;
                  break;
                default:
                  $terms = get_terms( $taxonomy, array('orderby=count&hide_empty=1') );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                      foreach ($terms as $term) : ?>
                        <a href="<?php echo get_term_link( $term ); ?>" class="button-small skin-background-color1 skin-font-color3 skin-background-hover3"><?php echo esc_html($term->name); ?></a>
                      <?php
                      endforeach;
                    endif;
                    break;
              } ?>
            <?php endforeach ?>
          <?php endif ?>
        </div>

      <?php endif; ?>


      <?php if ($musicflow_admin['footer-settings-widget-flickr']): ?>
        <?php $set_last++; ?>
        <div class="one-<?php echo esc_attr($class_part); ?> widget-bottom-flickr regular<?php echo ($count_widgets == $set_last)? ' last' : ''; ?>">

          <h2 class="skin-font-color3"><?php _e( 'Flickr', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'widget', "musicflow_theme" ); ?></span></h2>

          <?php if ($musicflow_admin['footer-settings-widget-flickr-number']): ?>
            <ul class="flickr"></ul>
            <script>
            ;(function($){
                $(document).ready(function(){

                  $('.flickr').jflickrfeed({
                      limit: 6,
                      qstrings: {
                        id: '<?php echo esc_js( $musicflow_admin["footer-settings-widget-flickr-number"] ); ?>'
                      },
                      itemTemplate: '<li><a href="{{image_b}}" data-rel="prettyPhoto" ><img src="{{image_s}}" alt="{{title}}" /></a></li>'

                      }, function(data) {
                        $('.flickr a').prettyPhoto();
                  });

                });
              })(jQuery);
            </script>
          <?php endif ?>
        </div>

      <?php endif; ?>

    </div>

    <!-- Go top - absolute  -->

    <div class="go-top skin-border-color5 skin-border-hover1">
      <a href="#" onClick="ScrollTo('body')"><img src="<?php echo MUSICFLOW_URL; ?>/images/go-top.png" alt="go-top"></a>
    </div>

    <?php wp_enqueue_script( 'musicflow-prefix-' . 'gotop' ); ?>

    <!-- Go top - /absolute  -->

  </div>

<?php endif; ?>