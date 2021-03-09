<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Charityheart
 * @since Charityheart 1.0
 */

$footer = apply_filters( 'charityheart_get_footer_layout', 'default' );

?>

	</div><!-- .site-content -->

	<footer id="apus-footer" class="apus-footer" role="contentinfo">
		<?php if ( !empty($footer) ): ?>
			<?php charityheart_display_footer_builder($footer); ?>
		<?php else: ?>
			<div class="apus-copyright">
				<div class="container">
					<div class="copyright-content">
						<div class="text-copyright pull-left">
						<?php
							if ( charityheart_get_config('copyright_text') ) {
								echo esc_html(charityheart_get_config('copyright_text'));
							} else {
								$allowed_html_array = array( 'a' => array('href' => array()) );
								echo wp_kses( __('&copy; 2017 - Charityheart. All Rights Reserved. <br/> Powered by <a href="//apusthemes.com">ApusThemes</a>', 'charityheart'), $allowed_html_array);
							}
						?>

						</div>
					</div>
				</div>
			</div>
		
		<?php endif; ?>
		
	</footer><!-- .site-footer -->
	<?php if ( is_active_sidebar( 'popup-newsletter' ) ) : ?>
		<?php dynamic_sidebar('popup-newsletter') ?>
	<?php endif; ?>
	<?php
	if ( charityheart_get_config('back_to_top') ) { ?>
		<a href="#" id="back-to-top">
			<i class="fa fa-angle-up"></i>
		</a>
	<?php
	}
	?>

</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>