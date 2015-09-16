<?php global $musicflow_admin; ?>

<div class="one-fourth last sidebar-responsive">

  <?php if ( function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-8') ) :

    dynamic_sidebar('sidebar-8');

  else : ?>


    <?php if ( isset($musicflow_admin['sidebar-settings-media-player']) && $musicflow_admin['sidebar-settings-media-player'] ): ?>

      <!-- Media player -->

      <div class="sidebar-content widget-sidebar-media-player">
        <h2 class="skin-font-color5"><?php _e( 'Media', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'player', "musicflow_theme" ); ?></span></h2>
        <?php
          $last_album_args = array(
            'post_type'      => 'musicflow-albums',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
          );
          if ($musicflow_admin['sidebar-settings-media-player-item']) {
            $last_album_args['p'] = $musicflow_admin['sidebar-settings-media-player-item'];
          }
          $latest_album = new WP_Query($last_album_args);
        ?>
        <?php while($latest_album->have_posts()): $latest_album->the_post(); ?>
          <div class="album-info">
            <div class="one-half first-half">
              <h6 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h6>
              <p>
                <?php
                  $artists_list = array();
                  if ($artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true)){
                    foreach ($artists as $artist) {
                        $artists_list[] = $artist['name'];
                    }
                  }
                  if ($artists_list) {
                    echo implode(', ', $artists_list);
                    echo '<br>';
                  }
                ?>
                <?php if ($album_relase_date = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-relase-date', true )){
                   echo esc_html(date('F j Y', strtotime($album_relase_date)));
                } ?>
              </p>
            </div>
            <div class="one-half last">
              <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
                <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                <div class="img-hover-sidebar font">
                  <a href="<?php the_permalink(); ?>">
                    <span class="skin-font-color3 font-size-120px icon">]</span>
                  </a>
                </div>
              <?php endif ?>
            </div>
          </div>
          <?php if ($songs = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-songs', true )): ?>
            <ul>
              <?php $item = 1; ?>
              <?php foreach ($songs as $song): ?>
                <li class="skin-border-color4">
                  <a class="skin-font-color13 skin-color-hover1 fap-single-track"
                    href="<?php echo esc_url( $song['url'] ); ?>"
                    title="<?php echo isset($artists_list[0]) ? esc_attr($artists_list[0]) .' - ' : ''; ?><?php echo esc_html($song['title']); ?>"
                    target="<?php echo site_url( '/' ); ?>"
                    rel="<?php echo esc_attr($album_img); ?>"
                    data-meta="#fap-meta-track1"><?php echo esc_html($item++); ?>. <?php echo esc_html( $song['title'] ); ?>
                    <div class="media-player-play-pause skin-border-color4">
                      <span class="icon font-size-24px skin-font-color7">{</span>
                    </div>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>

           <?php if (get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-buy', true) != 'hide'): ?>
            <?php
              switch (get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-buy', true)) {
                case 'free':
                  $buy_text = __('Free in store', "musicflow_theme");
                  break;
                case 'buy' :
                  $buy_text = __('Buy in store', "musicflow_theme");
                  break;
              }
            ?>
            <a href="<?php echo esc_url( get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-shop', true)); ?>" class="button-small skin-background-color1 skin-font-color3 skin-background-hover3"><?php echo esc_html($buy_text); ?></a>
          <?php endif ?>

          <?php if ($album_price = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-price', true )): ?>
            <?php if (is_numeric($album_price)): ?>
              <span class="price bold font-size-14px">$<?php echo esc_html($album_price); ?></span>
            <?php else: ?>
              <span class="price bold font-size-14px"><?php echo esc_html($album_price); ?></span>
            <?php endif ?>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

      </div>

      <!-- /Media player -->

      <div class="clearfix"></div>

    <?php endif ?>


    <?php if ( isset($musicflow_admin['sidebar-settings-other-albums']) && $musicflow_admin['sidebar-settings-other-albums'] ): ?>

      <!-- Other albums -->

      <div class="sidebar-content widget-sidebar-other-albums">
        <h2 class="skin-font-color5"><?php _e( 'Other', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'albums', "musicflow_theme" ); ?></span></h2>
        <?php
          $last_album_args = array(
            'post_type'      => 'musicflow-albums',
            'post_status'    => 'publish',
            'posts_per_page' => 3, // last and 3 others require to the Other albums section
          );
          if (isset($musicflow_admin['sidebar-settings-other-albums-items'])) {
            foreach ($musicflow_admin['sidebar-settings-other-albums-items'] as $item) {
              $post_in[] = $item;
            }
            if ($post_in) {
              $last_album_args['post__in'] = $post_in;
            }
          }
          $latest_album = new WP_Query($last_album_args);
        ?>
        <?php while($latest_album->have_posts()): $latest_album->the_post(); ?>

            <div class="album-info">
              <div class="one-half first-half">
                <h6 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h6>
                <p>
                  <?php
                    $artists_list = array();
                    if ($artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true)){
                      foreach ($artists as $artist) {
                          $artists_list[] = $artist['name'];
                      }
                    }
                    if ($artists_list) {
                      echo implode(', ', $artists_list);
                      echo '<br>';
                    }
                  ?>
                  <?php if ($album_relase_date = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-relase-date', true )){
                     echo esc_html(date('F j Y', strtotime($album_relase_date)));
                  } ?>
                </p>
              </div>
              <div class="one-half last">
                <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
                  <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                  <div class="img-hover-sidebar font">
                    <a href="<?php the_permalink(); ?>">
                      <span class="skin-font-color3 font-size-120px icon">]</span>
                    </a>
                  </div>
                <?php endif ?>
              </div>
            </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

      </div>

      <!-- /Other albums-->

      <div class="clearfix"></div>

    <?php endif; ?>

   <?php if ( isset($musicflow_admin['sidebar-settings-search']) && $musicflow_admin['sidebar-settings-search'] ): ?>

      <!-- search -->

      <div class="sidebar-content widget-sidebar-search">
        <h2 class="skin-font-color5"><?php _e( 'Search', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'content', "musicflow_theme" ); ?></span></h2>
        <div class="skin-background-color7 search-box">
          <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="search" >
            <input type="text" name="s" class="skin-background-color2 skin-font-color7 font-size-14px font" value="<?php echo esc_attr( 'Search here', "musicflow_theme" ); ?>" onblur="if(this.value == '') { this.value='<?php _e('Search here', "musicflow_theme" ); ?>'}" onfocus="if (this.value == '<?php _e( 'Search here', "musicflow_theme" ); ?>') {this.value=''}" >
            <input type="submit" class="icon font-size-72px skin-font-color2 skin-color-hover4" value="r">
          </form>
        </div>
      </div>

      <!-- /search -->

      <div class="clearfix"></div>

    <?php endif; ?>

    <?php if ( isset($musicflow_admin['sidebar-settings-widget-text']) && $musicflow_admin['sidebar-settings-widget-text'] ): ?>

      <!-- Text widget -->

      <div class="sidebar-content widget-sidebar-text-widget">
        <?php if ($musicflow_admin['sidebar-settings-widget-text-title']): ?>
          <h2 class="skin-font-color5"><?php echo esc_html( $musicflow_admin['sidebar-settings-widget-text-title'] ); ?>
            <?php if ($musicflow_admin['sidebar-settings-widget-text-title-bold']): ?>
              <span class="bold"><?php echo esc_html( $musicflow_admin['sidebar-settings-widget-text-title-bold'] ); ?></span>
            <?php endif ?>
          </h2>
        <?php endif ?>
        <?php if ($musicflow_admin['sidebar-settings-widget-text-content']): ?>
          <p><?php echo esc_html($musicflow_admin['sidebar-settings-widget-text-content']); ?></p>
        <?php endif ?>
        <p>
      </div>

      <!-- /Text widget -->

      <div class="clearfix"></div>

    <?php endif; ?>

    <?php if ( isset($musicflow_admin['sidebar-settings-popular-artists']) && $musicflow_admin['sidebar-settings-popular-artists'] ): ?>

      <!-- Popular artists -->

      <div class="sidebar-content widget-sidebar-popular-artist">
        <h2 class="skin-font-color5"><?php _e( 'Popular', "musicflow_theme" ); ?> <span class="bold"><?php _e( 'artists', "musicflow_theme" ); ?></span></h2>

        <?php
          $all_events_albums = get_posts(
            array(
                'post_type'      => array( 'musicflow-events', 'musicflow-albums'),
                'post_status'    => 'publish',
                'posts_per_page' => -1,
            )
          );

          wp_reset_postdata();
          $users = array();
          foreach ($all_events_albums as $event_album) {

              if (!isset($users[$event_album->post_author][$event_album->post_type])) {
                if (!isset($users[$event_album->post_author]['all'])) {
                    $users[$event_album->post_author]['all'] = 1;
                    $users[$event_album->post_author]['post_author'] = $event_album->post_author;
                } else{
                    $users[$event_album->post_author]['all'] = $users[$event_album->post_author]['all'] + 1;
                }
                $users[$event_album->post_author][$event_album->post_type] = 1;

              } else{
                $users[$event_album->post_author]['all'] = $users[$event_album->post_author]['all'] + 1;
                $users[$event_album->post_author][$event_album->post_type] = $users[$event_album->post_author][$event_album->post_type] + 1;
              }
          }

          if ( ! empty( $users ) ) :

              // Sorting for all posts
              $temp_sort_by_all = array();
              foreach ($users as $key => $row)
              {
                  $temp_sort_by_all[$key] = $row['all'];
              }
              array_multisort($temp_sort_by_all, SORT_DESC, $users);

              $break = 0;
              $number = $musicflow_admin['sidebar-settings-popular-artists-show'];

              foreach ( $users as $user ) : ?>
                <?php if ($break++ == (int)$number) {
                  break;
                } ?>
                  <div class="artist-info">
                      <div class="one-half first-half">
                          <h6 class="bold"><a href="<?php echo esc_url(get_author_posts_url($user['post_author'])); ?>" class="skin-font-color5 skin-color-hover1"><?php echo esc_html(get_user_option( 'display_name', $user['post_author'] )); ?></a></h6>
                          <p>
                              <?php if (isset($user['musicflow-events'])) {
                              echo sprintf( _nx( '%s event', '%s events', ($user['musicflow-events']), "theme",  "musicflow_theme" ), $user['musicflow-events']);
                              } ?>
                              <?php if (isset($user['musicflow-albums'])) {
                                  echo '<br>' . sprintf( _nx( '%s album', '%s albums', ($user['musicflow-albums']), "theme",  "musicflow_theme" ), $user['musicflow-albums']);
                              } ?>
                          </p>
                      </div>
                      <div class="one-half last">
                          <?php if ($user_avatar = get_user_meta( $user['post_author'], 'user_avatar', true )): ?>
                            <img src="<?php echo esc_url( $user_avatar ); ?>">
                            <div class="img-hover-sidebar font">
                                <a href="<?php echo esc_url(get_author_posts_url($user['post_author'])); ?>">
                                    <span class="skin-font-color3 font-size-120px icon">]</span>
                                </a>
                            </div>
                          <?php endif ?>
                      </div>
                  </div>

              <?php endforeach; ?>

          <?php else: ?>

              <p><?php _e( 'No found artists', "musicflow_theme" ); ?></p>

          <?php endif;

          wp_reset_postdata();

        ?>
        </div>

      <!-- /Popular artist -->

    <?php endif; ?>

  <?php endif; ?>

</div>