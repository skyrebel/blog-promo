	<?php 
		if( is_front_page('home') ) { } // Teste si la page est de type home
	?>

	<?php // detecte la page comme un template à activer ds wordpress
	/*
	Template Name: home
	*/
	?>

	<?php get_header(); ?>

	<!--boucle: contrôle du contenu à afficher, affiche tt type de contenu, données de l'article à afficher ds la boucle ex the_title --> 
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

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
							'posts_per_page' => 2
						);
						// 2. on exécute la query
						$projets_query = new WP_Query($args);
						// 3. on lance la boucle !
						if ($projets_query->have_posts()) : while ($projets_query->have_posts()) : $projets_query->the_post();
						// Echo some markup
						// echo 'bouibouibouiboui';
						// As with regular posts, you can use all normal display functions, such as
						// Within the loop, you can access custom fields like so:
						echo '<h4 class="text-uppercase mt-4">';
						the_title();
						echo get_post_meta($post->ID, '_projets_titre', true) .'<br>';
						echo '</h4>'; 
						echo '<a class="mt-5 img-project img-fluid" alt="photo projet">'; 
						echo get_post_meta($post->ID, '_projets_image', true).'<br>';
						echo '</a>';  
						// Or like so:
						// $personnes = get_post_custom_values('personnes');
						// echo $personnes[0];
						// echo 'yo'; // Markup closing tags.
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
                            <p><img src="medias/img-articles.png" alt=""></p>
                        </div>
                        <div class="col-6 poppins align-self-center">
                            <h4>TITLE ARTICLE</h4>
                            <p>Accedat huc suavitas quaedam oportet sermonum atque morum, haudquaquam mediocre condimentum amicitiae. Tristitia autem et in omni re severitas habet illa quidem gravitatem, sed amicitia remissior esse debet et liberior et dulcior et ad omnem comitatem facilitatemque.</p>
                        </div>
                        <div class="row mt-5 pt-5">
                            <div class="col-6 poppins align-self-center text-right">
                                <h4>TITLE ARTICLE</h4>
                                <p>Accedat huc suavitas quaedam oportet sermonum atque morum, haudquaquam mediocre condimentum amicitiae. Tristitia autem et in omni re severitas habet illa quidem gravitatem, sed amicitia remissior esse debet et liberior et dulcior et ad omnem comitatem facilitatemque.</p>
                            </div>
                            <div class="col-6 text-left">
                                <p><img src="medias/img-articles.png" alt=""></p>
                            </div>    
                        </div>
                        <div class="row my-5 py-5">
                            <div class="col-6 text-right">
                                <p><img src="medias/img-articles.png" alt=""></p>
                            </div>
                            <div class="col-6 poppins align-self-center">
                                <h4>TITLE ARTICLE</h4>
                                <p>Accedat huc suavitas quaedam oportet sermonum atque morum, haudquaquam mediocre condimentum amicitiae. Tristitia autem et in omni re severitas habet illa quidem gravitatem, sed amicitia remissior esse debet et liberior et dulcior et ad omnem comitatem facilitatemque.</p>
                            </div>    
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


  	<!-- derniers articles publiés -->
	<article class="post">
		<h2><?php the_title(); ?></h2>   <!--titre article --> 

	<?php if ( has_post_thumbnail() ): ?> <!--verif si img article --> 
		<div class="post__thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
		
		<p class="post__meta">
			Publié le <?php the_time( get_option( 'date_format' ) ); ?> <!--date article --> 
			par <?php the_author(); ?>  <!--auteur article --> 
		</p>
		
		<?php the_excerpt(); ?>   <!--extrait de l'article --> 
			
		<p> <!--lien vers l'article --> 
			<a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
		</p>
	</article>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>