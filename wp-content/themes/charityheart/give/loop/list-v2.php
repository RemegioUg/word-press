<article class="post-give give-grid give-list give-list-v2">
	<div class="row">
		<div class="col-sm-4">
			<div class="give-image-list">
				<div class="p-relative">
					<?php give_get_template_part( 'single-give-form/featured-image1' ); ?>
					<?php give_show_goal_progress( get_the_ID(), array( 'version' => 'v3' ) ); ?>
				</div>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="give-content">
		        <div class="give-meta">
		        	<?php charityheart_give_display_sales(); ?>
		        	<div class="total-goal">
						<?php
							$form = new Give_Donate_Form( get_the_ID() );
							$goal = $form->goal;
							$income      = $form->get_earnings();

							$income = give_human_format_large_amount( give_format_amount( $income ) );
			                $goal = give_human_format_large_amount( give_format_amount( $goal ) );

			                echo sprintf(
			                    __( '<span class="goal-income-wrapper">Raised: %1$s</span><span class="goal-text-wrapper"> Goal: %2$s </span>', 'charityheart' ),
			                    '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
			                    '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'
			                );
						?>

					</div>
			        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			        <div class="entry-excerpt">
			        	 <?php echo charityheart_substring( get_the_excerpt(), 15, '...' ); ?>
			        </div>
		        </div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="give-donate-wrapper">
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