<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Charityheart
 * @since Charityheart 1.0
 */
/*

*Template Name: 404 Page
*/
get_header();

?>
<section class="page-404">
	<div id="main-container" class="inner">
		
		<div id="main-content" class="main-page">

			<section class="error-404 not-found text-center clearfix">
				<h4 class="title-big"><?php echo trim(charityheart_get_config('404_title', '404')); ?></h4>
				<h1 class="page-title"><?php echo trim(charityheart_get_config('404_subtitle', 'Opps! Page Not Be Found')); ?></h1>
				<div class="page-content">
					<p class="sub-title">
						<?php echo trim(charityheart_get_config('404_description', 'Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.')); ?>
					</p>
					<?php get_search_form(); ?>
					<a class="btn btn-theme btn-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('back to homepage', 'charityheart'); ?></a>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div><!-- .content-area -->
			
	</div>
</section>
<?php get_footer(); ?>