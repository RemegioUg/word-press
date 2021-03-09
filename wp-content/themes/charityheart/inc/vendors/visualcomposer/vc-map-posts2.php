<?php

if ( function_exists('vc_map') && class_exists('WPBakeryShortCode') ) {

    function charityheart_get_post_categories() {
        $return = array( esc_html__(' --- Choose a Category --- ', 'charityheart') => '' );

        $args = array(
            'type' => 'post',
            'child_of' => 0,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => false,
            'hierarchical' => 1,
            'taxonomy' => 'category'
        );

        $categories = get_categories( $args );
        charityheart_get_post_category_childs( $categories, 0, 0, $return );

        return $return;
    }

    function charityheart_get_post_category_childs( $categories, $id_parent, $level, &$dropdown ) {
        foreach ( $categories as $key => $category ) {
            if ( $category->category_parent == $id_parent ) {
                $dropdown = array_merge( $dropdown, array( str_repeat( "- ", $level ) . $category->name => $category->slug ) );
                unset($categories[$key]);
                charityheart_get_post_category_childs( $categories, $category->term_id, $level + 1, $dropdown );
            }
        }
	}

	function charityheart_load_post2_element() {
		$layouts = array(
			esc_html__('Grid', 'charityheart') => 'grid',
			esc_html__('List', 'charityheart') => 'list',
			esc_html__('Carousel', 'charityheart') => 'carousel',
		);
		$columns = array(1,2,3,4,6);
		$categories = array();
		if ( is_admin() ) {
			$categories = charityheart_get_post_categories();
		}
		vc_map( array(
			'name' => esc_html__( 'Apus Grid Posts', 'charityheart' ),
			'base' => 'apus_gridposts',
			'icon' => 'icon-wpb-news-12',
			"category" => esc_html__('Apus Post', 'charityheart'),
			'description' => esc_html__( 'Create Post having blog styles', 'charityheart' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'charityheart' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'charityheart' ),
					"admin_label" => true
				),
				array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Category','charityheart'),
	                "param_name" => 'category',
	                "value" => $categories
	            ),
	            array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Order By','charityheart'),
	                "param_name" => 'orderby',
	                "value" => array(
	                	esc_html__('Date', 'charityheart') => 'date',
	                	esc_html__('ID', 'charityheart') => 'ID',
	                	esc_html__('Author', 'charityheart') => 'author',
	                	esc_html__('Title', 'charityheart') => 'title',
	                	esc_html__('Modified', 'charityheart') => 'modified',
	                	esc_html__('Parent', 'charityheart') => 'parent',
	                	esc_html__('Comment count', 'charityheart') => 'comment_count',
	                	esc_html__('Menu order', 'charityheart') => 'menu_order',
	                	esc_html__('Random', 'charityheart') => 'rand',
	                )
	            ),
	            array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Sort order','charityheart'),
	                "param_name" => 'order',
	                "value" => array(
	                	esc_html__('Descending', 'charityheart') => 'DESC',
	                	esc_html__('Ascending', 'charityheart') => 'ASC',
	                )
	            ),
	            array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Limit', 'charityheart' ),
					'param_name' => 'posts_per_page',
					'description' => esc_html__( 'Enter limit posts.', 'charityheart' ),
					'std' => 4,
					"admin_label" => true
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Show Pagination?', 'charityheart' ),
					'param_name' => 'show_pagination',
					'description' => esc_html__( 'Enables to show paginations to next new page.', 'charityheart' ),
					'value' => array( esc_html__( 'Yes, to show pagination', 'charityheart' ) => 'yes' )
				),
				array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Grid Columns','charityheart'),
	                "param_name" => 'grid_columns',
	                "value" => $columns
	            ),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Layout Type", 'charityheart'),
					"param_name" => "layout_type",
					"value" => $layouts
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Thumbnail size', 'charityheart' ),
					'param_name' => 'thumbsize',
					'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'charityheart' )
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

	add_action( 'vc_after_set_mode', 'charityheart_load_post2_element', 99 );

	class WPBakeryShortCode_apus_gridposts extends WPBakeryShortCode {}
}