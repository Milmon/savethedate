<?php
/**
 * @package Save the Date
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<?php savethedate_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'savethedate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php savethedate_entry_footer(); ?>
	<hr class="section-divider"></hr><!-- **Added 10/11/2014** -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->