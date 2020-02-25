<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="style.css">


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