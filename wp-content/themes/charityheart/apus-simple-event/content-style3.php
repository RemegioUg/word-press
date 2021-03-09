<?php $event = apussimpleevent_event( get_the_ID() );
	$info = $event->getMetaFullInfo();
	$address = !empty($info['map']['value']['addess']) ? $info['map']['value']['addess'] : '';
	$startdate = !empty($info['startdate']['value']) ? $info['startdate']['value'] : '';
	$time = !empty($info['time']['value']) ? $info['time']['value'] : '';
?>
<article itemscope <?php post_class('event-style3'); ?>>

	<div class="event-thumbnail">
		<?php the_post_thumbnail('charityheart-event-large'); ?>
		<div class="event-content">
			<?php if ($startdate): ?>
				<div class="date-info">
					<?php echo date('d M Y', $startdate); ?>
				</div>
			<?php endif; ?>
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			<div class="info-metas">
				<div class="meta-time">
					<i class="mn-icon-1102"></i>
					<?php echo trim($time); ?>
				</div>
				<div class="meta-address">
					<i class="mn-icon-1142"></i>
					<?php echo trim($address); ?>
				</div>
			</div>
		</div>
	</div>

</article>