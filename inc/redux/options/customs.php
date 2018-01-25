<?php

Redux::setSection( $opt_name, array(
    'title'      => __( 'Custom Settings', 'mb-grace' ),
    'desc'       => __( '', 'mb-grace' ),
    'id'         => 'mwt-custom-codes-options',
    'icon'       => 'el el-cogs',
    'fields'     => array(
        array(
            'id'       => 'comment_option',
            'type'     => 'checkbox',
            'title'    => __('', 'mb-grace'), 
            'subtitle' => __('', 'mb-grace'),
            'desc'     => __('', 'mb-grace'),
         
            //Must provide key => value pairs for multi checkbox options
            'options'  => array(
                '1' => 'Hide comments',
            ),
         
            //See how default has changed? you also don't need to specify opts that are 0.
            'default' => array(
                '1' => '1', 
            )
        ),
        array(
            'id'       => 'mb_grace_custom_css',
            'type'     => 'ace_editor',
            'title'    => __('Custom CSS', 'mb-grace'),
            'subtitle' => __('Paste your CSS code here.', 'mb-grace'),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'desc'     => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
            'default'  => ""
        ),
        array(
            'id'       => 'mb_grace_custom_js',
            'type'     => 'ace_editor',
            'title'    => __('Custom JS', 'redux-framework-demo'),
            'subtitle' => __('Paste your javascript code here.', 'mb-grace'),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'desc'     => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
            'default'  => ""
        ),
    )
) );