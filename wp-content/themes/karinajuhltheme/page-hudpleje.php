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
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 10px;
	margin-bottom: 3%;
}

@media screen and (min-width:1025px) {
	  nav {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
}

.valgt {
    background-color: rgb(245, 240, 168);
}
      
#produktcontainer {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding-inline-start: 10%;
    padding-inline-end: 10%;
	padding-bottom: 2%;
	cursor: pointer;
}

#produktcontainer h2 {
	font-size: 1.7rem;
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

@media screen and (min-width:1025px) {
	#produktcontainer {
	grid-template-columns: 1fr 1fr 1fr;
	padding-inline-start: 0%;
	padding-inline-end: 0%;
	}
}

#filtrering {
	justify-content: center;
}

button {
	background: #B8C8C7;
	border: none;
}

button:hover {
	color:#F9F8F5;
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

			
	<section id="sorterings-knapper">
		<nav id="filtrering"><button data-produkt="alle">Alle</button></nav>
	</section>
			
	<section id="produktcontainer"></section>
			
	<template>
		<article class="grid">				
			<h2></h2>
			<img src="" alt=""class="billede">
			<p class="beskrivelse"></p>
			<p class="pris"></p>
		</article>
	</template>
</main><!-- #main -->
		
<script>
let produkter;
let categories;
let filterProdukt ="alle";
document.addEventListener("DOMContentLoaded", start);

//   let img = document.querySelector('img');
//     let start = img.src;
//     let hover = img.getAttribute('data-hover'); //specified in img tag

//     img.onmouseover = () => { img.src = hover; }
//     img.onmouseout = () => { img.src = start; } //to revert back to start

function start() {
	console.log("start");
	getJson();
}

const dbUrl = "http://mariasattrup.dk/kea/karinajuhl/wp-json/wp/v2/produkt?per_page=100";
const catUrl = "http://mariasattrup.dk/kea/karinajuhl/wp-json/wp/v2/categories";

let temp = document.querySelector("template");
let container = document.querySelector("#produktcontainer");

function opretKnapper(){
	categories.forEach(cat =>{
		document.querySelector("#filtrering").innerHTML += `<button class="filter" data-produkt="${cat.id}">${cat.name}</button>`
		addEventListenersToButtons();
	})
}

function addEventListenersToButtons(){

	document.querySelectorAll("#filtrering button").forEach(elm =>{
		elm.addEventListener("click", filtrering);
		})
}; 
 
function filtrering(){
	console.log(this.dataset.produkt);
	// document.querySelector(".kategorititel").textContent = this.textContent;
	filterProdukt = this.dataset.produkt;
	console.log(filterProdukt);
	visProdukter();
}

	
function visProdukter(){
	console.log("visProdukter");
	container.textContent="";
	// Med parseInt laver vi tekst om til tal
	produkter.forEach(produkt => {
		if (filterProdukt=="alle"||produkt.categories.includes(parseInt(filterProdukt))){
		let klon = temp.cloneNode(true).content;
		klon.querySelector("h2").textContent = produkt.title.rendered;
		klon.querySelector("img").src = produkt.billede.guid;
		klon.querySelector(".beskrivelse").textContent = produkt.kortbeskrivelse;
		klon.querySelector(".pris").innerHTML = "Pris: " + produkt.pris + " kr";

		klon.querySelector(".grid").addEventListener("click", () => {location.href = produkt.link;
		})
		container.appendChild(klon);
	}})	
}

async function getJson() {
	console.log("getJson");
	const data = await fetch(dbUrl); 
	const catdata = await fetch(catUrl); 
produkter = await data.json();
categories = await catdata.json();
console.log(categories);
console.log(produkter);
opretKnapper();
visProdukter();

} 
</script>
<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>

<?php
get_footer();

