<?php 
get_header();
do_action('warp9_after_body');
?>
	

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					
					
							<?php the_content(); ?>
							
							<?php wp_link_pages();?>
					

				<?php endwhile; ?>

			<?php endif; ?>

<?php get_footer();  ?>