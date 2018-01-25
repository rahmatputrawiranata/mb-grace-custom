<?php

Redux::setSection( $opt_name, array(
    'title'  => __( 'Header', 'thec' ),
    'id'     => 'mwt-header-options',
    'desc'   => __( 'Header Options.', 'thec' ),
    'icon'   => 'el el-dashboard',
    'fields' => array(
        array(
            'id'       => 'mb_grace_logo',
            'type'     => 'media',
            'title'    => __( 'Logo', 'mb-grace' ),
            'desc'     => __( 'Upload Site Logo', 'mb-grace' ),
            'subtitle' => __( '', 'mb-grace' ),
            'url'      => true,
            'preview'  => true
        ),
        array(
            'id'       => 'analytics_code',
            'type'     => 'textarea',
            'title'    => __('Analytics Code', 'mb-grace'), 
            'desc'     => __('Paste your analytics code like google analytics here.', 'mb-grace'),
            'validate' => 'html_custom',
            'default'  => ''
        ),
    )
) );