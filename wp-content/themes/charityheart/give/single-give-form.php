<?php

get_header();

$sidebar_configs = charityheart_get_donation_layout_configs();

charityheart_render_breadcrumbs();
?>

<section class="single-give">
<section id="main-container" class="main-content <?php echo apply_filters( 'charityheart_donation_content_class', 'container' ); ?> inner">
	<div class="row">
		<?php if ( isset($sidebar_configs['left']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['left']['class']) ;?>">
			  	<aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			   		<?php if ( is_active_sidebar( $sidebar_configs['left']['sidebar'] ) ): ?>
				   		<?php dynamic_sidebar( $sidebar_configs['left']['sidebar'] ); ?>
				   	<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>
		<div id="main-content" class="col-xs-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<div id="primary" class="content-area">
				<div id="content" class="site-content single-post" role="main">
					<?php
						do_action( 'give_before_main_content' );
						while ( have_posts() ) : the_post();
							give_get_template_part( 'single-give-form/content', 'single-give-form' );
						endwhile; // end of the loop.

						/**
						 * Fires in single form template, after the main content.
						 *
						 * Allows you to add elements after the main content.
						 *
						 * @since 1.0
						 */
						do_action( 'give_after_main_content' );
					?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>	
		<?php if ( isset($sidebar_configs['right']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['right']['class']) ;?>">
			  	<aside class="sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			   		<?php if ( is_active_sidebar( $sidebar_configs['right']['sidebar'] ) ): ?>
				   		<?php dynamic_sidebar( $sidebar_configs['right']['sidebar'] ); ?>
				   	<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>
	</div>	
</section>
</section>
<?php get_footer(); ?>