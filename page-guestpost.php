<?php
/* Template Name: Archive Guest Post */
?>
<?php get_template_part('templates/page', 'header'); ?>
  <?php
    $query = new WP_Query( array('post_type' => 'guest_post', 'posts_per_page' => -1 ));
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
<article <?php post_class(); ?>>
<header>
  <h2 class="entry-title">
    <a href="<?php the_permalink(); ?>"><?php echo the_title();?></a>
  </h2>
  <?php
    get_template_part('templates/entry-meta');
  ?>
</header>
</article>
        <?php
        endwhile;
    endif;
  ?>
