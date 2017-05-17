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

<div id="primary" class="container">
	<main id="main" class="site-main" role="main">
	<div class="row">
		<div class="title col-md-12">
			<h2>
				Ultimi Articoli
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 car-row">	
		<?php echo do_shortcode('[wp_posts_carousel template="compact.css" post_types="post" all_items="10" show_only="newest" exclude="" posts="" ordering="des" categories="" relation="and" tags="" show_title="true" show_created_date="true" show_description="true" allow_shortcodes="false" show_category="true" show_tags="false" show_more_button="true" show_featured_image="true" image_source="thumbnail" image_height="60" image_width="100" items_to_show_mobiles="1" items_to_show_tablets="3" items_to_show="3" slide_by="3" margin="5" loop="true" stop_on_hover="true" auto_play="false" auto_play_timeout="1200" auto_play_speed="800" nav="false" nav_speed="300" dots="true" dots_speed="200" lazy_load="false" mouse_drag="false" mouse_wheel="false" touch_drag="true" easing="linear" auto_height="true" custom_breakpoints=":"]');_?>
		</div>
	</div>
	<script>
		var txt = 'psicoterapia';
		var txt2 = 'ricerca';
		var txt3 = 'journal';
		jQuery('.wp-posts-carousel-container .wp-posts-carousel-categories').each(function(){
		   console.log(jQuery(this));
		   if(jQuery(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1 && jQuery(this).text().toUpperCase().indexOf(txt2.toUpperCase()) != -1){
		       jQuery(this).parents( ".wp-posts-carousel-container" ).addClass('ricerca');
		   }else if(jQuery(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1 && jQuery(this).text().toUpperCase().indexOf(txt2.toUpperCase()) == -1){
		       jQuery(this).parents( ".wp-posts-carousel-container" ).addClass('psicoterapia');
		   }else if(jQuery(this).text().toUpperCase().indexOf(txt2.toUpperCase()) != -1){
		   	   jQuery(this).parents( ".wp-posts-carousel-container" ).addClass('ricerca');
		   }else if(jQuery(this).text().toUpperCase().indexOf(txt3.toUpperCase()) != -1){
		   	   jQuery(this).parents( ".wp-posts-carousel-container" ).addClass('journal');
		   }
		});
	</script>
	<div class="row">
		<div class="title col-md-12">
			<h2>
				Ultimi eventi
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 car-row">	
		<?php echo do_shortcode('[wp_posts_carousel template="compact.css" post_types="post" all_items="10" show_only="newest" exclude="" posts="" ordering="des" categories="143" relation="and" tags="" show_title="true" show_created_date="true" show_description="true" allow_shortcodes="false" show_category="true" show_tags="false" show_more_button="true" show_featured_image="true" image_source="thumbnail" image_height="60" image_width="100" items_to_show_mobiles="1" items_to_show_tablets="3" items_to_show="3" slide_by="3" margin="5" loop="true" stop_on_hover="true" auto_play="false" auto_play_timeout="1200" auto_play_speed="800" nav="false" nav_speed="300" dots="true" dots_speed="200" lazy_load="false" mouse_drag="false" mouse_wheel="false" touch_drag="true" easing="linear" auto_height="true" custom_breakpoints=":"]');_?>
		</div>
	</div>
	<div class="row">
		<div class="title col-md-12">
			<h2>
				Le nostre scuole
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php echo do_shortcode('[slick-slider design="design-2" dots="false"]'); ?> 
		</div>
		<div class="col-md-4">
		<?php // Show the selected frontpage content.
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/page/content', 'front-page' );
				endwhile;?>
		<?php
			else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
				get_template_part( 'template-parts/post/content', 'none' );
			endif; ?>	
			

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
