<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$items = (array) vc_param_group_parse_atts( $items );
if ( !empty($items) ):
?>
	<div class="widget widget-features-box <?php echo esc_attr($el_class); ?> <?php echo esc_attr($style); ?>">
		<?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo esc_attr( $title ); ?></span>
	    </h3>
	    <?php endif; ?>
	    <div class="content">
		    <?php if($number > 1) echo '<div class="row">'; ?>
			<?php foreach ($items as $item): ?>

				<?php if ( isset($item['image']) && $item['image'] ) $image_bg = wp_get_attachment_image_src($item['image'],'full'); ?>

				<?php if($number > 1) echo '<div class="col-xs-12 col-sm-'.(12/$number).'">'; ?>
				<div class="feature-box clearfix" >
					<?php if(isset( $image_bg[0]) && $image_bg[0] ) { ?>
						<div class="fbox-icon">
							<img src="<?php echo esc_url_raw($image_bg[0]); ?>" alt="">
						</div>
					<?php }elseif (isset($item['icon']) && $item['icon']) { ?>
				        <div class="fbox-icon">
				        	<div class="inner">
				            	<i class="<?php echo esc_attr($item['icon']); ?>"></i>
				            </div>
				        </div>
				    <?php } ?>
				    <div class="fbox-content ">  
				    	<?php if (isset($item['title']) && trim($item['title'])!='') { ?>
				            <h3 class="ourservice-heading"><?php echo trim($item['title']); ?></h3>
				        <?php } ?>
				        <?php if (isset($item['description']) && trim($item['description'])!='') { ?>
				            <div class="description"><?php echo trim( $item['description'] );?></div>  
				        <?php } ?>
				        <?php if(isset($item['button_link']) && $item['button_link'] && isset($item['button_text']) && $item['button_text'] ){ ?>
						    <div class="reamore">
						    	<a class="btn-readmore" href="<?php echo esc_attr($item['button_link']); ?>" ><?php echo trim($item['button_text']); ?> <i class="fa fa-chevron-right"></i> </a>
						    </div>
					    <?php } ?> 
				    </div> 
				</div>
				<?php if($number > 1) echo '</div>'; ?>
			<?php endforeach; ?>
			<?php if($number > 1) echo '</div>'; ?>
		</div>
	</div>
<?php endif; ?>