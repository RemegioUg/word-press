<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// layout class for woo page
if ( !function_exists('charityheart_volunteer_content_class') ) {
    function charityheart_volunteer_content_class( $class ) {
        $page = 'archive';
        if ( is_singular( 'give_volunteer' ) ) {
            $page = 'single';
        }
        if( charityheart_get_config('volunteer_'.$page.'_fullwidth') ) {
            return 'container-fluid';
        }
        return $class;
    }
}
add_filter( 'charityheart_volunteer_content_class', 'charityheart_volunteer_content_class' );

// get layout configs
if ( !function_exists('charityheart_get_volunteer_layout_configs') ) {
    function charityheart_get_volunteer_layout_configs() {
        $page = 'archive';
        if ( is_singular( 'give_volunteer' ) ) {
            $page = 'single';
        }
        $left = charityheart_get_config('volunteer_'.$page.'_left_sidebar');
        $right = charityheart_get_config('volunteer_'.$page.'_right_sidebar');

        switch ( charityheart_get_config('volunteer_'.$page.'_layout') ) {
            case 'left-main':
                $configs['left'] = array( 'sidebar' => $left, 'class' => 'col-md-3 col-xs-12'  );
                $configs['main'] = array( 'class' => 'col-md-9 col-xs-12' );
                break;
            case 'main-right':
                $configs['right'] = array( 'sidebar' => $right,  'class' => 'col-md-3 col-xs-12' ); 
                $configs['main'] = array( 'class' => 'col-md-9 col-xs-12' );
                break;
            case 'main':
                $configs['main'] = array( 'class' => 'col-md-12 col-xs-12' );
                break;
            case 'left-main-right':
                $configs['left'] = array( 'sidebar' => $left,  'class' => 'col-md-3 col-xs-12'  );
                $configs['right'] = array( 'sidebar' => $right, 'class' => 'col-md-3 col-xs-12' ); 
                $configs['main'] = array( 'class' => 'col-md-6 col-xs-12' );
                break;
            default:
                $configs['main'] = array( 'class' => 'col-md-12 col-xs-12' );
                break;
        }

        return $configs; 
    }
}