<?php 
	if( is_single('single') ) { } // Teste si la page est de type single (article)
?>

<?php // detecte la page comme un template à activer ds wordpress
/*
  Template Name: single
*/
?>

	<?php get_header(); ?>

	<!--boucle: contrôle du contenu à afficher, affiche tt type de contenu, données de l'article à afficher ds la boucle ex the_title --> 
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<!--  articles -->
		<div class="container-fluid bg-main-news">
			<div class="container pt-5">
				<div class="row text-center playfair py-4 my-4">
					<div class="col-12">
						<h2 class="font-weight-bold mb-5 h1"><?php the_title(); ?></h2>   <!--titre article --> 
						<?php if ( has_post_thumbnail() ): ?> <!--verif si img article --> 
						<div class="post__thumbnail">
							<?php the_post_thumbnail('large', array('class' => 'img-fluid'));?>
						</div>
							<?php endif; ?>
						<div class="post__meta mt-4">
							<p>
								Publié le <strong><?php the_date(); ?></strong><br> <!--date article --> 
								par <strong><?php the_author(); ?></strong> <!--auteur article --> 
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container">
				<div class="row mb-5 pb-5">
					<div class="col-12">
						<div class="post__content"> <!--contenu de l'article --> 
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endwhile; endif; ?>
	

	<?php get_footer(); ?>