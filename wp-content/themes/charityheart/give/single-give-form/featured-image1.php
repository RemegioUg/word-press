<?php
/**
 * Single Form Featured Image
 *
 * Displays the featured image for the single donation form - Override this template by copying it to yourtheme/give/single-give-form/featured-image.php
 * 
 * @package       Give/Templates
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

/**
 * Fires in single form template, before the form featured image.
 *
 * Allows you to add elements before the image.
 *
 * @since 1.0
 */
do_action( 'give_pre_featured_thumbnail' );
?>

<div class="images">
	<div class="image-wrapper">
		<?php //Featured Thumbnail
		if ( !is_singular('give_forms') ) {
			?>
			<a href="<?php the_permalink(); ?>">
			<?php
		}
		if ( has_post_thumbnail() ) {
			$image_size = apply_filters( 'single_give_form_large_thumbnail_size', 'charityheart-give-image-grid' );
			if ( charityheart_get_config('image_lazy_loading') ) {
				$product_thumbnail_id = get_post_thumbnail_id();
				$product_thumbnail_title = get_the_title( $product_thumbnail_id );
				$product_thumbnail = wp_get_attachment_image_src( $product_thumbnail_id, $image_size );
	            $placeholder_image = charityheart_create_placeholder(array($product_thumbnail[1], $product_thumbnail[2]));

	            echo '<img src="' . trim( $placeholder_image ) . '" data-src="' . esc_url( $product_thumbnail[0] ) . '" width="' . esc_attr( $product_thumbnail[1] ) . '" height="' . esc_attr( $product_thumbnail[2] ) . '" alt="' . esc_attr( $product_thumbnail_title ) . '" class="attachment-full unveil-image" />';
			} else {
				$image = get_the_post_thumbnail( $post->ID, $image_size );
				echo apply_filters( 'single_give_form_image_html', $image );
			}
		} else {

			//Placeholder Image
			echo apply_filters( 'single_give_form_image_html', sprintf( '<img src="%s" alt="%s" />', give_get_placeholder_img_src(), esc_attr__( 'Placeholder', 'charityheart' ) ), $post->ID );

		}
		if ( !is_singular('give_forms') ) {
			?>
			</a>
			<?php
		}
		?>
	</div>
</div>

<?php
/**
 * Fires in single form template, after the form featured image.
 *
 * Allows you to add elements after the image.
 *
 * @since 1.0
 */
do_action( 'give_post_featured_thumbnail' );
?>
