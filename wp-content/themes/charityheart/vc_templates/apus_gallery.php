<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$bcol = 12/$columns;
$images = $images ? explode(',', $images) : array();
$count = 1;
if ( !empty($images) ):
?>
	<div class="widget widget-gallery <?php echo esc_attr($el_class).' '.esc_attr($style);?>">
	    <?php if ($title!=''): ?>
	        <h3 class="widget-title">
	            <span><?php echo esc_attr( $title ); ?></span>
	        </h3>
	    <?php endif; ?>
	    <div class="widget-content">
			<div class="row">
				<?php foreach ($images as $image): ?>
					<?php $img = wp_get_attachment_image_src($image,'full'); ?>
					<?php if ( !empty($img) && isset($img[0]) ): ?>
						<div class="col-sm-<?php echo esc_attr($bcol); ?> col-xs-6">
							<div class="image <?php echo ($count%$columns == 0 ) ? 'last' : ''; ?>">
								<a href="<?php echo esc_url_raw($img[0]); ?>" class="popup-image">
		                    		<img src="<?php echo esc_url_raw($img[0]); ?>" alt="">
		                    	</a>
	                    	</div>
	                    </div>
	                <?php endif; ?>
				<?php $count++;  endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>