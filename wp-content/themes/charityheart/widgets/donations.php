<?php
extract( $args );
extract( $instance );
$title = apply_filters('widget_title', $instance['title']);

if ( $title ) {
    echo ($before_title)  . trim( $title ) . $after_title;
}

$loop = charityheart_give_get_donations($type, $number_post);
if ($loop->have_posts()):
?>
<div class="donation-widget widget-content">
	<div class="style-grid">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part( 'give/loop/list-v3' ); ?>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>