<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$bcol = 12/$columns;

if (isset($categories) && !empty($categories)) {
    $categories = explode(',', $categories);
}

$args = array(
	'post_type' => 'give_volunteer',
	'posts_per_page' => $number
);
if ( !empty($categories) && is_array($categories) ) {
    $args['tax_query']    = array(
        array(
            'taxonomy'      => 'give_volunteer_category',
            'field'         => 'slug',
            'terms'         => implode(",", $categories ),
            'operator'      => 'IN'
        )
    );
}
$loop = new WP_Query($args);
?>
<div class="widget-volunteers <?php echo esc_attr($el_class); ?>">
    <?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo esc_attr( $title ); ?></span>
        </h3>
    <?php endif; ?>
    <div class="widget-content">
    	<?php if ( $loop->have_posts() ): ?>
    		<div class="row">
	    		<?php $count = 0; while ( $loop->have_posts() ): $loop->the_post(); ?>
	    			<div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr($bcol); ?>">
	    				<?php
			                get_template_part( 'apus-charityheart/content-volunteer', $item_style );
		                ?>
			        </div>
	    		<?php $count++; endwhile; ?>
    		</div>
    	<?php endif; ?>
    	<?php wp_reset_postdata(); ?>
    </div>
</div>