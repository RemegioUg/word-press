<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Charityheart_Redux_Framework_Config')) {

    class Charityheart_Redux_Framework_Config
    {
        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct()
        {
            if (!class_exists('ReduxFramework')) {
                return;
            }
            add_action('init', array($this, 'initSettings'), 10);
        }

        public function initSettings()
        {
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections()
        {
            global $wp_registered_sidebars;
            $sidebars = array();

            if ( !empty($wp_registered_sidebars) ) {
                foreach ($wp_registered_sidebars as $sidebar) {
                    $sidebars[$sidebar['id']] = $sidebar['name'];
                }
            }
            $columns = array( '1' => esc_html__('1 Column', 'charityheart'),
                '2' => esc_html__('2 Columns', 'charityheart'),
                '3' => esc_html__('3 Columns', 'charityheart'),
                '4' => esc_html__('4 Columns', 'charityheart'),
                '6' => esc_html__('6 Columns', 'charityheart')
            );
            
            $general_fields = array();
            if ( !function_exists( 'wp_site_icon' ) ) {
                $general_fields[] = array(
                    'id' => 'media-favicon',
                    'type' => 'media',
                    'title' => esc_html__('Favicon Upload', 'charityheart'),
                    'desc' => esc_html__('', 'charityheart'),
                    'subtitle' => esc_html__('Upload a 16px x 16px .png or .gif image that will be your favicon.', 'charityheart'),
                );
            }
            $general_fields[] = array(
                'id' => 'preload',
                'type' => 'switch',
                'title' => esc_html__('Preload Website', 'charityheart'),
                'default' => true,
            );
            $general_fields[] = array(
                'id' => 'image_lazy_loading',
                'type' => 'switch',
                'title' => esc_html__('Image Lazy Loading', 'charityheart'),
                'default' => true,
            );
            $general_fields[] = array(
                'id' => 'google_map_api_key',
                'type' => 'text',
                'title' => esc_html__('Google Maps API Key', 'charityheart'),
                'default' => '',
            );
            // General Settings Tab
            $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => esc_html__('General', 'charityheart'),
                'fields' => $general_fields
            );
            // Header
            $this->sections[] = array(
                'icon' => 'el el-website',
                'title' => esc_html__('Header', 'charityheart'),
                'fields' => array(
                    array(
                        'id' => 'media-logo',
                        'type' => 'media',
                        'title' => esc_html__('Logo Upload', 'charityheart'),
                        'subtitle' => esc_html__('Upload a .png or .gif image that will be your logo.', 'charityheart'),
                    ),
                    array(
                        'id' => 'media-mobile-logo',
                        'type' => 'media',
                        'title' => esc_html__('Mobile Logo Upload', 'charityheart'),
                        'subtitle' => esc_html__('Upload a .png or .gif image that will be your logo.', 'charityheart'),
                    ),
                    array(
                        'id' => 'header_type',
                        'type' => 'select',
                        'title' => esc_html__('Header Layout Type', 'charityheart'),
                        'subtitle' => esc_html__('Choose a header for your website.', 'charityheart'),
                        'options' => charityheart_get_header_layouts()
                    ),
                    array(
                        'id' => 'keep_header',
                        'type' => 'switch',
                        'title' => esc_html__('Keep Header', 'charityheart'),
                        'default' => false
                    ),
                    array(
                        'id'=>'show_searchform',
                        'type' => 'switch',
                        'title' => esc_html__('Show Search Form', 'charityheart'),
                        'default' => true,
                        'on' => esc_html__('Yes', 'charityheart'),
                        'off' => esc_html__('No', 'charityheart'),
                    ),
                    array(
                        'id'=>'show_donation_button',
                        'type' => 'switch',
                        'title' => esc_html__('Show Donation Button', 'charityheart'),
                        'default' => true,
                        'on' => esc_html__('Yes', 'charityheart'),
                        'off' => esc_html__('No', 'charityheart'),
                    ),
                    array(
                        'id' => 'top_contact_info_v1',
                        'type' => 'editor',
                        'title' => esc_html__('Top Contact Information', 'charityheart'),
                        'required' => array('header_type', '=', 'v1')
                    ),
                    array(
                        'id' => 'top_contact_info_v2',
                        'type' => 'editor',
                        'title' => esc_html__('Top Contact Information', 'charityheart'),
                        'required' => array('header_type', '=', 'v2')
                    ),
                    array(
                        'id' => 'top_contact_info_v3',
                        'type' => 'editor',
                        'title' => esc_html__('Top Contact Information', 'charityheart'),
                        'required' => array('header_type', '=', 'v3')
                    ),
                    array(
                        'id' => 'top_contact_info_v4',
                        'type' => 'editor',
                        'title' => esc_html__('Top Contact Information', 'charityheart'),
                        'required' => array('header_type', '=', 'v4')
                    ),
                )
            );
            // Footer
            $this->sections[] = array(
                'icon' => 'el el-website',
                'title' => esc_html__('Footer', 'charityheart'),
                'fields' => array(
                    array(
                        'id' => 'footer_type',
                        'type' => 'select',
                        'title' => esc_html__('Footer Layout Type', 'charityheart'),
                        'subtitle' => esc_html__('Choose a footer for your website.', 'charityheart'),
                        'options' => charityheart_get_footer_layouts()
                    ),
                    array(
                        'id' => 'copyright_text',
                        'type' => 'editor',
                        'title' => esc_html__('Copyright Text', 'charityheart'),
                        'default' => 'Powered by Redux Framework.',
                        'required' => array('footer_type','=','')
                    ),
                    array(
                        'id' => 'back_to_top',
                        'type' => 'switch',
                        'title' => esc_html__('Back To Top Button', 'charityheart'),
                        'subtitle' => esc_html__('Toggle whether or not to enable a back to top button on your pages.', 'charityheart'),
                        'default' => true,
                    ),
                )
            );

            // Blog settings
            $this->sections[] = array(
                'icon' => 'el el-pencil',
                'title' => esc_html__('Blog', 'charityheart'),
                'fields' => array(
                    array(
                        'id' => 'show_blog_breadcrumbs',
                        'type' => 'switch',
                        'title' => esc_html__('Breadcrumbs', 'charityheart'),
                        'default' => 1
                    ),
                    array (
                        'title' => esc_html__('Breadcrumbs Background Color', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'charityheart').'</em>',
                        'id' => 'blog_breadcrumb_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'id' => 'blog_breadcrumb_image',
                        'type' => 'media',
                        'title' => esc_html__('Breadcrumbs Background', 'charityheart'),
                        'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'charityheart'),
                    ),
                )
            );
            // Archive Blogs settings
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Blog & Post Archives', 'charityheart'),
                'fields' => array(
                    array(
                        'id' => 'blog_archive_layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => esc_html__('Layout', 'charityheart'),
                        'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'charityheart'),
                        'options' => array(
                            'main' => array(
                                'title' => 'Main Only',
                                'alt' => 'Main Only',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                            ),
                            'left-main' => array(
                                'title' => 'Left - Main Sidebar',
                                'alt' => 'Left - Main Sidebar',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                            ),
                            'main-right' => array(
                                'title' => 'Main - Right Sidebar',
                                'alt' => 'Main - Right Sidebar',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                            ),
                            'left-main-right' => array(
                                'title' => 'Left - Main - Right Sidebar',
                                'alt' => 'Left - Main - Right Sidebar',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                            ),
                        ),
                        'default' => 'left-main'
                    ),
                    array(
                        'id' => 'blog_archive_fullwidth',
                        'type' => 'switch',
                        'title' => esc_html__('Is Full Width?', 'charityheart'),
                        'default' => false
                    ),
                    array(
                        'id' => 'blog_archive_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Left Sidebar', 'charityheart'),
                        'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                        'options' => $sidebars
                    ),
                    array(
                        'id' => 'blog_archive_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Right Sidebar', 'charityheart'),
                        'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                        'options' => $sidebars
                        
                    ),
                    array(
                        'id' => 'blog_display_mode',
                        'type' => 'select',
                        'title' => esc_html__('Display Mode', 'charityheart'),
                        'options' => array(
                            'grid' => esc_html__('Grid Layout', 'charityheart'),
                            'mansory' => esc_html__('Mansory Layout', 'charityheart'),
                            'list' => esc_html__('List Layout', 'charityheart')
                        ),
                        'default' => 'grid'
                    ),
                    array(
                        'id' => 'blog_columns',
                        'type' => 'select',
                        'title' => esc_html__('Blog Columns', 'charityheart'),
                        'options' => $columns,
                        'default' => 1
                    ),
                    array(
                        'id' => 'blog_item_thumbsize',
                        'type' => 'text',
                        'title' => esc_html__('Thumbnail Size', 'charityheart'),
                        'subtitle' => esc_html__('This featured for the site is using Visual Composer.', 'charityheart'),
                        'desc' => esc_html__('Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) .', 'charityheart'),
                    ),

                )
            );
            // Single Blogs settings
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Blog', 'charityheart'),
                'fields' => array(
                    
                    array(
                        'id' => 'blog_single_layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => esc_html__('Archive Blog Layout', 'charityheart'),
                        'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'charityheart'),
                        'options' => array(
                            'main' => array(
                                'title' => 'Main Only',
                                'alt' => 'Main Only',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                            ),
                            'left-main' => array(
                                'title' => 'Left - Main Sidebar',
                                'alt' => 'Left - Main Sidebar',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                            ),
                            'main-right' => array(
                                'title' => 'Main - Right Sidebar',
                                'alt' => 'Main - Right Sidebar',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                            ),
                            'left-main-right' => array(
                                'title' => 'Left - Main - Right Sidebar',
                                'alt' => 'Left - Main - Right Sidebar',
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                            ),
                        ),
                        'default' => 'left-main'
                    ),
                    array(
                        'id' => 'blog_single_fullwidth',
                        'type' => 'switch',
                        'title' => esc_html__('Is Full Width?', 'charityheart'),
                        'default' => false
                    ),
                    array(
                        'id' => 'blog_single_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Single Blog Left Sidebar', 'charityheart'),
                        'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                        'options' => $sidebars
                    ),
                    array(
                        'id' => 'blog_single_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Single Blog Right Sidebar', 'charityheart'),
                        'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                        'options' => $sidebars
                    ),
                    array(
                        'id' => 'show_blog_social_share',
                        'type' => 'switch',
                        'title' => esc_html__('Show Social Share', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'show_blog_releated',
                        'type' => 'switch',
                        'title' => esc_html__('Show Releated Posts', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'number_blog_releated',
                        'type' => 'text',
                        'title' => esc_html__('Number of related posts to show', 'charityheart'),
                        'required' => array('show_blog_releated', '=', '1'),
                        'default' => 3,
                        'min' => '1',
                        'step' => '1',
                        'max' => '20',
                        'type' => 'slider'
                    ),
                    array(
                        'id' => 'releated_blog_columns',
                        'type' => 'select',
                        'title' => esc_html__('Releated Blogs Columns', 'charityheart'),
                        'required' => array('show_blog_releated', '=', '1'),
                        'options' => $columns,
                        'default' => 3
                    ),

                )
            );
            
            // Donations settings
            if( in_array( 'give/give.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $this->sections[] = array(
                    'icon' => 'el el-pencil',
                    'title' => esc_html__('Donation', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'show_donation_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'charityheart'),
                            'default' => 1
                        ),
                        array (
                            'title' => esc_html__('Breadcrumbs Background Color', 'charityheart'),
                            'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'charityheart').'</em>',
                            'id' => 'donation_breadcrumb_color',
                            'type' => 'color',
                            'transparent' => false,
                        ),
                        array(
                            'id' => 'donation_breadcrumb_image',
                            'type' => 'media',
                            'title' => esc_html__('Breadcrumbs Background', 'charityheart'),
                            'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'charityheart'),
                        ),
                    )
                );
                // Archive Donations settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Donation & Post Archives', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'donation_archive_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Only',
                                    'alt' => 'Main Only',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left - Main Sidebar',
                                    'alt' => 'Left - Main Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main - Right Sidebar',
                                    'alt' => 'Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left - Main - Right Sidebar',
                                    'alt' => 'Left - Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'donation_archive_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'donation_archive_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'donation_archive_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                            
                        ),
                        array(
                            'id' => 'donation_display_mode',
                            'type' => 'select',
                            'title' => esc_html__('Display Mode', 'charityheart'),
                            'options' => array(
                                'grid' => esc_html__('Grid Layout', 'charityheart'),
                                'list' => esc_html__('List Layout', 'charityheart'),
                            ),
                            'default' => 'grid'
                        ),
                        array(
                            'id' => 'donation_columns',
                            'type' => 'select',
                            'title' => esc_html__('Grid Donation Columns', 'charityheart'),
                            'options' => $columns,
                            'default' => 4,
                            'required' => array('donation_display_mode', '=', 'grid'),
                        ),
                        array(
                            'id' => 'donation_item_style',
                            'type' => 'select',
                            'title' => esc_html__('Grid Donation Item Style', 'charityheart'),
                            'options' => array(
                                'grid' => esc_html__('Grid', 'charityheart'),
                                'grid-v1' => esc_html__('Grid 1', 'charityheart'),
                                'grid-v2' => esc_html__('Grid 2', 'charityheart'),
                            ),
                            'default' => 'grid',
                            'required' => array('donation_display_mode', '=', 'grid'),
                        ),
                        array(
                            'id' => 'donation_item_list_style',
                            'type' => 'select',
                            'title' => esc_html__('List Donation Item Style', 'charityheart'),
                            'options' => array(
                                'list' => esc_html__('List', 'charityheart'),
                                'list-v2' => esc_html__('List 2', 'charityheart'),
                            ),
                            'default' => 'list',
                            'required' => array('donation_display_mode', '=', 'list'),
                        ),
                        array(
                            'id' => 'show_donation_categories_top',
                            'type' => 'switch',
                            'title' => esc_html__('Show Category in top', 'charityheart'),
                            'default' => 1
                        )
                    )
                );
                // Single Donations settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Donation', 'charityheart'),
                    'fields' => array(
                        
                        array(
                            'id' => 'donation_single_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Archive Donation Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Only',
                                    'alt' => 'Main Only',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left - Main Sidebar',
                                    'alt' => 'Left - Main Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main - Right Sidebar',
                                    'alt' => 'Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left - Main - Right Sidebar',
                                    'alt' => 'Left - Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'donation_single_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'donation_single_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Donation Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'donation_single_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Donation Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'show_donation_social_share',
                            'type' => 'switch',
                            'title' => esc_html__('Show Social Share', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_donation_releated',
                            'type' => 'switch',
                            'title' => esc_html__('Show Releated Posts', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'number_donation_releated',
                            'type' => 'text',
                            'title' => esc_html__('Number of related posts to show', 'charityheart'),
                            'required' => array('show_donation_releated', '=', '1'),
                            'default' => 4,
                            'min' => '1',
                            'step' => '1',
                            'max' => '20',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'releated_donation_columns',
                            'type' => 'select',
                            'title' => esc_html__('Releated Donations Columns', 'charityheart'),
                            'required' => array('show_donation_releated', '=', '1'),
                            'options' => $columns,
                            'default' => 4
                        ),
                    )
                );
            }
            // Volunteer settings
            if( in_array( 'apus-charityheart/apus-charityheart.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $this->sections[] = array(
                    'icon' => 'el el-pencil',
                    'title' => esc_html__('Volunteer', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'show_volunteer_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'charityheart'),
                            'default' => 1
                        ),
                        array (
                            'title' => esc_html__('Breadcrumbs Background Color', 'charityheart'),
                            'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'charityheart').'</em>',
                            'id' => 'volunteer_breadcrumb_color',
                            'type' => 'color',
                            'transparent' => false,
                        ),
                        array(
                            'id' => 'volunteer_breadcrumb_image',
                            'type' => 'media',
                            'title' => esc_html__('Breadcrumbs Background', 'charityheart'),
                            'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'charityheart'),
                        ),
                    )
                );
                // Archive Volunteers settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Volunteer & Post Archives', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'volunteer_archive_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Only',
                                    'alt' => 'Main Only',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left - Main Sidebar',
                                    'alt' => 'Left - Main Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main - Right Sidebar',
                                    'alt' => 'Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left - Main - Right Sidebar',
                                    'alt' => 'Left - Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'volunteer_archive_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'volunteer_archive_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'volunteer_archive_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'volunteer_columns',
                            'type' => 'select',
                            'title' => esc_html__('Grid Volunteer Columns', 'charityheart'),
                            'options' => $columns,
                            'default' => 4
                        ),
                    )
                );
                // Single Volunteers settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Volunteer', 'charityheart'),
                    'fields' => array(
                        
                        array(
                            'id' => 'volunteer_single_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Archive Volunteer Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Only',
                                    'alt' => 'Main Only',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left - Main Sidebar',
                                    'alt' => 'Left - Main Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main - Right Sidebar',
                                    'alt' => 'Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left - Main - Right Sidebar',
                                    'alt' => 'Left - Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'volunteer_single_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'volunteer_single_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Volunteer Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'volunteer_single_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Volunteer Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'show_volunteer_other',
                            'type' => 'switch',
                            'title' => esc_html__('Show Other Volunteer', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'number_volunteer_other',
                            'type' => 'text',
                            'title' => esc_html__('Number Other Volunteers to show', 'charityheart'),
                            'required' => array('show_volunteer_other', '=', '1'),
                            'default' => 4,
                            'min' => '1',
                            'step' => '1',
                            'max' => '20',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'other_volunteer_columns',
                            'type' => 'select',
                            'title' => esc_html__('Other Volunteers Columns', 'charityheart'),
                            'required' => array('show_volunteer_other', '=', '1'),
                            'options' => $columns,
                            'default' => 4
                        ),
                    )
                );
            }
            // Woocommerce
            if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $this->sections[] = array(
                    'icon' => 'el el-shopping-cart',
                    'title' => esc_html__('Woocommerce', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'show_product_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'charityheart'),
                            'default' => 1
                        ),
                        array (
                            'title' => esc_html__('Breadcrumbs Background Color', 'charityheart'),
                            'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'charityheart').'</em>',
                            'id' => 'woo_breadcrumb_color',
                            'type' => 'color',
                            'transparent' => false,
                        ),
                        array(
                            'id' => 'woo_breadcrumb_image',
                            'type' => 'media',
                            'title' => esc_html__('Breadcrumbs Background', 'charityheart'),
                            'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'charityheart'),
                        )
                    )
                );
                // Archive settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Product Archives', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'product_archive_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Archive Product Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the layout you want to apply on your archive product page.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Content',
                                    'alt' => 'Main Content',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left Sidebar - Main Content',
                                    'alt' => 'Left Sidebar - Main Content',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main Content - Right Sidebar',
                                    'alt' => 'Main Content - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left Sidebar - Main Content - Right Sidebar',
                                    'alt' => 'Left Sidebar - Main Content - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'product_archive_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'product_archive_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'product_archive_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'product_display_mode',
                            'type' => 'select',
                            'title' => esc_html__('Display Mode', 'charityheart'),
                            'subtitle' => esc_html__('Choose a default layout archive product.', 'charityheart'),
                            'options' => array('grid' => esc_html__('Grid', 'charityheart'), 'list' => esc_html__('List', 'charityheart')),
                            'default' => 'grid'
                        ),
                        array(
                            'id' => 'number_products_per_page',
                            'type' => 'text',
                            'title' => esc_html__('Number of Products Per Page', 'charityheart'),
                            'default' => 12,
                            'min' => '1',
                            'step' => '1',
                            'max' => '100',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'product_columns',
                            'type' => 'select',
                            'title' => esc_html__('Product Columns', 'charityheart'),
                            'options' => $columns,
                            'default' => 4
                        ),
                        array(
                            'id' => 'show_quickview',
                            'type' => 'switch',
                            'title' => esc_html__('Show Quick View', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_swap_image',
                            'type' => 'switch',
                            'title' => esc_html__('Show Second Image (Hover)', 'charityheart'),
                            'default' => 1
                        ),
                    )
                );
                // Product Page
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Single Product', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'product_single_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Single Product Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Only',
                                    'alt' => 'Main Only',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left - Main Sidebar',
                                    'alt' => 'Left - Main Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main - Right Sidebar',
                                    'alt' => 'Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left - Main - Right Sidebar',
                                    'alt' => 'Left - Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'product_single_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'product_single_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Product Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'product_single_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Product Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'show_product_social_share',
                            'type' => 'switch',
                            'title' => esc_html__('Show Social Share', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_review_tab',
                            'type' => 'switch',
                            'title' => esc_html__('Show Product Review Tab', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_releated',
                            'type' => 'switch',
                            'title' => esc_html__('Show Products Releated', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_upsells',
                            'type' => 'switch',
                            'title' => esc_html__('Show Products upsells', 'charityheart'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'number_product_releated',
                            'title' => esc_html__('Number of related/upsells products to show', 'charityheart'),
                            'default' => 3,
                            'min' => '1',
                            'step' => '1',
                            'max' => '20',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'releated_product_columns',
                            'type' => 'select',
                            'title' => esc_html__('Releated Products Columns', 'charityheart'),
                            'options' => $columns,
                            'default' => 3
                        ),

                    )
                );
            }
            // Event
            if( in_array( 'apus-simple-event/apus-simple-event.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $this->sections[] = array(
                    'icon' => 'el el-shopping-cart',
                    'title' => esc_html__('Event', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'show_event_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'charityheart'),
                            'default' => 1
                        ),
                        array (
                            'title' => esc_html__('Breadcrumbs Background Color', 'charityheart'),
                            'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'charityheart').'</em>',
                            'id' => 'event_breadcrumb_color',
                            'type' => 'color',
                            'transparent' => false,
                        ),
                        array(
                            'id' => 'event_breadcrumb_image',
                            'type' => 'media',
                            'title' => esc_html__('Breadcrumbs Background', 'charityheart'),
                            'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'charityheart'),
                        ),
                    )
                );
                // Archive settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Event Archives', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'event_archive_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Archive Product Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the layout you want to apply on your archive event page.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Content',
                                    'alt' => 'Main Content',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left Sidebar - Main Content',
                                    'alt' => 'Left Sidebar - Main Content',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main Content - Right Sidebar',
                                    'alt' => 'Main Content - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left Sidebar - Main Content - Right Sidebar',
                                    'alt' => 'Left Sidebar - Main Content - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'event_archive_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'event_archive_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'event_archive_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'number_events_per_page',
                            'type' => 'text',
                            'title' => esc_html__('Number of Events Per Page', 'charityheart'),
                            'default' => 12,
                            'min' => '1',
                            'step' => '1',
                            'max' => '100',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'event_columns',
                            'type' => 'select',
                            'title' => esc_html__('Event Columns', 'charityheart'),
                            'options' => $columns,
                            'default' => 4
                        ),
                        array(
                            'id' => 'show_event_categories_top',
                            'type' => 'switch',
                            'title' => esc_html__('Show Category in top', 'charityheart'),
                            'default' => 1
                        )
                    )
                );
                // Event Single Page
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Single Event', 'charityheart'),
                    'fields' => array(
                        array(
                            'id' => 'event_single_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Single Product Layout', 'charityheart'),
                            'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'charityheart'),
                            'options' => array(
                                'main' => array(
                                    'title' => 'Main Only',
                                    'alt' => 'Main Only',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => 'Left - Main Sidebar',
                                    'alt' => 'Left - Main Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => 'Main - Right Sidebar',
                                    'alt' => 'Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                                'left-main-right' => array(
                                    'title' => 'Left - Main - Right Sidebar',
                                    'alt' => 'Left - Main - Right Sidebar',
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen4.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'event_single_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'charityheart'),
                            'default' => false
                        ),
                        array(
                            'id' => 'event_single_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Event Left Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'event_single_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Event Right Sidebar', 'charityheart'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'charityheart'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'show_event_social_share',
                            'type' => 'switch',
                            'title' => esc_html__('Show Social Share', 'charityheart'),
                            'default' => 1
                        )
                    )
                );
            }
            // Event Single Page
            $this->sections[] = array(
                'title' => esc_html__('404 Page', 'charityheart'),
                'fields' => array(
                    array(
                        'id' => '404_title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'charityheart'),
                        'default' => '404'
                    ),
                    array(
                        'id' => '404_subtitle',
                        'type' => 'text',
                        'title' => esc_html__('SubTitle', 'charityheart'),
                        'default' => 'Opps! Page Not Be Found'
                    ),
                    array(
                        'id' => '404_description',
                        'type' => 'editor',
                        'title' => esc_html__('Description', 'charityheart'),
                        'default' => 'Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.'
                    )
                )
            );
            // Style
            $this->sections[] = array(
                'icon' => 'el el-icon-css',
                'title' => esc_html__('Style', 'charityheart'),
                'fields' => array(
                    array (
                        'title' => esc_html__('Main Theme Color', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('The main color of the site.', 'charityheart').'</em>',
                        'id' => 'main_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array (
                        'title' => esc_html__('Button Theme Color', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Button color of the site.', 'charityheart').'</em>',
                        'id' => 'button_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array (
                        'title' => esc_html__('Button Hover Theme Color', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Button Hover color of the site.', 'charityheart').'</em>',
                        'id' => 'button_hover_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Typography', 'charityheart'),
                'fields' => array(
                    array(
                        'title'    => esc_html__('Font Source', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Choose the Font Source', 'charityheart').'</em>',
                        'id'       => 'font_source',
                        'type'     => 'radio',
                        'options'  => array(
                            '1' => 'Standard + Google Webfonts',
                            '2' => 'Google Custom'
                        ),
                        'default' => '1'
                    ),
                    array(
                        'id'=>'font_google_code',
                        'type' => 'text',
                        'title' => esc_html__('Google Code', 'charityheart'), 
                        'subtitle' => '<em>'.esc_html__('Paste the provided Google Code', 'charityheart').'</em>',
                        'default' => 'https://fonts.googleapis.com/css?family=Yantramanav|Poppins:400,700',
                        'required' => array('font_source','=','2')
                    ),
                    array (
                        'id' => 'main_font_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;"> '.esc_html__('Main Font', 'charityheart').'</h3>',
                    ),
                    // Standard + Google Webfonts
                    array (
                        'title' => esc_html__('Font Face', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Pick the Main Font for your site.', 'charityheart').'</em>',
                        'id' => 'main_font',
                        'type' => 'typography',
                        'line-height' => false,
                        'text-align' => false,
                        'font-style' => false,
                        'font-weight' => false,
                        'all_styles'=> true,
                        'font-size' => false,
                        'color' => false,
                        'required' => array('font_source','=','1')
                    ),
                    
                    // Google Custom                        
                    array (
                        'title' => esc_html__('Google Font Face', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Enter your Google Font Name for the theme\'s Main Typography', 'charityheart').'</em>',
                        'desc' => esc_html__('e.g.: open sans', 'charityheart'),
                        'id' => 'main_google_font_face',
                        'type' => 'text',
                        'default' => 'Poppins',
                        'required' => array('font_source','=','2')
                    ),

                    array (
                        'id' => 'secondary_font_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;"> '.esc_html__(' Secondary Font', 'charityheart').'</h3>',
                    ),
                    
                    // Standard + Google Webfonts
                    array (
                        'title' => esc_html__('Font Face', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Pick the Secondary Font for your site.', 'charityheart').'</em>',
                        'id' => 'secondary_font',
                        'type' => 'typography',
                        'line-height' => false,
                        'text-align' => false,
                        'font-style' => false,
                        'font-weight' => false,
                        'all_styles'=> true,
                        'font-size' => false,
                        'color' => false,
                        'required' => array('font_source','=','1')
                    ),
                    
                    // Google Custom                        
                    array (
                        'title' => esc_html__('Google Font Face', 'charityheart'),
                        'subtitle' => '<em>'.esc_html__('Enter your Google Font Name for the theme\'s Secondary Typography', 'charityheart').'</em>',
                        'desc' => esc_html__('e.g.: open sans', 'charityheart'),
                        'id' => 'secondary_google_font_face',
                        'type' => 'text',
                        'required' => array('font_source','=','2')
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Top Bar', 'charityheart'),
                'fields' => array(
                    array(
                        'id'=>'topbar_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'charityheart'),
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'charityheart'),
                        'id' => 'topbar_text_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'charityheart'),
                        'id' => 'topbar_link_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Header', 'charityheart'),
                'fields' => array(
                    array(
                        'id'=>'header_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'charityheart'),
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'charityheart'),
                        'id' => 'header_text_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'charityheart'),
                        'id' => 'header_link_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color Active', 'charityheart'),
                        'id' => 'header_link_color_active',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Main Menu', 'charityheart'),
                'fields' => array(
                    array(
                        'title' => esc_html__('Link Color', 'charityheart'),
                        'id' => 'main_menu_link_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color Active', 'charityheart'),
                        'id' => 'main_menu_link_color_active',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Footer', 'charityheart'),
                'fields' => array(
                    array(
                        'id'=>'footer_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'charityheart'),
                    ),
                    array(
                        'title' => esc_html__('Heading Color', 'charityheart'),
                        'id' => 'footer_heading_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'charityheart'),
                        'id' => 'footer_text_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'charityheart'),
                        'id' => 'footer_link_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color Hover', 'charityheart'),
                        'id' => 'footer_link_color_hover',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );
            
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Copyright', 'charityheart'),
                'fields' => array(
                    array(
                        'id'=>'copyright_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'charityheart'),
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'charityheart'),
                        'id' => 'copyright_text_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'charityheart'),
                        'id' => 'copyright_link_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'title' => esc_html__('Link Color Hover', 'charityheart'),
                        'id' => 'copyright_link_color_hover',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );

            // Social Media
            $this->sections[] = array(
                'icon' => 'el el-file',
                'title' => esc_html__('Social Media', 'charityheart'),
                'fields' => array(
                    array(
                        'id' => 'facebook_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Facebook Share', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'twitter_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable twitter Share', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'linkedin_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable linkedin Share', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'tumblr_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable tumblr Share', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'google_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable google plus Share', 'charityheart'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'pinterest_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable pinterest Share', 'charityheart'),
                        'default' => 1
                    )
                )
            );
            // Custom Code
            $this->sections[] = array(
                'icon' => 'el-icon-css',
                'title' => esc_html__('Custom CSS/JS', 'charityheart'),
                'fields' => array(
                    array (
                        'title' => esc_html__('Custom CSS', 'charityheart'),
                        'subtitle' => esc_html__('Paste your custom CSS code here.', 'charityheart'),
                        'id' => 'custom_css',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                    ),
                    
                    array (
                        'title' => esc_html__('Header JavaScript Code', 'charityheart'),
                        'subtitle' => esc_html__('Paste your custom JS code here. The code will be added to the header of your site.', 'charityheart'),
                        'id' => 'header_js',
                        'type' => 'ace_editor',
                        'mode' => 'javascript',
                    ),
                    
                    array (
                        'title' => esc_html__('Footer JavaScript Code', 'charityheart'),
                        'subtitle' => esc_html__('Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.', 'charityheart'),
                        'id' => 'footer_js',
                        'type' => 'ace_editor',
                        'mode' => 'javascript',
                    ),
                )
            );
            $this->sections[] = array(
                'title' => esc_html__('Import / Export', 'charityheart'),
                'desc' => esc_html__('Import and Export your Redux Framework settings from file, text or URL.', 'charityheart'),
                'icon' => 'el-icon-refresh',
                'fields' => array(
                    array(
                        'id' => 'opt-import-export',
                        'type' => 'import_export',
                        'title' => 'Import Export',
                        'subtitle' => 'Save and restore your Redux options',
                        'full_width' => false,
                    ),
                ),
            );

            $this->sections[] = array(
                'type' => 'divide',
            );


        }
        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments()
        {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.
            
            $preset = charityheart_get_demo_preset();
            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'charityheart_theme_options'.$preset,
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'),
                // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'),
                // Version that appears at the top of your panel
                'menu_type' => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true,
                // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Themes Options', 'charityheart'),
                'page_title' => esc_html__('Themes Options', 'charityheart'),

                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography' => true,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar' => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon' => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable' => 'apus_options',
                // Set a different name for your global variable other than the opt_name
                'dev_mode' => false,
                // Show the time the page took to load, etc
                'update_notice' => true,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer' => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority' => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon' => '',
                // Specify a custom URL to an icon
                'last_tab' => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options',
                // Page slug used to denote the panel
                'save_defaults' => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show' => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info' => false,
                // REMOVE
                'use_cdn' => true,
                // HINTS
                'hints' => array(
                    'icon' => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color' => 'lightgray',
                    'icon_size' => 'normal',
                    'tip_style' => array(
                        'color' => 'light',
                        'shadow' => true,
                        'rounded' => false,
                        'style' => '',
                    ),
                    'tip_position' => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect' => array(
                        'show' => array(
                            'effect' => 'slide',
                            'duration' => '500',
                            'event' => 'mouseover',
                        ),
                        'hide' => array(
                            'effect' => 'slide',
                            'duration' => '500',
                            'event' => 'click mouseleave',
                        ),
                    ),
                )
            );

            $this->args['intro_text'] = '';

            // Add content after the form.
            $this->args['footer_text'] = '';
            return $this->args;
        }

    }

    global $reduxConfig;
    $reduxConfig = new Charityheart_Redux_Framework_Config();
}