<?php
	$post_id = get_the_ID();
	$facebook = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'facebook', true );
	$twitter = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'twitter', true );
	$googleplus = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'googleplus', true );
	$linkedin = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'linkedin', true );

	$job = get_post_meta( $post_id, APUSCHARITYHEART_PREFIX . 'job', true );
?>
<article itemscope <?php post_class('volunteer-grid style2'); ?>>

	<div class="volunteer-thumb">
		<?php if ( has_post_thumbnail() ) { ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
				?>
			</a>
		<?php } ?>
		<?php if ($facebook || $twitter || $googleplus || $linkedin) { ?>
			<div class="socials">
				<?php if ($facebook) { ?>
					<a class="facebook" href="<?php echo esc_url($facebook); ?>" title="<?php echo esc_html__( 'Facebook', 'charityheart' ); ?>"><i class="mn-icon-1405"></i></a>
				<?php } ?>
				<?php if ($twitter) { ?>
					<a class="twitter" href="<?php echo esc_url($twitter); ?>" title="<?php echo esc_html__( 'Twitter', 'charityheart' ); ?>"><i class="mn-icon-1406"></i></a>
				<?php } ?>
				<?php if ($googleplus) { ?>
					<a class="googleplus" href="<?php echo esc_url($googleplus); ?>" title="<?php echo esc_html__( 'Google Plus', 'charityheart' ); ?>"><i class="mn-icon-1409"></i></a>
				<?php } ?>
				<?php if ($linkedin) { ?>
					<a class="linkedin" href="<?php echo esc_url($linkedin); ?>" title="<?php echo esc_html__( 'LinkedIn', 'charityheart' ); ?>"><i class="mn-icon-1408"></i></a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
	<div class="volunteer-content">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<?php if ( $job ) { ?>
			<span class="job"><?php echo trim($job); ?></span>
		<?php } ?>

		<a class="btn btn-primary btn-outline" href="<?php the_permalink(); ?>"><?php echo esc_html__('View Profile', 'charityheart' ); ?></a>
	</div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</article>