<?php
/**
* Custom Post Types
* @author Paul Rudnicki - ThemesFactory <themesfactoryinfo@gmail.com>
*/
final class MusicFlowAdditions
{

  public static function Instance()
  {
      static $inst = null;
      if ($inst === null) {
          $inst = new MusicFlowAdditions();
      }
      return $inst;
  }

  private function __construct(){

    add_filter( 'template_include', array( $this, 'searchAlbums'));
    add_action( 'redux/construct', array( $this, 'redux_disable_dev_mode_plugin' ));
    add_action( 'after_setup_theme', array( $this, 'registerWidgets') );
    add_action( 'init', array( $this, 'registerMenus' ));
    add_action( 'pre_get_posts', array( $this, 'wpse107459_add_cpt_author' ));


    if(!current_user_can('level_10')) {
      add_action('admin_menu', array( $this, 'remove_contact_menu'));
    }

    add_action( 'after_setup_theme', array( $this, 'customSizeImages' ));
    add_action( 'login_enqueue_scripts', array( $this, 'loginFormStyle'));

    add_filter( 'lostpassword_url',  array($this, 'resetPassUrl'), 11, 0 );

    add_action( 'admin_menu', array( $this, 'remove_menus' ), 999);

    add_filter( 'login_message', array( $this, 'demo_login_info' ));

  }

  public function demo_login_info() {
    if (!isset($_GET['action'])) {
      return '<p class="message">'. __("Demo: Username: djflow, Password: djflow", "musicflow_theme") . '</p>';
    } elseif (isset($_GET['action']) && ($_GET['action'] == 'lostpassword')) {
      return '<p class="message">' . __("Please enter your username or email address. You will receive a link to create a new password via email.", "musicflow_theme") . '</p>';
    } elseif(isset($_GET['action']) && ($_GET['action'] == 'register')) {
      return '<p class="message register">'.__("Register For This Site Is Disabled.", "musicflow_theme") . '</p>';
    } else {
      return '<p class="message">'.__("Demo: Username: djflow, Password: djflow", "musicflow_theme") . '</p>';
    }
  }

  public function remove_menus(){
    global $submenu;

    if (isset($submenu['themes.php'])) {
      foreach ($submenu['themes.php'] as $key => $value) {
        if (strpos($value[2], 'redux') !== false) {
          unset($submenu['themes.php'][$key]); // Removes redux subpges
        }
      }
    }
  }

  public function resetPassUrl() {
    $siteURL = get_option('siteurl');
    return "{$siteURL}/wp-login.php?action=lostpassword";
  }

  public function customSizeImages() {
      add_image_size( 'mf-single-post-featured', 9999, 330, false );
      add_image_size( 'mf-categories-featured', 9999, 680, false );
      // add_image_size( 'mf-albums-featured', 9999, 290, false );
      // add_image_size( 'mf-author-avatar', 270, 270, true );
  }

  public function remove_contact_menu () {
    global $menu;

    $number_contact = array();
    foreach ($menu as $key => $value) {
      if (isset($value[1]) && $value[1] == 'wpcf7_read_contact_forms') {
        $number_contact[] = $key;
      }
      if (isset($value[5]) && $value[5] == 'menu-posts-vc_grid_item') {
        $number_contact[] = $key;
      }
    }
    if ($number_contact) {
      foreach ($number_contact as $number) {
        unset($menu[$number]);
      }
    }
  }

  public function registerWidgets() {
    add_theme_support( 'widgets' );
  }

  public static function paginateComments($args = array()) {
      global $wp_rewrite;

      if ( !is_singular() || !get_option('page_comments') )
        return;

      $page = get_query_var('cpage');
      if ( !$page )
        $page = 1;
      $max_page = get_comment_pages_count();
      $defaults = array(
       'base'         => add_query_arg( 'cpage', '%#%' ),
       'format'       => '',
       'total'        => $max_page,
       'current'      => $page,
       'echo'         => true,
       'add_fragment' => '#comments',
       'type'         => 'list',
       'prev_text'    => __('« Older', "musicflow_theme"),
       'next_text'    => __('Later »', "musicflow_theme"),
      );
      if ( $wp_rewrite->using_permalinks() )
        $defaults['base'] = user_trailingslashit(trailingslashit(get_permalink()) . 'comment-page-%#%', 'commentpaged');

      $args = wp_parse_args( $args, $defaults );

      if ( $args['echo'] )
        echo MusicflowHelpers::pagination( $args );
      else
        return MusicflowHelpers::pagination( $args );
    }

  public static function showComments( $comment, $args, $depth ) {
      $GLOBALS['comment'] = $comment; ?>

      <li>
        <?php if (get_comment_author() != get_the_author()): ?>

        <span class="comment-icon icon skin-background-color5 font-size-48px skin-font-color3">9</span>
          <div class="comment-content">
            <div class="name bold font-size-18px skin-font-color5">@<?php comment_author(); ?></div>

        <?php else: ?>

        <span class="comment-icon icon skin-background-color1 font-size-48px skin-font-color3">9</span>
          <div class="comment-content">
            <div class="name bold font-size-18px skin-font-color1">@<?php comment_author(); ?> <span class="font-size-12px font"> - <?php _e( 'author', "musicflow_theme" ); ?></span></div>

        <?php endif ?>

            <span class="date skin-font-color6 bold"><?php echo get_comment_date('d F') . ' ' .  get_comment_time('g:i A') ?></span>
            <?php comment_text(); ?>
              <?php echo str_replace("<a class='comment-reply-link","<a class='comment-reply-link button-small skin-background-color15 skin-font-color3 skin-background-hover3 font-size-10px", get_comment_reply_link(array('reply_text' => __('Reply', "musicflow_theme" ), 'depth' => $depth, 'max_depth' => $args['max_depth'])));?>
            <?php if ($link_edit = get_edit_comment_link()): ?>
              <a href="<?php echo esc_url($link_edit); ?>" class="comment-edit-link button-small skin-background-color15 skin-font-color3 skin-background-hover3 font-size-10px"><?php _e( 'edit', "musicflow_theme" ); ?></a>
            <?php endif ?>
          </div>
        </li>

  <?php
  }

  public function wpse107459_add_cpt_author( $query ) {
    if ( !is_admin() && $query->is_author() && $query->is_main_query() ) {
        $query->set( 'post_type', array('post', 'musicflow-events', 'musicflow-galleries', 'musicflow-albums', 'musicflow-videos') );
    }
  }

  public function registerMenus() {
    register_nav_menus(
      array(
        'musicflow-main-menu'   => __( 'Main Menu', "musicflow_theme" ),
        'musicflow-footer-menu' => __( 'Footer Menu', "musicflow_theme" )
      )
    );
  }

  public function searchAlbums($template){

    global $wp_query;
    $post_type = get_query_var('post_type');
    if( isset($_GET['s']) && $post_type == 'musicflow-albums' ) {
      return locate_template('search-albums.php'); //  redirect to search-albums.php
    }
    return $template;
  }

  public function redux_disable_dev_mode_plugin( $redux ) {
    if ( $redux->args['opt_name'] != 'redux_demo' ) {
      $redux->args['dev_mode'] = false;
    }
  }

  public function loginFormStyle() {

    global $musicflow_admin;

  ?>
  <style type="text/css">
    <?php if (isset($musicflow_admin['general-settings-login-background']['url'])) : ?>
      body {
        background: url("<?php echo esc_url($musicflow_admin['general-settings-login-background']['url']); ?>") no-repeat;
      }
    <?php endif; ?>
    #login {
      width:400px;
    }
    .login form {
      background-color: rgba(0, 0, 0, 0.6);
      box-shadow:none;
    }
    .login form .input, .wp-core-ui .button-primary {
      box-sizing: border-box;
      -ms-box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      webkit-appearance: none;
      -webkit-border-radius: 0;
      border:none;
      outline: none;
      box-shadow:none;
    }
    .login form .input {
      background-image:none !important;
      border:none;
      background-color:#fff;
      outline: none;
      color:#212121;
      padding:12px;
      font-size:12px;
      box-shadow:none;
    }
    .wp-core-ui .button-primary {
      padding: 21px 13px !important;
      line-height: 2px !important;
      margin-top: 11px;
      display: table;
      border: none;
      outline: none;
      width: 100%;
      font: 14px;
      color:#fff;
      text-align:center;
    }
    .login h1 {
     display:none;
    }
    .message {
      background:none !important;
      color: #fff;
      border:none !important;
      text-align:center;
      font-weight:700;
    }
    .login label {
     color: #d6d6d6;
     font-size: 14px;
     font-weight: 700;
     line-height: 28px;
    }
    .login #nav a, .login #backtoblog a {
     color: #fff;
    }
    .forgetmenot {
      margin:15px 0;
    }
    #reg_passmail {
         color: #d6d6d6;
    }
   </style>
  <?php
  }


}
?>