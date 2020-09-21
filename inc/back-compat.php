<?php
/**
 * And Memories back compat functionality
 *
 * Prevents And Memories from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 */

/**
 * Prevent switching to And Memories on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since And Memories 1.0
 */
function AndMemories_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'AndMemories_upgrade_notice' );
}
add_action( 'after_switch_theme', 'AndMemories_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * And Memories on WordPress versions prior to 4.7.
 *
 * @since And Memories 1.0
 *
 * @global string $wp_version WordPress version.
 */
function AndMemories_upgrade_notice() {
	/* translators: %s: The current WordPress version. */
	$message = sprintf( __( 'And Memories requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'AndMemories' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since And Memories 1.0
 *
 * @global string $wp_version WordPress version.
 */
function AndMemories_customize() {
	wp_die(
		/* translators: %s: The current WordPress version. */
		sprintf( __( 'And Memories requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'AndMemories' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'AndMemories_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since And Memories 1.0
 *
 * @global string $wp_version WordPress version.
 */
function AndMemories_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: The current WordPress version. */
		wp_die( sprintf( __( 'And Memories requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'AndMemories' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'AndMemories_preview' );
