<?php $thumbsize = charityheart_get_blog_thumbsize();?>
<article <?php post_class('post list-default'); ?>>
    <div class="row list-inner">
        <?php
        $thumb = charityheart_display_post_thumb($thumbsize);
        if ( $thumb ) {
        ?>
            <div class="col-xs-5 image">
                <?php echo trim($thumb); ?>
            </div>
        <?php } ?>

        <div class="col-xs-<?php echo esc_attr( !empty($thumb) ? '7' : '12' ); ?> info">
          <div class="info-content">
            <div class="date">
                <?php the_time( get_option('date_format', 'M d, Y') ); ?>
            </div>
            <?php
                if (get_the_title()) {
                ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php
            }
            ?>
            <div class="meta">
                <span class="author"><?php the_author_posts_link(); ?></span>
                <span class="comments"><i class="mn-icon-271"></i> <?php comments_number( '0', '1', '%' ); ?></span>
            </div>
            <?php if (! has_excerpt()) { ?>
                <div class="entry-description"><?php echo charityheart_substring( get_the_content(), 22, '...' ); ?></div>
            <?php } else { ?>
                <div class="description"><?php echo charityheart_substring( get_the_excerpt(), 22, '...' ); ?></div>
            <?php } ?>
          </div>
        </div>
    </div>
</article>