<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<section class="widget section-blog">
    <?php if( $title ) { ?>
    <div class="clearfix space-50">
        <h3 class="widget-title font-size-30 visual-title <?php echo (isset($alignment) && $alignment) ? esc_attr($alignment) :''; ?>">
           <span><?php echo trim( $title ); ?></span>
        </h3>
    </div>
    <?php } ?>

    <div class="widget-content">
        <ul class="service-timeline post-area">

          <?php
            $line_data = array();
            $items = (array) vc_param_group_parse_atts( $items );
            foreach ( $items as $data ) {
              $new_line = $data;
              $new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
              $new_line['content'] = isset( $data['content'] ) ? $data['content'] : '';
              $new_line['icon'] = isset( $data['icon'] ) ? $data['icon'] : '';
              $line_data[] = $new_line;
            }
          ?>

          <?php
          if($line_data): 
            $i = 1;
            foreach ($line_data as $key => $item):
          ?>
  				  <li class="entry-timeline clearfix">
              <div class="hentry">   
  			   		  <div class="hentry-box clearfix">
  			   			  <div class="content-inner">
                    <div class="date"><?php echo esc_html($item['date']) ?></div>
                    <div class="title"><?php echo esc_html($item['title']) ?></div>
                    <div class="content">
                      <?php echo esc_html($item['content']) ?>
                     </div>
                  </div>   
  			   		  </div>
              </div> 
  				  </li>
          <?php $i++; endforeach; endif; ?>  
				</ul>
    </div>
</section>