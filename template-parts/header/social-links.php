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
	<?php
	
	$instagram = get_field('instagram', 2);
	$shop = get_field( "shop", 2);
	$email = get_field( "email", 2);
	?> 




	<div class="social-links">

		<?php if( $email): ?>
				<a class="button" href="mailto:<?php echo $email?>"><img src="/wp-content/themes/andmemories/assets/icons/mail.png"/></a>
		<?php endif; ?>
		
		<?php if( $shop): ?>
				<a class="button" href="<?php echo esc_url( $shop ); ?>"><img src="/wp-content/themes/andmemories/assets/icons/shop.png"/></a>
		<?php endif; ?>


		<?php if( $instagram ): ?>
			<a class="button" href="<?php echo esc_url( $instagram ); ?>"><img src="/wp-content/themes/andmemories/assets/icons/instagram.png"/></a>
		<?php endif; ?>
	



	</div>



	


