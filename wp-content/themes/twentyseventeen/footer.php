<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<p>Cognitivismo.com <a href="./redazione" title="" style="color: #fff; font-weight: 100; text-decoration: none;">| Redazione</a></p>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
	jQuery('header .glyphicon-menu-hamburger').click(function(event) {
		/* Act on the event */
		jQuery('.side-menu').addClass('active');
	});
	jQuery('.side-menu .glyphicon-remove').click(function(event) {
		/* Act on the event */
		jQuery('.side-menu').removeClass('active');
	});
</script>
</body>
</html>
