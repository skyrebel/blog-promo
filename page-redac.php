<?php 
	if( is_page('redac') ) { } // Teste si la page est de type page 'redac'
?>

<?php // detecte la page comme un template à activer ds wordpress
/*
  Template Name: Redac
*/
?>

<?php get_header(); ?>

<!--boucle: contrôle du contenu à afficher, affiche tt type de contenu, données de l'article à afficher ds la boucle ex the_title --> 

<?php

// 1. on défini ce que l'on veut
$args = array(
    'post_type' => 'apprenants',
    'posts_per_page' => 2
);

// 2. on exécute la query
$apprenants_query = new WP_Query($args);

// 3. on lance la boucle !
 if ($apprenants_query->have_posts()) : while ($apprenants_query->have_posts()) : $apprenants_query->the_post();
// Echo some markup
// echo 'bouibouibouiboui';
// As with regular posts, you can use all normal display functions, such as

// Within the loop, you can access custom fields like so:
echo '<p>';
the_title();
echo get_post_meta($post->ID, '_apprenants_nom', true) .'<br>'; 
echo get_post_meta($post->ID, '_apprenants_prenom', true).'<br>';
echo get_post_meta($post->ID, '_apprenants_github', true).'<br>';
echo get_post_meta($post->ID, '_apprenants_linkedIn', true).'<br>';
echo get_post_meta($post->ID, '_apprenants_portfolio', true).'<br>';
echo '</p>';  
// Or like so:
// $personnes = get_post_custom_values('personnes');
// echo $personnes[0];
// echo 'yo'; // Markup closing tags.
endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
?>

<?php get_footer(); ?>