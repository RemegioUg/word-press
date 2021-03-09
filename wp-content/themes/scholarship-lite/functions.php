<?php
/**
 * Describe child theme functions
 *
 * @package Scholarship
 * @subpackage Scholarship Lite
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'scholarship_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scholarship_lite_setup() {
    
    $scholarship_lite_theme_info = wp_get_theme();
    $GLOBALS['scholarship_lite_version'] = $scholarship_lite_theme_info->get( 'Version' );
}
endif;

add_action( 'after_setup_theme', 'scholarship_lite_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Register Google fonts for Scholarship Lite.
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'scholarship_lite_fonts_url' ) ) :
    function scholarship_lite_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Montserrat, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'scholarship-lite' ) ) {
            $font_families[] = 'Montserrat:300,400,400i,500,700';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the theme default color
 */
function scholarship_lite_customize_register( $wp_customize ) {
		global $wp_customize;

		$wp_customize->get_setting( 'scholarship_primary_theme_color' )->default = '#0D88D2';

		$wp_customize->get_setting( 'scholarship_secondary_theme_color' )->default = '#0D88D2';

	}

add_action( 'customize_register', 'scholarship_lite_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * dequeue parent style and scripts
 */
add_action( 'wp_print_styles', 'scholarship_lite_dequeue_styles', 100 );
function scholarship_lite_dequeue_styles() {
    
    wp_dequeue_style( 'scholarship-style' );
    
    wp_dequeue_style( 'scholarship-responsive-style' );
    
}
 
add_action( 'wp_print_scripts', 'scholarship_lite_dequeue_script', 100 ); 
function scholarship_lite_dequeue_script() {
    
    wp_dequeue_script( 'scholarship-sticky-setting' );
}

 
/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'scholarship_lite_scripts', 20 );

function scholarship_lite_scripts() {
    
    global $scholarship_lite_version;
    
    wp_enqueue_script( 'scholarship-lite-custom-script', get_stylesheet_directory_uri(). '/assets/js/lite-custom-scripts.js', array( 'jquery' ), esc_attr( $scholarship_lite_version ) );
    
    $header_sticky_option = get_theme_mod( 'header_sticky_option', 'show' );
    
    wp_localize_script( 'scholarship-lite-custom-script', 'liteObject', array(
        'menu_sticky' => $header_sticky_option
    ) );
    
    wp_enqueue_style( 'scholarship-lite-google-font', scholarship_lite_fonts_url(), array(), null );
    
	wp_enqueue_style( 'scholarship-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $scholarship_lite_version ) );
    
    wp_enqueue_style( 'scholarship-parent-responsive', get_template_directory_uri() . '/assets/css/scholarship-responsive.css', array(), esc_attr( $scholarship_lite_version ) );
    
    wp_enqueue_style( 'scholarship-lite-style', get_stylesheet_uri(), array(), esc_attr( $scholarship_lite_version ) );


    $scholarship_lite_title_option = get_theme_mod( 'scholarship_title_option', true );
    $scholarship_lite_title_color = get_theme_mod( 'scholarship_title_color', '#004b8e' );
    
    $scholarship_lite_primary_theme_color = get_theme_mod( 'scholarship_primary_theme_color', '#0D88D2' );
    $scholarship_lite_secondary_theme_color = get_theme_mod( 'scholarship_secondary_theme_color', '#0D88D2' );
    
    $scholarship_site_title_option = get_theme_mod( 'scholarship_site_title_option', 'true' );        
    $scholarship_site_title_color = get_theme_mod( 'scholarship_site_title_color', '#0D88D2' );
    
    $output_css = '';
    
    $output_css .=" a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover .commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.header-elements-holder .top-info::after,.widget hover,.widget a:hover::before,.widget li:hover::before,.widget .widget-title,.scholarship_grid_layout .post-title a:hover,.scholarship_portfolio .single-post-wrapper .portfolio-title-wrapper .portfolio-link,.team-title-wrapper .post-title a:hover,.latest-posts-wrapper .byline a:hover,.latest-posts-wrapper .posted-on a:hover,.latest-posts-wrapper .news-title a:hover,.entry-title a:hover,.entry-meta span a:hover,.post-readmore a:hover,.grid-archive-layout .entry-title a:hover,.widget a:hover, .widget a:hover::before, .widget li:hover::before,.home.blog .archive-content-wrapper .entry-title a:hover {
                    color:". esc_attr( $scholarship_lite_primary_theme_color ) .";
                }\n";
                
        $output_css .=".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link,.reply .comment-reply-link,#masthead .menu-search-wrapper,#site-navigation ul.sub-menu,#site-navigation ul.children,.header-search-wrapper .search-submit,.mt-slider-btn-wrap .slider-btn:hover,.mt-slider-btn-wrap .slider-btn:first-child,.scholarship-slider-wrapper .lSAction>a:hover,.widget_search .search-submit,.team-wrapper .team-desc-wrapper,.site-info,#mt-scrollup,.scholarship_latest_blog .news-more:hover{
               background:". esc_attr( $scholarship_lite_primary_theme_color ) .";
            }\n";
            
       $output_css .=".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.header-elements-holder .top-info::after,.mt-slider-btn-wrap .slider-btn:hover,.mt-slider-btn-wrap .slider-btn:first-child,.widget_search .search-submit,.cta-btn-wrap a:hover{
              border-color:". esc_attr( $scholarship_lite_primary_theme_color ) .";
           }\n";
            
       $output_css .=".comment-list .comment-body,#masthead .menu-search-wrapper::before,#masthead .menu-search-wrapper::after{
              border-top-color:". esc_attr( $scholarship_lite_primary_theme_color ) .";
            }\n";
            
        $output_css .="#masthead,.site-info:before,.site-info:after,.site-info-wrapper {
              border-bottom-color:". esc_attr( $scholarship_lite_primary_theme_color ) .";
            }\n";
           
        $output_css .="#site-navigation ul li.current-menu-item > a,#site-navigation ul li.current-menu-ancestor>a,#site-navigation ul li:hover>a,#site-navigation ul li.current_page_ancestor > a,.header-search-wrapper .search-submit:hover,.mt-slider-btn-wrap .slider-btn,.mt-slider-btn-wrap .slider-btn:first-child:hover,.widget .scholarship-widget-wrapper .widget-title::before,.widget .scholarship-widget-wrapper .widget-title::after,.cta-btn-wrap a,.scholarship_portfolio .single-post-wrapper .portfolio-title-wrapper .portfolio-link:hover,.scholarship_latest_blog .news-more,#mt-scrollup:hover{
               background:". esc_attr( $scholarship_lite_secondary_theme_color ) .";
            }\n";

        $output_css .=".scholarship_call_to_action .section-wrapper::before,.scholarship_portfolio .single-post-wrapper .portfolio-title-wrapper,.scholarship_testimonials .section-wrapper::before{
                background:". esc_attr( scholarship_get_hex2rgba( $scholarship_lite_primary_theme_color, '0.9' ) ) ."
            }\n"; 
        
        $output_css .=".header-search-wrapper .search-main:hover,.site-info a:hover{
               color:". esc_attr( $scholarship_lite_secondary_theme_color ) .";
            }\n";
            
        $output_css .=".header-search-wrapper .search-submit:hover{
               border-color:". esc_attr( $scholarship_lite_secondary_theme_color ) .";
            }\n";
            
        $output_css .=".widget .widget-title{
               border-left-color:". esc_attr( $scholarship_lite_secondary_theme_color ) .";
            }\n";
            
        $output_css .=" @media (max-width: 767px) { #primary-menu {
                background:". esc_attr( $scholarship_lite_primary_theme_color ) .";
            }}\n";
            
        $output_css .=" @media (max-width: 767px) { .sub-toggle,#site-navigation ul > li:hover > .sub-toggle, #site-navigation ul > li.current-menu-item .sub-toggle, #site-navigation ul > li.current-menu-ancestor .sub-toggle{
                background:". esc_attr( $scholarship_lite_secondary_theme_color ) .";
            }}\n";
            
            
       

        if ( $scholarship_lite_title_option == true ) {
            $output_css .=".site-title a, .site-description {
                        color:". esc_attr( $scholarship_lite_title_color ) .";
                    }\n";
        } else {
            $output_css .=".site-title, .site-description {
                        position: absolute;
                        clip: rect(1px, 1px, 1px, 1px);
                    }\n";
        }
        
    $refine_output_css = scholarship_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'scholarship-lite-style', $refine_output_css );
    
}
