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
      $the_query = new WP_Query('showposts=6&orderby=date&order=DESC&cat=-32'); 
      while ($the_query -> have_posts()) : $the_query -> the_post();
      if($first) {
      	$show = '';
      	$first = false;
      } else {
      	$show = 'second';
      } 
    ?>
    <li class="<?php echo $show; ?>">
      <?php echo cml_show_flags(array('only_existings' => true)); ?>
      <a href="<?php the_permalink() ?>" class="float-hover"><?php echo $post->post_title; ?></a>
      <?php
        get_template_part('templates/entry-meta');
        $metadesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
        if (!empty($metadesc)) { echo '<p>'.$metadesc.'</p>'; } 
        else { the_excerpt(); }
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
      $the_query = new WP_Query('showposts=6&orderby=date&order=DESC&category_name=video'); 
      while ($the_query -> have_posts()) : $the_query -> the_post(); 
      if($first) {
      	$show = '';
      	$first = false;
      } else {
      	$show = 'second';
      }
    ?>
    <li class="<?php echo $show; ?>">
      <?php echo cml_show_flags(array('only_existings' => true)); ?>
      <a href="<?php the_permalink() ?>" class="float-hover"><?php echo $post->post_title; ?></a>
      <?php
        get_template_part('templates/entry-meta');
        $metadesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
        if (!empty($metadesc)) { echo '<p>'.$metadesc.'</p>'; } 
        else { the_excerpt(); }
      ?>
    </li>
    <?php
      endwhile;
    ?>
  </ul>
  <i class="fa-angle-down fa arrow shrink"></i>
</div>
<!-- Second block -->
<div class="about-box col-sm-4">
  <h3>
    <i class="fa fa-thumbs-up"></i>
    <a href="<?php echo get_site_url().'/about/'; ?>">
      <?php
        _e('Who am I?' , 'roots');
      ?>
    </a>
  </h3>
  <span>
    <?php
      _e('I am an open source enthusiast' , 'roots');
    ?>
  </span>
</div>
<div class="hobby col-sm-4">
  <h3>
    <i class="fa fa-github-square"></i>
    <a href="http://github.com/Mte90">
      <?php
        _e('My project' , 'roots');
      ?>
    </a>
  </h3>
  <span>
    <?php
      _e('My open source projects <i class="fa fa-heart"></i>' , 'roots');
    ?>
  </span>
</div>
<div class="job col-sm-4">
  <h3>
    <i class="fa fa-comments"></i>
    <a href="http://codeat.it">
      <?php
        _e('My Job' , 'roots');
      ?>
    </a>
  </h3>
  <span>
    <?php
      _e('I, my passions and my work' , 'roots');
      
    ?>
  </span>
</div>
<!-- Third block -->
<div class="last-events col-sm-12">
  <i class="fa-angle-left fa arrow shrink"></i>
  <i class="fa-angle-right fa arrow shrink"></i>
  <ul>
    <?php
      $i = 0;
      $the_query = new WP_Query('showposts=5&orderby=date&order=DESC&post_type=guest_post'); 
      while ($the_query -> have_posts()) : $the_query -> the_post(); 
      $i++;
      if($i < 4) {
      	$block = 'first-block';
      }else {
      	$block = 'second-block';
      }
    ?>
    <li class="<?php echo $block; ?>">
      <a alt="<?php the_permalink() ?>" href="<?php the_permalink() ?>" class="float-hover"><?php the_title(); ?></a>
    </li>
    <?php
      endwhile;
    ?>
    <li class="second-block">
      <a href="<?php echo get_site_url().'/guest-post/'; ?>" class="hover"><?php _e('Archive', 'roots'); ?></a>
    </li>
  </ul>
</div>