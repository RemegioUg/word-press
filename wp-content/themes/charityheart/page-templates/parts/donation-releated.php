<?php
    $relate_count = charityheart_get_config('number_donation_releated', 3);
    $relate_columns = charityheart_get_config('releated_donation_columns', 3);
    $terms = get_the_terms( get_the_ID(), 'give_category' );
    $termids =array();

    if ($terms) {
        foreach($terms as $term) {
            $termids[] = $term->term_id;
        }
    }

    $args = array(
        'post_type' => 'give_forms',
        'posts_per_page' => $relate_count,
        'post__not_in' => array( get_the_ID() ),
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'give_category',
                'field' => 'id',
                'terms' => $termids,
                'operator' => 'IN'
            )
        )
    );
    $relates = new WP_Query( $args );
    if( $relates->have_posts() ):
?>
<div class="related-posts">
    <div class="widget">
        <h4 class="widget-title">
            <span><?php esc_html_e( 'Related Campaigns', 'charityheart' ); ?></span>
        </h4>
        <div class="related-campaign-content widget-give widget-content">
            <div class="row">
            <?php
                $class_column = 12/$relate_columns;
                $item_style = charityheart_get_config('donation_item_style','grid');
                while ( $relates->have_posts() ) : $relates->the_post();
                    ?>
                    <div class="col-sm-<?php echo esc_attr( $class_column ); ?>">
                        <?php get_template_part( 'give/loop/'.$item_style ); ?>
                    </div>
                    <?php
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>