<!DOCTYPE html>
<<<<<<< HEAD
<html <?php language_attributes(); ?> > <!-- langue du site -->
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" > <!-- encodage du site -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<<<<<<< HEAD
=======
<html lang="fr-FR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="style.css">
>>>>>>> cdaed9443787d43e97c6ac9d6865cc422e98493e

<!-- **************** moteur de recherche ********************** -->

<<<<<<< HEAD
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
    
=======
  <!-- plein de choses entre -->
</head>

<body <?php body_class(); ?>>
  <header class="site__header">
    <a href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo">
    </a>
  </header>
  <?php wp_body_open(); ?>

<?php
/************************************************************************* Debut fonction menu principal  ******************************************************************************************/ 
  
    wp_nav_menu(
        array(
            'theme_location' => 'main',
            'container' => 'ul', // afin d'éviter d'avoir une div autour 
            'menu_class' => 'site__header__menu', // ma classe personnalisée 
        )
    );
/************************************************************************* Fin fonction menu principal  ******************************************************************************************/ 
>>>>>>> cdaed9443787d43e97c6ac9d6865cc422e98493e
