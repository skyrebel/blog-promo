<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" >
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<!-- **************** moteur de recherche ********************** -->

      <?php get_search_form(); ?>

      <!-- **************** end moteur de recherche***************** -->

      <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="header-img">
      <a href="<?php echo home_url( '/' ); ?>">
        <img src="<?php echo get_template_directory_uri(); ?> ./" alt="Logo">
      </a>  
    </header>
      <?php wp_body_open(); ?>