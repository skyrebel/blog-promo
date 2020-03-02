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
                <div class="row my-5 py-5">
                    <div class="col-6">
						<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
							<?php if ( has_post_thumbnail() ): ?> <!--verif si img article --> 
								<div class="post__thumbnail img-fluid" alt="img-projet" >
									<?php the_post_thumbnail(); ?>
								</div>
							<?php endif; ?>
                    </div>
                    <div class="col-6 poppins align-self-center text-left">
						<article class="post playfair">
							<h4><?php the_title(); ?></h4>   <!--titre article --> 
								<p class="post__meta poppins">
									Publié le <?php the_time( get_option( 'date_format' ) ); ?> <!--date article --> 
									par <?php the_author(); ?>  <!--auteur article --> 
								</p>
								<p class="poppins">				
									<?php the_excerpt(); ?>   <!--extrait de l'article --> 
								</p>
								<p class="poppins"> <!--lien vers l'article --> 
									<a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
								</p>
						</article>
						<?php endwhile; endif; ?>
                    </div>
				</div>
			</div>
		<!-- pagination -->
		<div class="container-fluid">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
	</main>

	<?php get_footer(); ?>