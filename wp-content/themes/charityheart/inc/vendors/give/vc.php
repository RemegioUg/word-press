<?php
if ( function_exists('vc_map') ) {
	if ( !function_exists('charityheart_load_give_element')) {
		function charityheart_give_get_type_posts_data( $post_type = 'give_forms' ) {
	 
		    $posts = get_posts( array(
		        'posts_per_page' => -1,
		        'post_type' => $post_type,
		    ));
		 
		    $result = array();
		    foreach ( $posts as $post ) {
		        $result[$post->post_name] = $post->post_title;
		    }

		    return $result;
		}

		function charityheart_load_give_element() {
			$layouts = array(
				esc_html__('Grid', 'charityheart') => 'grid',
				esc_html__('List', 'charityheart') => 'list',
				esc_html__('Carousel', 'charityheart') => 'carousel'
			);
			$columns = array(1,2,3,4,6);
			vc_map( array(
				'name' => esc_html__( 'Apus Donations', 'charityheart' ),
				'base' => 'apus_donations',
				'icon' => 'icon-wpb-news-12',
				"category" => esc_html__('Apus Give', 'charityheart'),
				'description' => esc_html__( 'Create list donations', 'charityheart' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'charityheart' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'charityheart' ),
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Number', 'charityheart' ),
						'param_name' => 'number'
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Layout Type", 'charityheart'),
						"param_name" => "layout_type",
						"value" => $layouts
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns", 'charityheart'),
						"param_name" => "columns",
						"value" => $columns
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Grid Style", 'charityheart'),
						"param_name" => "grid_style",
						"value" => array(
							esc_html__('Grid Style default', 'charityheart') => 'grid',
							esc_html__('Grid Style 1', 'charityheart') => 'grid-v1',
							esc_html__('Grid Style 2', 'charityheart') => 'grid-v2',
							esc_html__('List Style 1', 'charityheart') => 'list-v1',
						),
						'default' => 'grid',
						'description' => esc_html__( 'Apply for Grid and Carousel Layout', 'charityheart' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'charityheart' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart' )
					)
				)
			) );
			$donations = array();
			if ( is_admin() ) {
				$donations = charityheart_give_get_type_posts_data();
			}
			vc_map( array(
				'name' => esc_html__( 'Apus Donation Special', 'charityheart' ),
				'base' => 'apus_donation_special',
				'icon' => 'icon-wpb-news-12',
				'category' => esc_html__('Apus Give', 'charityheart'),
				'description' => esc_html__( 'Show donation special', 'charityheart' ),
				'params' => array(
					array(
		                'type'          => 'dropdown',
		                'heading'       => esc_html__( 'Select a donation', 'charityheart' ),
		                'param_name'    => 'slug',
		                'value' => $donations,
		            ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'charityheart' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart' )
					)
				)
			) );
		}
	}
	add_action( 'vc_after_set_mode', 'charityheart_load_give_element', 99 );

	class WPBakeryShortCode_apus_donations extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_donation_special extends WPBakeryShortCode {}
}
