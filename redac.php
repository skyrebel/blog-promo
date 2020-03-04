<?php 
	if( is_page('redac') ) { } // Teste si la page est de type page 'redac'
?>

<?php // detecte la page comme un template à activer ds wordpress
/*
  Template Name: Redac
*/
?>

  <?php get_header(); ?>

    <main>
      <!-- redac section -->
      <div class="container-fluid my-5">
        <?php
          // 1. on défini ce que l'on veut
          $args = array(
              'post_type' => 'apprenants',
              'posts_per_page' => 16,
          );
          // 2. on exécute la query
          $apprenants_query = new WP_Query($args);
          echo '<div class="row justify-content-center">';
            // 3. on lance la boucle !
            if ($apprenants_query->have_posts()) : while ($apprenants_query->have_posts()) : $apprenants_query->the_post();
                echo '<div class="col-2 shadow my-5 mx-5 py-4 bg-card-white text-center poppins">';
                  //redac identity card
                  echo '<p>';
                      echo the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'alt' => 'avatar'));
                  echo '</p>';               
                  echo '<p class="h5 pt-3 text-uppercase font-weight-bold">';
                  echo get_post_meta($post->ID, '_apprenants_nom', true); 
                  echo '&nbsp;';
                  echo get_post_meta($post->ID, '_apprenants_prenom', true);
                  echo '</p>';
                  echo '<p class="pt-5 font-weight-bold">Liens utiles</p>';
                  echo '<p><a href="';
                  echo get_post_meta($post->ID, '_apprenants_github', true);
                  echo '" class="mb-2 social-link" target="_blank">Mon Github</a></p>';
                  echo '<p><a href="';
                  echo get_post_meta($post->ID, '_apprenants_linkedIn', true);
                  echo '" class="mb-2 social-link" target="_blank">Mon Linkedin</a></p>';
                  echo '<p><a href="';
                  echo get_post_meta($post->ID, '_apprenants_portfolio', true);
                  echo '" class="social-link" target="_blank">Mon Portfolio</a></p>';
                echo '</div>';  
            endwhile;
            endif;
            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
          echo '</div>'; 
        ?> 
      </div>
    </main>

  <?php get_footer(); ?>

