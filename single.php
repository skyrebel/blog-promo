<?php 
	if( is_single('article') ) { } // Teste si la page est de type single (lit article)
?>

<?php get_header(); ?>

	<h1>SINGLE</h1>

	<!-- derniers articles publiés -->
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<article class="post">
		<h2><?php the_title(); ?></h2>   <!--titre article --> 

		<?php if ( has_post_thumbnail() ): ?> <!--verif si img article --> 
			<div class="post__thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="post__meta">
			<p>
			Publié le <?php the_date(); ?> <!--date article --> 
			par <?php the_author(); ?> <!--auteur article --> 
			</p>
		</div>

		<div class="post__content"> <!--contenu de l'article --> 
			<?php the_content(); ?>
		</div>
		</article>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>