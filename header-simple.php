<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600">
  <?php
    wp_enqueue_style(
      'main-styles',
      get_template_directory_uri() . '/style.css', array(),
      filemtime(get_template_directory() . '/style.css'),
      false
    );
  ?>
  <?php wp_enqueue_script( 'wallop', get_template_directory_uri() . '/js/Wallop.min.js', false, 2.4, true); ?>
  <?php wp_enqueue_script( 'adaptive', get_template_directory_uri() . '/js/adaptive-backgrounds.js', false, 1.0, true); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="op-content  op-content-fullheight">
