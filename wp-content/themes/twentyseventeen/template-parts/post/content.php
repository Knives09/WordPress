<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="col-md-4 col-sm-4">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	global $post;
	$post_categories = wp_get_post_categories($post->ID);

	$cats = array();
     
	foreach($post_categories as $c){
    	$cat = get_category( $c );
    	//var_dump($cat);
   		 $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
}
?>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) {?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php }else{ ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="">
			</a>
		</div><!-- .post-thumbnail -->
	<?php }?>

	<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						twentyseventeen_posted_on();
					else :
						echo twentyseventeen_time_link();
						twentyseventeen_edit_link();
					endif;

				echo '</div><!-- .entry-meta -->';
			endif; ?>
			<span class="cat-tags-links">
				<span class="cat-links"> 
				<?php 
			if(is_front_page()){
				$x=1;
				foreach ($cats as $key) 
				{ ?>
					<strong><use href="#icon-folder-open" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-folder-open"></use> 
					<span class="screen-reader-text">Categorie</span>
					<a href="http://localhost:8080/WordPress/category/<?php echo($key['slug']); ?>/" rel="category tag"><?php echo($key['name']); ?></a><?php if($x!=count($cats)){echo(",");} $x++; ?> </strong>
				<?php 
				} 
			}
				?>
				</span>
			</span>
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
</div>
