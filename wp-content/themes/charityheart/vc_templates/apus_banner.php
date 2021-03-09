<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<?php $img = wp_get_attachment_image_src($image,'full'); ?>
<div class="widget widget-banner <?php echo esc_attr($el_class); ?> <?php echo ($style != '') ? esc_attr($style) :''; ?> ">

    <div class="content">
        <?php if( isset($img[0]) ) { ?>
            <img src="<?php echo esc_url_raw($img[0]);?>" title="<?php echo esc_attr($title); ?>" class="image" alt="<?php echo esc_attr($title); ?>">
        <?php }  ?>
        <div class="infor">
            <?php if ($title!=''): ?>
                <h3 class="widget-title">
                    <?php if ($icon != ''){ ?> <i class="<?php echo esc_attr( $icon ); ?>"></i> <?php } ?><span><?php echo esc_attr( $title ); ?></span>
                </h3>
            <?php endif; ?>
            <div class="info-inner">
                <?php if (!empty($description)) { ?>
                    <div class="widget-description">
                        <?php echo trim( $description ); ?>
                    </div>
                <?php } ?>
                <?php if(trim($button_url)!=''){ ?>
                    <a class="btn btn-theme" href="<?php echo esc_attr( $button_url ); ?>"> <?php esc_html_e('Join Us','charityheart'); ?> </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>