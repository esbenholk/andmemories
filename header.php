<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="loader">
		<img class="loading-sign" src="/wp-content/themes/andmemories/assets/icons/SVG/Asset1.svg">
	</div>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'template-parts/header/header', 'animation' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="header-element">
		
					<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
					<?php get_template_part( 'template-parts/header/social', 'links' ); ?>

			</div><!-- .header-element -->
		<?php endif; ?>
	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 * 
	 * to use for menu later
	 * 	<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>

	 */
	if ( ( is_single() || ( is_page() && ! AndMemories_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'AndMemories-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>
	

	<div class="page">
		<div id="content" class="page-content">
