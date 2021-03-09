<article class="post-give give-special">
	<div class="give-content">
        <div class="give-meta">
	        <h3 class="entry-title"><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a> </h3>
	        <div class="entry-excerpt">
	        	 <?php echo charityheart_substring( get_the_excerpt(), 60, '...' ); ?>
	        </div>
        </div>
        <div class="give-total-wraper">
	        <div class="total-goal">
	        	<span class="total-text"><?php esc_html_e( 'Total money donated', 'charityheart' ); ?></span>
				<?php
					$form = new Give_Donate_Form( get_the_ID() );
					$income      = $form->get_earnings();
					$income = give_human_format_large_amount( give_format_amount( $income ) );
					$sales = $form->get_sales();
				?>
				<span class="income"><?php echo apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ); ?></span>
			</div>
			<?php if ($sales) { ?>
				<div class="total-sales">
	        		<span class="total-text"><?php esc_html_e( 'Donors', 'charityheart' ); ?></span>
	        		<span class="income"><?php echo trim($sales); ?></span>
				</div>
			<?php } ?>
        </div>
        <div class="donate-wrapper">
        	<?php do_action( 'give_single_form_summary' ); ?>
        </div>
	</div>
</article>