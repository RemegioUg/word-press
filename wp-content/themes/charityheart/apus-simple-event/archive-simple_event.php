<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$sidebar_configs = charityheart_get_event_layout_configs();
$columns = charityheart_get_config('event_columns', 1);
$bcols = ceil(12/$columns);

charityheart_render_breadcrumbs();

?>
<section class="archive-events">
<section id="main-container" class="main-content <?php echo apply_filters('charityheart_event_content_class', 'container');?> inner">
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
			<?php if ( have_posts() ) : ?>
				<!-- categories -->
				<?php
				if ( charityheart_get_config('show_event_categories_top') ) {
					global $wp_query;

					$term =	$wp_query->queried_object;
					$term_id_default = isset($term->term_id) ? $term->term_id : 0;
					$terms = get_terms(array(
					    'taxonomy' => 'simple_event_category',
					    'hide_empty' => false,
					));
					if (!empty($terms)) {
					?>
						<ul class="categories">
							<?php foreach ($terms as $term) { ?>
								<li class="<?php echo ($term->term_id == $term_id_default) ? 'active' : ''; ?>">
									<a href="<?php echo esc_url(get_term_link($term->term_id, 'simple_event_category')); ?>"><?php echo trim($term->name);?></a>
								</li>
							<?php } ?>
						</ul>
				<?php
					}
				}
				?>

				<?php
					the_archive_title( '<h1 class="page-title hidden">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				
				<div class="row layout-grid">
					<?php $count = 1; while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-<?php echo esc_attr($bcols); ?> <?php echo ($count%$columns == 1 )? 'first-chil':''; ?>">
							<?php
								$item_style = 'event';
								echo ApusSimpleEvent_Template_Loader::get_template_part( 'content-'.$item_style );
							?>
						</div>
					<?php $count++; endwhile; ?>
				</div>
					
				<?php
				// Previous/next page navigation.
				charityheart_paging_nav();
				?>
				
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
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
	</div><!-- .site-main -->
</section><!-- .content-area -->
</section>
<?php get_footer(); ?>
