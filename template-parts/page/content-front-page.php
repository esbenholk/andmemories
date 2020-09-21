<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'AndMemories-panel ' ); ?> >

	<?php
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'AndMemories-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>
	<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

	<?php
					the_content(

					);
					?>
	

</article><!-- #post-<?php the_ID(); ?> -->
