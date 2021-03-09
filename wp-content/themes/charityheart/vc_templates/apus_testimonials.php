<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
	'post_type' => 'apus_testimonial',
	'posts_per_page' => $number,
	'post_status' => 'publish',
);
$loop = new WP_Query($args);
?>
<div class="widget-testimonials widget <?php echo esc_attr($el_class).' '.esc_attr($style); ?>">
	<?php if ($title!=''): ?>
            <h3 class="widget-title">
                <span><?php echo esc_attr( $title ); ?></span>
            </h3>
    <?php endif; ?>
	<?php if ( $loop->have_posts() ): ?>
        <?php if($style == 'lighten'){ ?>
		<div class="owl-carousel" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-smallmedium="1" data-extrasmall="1"  data-pagination="true" data-nav="false">
            <?php while ( $loop->have_posts() ): $loop->the_post(); global $product; ?>
                <div class="item">
                    <?php get_template_part( 'vc_templates/testimonial/testimonial', 'light' ); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php } else{ ?>
        <div class="owl-carousel" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-smallmedium="1" data-extrasmall="1"  data-pagination="true" data-nav="false">
            <?php while ( $loop->have_posts() ): $loop->the_post(); global $product; ?>
                <div class="item">
                    <?php get_template_part( 'vc_templates/testimonial/testimonial', 'v1' ); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php } ?>
	<?php endif; ?>
</div>
<?php wp_reset_postdata(); ?>