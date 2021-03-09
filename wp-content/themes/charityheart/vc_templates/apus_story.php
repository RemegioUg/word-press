<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget widget-story <?php echo esc_attr($el_class); ?> ">
    <?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo esc_attr( $title ); ?></span>
        </h3>
    <?php endif; ?>
    <?php if (!empty($name) || !empty($disease)) { ?>
        <div class="info">
            <span class="name-disease"><?php echo trim( $name ); ?></span>
            <span> / <?php echo trim( $disease ); ?></span>
        </div>
    <?php } ?>
     <?php if (!empty($description)) { ?>
        <div class="widget-description">
            <?php echo trim( $description ); ?>
        </div>
    <?php } ?>
    
</div>