<?php

Redux::setSection( $opt_name, array(
    'title'      => __( 'Thumbnail Sizes', 'mb-grace' ),
    'desc'       => __( '', 'mb-grace' ),
    'id'         => 'mwt-thumbnail-sizes-options',
    'icon'       => 'el el-brush',
    'fields'     => array(
        array(
          'id'       => 'thumbnail_large_screen_size',
          'type'     => 'dimensions',
          'units'    => array('px','em','%'),
          'title'    => __('Large Screen', 'mb-grace'),
          'desc'     => __('Enable or disable any piece of this field. Width, Height, or Units.', 'mb-grace'),
          'default'  => array(
              'Width'   => '150', 
              'Height'  => '180'
          ),
        ),
        array(
          'id'       => 'thumbnail_medium_screen_size',
          'type'     => 'dimensions',
          'units'    => array('px','em','%'),
          'title'    => __('Medium Screen', 'mb-grace'),
          'desc'     => __('Enable or disable any piece of this field. Width, Height, or Units.', 'mb-grace'),
          'default'  => array(
              'Width'   => '130', 
              'Height'  => '135'
          ),
        ),
        array(
          'id'       => 'thumbnail_small_screen_size',
          'type'     => 'dimensions',
          'units'    => array('px','em','%'),
          'title'    => __('Small Screen (Mobile)', 'mb-grace'),
          'desc'     => __('Enable or disable any piece of this field. Width, Height, or Units.', 'mb-grace'),
          'default'  => array(
              'Width'   => '90', 
              'Height'  => '100'
          ),
        ),
    )
) );