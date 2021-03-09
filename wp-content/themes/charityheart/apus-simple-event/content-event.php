<?php $event = apussimpleevent_event( get_the_ID() );
	$metas = $event->getMetaFullInfo();
	$startdate = isset($metas['startdate']) ? $metas['startdate']['value'] : '';
	$info = $event->getMetaFullInfo();
	$address = !empty($info['map']['value']['addess']) ? $info['map']['value']['addess'] : '';
	$startdate = !empty($info['startdate']['value']) ? $info['startdate']['value'] : '';
	$time = !empty($info['time']['value']) ? $info['time']['value'] : '';
?>
<article itemscope <?php post_class('event-grid'); ?>>
	<?php do_action( 'apussimpleevent_before_event_loop_item' ); ?>
	
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="event-thumb">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
					the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) );
				?>
			</a>
		</div>
	<?php } ?>
	<div class="info-event">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<?php if (! has_excerpt()) { ?>
        <div class="entry-description"><?php echo charityheart_substring( get_the_content(), 30, '...' ); ?></div>
        <?php } else { ?>
            <div class="entry-description"><?php echo charityheart_substring( get_the_excerpt(), 30, '...' ); ?></div>
        <?php } ?>

		<div class="event-info clearfix">
			<?php if($startdate !=''){ ?>
				<div class="date">
					<span class="day"><?php echo date('d', $startdate); ?></span>
					<span class="moth"><?php echo date('M', $startdate); ?></span>
				</div>
			<?php } ?>	
			<div class="event-right">
				<?php if($time !=''){ ?>
					<span>
						<i class="mn-icon-1102 text-theme"></i><?php echo trim($time); ?>
					</span>
				<?php } ?>

				<?php if($address !=''){ ?>
					<span>
						<i class="mn-icon-1142 text-theme"></i><?php echo trim($address); ?>
					</span>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php do_action( 'apussimpleevent_after_event_loop_item' ); ?>
</article>