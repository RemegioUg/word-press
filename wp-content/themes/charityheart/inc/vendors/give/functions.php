<?php

function charityheart_give_get_donations($type, $number){
	$args = array(
		'post_type'      => 'give_forms',
		'post_status'    => 'publish',
		'posts_per_page' => $number
	);

	if ($type == 'featured') {
		$args['meta_query'] =  array(
	       	array(
	           'key' => APUSCHARITYHEART_PREFIX.'featured',
	           'value' => 'on',
	           'compare' => '=',
	       	)
		);
	}
	$loop = new WP_Query( $args );
	return $loop;
}
function charityheart_give_get_donation_form( $args = array() ) {
	
    remove_action( 'give_checkout_form_top', 'give_show_goal_progress', 10, 2 );
    
	give_get_donation_form( $args );
}

if ( !function_exists('charityheart_donation_content_class') ) {
	function charityheart_donation_content_class( $class ) {
		$page = 'archive';
		if ( is_singular( 'post' ) ) {
            $page = 'single';
        }
		if ( charityheart_get_config('donation_'.$page.'_fullwidth') ) {
			return 'container-fluid';
		}
		return $class;
	}
}
add_filter( 'charityheart_donation_content_class', 'charityheart_donation_content_class', 1 , 1  );


if ( !function_exists('charityheart_get_donation_layout_configs') ) {
	function charityheart_get_donation_layout_configs() {
		$page = 'archive';
		if ( is_singular( 'give_forms' ) ) {
            $page = 'single';
        }
		$left = charityheart_get_config('donation_'.$page.'_left_sidebar');
		$right = charityheart_get_config('donation_'.$page.'_right_sidebar');

		switch ( charityheart_get_config('donation_'.$page.'_layout') ) {
		 	case 'left-main':
		 		$configs['left'] = array( 'sidebar' => $left, 'class' => 'col-md-3 col-sm-12 col-xs-12'  );
		 		$configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12 pull-right' );
		 		break;
		 	case 'main-right':
		 		$configs['right'] = array( 'sidebar' => $right,  'class' => 'col-md-3 col-sm-12 col-xs-12 pull-right' ); 
		 		$configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12' );
		 		break;
	 		case 'main':
	 			$configs['main'] = array( 'class' => 'clearfix' );
	 			break;
 			case 'left-main-right':
 				$configs['left'] = array( 'sidebar' => $left,  'class' => 'col-md-3 col-sm-12 col-xs-12'  );
		 		$configs['right'] = array( 'sidebar' => $right, 'class' => 'col-md-3 col-sm-12 col-xs-12' ); 
		 		$configs['main'] = array( 'class' => 'col-md-6 col-sm-12 col-xs-12' );
 				break;
		 	default:
		 		$configs['main'] = array( 'class' => 'col-md-12 col-sm-12 col-xs-12' );
		 		break;
		}

		return $configs; 
	}
}

// add comment for room type
add_post_type_support( 'give_forms', 'comments' );

// comment template
function charityheart_room_comments_template_loader($template) {
    if ( get_post_type() !== 'give_forms' ) {
        return $template;
    }
    return $template;
}
add_filter( 'comments_template', 'charityheart_room_comments_template_loader' );


// remove
remove_action( 'give_pre_form_output', 'give_form_content', 10, 2 );


function charityheart_give_display_sales() {
	$form = new Give_Donate_Form( get_the_ID() );
	$sales = $form->get_sales();
	if ($sales) {
		echo '<div class="donator-whilist">';
		echo sprintf(_n( '<i class="mn-icon-1246"></i> <strong>%d</strong> Donator', '<i class="mn-icon-1246"></i> <strong>%d</strong> Donators', $sales, 'charityheart' ), $sales);
		echo '</div>';
	}
}