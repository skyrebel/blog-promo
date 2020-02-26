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
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="content">
    	<?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>