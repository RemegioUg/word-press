<?php
   $job = get_post_meta( get_the_ID(), 'apus_testimonial_job', true );
?>
<div class="testimonials-body testimonials-v1">
   <div class="testimonials-profile">
      <div class="description"><?php echo charityheart_substring(get_the_excerpt(),35,'.') ?></div>
      <div class="testimonial-avatar ">
         <?php if(the_post_thumbnail('widget')){ ?>
               <?php the_post_thumbnail('widget'); ?>
         <?php } ?>
      </div>
      <div class="testimonial-meta">
         <h3 class="name-client"> <?php the_title(); ?></h3>
         <div class="job"><?php echo trim($job); ?></div>
      </div>
   </div> 
</div>