<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
  'name'        => $slug,
  'post_type'   => 'give_forms',
  'post_status' => 'publish',
  'posts_per_page' => 1
);

$loop = new WP_Query($args);
if ( $loop->have_posts() ) {
	?>
	<div class="widget widget-donation-special">
		<?php while ( $loop->have_posts() ): $loop->the_post(); global $product; ?>
            <div class="item">
                <?php get_template_part( 'give/loop/grid-special' ); ?>
            </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
	</div>
	<?php
}