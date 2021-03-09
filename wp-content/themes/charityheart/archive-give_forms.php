<?php
get_header();
$sidebar_configs = charityheart_get_donation_layout_configs();

$columns = charityheart_get_config('donation_columns', 1);
$bscol = floor( 12 / $columns );
$_count  = 0;
charityheart_render_breadcrumbs();
?>
<section class="archive-give">
<section id="main-container" class="main-content  <?php echo apply_filters('charityheart_donation_content_class', 'container');?> inner">
	<div class="clearfix">
		<?php if ( isset($sidebar_configs['left']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['left']['class']) ;?>">
			  	<aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			  		<?php if ( is_active_sidebar( $sidebar_configs['left']['sidebar'] ) ): ?>
			   			<?php dynamic_sidebar( $sidebar_configs['left']['sidebar'] ); ?>
			   		<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>

		<div id="main-content" class="<?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<main id="main" class="site-main layout-donation layout-donation-<?php echo esc_attr(charityheart_get_config('donation_display_mode', 'grid')); ?>" role="main">
				<!-- categories -->
				<?php
				if ( charityheart_get_config('show_donation_categories_top') ) {
					global $wp_query;

					$term =	$wp_query->queried_object;
					$term_id_default = isset($term->term_id) ? $term->term_id : 0;
					$terms = get_terms(array(
					    'taxonomy' => 'give_category',
					    'hide_empty' => false,
					));
					if (!empty($terms)) {
					?>
						<ul class="categories">
							<?php foreach ($terms as $term) { ?>
								<li class="<?php echo ($term->term_id == $term_id_default) ? 'active' : ''; ?>">
									<a href="<?php echo esc_url(get_term_link($term->term_id, 'give_category')); ?>"><?php echo trim($term->name);?></a>
								</li>
							<?php } ?>
						</ul>
					<?php
					}
				}
				?>

				<?php if ( have_posts() ) : ?>
					<header class="page-header hidden">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
						if ( charityheart_get_config('donation_display_mode', 'grid') == 'grid' ) {
							$columns = charityheart_get_config('donation_columns', 1);
							$bcol = floor( 12 / $columns );
							$count = 1;
							$item_style = charityheart_get_config('donation_item_style', 'grid');
							while ( have_posts() ) : the_post();
						?>
					            <div class="col-sm-<?php echo esc_attr($bcol); ?> <?php if($count%$columns == 1) echo 'first-chil'; ?>">
					                <?php get_template_part( 'give/loop/'.$item_style ); ?>
					            </div>
			        <?php $count ++; endwhile;
			         	} else {
			         		$item_style = charityheart_get_config('donation_item_list_style', 'list');
			         		while ( have_posts() ) : the_post();
					            get_template_part( 'give/loop/'.$item_style );
			        		endwhile;
			         	}
					// Previous/next page navigation.
					charityheart_paging_nav();

				// If no content, include the "No posts found" template.
				else :
					?>
					<article id="post-0" class="post no-results not-found">
						<div class="entry-content e-entry-content">
							<h2>
								<?php esc_html_e( 'Sorry, but your search returned no results!', 'charityheart' ) ?>
							</h2>
						</div>
						<!-- entry-content -->
					</article><!-- /article -->
					<?php

				endif;
				?>

			</main><!-- .site-main -->
		</div><!-- .content-area -->
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
