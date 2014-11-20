<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Save the Date
 */
?>

			</div><!-- #content -->
		</div>
	</div><!-- .content-area full -->

	<div class="footer-area full">
		<div class="main-page">	
			<footer id="colophon" class="site-footer inner" role="contentinfo">

				<!-- footer widget area for social media icons, etc. -->
				<div id="footer-widget"><!-- This following code displays the widget area within the footer div -->
					<?php if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
                    				<?php dynamic_sidebar( 'sidebar-3' ); ?>
            				<?php } ?>
				</div><!-- end #footer-widget -->

				<!-- footer menu next line -->
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
				
				<div class="site-info">
					<p class="copyright">&copy;<?php 
						$startYear = 2011;
        					$thisYear = date('y');
        					if ($startYear == $thisYear){
                  				echo $startYear;
        					}
                  				else {
               					echo "{$startYear}&#8211;{$thisYear}"; }
					?> Milmon F. Harrison, PhD &middot; All Rights Reserved 
					<span class="sep"> &middot; </span>
					<?php printf( __( '%1$s theme by %2$s', 'savethedate' ), '"Save the Date"', '<a 								href="http://www.milmondesign.com" rel="designer">milmonDesign.com</a>' ); ?></p><!-- end .copyright -->

				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- .main-page -->
	</div><!-- .footer-area full -->

<?php wp_footer(); ?>

</body>
</html>