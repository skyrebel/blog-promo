<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="header">
  <a href="http://wp.local/">
      <img src="http://wp.local/wp-content/themes/gitbreakers/img/screenshot.png" alt="Logo" />
</a>
  </header>
    <?php wp_body_open(); ?>