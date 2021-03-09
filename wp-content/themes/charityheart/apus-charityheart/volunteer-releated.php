<?php
    $relate_count = charityheart_get_config('number_volunteer_other');
    $relate_columns = charityheart_get_config('other_volunteer_columns');
    $terms = get_the_terms( get_the_ID(), 'give_volunteer_category' );
    $termids = array();

    if ($terms) {
        foreach($terms as $term) {
            $termids[] = $term->term_id;
        }
    }

    $args = array(
        'post_type' => 'give_volunteer',
        'posts_per_page' => $relate_count,
        'post__not_in' => array( get_the_ID() ),
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'give_volunteer_category',
                'field' => 'id',
                'terms' => $termids,
                'operator' => 'IN'
            )
        )
    );
    $relates = new WP_Query( $args );
    if( $relates->have_posts() ):
?>
<div class="related-volunteers">
    <div class="widget">
        <h4 class="widget-title">
            <span><?php esc_html_e( 'Other Volunteers', 'charityheart' ); ?></span>
        </h4>
        <div class="widget-content">
            <div class="owl-carousel" data-smallmedium="2" data-extrasmall="1" data-items="<?php echo esc_attr($relate_columns); ?>" data-carousel="owl" data-pagination="false" data-nav="true">
                <?php while ( $relates->have_posts() ) : $relates->the_post(); ?>
                    <?php echo ApusCharityheart_Template_Loader::get_template_part( 'content-volunteer-v4' ); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>