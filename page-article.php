<?php 
	if( is_page('article') ) { } // Teste si la page est de type page 'article'
?>

<?php // detecte la page comme un template à activer ds wordpress
/*
  Template Name: articles
*/
?>

<?php get_header(); ?>

<!--boucle: contrôle du contenu à afficher, affiche tt type de contenu, données de l'article à afficher ds la boucle ex the_title --> 

<?php

// 1. on défini ce que l'on veut
$args = array(
    'post_type' => 'article',
    'posts_per_page' => 2
);

// 2. on exécute la query
$article_query = new WP_Query($args);

// 3. on lance la boucle !
 if ($article_query->have_posts()) : while ($article_query->have_posts()) : $article_query->the_post();
// Echo some markup
// echo 'bouibouibouiboui';
// As with regular posts, you can use all normal display functions, such as

// Within the loop, you can access custom fields like so:
echo '<p>';
the_title();
echo get_post_meta($post->ID, '_article_titre', true) .'<br>'; 
echo get_post_meta($post->ID, '_article_image', true).'<br>';
echo get_post_meta($post->ID, '_article_contenu', true).'<br>';
echo get_post_meta($post->ID, '_article_extrait', true).'<br>';
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