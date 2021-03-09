<?php
    wp_enqueue_script( 'charityheart-isotope-js', get_template_directory_uri().'/js/isotope.pkgd.min.js', array( 'jquery' ) );
    $columns = charityheart_get_config('blog_columns', 1);
	$bcol = floor( 12 / $columns );
?>

<div class="isotope-items" data-isotope-duration="400">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="isotope-item col-md-<?php echo esc_attr($bcol); ?>">
            <?php get_template_part( 'post-formats/content', get_post_format() ); ?>
        </div>
    <?php endwhile; ?>
</div>