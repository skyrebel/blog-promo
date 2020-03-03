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
      <div class="container-fluid mt-5">
        <?php
          // 1. on défini ce que l'on veut
          $args = array(
              'post_type' => 'apprenants',
              'posts_per_page' => 12,
          );
          // 2. on exécute la query
          $apprenants_query = new WP_Query($args);
          // 3. on lance la boucle !
          if ($apprenants_query->have_posts()) : while ($apprenants_query->have_posts()) : $apprenants_query->the_post();
            echo '<div class="row justify-content-center">';
              echo '<div class="col-2 shadow mt-5 mx-4 py-4 bg-card-white text-center poppins">';
                //redac identity card
                if ( has_post_thumbnail() ): //verif si img avatar 
										echo the_post_thumbnail();
								endif;                
                echo '<p class="h5 pt-3 font-weight-bold">';
                echo get_post_meta($post->ID, '_apprenants_nom', true); 
                echo get_post_meta($post->ID, '_apprenants_prenom', true);
                echo '</p>';
                echo '<p class="pt-5 font-weight-bold">Liens utiles</p>';
                echo '<p><a href="';
                get_post_meta($post->ID, '_apprenants_github', true);
                echo '" class="mb-2 social-link">Mon Github</a></p>';
                echo '<p><a href="';
                get_post_meta($post->ID, '_apprenants_linkedIn', true);
                echo '" class="mb-2 social-link">Mon Linkedin</a></p>';
                echo '<p><a href="';
                get_post_meta($post->ID, '_apprenants_portfolio', true);
                echo '" class="social-link">Mon Portfolio</a></p>';
                echo '</div>';  
            echo '</div>'; 
          endwhile;
          endif;
          // 4. On réinitialise à la requête principale (important)
          wp_reset_postdata();
        ?>
      </div>
    </main>

  <?php get_footer(); ?>

