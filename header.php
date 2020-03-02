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
    <meta property="og:url" content="http://hugob.promo-vesoul33.codeur.online/gitbreakers">

    <!-- Twitter -->

    <meta name="twitter:title" content="Blog des Gitbreakers">
    <meta name="twitter:description" content="Bienvenue sur le blog des gitbreakers ou vous pourrez retrouvez toutes les actualitées de la dernière promo en date.">
    <meta name="twitter:image" content="http://hugob.promo-vesoul33.codeur.online/gitbreakers/medias/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="https://twitter.com/love">
    
      <?php wp_head(); ?><!-- chargement scripts et styles, et titre activé ds function.php -->
  </head>

  <body <?php body_class('bg-brown'); ?>>
        <?php wp_body_open(); ?> <!-- pr extensions notamment yoast -->
    
    <!-- header section -->
    <header class="site__header bg-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-7 text-center">
                <!-- logo du site -->
                <h1>
                <?php
		              $custom_logo_id = get_theme_mod('custom_logo');
		              $image = wp_get_attachment_image_src($custom_logo_id , 'full');
	              ?>
                  <img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-fluid pb-5 margin-logo mt-4" alt="logo" width="736" height="101">
                </h1>                   
            </div>
            <!-- widget header PROMO -->
            <?php dynamic_sidebar( 'widget-header' ); ?>
        </div>
      </div> 
      <!-- menu -->
      <div class="container-fluid bg-blue old-press">
            <div class="container">
                <div class="row justify-content-around">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <?php
                            wp_nav_menu(array(
                                    'theme_location' => 'header',
                                    'div' => 'ul', 
                                    'ul_class' => 'navbar-nav list-unstyled text-uppercase h2', 
                                    'li_class' => 'nav-item mx-5 px-5',
                                    'a_class' => 'black nav-link',
                                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                    'walker' => new wp_bootstrap_navwalker())
                            );
                          ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
     </header> 







