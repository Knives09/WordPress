<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	//$t = wp_get_post_tags(the_ID());
	?>
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
