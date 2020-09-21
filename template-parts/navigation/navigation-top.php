<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'AndMemories' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo AndMemories_get_svg( array( 'icon' => 'bars' ) );
		echo AndMemories_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'AndMemories' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>
</nav><!-- #site-navigation -->
