<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header2">
	<h1 onclick="location.href='<?php echo(home_url()); ?>'">cognitivismo.com</h1>
	<a href="#" title=""><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
</header><!-- /header -->
<div class="side-menu">
	<nav>
		<ul>
			<li><a href="./category/ricerca-in-psicoterapia-2/" title="">Ricerca</a></li>
			<li><a href="./category/psicoterapia-2/" title="">Psicoterapia</a></li>
			<li><a href="<?php echo(home_url());?>" title="">Homepage</a></li>
			<li><a href="./category/web-journal/" title="">Journal Club</a></li>
		</ul>
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	</nav>
</div>
<div class="main-menu">
	
</div>
<div id="page" class="site">
	<div class="headerslider">
			<?php
			if( is_home() || is_front_page() ){
	 	echo do_shortcode('[sp_imageslider speed="3000" auto_controls="false" autoplay_interval="3000" ]');}
			// get_template_part( 'template-parts/header/header', 'image' ); ?>
	</div>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<?php
	// If a regular post or page, and not the front page, show the featured image.
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) {
		echo '<div class="single-featured-image-header">';
		the_post_thumbnail( 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	}
	else if ( ! has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) )
	{
		echo '<div class="single-featured-image-header">';
		echo '<img src="http://wordpress/wp-content/uploads/2017/02/people-03.png" alt="">';
		echo '</div><!-- .single-featured-image-header -->';
	}
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
