<?php get_header(); ?>
      <div class="center-wrapper main-content-wrapper">

        <!-- MAIN CONTENT -->

        <div class="three-fourth main-content-responsive">


          <?php if (!have_posts()): ?>

            <!-- not event -->

            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>

              <div class="event-open">
                <h2 class="bold skin-font-color5 event-open-h2"><?php _e( 'Events no found', "musicflow_theme" ); ?></h2>
              </div>

            </div>

          <?php else: ?>

            <?php the_post(); ?>

            <!-- event -->

            <div id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>

              <div class="event-open">

                <?php if ($event_top_image = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-top-image', true )): ?>
                  <img src="<?php echo esc_url($event_top_image); ?>" class="event-open-img" alt="<?php echo the_title_attribute('echo=0'); ?>">
                <?php endif ?>

                <h2 class="bold skin-font-color5 event-open-h2"><?php the_title(); ?></h2>
                <div class="info-button-box">
                  <div class="one-third">
                    <span class="button-normal skin-background-color4 skin-font-color3">
                      <?php _e('Start', "musicflow_theme") ?>:
                      <?php if ($event_start_date = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-date-time-start', false )): ?>
                        <?php echo esc_html( date("j F, Y H:i A", $event_start_date[0]) );  ?>
                      <?php endif ?>
                    </span>
                  </div>
                  <div class="one-third">
                    <span class="button-normal skin-background-color4 skin-font-color3">
                      <?php _e('Location', "musicflow_theme") ?>:
                      <?php echo esc_html(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-location', true ));?>
                    </span>
                    </span>
                  </div>
                  <div class="one-third last">
                      <?php echo MusicFlowHelpers::event_tickets($post->ID); ?>
                  </div>
                  <div class="one-third">
                    <span class="button-normal skin-background-color4 skin-font-color3">
                      <?php _e('End', "musicflow_theme") ?>:
                      <?php if ($event_end_date = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-date-time-end', false )): ?>
                        <?php echo esc_html( date("j F, Y H:i A", $event_end_date[0]) );  ?>
                      <?php endif ?>
                    </span>
                  </div>
                  <div class="one-third">
                    <span class="button-normal skin-background-color4 skin-font-color3">
                      <?php _e('Venue', "musicflow_theme") ?>:
                      <?php echo esc_html( get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-venue', true ) );?>
                    </span>
                  </div>
                  <div class="one-third last">
                    <span class="button-normal skin-background-color4 skin-font-color3">
                      <?php _e('Price', "musicflow_theme") ?>:
                      <?php echo esc_html( get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-price', true ) );?>
                    </span>
                  </div>
                </div>
                <?php the_content(); ?>

              </div>

            </div>

            <!-- /event -->

            <div class="clearfix"></div>

            <!-- google map -->
             <?php if ( ($google_lat = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-google-lat', true )) &&
                        ($google_lng = get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-google-lng', true )) ) : ?>
                <?php  $zoom = get_post_meta( $post->ID, 'musicflow-prefix-'. 'event-google-zoom', true ); ?>
                <div class="main-content">
                  <h2 class="skin-font-color5"><?php _e('Google', "musicflow_theme" ); ?> <span class="bold"><?php _e('map', "musicflow_theme" ); ?></span></h2>
                  <style>
                  .map{
                      width:100%;
                      height:350px;
                  }
                  </style>
                  <div id="map"class="map"></div>

                </div>
                <?php
                  $street   = esc_js(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-google-street', true ));
                  $city     = esc_js(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-google-city', true ));
                  $zip_code = esc_js(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-google-zip-code', true ));
                  $icon     = esc_js(get_post_meta( $post->ID, 'musicflow-prefix-' . 'event-google-icon', true ));
                ?>
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <script type="text/javascript">
                  var geocoder;
                  var map;
                  function initialize() {
                    geocoder = new google.maps.Geocoder();
                    var latlng = new google.maps.LatLng(<?php echo esc_js($google_lat); ?>,<?php echo esc_js($google_lng); ?>);
                    var mapOptions = {
                      zoom: <?php echo esc_js( $zoom ); ?>,
                      center: latlng,
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    map = new google.maps.Map(document.getElementById('map'), mapOptions);
                    <?php if (!empty($street) || !empty($city)) : ?>
                      codeAddress();
                    <?php endif; ?>
                  }

                  function codeAddress() {
                    var image = '<?php echo esc_js($icon); ?>';
                    var address = '<?php echo esc_js($street);?>, <?php echo esc_js($zip_code);?>, <?php echo esc_js($city);?>';
                    geocoder.geocode( { 'address': address}, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                          map: map,
                          icon: image,
                          position: results[0].geometry.location
                        });
                      } else {
                        alert('<?php echo __( "Geocode was not successful for the following reason", "musicflow_theme" ) ?>' + status);
                      }
                    });
                  }
                  initialize();
              </script>
            <?php endif ?>

            <!-- /google map -->

            <div class="clearfix"></div>

            <!-- comment form and comments -->

            <?php comments_template(); ?>

            <!-- comment form and comments -->

          <?php endif; ?>

        </div>

        <!-- /MAIN CONTENT -->

        <!-- SIDEBAR -->

         <?php if ($sidebar_type = get_post_meta( $post->ID, 'musicflow-prefix-' . 'sidebar-type', true )): ?>
          <?php if ($sidebar_type == 'first'): ?>
            <?php get_sidebar(); ?>
          <?php else: ?>
            <?php get_sidebar($sidebar_type); ?>
          <?php endif ?>
        <?php else: ?>
          <?php get_sidebar(); ?>
        <?php endif ?>

        <!-- /SIDEBAR -->

      </div>

      <div class="clearfix"></div>

      <!-- BOTTOM -->

      <?php get_template_part( 'partials/footer/widgets' ); ?>

      <!-- /BOTTOM -->

      <div class="clearfix"></div>

<?php get_footer(); ?>