<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="style.css">


    <!-- plein de choses entre -->
</head>

<body <?php body_class(); ?>>
  <header class="header-img">
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/screenshot.png" alt="Logo">
    </a>  
  </header>
    <?php wp_body_open(); ?>