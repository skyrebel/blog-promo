<?php 
	if( is_page('news') ) { } // Teste si page news
?>

<?php // detecte la page comme un template à activer ds wordpress
/*
  Template Name: news
*/
?>

	<?php get_header(); ?>

	<main>
		<!-- Liste des articles  -->
		<div class="container-fluid bg-main-news">
            <div class="container">
				<?php
					// 1. on défini ce que l'on veut
					$args = array(
						'orderby'  => 'date',
						'order'  => 'desc',
					);
					// 2. on exécute la query
					$article_query = new WP_Query($args);
					$i=0;
					// 3. on lance la boucle !
					if ($article_query->have_posts()) : while ($article_query->have_posts()) : $article_query->the_post();
					if($i==0){
						echo '<div class="row mt-5 pt-5 post">';
							echo '<div class="col-5 offset-1">';
								if ( has_post_thumbnail() ):
								echo the_post_thumbnail('medium_large', array('class' => 'img-fluid'));
								endif; 
							echo '</div>';
							echo '<div class="col-5 poppins align-self-center">';
								echo '<h4 class="playfair text-uppercase">';
								echo the_title();					
								echo '</h4>'; 
								echo '<p>';
								echo the_excerpt();
								echo '</p>';
								echo '<p>' ,"Publié le ";
								echo the_time ( get_option( 'date_format' ) );
								echo '</p>';
								echo '<p>', "par ";
								echo the_author();
								echo '</p>';
								echo '<a href="';
								echo the_permalink();
								echo '" class="post__link article-link">Lire la suite</a>';
							echo '</div>';
						echo '</div>';							
					$i=1;
					}
					else{
						echo '<div class="row mt-5 pt-5">';
							echo '<div class="col-5 offset-1 poppins align-self-center text-right">';		
								echo '<h4 class="playfair text-uppercase">';
								echo the_title();					
								echo '</h4>'; 
								echo '<p>';
								echo the_excerpt();
								echo '</p>';
								echo '<p>' ,"Publié le ";
								echo the_time ( get_option( 'date_format' ) );
								echo '</p>';
								echo '<p>', "par ";
								echo the_author();
								echo '</p>';
								echo '<a href="';
								echo the_permalink();
								echo '" class="post__link article-link">Lire la suite</a>';
							echo '</div>';
							echo '<div class="col-5 text-left">';
								echo the_post_thumbnail('medium_large', array('class' => 'img-fluid')); 
							echo '</div>';
						echo '</div>';
					$i=0;
					}								
					endwhile;
					endif;
					// 4. On réinitialise à la requête principale (important)
					wp_reset_postdata();
				?>
            </div>
		</div>
		<div class="container-fluid">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 d-flex justify-content-center">
                       <!-- pagination -->
						<?php posts_nav_link(); // Après la boucle ?>
						<div class="site__navigation">
							<div class="site__navigation__prev">
								<?php previous_posts_link(); ?>
							</div>
							<div class="site__navigation__next">
								<?php next_posts_link(); ?> 
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
	</main>

	<?php get_footer(); ?>