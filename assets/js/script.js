"use strict";

//Toggle navigation

jQuery(".menuicon").on("click", function(e){
 e.preventDefault();
 jQuery(".full-screen-nav").addClass("active");
})

jQuery(".nav-close").on("click", function(e){
 e.preventDefault();
 jQuery(".full-screen-nav").removeClass("active");
})


//Toggle collapsible navigation

jQuery(".collapsible-nav li").on("click", function(){
	jQuery(this).toggleClass("nav-active");
})

new Splide( '.splide', {
	type   : 'loop',
	perPage: 3,
  } );