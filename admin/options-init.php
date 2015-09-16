<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     *
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     *
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "musicflow_admin";

    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'musicflow-albums',
        'post_status'      => 'publish',
    );
    $query_public_albums = get_posts( $args );
    $all_public_albums = array();
    foreach ($query_public_albums as $album) {
        $all_public_albums[$album->ID] = $album->post_title;
    }
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */



    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'musicflow_admin',
        'display_name' => 'MusicFlow Options',
        'display_version' => MUSICFLOW_VERSION,
        'page_slug' => 'musicflow_options',
        'page_title' => 'MusicFlow Options',
        'update_notice' => TRUE,
        'intro_text' => '',
        'footer_text' => '',
        'dev_mode' => false,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Options',
        'footer_credit' => ' ',
        'menu_icon' => MUSICFLOW_URL . '/images/icon/musicflow.png',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => '4',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon' => 'el el-warning-sign',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

     /*
     *
     * ---> START GENERAL SETTINGS SECTIONS
     *
     */

    Redux::setSection( $opt_name,
        array(
            'title'     => __( 'General Settings', "musicflow_theme" ),
            'id'        => 'general-settings',
            'desc'      => __( 'Basic field with no subsections.', "musicflow_theme" ),
            'icon'      => 'el-icon-cogs',
        )
    );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Theme Customization', "musicflow_theme" ),
        'id'         => 'general-settings-theme-customization',
        // 'icon'       => 'el el-home',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'general-settings-custom-css',
                'type'     => 'ace_editor',
                'title'    => __( 'CSS Code', "musicflow_theme" ),
                'subtitle' => __( 'Paste your CSS code here.', "musicflow_theme" ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => '',
                'default'  => "#selector{\nmargin: 0 auto;\n}",
            ),
            array(
                'id'       => 'general-settings-logo',
                'type'     => 'media',
                'title'    => __( 'Main Logo Image', "musicflow_theme" ),
                // 'compiler' => 'true',
                'mode'     => false,
            ),

            array(
                'id'               => 'general-settings-copyright',
                'type'             => 'editor',
                'title'            => __('Copyright Text', "musicflow_theme"),
                'subtitle'         => __('Copyright text in footer.', "musicflow_theme"),
                'default'          => '© '. date('Y') .' - music template for themeforest. Design & code by wtxinc',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                ),
            ),
            array(
                'id'       => 'general-settings-show-panel',
                'type'     => 'checkbox',
                'title'    => __('Menu Admin Panel', "musicflow_theme"),
                'desc'     => __('Show or hide admin panel in menu.', "musicflow_theme"),
                'default'  => '0'// 1 = on | 0 = off
            ),
        )
    ) );


     Redux::setSection( $opt_name, array(
        'title'      => __( 'Social', "musicflow_theme" ),
        'id'         => 'general-settings-social',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'general-settings-social-icons-500px',
                'type'     => 'switch',
                'title'    => __('500px Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-500px-url',
                'type'     => 'text',
                'title'    => __('500px URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
            array(
                'id'       => 'general-settings-social-icons-behance',
                'type'     => 'switch',
                'title'    => __('Behance Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-behance-url',
                'type'     => 'text',
                'title'    => __('Behance URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-dribbble',
                'type'     => 'switch',
                'title'    => __('Dribbble Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-dribbble-url',
                'type'     => 'text',
                'title'    => __('Dribbble URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
            array(
                'id'       => 'general-settings-social-icons-facebook',
                'type'     => 'switch',
                'title'    => __('Facebook Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-facebook-url',
                'type'     => 'text',
                'title'    => __('Facebook URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-flickr',
                'type'     => 'switch',
                'title'    => __('Flickr Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-flickr-url',
                'type'     => 'text',
                'title'    => __('Flickr URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-foursquare',
                'type'     => 'switch',
                'title'    => __('Foursquare Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-foursquare-url',
                'type'     => 'text',
                'title'    => __('Foursquare URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-google+',
                'type'     => 'switch',
                'title'    => __('Google+ Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-google+-url',
                'type'     => 'text',
                'title'    => __('Google+ URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-grooveshark',
                'type'     => 'switch',
                'title'    => __('Gooveshark Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-grooveshark-url',
                'type'     => 'text',
                'title'    => __('Gooveshark URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-lastfm',
                'type'     => 'switch',
                'title'    => __('Lastfm Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-lastfm-url',
                'type'     => 'text',
                'title'    => __('Lastfm URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-linkedin',
                'type'     => 'switch',
                'title'    => __('Linkedin Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-linkedin-url',
                'type'     => 'text',
                'title'    => __('Linkedin URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-picasa',
                'type'     => 'switch',
                'title'    => __('Picasa Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-picasa-url',
                'type'     => 'text',
                'title'    => __('Picasa URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-pinterest',
                'type'     => 'switch',
                'title'    => __('Pinterest Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-pinterest-url',
                'type'     => 'text',
                'title'    => __('Pinterest URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-skype',
                'type'     => 'switch',
                'title'    => __('Skype Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-skype-url',
                'type'     => 'text',
                'title'    => __('Skype URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-soundcloud',
                'type'     => 'switch',
                'title'    => __('SoundCloud Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-soundcloud-url',
                'type'     => 'text',
                'title'    => __('SoundCloud URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-spotify',
                'type'     => 'switch',
                'title'    => __('Spotify Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-spotify-url',
                'type'     => 'text',
                'title'    => __('Spotify URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-tumblr',
                'type'     => 'switch',
                'title'    => __('Tumblr Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-tumblr-url',
                'type'     => 'text',
                'title'    => __('Tumblr URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-twitter',
                'type'     => 'switch',
                'title'    => __('Twitter Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-twitter-url',
                'type'     => 'text',
                'title'    => __('Twitter URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
            array(
                'id'       => 'general-settings-social-icons-vimeo',
                'type'     => 'switch',
                'title'    => __('Vimeo Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-vimeo-url',
                'type'     => 'text',
                'title'    => __('Vimeo URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-xing',
                'type'     => 'switch',
                'title'    => __('Xing Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-xing-url',
                'type'     => 'text',
                'title'    => __('Xing URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-yelp',
                'type'     => 'switch',
                'title'    => __('Yelp Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-yelp-url',
                'type'     => 'text',
                'title'    => __('Yelp URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
             array(
                'id'       => 'general-settings-social-icons-youtube',
                'type'     => 'switch',
                'title'    => __('Youtube Icon', "musicflow_theme"),
                'subtitle' => __('Show or hide icon.', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'       => 'general-settings-social-icons-youtube-url',
                'type'     => 'text',
                'title'    => __('Youtube URL', "musicflow_theme"),
                'validate' => 'url',
                'msg'      => 'only valid url',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Login', "musicflow_theme" ),
        'id'         => 'general-settings-login',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'general-settings-login-background',
                'type'     => 'media',
                'title'    => __( 'Background Image for Login Form', "musicflow_theme" ),
                'default'  => array(
                    'url'=> get_template_directory_uri() .'/admin/images/defaults/header.jpg',
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Player', "musicflow_theme" ),
        'id'         => 'general-settings-player',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'general-settings-player-visible',
                'type'     => 'switch',
                'title'    => __( 'Switch On', "musicflow_theme" ),
                'subtitle' => __('Look it\'s on', "musicflow_theme"),
                'default'  => false,
            ),
            array(
                'id'          => 'general-settings-player-sliders',
                'type'        => 'slides',
                'title'       => __('All Music', "musicflow_theme"),
                'placeholder' => array(
                    'title'           => __('This is a music title', "musicflow_theme"),
                    'description'     => __('This is a album title', "musicflow_theme"),
                    'url'             => __('Give a link to music', "musicflow_theme"),
                ),
            )
        )
    ) );

    /*
     * <--- END GENERAL SETTINGS SECTIONS
     */

     /*
     *
     * ---> START COLOR SCHEMES SECTIONS
     *
     */

    Redux::setSection( $opt_name,
        array(
            'title'     => __( 'Color Schemes', "musicflow_theme" ),
            'id'        => 'color-schemes-settings',
            // 'desc'      => __( 'Basic field with no subsections.', "musicflow_theme" ),
            'icon'      => 'el-icon-brush',
        )
    );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Font', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-font-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-skin-font-color1',
                'type'      => 'color_rgba',
                'title'     => __('Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color2',
                'type'      => 'color_rgba',
                'title'     => __('Color 2', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#212121',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color3',
                'type'      => 'color_rgba',
                'title'     => __('Color 3', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color4',
                'type'      => 'color_rgba',
                'title'     => __('Color 4', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#737373',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color5',
                'type'      => 'color_rgba',
                'title'     => __('Color 5', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#1e1e1e',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color6',
                'type'      => 'color_rgba',
                'title'     => __('Color 6', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#949494',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color7',
                'type'      => 'color_rgba',
                'title'     => __('Color 7', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#d6d6d6',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color8',
                'type'      => 'color_rgba',
                'title'     => __('Color 8', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#3c5a98',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color9',
                'type'      => 'color_rgba',
                'title'     => __('Color 9', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#48aa25',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color10',
                'type'      => 'color_rgba',
                'title'     => __('Color 10', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#6a6a6a',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color11',
                'type'      => 'color_rgba',
                'title'     => __('Color 11', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#000000',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color12',
                'type'      => 'color_rgba',
                'title'     => __('Color 12', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#505050',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color13',
                'type'      => 'color_rgba',
                'title'     => __('Color 13', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#3d3d3d',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color14',
                'type'      => 'color_rgba',
                'title'     => __('Color 14', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0493A0',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color15',
                'type'      => 'color_rgba',
                'title'     => __('Color 15', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#c6c6c6',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color16',
                'type'      => 'color_rgba',
                'title'     => __('Color 16', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffb400',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color17',
                'type'      => 'color_rgba',
                'title'     => __('Color 17', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#b8c400',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color18',
                'type'      => 'color_rgba',
                'title'     => __('Color 18', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#00bdc4',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color19',
                'type'      => 'color_rgba',
                'title'     => __('Color 19', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#9800c4',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color20',
                'type'      => 'color_rgba',
                'title'     => __('Color 20', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#c40086',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color21',
                'type'      => 'color_rgba',
                'title'     => __('Color 21', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0d25da',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color22',
                'type'      => 'color_rgba',
                'title'     => __('Color 22', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0a6506',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color23',
                'type'      => 'color_rgba',
                'title'     => __('Color 23', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ff6ed8',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color24',
                'type'      => 'color_rgba',
                'title'     => __('Color 24', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ff7c6e',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-font-color25',
                'type'      => 'color_rgba',
                'title'     => __('Color 25', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#866eff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Background', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-background-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-skin-background-color1',
                'type'      => 'color_rgba',
                'title'     => __('Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),

                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
      array(
                'id'        => 'color-schemes-settings-skin-background-color2',
                'type'      => 'color_rgba',
                'title'     => __('Color 2', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#212121',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color3',
                'type'      => 'color_rgba',
                'title'     => __('Color 3', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color4',
                'type'      => 'color_rgba',
                'title'     => __('Color 4', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#737373',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color5',
                'type'      => 'color_rgba',
                'title'     => __('Color 5', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#1e1e1e',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color6',
                'type'      => 'color_rgba',
                'title'     => __('Color 6', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#949494',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color7',
                'type'      => 'color_rgba',
                'title'     => __('Color 7', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#d6d6d6',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color8',
                'type'      => 'color_rgba',
                'title'     => __('Color 8', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#3c5a98',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color9',
                'type'      => 'color_rgba',
                'title'     => __('Color 9', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#48aa25',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color10',
                'type'      => 'color_rgba',
                'title'     => __('Color 10', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#6a6a6a',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color11',
                'type'      => 'color_rgba',
                'title'     => __('Color 11', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#000000',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color12',
                'type'      => 'color_rgba',
                'title'     => __('Color 12', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#505050',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color13',
                'type'      => 'color_rgba',
                'title'     => __('Color 13', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#3d3d3d',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color14',
                'type'      => 'color_rgba',
                'title'     => __('Color 14', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0493A0',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color15',
                'type'      => 'color_rgba',
                'title'     => __('Color 15', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#c6c6c6',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color16',
                'type'      => 'color_rgba',
                'title'     => __('Color 16', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffb400',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color17',
                'type'      => 'color_rgba',
                'title'     => __('Color 17', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#b8c400',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color18',
                'type'      => 'color_rgba',
                'title'     => __('Color 18', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#00bdc4',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color19',
                'type'      => 'color_rgba',
                'title'     => __('Color 19', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#9800c4',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color20',
                'type'      => 'color_rgba',
                'title'     => __('Color 20', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#c40086',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        array(
                'id'        => 'color-schemes-settings-skin-background-color21',
                'type'      => 'color_rgba',
                'title'     => __('Color 21', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0d25da',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color22',
                'type'      => 'color_rgba',
                'title'     => __('Color 22', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0a6506',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color23',
                'type'      => 'color_rgba',
                'title'     => __('Color 23', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ff6ed8',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color24',
                'type'      => 'color_rgba',
                'title'     => __('Color 24', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ff7c6e',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-color25',
                'type'      => 'color_rgba',
                'title'     => __('Color 25', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#866eff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Border', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-border-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-skin-border-color1',
                'type'      => 'color_rgba',
                'title'     => __('Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-border-color2',
                'type'      => 'color_rgba',
                'title'     => __('Color 2', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#212121',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-border-color3',
                'type'      => 'color_rgba',
                'title'     => __('Color 3', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-border-color4',
                'type'      => 'color_rgba',
                'title'     => __('Color 4', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#d6d6d6',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        array(
                'id'        => 'color-schemes-settings-skin-border-color5',
                'type'      => 'color_rgba',
                'title'     => __('Color 5', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#7d7b7b',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color Hover', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-hover-color-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-skin-color-hover1',
                'type'      => 'color_rgba',
                'title'     => __('Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-color-hover2',
                'type'      => 'color_rgba',
                'title'     => __('Color 2', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#212121',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-color-hover3',
                'type'      => 'color_rgba',
                'title'     => __('Color 3', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-color-hover4',
                'type'      => 'color_rgba',
                'title'     => __('Color 4', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#737373',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Background Hover', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-hover-backgroudn-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-skin-background-hover1',
                'type'      => 'color_rgba',
                'title'     => __('Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-hover2',
                'type'      => 'color_rgba',
                'title'     => __('Color 2', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-skin-background-hover3',
                'type'      => 'color_rgba',
                'title'     => __('Color 3', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#737373',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Border Hover', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-hover-border-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-skin-border-hover1',
                'type'      => 'color_rgba',
                'title'     => __('Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Player', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-player-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-wrapper-switcher-font',
                'type'      => 'color_rgba',
                'title'     => __('Fap Switcher Font Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-wrapper-switcher-background',
                'type'      => 'color_rgba',
                'title'     => __('Fap Switcher Background Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-wrapper-background',
                'type'      => 'color_rgba',
                'title'     => __('Fap Wrapper Background Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 0.9
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-play-pause',
                'type'      => 'color_rgba',
                'title'     => __('Play Backgorund Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-play-pause-hover',
                'type'      => 'color_rgba',
                'title'     => __('Play Hover Backgorund Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#737373',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-volume-bar',
                'type'      => 'color_rgba',
                'title'     => __('Play Volume Backgorund Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-player-schemes-fap-loading-bar',
                'type'      => 'color_rgba',
                'title'     => __('Loading Bar Backgorund Color', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Others', "musicflow_theme" ),
        'desc'       => __( 'Set color and alpha channel ', "musicflow_theme" ),
        'id'         => 'color-schemes-settings-other-schemes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'        => 'color-schemes-settings-other-menu-current',
                'type'      => 'color_rgba',
                'title'     => __('Menu Current', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-other-img-hover',
                'type'      => 'color_rgba',
                'title'     => __('Image Hover', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#000000',
                    'alpha'     => 0.6
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-other-slider-skin-background-color1',
                'type'      => 'color_rgba',
                'title'     => __('Slider Background Color 1', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#df5647',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-other-slider-skin-background-color9',
                'type'      => 'color_rgba',
                'title'     => __('Slider Background Color 9', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#48aa25',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-other-slider-skin-background-color14',
                'type'      => 'color_rgba',
                'title'     => __('Slider Background Color 14', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#0493A0',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
            array(
                'id'        => 'color-schemes-settings-other-slider-skin-background-hover3',
                'type'      => 'color_rgba',
                'title'     => __('Slider Hover Background Color 3', "musicflow_theme" ),
                'default'   => array(
                    'color'     => '#737373',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => false,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => FALSE,
                    'clickout_fires_change'     => false,
                    'choose_text'               => __('Choose', "musicflow_theme"),
                    'cancel_text'               => __('Cancel', "musicflow_theme"),
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => __('Select Color', "musicflow_theme"),
                ),
            ),
        )
    ));


     /*
     *
     * ---> END COLOR SCHEMES SECTIONS
     *
     */

      /*
     *
     * ---> START TYPOGRAPHY SECTIONS
     *
     */
    Redux::setSection( $opt_name,
        array(
            'title' => __( 'Typography', "musicflow_theme" ),
            'id'    => 'typography-settings',
            'icon'  => 'el el-font',
        )
    );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Main', "musicflow_theme" ),
        'id'         => 'typography-settings-main',
        'subsection' => true,
        'fields'     => array(
             array(
                'id'          => 'typography-settings-body',
                'type'        => 'typography',
                'title'       => __('Body', "musicflow_theme"),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('h2.site-description'),
                'units'       =>'px',
                'subtitle'    => __('Typography option with each property can be called individually.', "musicflow_theme"),
                'text-align'  => false,
                'font-backup' => false,
            ),
       )
    ));

    /*
     *
     * ---> END TYPOGRAPHY SECTIONS
     *
     */


     /*
     *
     * ---> START ARCHIVES SECTIONS
     *
     */

     Redux::setSection( $opt_name,
        array(
            'title'     => __( 'Headers', "musicflow_theme" ),
            'id'        => 'headers-settings',
            'desc'      => __( 'Basic field with no subsections.', "musicflow_theme" ),
            'icon'      => 'el el-eject',
        )
    );

    Redux::setSection( $opt_name,
        array(
            'title'     => __( 'Default Images', "musicflow_theme" ),
            'id'        => 'archives-settings-header',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'archives-header-img-all',
                    'type'     => 'media',
                    'title'    => __( 'All archives', "musicflow_theme" ),
                    'subtitle' => __('Upload any media using the WordPress native uploader', "musicflow_theme"),
                    // 'mode'     => false,
                    'default'  => array(
                        'url'=> get_template_directory_uri() .'/admin/images/defaults/header.jpg',
                    ),
                ),
                 array(
                    'id'       => 'custom-posts-header-img-all',
                    'type'     => 'media',
                    'title'    => __( 'Home and all posts.', "musicflow_theme" ),
                    'subtitle' => __('Upload any media using the WordPress native uploader', "musicflow_theme"),
                    // 'mode'     => false,
                    'default'  => array(
                        'url'=> get_template_directory_uri() .'/admin/images/defaults/header.jpg',
                    ),
                ),
            )
        )
    );

    /*
     * <--- END ARCHIVES SECTIONS
     */


     /*
     *
     * ---> START SIDEBAR SECTIONS
     *
     */

     Redux::setSection( $opt_name,
        array(
            'title'         => __( 'Sidebar', "musicflow_theme" ),
            'id'            => 'sidebar-settings',
            'icon'          => 'el el-indent-right',
            'fields'        => array(
                array(
                    'id'       => 'sidebar-settings-media-player',
                    'type'     => 'switch',
                    'title'    => __( 'Sidebar Media Player', "musicflow_theme" ),
                    'subtitle' => __( 'Show or hide sidebar media player.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'sidebar-settings-media-player-item',
                    'type'     => 'select',
                    'title'    => __('Albums', "musicflow_theme"),
                    'desc'     => __('Choose one album to the sidebar media player. Default last.', "musicflow_theme"),
                    //Must provide key => value pairs for radio options
                    'options'  => $all_public_albums,
                ),
                array(
                    'id'       => 'sidebar-settings-other-albums',
                    'type'     => 'switch',
                    'title'    => __( 'Sidebar Other Albums', "musicflow_theme" ),
                    'subtitle' => __( 'Show or hide sidebar other albums.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'sidebar-settings-other-albums-items',
                    'type'     => 'select',
                    'multi'    => true,
                    'title'    => __('Albums', "musicflow_theme"),
                    'desc'     => __('Choose one or more albums to the sidebar other albums. Default all.', "musicflow_theme"),
                    //Must provide key => value pairs for radio options
                    'options'  => $all_public_albums,
                ),
                array(
                    'id'       => 'sidebar-settings-search',
                    'type'     => 'switch',
                    'title'    => __( 'Sidebar Search', "musicflow_theme" ),
                    'subtitle' => __( 'Show or hide sidebar search content.', "musicflow_theme" ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'sidebar-settings-widget-text',
                    'type'     => 'switch',
                    'title'    => __( 'Widget Text', "musicflow_theme" ),
                    'subtitle' => __( 'Show or hide sidebar text widget.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'sidebar-settings-widget-text-title',
                    'type'     => 'text',
                    'title'    => __( 'Widget Text Title', "musicflow_theme" ),
                    'subtitle' => __( 'Enter the widget title.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'sidebar-settings-widget-text-title-bold',
                    'type'     => 'text',
                    'title'    => __( 'Widget Text Title Bold', "musicflow_theme" ),
                    'subtitle' => __( 'Enter the widget title bold.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'sidebar-settings-widget-text-content',
                    'type'     => 'textarea',
                    'title'    => __( 'Widget Text Content', "musicflow_theme" ),
                    'subtitle' => __( 'Enter the widget text content.', "musicflow_theme" ),
                    'desc' => __('This is the description field, again good for additional info.', "musicflow_theme"),
                    'validate' => 'html_custom',
                    'default' => '<br />Some HTML is allowed in here.<br />',
                    'allowed_html' => array(
                        'a' => array(
                            'href' => array(),
                            'title' => array()
                        ),
                        'br' => array(),
                        'em' => array(),
                        'strong' => array()
                    )
                ),
                array(
                    'id'       => 'sidebar-settings-popular-artists',
                    'type'     => 'switch',
                    'title'    => __( 'Popular Artists', "musicflow_theme" ),
                    'subtitle' => __( 'Show or hide sidebar popular artists.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'sidebar-settings-popular-artists-show',
                    'type'     => 'radio',
                    'title'    => __('Numer Artists', "musicflow_theme"),
                    'desc'     => __('Choose number to show popular artists.', "musicflow_theme"),
                    'options'  => array(
                        '1'  => __('One', "musicflow_theme" ),
                        '2'  => __('Two', "musicflow_theme" ),
                        '3'  => __('Three', "musicflow_theme" ),
                        '5'  => __('Five', "musicflow_theme" ),
                        '8'  => __('Eight', "musicflow_theme" ),
                        '10' => __('Ten', "musicflow_theme" )
                    ),
                    'default' => '2',
                ),
            )
        )
    );

    /*
     * <--- END SIDEBAR SECTIONS
     */



      /*
     *
     * ---> START FOOTER SECTIONS
     *
     */

     Redux::setSection( $opt_name,
        array(
            'title'         => __( 'Widget Footer', "musicflow_theme" ),
            'id'            => 'footer-settings',
            'icon'          => 'el el-download-alt',
            'fields'        => array(
                array(
                    'id'       => 'footer-settings-widget',
                    'type'     => 'switch',
                    'title'    => __( 'Widget Footer', "musicflow_theme" ),
                    'subtitle' => __( 'Show or hide footer widget.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'footer-settings-widget-contact-us',
                    'type'     => 'switch',
                    'title'    => __( 'Widget Contact Us', "musicflow_theme" ),
                    'subtitle' => __( 'To show, must be switched on Widget Footer.', "musicflow_theme" ),
                ),
                array(
                    'id'           =>'footer-settings-widget-contact-us-text',
                    'type'         => 'textarea',
                    'title'        => __('Content for contact us.', "musicflow_theme"),
                    // 'subtitle'     => __('Custom HTML Allowed (wp_kses)', "musicflow_theme"),
                    'desc'         => __('This is the description for widget contat us, again good for additional info.', "musicflow_theme"),
                    'validate'     => 'html_custom',
                    'default'      => '<br />Some <em>is</em> <strong>allowed</strong> in here.<br />',
                    'allowed_html' => array(
                        'a'      => array(
                            'href' => array(),
                            'title' => array()
                        ),
                        'br'     => array(),
                        'em'     => array(),
                        'strong' => array()
                    )
                ),
                array(
                    'id'=>'footer-settings-widget-contact-us-fields',
                    'type' => 'multi_text',
                    'title' => __('Fields for contact us', "musicflow_theme"),
                    'desc' => __('This is the contact us field, again good for additional info.', "musicflow_theme")
                ),
                array(
                    'id'       => 'footer-settings-widget-latest-posts',
                    'type'     => 'switch',
                    'title'    => __( 'Widget Lastes Custom Post Type', "musicflow_theme" ),
                    'subtitle' => __( 'To show, must be switched on Widget Footer.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'footer-settings-widget-latest-posts-choose',
                    'type'     => 'select',
                    'title'    => __('Posts types', "musicflow_theme"),
                    'desc'     => __('Choose one form posts types.', "musicflow_theme"),
                    //Must provide key => value pairs for radio options
                    'options'  => array(
                        'post'                => 'Posts',
                        'musicflow-events'    => 'Events',
                        'musicflow-galleries' => 'Galleries' ,
                        'musicflow-videos'    => 'Videos' ,
                        'musicflow-albums'   => 'Albums' ,
                    ),
                    'default'  => 'post'
                ),
                array(
                    'id'       => 'footer-settings-widget-tag-cloud',
                    'type'     => 'switch',
                    'title'    => __( 'Widget Tag cloud', "musicflow_theme" ),
                    'subtitle' => __( 'To show, must be switched on Widget Footer.', "musicflow_theme" ),
                ),
                array(
                    'id'       => 'footer-settings-widget-tag-cloud-taxonomy',
                    'type'     => 'select',
                    'multi'    => true,
                    'title'    => __('Multi Select Tags', "musicflow_theme"),
                    // 'subtitle' => __('No validation can be done on this field type', "musicflow_theme"),
                    'desc'     => __('Choose multi tags.', "musicflow_theme"),
                    //Must provide key => value pairs for radio options
                    'options'  => array(
                        'post_tags'                => 'Post Tags',
                        'musicflow-events-tags'    => 'Events Tags',
                        'musicflow-galleries-tags' => 'Galleries Tags',
                        'musicflow-videos-tags'    => 'Videos Tags',
                        'musicflow-albums-tags'    => 'Albums Tags',
                    ),
                    'default'  => array('post_tags','musicflow-events-tags')
                ),
                array(
                    'id'       => 'footer-settings-widget-flickr',
                    'type'     => 'switch',
                    'title'    => __( 'Widget Flickr', "musicflow_theme" ),
                    'subtitle' => __( 'To show, must be switched on Widget Footer.', "musicflow_theme" ),
                ),
                array(
                     'id'       => 'footer-settings-widget-flickr-number',
                     'type'     => 'text',
                     'title'    => __( 'Widget Flickr ID', "musicflow_theme" ),
                     'subtitle' => __( '', "musicflow_theme" ),
                     'desc'     => __( '', "musicflow_theme" ),
                ),

            )
        )
    );

    /*
     * <--- END FOOTER SECTIONS
     */


      /*
     *
     * ---> START 404 PAGE SECTIONS
     *
     */

     Redux::setSection( $opt_name,
        array(
            'title'     => __( 'Page 404', "musicflow_theme" ),
            'id'        => 'page-404-settings',
            'desc'      => __( 'Basic field with no subsections.', "musicflow_theme" ),
            'icon'      => 'el el-warning-sign',
        )
    );

    Redux::setSection( $opt_name,
        array(
            'title'     => __( 'Default Images', "musicflow_theme" ),
            'id'        => 'page-404-settings-header',
            // 'icon'      => 'el el-home',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'page-404-settings-header-img',
                    'type'     => 'media',
                    'title'    => __( 'Header Image', "musicflow_theme" ),
                    'subtitle' => __('Upload any media using the WordPress native uploader', "musicflow_theme"),
                    // 'mode'     => false,
                    'default'  => array(
                        'url'=> get_template_directory_uri() .'/admin/images/defaults/header.jpg',
                    ),
                ),
                array(
                    'id'           =>'page-404-settings-header-text',
                    'type'         => 'textarea',
                    'title'        => __('Content for page 404.', "musicflow_theme"),
                    // 'subtitle'     => __('Custom HTML Allowed (wp_kses)', "musicflow_theme"),
                    'desc'         => __('This is the description for widget contat us, again good for additional info.', "musicflow_theme"),
                    'validate'     => 'html_custom',
                    'default'      => '<br />Some <em>is</em> <strong>allowed</strong> in here.<br />',
                    'allowed_html' => array(
                        'a'      => array(
                            'href' => array(),
                            'title' => array()
                        ),
                        'br'     => array(),
                        'em'     => array(),
                        'strong' => array()
                    )
                ),
            )
        )
    );

    /*
     * <--- END 404 PAGE SECTIONS
     */
