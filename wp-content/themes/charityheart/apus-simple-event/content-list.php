<?php $event = apussimpleevent_event( get_the_ID() );
	$info = $event->getMetaFullInfo();
	$address = !empty($info['map']['value']['addess']) ? $info['map']['value']['addess'] : '';
	$startdate = !empty($info['startdate']['value']) ? $info['startdate']['value'] : '';
	$time = !empty($info['time']['value']) ? $info['time']['value'] : '';
?>
<article itemscope <?php post_class('event-list'); ?>>
	<?php do_action( 'apussimpleevent_before_event_loop_item' ); ?>
			<?php if ($startdate || $time): ?>
				<div class="info">
					<div class="date-info">
					<?php echo date('M d, Y ',$startdate); ?> - <?php echo trim($time); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="media-body">
				<div class="info-event">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
				</div>
				<?php if (! has_excerpt()) { ?>
                <div class="entry-description"><?php echo charityheart_substring( get_the_content(), 9, '...' ); ?></div>
	            <?php } else { ?>
	                <div class="entry-description"><?php echo charityheart_substring( get_the_excerpt(), 9, '...' ); ?></div>
	            <?php } ?>
			</div>
	<?php do_action( 'apussimpleevent_after_event_loop_item' ); ?>
</article>