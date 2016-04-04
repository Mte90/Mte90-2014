<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<span class="byline author">
  <?php
    echo __('By', 'roots');
  ?>
  <a class="fn" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author(); ?></a>
</span>
<span class="cat">
  <?php
    echo ' - '.get_the_category_list( __( ', ', 'roots' ) )

  ?>
</span>
