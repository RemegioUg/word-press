<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="clearfix widget-action <?php echo esc_attr($el_class.' '.$style); ?>">
    <div class="left-content">
    <?php if($subtitle!=''): ?>
        <div class="sub-title"><?php echo esc_attr( $subtitle ); ?></div>
    <?php endif; ?>
	<?php if($title!=''): ?>
        <h3 class="title" >
           <span><?php echo esc_attr( $title ); ?></span>
        </h3>
    <?php endif; ?>
    <?php if(trim($descript)!=''){ ?>
        <div class="description">
            <?php echo trim( $descript ); ?>
        </div>
    <?php } ?>
    </div>
    <?php if(trim($linkbutton1)!='' || trim($linkbutton2)!='' ){ ?>
        <div class="action">
            <?php if(trim($linkbutton1)!=''){ ?>
            <a class="btn <?php echo esc_attr( $buttons1 ); ?>" href="<?php echo esc_attr( $linkbutton1 ); ?>"> <?php echo trim( $textbutton1 ); ?> </a>
            <?php } ?>
        </div>
    <?php } ?>
</div>