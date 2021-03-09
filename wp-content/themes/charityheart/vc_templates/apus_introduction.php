<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<?php $img = wp_get_attachment_image_src($images,'full'); ?>
<div class="widget widget-introduction <?php echo esc_attr($el_class); ?>">
    <?php if ( trim($subtitle)!='' ) { ?>
        <h4 class="subtitle">
            <?php echo trim( $subtitle ); ?>
        </h4>
    <?php } ?>
    <?php if ( trim($subtitle)!='' ) { ?>
        <div class="title">
            <?php echo trim( $title ); ?>
        </div>
    <?php } ?>
    <?php if ( trim($descript)!='' ) { ?>
        <div class="description">
            <?php echo trim( $descript ); ?>
        </div>
    <?php } ?>
    <?php if( isset($img[0]) ) { ?>
        <img src="<?php echo esc_url_raw($img[0]);?>" title="<?php echo esc_attr($title); ?>" class="image-icon" alt="">
    <?php } ?>
    <?php if ( trim($name)!='' ) { ?>
        <div class="name">
            <?php echo trim( $name ); ?>
        </div>
    <?php } ?>
    <?php if ( trim($job)!='' ) { ?>
        <div class="job">
            <?php echo trim( $job ); ?>
        </div>
    <?php } ?>
</div>