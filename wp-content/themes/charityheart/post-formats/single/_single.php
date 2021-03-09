<?php
$post_format = get_post_format();
global $post;
?>
<article <?php post_class(); ?>>
    
    <?php if ( $post_format == 'gallery' ) {
        $gallery = charityheart_post_gallery( get_the_content(), array( 'size' => 'full' ) );
    ?>
        <div class="entry-thumb <?php echo  (empty($gallery) ? 'no-thumb' : ''); ?>">
            <?php echo trim($gallery); ?>
        </div>
    <?php } elseif( $post_format == 'link' ) {
            $format = charityheart_post_format_link_helper( get_the_content(), get_the_title() );
            $title = $format['title'];
            $link = charityheart_get_link_attributes( $title );
            $thumb = charityheart_post_thumbnail('', $link);
            echo trim($thumb);
        } else { ?>
        <div class="entry-thumb <?php echo  (!has_post_thumbnail() ? 'no-thumb' : ''); ?>">
            <?php
                $thumb = charityheart_post_thumbnail();
                echo trim($thumb);
            ?>
        </div>
    <?php } ?>

	<div class="entry-content-detail">
        <div class="top-info">
            <?php if (get_the_title()) { ?>
                <h4 class="entry-title">
                    <?php the_title(); ?>
                </h4>
            <?php } ?>
            <div class="entry-meta">
                <div class="meta">
                    <span class="author"><?php the_author_posts_link(); ?></span>
                    <span class="date"><?php the_time( get_option('date_format', 'M d, Y') ); ?></span> 
                    <span class="comments"><i class="mn-icon-286"></i> <?php comments_number( '0 Comment', '1 Comments', '%' ); ?></span>
                    <span> <i class="mn-icon-352"></i> <?php charityheart_post_categories($post); ?></span>
                </div>
            </div>
        </div>
    	<div class="single-info info-bottom">
            <div class="entry-description">
                <?php
                    if ( $post_format == 'gallery' ) {
                        $gallery_filter = charityheart_gallery_from_content( get_the_content() );
                        echo trim($gallery_filter['filtered_content']);
                    } else {
                        the_content();
                    }
                ?>
            </div><!-- /entry-content -->

    		<?php
    		wp_link_pages( array(
    			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'charityheart' ) . '</span>',
    			'after'       => '</div>',
    			'link_before' => '<span>',
    			'link_after'  => '</span>',
    			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'charityheart' ) . ' </span>%',
    			'separator'   => '',
    		) );
    		?>
    		<div class="tag-social clearfix">
    			<?php charityheart_post_tags(); ?>
    			<?php if( charityheart_get_config('show_blog_social_share', true) ) {
    					get_template_part( 'page-templates/parts/sharebox' );
    				} ?>
    		</div>
    	</div>
    </div>
</article>