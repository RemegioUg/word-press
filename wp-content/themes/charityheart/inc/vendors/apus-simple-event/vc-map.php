<?php
if ( function_exists('vc_map') ) {
	if ( !function_exists('charityheart_load_event_element')) {
		function charityheart_load_event_element() {
			$styles = array(
				esc_html__('Style 1', 'charityheart') => 'style1',
				esc_html__('Style 2', 'charityheart') => 'style2',
			);
			
			$columns = array(1,2,3,4,6);
			
			/**
			 * apus_products
			 */
			vc_map( array(
			    "name" => esc_html__("Apus Events",'charityheart'),
			    "base" => "apus_events",
			    'description'=> esc_html__( 'Show Events', 'charityheart' ),
			    "class" => "",
			   	"category" => esc_html__('Apus Event', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => ''
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of event to show", 'charityheart'),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Layout Type", 'charityheart'),
						"param_name" => "layout_type",
						'value' => array(
							esc_html__('List', 'charityheart') => 'list',
							esc_html__('Special', 'charityheart') => 'special',
						)
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'charityheart'),
						"param_name" => "style",
						'value' => $styles,
						'description' => esc_html__("Style for List layout", 'charityheart'),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'charityheart')
					)
			   	)
			));
			
		}
	}
	add_action( 'vc_after_set_mode', 'charityheart_load_event_element', 99 );

	class WPBakeryShortCode_Apus_events extends WPBakeryShortCode {}
}