<?php
/**
 * Template for displaying search forms in And Memories
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( AndMemories_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'AndMemories' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'AndMemories' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo AndMemories_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'AndMemories' ); ?></span></button>
</form>
