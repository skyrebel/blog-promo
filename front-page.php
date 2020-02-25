<?php 
	if( is_front_page('home') ) { } // Teste si la page est de type home
?>

<?php get_header(); ?>

	<h1>HOME</h1>

	<!-- derniers articles publiés -->
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
  
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