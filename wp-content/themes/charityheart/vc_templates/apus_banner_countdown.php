<?php 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$time = strtotime( $input_datetime );
$style = '';
$fstyle = '';

if( $image ){
	$img = wp_get_attachment_image_src( $image,'full' );
	if( isset($img[0]) ){
		$style = 'style="background-image:url(\''.esc_url($img[0]).'\')"';
	}
}
?>
<?php if($style_widget == 'style_blue') {?>
<div class="banner-countdown-widget style-2 <?php echo esc_attr($el_class); ?>" <?php echo trim($style); ?>>
	<div class="inner">

			<div class="countdown-wrapper">
			    <div class="apus-countdown" data-time="timmer"
			         data-date="<?php echo date('m',$time).'-'.date('d',$time).'-'.date('Y',$time).'-'. date('H',$time) . '-' . date('i',$time) . '-' .  date('s',$time) ; ?>">
			    </div>
			</div>

			<?php if( isset($title) && $title ) : ?>
			<h3 <?php echo trim($fstyle); ?>><?php echo trim($title); ?></h3>
			<?php endif; ?>	

			<?php if( isset($sub_title) && $sub_title ) : ?>
			<h5><?php echo trim($sub_title); ?></h5>
			<?php endif; ?>	

			<?php if( isset($descript) && $descript ) : ?>
			<div class="des" <?php echo trim($fstyle); ?>><?php echo trim($descript); ?></div>
			<?php endif; ?>	
			<?php if( isset($linkbutton) && $linkbutton ) : ?>
				<a href="<?php echo esc_url($linkbutton) ?>" class="btn btn-outline btn-white" ><?php echo esc_html__('read more','charityheart'); ?></a>
			<?php endif; ?>	

	</div>	
</div>
<?php } else{ ?>
<div class="banner-countdown-widget default <?php echo esc_attr($el_class); ?>" <?php echo trim($style); ?>>
	<div class="inner">
			<?php if( isset($sub_title) && $sub_title ) : ?>
			<h5><?php echo trim($sub_title); ?></h5>
			<?php endif; ?>	
			<?php if( isset($title) && $title ) : ?>
			<h3 <?php echo trim($fstyle); ?>><?php echo trim($title); ?></h3>
			<?php endif; ?>	
			<?php if( isset($descript) && $descript ) : ?>
			<div class="des" <?php echo trim($fstyle); ?>><?php echo trim($descript); ?></div>
			<?php endif; ?>	
			<div class="countdown-wrapper countdown-wrapper-default">
			    <div class="apus-countdown" data-time="timmer"
			         data-date="<?php echo date('m',$time).'-'.date('d',$time).'-'.date('Y',$time).'-'. date('H',$time) . '-' . date('i',$time) . '-' .  date('s',$time) ; ?>">
			    </div>
			</div>
			<?php if( isset($linkbutton) && $linkbutton ) : ?>
				<a href="<?php echo esc_url($linkbutton) ?>" class="btn btn-outline btn-white" ><?php echo esc_html__('read more','charityheart'); ?></a>
			<?php endif; ?>	
	</div>	
</div>
<?php } ?>