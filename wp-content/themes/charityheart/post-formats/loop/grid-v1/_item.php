<?php $thumbsize = charityheart_get_blog_thumbsize();?>

<article <?php post_class('post post-grid grid-noimage'); ?>>
    <div class="date">
        <a href="<?php the_permalink(); ?>"><?php the_time( get_option('date_format', 'M d, Y') ); ?></a>
    </div>
    <div class="entry-content <?php echo (has_post_thumbnail())?'':'no-thumb'; ?>">
        <div class="entry-meta">
            <div class="info">
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
            </div>
        </div>
        <div class="info-bottom">
            <?php if (! has_excerpt()) { ?>
                <div class="entry-description"><?php echo charityheart_substring( get_the_content(), 25, '...' ); ?></div>
            <?php } else { ?>
                <div class="entry-description"><?php echo charityheart_substring( get_the_excerpt(), 25, '...' ); ?></div>
            <?php } ?>
        </div>
    </div>
</article>