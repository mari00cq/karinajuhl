<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

<div class="inner-wrap">
	<div id="primary" class="content-area">



<?php endif ?>

		<main id="main" class="site-main" role="main">

			<!-- */ her skriver vi at elementors indhold skal bevares /* -->
<?php the_content();
?>

<h1 id="overskrift">Hudpleje</h1>
			<p>Her kan du se alle de produkter jeg fremstiller</p>
			<h2>Søg på type</h2>
			<!-- <nav id="filtrering"><img data-projekt src="" alt=""></nav> -->
			<section id="sorterings-knapper">
			
	

			</section>
			<h2 class="kategorititel">Alle produkter</h2>
			
		<section id="produkt-oversigt"></section>
			
<template>
				<article class="container_article">
					
					<h2></h2>
					<img src="" alt="">
					<p></p>
</article>
</template>

		</main><!-- #main -->
<script>


				let produkt;
				
				const liste = document.querySelector("#produkt-oversigt");
				const skabelon = document.querySelector("template");
				let filterProjekt = "alle";
				document.addEventListener("DOMContentLoaded", start);

				function start() {
					console.log("start");
					getJson();
				}



const url = "http://mariasattrup.dk/kea/karinajuhl/wp-json/wp/v2/produkt?per_page=100";


let filter = "alle";


async function getJson() {
	console.log("getJson");
	let response = await fetch(url); 
	const catdata = await fetch(caturl);

	produkt = await response.json();

	console.log(vis produkter);
	visPodukter(filter);
	opretknapper();
	addEventListenersToButtons();

	
} 

// function addEventListenersToButtons() {

// 	document.querySelectorAll("#verdensmaal-knapper img").forEach(elm => {
// 		elm.addEventListener("click", filtrerProdukter);
// 	})
// }



// function opretknapper(){
	
// 	verdensmaal.forEach( function (vm){
// 		document.querySelector("#verdensmaal-knapper").innerHTML += `<img class="filter" data-projekt="${vm.id}" name="${vm.name}" src="${vm.verdensmlslogobillede.guid}"></img>`;
	
// 	})

// 		addEventListenersToButtons();
// 	}

// function visProdukter(filter) {

// 	liste.innerHTML = "";
// 	produkt.forEach(elm => {
		
// 		console.log(elm.verdensml.includes(parseInt(filter)));
// 		if (elm.verdensml.includes(parseInt(filter)) || filter == "alle") {
// 		console.log("foreach kører på produkter");
// 		const klon = skabelon.cloneNode(true).content;
// 		klon.querySelector("h2").textContent = elm.title.rendered;
// 		klon.querySelector("img").src = elm.billede.guid;

// 		klon.querySelector("article").addEventListener("click", () => {location.href = elm.link;
// 		})

// 		liste.appendChild(klon);
// 	}})
// }

// function filtrerProdukter() {
// 	filter = this.dataset.produkt;
// 	document.querySelector(".kategorititel").textContent = this.getAttribute("name");
// 	produkt.forEach(elm => {
// 		console.log(elm.verdensml);
// 	})

// 	visProjekter(filter);
// }
</script>
<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>

<?php
get_footer();
