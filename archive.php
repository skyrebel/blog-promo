<?php get_header(); ?>

	<h1>ARCHIVE</h1>


	<!-- /************************************  Appel de l'image mise en avant *************************************/-->

	<?php
  get_header();
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	
	<h1><?php the_title(); ?></h1>
	<?php the_post_thumbnail(); ?>

<?php
  endwhile;
  endif;
?>

	<?php get_template_part( 'newsletter' ); ?>
<?php get_footer(); ?>