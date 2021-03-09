<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
	'post_type' => 'simple_event',
	'posts_per_page' => $number
);
$loop = new WP_Query($args);
$item_style = $style ? $style : 'style1';
?>
<div class="widget-events <?php echo esc_attr($el_class.' '.$style); ?>">
    <?php if ($title!=''): ?>
        <div class="widget-title-wrapper">
            <h3 class="widget-title">
                <span><?php echo esc_attr( $title ); ?></span>
            </h3>
            <?php if ( $layout_type == 'special' ) { ?>
                <a href="<?php echo esc_url(get_post_type_archive_link( 'simple_event' )); ?>">
                    <?php esc_html_e( 'View All Events', 'charityheart' ); ?>
                </a>
            <?php } ?>
        </div>
    <?php endif; ?>
    <div class="widget-content">
        <?php if ( $layout_type == 'special' ) { ?>

        	<?php if ( $loop->have_posts() ): ?>
        		<?php $count = 0; while ( $loop->have_posts() ): $loop->the_post(); ?>
                    <?php if ($count%4 == 0) { ?>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <?php get_template_part( 'apus-simple-event/content', 'style3' ); ?>
                            </div>
                            <div class="col-md-6 col-xs-12">
                    <?php } else { ?>
                            <?php get_template_part( 'apus-simple-event/content', 'style4' ); ?>
                    <?php } ?>
                    <?php if ($count%4 == 3) { ?>
                            </div>
                        </div>
                    <?php } ?>
        		<?php $count++; endwhile; ?>
    			<?php wp_reset_postdata(); ?>
            <?php endif; ?>

		<?php } else { ?>
            
            <?php if ( $loop->have_posts() ): ?>
                <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                    <div class="event-item">
                        <?php get_template_part( 'apus-simple-event/content', $item_style ); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        <?php } ?>
    </div>
</div>