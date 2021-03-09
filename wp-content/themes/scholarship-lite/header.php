<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scholarship
 * @subpackage Scholarship Lite
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	do_action( 'scholarship_before_main' );
?>
<div id="page" class="site">
	<?php do_action( 'scholarship_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="logo-content-wrapper clearfix">
			<div class="mt-container">
				<div class="site-branding">
					<?php if ( the_custom_logo() ) { ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div><!-- .site-logo -->
					<?php } ?>
					<?php 
						$site_title_option = get_theme_mod( 'header_textcolor' );
						if( $site_title_option != 'blank' ) {
					?>
						<div class="site-title-wrapper">
							<?php
							if ( is_front_page() || is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						</div><!-- .site-title-wrapper -->
					<?php 
						}
					?>
				</div><!-- .site-branding -->
				<div class="mt-lite-header-wrapper">
					<?php
						$top_header_address = get_theme_mod( 'header_address', '' );
						$top_header_email 	= get_theme_mod( 'header_email', '' );
						$top_header_phone 	= get_theme_mod( 'header_phone', '' );
						echo '<div class="header-elements-holder">';
						if( !empty( $top_header_address ) ) {
							echo '<span class="top-address top-info">'. esc_html( $top_header_address ) .'</span>';
						}
						if( !empty( $top_header_email ) ) {
							echo '<span class="top-email top-info">'. antispambot( $top_header_email ) .'</span>';
						}
						if( !empty( $top_header_phone ) ) {
							echo '<span class="top-phone top-info">'. esc_html( $top_header_phone ) .'</span>';
						}
						echo '</div><!-- .header-elements-holder -->';
					?>
					<div class="menu-search-wrapper">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<div class="menu-toggle hide"> <i class="fa fa-navicon"> </i> </div>
							<?php wp_nav_menu( array( 'theme_location' => 'scholarship_primary_menu', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #site-navigation -->

						<?php 
							if( get_theme_mod( 'menu_search_option', 'show' ) == 'show' ) { ?>
							<div class="header-search-wrapper">
				                <span class="search-main"><i class="fa fa-search"></i></span>
				                <div class="search-form-main clearfix">
									<div class="mt-container">
					                	<?php get_search_form(); ?>
					                </div>
					            </div>
				            </div><!-- .header-search-wrapper -->
			            <?php } ?>
			        </div><!-- .menu-search-wrapper -->
                    <div class="clearfix"> </div>
			    </div><!-- .mt-lite-header-wrapper -->
			</div><!-- .mt-container -->
		</div><!-- .logo-content-wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if( ! is_page_template( 'templates/template-home.php' ) && !is_front_page() ) { ?>
			<header class="entry-header">
	            <div class="mt-container">
	    			<?php
	    				if( is_single() || is_page() ) {
	    					the_title( '<h1 class="entry-title">', '</h1>' );
	    				}elseif( is_home() ) {
	    				   echo '<h1 class="entry-title">'. apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) ) .'</h1>';
	    				} elseif( is_archive() ) {
	    					the_archive_title( '<h1 class="page-title">', '</h1>' );
	    					the_archive_description( '<div class="taxonomy-description">', '</div>' );
	    				} elseif( is_search() ) {
	    			?>
	    					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'scholarship-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	    			<?php
	    				}
	    			?>
	            </div><!-- .mt-container -->
			</header><!-- .entry-header -->
		<?php } ?>
		<?php 
			if( is_front_page() ) {
				/**
				 * scholarship_slider_section hook.
				 *
				 * @hooked scholarship_slider_wrapper_start - 5
				 * @hooked scholarship_slider_content - 10
				 * @hooked scholarship_slider_wrapper_end - 15
				 */
				do_action( 'scholarship_slider_section' );
			}
			if( ! is_page_template( 'templates/template-home.php' ) ) {
            	echo '<div class="mt-container">';
        	}
		?>
