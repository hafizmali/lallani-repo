"use strict";

$(document).ready(function(){
	
	function loadsuperslides(){
      $('#slides-1').superslides({
        hashchange: false,
        animation: 'fade',
		play: 10000,
		pagination: false
      });
	}
	
	loadsuperslides();
});