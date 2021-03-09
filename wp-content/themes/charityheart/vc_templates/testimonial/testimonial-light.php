<?php
   $job = get_post_meta( get_the_ID(), 'apus_testimonial_job', true );
   $link = get_post_meta( get_the_ID(), 'apus_testimonial_link', true );
?>
<div class="testimonials-body light">
   <div class="testimonials-profile">
         <?php if (! has_excerpt()) { ?>
             <div class="description"><?php echo charityheart_substring( get_the_content(), 25, '.' ); ?></div>
         <?php } else { ?>
             <div class="description"><?php echo charityheart_substring( get_the_excerpt(), 25, '.' ); ?></div>
         <?php } ?>
         <div class="testimonial-meta">
            <div class="info">
               <h3 class="name-client"> <?php the_title(); ?></h3>
               <div class="info">
                  <span><?php echo trim($job); ?></span>
                  <a class="text-theme" href="<?php echo esc_url_raw($link); ?>"><?php echo trim($link); ?></a>
               </div>
            </div>
         </div>
   </div> 
</div>