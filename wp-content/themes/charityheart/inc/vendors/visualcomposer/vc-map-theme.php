<?php
if ( function_exists('vc_map') && class_exists('WPBakeryShortCode') ) {
	if ( !function_exists('charityheart_load_load_theme_element')) {
		function charityheart_load_load_theme_element() {
			$columns = array(1,2,3,4,6);
			// Heading Text Block
			vc_map( array(
				'name'        => esc_html__( 'Apus Widget Heading','charityheart'),
				'base'        => 'apus_title_heading',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'charityheart'),
				'description' => esc_html__( 'Create title for one Widget', 'charityheart' ),
				"params"      => array(
					array(
						'type' => 'textarea_html',
						'heading' => esc_html__( 'Widget title', 'charityheart' ),
						'param_name' => 'content',
						'description' => esc_html__( 'Enter heading title.', 'charityheart' ),
						"admin_label" => true,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Sub Title', 'charityheart' ),
						'param_name' => 'subtitle',
						"admin_label" => true
					),
					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'charityheart' ),
						"param_name" => "descript",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'charityheart' )
				    ),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'charityheart'),
						"param_name" => "style",
						'value' 	=> array(
							esc_html__('Style Default Dark', 'charityheart') => 'default_dark', 
							esc_html__('Style Default White', 'charityheart') => 'default_white', 
							esc_html__('Style First Square', 'charityheart') => 'square', 
							esc_html__('Style Two Color', 'charityheart') => 'color', 
							esc_html__('Style Dark', 'charityheart') => 'dark', 
							esc_html__('Style Black', 'charityheart') => 'black',
							esc_html__('Style White', 'charityheart') => 'white',
						),
						'std' => ''
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'charityheart' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart' )
					)
				),
			));

			// Heading Text Block
			vc_map( array(
				'name'        => esc_html__( 'Apus Widget Introduction','charityheart'),
				'base'        => 'apus_introduction',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'charityheart'),
				'description' => esc_html__( 'Create title for one Widget', 'charityheart' ),
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'charityheart' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter heading title.', 'charityheart' ),
						"admin_label" => true,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Sub Title', 'charityheart' ),
						'param_name' => 'subtitle',
						"admin_label" => true
					),
					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'charityheart' ),
						"param_name" => "descript",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'charityheart' )
				    ),
					array(
						"type" => "attach_images",
						"heading" => esc_html__("Images Signature", 'charityheart'),
						"param_name" => "images"
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Name', 'charityheart' ),
						'param_name' => 'name',
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Job', 'charityheart' ),
						'param_name' => 'job',
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'charityheart' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart' )
					)
				),
			));
			// calltoaction
			vc_map( array(
				'name'        => esc_html__( 'Apus Widget Call To Action','charityheart'),
				'base'        => 'apus_call_action',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'charityheart'),
				'description' => esc_html__( 'Create title for one Widget', 'charityheart' ),
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Sub title', 'charityheart' ),
						'param_name' => 'subtitle',
						'description' => esc_html__( 'Enter Sub title.', 'charityheart' ),
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'charityheart' ),
						'param_name' => 'title',
						'value'       => esc_html__( 'Title', 'charityheart' ),
						'description' => esc_html__( 'Enter heading title.', 'charityheart' ),
						"admin_label" => true
					),
					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'charityheart' ),
						"param_name" => "descript",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'charityheart' )
				    ),

				    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Text Button 1', 'charityheart' ),
						'param_name' => 'textbutton1',
						'description' => esc_html__( 'Text Button', 'charityheart' ),
						"admin_label" => true
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( ' Link Button 1', 'charityheart' ),
						'param_name' => 'linkbutton1',
						'description' => esc_html__( 'Link Button 1', 'charityheart' ),
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Button Style", 'charityheart'),
						"param_name" => "buttons1",
						'value' 	=> array(
							esc_html__('Default ', 'charityheart') => 'btn-default ', 
							esc_html__('Primary ', 'charityheart') => 'btn-primary ', 
							esc_html__('Success ', 'charityheart') => 'btn-success radius-0 ', 
							esc_html__('Info ', 'charityheart') => 'btn-info ', 
							esc_html__('Warning ', 'charityheart') => 'btn-warning ', 
							esc_html__('Theme Color ', 'charityheart') => 'btn-theme',
							esc_html__('Danger ', 'charityheart') => 'btn-danger ', 
							esc_html__('Pink ', 'charityheart') => 'btn-pink ', 
							esc_html__('Primary Outline', 'charityheart') => 'btn-primary btn-outline', 
							esc_html__('White Outline ', 'charityheart') => 'btn-white btn-outline ',
							esc_html__('Theme Outline ', 'charityheart') => 'btn-theme btn-outline ',
						),
						'std' => ''
					),
					
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'charityheart'),
						"param_name" => "style",
						'value' 	=> array(
							esc_html__('Style 1', 'charityheart') => 'style1',
							esc_html__('Style 2', 'charityheart') => 'style2',
							esc_html__('Style 3', 'charityheart') => 'style3',
						),
						'std' => ''
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'charityheart' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart' )
					)
				),
			));
			// Banner CountDown
			vc_map( array(
				'name'        => esc_html__( 'Apus Banner CountDown','charityheart'),
				'base'        => 'apus_banner_countdown',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'charityheart'),
				'description' => esc_html__( 'Show CountDown with banner', 'charityheart' ),
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'charityheart' ),
						'param_name' => 'title',
						'value'       => esc_html__( 'Title', 'charityheart' ),
						'description' => esc_html__( 'Enter heading title.', 'charityheart' ),
						"admin_label" => true
					),
					array(
						"type" => "textfield",
						'heading' => esc_html__( 'Sub Title', 'charityheart' ),
						"param_name" => "sub_title",
						"value" => '',
						'description' => esc_html__( 'Enter Sub Title for title.', 'charityheart' )
				    ),

					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'charityheart' ),
						"param_name" => "descript",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'charityheart' )
				    ),
					array(
						"type" => "attach_image",
						"description" => esc_html__("If you upload an image, icon will not show.", 'charityheart'),
						"param_name" => "image",
						"value" => '',
						'heading'	=> esc_html__('Image', 'charityheart' )
					),
					array(
					    'type' => 'textfield',
					    'heading' => esc_html__( 'Date Expired', 'charityheart' ),
					    'param_name' => 'input_datetime'
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( ' Link Button', 'charityheart' ),
						'param_name' => 'linkbutton',
						'description' => esc_html__( 'Link Button', 'charityheart' ),
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'charityheart'),
						"param_name" => "style_widget",
						'value' 	=> array(
							esc_html__('Style Default', 'charityheart') => '', 
							esc_html__('Style Blue', 'charityheart') => 'style_blue', 
						),
						'std' => ''
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'charityheart' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'charityheart' )
					),
				),
			));
			$fields = array();
			for ($i=1; $i <= 5; $i++) { 
				$fields[] = array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'charityheart').' '.$i,
					"param_name" => "title".$i,
					"value" => '',    "admin_label" => true,
				);
				$fields[] = array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'charityheart').' '.$i,
					"param_name" => "photo".$i,
					"value" => '',
					'description' => ''
				);
				$fields[] = array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'charityheart').' '.$i,
					"param_name" => "information".$i,
					"value" => 'Your Description Here',
					'description'	=> esc_html__('Allow  put html tags', 'charityheart' )
				);
		    	$fields[] = array(
					"type" => "textfield",
					"heading" => esc_html__("Link Read More", 'charityheart').' '.$i,
					"param_name" => "link".$i,
					"value" => '',
				);
			}
			$fields[] = array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'charityheart'),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
			);
			
			// Apus Counter
			vc_map( array(
			    "name" => esc_html__("Apus Counter",'charityheart'),
			    "base" => "apus_counter",
			    "class" => "",
			    "description"=> esc_html__('Counting number with your term', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'charityheart'),
						"param_name" => "description",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number", 'charityheart'),
						"param_name" => "number",
						"value" => ''
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__("Color Number and Icon", 'charityheart'),
						"param_name" => "text_color",
						'value' 	=> '',
					),
				 	array(
						"type" => "textfield",
						"heading" => esc_html__("FontAwsome Icon", 'charityheart'),
						"param_name" => "icon",
						"value" => '',
						'description' => esc_html__( 'This support display icon from FontAwsome, Please click', 'charityheart' )
										. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
										. esc_html__( 'here to see the list', 'charityheart' ) . '</a>'
					),
					array(
						"type" => "attach_image",
						"description" => esc_html__("If you upload an image, icon will not show.", 'charityheart'),
						"param_name" => "image",
						"value" => '',
						'heading'	=> esc_html__('Image', 'charityheart' )
					),
					array(
		                'type' => 'dropdown',
		                'heading' => esc_html__( 'Style', 'charityheart' ),
		                'param_name' => 'style',
		                'value' => array(
		                    esc_html__( 'Default', 'charityheart' ) 	=> '',
		                    esc_html__( 'Style 1', 'charityheart' ) 	=> 'style1',
		                )
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));

			/**************************************************
			*   Element time line 
			**************************************************/
			vc_map( array(
					'name'        => esc_html__('Apus Timeline','charityheart'),
					'base'        => 'apus_timeline',
					"class"       => "",
					"category" => esc_html__('Apus Elements', 'charityheart'),
					'description' => esc_html__('Create Item timeline with content + icon', 'charityheart' ),
					'params'		=> array(
						array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
							"admin_label" => true
						),

				    	array(
							"type" => "textfield",
							"heading" => esc_html__("Sub Title", 'charityheart'),
							"param_name" => "subtitle",
							"value" => '',
								"admin_label" => true
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Title Alignment', 'charityheart' ),
							'param_name' => 'alignment',
							'value' => array(
								esc_html__('Align left', 'charityheart' ) => 'separator_align_left',
								esc_html__('Align center', 'charityheart' ) => 'separator_align_center',
								esc_html__('Align right', 'charityheart' ) => 'separator_align_right'
							)
						),
						
						array(
							'type' => 'param_group',
							'heading' => esc_html__('Items', 'charityheart' ),
							'param_name' => 'items',
							'description' => '',
							'value' => urlencode( json_encode( array(
								
							) ) ),

							'params' => array(
								array(
									'type' => 'textfield',
									'heading' => esc_html__('Title', 'charityheart' ),
									'param_name' => 'title',
									'admin_label' => true,
								),
								array(
									'type' => 'textfield',
									'heading' => esc_html__('Date', 'charityheart' ),
									'param_name' => 'date',
									'admin_label' => true,
								),
								array(
									'type' => 'textarea',
									'heading' => esc_html__('Content', 'charityheart' ),
									'param_name' => 'content',
									'admin_label' => false,
								),
							),
						),
					)
				)
			);

			// Apus Counter
			vc_map( array(
			    "name" => esc_html__("Apus Brands",'charityheart'),
			    "base" => "apus_brands",
			    "class" => "",
			    "description"=> esc_html__('Display brands on front end', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Sub Title", 'charityheart'),
						"param_name" => "subtitle",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number", 'charityheart'),
						"param_name" => "number",
						"value" => ''
					),
				 	array(
						"type" => "dropdown",
						"heading" => esc_html__("Layout Type", 'charityheart'),
						"param_name" => "layout_type",
						'value' 	=> array(
							esc_html__('Carousel', 'charityheart') => 'carousel', 
							esc_html__('Grid', 'charityheart') => 'grid'
						),
						'std' => ''
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','charityheart'),
		                "param_name" => 'columns',
		                "value" => array(1,2,3,4,5,6),
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));
			
			vc_map( array(
			    "name" => esc_html__("Apus Socials link",'charityheart'),
			    "base" => "apus_socials_link",
			    "description"=> esc_html__('Show socials link', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'charityheart'),
						"param_name" => "description",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Facebook Page URL", 'charityheart'),
						"param_name" => "facebook_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Twitter Page URL", 'charityheart'),
						"param_name" => "twitter_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Youtube Page URL", 'charityheart'),
						"param_name" => "youtube_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Pinterest Page URL", 'charityheart'),
						"param_name" => "pinterest_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Google Plus Page URL", 'charityheart'),
						"param_name" => "google-plus_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Instagram Page URL", 'charityheart'),
						"param_name" => "instagram_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));
			// newsletter
			vc_map( array(
			    "name" => esc_html__("Apus Newsletter",'charityheart'),
			    "base" => "apus_newsletter",
			    "class" => "",
			    "description"=> esc_html__('Show newsletter form', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'charityheart'),
						"param_name" => "description",
						"value" => '',
					),
					array(
		                'type' => 'dropdown',
		                'heading' => esc_html__( 'Style', 'charityheart' ),
		                'param_name' => 'style',
		                'value' => array(
		                    esc_html__( 'Style 1', 'charityheart' ) 	=> 'style1',
		                    esc_html__( 'Style 2', 'charityheart' ) 	=> 'style2',
		                    esc_html__( 'Style full', 'charityheart' ) 	=> 'fullbutton',
		                    esc_html__( 'Style white center', 'charityheart' ) 	=> 'whitecenter',
		                )
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));
			// google map
			vc_map( array(
			    "name" => esc_html__("Apus Google Map",'charityheart'),
			    "base" => "apus_googlemap",
			    "description" => esc_html__('Diplay Google Map', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
		            array(
		                'type' => 'googlemap',
		                'heading' => esc_html__( 'Location', 'charityheart' ),
		                'param_name' => 'location',
		                'value' => ''
		            ),
		            array(
		                'type' => 'hidden',
		                'heading' => esc_html__( 'Latitude Longitude', 'charityheart' ),
		                'param_name' => 'lat_lng',
		                'value' => '21.0173222,105.78405279999993'
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Map height", 'charityheart'),
						"param_name" => "height",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Map Zoom", 'charityheart'),
						"param_name" => "zoom",
						"value" => '13',
					),
		            array(
		                'type' => 'dropdown',
		                'heading' => esc_html__( 'Map Type', 'charityheart' ),
		                'param_name' => 'type',
		                'value' => array(
		                    esc_html__( 'roadmap', 'charityheart' ) 		=> 'ROADMAP',
		                    esc_html__( 'hybrid', 'charityheart' ) 	=> 'HYBRID',
		                    esc_html__( 'satellite', 'charityheart' ) 	=> 'SATELLITE',
		                    esc_html__( 'terrain', 'charityheart' ) 	=> 'TERRAIN',
		                )
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));
			// Testimonial
			vc_map( array(
	            "name" => esc_html__("Apus Testimonials",'charityheart'),
	            "base" => "apus_testimonials",
	            'description'=> esc_html__('Display Testimonials In FrontEnd', 'charityheart'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'charityheart'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
	              	array(
		              	"type" => "textfield",
		              	"heading" => esc_html__("Number", 'charityheart'),
		              	"param_name" => "number",
		              	"value" => '4',
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','charityheart'),
		                "param_name" => 'columns',
		                "value" => $columns
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Style','charityheart'),
		                "param_name" => 'style',
		                'value' 	=> array(
		                	esc_html__('Styel Default ', 'charityheart') => '', 
							esc_html__('Styel Lighten ', 'charityheart') => 'lighten', 
						),
						'std' => ''
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
	            )
	        ));
	        // Our Team
			vc_map( array(
	            "name" => esc_html__("Apus Our Team",'charityheart'),
	            "base" => "apus_ourteam",
	            'description'=> esc_html__('Display Our Team In FrontEnd', 'charityheart'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'charityheart'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Sub Title", 'charityheart'),
						"param_name" => "subtitle",
						"admin_label" => true,
						"value" => '',
					),
	              	array(
						'type' => 'param_group',
						'heading' => esc_html__('Members Settings', 'charityheart' ),
						'param_name' => 'members',
						'description' => '',
						'value' => '',
						'params' => array(
							array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Name','charityheart'),
				                "param_name" => "name",
				            ),
				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Short Description','charityheart'),
				                "param_name" => "des",
				            ),
							array(
								"type" => "attach_image",
								"heading" => esc_html__("Image", 'charityheart'),
								"param_name" => "image"
							),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Facebook','charityheart'),
				                "param_name" => "facebook",
				            ),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Twitter Link','charityheart'),
				                "param_name" => "twitter",
				            ),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Google plus Link','charityheart'),
				                "param_name" => "google",
				            ),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Linkin Link','charityheart'),
				                "param_name" => "linkin",
				            ),

						),
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','charityheart'),
		                "param_name" => 'columns',
		                "value" => array(1,2,3,4,5,6),
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
	            )
	        ));


	 		// Widget contact
			vc_map( array(
	            "name" => esc_html__("Apus Contact",'charityheart'),
	            "base" => "apus_contact",
	            'description'=> esc_html__('Display Contact In FrontEnd', 'charityheart'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'charityheart'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Facebook Page URL", 'charityheart'),
						"param_name" => "facebook_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Twitter Page URL", 'charityheart'),
						"param_name" => "twitter_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("LinkedIn Page URL", 'charityheart'),
						"param_name" => "linked_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Skype Page URL", 'charityheart'),
						"param_name" => "skype_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Mail", 'charityheart'),
						"param_name" => "mail",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Phone", 'charityheart'),
						"param_name" => "phone",
						"value" => '',
						"admin_label"	=> true
					),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
	            )
	        ));

	        // Gallery Images
			vc_map( array(
	            "name" => esc_html__("Apus Gallery",'charityheart'),
	            "base" => "apus_gallery",
	            'description'=> esc_html__('Display Gallery In FrontEnd', 'charityheart'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'charityheart'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
	              	array(
						"type" => "attach_images",
						"heading" => esc_html__("Images", 'charityheart'),
						"param_name" => "images"
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','charityheart'),
		                "param_name" => 'columns',
		                "value" => $columns
		            ),
		            array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'charityheart' ),
						"param_name" => "description",
						"value" => '',
						'description' => esc_html__( 'This field is used for Style 2.', 'charityheart' )
				    ),
				    array(
						"type" => "textfield",
						"heading" => esc_html__("Button Text", 'charityheart'),
						"param_name" => "button_text"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Button Url", 'charityheart'),
						"param_name" => "button_url"
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Style','charityheart'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Default ', 'charityheart') => '', 
							esc_html__('Light', 'charityheart') => 'light',
							esc_html__('Border', 'charityheart') => 'border',
						),
						'std' => ''
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
	            )
	        ));
	        // Gallery Images
			vc_map( array(
	            "name" => esc_html__("Apus Video",'charityheart'),
	            "base" => "apus_video",
	            'description'=> esc_html__('Display Video In FrontEnd', 'charityheart'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'charityheart'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'charityheart' ),
						"param_name" => "description",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'charityheart' )
				    ),
	              	array(
						"type" => "attach_image",
						"heading" => esc_html__("Video Cover Image", 'charityheart'),
						"param_name" => "image"
					),
					array(
		                "type" => "textfield",
		                "heading" => esc_html__('Youtube Video Link','charityheart'),
		                "param_name" => 'video_link'
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
	            )
	        ));
	        // Features Box
			vc_map( array(
	            "name" => esc_html__("Apus Features Box",'charityheart'),
	            "base" => "apus_features_box",
	            'description'=> esc_html__('Display Features In FrontEnd', 'charityheart'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'charityheart'),
	            "params" => array(
	            	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Members Settings', 'charityheart' ),
						'param_name' => 'items',
						'description' => '',
						'value' => '',
						'params' => array(
							array(
								"type" => "attach_image",
								"description" => esc_html__("Background Image for box.", 'charityheart'),
								"param_name" => "image",
								"value" => '',
								'heading'	=> esc_html__('Background Image', 'charityheart' )
							),
							array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Title','charityheart'),
				                "param_name" => "title",
				            ),
				            array(
				                "type" => "textarea",
				                "class" => "",
				                "heading" => esc_html__('Description','charityheart'),
				                "param_name" => "description",
				            ),
							array(
								"type" => "textfield",
								"heading" => esc_html__("Material Design Icon and Awesome Icon", 'charityheart'),
								"param_name" => "icon",
								"value" => '',
								'description' => esc_html__( 'This support display icon from Material Design and Awesome Icon, Please click', 'charityheart' )
												. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://zavoloklom.github.io/material-design-iconic-font/icons.html" target="_blank">'
												. esc_html__( 'here to see the list', 'charityheart' ) . '</a>'
							),
							array(
				                "type" => "textfield",
				                "heading" => esc_html__('Button Text Read More','charityheart'),
				                "param_name" => "button_text"
				            ),
							array(
				                "type" => "textfield",
				                "heading" => esc_html__('Button Link','charityheart'),
				                "param_name" => 'button_link'
				            ),
						),
					),
	             	array(
		              	"type" => "textfield",
		              	"heading" => esc_html__("Number Columns", 'charityheart'),
		              	"param_name" => "number",
		              	"value" => '1',
		            ),
		           	array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Style','charityheart'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Default ', 'charityheart') => 'default', 
							esc_html__('White ', 'charityheart') => 'white',
							esc_html__('Circle ', 'charityheart') => 'circle',
							esc_html__('Default white', 'charityheart') => 'default default-white', 
						),
						'std' => ''
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
	            )
	        ));

			// Banner
			vc_map( array(
			    "name" => esc_html__("Apus Banner",'charityheart'),
			    "base" => "apus_banner",
			    "class" => "",
			    "description"=> esc_html__('Show Text and Images', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Icon Title", 'charityheart'),
						"param_name" => "icon",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'charityheart'),
						"param_name" => "description",
						"value" => '',
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__("Images", 'charityheart'),
						"param_name" => "image"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Button Url", 'charityheart'),
						"param_name" => "button_url"
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Style','charityheart'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Styel Default ', 'charityheart') => '', 
						),
						'std' => ''
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));
			
			// box info
			vc_map( array(
			    "name" => esc_html__("Apus Box Info",'charityheart'),
			    "base" => "apus_boxinfo",
			    "class" => "",
			    "description"=> esc_html__('Show Text', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'charityheart'),
						"param_name" => "description",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Button Url", 'charityheart'),
						"param_name" => "button_url"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));

			// My Story
			vc_map( array(
			    "name" => esc_html__("Apus My Story",'charityheart'),
			    "base" => "apus_story",
			    "class" => "",
			    "description"=> esc_html__('Show My Story', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Name", 'charityheart'),
						"param_name" => "name",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Disease", 'charityheart'),
						"param_name" => "disease",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'charityheart'),
						"param_name" => "description",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));

			$custom_menus = array();
			if ( is_admin() ) {
				$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
				if ( is_array( $menus ) && ! empty( $menus ) ) {
					foreach ( $menus as $single_menu ) {
						if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->slug ) ) {
							$custom_menus[ $single_menu->name ] = $single_menu->slug;
						}
					}
				}
			}
			// Menu
			vc_map( array(
			    "name" => esc_html__("Apus Custom Menu",'charityheart'),
			    "base" => "apus_custom_menu",
			    "class" => "",
			    "description"=> esc_html__('Show Custom Menu', 'charityheart'),
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Menu', 'charityheart' ),
						'param_name' => 'nav_menu',
						'value' => $custom_menus,
						'description' => empty( $custom_menus ) ? esc_html__( 'Custom menus not found. Please visit Appearance > Menus page to create new menu.', 'charityheart' ) : esc_html__( 'Select menu to display.', 'charityheart' ),
						'admin_label' => true,
						'save_always' => true,
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));

			// vertical menu
			$option_menu  = array(); 
			if( is_admin() ){
				$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
			    $option_menu = array( esc_html__('--- Select Menu ---', 'charityheart') => '' );
			    foreach ($menus as $menu) {
			    	$option_menu[$menu->name] = $menu->slug;
			    }
			} 
			vc_map( array(
			    "name" => esc_html__("Apus Vertical MegaMenu",'charityheart'),
			    "base" => "apus_verticalmenu",
			    "class" => "",
			    "category" => esc_html__('Apus Elements', 'charityheart'),
			    "params" => array(

			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'charityheart'),
						"param_name" => "title",
						"value" => 'Vertical Menu',
						"admin_label"	=> true
					),

			    	array(
						"type" => "dropdown",
						"heading" => esc_html__("Menu", 'charityheart'),
						"param_name" => "menu",
						"value" => $option_menu,
						"description" => esc_html__("Select menu.", 'charityheart')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Position", 'charityheart'),
						"param_name" => "position",
						"value" => array(
								'left'=>'left',
								'right'=>'right'
							),
						'std' => 'left',
						"description" => esc_html__("Postion Menu Vertical.", 'charityheart')
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Style','charityheart'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Styel Default ', 'charityheart') => '', 
							esc_html__('Styel Darken ', 'charityheart') => 'darken', 
						),
						'std' => ''
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'charityheart'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'charityheart')
					)
			   	)
			));
		}
	}
	add_action( 'vc_after_set_mode', 'charityheart_load_load_theme_element', 99 );

	class WPBakeryShortCode_apus_title_heading extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_introduction extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_call_action extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_banner_countdown extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_featurebanner extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_brands extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_boxinfo extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_story extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_socials_link extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_newsletter extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_banner extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_googlemap extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_testimonials extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_timeline extends WPBakeryShortCode {}

	class WPBakeryShortCode_apus_counter extends WPBakeryShortCode {
		public function __construct( $settings ) {
			parent::__construct( $settings );
			$this->load_scripts();
		}

		public function load_scripts() {
			wp_register_script('charityheart-counterup-js', get_template_directory_uri().'/js/jquery.counterup.min.js', array('jquery'), false, true);
		}
	}
	class WPBakeryShortCode_apus_contact extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_ourteam extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_gallery extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_video extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_features_box extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_custom_menu extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_verticalmenu extends WPBakeryShortCode {}
}