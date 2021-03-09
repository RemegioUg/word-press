<?php

if ( !function_exists('charityheart_event_content_class') ) {
	function charityheart_event_content_class( $class ) {
		$page = 'archive';
		if ( is_singular( 'simple_event' ) ) {
            $page = 'single';
        }
		if ( charityheart_get_config('event_'.$page.'_fullwidth') ) {
			return 'container-fluid';
		}
		return $class;
	}
}
add_filter( 'charityheart_event_content_class', 'charityheart_event_content_class', 1 , 1  );


if ( !function_exists('charityheart_get_event_layout_configs') ) {
	function charityheart_get_event_layout_configs() {
		$page = 'archive';
		if ( is_singular( 'simple_event' ) ) {
            $page = 'single';
        }
		$left = charityheart_get_config('event_'.$page.'_left_sidebar');
		$right = charityheart_get_config('event_'.$page.'_right_sidebar');

		switch ( charityheart_get_config('event_'.$page.'_layout') ) {
		 	case 'left-main':
		 		$configs['left'] = array( 'sidebar' => $left, 'class' => 'col-md-3 col-sm-12 col-xs-12'  );
		 		$configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12' );
		 		break;
		 	case 'main-right':
		 		$configs['right'] = array( 'sidebar' => $right,  'class' => 'col-md-3 col-sm-12 col-xs-12' ); 
		 		$configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12' );
		 		break;
 			case 'left-main-right':
 				$configs['left'] = array( 'sidebar' => $left,  'class' => 'col-md-3 col-sm-12 col-xs-12'  );
		 		$configs['right'] = array( 'sidebar' => $right, 'class' => 'col-md-3 col-sm-12 col-xs-12' ); 
		 		$configs['main'] = array( 'class' => 'col-md-6 col-sm-12 col-xs-12' );
 				break;
			case 'main':
		 	default:
		 		$configs['main'] = array( 'class' => 'col-md-12 col-sm-12 col-xs-12' );
		 		break;
		}

		return $configs; 
	}
}

function charityheart_event_map_api_key($key) {
    $key = charityheart_get_config('google_map_api_key');
    return $key;
}
add_filter('apussimpleevent_map_api_key', 'charityheart_event_map_api_key');