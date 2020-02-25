<!DOCTYPE html>
<html <?php language_attributes(); ?> > <!-- langue du site -->
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" > <!-- encodage du site -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<<<<<<< HEAD

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
=======
      
      <?php wp_head(); ?> <!-- chargement scripts et styles, et titre activé ds function.php -->
  </head>

  <body> 

    <header>  <!-- logo du site -->
      <h1><img src="<?php echo get_template_directory_uri(); ?> ./assets/medias/logo.png" alt="Logo"></h1>
>>>>>>> 0f8a2c30c54f6a008b6dc206088b5b5137809e9b
    </header>
    