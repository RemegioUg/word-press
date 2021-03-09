<article class="post-give give-grid grid-v1">
	<div class="give-image">
		<div class="give-image-inner">
			<?php give_get_template_part( 'single-give-form/featured-image1' ); ?>
			<?php charityheart_give_display_sales(); ?>
		</div>
	</div>
	<div class="give-content">
		<?php give_show_goal_progress( get_the_ID(), array( 'version' => 'v1' ) ); ?>
        <div class="give-meta">
	        <h3 class="entry-title"><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a> </h3>
	        <div class="entry-excerpt">
	        	 <?php echo charityheart_substring( get_the_excerpt(), 20, '...' ); ?>
	        </div>
        </div>

        <div class="donate-wrapper">
        	<a class="give-btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('Donate', 'charityheart'); ?></a>

			<div class="time">
				<?php
				$endtime = get_post_meta( get_the_ID(), APUSCHARITYHEART_PREFIX. 'endtime', true );
				$endtime = !empty($endtime) ? strtotime($endtime) : 0;
				$now = time();
				if ($endtime > $now) {
					$datediff = abs($endtime - $now);
		     		$days = floor($datediff/(60*60*24));
		     		echo sprintf(_n('<span>%d</span> day left', '<span>%d</span> days left', $days, 'charityheart'), $days);
				}
				?>
			</div>
        </div>

	</div>	
</article>