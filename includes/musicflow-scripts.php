<?php
/**
* MusicFlow Scripts
* @author Paul Rudnicki - ThemesFactory <themesfactoryinfo@gmail.com>
*/
class MusicFlowScripts
{
    function __construct(){
        add_action( 'wp_enqueue_scripts', array( &$this, 'registerStylesheet' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'registerJavaScript' ) );
        add_action( 'admin_enqueue_scripts', array( &$this, 'registerAdminAllScripts' ) );
    }

    /**
     * Register Admin Scripts
     */
    public function registerAdminAllScripts() {
        wp_enqueue_style(
            'musicflow-prefix-admin-styles',
            MUSICFLOW_URL  . '/includes/css/admin-styles.css',
            false,
            '1.0.0'
        );

        wp_enqueue_script(
            'musicflow-prefix-admin-script',
            MUSICFLOW_URL  . '/includes/js/admin.js',
            'jquery'
        );
    }

    /**
     * Register and load common stylesheet
     */
    public function registerStylesheet()
    {

        wp_enqueue_style( 'musicflow-prefix-camera', MUSICFLOW_URL . '/css/camera.css' );
        wp_enqueue_style( 'musicflow-prefix-pretty_photo', MUSICFLOW_URL . '/css/prettyPhoto.css' );
        wp_enqueue_style( 'musicflow-prefix-full_width_auto_player', MUSICFLOW_URL . '/css/jquery.fullwidthAudioPlayer.css' );
        wp_enqueue_style( 'musicflow-prefix-full_width_auto_player_responsive', MUSICFLOW_URL . '/css/jquery.fullwidthAudioPlayer-responsive.css' );
        wp_enqueue_style( 'musicflow-prefix-style', MUSICFLOW_URL . '/css/style.css' );
        wp_enqueue_style( 'musicflow-prefix-wp_core', MUSICFLOW_URL . '/css/wp_core.css' );
        wp_enqueue_style( 'musicflow-prefix-scheme_css', MUSICFLOW_URL . '/css/skin/scheme1.css' );

    }

    /**
     * Register and load common javascript
     */
    public function registerJavaScript() {

        wp_enqueue_script( 'musicflow-prefix-easing', MUSICFLOW_URL . '/js/jquery.easing.1.3.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-mobile_customized', MUSICFLOW_URL . '/js/jquery.mobile.customized.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-wait', MUSICFLOW_URL . '/js/wait.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-parallax', MUSICFLOW_URL . '/js/jquery.parallax.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-retina', MUSICFLOW_URL . '/js/retina.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-scrollTo', MUSICFLOW_URL . '/js/jquery.scrollTo.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-prettyPhoto', MUSICFLOW_URL . '/js/jquery.prettyPhoto.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-modernizer', MUSICFLOW_URL . '/js/modernizer.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-camera', MUSICFLOW_URL . '/js/camera.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-jflickrfeed', MUSICFLOW_URL . '/js/jflickrfeed.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-jquery-ui', MUSICFLOW_URL . '/js/jquery-ui.js', array('jquery'), '', true );

        // Player
        wp_enqueue_script( 'musicflow-prefix-soundmanager2', MUSICFLOW_URL . '/js/player/soundmanager2-nodebug-jsmin.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-soundcloud_sdk', 'https://connect.soundcloud.com/sdk.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-amplify', MUSICFLOW_URL . '/js/player/amplify.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-fullwidthAudioPlayer', MUSICFLOW_URL . '/js/player/jquery.fullwidthAudioPlayer.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'musicflow-prefix-gotop', MUSICFLOW_URL . '/js/go-top.js', array('jquery'), '', true );

        // Custom Js
        wp_enqueue_script( 'musicflow-prefix-custom', MUSICFLOW_URL . '/js/custom.js', array('jquery'), '', true );

        $args_custom = array(
            'template_url' => get_template_directory_uri()
        );
        wp_localize_script( 'musicflow-prefix-custom', 'MUSICFLOW_SCRIPT', $args_custom );

        if ( is_single() ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
?>