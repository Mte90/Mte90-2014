<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <title><?php echo wp_title('|', true, 'right'); ?></title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link rel="shortcut icon" href="http://mte90.net/favicon.ico" />
  <?php wp_head(); ?>
  <link href="<?php esc_url(get_feed_link()); ?>" rel="alternate" title="<?php get_bloginfo('name'); ?> Feed" type="application/rss+xml">
</head>