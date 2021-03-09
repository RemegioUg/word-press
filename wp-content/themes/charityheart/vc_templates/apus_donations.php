<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
	'post_type'      => 'give_forms',
	'post_status'    => 'publish',
	'posts_per_page' => $number
);
$loop = new WP_Query( $args );

if ( $loop->have_posts() ):
?>
	<div class="widget widget-give <?php echo esc_attr($el_class); ?>" >
	    <?php if ($title!=''): ?>
            <h3 class="widget-title">
                <span><?php echo esc_attr( $title ); ?></span>
            </h3>
        <?php endif; ?>
	    <div class="widget-content"> 
	    	<?php if ( $layout_type == 'carousel' ): ?>
	            <div class="owl-carousel posts owl-carousel-bottom"  <?php echo ($grid_style == 'list-v1')? 'data-smallmedium="1"' : 'data-smallmedium="2"'; ?> data-extrasmall="1" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-pagination="true" data-nav="false">
	                <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
	                    <div class="item">
	                        <?php get_template_part( 'give/loop/'.$grid_style ); ?>
	                    </div>
	                <?php endwhile; ?>
	            </div>

	        <?php elseif ( $layout_type == 'grid' ): ?>
	        	<?php $count = 1; ?>
	            <?php $bcol = 12/$columns; ?>
	            <div class="style-grid">
	                <div class="row">
	                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	                        <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-6 <?php if($count%$columns == 1)echo 'first-chil' ?>">
	                            <?php get_template_part( 'give/loop/'.$grid_style ); ?>
	                        </div>
	                    <?php $count++; endwhile; ?>
	                </div>
	            </div>
	        <?php else: ?>
	            <ul class="posts-list">
	                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	                    <li>
	                        <?php get_template_part( 'give/loop/list' ); ?>
	                    </li>
	                <?php endwhile; ?>
	            </ul>
	        <?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>