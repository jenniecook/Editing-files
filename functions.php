<?php
if (!defined('MUSICFLOW_DIR')) {
  define('MUSICFLOW_DIR', get_template_directory() . DIRECTORY_SEPARATOR);
}
if (!defined('MUSICFLOW_URL')) {
    define('MUSICFLOW_URL', get_template_directory_uri());
}
if(!defined('MUSICFLOW_VERSION')) {
    define('MUSICFLOW_VERSION', '1.1');
}

load_template( get_template_directory() . '/includes/musicflow-init.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 856; /* pixels */
}

if ( ! function_exists( 'musicflow_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function musicflow_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Sk8er, use a find and replace
     * to change 'sk8er' to the name of your theme in all the template files
     */
    load_theme_textdomain( "musicflow_theme", get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) );

    add_theme_support( 'post-thumbnails',
      array(
        'post', 'page',
        'musicflow-events', 'musicflow-galleries', 'musicflow-albums', 'musicflow-videos', 'musicflow-sliders'
      )
    );
    add_theme_support( 'custom-header' );

    add_theme_support('woocommerce');

    add_editor_style( 'musicflow-editor-style.css' );

    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
  }
endif;
add_action( 'after_setup_theme', 'musicflow_setup' );

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

?>