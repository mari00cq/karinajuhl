<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<style>

#content {
 padding-top: 0 !important;
}

.entry-footer {
    display:none;
}

article.single {
    background: #F5F0EB;
    padding-top: 3%;
}

@media screen and (min-width:1025px) {
article.single {
margin-top: 15%;
margin-left: 10%;
margin-right: 10%;
display:grid;
grid-template-columns: 1fr 1fr;
gap: 10px;
}

.emg {
    grid-column: 1/2;
    place-self: center;
    max-width: 75%;
    display:grid;
    align-items: center;
}

.image2 {
    max-width: 80%;
    place-self:center;
    background: whitesmoke;
margin-top: 3%;
transform: rotate(-90deg);
}

article .beskrivelse {
    grid-column: 2/3;
}}

section{
    margin: 5%
}

.cont {
    text-align: right;
}

.kontaktmig {
    color: #394B3F;
    text-decoration: underline;
}
</style>
<main id="main" class="site-main container-fluid" role="main">

<article class="single">
    <div class="emg">
            <img class="image1" src="" alt="">
            <img class="image2" src="" alt="">
        </div>
        <section>
            <h2></h2>
            <p class="beskrivelse"></p>
            <h3>Ingredienser</h3>
            <p class="ingredienser"></p>
            <h3>Pris</h3>
            <b><p class="pris"></p></b>
            <h4><a class="kontaktmig" href="http://www.mariasattrup.dk/kea/karinajuhl/kontakt/">Kontakt mig</a> for spørgsmål og bestilling!</h4>
            <div class="cont">
               <a class="knap" href="http://www.mariasattrup.dk/kea/karinajuhl/hudpleje/"><button>Tilbage</button></a>
            </div>
        </section>
    </article>
	
	<?php
	// Start the Loop.
while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		$previous_post = get_previous_post();

		if ( $previous_post ) {
			$prev_image     = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), 'inspiro-featured-image' );
			$previous_cover = '';

			if ( $prev_image && isset( $prev_image[0] ) ) {
				$previous_cover = '<div class="previous-cover" style="background-image: url(' . esc_url( $prev_image[0] ) . ')"></div>';

				echo '<div class="previous-post-cover">';

				the_post_navigation(
					array(
						'prev_text' => '<div class="previous-info">' . $previous_cover . '<div class="previous-content"><span class="screen-reader-text">' . __( 'Previous Post', 'inspiro' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'inspiro' ) . '</span> <span class="nav-title">%title</span></div></div>',
						'next_text' => '',
					)
				);

				echo '</div><!-- .previous-post-cover -->';
			}
		}
	endwhile; // End the loop.
	?>

</main><!-- #main -->



<script>

console.log("scriptStart");
const dburl = "http://mariasattrup.dk/kea/karinajuhl/wp-json/wp/v2/produkt/"+<?php echo get_the_ID() ?>;
let produkt;

document.addEventListener("DOMContentLoaded", loadJson);

async function loadJson() {
    console.log("loadJson");
    const jsonData = await fetch(dburl);
    produkt = await jsonData.json();
       
    visProdukt(produkt);
    console.log(produkt);
}

function visProdukt() {
    console.log("visProdukt");
    document.querySelector("h2").textContent = produkt.title.rendered;
    document.querySelector(".image1").src = produkt.billede.guid;
    document.querySelector(".image2").src = produkt.cremebillede.guid;
    document.querySelector(".beskrivelse").textContent = produkt.langbeskrivelse;
    document.querySelector(".ingredienser").textContent = produkt.ingredienser;
    document.querySelector(".pris").textContent = produkt.pris + " kr";
}
</script>

<?php
get_footer();
