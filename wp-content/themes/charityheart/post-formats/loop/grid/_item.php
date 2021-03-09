<?php $thumbsize = charityheart_get_blog_thumbsize();?>

<article <?php post_class('post post-grid'); ?>>
    <div class="date">
        <a href="<?php the_permalink(); ?>"><?php the_time( get_option('date_format', 'M d, Y') ); ?></a>
    </div>
    <?php
        $thumb = charityheart_display_post_thumb($thumbsize);
        echo trim($thumb);
    ?>
    <div class="entry-content <?php echo !empty($thumb) ? '' : 'no-thumb'; ?>">
        <div class="entry-meta">
            <div class="info">
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
                <div class="meta">
                    <span class="author"> <?php the_author_posts_link(); ?></span>
                    <span class="comments"><i class="mn-icon-271"></i> <?php comments_number( '0', '1', '%' ); ?></span>
                </div>
            </div>
        </div>
        <div class="info-bottom">
            <?php if (! has_excerpt()) { ?>
                <div class="entry-description"><?php echo charityheart_substring( get_the_content(), 18, '...' ); ?></div>
            <?php } else { ?>
                <div class="entry-description"><?php echo charityheart_substring( get_the_excerpt(), 18, '...' ); ?></div>
            <?php } ?>
        </div>
    </div>
</article>