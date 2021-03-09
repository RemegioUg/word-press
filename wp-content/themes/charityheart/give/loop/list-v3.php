<article class="post-give give-list-v3">
	<div class="clearfix">
			<div class="give-image-list">
				<?php give_get_template_part( 'single-give-form/featured-image1' ); ?>
			</div>
			<div class="give-content">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		        <div class="give-meta">
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
		        </div>
			</div>
	</div>
</article>