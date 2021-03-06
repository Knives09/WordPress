<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

include 'noMenu-header.php'; ?>
<div class="container list-cont">
	<div class="row">
		<?php if ( have_posts() ) : ?>
			<header class="col-md-12">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php endif; ?>
	</div>

	<div class="row">
		<div class="col-md-4 col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<div class="row">

	<div class="content-area">
		<main id="main" class="site-main container" role="main">

		<?php
		if ( have_posts() ) : ?>
				<div class="row">
					<?php
					$x=0;
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', get_post_format() );
						$x++;
						if($x>2){
							$x=0;
							echo('</div><div class="row">');
						}
					endwhile;

					?>
				</div>
			<?php

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
</div><!-- .wrap -->

<?php get_footer();
