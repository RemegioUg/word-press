<?php
if ( function_exists('vc_map') ) {
	if ( !function_exists('charityheart_load_volunteer_element')) {
		if ( !function_exists('charityheart_vc_get_term_object')) {
		function charityheart_vc_get_term_object($term) {
			$vc_taxonomies_types = vc_taxonomies_types();

			return array(
				'label' => $term->name,
				'value' => $term->slug,
				'group_id' => $term->taxonomy,
				'group' => isset( $vc_taxonomies_types[ $term->taxonomy ], $vc_taxonomies_types[ $term->taxonomy ]->labels, $vc_taxonomies_types[ $term->taxonomy ]->labels->name ) ? $vc_taxonomies_types[ $term->taxonomy ]->labels->name : esc_html__( 'Taxonomies', 'charityheart' ),
			);
		}
	}

	if ( !function_exists('charityheart_category_field_search')) {
		function charityheart_category_field_search( $search_string ) {
			$data = array();
			$vc_taxonomies_types = array('give_volunteer_category');
			$vc_taxonomies = get_terms( $vc_taxonomies_types, array(
				'hide_empty' => false,
				'search' => $search_string
			) );
			if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
				foreach ( $vc_taxonomies as $t ) {
					if ( is_object( $t ) ) {
						$data[] = charityheart_vc_get_term_object( $t );
					}
				}
			}
			return $data;
		}
	}

	if ( !function_exists('charityheart_category_render')) {
		function charityheart_category_render($query) {  
			$category = get_term_by('id', (int)$query['value'], 'give_volunteer_category');
			if ( ! empty( $query ) && !empty($category)) {
				$data = array();
				$data['value'] = $category->slug;
				$data['label'] = $category->name;
				return ! empty( $data ) ? $data : false;
			}
			return false;
		}
	}

	$bases = array( 'apus_volunteers' );
	foreach( $bases as $base ){   
		add_filter( 'vc_autocomplete_'.$base .'_categories_callback', 'charityheart_category_field_search', 10, 1 );
	 	add_filter( 'vc_autocomplete_'.$base .'_categories_render', 'charityheart_category_render', 10, 1 );
	}

		function charityheart_load_volunteer_element() {
			$item_style = array(
				esc_html__('Style 1', 'charityheart') => '',
				esc_html__('Style 2', 'charityheart') => 'v2',
				esc_html__('Style 3', 'charityheart') => 'v3',
				esc_html__('Style 4', 'charityheart') => 'v4',
			);

			$columns = array(1,2,3,4,6);
			
			/**
			 * apus_products
			 */
			vc_map( array(
			    "name" => esc_html__("Apus Volunteers",'charityheart'),
			    "base" => "apus_volunteers",
			    'description'=> esc_html__( 'Show Volunteers', 'charityheart' ),
			    "class" => "",
			   	"category" => esc_html__('Apus Give', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => ''
					),
					array(
					    'type' => 'autocomplete',
					    'heading' => esc_html__( 'Categories', 'charityheart' ),
					    'value' => '',
					    'param_name' => 'categories',
					    'description' => esc_html__( 'Choose a categories if you want to show volunteer of that them', 'charityheart' ),
					    'settings' => array(
					     	'multiple' => true,
					     	'unique_values' => true
					    ),
				   	),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Item Style", 'charityheart'),
						"param_name" => "item_style",
						'value' => $item_style
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns", 'charityheart'),
						"param_name" => "columns",
						'value' => $columns,
						'std' => ''
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of volunteer to show", 'charityheart'),
						"param_name" => "number",
						"value" => '4'
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
	add_action( 'vc_after_set_mode', 'charityheart_load_volunteer_element', 99 );

	class WPBakeryShortCode_apus_volunteers extends WPBakeryShortCode {}
}