<!DOCTYPE html>
<html <?php language_attributes(); ?> > <!-- langue du site -->
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" > <!-- encodage du site -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<html lang="fr-FR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="style.css">


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
      
      <?php wp_head(); ?> <!-- chargement scripts et styles, et titre activé ds function.php -->
  </head>

  <body> 

    <header>  <!-- logo du site -->
      <h1><img src="<?php echo get_template_directory_uri(); ?> ./assets/medias/logo.png" alt="Logo"></h1>
    </header>
    

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

