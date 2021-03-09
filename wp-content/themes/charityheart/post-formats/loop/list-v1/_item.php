<article <?php post_class('post post-list style1'); ?>>
    <div class="info">
      <div class="info-content">
        <?php
            if (get_the_title()) {
            ?>
                <h4 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
            <?php
        }
        ?>
        <a href="<?php the_permalink(); ?>" class="date"><?php the_time( get_option('date_format', 'M d, Y') ); ?></a>
      </div>
    </div>
</article>