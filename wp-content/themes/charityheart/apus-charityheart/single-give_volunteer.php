<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$sidebar_configs = charityheart_get_volunteer_layout_configs();

get_header();

charityheart_render_breadcrumbs();
?>
<section class="single-volunteer">
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
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							$post_id = get_the_ID();
							$facebook = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'facebook', true );
							$twitter = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'twitter', true );
							$googleplus = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'googleplus', true );
							$linkedin = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'linkedin', true );
							$instagram = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'instagram', true );
							$pinterest = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'pinterest', true );

							$address = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'address', true );
							$job = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'job', true );
							$email = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'email', true );
							$phone = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'phone', true );
							$skype = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'skype', true );
							$website = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'website', true );
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="top-single">
							<div class="row">
								<div class="col-sm-3">
									<div class="content-left">
										<div class="post-thumbnail">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="inner">
											<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
											<?php if ( $job ) { ?>
												<span class="job"><?php echo trim($job); ?></span>
											<?php } ?>
											<?php if ($facebook || $twitter || $googleplus || $linkedin || $instagram || $pinterest) { ?>
												<div class="socials">
													<?php if ($facebook) { ?>
														<a class="facebook" href="<?php echo esc_url($facebook); ?>" title="<?php echo esc_html__( 'Facebook', 'charityheart' ); ?>"><i class="mn-icon-1405"></i></a>
													<?php } ?>
													<?php if ($twitter) { ?>
														<a class="twitter" href="<?php echo esc_url($twitter); ?>" title="<?php echo esc_html__( 'Twitter', 'charityheart' ); ?>"><i class="mn-icon-1406"></i></a>
													<?php } ?>
													<?php if ($googleplus) { ?>
														<a class="googleplus" href="<?php echo esc_url($googleplus); ?>" title="<?php echo esc_html__( 'Google Plus', 'charityheart' ); ?>"><i class="mn-icon-1409"></i></a>
													<?php } ?>
													<?php if ($linkedin) { ?>
														<a class="linkedin" href="<?php echo esc_url($linkedin); ?>" title="<?php echo esc_html__( 'LinkedIn', 'charityheart' ); ?>"><i class="mn-icon-1408"></i></a>
													<?php } ?>
													<?php if ($instagram) { ?>
														<a class="instagram" href="<?php echo esc_url($instagram); ?>" title="<?php echo esc_html__( 'Instagram', 'charityheart' ); ?>"><i class="mn-icon-1422"></i></a>
													<?php } ?>
													<?php if ($pinterest) { ?>
														<a class="pinterest" href="<?php echo esc_url($pinterest); ?>" title="<?php echo esc_html__( 'Pinterest', 'charityheart' ); ?>"><i class="mn-icon-1416"></i></a>
													<?php } ?>
												</div>
											<?php } ?>


											<?php if ($email || $phone || $skype || $website || $address) { ?>
												<ul class="volunteer-information">
													<?php if ($email) { ?>
														<li><i class="mn-icon-220"></i> <span><?php echo trim($email); ?></span></li>
													<?php } ?>
													<?php if ($phone) { ?>
														<li><i class="mn-icon-258"></i> <span><?php echo trim($phone); ?></span></li>
													<?php } ?>
													<?php if ($skype) { ?>
														<li><i class="mn-icon-1422"></i> <span><?php echo trim($skype); ?></span></li>
													<?php } ?>
													<?php if ($website) { ?>
														<li><i class="mn-icon-813"></i> <span><?php echo trim($website); ?></span></li>
													<?php } ?>
													<?php if ($address) { ?>
														<li><i class="mn-icon-1142"></i> <span><?php echo trim($address); ?></span></li>
													<?php } ?>
												</ul>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="col-sm-9">
									<div class="content-right">
										<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
										<div class="entry-content"><?php the_content(); ?></div>
									</div>
								</div>
							</div>
							</div>
							<?php
							if ( charityheart_get_config('show_volunteer_other') ) {
								echo ApusCharityheart_Template_Loader::get_template_part( 'volunteer-releated' );
							}
							?>
						</article>
					<?php endwhile; ?>

					<?php the_posts_pagination( array(
						'prev_text'          => esc_html__( 'Previous page', 'charityheart' ),
						'next_text'          => esc_html__( 'Next page', 'charityheart' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'charityheart' ) . ' </span>',
					) ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

			</main>
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
<?php get_footer();
