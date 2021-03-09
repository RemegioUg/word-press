<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget widget-contact <?php echo esc_attr($el_class); ?>" >
    <?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo esc_attr( $title ); ?></span>
        </h3>
    <?php endif; ?>
   	<div class="social">
   		<?php if(trim($facebook_url)!=''){ ?>
            <a  href="<?php echo esc_attr( $facebook_url ); ?>"> <i class="mn-icon-1405"></i> </a>
        <?php } ?>
       	<?php if(trim($twitter_url)!=''){ ?>
            <a href="<?php echo esc_attr( $twitter_url ); ?>"> <i class="mn-icon-1406"></i> </a>
        <?php } ?>
        <?php if(trim($linked_url)!=''){ ?>
            <a href="<?php echo esc_attr( $linked_url ); ?>"> <i class="mn-icon-1408"></i> </a>
        <?php } ?>
        <?php if(trim($skype_url)!=''){ ?>
            <a href="<?php echo esc_attr( $skype_url ); ?>"> <i class="mn-icon-1422"></i> </a>
        <?php } ?>
   	</div>
   	<div class="info">
   		<?php if(!empty($mail)){ ?>
   			<span> <i class="mn-icon-220"></i> <?php echo trim($mail); ?> </span>
   		<?php } ?>
   		<?php if(!empty($phone)){ ?>
   			<span> <i class="mn-icon-256"></i> <?php echo trim($phone); ?> </span>
   		<?php } ?>
   	</div>
</div>