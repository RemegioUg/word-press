<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$sidebar_configs = charityheart_get_volunteer_layout_configs();

get_header();
$columns = charityheart_get_config('volunteer_columns', 1);
$bcols = floor( 12 / $columns );

charityheart_render_breadcrumbs();
?>
<section id="main-container" class="main-content  <?php echo apply_filters('charityheart_volunteer_content_class', 'container');?> inner">
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
		<div id="main-content" class="col-sm-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<main id="main" class="site-main content container" role="main">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					
					<div class="apuseslate-archive-container">
						
						<div class="apussimpleevent-archive-bottom apussimpleevent-rows">
							<div class="row">
								<?php while ( have_posts() ) : the_post(); ?>
									<div class="col-sm-<?php echo esc_attr($bcols); ?>">
										<?php echo ApusCharityheart_Template_Loader::get_template_part( 'content-volunteer' ); ?>
									</div>
								<?php endwhile; ?>
							</div>
						</div>	

					</div>
					<?php the_posts_pagination( array(
						'prev_text'          => esc_html__( 'Previous page', 'charityheart' ),
						'next_text'          => esc_html__( 'Next page', 'charityheart' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'charityheart' ) . ' </span>',
					) ); ?>
					
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

			</main><!-- .site-main -->
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

<?php get_footer();
