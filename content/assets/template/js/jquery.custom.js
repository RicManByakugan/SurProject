var $ = jQuery.noConflict();
$(document).ready(function() {

	"use strict";

	/*-----------------------------------------------------------------------------------*/
	/*  Superfish Menu
	/*-----------------------------------------------------------------------------------*/
	var example = $('ul.sf-menu').superfish({
		delay:       100,
		speed:       'fast',
		autoArrows:  false
	});

	/*-----------------------------------------------------------------------------------*/
	/*  Slick Nav
	/*-----------------------------------------------------------------------------------*/
	$('#primary-menu').slicknav({
		prependTo:'#primary-bar',
		label: "PRODUIT | SERVICE | FORMATION"
	});
	$('#secondary-menu').slicknav({
		prependTo:'#secondary-bar',
		label: "PRODUIT | SERVICE | FORMATION"
	});

});
