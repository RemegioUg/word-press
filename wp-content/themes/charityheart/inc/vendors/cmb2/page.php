<?php

if ( !function_exists( 'charityheart_page_metaboxes' ) ) {
	function charityheart_page_metaboxes(array $metaboxes) {
		global $wp_registered_sidebars;
        $sidebars = array();

        if ( !empty($wp_registered_sidebars) ) {
            foreach ($wp_registered_sidebars as $sidebar) {
                $sidebars[$sidebar['id']] = $sidebar['name'];
            }
        }
        $headers = array_merge( array('global' => esc_html__( 'Global Setting', 'charityheart' )), charityheart_get_header_layouts() );
        $footers = array_merge( array('global' => esc_html__( 'Global Setting', 'charityheart' )), charityheart_get_footer_layouts() );

		$prefix = 'apus_page_';
	    $fields = array(
			array(
				'name' => esc_html__( 'Select Layout', 'charityheart' ),
				'id'   => $prefix.'layout',
				'type' => 'select',
				'options' => array(
					'main' => esc_html__('Main Content Only', 'charityheart'),
					'left-main' => esc_html__('Left Sidebar - Main Content', 'charityheart'),
					'main-right' => esc_html__('Main Content - Right Sidebar', 'charityheart'),
					'left-main-right' => esc_html__('Left Sidebar - Main Content - Right Sidebar', 'charityheart')
				)
			),
			array(
                'id' => $prefix.'fullwidth',
                'type' => 'select',
                'name' => esc_html__('Is Full Width?', 'charityheart'),
                'default' => 'no',
                'options' => array(
                    'no' => esc_html__('No', 'charityheart'),
                    'yes' => esc_html__('Yes', 'charityheart')
                )
            ),
            array(
                'id' => $prefix.'left_sidebar',
                'type' => 'select',
                'name' => esc_html__('Left Sidebar', 'charityheart'),
                'options' => $sidebars
            ),
            array(
                'id' => $prefix.'right_sidebar',
                'type' => 'select',
                'name' => esc_html__('Right Sidebar', 'charityheart'),
                'options' => $sidebars
            ),
            array(
                'id' => $prefix.'show_breadcrumb',
                'type' => 'select',
                'name' => esc_html__('Show Breadcrumb?', 'charityheart'),
                'options' => array(
                    'no' => esc_html__('No', 'charityheart'),
                    'yes' => esc_html__('Yes', 'charityheart')
                ),
                'default' => 'yes',
            ),
            array(
                'id' => $prefix.'breadcrumb_color',
                'type' => 'colorpicker',
                'name' => esc_html__('Breadcrumb Background Color', 'charityheart')
            ),
            array(
                'id' => $prefix.'breadcrumb_image',
                'type' => 'file',
                'name' => esc_html__('Breadcrumb Background Image', 'charityheart')
            ),
            array(
                'id' => $prefix.'header_type',
                'type' => 'select',
                'name' => esc_html__('Header Layout Type', 'charityheart'),
                'description' => esc_html__('Choose a header for your website.', 'charityheart'),
                'options' => $headers,
                'default' => 'global'
            ),
            array(
                'id' => $prefix.'footer_type',
                'type' => 'select',
                'name' => esc_html__('Footer Layout Type', 'charityheart'),
                'description' => esc_html__('Choose a footer for your website.', 'charityheart'),
                'options' => $footers,
                'default' => 'global'
            ),
            array(
                'id' => $prefix.'header_transparent',
                'type' => 'select',
                'name' => esc_html__('Background Transparent', 'charityheart'),
                'description' => esc_html__('Choose a footer for your website.', 'charityheart'),
                'options' => array(
                    'no' => esc_html__('No', 'charityheart'),
                    'yes' => esc_html__('Yes', 'charityheart')
                ),
                'default' => 'global'
            ),
            array(
                'id' => $prefix.'extra_class',
                'type' => 'text',
                'name' => esc_html__('Extra Class', 'charityheart'),
                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart')
            )
    	);
		
	    $metaboxes[$prefix . 'display_setting'] = array(
			'id'                        => $prefix . 'display_setting',
			'title'                     => esc_html__( 'Display Settings', 'charityheart' ),
			'object_types'              => array( 'page' ),
			'context'                   => 'normal',
			'priority'                  => 'high',
			'show_names'                => true,
			'fields'                    => $fields
		);

	    return $metaboxes;
	}
}
add_filter( 'cmb2_meta_boxes', 'charityheart_page_metaboxes' );

if ( !function_exists( 'charityheart_cmb2_style' ) ) {
	function charityheart_cmb2_style() {
		wp_enqueue_style( 'charityheart-cmb2-style', get_template_directory_uri() . '/inc/vendors/cmb2/assets/style.css', array(), '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'charityheart_cmb2_style' );


