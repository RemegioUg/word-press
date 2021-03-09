<?php
	$columns = charityheart_get_config('blog_columns', 1);
	$bcol = floor( 12 / $columns );
?>
<div class="layout-blog style-grid">
    <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-xs-12 col-sm-<?php echo esc_attr($bcol); ?>">
                <?php get_template_part( 'post-formats/content', get_post_format() ); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>