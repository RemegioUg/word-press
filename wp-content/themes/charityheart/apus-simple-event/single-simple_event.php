<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$sidebar_configs = charityheart_get_event_layout_configs();
charityheart_render_breadcrumbs();
?>
	<section id="main-container" class="main-content <?php echo apply_filters( 'charityheart_event_content_class', 'container' ); ?> inner">
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
				<main id="main" class="site-main content" role="main">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); $event = apussimpleevent_event( get_the_ID() ); ?>
							<?php
								$info = $event->getMetaFullInfo();

								$map = $info['map']['value'];
								$lat = !empty($map['latitude']) ? $map['latitude'] : '';
								$lng = !empty($map['longitude']) ? $map['longitude'] : '';
								$startdate = !empty($info['startdate']['value']) ? $info['startdate']['value'] : '';
								$finishdate = !empty($info['finishdate']['value']) ? $info['finishdate']['value'] : '';
								$time = !empty($info['time']['value']) ? $info['time']['value'] : '';
								$address = !empty($info['map']['value']['addess']) ? $info['map']['value']['addess'] : '';
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('detail-event'); ?>>
								<h3 class="entry-title">
									<?php the_title(); ?>
								</h3>
								<div class="event-thumb">
									<?php the_post_thumbnail(); ?>
									<?php if ($startdate): ?>
										<div class="apus-countdown" data-time="timmer"
									         data-date="<?php echo date('m',$startdate).'-'.date('d',$startdate).'-'.date('Y',$startdate).'-'. date('H',$startdate) . '-' . date('i',$startdate) . '-' .  date('s',$startdate) ; ?>">
									    </div>
									<?php endif; ?>
								</div>
								
								<div class="event-meta">
										<ul class="list-info">
											<li><strong><?php echo esc_html__('Start:', 'charityheart'); ?></strong> <?php echo date('M jS, Y', $startdate); ?></li>
											<li><strong><?php echo esc_html__('End:', 'charityheart'); ?></strong> <?php echo date('M jS, Y', $finishdate); ?></li>
											<li><strong><?php echo esc_html__('Time:', 'charityheart'); ?></strong> <?php echo trim($time); ?></li>
										</ul>
								</div>

								<div class="entry-content"><?php the_content(); ?></div>
								<div class="google-map">
									<h3 class="title"><?php echo esc_html__('Event location', 'charityheart'); ?></h3>
									<div id="single_event_gmap_canvas" class="map_canvas apus-google-map" data-lat="<?php echo esc_attr($lat); ?>" data-lng="<?php echo esc_attr($lng); ?>" data-zoom="15">
									</div>
								</div>
								
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

<?php get_footer(); ?>
