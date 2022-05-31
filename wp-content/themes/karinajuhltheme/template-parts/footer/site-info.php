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
		max-width: 35%;
	}

	#colophon {
		padding-top: 3%;
		padding-bottom: 3%;
	}

	.site-info .copyright {
		display: grid;
		grid-template-columns: 1fr 1fr;
	}

	.copyright > span:nth-child(1){
		grid-column: 1/2;
		place-self: center;
	}

	.copyright > span:nth-child(2){
		grid-column: 1/3;
		place-self: center;
	}

	.copyright > span:nth-child(3){
		grid-column: 2/3;
		place-self: center;	
		grid-row: 1/2;
	}

	@media screen and (min-width:810px) {
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

	.copyright > span:nth-child(3){
		grid-column: 3/4;
		place-self: center;	
	}

	.facebook {
		width: 20%;
	}

	.instagram {
		width: 20%;
	}
}

	.site-info .copyright span:nth-child(2){
		text-align: center;	
	}
	.copyright p {
		text-align: center;
		color: #394C3F;
	}

	@media screen and (max-width:480px) {
		.site-info {
		font-size: 0.5rem;
		}
	}

	.social-media {
		display: flex;
		justify-content: center;
		gap: 15%;	
	}

	.facebook {
		background-image: url("http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/Facebook-1.png");
		width: 13%;
		aspect-ratio: 55/99;
		background-size: contain;
		background-repeat: no-repeat;
	} 

	.instagram {
		background-image: url("http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/Instagarm.png");
		width: 25%;
		aspect-ratio: 211/208;
		background-size: contain;
		background-repeat: no-repeat;
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
		<img src="http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/cropped-logounavn-plain.png"
 alt="kj_logo">
        </span>
		
		<span>
			<p>KONTAKT</p>
			<p>Tlf: 50 80 11 50</p>
			<p>Mail: yelvabeauty@gmail.com</p>
			<section class="social-media">
				<a class="facebook" href="https://www.facebook.com/YelvaBeauty/"></a>
				<a class="instagram" href="https://www.instagram.com/yelvabeauty/"></a>
			</section>
</span>
	
	</span>
</div><!-- .site-info -->
<style>
      #colophon {
  background-image: url("http://www.mariasattrup.dk/kea/karinajuhl/wp-content/uploads/2022/05/Image-2-1.jpg");
  background-repeat: no-repeat;
    background-size: cover;



}

</style>