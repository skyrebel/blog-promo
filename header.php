<!DOCTYPE html>
<html <?php language_attributes(); ?> > <!-- langue du site -->
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" > <!-- encodage du site -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bienvenue sur le blog des gitbreakers ou vous pourrez retrouvez toutes les actualitées de la dernière promo en date.">
    <meta name="author" content="Sylvain SANTOS, Rayan SADKI, Hugo BACQUET, Fiona PEREIRA GOMES">
    <meta name="category" content="Blog">
    <meta name="Keywords"
        content="Blog, Actualités, Developpeur Web, Designer Web, OnlineFormaPro, Acces Code School, Retro">

    <!-- Facebook -->

    <meta property="og:locale" content="fr_FR">
    <meta property="og:title" content="Blog des Gitbreakers">
    <meta property="og:description" content="Bienvenue sur le blog des gitbreakers ou vous pourrez retrouvez toutes les actualitées de la dernière promo en date.">
    <meta property="og:image" content="http://hugob.promo-vesoul33.codeur.online/gitbreakers/medias/logo.png">
    <meta property="og:url" content="http://hugob.promo-vesoul33.codeur.online/gitbreakers/index.html">

    <!-- Twitter -->

    <meta name="twitter:title" content="Blog des Gitbreakers">
    <meta name="twitter:description" content="Bienvenue sur le blog des gitbreakers ou vous pourrez retrouvez toutes les actualitées de la dernière promo en date.">
    <meta name="twitter:image" content="http://hugob.promo-vesoul33.codeur.online/gitbreakers/medias/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="https://twitter.com/love">

<html lang="fr-FR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="style.css">

      <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="header-img">
      
      
      <?php wp_head(); ?> <!-- chargement scripts et styles, et titre activé ds function.php -->
  </head>

  <body> 

    <header>  <!-- logo du site -->
      <h1><img src="<?php echo get_template_directory_uri(); ?> ./assets/medias/logo.png" alt="Logo"></h1>
        
      <!-- menu -->
      
    </header>
    

  <!-- plein de choses entre -->
</head>

<body <?php body_class(); ?>>
  <header class="site__header">
   
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

