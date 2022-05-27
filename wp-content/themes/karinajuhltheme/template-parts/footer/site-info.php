<?php
/**
 * Displays footer site info
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<span class="copyright">
		<span>
            <img src="http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/cropped-logo.png"
 alt="kj_logo">
			
		</span>
        <span>
            <p>Vores Info</p>
        </span>
	
	</span>
</div><!-- .site-info -->
<style>
      #colophon {
  background-image: url("http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/footer_traer.jpg");
  background-repeat: no-repeat;
    background-size: 140%;

}

</style>