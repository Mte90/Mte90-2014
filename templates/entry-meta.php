<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<span class="cat">
  <?php
    echo ' - '.get_the_category_list( __( ', ', 'roots' ) )
    
  ?>
</span>