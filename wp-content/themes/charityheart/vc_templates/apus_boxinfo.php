<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget widget-boxinfo <?php echo esc_attr($el_class); ?> ">
    <?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo esc_attr( $title ); ?></span>
        </h3>
    <?php endif; ?>
    <div class="info-inner">
        <?php if (!empty($description)) { ?>
            <div class="widget-description">
                <?php echo trim( $description ); ?>
            </div>
        <?php } ?>
        <?php if(trim($button_url)!=''){ ?>
            <a class=" btn-link" href="<?php echo esc_attr( $button_url ); ?>"> <?php esc_html_e('Read More','charityheart'); ?> </a>
        <?php } ?>
    </div>
</div>