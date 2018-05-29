<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My_Cafe
 */

$theme_options = my_cafe_theme_options();

?>

</main>

 <footer class="site-footer">

 	<?php if( 1 === $theme_options['enable_social_media'] ){ ?>

 	<aside class="sidebar sidebar-footer">
 		<div class="container">
 			<div class="footer-widget-area">

 			<div class="row">

 				<div class="col-xs-12 col-sm-12 col-md-12 social-icon">
 					<div class="list-icon">
 							<h4 class="widget-title"> <?php echo esc_html( 'Follow us', 'my-cafe' ) ?> </h4>
 						
 						<?php echo do_action( 'my_cafe_social_media' ); ?>

 						<div class="clearfix"></div>
 					</div><!--list-icon-->
 				</div><!--social-icon-->

 			</div><!--row-->
 			</div><!--footer-widget-area-->
 		</div><!--container-->
 	</aside>

 	<?php } ?>

 	<div class="copyright-area">
 		<div class="container">
 			<div class="footer-container">

 			 <nav class="navigation navigation-footer">

 			 	<?php
					wp_nav_menu( array(
						'theme_location'  	=> 'footer',
						'container' 		=> 'ul',
    					'menu_class' 		=> 'footer',
    					'menu_id' 			=> 'footer-menu',
    					'depth' 			=> 1,
					) );
				?>

 			 	
 			 </nav><!--navigation-footer-->


 			<div class="copyright-text">

 				<?php echo esc_html( $theme_options['copyright_text'] );

			if(!empty( $theme_options['copyright_text'] )) { ?>
			<span class="sep"> | </span>
			<?php } ?>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'my-cafe' ), 'My Cafe', '<a href="http://astaporthemes.com/">Astapor Themes</a>' );
			?>
		</div><!-- .site-info -->


 			</div><!--footer-container-->
 		</div><!--container-->
 	</div><!--copyright-area-->
 </footer>
 
 <?php wp_footer(); ?>

</body>
</html>