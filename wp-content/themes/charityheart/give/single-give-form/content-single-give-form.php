<?php
/**
 * The template for displaying form content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/single-give-form/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Fires in single form template, before the form.
 *
 * Allows you to add elements before the form.
 *
 * @since 1.0
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

	<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>

		<?php
		//add_action( 'give_pre_form_output', 'give_form_content', 10, 2 );
		/**
		 * Fires in single form template, before the form summary.
		 *
		 * Allows you to add elements before the form summary.
		 *
		 * @since 1.0
		 */
		//do_action( 'give_before_single_form_summary' );
		?>

		<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">
			<div class="top-info-give">
			<?php
			/**
			 * Fires in single form template, to the form summary.
			 *
			 * Allows you to add elements to the form summary.
			 *
			 * @since 1.0
			 */
			remove_action( 'give_pre_form_output', 'give_form_content', 10, 2 );
			do_action( 'give_single_form_summary' );
			?>
			</div>
			<?php
			/**
			 * Image
			*/
			add_action( 'charityheart_give_single_image', 'give_show_form_images', 10 );
			do_action( 'charityheart_give_single_image' );
			?>

			<div class="give-form-content-wrap">
				<?php
					$form_id = get_the_ID();
					$content = wpautop( get_post_meta( $form_id, '_give_form_content', true ) );
					echo apply_filters( 'the_content',$content );
				?>
				<?php
				if (charityheart_get_config('show_donation_social_share', 1)) {
					get_template_part( 'page-templates/parts/sharebox' );
				}
				?>
			</div>
			
		</div>
		<!-- .summary -->

		<?php
		/**
		 * Fires in single form template, after the form summary.
		 *
		 * Allows you to add elements after the form summary.
		 *
		 * @since 1.0
		 */
		do_action( 'give_after_single_form_summary' );

		remove_action( 'give_pre_form_output', 'give_form_content', 10, 2 );
		?>
		<?php
			comments_template();
		?>
	</div><!-- #give-form-<?php the_ID(); ?> -->

<?php
/**
 * Fires in single form template, after the form.
 *
 * Allows you to add elements after the form.
 *
 * @since 1.0
 */
do_action( 'give_after_single_form' );
?>