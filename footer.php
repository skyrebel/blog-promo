	<footer class="site__footer">
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
	</footer>


<?php wp_footer(); ?>
  <!-- Vous pourriez ajouter votre script Google Analytics ici -->

  <?php get_template_part( 'newsletter' ); ?>
</body>
</html>