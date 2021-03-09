<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<?php if($style == 'style_medium'){ ?>
    <div class="widget widget-text-heading <?php echo esc_attr($el_class).' '.esc_attr($style); ?>">
        <?php if(wpb_js_remove_wpautop( $content, true )){ ?>
            <div class="title">
                <?php echo wpb_js_remove_wpautop( $content, true ); ?>
            </div>
        <?php } ?>
        <?php if ( trim($subtitle)!='' ) { ?>
            <h4 class="subtitle">
                <?php echo trim( $subtitle ); ?>
            </h4>
        <?php } ?>
        <?php if ( trim($descript)!='' ) { ?>
            <div class="description">
                <?php echo trim( $descript ); ?>
            </div>
        <?php } ?>
    </div>
<?php } else {?>
    <div class="widget widget-text-heading <?php echo esc_attr($el_class).' '.esc_attr($style); ?>">
        <?php if ( trim($subtitle)!='' ) { ?>
            <h4 class="subtitle">
                <?php echo trim( $subtitle ); ?>
            </h4>
        <?php } ?>
        <?php if(wpb_js_remove_wpautop( $content, true )){ ?>
            <div class="title">
                <?php echo wpb_js_remove_wpautop( $content, true ); ?>
            </div>
        <?php } ?>
        <?php if ( trim($descript)!='' ) { ?>
            <div class="description">
                <?php echo trim( $descript ); ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>