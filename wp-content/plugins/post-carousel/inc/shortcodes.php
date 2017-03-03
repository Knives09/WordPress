<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Post Carousel shortcode
function post_carousel_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'id'         => '1',
		'items'      => '3',
		'pagination' => 'true',
	), $atts, 'post-carousel' ) );


	$args = array(
		'post_type'      => 'post',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => - 1,
	);


	$que = new WP_Query( $args );


	$outline = '';

	$outline .= '
    <script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery("#sp-post-carousel-' . $id . '").owlCarousel({
			items: ' . $items . ',
			pagination: ' . $pagination . ',
			autoPlay: true,
			slideSpeed: 900,
			stopOnHover: false,
		});

    });
    </script>';


	$outline .= '<div id="sp-post-carousel-' . $id . '" class="sp-post-carousel-section">';
	if ( $que->have_posts() ) {
		while ( $que->have_posts() ) : $que->the_post();

			$outline .= '<div class="post-carousel text-center">';
			if ( has_post_thumbnail( $que->post->ID ) ) {
				$outline .= '<div class="post-carousel-thumb">';
				$outline .= '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail( $que->post->ID, 'post-carousel-thumb', array( 'class' => "post-carousel-image" ) ).'</a>';
				$outline .= '</div>';
			}
			$outline .= '<h2 class="post-carousel-title">';
			$outline .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
			$outline .= '</h2>';

			$outline .= '</div>'; //post carousel


		endwhile;
	} else {
		$outline .= '<h2 class="sp-not-found-any-post">' . __( 'No posts found', 'post-carousel' ) . '</h2>';
	}
	$outline .= '</div>';


	wp_reset_query();


	return $outline;

}

add_shortcode( 'post-carousel', 'post_carousel_shortcode' );

