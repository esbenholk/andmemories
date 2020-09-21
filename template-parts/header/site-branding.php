<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 * @version 1.0
 */

?>


		<div class="header-title">
	
			<h2 class="header-text header-tag"><?php bloginfo( 'description' ); ?></h2>
			<h2 class="header-text header-name"><?php bloginfo( 'name' ); ?></h2>
	

		
		</div>

		<?php if ( ( AndMemories_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'AndMemories' ); ?></span></a>
	<?php endif; ?>

