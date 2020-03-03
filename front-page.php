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
					<h3>
						<img src="<?php bloginfo('template_url'); ?>/assets/medias/title-palmares.png" class="img-fluid" width="220" height="208" alt="palmarès"/>
					</h3>
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
						echo '<a class="img-fluid" alt="photo projet">'; 
						echo the_post_thumbnail( 'thumbnail', array('class' => 'img-project mt-5') );
						echo '</a>'; 
						echo '<h4 class="text-uppercase playfair mt-4">';
						the_title();
						echo get_post_meta($post->ID, '_projets_titre', true) .'<br>';
						echo '</h4>'; 
						endwhile;
						endif;
						// 4. On réinitialise à la requête principale (important)
						wp_reset_postdata();
						?>
                </div>
					<span><img src="<?php bloginfo('template_url'); ?>/assets/medias/span-palmares.png" width="16" height="1507" class="my-5 img-fluid" alt="divider"/></span>					
				   
				<!-- main section: dépêches-->			
				<div class="col-9 mt-5">
                    <h3 class="text-center">
						<img src="<?php bloginfo('template_url'); ?>/assets/medias/dernieres-depeches.png" class="my-5 img-fluid" width="260" height="172" alt="dernières dépêches"/>
					</h3>
                    <div class="row mt-5 pt-5">
                        <div class="col-6 align-self-center text-right poppins">					
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
								echo '<h4 class="playfair">';
								the_title();
								echo get_post_meta($post->ID, '_article_titre', true);
								echo '</h4>'; 
								echo '<p>';
								echo get_post_meta($post->ID, '_article_extrait', true);
								echo '</p>';
						echo '</div>';
						echo '<div class="col-6 text-left">';
								echo get_post_meta($post->ID, '_article_image', true);
								endwhile;
								endif;
								// 4. On réinitialise à la requête principale (important)
								wp_reset_postdata();
							?>
                    	</div>
                	</div>
				</div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h3>
						<img src="<?php bloginfo('template_url'); ?>/assets/medias/title-quartier-general.png" class="img-fluid" width="930" height="228" alt="Quartier General"/>
					</h3>
				</div>
		</div>
		<div class="container-fluid pl-0">
			<div class="row py-5 my-5">
				<div class="col-3 pl-0">
					<img src="<?php bloginfo('template_url'); ?>/assets/medias/hand.png" width="353" height="361" alt="doigt pointe carte"/>
				</div>
				<div class="col-7">
					<!-- Insérer la map Leaflet -->
					<?php dynamic_sidebar( 'map-widget' ); ?>
				</div>
			</div>
		</div>
	</main>

	<?php get_footer(); ?>