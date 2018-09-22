<?php
  /*
  Template Name: Home Page
  */
  
?>
<!-- First block -->
<div class="news col-sm-6">
  <i class="fa-angle-up fa arrow shrink"></i>
  <ul class="box-carousel">
    <?php
      $first = true;
      $the_query = new WP_Query('showposts=6&orderby=date&order=DESC&cat=-109,-139&lang=');
      while ($the_query -> have_posts()) : $the_query -> the_post();
      $show = 'second';
      if($first) {
      	$show = '';
      	$first = false;
      }
    ?>
    <li class="<?php echo $show; ?>">
      <ul class="lang-menu">
        <?php pll_the_languages( array( 'show_flags' => 1 ) ); ?>
      </ul>
      <a href="<?php the_permalink() ?>" class="float-hover"><?php echo $post->post_title; ?></a>
      <?php
        get_template_part('templates/entry-meta');
      ?>
    </li>
    <?php
      endwhile;
    ?>
  </ul>
  <i class="fa-angle-down fa arrow shrink"></i>
</div>
<div class="guest-post col-sm-6">
  <i class="fa-angle-up fa arrow shrink"></i>
  <ul class="box-carousel">
    <?php
      $first = true;
      $the_query = new WP_Query('showposts=6&orderby=date&order=DESC&cat=109,139&lang=');
      while ($the_query -> have_posts()) : $the_query -> the_post();
      $show = 'second';
      if($first) {
      	$show = '';
      	$first = false;
      }
    ?>
    <li class="<?php echo $show; ?>">
      <ul class="lang-menu">
        <?php pll_the_languages( array( 'show_flags' => 1 ) ); ?>
      </ul>
      <a href="<?php the_permalink() ?>" class="float-hover"><?php echo $post->post_title; ?></a>
      <?php
        get_template_part('templates/entry-meta');
      ?>
    </li>
    <?php
      endwhile;
    ?>
  </ul>
  <i class="fa-angle-down fa arrow shrink"></i>
</div>
<!-- Second block -->
<div class="last-events col-sm-12">
  <ul>
    <?php
      $i = 0;
      $the_query = new WP_Query('showposts=8&orderby=date&order=DESC&post_type=guest_post&lang=');
      while ($the_query -> have_posts()) : $the_query -> the_post();
      $i++;
    ?>
    <li class="first-block">
      <a alt="<?php the_permalink() ?>" href="<?php the_permalink() ?>" class="float-hover"><?php the_title(); ?></a>
    </li>
    <?php
      endwhile;
    ?>
    <li class="first-block">
      <a href="<?php echo get_site_url().'/guest-post/'; ?>" class="hover"><?php _e('Archive', 'roots'); ?></a>
    </li>
  </ul>
</div>