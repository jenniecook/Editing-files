<?php


/**
 * Widget Name: Media player promo
 */

add_action( 'widgets_init', 'musicflow_media_player_promo' );

function musicflow_media_player_promo() {
    register_widget( 'musicflow_media_player_promo' );
}

class musicflow_media_player_promo extends WP_Widget {

    function __construct() {

        $widget_options = array( 'description' => __( 'Big version album with player.', "musicflow_theme" ) );

        $control_options = array(  'id_base' => 'musicflow_media_player_promo_id' );

        parent::__construct(
            'musicflow_media_player_promo_id',   // WP ID should be unique
            'MusicFlow Media Player Big',        // name displayed in WP widgets area
            $widget_options, $control_options);
    }

     function widget( $args, $instance ) {

        extract( $args );
        extract ( $instance );

            //Our variables from the widget settings.
            echo '<div class="sidebar-content widget-sidebar-media-player media-player-promo">';

            ob_start();

              $last_album_args = array(
                'post_type'      => 'musicflow-albums',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
              );
              if ($id) {
                $last_album_args['p'] = (int)$id;
              }
              $latest_album = new WP_Query($last_album_args);
            ?>
            <?php while($latest_album->have_posts()): $latest_album->the_post(); ?>
                <?php global $post; ?>

                <?php if ($album_img = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-image', true )): ?>
                  <img src="<?php echo esc_url( $album_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                  <div class="img-hover-media-player font">
                    <a href="<?php the_permalink(); ?>">
                      <span class="skin-font-color3 font-size-120px icon">]</span>
                    </a>
                  </div>
                <?php endif ?>
                <h4 class="bold"><a href="<?php the_permalink(); ?>" class="skin-font-color5 skin-color-hover1"><?php the_title(); ?></a></h4>
                <span class="skin-font-color6 bold">
                  <?php
                        $artists_list = array();
                        if ($artists = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-authors', true)){
                          foreach ($artists as $artist) {
                              $artists_list[] = esc_html( $artist['name'] );
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
                </span>

                <?php if ($songs = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-songs', true )): ?>
                  <ul>
                    <?php $item = 1; ?>
                    <?php foreach ($songs as $song): ?>
                      <li class="skin-border-color4">
                        <a class="skin-font-color13 skin-color-hover1 fap-single-track"
                          href="<?php echo esc_url( $song['url'] ); ?>"
                          title="<?php echo isset($artists_list[0]) ? esc_attr($artists_list[0]) .' - ' : ''; ?><?php echo esc_attr($song['title']); ?>"
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

            <?php wp_reset_postdata();

            $output = ob_get_contents();
            ob_end_clean();

            print($output);
            echo '</div>';
    }

    //Update the widget

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['id'] = $new_instance['id'];

        return $instance;
    }


    function form( $instance ) {

        $defaults = array(
            'id' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( "id" ));  ?>"><?php _e( 'ID album', "musicflow_theme" ); ?>:</label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id( "id" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "id" ));  ?>" value="<?php echo esc_attr($instance['id']); ?>"  value="5" size="3"/>
                <br>
                <small><?php _e( 'If empty, will show last album.', "musicflow_theme" ); ?></small>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        print($output);
    }
}


/**
 * Widget Name: Media player
 */

add_action( 'widgets_init', 'musicflow_media_player' );

function musicflow_media_player() {
    register_widget( 'musicflow_media_player' );
}

class musicflow_media_player extends WP_Widget {

    function __construct() {

        $widget_options = array( 'description' => __( 'Small version album with player.', "musicflow_theme" ) );

        $control_options = array(  'id_base' => 'musicflow_media_player_id' );

        parent::__construct(
            'musicflow_media_player_id',   // WP ID should be unique
            'MusicFlow Media Player',        // name displayed in WP widgets area
            $widget_options, $control_options);
    }

     function widget( $args, $instance ) {

        extract( $args );
        extract ( $instance );

            //Our variables from the widget settings.

            echo '<div class="sidebar-content widget-sidebar-media-player">';
            $title = apply_filters( 'widget_title', $title );

            // Display the widget title
            echo '<h2 class="skin-font-color5">' . esc_html($title);
            echo ' <span class="bold">'.esc_html($title_bold).'</span></h2>';

            ob_start();

              $last_album_args = array(
                'post_type'      => 'musicflow-albums',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
              );
              if ($id) {
                $last_album_args['p'] = (int)$id;
              }
              $latest_album = new WP_Query($last_album_args);
            ?>
            <?php while($latest_album->have_posts()): $latest_album->the_post(); ?>
                <?php global $post; ?>

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
                    <?php endif ?>
                    <div class="img-hover-sidebar font">
                      <a href="<?php the_permalink(); ?>">
                        <span class="skin-font-color3 font-size-72px icon">]</span>
                    </div>
                  </div>
                </div>
                <?php if ($songs = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-songs', true )): ?>
                  <ul>
                    <?php $item = 1; ?>
                    <?php foreach ($songs as $song): ?>
                      <li class="skin-border-color4">
                        <a class="skin-font-color13 skin-color-hover1 fap-single-track"
                          href="<?php echo esc_url( $song['url'] ); ?>"
                          title="<?php echo isset($artists_list[0]) ? esc_attr($artists_list[0]) .' - ' : ''; ?><?php echo esc_attr($song['title']); ?>"
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

              <?php if ($album_buy = get_post_meta( $post->ID, 'musicflow-prefix-' . 'album-buy', true) != 'hide'): ?>
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

            <?php wp_reset_postdata();

            $output = ob_get_contents();
            ob_end_clean();

            print($output);
            echo '</div>';

    }

    //Update the widget

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = $new_instance['title'];
        $instance['title_bold'] = $new_instance['title_bold'];
        $instance['id'] = $new_instance['id'];

        return $instance;
    }


    function form( $instance ) {

        $defaults = array(
            'title' => '',
            'title_bold' => '',
            'id' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
            <label class="musicflow_widget_label"><?php echo __( "Title", "musicflow_theme" );  ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title" ));  ?>" name="<?php echo esc_attr( $this->get_field_name( "title" ));  ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label class="musicflow_widget_label"><?php echo __( "Title - Bold", "musicflow_theme" )  ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title_bold" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "title_bold" ));  ?>" value="<?php echo esc_attr($instance['title_bold']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( "id" ));  ?>"><?php _e( 'ID album', "musicflow_theme" ); ?>:</label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id( "id" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "id" ));  ?>" value="<?php echo esc_attr($instance['id']); ?>"  value="5" size="3"/>
                <br>
                <small><?php _e( 'If empty, will show last album.', "musicflow_theme" ); ?></small>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        print($output);
    }
}



/**
 * Widget Name: Popular Artists
 */

add_action( 'widgets_init', 'musicflow_popular_artists' );

function musicflow_popular_artists() {
    register_widget( 'musicflow_popular_artists' );
}

class musicflow_popular_artists extends WP_Widget {

    function __construct() {

        $widget_options = array( 'description' => __( 'The list of popular artists.', "musicflow_theme" ) );

        $control_options = array(  'id_base' => 'musicflow_popular_artists_id' );

        parent::__construct(
            'musicflow_popular_artists_id',   // WP ID should be unique
            'MusicFlow Popular Artists',        // name displayed in WP widgets area
            $widget_options, $control_options);
    }

     function widget( $args, $instance ) {

        extract( $args );
        extract ( $instance );

            //Our variables from the widget settings.

            echo '<div class="sidebar-content widget-sidebar-popular-artist">';
            $title = apply_filters( 'widget_title', $title );

            // Display the widget title
            echo '<h2 class="skin-font-color5">' . esc_html($title);
            echo ' <span class="bold">'.esc_html($title_bold).'</span></h2>';

            ob_start();

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
                    if ($number == '') {
                      $number = 2;
                    }
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
                                <?php endif ?>
                                <div class="img-hover-sidebar font">
                                    <a href="<?php echo esc_url(get_author_posts_url($user['post_author'])); ?>">
                                        <span class="skin-font-color3 font-size-72px icon">]</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p><?php _e( 'No found artists', "musicflow_theme" ); ?></p>

                <?php endif;

                wp_reset_postdata();

            $output = ob_get_contents();
            ob_end_clean();

            print($output);
            echo '</div>';

    }

    //Update the widget

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = $new_instance['title'];
        $instance['title_bold'] = $new_instance['title_bold'];
        $instance['number'] = esc_attr($new_instance['number']);

        return $instance;
    }


    function form( $instance ) {

        $defaults = array(
            'title' => '',
            'title_bold' => '',
            'number' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
            <label class="musicflow_widget_label"><?php echo __( "Title", "musicflow_theme" );  ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title" ));  ?>" name="<?php echo esc_attr( $this->get_field_name( "title" ));  ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label class="musicflow_widget_label"><?php echo __( "Title - Bold", "musicflow_theme" )  ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title_bold" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "title_bold" ));  ?>" value="<?php echo esc_attr($instance['title_bold']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label for="widget-recent-posts-3-number"><?php _e( 'Number of artists to show', "musicflow_theme" ); ?>:</label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id( "number" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "number" ));  ?>" value="<?php echo esc_attr($instance['number']); ?>"  value="5" size="3"/>
                <br>
                <small><?php _e( 'Default show two artists.', "musicflow_theme" ); ?></small>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        print($output);
    }
}

/**
 * Widget Name: Text
 */

add_action( 'widgets_init', 'musicflow_text_widget' );

function musicflow_text_widget() {
    register_widget( 'musicflow_text_widget' );
}

class musicflow_text_widget extends WP_Widget {

    function __construct() {

        $widget_options = array( 'description' => __( 'The text content widget.', "musicflow_theme" ) );

        $control_options = array(  'id_base' => 'musicflow_text_widget_id' );

        parent::__construct(
            'musicflow_text_widget_id',   // WP ID should be unique
            'MusicFlow Text Widget',        // name displayed in WP widgets area
            $widget_options, $control_options);
    }

    function widget( $args, $instance ) {

        extract( $args );
        extract ( $instance );

            //Our variables from the widget settings.

            echo '<div class="sidebar-content widget-sidebar-text-widget">';
                $title = apply_filters( 'widget_title', $title );

                // Display the widget title
                echo '<h2 class="skin-font-color5">' . esc_html($title);
                echo ' <span class="bold">'. esc_html($title_bold).'</span></h2>';

                echo '<p>' . esc_html($textarea) . '</p>';

            echo '</div>';

    }

    //Update the widget

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        //Strip tags from title and name to remove HTML
        $instance['title']      = strip_tags($new_instance['title']);
        $instance['title_bold'] = strip_tags($new_instance['title_bold']);
        $instance['textarea']    = esc_textarea($new_instance['textarea']);

        return $instance;
    }


    function form( $instance ) {

        $defaults = array(
            'title' => '',
            'title_bold' => '',
            'textarea' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
            <label class="musicflow_widget_label"><?php echo __( "Title", "musicflow_theme" );  ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title" ));  ?>" name="<?php echo esc_attr( $this->get_field_name( "title" ));  ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label class="musicflow_widget_label"><?php echo __( "Title - Bold", "musicflow_theme" )  ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title_bold" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "title_bold" ));  ?>" value="<?php echo esc_attr($instance['title_bold']); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( "textarea" ))  ?>"><?php _e( 'Content', "musicflow_theme" ); ?></label>
                <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id( 'textarea' ));  ?>" name="<?php echo esc_attr($this->get_field_name( 'textarea' ));  ?>"><?php echo esc_textarea($instance['textarea']); ?></textarea>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        print($output);
    }
}





/**
 * Plugin Name: Other Albums
 */

add_action( 'widgets_init', 'musicflow_other_albums' );

function musicflow_other_albums() {
    register_widget( 'musicflow_other_albums' );
}

class musicflow_other_albums extends WP_Widget {

    function __construct() {

        $widget_options = array( 'description' => __( 'The list of albums.', "musicflow_theme" ) );

        $control_options = array(  'id_base' => 'musicflow_other_albums_id' );

        parent::__construct(
            'musicflow_other_albums_id',   // WP ID should be unique
            'MusicFlow Albums',        // name displayed in WP widgets area
            $widget_options, $control_options);
    }

    function widget( $args, $instance ) {

        extract( $args );
        extract ( $instance );

            //Our variables from the widget settings.

            echo '<div class="sidebar-content widget-sidebar-media-player">';
            $title = apply_filters( 'widget_title', $title );

            echo '<h2 class="skin-font-color5">' . esc_html($title);
            echo ' <span class="bold">'.esc_html($title_bold).'</span></h2>';

            // Display the widget title
            $number = (int)$number;

            ob_start();

                $last_album_args = array(
                    'post_type'      => 'musicflow-albums',
                    'post_status'    => 'publish',
                    'posts_per_page' => $number, // last and 3 others require to the Other albums section
                  );
                  if ($include) {
                    $ids = explode(',', trim($include));
                    foreach ($ids as $id) {
                      $post_in[] = $id;
                    }
                    if ($post_in) {
                      $last_album_args['post__in'] = $post_in;
                    }
                  }

                  $latest_album = new WP_Query($last_album_args);
                ?>
                <?php while($latest_album->have_posts()): $latest_album->the_post(); ?>
                  <?php //if (++$no_first == 0): ?>
                    <?php //continue; // not last album ?>
                  <?php //endif ?>
                    <?php global $post; ?>
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
                              <span class="skin-font-color3 font-size-72px icon">]</span>
                            </a>
                          </div>
                        <?php endif ?>
                      </div>
                    </div>

                <?php endwhile;
                wp_reset_postdata();

            $output = ob_get_contents();
            ob_end_clean();

            print($output);
            echo '</div>';

    }

    //Update the widget

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = $new_instance['title'];
        $instance['title_bold'] = $new_instance['title_bold'];
        $instance['number'] = esc_attr($new_instance['number']);
        $instance['include'] = esc_attr($new_instance['include']);

        return $instance;
    }


    function form( $instance ) {

        $defaults = array(
            'title' => '',
            'title_bold' => '',
            'number' => '',
            'include' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
            <label class="musicflow_widget_label"><?php echo __( "Title", "musicflow_theme" );  ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title" ));  ?>" name="<?php echo esc_attr( $this->get_field_name( "title" ));  ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label class="musicflow_widget_label"><?php echo __( "Title - Bold", "musicflow_theme" )  ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title_bold" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "title_bold" ));  ?>" value="<?php echo esc_attr($instance['title_bold']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label for="widget-recent-posts-3-number"><?php _e( 'Number of albums to show', "musicflow_theme" ); ?>:</label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id( "number" ))  ?>" name="<?php echo esc_attr($this->get_field_name( "number" ));  ?>" value="<?php echo esc_attr($instance['number']); ?>"  value="5" size="3"/>
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label><?php _e( 'Include', "musicflow_theme" ); ?>:</label> <input type="text" value="<?php echo esc_attr($instance['include']); ?>" name="<?php echo esc_attr($this->get_field_name( "include" ));  ?>" id="<?php echo esc_attr($this->get_field_name( "include" ));  ?>" class="widefat">
                <br>
                <small><?php _e( 'Albmus IDs, separated by commas. Only show this albums. If empty, show latest.', "musicflow_theme" ); ?></small>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        print($output);
    }
}


/**
 * Plugin Name: Search
 */

add_action( 'widgets_init', 'musicflow_search_form' );

function musicflow_search_form() {
    register_widget( 'musicflow_search_form' );
}

class musicflow_search_form extends WP_Widget {

    function __construct() {

        $widget_options = array( 'description' => __( 'The search form.', "musicflow_theme" ) );

        $control_options = array(  'id_base' => 'musicflow_search_form_id' );

        parent::__construct(
            'musicflow_search_form_id',   // WP ID should be unique
            'MusicFlow Search Form',        // name displayed in WP widgets area
            $widget_options, $control_options);
    }

    function widget( $args, $instance ) {

        extract( $args );
        extract ( $instance );

            //Our variables from the widget settings.

            echo '<div class="sidebar-content widget-sidebar-search">';
            $title = apply_filters( 'widget_title', $title );

            echo '<h2 class="skin-font-color5">' . esc_html($title);
            echo ' <span class="bold">'. esc_html($title_bold).'</span></h2>';

            // Display the widget title
            if ($search) {
              $search = trim($search);
            }else{
              $search = __('Search here', "musicflow_theme");
            }
            ob_start();
            ?>

             <div class="skin-background-color7 search-box">
                <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="search" >
                  <input type="text" name="s" class="skin-background-color2 skin-font-color7 font-size-14px font" value="<?php echo esc_attr( $search ); ?>" onblur="if(this.value == '') { this.value='<?php echo esc_attr( $search ); ?>'}" onfocus="if (this.value == '<?php echo esc_attr( $search ); ?>') {this.value=''}" >
                  <input type="submit" class="icon font-size-72px skin-font-color2 skin-color-hover4" value="r">
                </form>
              </div>

            <?php
            $output = ob_get_contents();
            ob_end_clean();

            print($output);
            echo '</div>';

    }

    //Update the widget

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = $new_instance['title'];
        $instance['title_bold'] = $new_instance['title_bold'];
        $instance['search'] = esc_attr($new_instance['search']);

        return $instance;
    }


    function form( $instance ) {

        $defaults = array(
            'title' => '',
            'title_bold' => '',
            'search' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
            <label class="musicflow_widget_label"><?php echo __( "Title", "musicflow_theme" );  ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title" ));  ?>" name="<?php echo esc_attr( $this->get_field_name( "title" ));  ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label class="musicflow_widget_label"><?php echo __( "Title - Bold", "musicflow_theme" )  ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( "title_bold" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "title_bold" ));  ?>" value="<?php echo esc_attr($instance['title_bold']); ?>" />
            </p>
        </div>
        <div class="widget-content">
            <p>
                <label><?php _e( 'Placeholder', "musicflow_theme" ); ?>:</label> <input type="text" value="<?php echo esc_attr($instance['search']); ?>" name="<?php echo esc_attr($this->get_field_name( "search" ));  ?>" id="<?php echo esc_attr($this->get_field_name( "search" ));  ?>" class="widefat">
                <br>
                <small><?php _e( 'Text to placeholder. If empty, default "Seaarch here".', "musicflow_theme" ); ?></small>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        print($output);
    }
}