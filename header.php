<!DOCTYPE html>
<html <?php language_attributes(); ?> > <!-- langue du site -->
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" > <!-- encodage du site -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      
      <?php wp_head(); ?> <!-- chargement scripts et styles, et titre activé ds function.php -->
  </head>

  <body> 

    <header>  <!-- logo du site -->
      <h1><img src="<?php echo get_template_directory_uri(); ?> assets/medias/logo.png" alt="Logo"></h1>
        
      <!-- menu -->
      <?php 
        wp_nav_menu(
          array(
              'theme_location' => 'main',
              'container' => 'ul', // afin d'éviter d'avoir une div autour 
              'menu_class' => 'site__header__menu', // ma classe personnalisée 
          )
        );
      ?>
    </header>
    