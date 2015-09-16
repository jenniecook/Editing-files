<?php
/**
* MusicFlow Helpers
* @author Paul Rudnicki - ThemesFactory <themesfactoryinfo@gmail.com>
*/
final class MusicFlowHelpers
{

  public static function Instance()
  {
      static $inst = null;
      if ($inst === null) {
          $inst = new MusicFlowHelpers();
      }
      return $inst;
  }

  private function __construct(){
  }

  public static function getCurrentPageUrl(){

      $page_url = 'http';

      if(isset($_SERVER['HTTPS'])){
          if($_SERVER['HTTPS'] == 'on'){
              $page_url .= 's';
          }
      }

      $page_url .='://';

      if($_SERVER['SERVER_PORT'] != 80){
          $page_url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
      } else {
          $page_url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
      }

      return $page_url;
  }

    public static function pagination_main_content($args='')
  {
      global $wp_query, $wp_rewrite;

      // Setting up default values based on the current URL.
      $pagenum_link = html_entity_decode( get_pagenum_link() );
      $url_parts    = explode( '?', $pagenum_link );

      // Get max pages and current page out of the current query, if available.
      $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
      $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

      // Append the format placeholder to the base URL.
      $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

      // URL base depends on permalink settings.
      $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
      $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

      $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format' => $format, // ?page=%#% : %#% is replaced by the page number
        'total' => $total,
        'current' => $current,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('&laquo; Previous', "musicflow_theme"),
        'next_text' => __('Next &raquo;', "musicflow_theme"),
        'end_size' => 1,
        'mid_size' => 2,
        'type' => 'plain',
        'add_args' => array(), // array of query args to add
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
      );

      $args = wp_parse_args( $args, $defaults );

      if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
      }

      // Merge additional query vars found in the original URL into 'add_args' array.
      if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format_query = parse_url( str_replace( '%_%', $args['format'], $args['base'] ), PHP_URL_QUERY );
        wp_parse_str( $format_query, $format_arg );

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        wp_parse_str( remove_query_arg( array_keys( $format_arg ), $url_parts[1] ), $query_args );
        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $query_args ) );
      }

      // Who knows what else people pass in $args
      $total = (int) $args['total'];
      if ( $total < 2 ) {
        return;
      }
      $current  = (int) $args['current'];
      $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
      if ( $end_size < 1 ) {
        $end_size = 1;
      }
      $mid_size = (int) $args['mid_size'];
      if ( $mid_size < 0 ) {
        $mid_size = 2;
      }
      $add_args = $args['add_args'];
      $r = '';
      $page_links = array();
      $dots = false;

      if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args )
          $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /**
         * Filter the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a class="skin-font-color13 skin-color-hover1" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
      endif;
      for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
          $page_links[] = "<span class='border skin-border-color4 skin-font-color3 skin-background-color1 active'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
          $dots = true;
        else :
          if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
            $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
            $link = str_replace( '%#%', $n, $link );
            if ( $add_args )
              $link = add_query_arg( $add_args, $link );
            $link .= $args['add_fragment'];

            /** This filter is documented in wp-includes/general-template.php */
            $page_links[] = "<a class='border skin-border-color4 skin-font-color13 skin-color-hover3 skin-background-hover1' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
            $dots = true;
          elseif ( $dots && ! $args['show_all'] ) :
            $page_links[] = '<span class="border skin-border-color4 skin-font-color13 skin-color-hover3 skin-background-hover1 more">' . __( '&hellip;', "musicflow_theme" ) . '</span>';
            $dots = false;
          endif;
        endif;
      endfor;
      if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args )
          $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a class="skin-font-color13 skin-color-hover1" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
      endif;
      switch ( $args['type'] ) {
        case 'array' :
          return $page_links;

        case 'list' :
          $r .= "<div class='main-content'><ul class='pagination'>\n\t<li>";
          $r .= join("</li>\n\t<li>", $page_links);
          $r .= "</li>\n</ul>\n</div>\n";
          break;

        default :
          $r = join("\n", $page_links);
          break;
      }
      return $r;
  }

  public static function pagination($args='')
  {
      global $wp_query, $wp_rewrite;

      // Setting up default values based on the current URL.
      $pagenum_link = html_entity_decode( get_pagenum_link() );
      $url_parts    = explode( '?', $pagenum_link );

      // Get max pages and current page out of the current query, if available.
      $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
      $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

      // Append the format placeholder to the base URL.
      $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

      // URL base depends on permalink settings.
      $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
      $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

      $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format' => $format, // ?page=%#% : %#% is replaced by the page number
        'total' => $total,
        'current' => $current,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('&laquo; Previous', "musicflow_theme"),
        'next_text' => __('Next &raquo;', "musicflow_theme"),
        'end_size' => 1,
        'mid_size' => 2,
        'type' => 'plain',
        'add_args' => array(), // array of query args to add
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
      );

      $args = wp_parse_args( $args, $defaults );

      if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
      }

      // Merge additional query vars found in the original URL into 'add_args' array.
      if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format_query = parse_url( str_replace( '%_%', $args['format'], $args['base'] ), PHP_URL_QUERY );
        wp_parse_str( $format_query, $format_arg );

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        wp_parse_str( remove_query_arg( array_keys( $format_arg ), $url_parts[1] ), $query_args );
        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $query_args ) );
      }

      // Who knows what else people pass in $args
      $total = (int) $args['total'];
      if ( $total < 2 ) {
        return;
      }
      $current  = (int) $args['current'];
      $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
      if ( $end_size < 1 ) {
        $end_size = 1;
      }
      $mid_size = (int) $args['mid_size'];
      if ( $mid_size < 0 ) {
        $mid_size = 2;
      }
      $add_args = $args['add_args'];
      $r = '';
      $page_links = array();
      $dots = false;

      if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args )
          $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /**
         * Filter the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a class="skin-font-color13 skin-color-hover1" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
      endif;
      for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
          $page_links[] = "<span class='border skin-border-color4 skin-font-color3 skin-background-color1 active'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
          $dots = true;
        else :
          if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
            $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
            $link = str_replace( '%#%', $n, $link );
            if ( $add_args )
              $link = add_query_arg( $add_args, $link );
            $link .= $args['add_fragment'];

            /** This filter is documented in wp-includes/general-template.php */
            $page_links[] = "<a class='border skin-border-color4 skin-font-color13 skin-color-hover3 skin-background-hover1' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
            $dots = true;
          elseif ( $dots && ! $args['show_all'] ) :
            $page_links[] = '<span class="border skin-border-color4 skin-font-color13 skin-color-hover3 skin-background-hover1 more">' . __( '&hellip;', "musicflow_theme" ) . '</span>';
            $dots = false;
          endif;
        endif;
      endfor;
      if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args )
          $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a class="skin-font-color13 skin-color-hover1" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
      endif;
      switch ( $args['type'] ) {
        case 'array' :
          return $page_links;

        case 'list' :
          $r .= "<ul class='pagination'>\n\t<li>";
          $r .= join("</li>\n\t<li>", $page_links);
          $r .= "</li>\n</ul>\n";
          break;

        default :
          $r = join("\n", $page_links);
          break;
      }
      return $r;
  }

  public static function get_terms($taxonomy='')
  {
    global $post;

    $terms = get_the_terms( $post->ID, $taxonomy );

    if ( $terms && ! is_wp_error( $terms ) ) {

      $return = array();

      foreach ( $terms as $term ) {
        $return[] = $term->name;
      }

      return join( ", ", $return );
    }

    return false;

  }

  public static function get_term_header_image_bg($term_id, $taxonomy, $bg_default_image)
  {
    $bg_image = get_option( $taxonomy."_header_img_".$term_id);
    if ($bg_image != '') {
      return '<style>.header-background-'.$term_id.' { background: url('. esc_url($bg_image).') no-repeat; }</style>';
    } else {
      return '<style>.header-background-'.$term_id.' { background: url('. esc_url($bg_default_image).') no-repeat; }</style>';
    }
    // return false;
  }

  public static function get_author_header_image_bg($user_id, $bg_default_image)
  {
    if ($bg_image = get_user_meta( $user_id, 'user_bg_image', true )) {
      return '<style>.header-background-'.$user_id.' { background: url('. esc_url($bg_image).') no-repeat; }</style>';
    } else {
      return '<style>.header-background-'.$user_id.' { background: url('. esc_url($bg_default_image).') no-repeat; }</style>';
    }
  }

  public static function get_post_header_image_bg($post_id, $bg_default_image)
  {
    $bg_image = get_post_meta( $post_id, 'musicflow-prefix-' . 'header-bg-image', true );
    if ( $bg_image != '') {
      return '<style>.header-background-'.$post_id.' { background: url('. esc_url($bg_image).') no-repeat; }</style>';
    } else {
      return '<style>.header-background-'.$post_id.' { background: url('.esc_url($bg_default_image).') no-repeat; }</style>';
    }
  }


  public static function cutText($text, $maxLength = 220){

      $maxLength++;

      $return = '';
      if (mb_strlen($text) > $maxLength) {
          $subex = mb_substr($text, 0, $maxLength - 5);
          $exwords = explode(' ', $subex);
          $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
          if ($excut < 0) {
              $return = mb_substr($subex, 0, $excut);
          } else {
              $return = $subex;
          }
          $return .= '...';
      } else {
          $return = $text;
      }
      return $return;
    }

  public static function getUrlFeatured($post_id)
  {
    if (has_post_thumbnail( $post_id )) {
      $full_image_url =  wp_get_attachment_image_src( get_post_thumbnail_id($post_id ), 'full' );
      return esc_url($full_image_url[0]);
    }
    return false;
  }

  public static function get_thumbnail($post_id, $size = 'full')
  {
    if ( has_post_thumbnail($post_id) ) {
      $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_id ), $size );
      return '<img src="'. esc_url($full_image_url[0]).'" alt="'.the_title_attribute( 'echo=0&post'.$post_id ).'">';
    }
    return false;
  }

  public static function yotube_embed($video =  '')
  {
    $html = '';
    if (isset($video[0])) {
      if (strpos($video[0],'youtube.com') !== false) {
        // Youtube
        $video = explode("/",$video[0]);
        $video = str_replace('watch?v=', '', $video);
        $html .= '<iframe class="video-open video-iframe" src="http://www.youtube.com/embed/'. esc_html(end($video)) .'" ></iframe>';
      }
    }
    return $html;
  }

  public static function is_big_header($post_id = ''){

    // is_post()
    if (is_single() && get_post_meta( $post_id, 'musicflow-prefix-' . 'type-post', true ) == 'big_header'){
      return true;
    }
    return false;
  }



  public static function get_post_tags($post_id, $header = 'small'){

    global $post;
    $return = '';
    $tax = true;
    $taxonomy = '';
    $name = __( 'Tags', "musicflow_theme" );

    switch ($post->post_type) {
      case 'post':
        $tax = false;
        break;
      case 'musicflow-events':
        $taxonomy = 'musicflow-events-tags';
        break;
      case 'musicflow-galleries':
        $taxonomy = 'musicflow-galleries-tags';
        break;
      case 'musicflow-albums':
        $taxonomy = 'musicflow-albums-tags';
        break;
      case 'musicflow-videos':
        $taxonomy = 'musicflow-videos-tags';
        break;
      case 'product' :
        $name = __( 'Categories', "musicflow_theme" );
        $taxonomy = 'product_cat';
        break;
    }


    if ($tax) {

      // Taxonomy

      $post_tags = get_the_terms( $post_id, $taxonomy );

      if ( $post_tags && ! is_wp_error( $post_tags ) ) {
        if ($post_tags) {
          $count = 0;
          if ($header == 'big') {
            $return .= '<span class="font-size-24px skin-font-color1 bold">/ </span><span class="font-size-24px skin-font-color1 bold">'. $name .': </span>';
            foreach ($post_tags as $tag)
            {
                if ($count++ > 0) {
                  $return .= '<span class="font-size-24px skin-font-color1 bold">, </span>';
                }
                $return .= '<a href="'.get_term_link( $tag->term_id,  $taxonomy ).'" class="font-size-24px skin-font-color1 skin-color-hover3 bold">'.$tag->name.'</a>';
            }
          }
          else{
            $return .= '<span class="skin-font-color6 bold">/ </span><span class="skin-font-color6 bold">'. $name .': </span>';
            foreach ($post_tags as $tag)
            {
                if ($count++ > 0) {
                  $return .= '<span class="skin-font-color6 bold">, </span>';
                }
                $return .= '<a href="'.get_term_link( $tag->term_id,  $taxonomy ).'" class="skin-font-color6 skin-color-hover1 bold">'.$tag->name.'</a>';
            }
          }
        }
      }
    } else{

      // Post Tags

      $post_tags = get_the_tags( $post_id );

      if ($post_tags) {
        $count = 0;
        if ($header == 'big') {
          $return .= '<span class="font-size-24px skin-font-color1 bold">/ </span><span class="font-size-24px skin-font-color1 bold">'. $name .': </span>';
          foreach ($post_tags as $tag)
          {
              if ($count++ > 0) {
                $return .= '<span class="font-size-24px skin-font-color1 bold">, </span>';
              }
              $return .= '<a href="'.get_tag_link( $tag->term_id ).'" class="font-size-24px skin-font-color1 skin-color-hover3 bold">'.$tag->name.'</a>';
          }
        }
        else{
          $return .= '<span class="skin-font-color6 bold">/ </span><span class="skin-font-color6 bold">'. $name .': </span>';
          foreach ($post_tags as $tag)
          {
              if ($count++ > 0) {
                $return .= '<span class="skin-font-color6 bold">, </span>';
              }
              $return .= '<a href="'.get_tag_link( $tag->term_id ).'" class="skin-font-color6 skin-color-hover1 bold">'.$tag->name.'</a>';
          }
        }
      }
    }


    return $return;
  }

  public static function event_tickets($post_id = '')
  {
    if (!$post_id)
      return false;

    $return = '';
    $shop = get_post_meta( $post_id, 'musicflow-prefix-' . 'event-shop', true );
    if ($shop){
      $return .= '<a href="'. esc_url( $shop ) .'" ';
    }else{
      $return .= '<span ';
    }
    if (get_post_meta( $post_id, 'musicflow-prefix-' . 'event-ticket', true ) == 'free') {
      $return .= 'class="button-normal skin-background-color9 skin-font-color3 skin-background-hover3">';
      $return .= __('Free ticket', "musicflow_theme");
    } else {
      $return .= 'class="button-normal skin-background-color1 skin-font-color3 skin-background-hover3">';
      $return .= __('Buy tickets', "musicflow_theme");
    }
    if ($shop){
      $return .= '</a>';
    }else{
      $return .= '</span>';
    }
    return $return;
  }

  public static function count_posts_by_term($post_type = '', $taxonomy = '', $term_slug = '')
  {
    $args = array(
        'post_type' => $post_type,
        'post_staus'=> 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $term_slug,
          ),
        ),
    );
    $results = new WP_Query($args);
    return $results->found_posts;
  }

  public static function count_custom_posts_by_author($author_id)
  {
    $post_types = array('post', 'musicflow-events', 'musicflow-galleries', 'musicflow-albums', 'musicflow-videos');
    $args = array(
        'post_type' => $post_types,
        'author'    => $author_id,
        'post_staus'=> 'publish',
        'posts_per_page' => -1
    );

    $results = new WP_Query($args);

    $posts = array('post' => 0, 'musicflow-events' => 0, 'musicflow-galleries' => 0, 'musicflow-albums' => 0, 'musicflow-videos' => 0);
    foreach($results->posts as $post){
      $temp = $posts[$post->post_type];
      $temp++;
      $posts[$post->post_type] = $temp;
    }

    $html = '';
    $count_post = count($posts);
    $i = 0;
    foreach($posts as $type => $value){
      $html .= '<span class="font-size-24px skin-font-color1 bold">';
        switch ($type) {
          case 'post':
            $html .=  sprintf(_nx( '%s post', '%s posts', $value, "theme",  "musicflow_theme" ), $value);
            break;
          case 'musicflow-events':
            $html .=  sprintf(_nx( '%s event', '%s events', $value, "theme",  "musicflow_theme" ), $value);
            break;
          case 'musicflow-galleries':
            $html .=  sprintf(_nx( '%s photo', '%s photos', $value, "theme",  "musicflow_theme" ), $value);
            break;
          case 'musicflow-albums':
            $html .=  sprintf(_nx( '%s album', '%s albums', $value,  "theme", "musicflow_theme" ), $value);
            break;
          case 'musicflow-videos':
            $html .=  sprintf(_nx( '%s video', '%s videos', $value, "theme",  "musicflow_theme" ), $value);
            break;
        }
      if ($count_post == ++$i ) {
        $html .= '</span>';
      } else {
        $html .= '</span><span class="font-size-24px skin-font-color1 bold"> / </span>';
      }
    }
    return $html;

  }

   public static function getBreadcrumb() {

    // Settings
    $separator  = '&#47;';
    // $separator  = '&gt;';
    $id         = 'breadcrumbs';
    $class      = 'breadcrumbs';
    $home_title = __('Home', "musicflow_theme");

    // Get the query & post information
    global $post,$wp_query;
    $category = get_the_category();

    // Build the breadcrums
    $html = '';

    // Do not display on the homepage
    if ( !is_front_page() ) {
        // Home page
        $html .= '<a class="skin-font-color3" href="' . esc_url(get_home_url()) . '" title="' . $home_title . '">' . $home_title . '</a>';
        $html .= ' ' . $separator . ' ';

        if ( is_single() ) {

          if ( !is_singular( array( 'post', 'page' ) ) ) {


            switch (get_query_var( 'post_type' )) {
                case 'musicflow-events':
                  $taxonomy =  'musicflow-events-places';
                  break;
                case 'musicflow-galleries':
                  $taxonomy =  'musicflow-galleries-category';
                  break;
                case 'musicflow-albums':
                  $taxonomy =  'musicflow-albums-genres';
                  break;
                case 'musicflow-videos':
                  $taxonomy =  'musicflow-videos-category';
                  break;
                case 'product':
                  $taxonomy = 'product_cat';
                  break;
                default:
                  $taxonomy = '';
            }

            $terms = get_the_terms( $post->ID, $taxonomy );

            if ( $terms && ! is_wp_error( $terms ) ) {

              foreach ( $terms as $term ) {
                $html .= '<a class="skin-font-color3" href="' . get_term_link($term) . '" title="' . $term->name . '">' . $term->name . '</a>';
                $html .= '<span> ' . $separator . ' </span>';
              }
            }

            $html .= '<span class="skin-font-color3">' . get_the_title() . '</span>';

          } else {

            // Single post (Only display the first category)
            $html .= '<a class="skin-font-color3" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a>';
            $html .= '<span> ' . $separator . ' </span>';
            $html .= '<span class="skin-font-color3">' . get_the_title() . '</span>';
          }

        } else if ( is_category() ) {

            // Category page
            $html .= '<span class="skin-font-color3">' . $category[0]->cat_name . '</span>';

        } elseif( is_tax() ){

            $html .= '<span class="skin-font-color3">' . $wp_query->queried_object->name . '</span>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<a class="skin-font-color3" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a>';
                    $parents .= '<span> ' . $separator . ' </span>';
                }

                // Display parent pages
                $html .= $parents;

                // Current page
                $html .= '<span class="skin-font-color3" title="' . get_the_title() . '"> ' . get_the_title() . '</span>';

            } else {

                // Just display current page if not parents
                $html .= '<span class="skin-font-color3"> ' . get_the_title() . '</span>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args ='include=' . $term_id;
            $terms = get_terms( $taxonomy, $args );

            // Display the tag name
            $html .= '<span class="skin-font-color3">' . $terms[0]->name . '</span>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            $html .= '<a class="skin-font-color3" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a>';
            $html .= '<span> ' . $separator . ' </span>';

            // Month link
            $html .= '<a class="skin-font-color3" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . '</a>';
            $html .= '<span> ' . $separator . ' </span>';

            // Day display
            $html .= '<span class="skin-font-color3"> ' . get_the_time('jS') . ' ' . get_the_time('M') . '</span>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            $html .= '<a class="skin-font-color3" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a>';
            $html .= '<span> ' . $separator . ' </span>';

            // Month display
            $html .= '<span class="skin-font-color3" title="' . get_the_time('M') . '">' . get_the_time('M') . '</span>';

        } else if ( is_year() ) {

            // Display year archive
            $html .= '<span class="skin-font-color3" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</span>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            $html .= '<span class="skin-font-color3">' . $userdata->display_name . '</span>';

        } elseif ( get_query_var('paged') ) {
            // Paginated archives
            $html .= '<span class="skin-font-color3" title="' . get_search_query() . '">'.__( 'Search results for: ', "musicflow_theme" ).'' . get_search_query() . '</span>';
            // $html .= '<span class="skin-font-color3" title="Page ' . get_query_var('Search results for: ') . '">'.__('Page') . ' ' . get_query_var('Search results for: ') . '</span>';

        } elseif ( is_search() ) {
            // Search results page
            $html .= '<span class="skin-font-color3" title="'.__( 'Search results for: ', "musicflow_theme" ).'' . get_search_query() . '">'.__( 'Search results for: ', "musicflow_theme" ).'' . get_search_query() . '</span>';

        } elseif ( is_404() ) {

            // 404 page
            $html .= '<span>' . 'Error 404' . '</span>';
        }

    }

    return $html;

  }

}
?>