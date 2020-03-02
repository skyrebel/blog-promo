<?php 
	if( is_page('redac') ) { } // Teste si la page est de type page 'redac'
?>

<?php // detecte la page comme un template à activer ds wordpress
/*
  Template Name: Redac
*/
?>

  <?php get_header(); ?>

<<<<<<< HEAD

<?php
/*
Template Name: gitbreakers
*/

// Votre code ici
?>
<!--boucle: contrôle du contenu à afficher, affiche tt type de contenu, données de l'article à afficher ds la boucle ex the_title --> 
<<<<<<< HEAD
<h1><?php the_title(); ?></h1>
	<?php the_post_thumbnail(); ?>
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
echo get_post_meta($post->ID, '_apprenants_avatar', true).'<br>';

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
=======
=======
    <main>
      <!-- redac section -->
      <div class="container-fluid mt-5">
          <div class="row justify-content-center">
              <div class="col-2 shadow mt-5 mx-4 py-4 bg-card-white text-center poppins">
                <!-- redac identity card -->
                <?php if ( has_post_thumbnail() ): ?> <!--verif si img avatar --> 
                  <div class="post__thumbnail">
                    <?php the_post_thumbnail(); ?>
                  </div>
                <?php endif; ?>
                <?php
                  // 1. on défini ce que l'on veut
                  $args = array(
                      'post_type' => 'apprenants',
                      'posts_per_page' => 12
                  );
                  // 2. on exécute la query
                  $apprenants_query = new WP_Query($args);
                  // 3. on lance la boucle !
                  if ($apprenants_query->have_posts()) : while ($apprenants_query->have_posts()) : $apprenants_query->the_post();
                    echo '<p class="h5 pt-3 font-weight-bold">';
                    echo get_post_meta($post->ID, '_apprenants_nom', true); 
                    echo get_post_meta($post->ID, '_apprenants_prenom', true);
                    echo '</p>';
                    echo '<p class="pt-5 font-weight-bold">Liens utiles</p>';
                    echo '<p class="mb-2 social-link">';
                    echo get_post_meta($post->ID, '_apprenants_github', true);
                    echo '</p>';
                    echo '<p class="mb-2 social-link">';
                    echo get_post_meta($post->ID, '_apprenants_linkedIn', true);
                    echo '</p>';
                    echo '<p class="social-link">';
                    echo get_post_meta($post->ID, '_apprenants_portfolio', true);
                    echo '</p>';  
                  endwhile;
                  endif;
                  // 4. On réinitialise à la requête principale (important)
                  wp_reset_postdata();
                ?>
              </div>
          </div>
          <div class="row justify-content-center mb-5">
            <div class="col-2 shadow mb-5 mt-5 mx-4 py-4 bg-card-white text-center poppins">
              <!-- redac identity card -->
              <?php if ( has_post_thumbnail() ): ?> <!--verif si img avatar--> 
                <div class="post__thumbnail">
                  <?php the_post_thumbnail(); ?>
                </div>
              <?php endif; ?>
              <?php
                // 1. on défini ce que l'on veut
                $args = array(
                    'post_type' => 'apprenants',
                    'posts_per_page' => 4
                );
                // 2. on exécute la query
                $apprenants_query = new WP_Query($args);
                // 3. on lance la boucle !
                if ($apprenants_query->have_posts()) : while ($apprenants_query->have_posts()) : $apprenants_query->the_post();
                  echo '<p class="h5 pt-3 font-weight-bold">';
                  echo get_post_meta($post->ID, '_apprenants_nom', true); 
                  echo get_post_meta($post->ID, '_apprenants_prenom', true);
                  echo '</p>';
                  echo '<p class="pt-5 font-weight-bold">Liens utiles</p>';
                  echo '<p class="mb-2 social-link">';
                  echo get_post_meta($post->ID, '_apprenants_github', true);
                  echo '</p>';
                  echo '<p class="mb-2 social-link">';
                  echo get_post_meta($post->ID, '_apprenants_linkedIn', true);
                  echo '</p>';
                  echo '<p class="social-link">';
                  echo get_post_meta($post->ID, '_apprenants_portfolio', true);
                  echo '</p>';  
                  endwhile;
                  endif;
                  // 4. On réinitialise à la requête principale (important)
                  wp_reset_postdata();
              ?>
            </div>
          </div>
      </div>
    </main>
>>>>>>> 1664430d5529c6330c410ae7543f995c4054ccdb

  <?php get_footer(); ?>
>>>>>>> 61f544cb07b456695edc92bccc29388b8dcf4f7b
