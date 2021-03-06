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
<style>
      nav {
        display: flex;
        justify-content: center;
        gap: 10px;
      }
      .valgt {
        background-color: rgb(245, 240, 168);
      }
      section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding-inline-start: 10%;
        padding-inline-end: 10%;
      }
      article {
        border: solid 1px black;
        padding: 20px;
        background-color: whitesmoke;
      }
	  	#produkt-oversigt {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
		grid-gap: 30px;
	
	}
	#produkt-oversigt img {
		padding: 10px;
		object-fit: cover;


	
	}
	.container_article {
		border: 2px solid black;
		/* background-color: darkgreen; */
		height: 400px;

	
	}
	
	.container_article h2 {
		padding: 10px;
	}

	.container_article img{
		width: 400px;
		height: 300px;
		align: center;
		

	}
	.container_article h2{
		color: black;
		text-align: center;
	}
</style>

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
			
			<!-- <nav id="filtrering"><img data-projekt src="" alt=""></nav> -->
			<section id="sorterings-knapper">
				<nav id="filtrering"></nav>
			</section>
				 <!-- <nav> -->
    <!-- <button class="filter valgt" data-kategori="alle">Alle</button>
    <button class="filter" data-kategori="ansigtspleje">Ansigtspleje</button>
    <button class="filter" data-kategori="kropspleje">Kropspleje</button>
    <button class="filter" data-kategori="haarpleje">H??rpleje</button>
    <button class="filter" data-kategori="drikkevarer">Creme Caf??</button> -->
  <!-- </nav> -->
			
	

			
			<h2 class="kategorititel">Alle produkter</h2>
			
		<section id="produkt-oversigt"></section>
			</main><!-- #main -->
<template>
				<article class="container_article">
					
					<h2></h2>
					<img src="" alt=""class="billede">
					<p class="beskrivelse"></p>
					<p class="pris">Pris</p>
</article>
</template>

		
<script>


				let produkter;
				let categories;
				let filterProdukt;
				
				const liste = document.querySelector("#produkt-oversigt");
				const skabelon = document.querySelector("template");
				// let filterProdukt = "alle";
				document.addEventListener("DOMContentLoaded", start);

				function start() {
					console.log("start");
					getJson();
				}



const dbUrl = "http://mariasattrup.dk/kea/karinajuhl/wp-json/wp/v2/produkt?per_page=100";
const catUrl = "http://mariasattrup.dk/kea/karinajuhl/wp-json/wp/v2/categories";


let filter = "alle";


async function getJson() {
	console.log("getJson");
	const data = await fetch(dbUrl); 
	const catdata = await fetch(catUrl); 
produkter = await data.json();
categories = await catdata.json();
console.log(categories);
console.log(produkter);
// visProdukter();
opretKnapper();

} 
function opretKnapper(){
	categories.forEach(cat =>{
		document.querySelector("#filtrering").innerHTML += `<button class="filter" data-projekt="${cat.id}">${cat.name}</button>`
	})
	function addEventListenersToButtons(){

	document.querySelectorAll("#filtrering button").forEach(elm => {
		elm.addEventListener("click", filtrering);
		})
};
function filtrering(){
	filterProdukt = this.dataset.produkt;
	console.log(filterProdukt);

	visProdukter();
}

function visProdukter() {
	let temp = document.querySelector("template");
	let container = document.querySelector("#produkt-oversigt");
	console.log(produkter);
	produkter.forEach(produkt => {

		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("h2").textContent = produkt.title.rendered;
		klon.querySelector("img").src = produkt.billede.guid;
		klon.querySelector("p").innerHTML = produkt.pris + " kr";
	
})
}}



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
// 		console.log("foreach k??rer p?? produkter");
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

