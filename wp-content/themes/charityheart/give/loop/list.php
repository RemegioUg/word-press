<article class="post-give give-grid give-list">
	<div class="row box-flex">
		<div class="col-sm-4">
			<div class="give-image">
				<div class="p-relative">
					<?php give_get_template_part( 'single-give-form/featured-image1' ); ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="give-content">
		        <div class="give-meta">
		        	<?php charityheart_give_display_sales(); ?>
			        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			        <div class="entry-excerpt">
			        	 <?php echo charityheart_substring( get_the_excerpt(), 15, '...' ); ?>
			        </div>
		        </div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="give-donate-wrapper">
		        <?php give_show_goal_progress( get_the_ID(), array( 'version' => '' ) ); ?>
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
		</div>
	</div>
</article>