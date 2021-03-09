<article class="post-give give-grid grid-v2">
	<div class="give-image">
		<div class="give-image-inner">
			<?php give_get_template_part( 'single-give-form/featured-image1' ); ?>
			<?php charityheart_give_display_sales(); ?>
		</div>
	</div>

	<div class="give-content">
        <div class="give-meta">
	        <h3 class="entry-title"><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a> </h3>
	        <div class="entry-excerpt">
	        	 <?php echo charityheart_substring( get_the_excerpt(), 20, '...' ); ?>
	        </div>

	        <?php give_show_goal_progress( get_the_ID(), array( 'version' => 'v2' ) ); ?>

        </div>

        <div class="donate-wrapper">
        	<a class="give-btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('Donate', 'charityheart'); ?></a>

			<div class="total-goal">
				<?php
					$form = new Give_Donate_Form( get_the_ID() );
					$goal = $form->goal;
					$income      = $form->get_earnings();

					$income = give_human_format_large_amount( give_format_amount( $income ) );
	                $goal = give_human_format_large_amount( give_format_amount( $goal ) );

	                echo sprintf(
	                    __( 'Raised: %1$s / %2$s', 'charityheart' ),
	                    '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
	                    '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'
	                );
				?>
			</div>
        </div>

	</div>	
</article>