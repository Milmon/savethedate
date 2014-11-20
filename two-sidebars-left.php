<?php
/**
 * Template Name: Two Left Sidebars
 * Description: Template for displaying a page with the sidebar on BOTH sides of the content area
 * @package Save the Date
 */

get_header(); ?>

<div class="two-left-sidebars">

	

	<div id="primary" class="content-area two-sides">
		<main id="main" class="site-main two-sides" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(2); ?>
	<?php get_sidebar(); ?>

</div><!-- end two-left-sidebars -->

<?php get_footer(); ?>