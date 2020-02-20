<?php
/*
Template Name: Nom du modèle
*/

// Votre code ici
?>

<?php get_header(); ?>

<?php

// 1. on défini ce que l'on veut
$args = array(
    'post_type' => 'personnes',
    'posts_per_page' => 5
);

// 2. on exécute la query
$personnes_query = new WP_Query($args);

// 3. on lance la boucle !
if ($personnes_query->have_posts()) : while ($personnes_query->have_posts()) : $personnes_query->the_post();
// Echo some markup
// echo 'bouibouibouiboui';
// As with regular posts, you can use all normal display functions, such as

// Within the loop, you can access custom fields like so:
echo '<p>';
the_title();
echo get_post_meta($post->ID, '_personnes_age', true) .'<br>'; 
echo get_post_meta($post->ID, '_personnes_ville', true).'<br>';
echo '</p>';  
// Or like so:
// $personnes = get_post_custom_values('personnes');
// echo $personnes[0];
// echo 'yo'; // Markup closing tags.
endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();