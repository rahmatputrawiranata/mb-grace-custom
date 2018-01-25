<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "mwt_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => $opt_name,
        'dev_mode' => FALSE,
        'use_cdn' => FALSE,
        'display_name' => 'Theme Options',
        'display_version' => FALSE,
        'page_slug' => 'mwt_options',
        'page_title' => 'Theme Options',
        'update_notice' => FALSE,
        'menu_type' => 'submenu',
        'menu_title' => 'Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'themes.php',
        'customizer' => TRUE,
        'default_mark' => '*',
        'google_api_key' => 'AIzaSyBF-PcYoLWQVs0ObXrRr8aNR-H2H2W_GjI',
        'class' => 'mwt-redux',
        'hints' => array(
            'icon' => 'el el-bullhorn',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'red',
                'style' => 'bootstrap',
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
                    'effect' => 'fade',
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => TRUE,
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => FALSE,
        'system_info' => FALSE,
        'hide_reset' => TRUE,
        'async_typography' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/JktHosting',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    require_once __DIR__ . ('/options/header.php');
    require_once __DIR__ . ('/options/footer.php');
    require_once __DIR__ . ('/options/thumbnail.php');
    require_once __DIR__ . ('/options/ads.php');
    require_once __DIR__ . ('/options/customs.php');

    /*
     * <--- END SECTIONS
     */
