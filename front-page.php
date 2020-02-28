	<?php 
		if( is_front_page('home') ) { } // Teste si la page est de type home
	?>

	<?php // detecte la page comme un template à activer ds wordpress
	/*
	Template Name: home
	*/
	?>

	<?php get_header(); ?>

	<!-- main section: palmarès-->
	<main>
        <div class="container-fluid mt-5 bg-main">
            <div class="row my-5 py-5">
                <div class="col-2 text-center mt-5">
					<h3><img src="./blog/rootprojet/wp-content/themes/gitbreakers/assets/medias/title-palmares.png" class="img-fluid" alt="palmarès"></h3>
					<?php
						// 1. on défini ce que l'on veut
						$args = array(
							'post_type' => 'projets',
							'posts_per_page' => 4
						);
						// 2. on exécute la query
						$projets_query = new WP_Query($args);
						// 3. on lance la boucle !
						if ($projets_query->have_posts()) : while ($projets_query->have_posts()) : $projets_query->the_post();
						echo '<h4 class="text-uppercase mt-4">';
						the_title();
						echo get_post_meta($post->ID, '_projets_titre', true) .'<br>';
						echo '</h4>'; 
						echo '<a class="mt-5 img-project img-fluid" alt="photo projet">'; 
						echo get_post_meta($post->ID, '_projets_image', true).'<br>';
						echo '</a>';  
						endwhile;
						endif;
						// 4. On réinitialise à la requête principale (important)
						wp_reset_postdata();
						?>
                </div>
					<span><img src="medias/span-palmares.png" class="my-5 img-fluid" alt="divider"></span>
					
			   	<!-- main section: dépêches-->			
				<div class="col-9 mt-5">
                    <h3 class="text-center"><img src="medias/dernieres-depeches.png" alt=""></h3>
                    <div class="row mt-5 pt-5">
                        <div class="col-6 text-right">					
							<?php
								// 1. on défini ce que l'on veut
								$args = array(
									'post_type' => 'article',
									'posts_per_page' => 3
								);
								// 2. on exécute la query
								$article_query = new WP_Query($args);
								// 3. on lance la boucle !
								if ($article_query->have_posts()) : while ($article_query->have_posts()) : $article_query->the_post();
								echo '<h4>';
								the_title();
								echo get_post_meta($post->ID, '_article_titre', true);
								echo '</h4>'; 
								echo '<p>';
								echo get_post_meta($post->ID, '_article_extrait', true);
								echo '</p>';
						echo '</div>';
						echo '<div class="col-6 poppins align-self-center">';
								echo get_post_meta($post->ID, '_article_image', true);
								endwhile;
								endif;
								// 4. On réinitialise à la requête principale (important)
								wp_reset_postdata();
							?>
                    <div class="row mt-5 pt-5">
						<div class="col-6 poppins align-self-center text-right">
							<h4>TITLE ARTICLE</h4>
							<p>Accedat huc suavitas quaedam oportet sermonum atque morum, haudquaquam mediocre condimentum amicitiae. Tristitia autem et in omni re severitas habet illa quidem gravitatem, sed amicitia remissior esse debet et liberior et dulcior et ad omnem comitatem facilitatemque.</p>
						</div>
						<div class="col-6 text-left">
							<p><img src="medias/img-articles.png" alt=""></p>
						</div>    
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h3><img src="medias/title-quartier-general.png" class="img-fluid" alt="Quartier General"></h3>
                </div>
                <div class="row py-5 my-5">
                    <div class="col-3 p-0">
                        <img src="medias/hand.png" alt="">
                    </div>
                    <div class="col-9">
                        <!-- Insérer la map Leaflet -->
                    </div>
                </div>
            </div>
		</div>
	</main>

	<?php get_footer(); ?>