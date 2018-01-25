<?php

Redux::setSection( $opt_name, array(
    'title'  => __( 'Ads', 'thec' ),
    'id'     => 'mwt-ads-options',
    'icon'   => 'el el-bullhorn',
    'fields' => array(
        array(
            'id'       => 'top_ads_code',
            'type'     => 'textarea',
            'title'    => __('Top Ads Code', 'mb-grace'), 
            'desc'     => __('Kode ads/affiliate di bawah navigasi/menu.', 'mb-grace'),
            'validate' => 'html_custom',
            'default'  => ''
        ),
        array(
            'id'       => 'right_ads_code',
            'type'     => 'textarea',
            'title'    => __('Sidebar Ads Code', 'mb-grace'), 
            'desc'     => __('Kode ads/affiliate di sidebar.', 'mb-grace'),
            'validate' => 'html_custom',
            'default'  => ''
        ),
        array(
            'id'       => 'content_ads_10_code',
            'type'     => 'textarea',
            'title'    => __('Content 1 Ads', 'mb-grace'), 
            'validate' => 'html_custom',
            'default'  => ''
        ),
        array(
            'id'       => 'content_ads_20_code',
            'type'     => 'textarea',
            'title'    => __('Content 2 Ads', 'mb-grace'), 
            'validate' => 'html_custom',
            'default'  => ''
        ),
        array(
            'id'       => 'content_ads_30_code',
            'type'     => 'textarea',
            'title'    => __('Content 3 Ads', 'mb-grace'), 
            'validate' => 'html_custom',
            'default'  => ''
        ),
        array(
            'id'       => 'content_ads_40_code',
            'type'     => 'textarea',
            'title'    => __('Content 4 Ads', 'mb-grace'), 
            'validate' => 'html_custom',
            'default'  => ''
        ),
        array(
            'id'       => 'content_ads_50_code',
            'type'     => 'textarea',
            'title'    => __('Content 5 Ads', 'mb-grace'), 
            'validate' => 'html_custom',
            'default'  => ''
        ),
    )
) );