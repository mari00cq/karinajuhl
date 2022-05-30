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
<style>

	.copyright img {
		max-width: 60%;
	}

	.site-info .copyright {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
	}

	.copyright > span:nth-child(1){
		grid-column: 1/2;
		place-self: center;
	}

	.copyright > span:nth-child(2){
		grid-column: 2/3;
		place-self: center;
	}

	.site-info .copyright span:nth-child(2){
		text-align: center;	
	}

	.copyright > span:nth-child(3){
		grid-column: 3/4;
		place-self: center;	
	}

	.copyright p {
		text-align: center;
		color: black;
	}

	@media screen and (max-width:480px) {
		.site-info {
		font-size: 0.5rem;
		}
	}

</style>

<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<span class="copyright">
		<span>
		<p>ADRESSE</p>
		<p>Hyben Alle 92</p>
		<p>2770 Kastrup</p>
		<p>CVR: 29357021</p>
		</span>

        <span>
		<img src="http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/cropped-logo.png"
 alt="kj_logo">
        </span>
		
		<span>
			<p>KONTAKT</p>
			<p>Tlf: 50 80 11 50</p>
			<p>Mail: yelvabeauty@gmail.com</p>
</span>
	
	</span>
</div><!-- .site-info -->
<style>
      #colophon {
  background-image: url("http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/Image-2.jpg");
  background-repeat: no-repeat;
    background-size: cover;



}

</style>