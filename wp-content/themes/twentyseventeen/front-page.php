<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<div class="title">
		<h2>
			Ultimi Articoli
		</h2>
	</div>
<?php echo do_shortcode('[wp_posts_carousel template="compact.css" post_types="post" all_items="10" show_only="newest" exclude="" posts="" ordering="des" categories="" relation="and" tags="" show_title="true" show_created_date="true" show_description="true" allow_shortcodes="false" show_category="true" show_tags="false" show_more_button="true" show_featured_image="true" image_source="thumbnail" image_height="60" image_width="80" items_to_show_mobiles="1" items_to_show_tablets="3" items_to_show="3" slide_by="3" margin="5" loop="true" stop_on_hover="true" auto_play="false" auto_play_timeout="1200" auto_play_speed="800" nav="false" nav_speed="800" dots="true" dots_speed="800" lazy_load="false" mouse_drag="false" mouse_wheel="false" touch_drag="true" easing="linear" auto_height="true" custom_breakpoints=":"]');_?>
<div class="title">
		<h2 style="margin-top: 20px; margin-bottom: 50px;">
			FOTO
		</h2>
	</div>
	<div style="max-width: 50%; max-height: 50%; display: block;float: left; height: 300px; border:1px solid black;">
	<?php echo do_shortcode('[slick-slider design="design-2" dots="false"]'); ?> 
	</div>
		<?php // Show the selected frontpage content.
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
		else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>

		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== twentyseventeen_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in Twenty Seventeen.
			 *
			 * @since Twenty Seventeen 1.0
			 *
			 * @param $num_sections integer
			 */
			$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
			global $twentyseventeencounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$twentyseventeencounter = $i;
				twentyseventeen_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== twentyseventeen_panel_count() ) ends here. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
