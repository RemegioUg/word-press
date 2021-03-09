<?php
	$post_id = get_the_ID();
	$facebook = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'facebook', true );
	$twitter = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'twitter', true );
	$googleplus = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'googleplus', true );
	$linkedin = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'linkedin', true );

	$job = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'job', true );
?>
<article itemscope <?php post_class('volunteer-grid style3'); ?>>

	<div class="volunteer-thumb">
		<?php if ( has_post_thumbnail() ) { ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
				?>
			</a>
		<?php } ?>
	</div>
	<div class="volunteer-content">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<?php if ( $job ) { ?>
			<span class="job"><?php echo trim($job); ?></span>
		<?php } ?>
	</div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</article>