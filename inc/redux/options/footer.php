<?php

Redux::setSection( $opt_name, array(
    'title'  => __( 'Footer', 'mb-grace' ),
    'id'     => 'mwt-footer-options',
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_copyright_text',
            'type'     => 'textarea',
            'title'    => __( 'Copyright Text', 'mb-grace' ),
            'desc'     => __( '', 'mb-grace' ),
            'subtitle' => __( '', 'mb-grace' ),
        ),
    )
) );