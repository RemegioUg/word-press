<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget-video widget no-margin">
	<?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo trim($title); ?></span>
        </h3>
    <?php endif; ?>
    <div class="video-wrapper-inner">
	<div class="video">
		<?php $img = wp_get_attachment_image_src($image,'full'); ?>
		<?php if ( !empty($img) && isset($img[0]) ): ?>
			<a class="popup-video" href="<?php echo esc_url_raw($video_link); ?>">
				<span class="icon"><i class="fa fa-play" aria-hidden="true"></i></span>
        		<img src="<?php echo esc_url_raw($img[0]); ?>" alt="">
        	</a>
        <?php endif; ?>
	</div>
	<?php if ($description!=''): ?>
        <div class="description"><?php echo trim($description); ?></div>
    <?php endif; ?>
	</div>
</div>