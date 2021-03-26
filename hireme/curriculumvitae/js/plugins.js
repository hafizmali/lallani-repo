// Avoid `console` errors in browsers that lack a console.
"use strict";
$(document).ready(function(){
	//dragable mobile
	var drag;
	if($(window).width()<796){drag=false;}else{drag=true;}	
	/* Color Picker */
	  //demo
	 jQuery('.picker-btn').click(function(){
	  if(jQuery('.color-picker').css('right')=='0px'){
	   jQuery('.color-picker').animate({ "right": "-223px" }, "slow" );
	  }else{
	   jQuery('.color-picker').animate({ "right": "0px" }, "slow" );
	  }
	 });
    setTimeout(function(){
    jQuery('.color-picker').animate({ "right": "-223px" }, "slow" );}, 4000);
	
	var currentColor = 'melonred'; // set your favourite theme color here! (yellow, orange, red, pink, pansy, purple, blue, green, turquise, grey, indigodye, melonred)
	$('body').addClass(currentColor);
	$('.picker-yellow').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('yellow');
		currentColor='yellow';
		wpgmappity_maps_loaded();
	});
	$('.picker-orange').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('orange');
		currentColor='orange';
		wpgmappity_maps_loaded();
	});
	$('.picker-red').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('red');
		currentColor='red';
		wpgmappity_maps_loaded();
	});
	$('.picker-pink').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('pink');
		currentColor='pink';
		wpgmappity_maps_loaded();
	});
	$('.picker-pansy').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('pansy');
		currentColor='pansy';
		wpgmappity_maps_loaded();
	});
	$('.picker-purple').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('purple');
		currentColor='purple';
		wpgmappity_maps_loaded();
	});
	$('.picker-blue').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('blue');
		currentColor='blue';
		wpgmappity_maps_loaded();
	});
	$('.picker-green').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('green');
		currentColor='green';
		wpgmappity_maps_loaded();
	});
	$('.picker-turquise').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('turquise');
		currentColor='turquise';
		wpgmappity_maps_loaded();
	});
	$('.picker-grey').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('grey');
		currentColor='grey';
		wpgmappity_maps_loaded();
	});
	$('.picker-indigodye').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('indigodye');
		currentColor='indigodye';
		wpgmappity_maps_loaded();
	});
	$('.picker-melonred').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('melonred');
		currentColor='melonred';
		wpgmappity_maps_loaded();
	});

	/* googleMaps Footer Map */
		var yellow = "#f1c40e"
		var orange = "#e67e21"
		var red = "#e74c3c"
		var pink = "#ed4f96"
		var pansy = "#9b58b6"
		var purple = "#7558b6"
		var blue = "#3498db"
		var green = "#2ecb70"
		var turquise = "#1abc9c"
		var grey = "#95a5a7"
		var indigodye = "#34485e"
		var melonred = "#fb6c66"
		
		var color = red // set your map color here! (blue, green, grey, red, ...)
		var saturation = 100
		function wpgmappity_maps_loaded() {
			var pointerUrl = 'img/map/pointer-'+currentColor+'.png' // set your color pointer here! (pointer-blue, green, grey, red, .png)
			switch(currentColor) {
	            case ('yellow'):
				    var color = yellow;
					var saturation = 100;
	                break;
	            case ('orange'):
	                var color = orange;
					var saturation = 100;
	                break;
	            case ('red'):
	                var color = red;
					var saturation = 100;
	                break;
	            case ('pink'):
	                var color = pink;
					var saturation = 100;
	                break;
                case ('pansy'):
	                var color = pansy;
					var saturation = 100;
	                break;
	            case ('purple'):
	                var color = purple;
					var saturation = 100;
	                break;
                case ('blue'):
	                var color = blue;
					var saturation = 100;
	                break;    
	            case ('green'):
	                var color = green;
					var saturation = 60;
	                break;
                case ('turquise'):
	                var color = turquise;
					var saturation = 60;
	                break;    
                case ('grey'):
	                var color = grey;
					var saturation = 20;
	                break;
                case ('indigodye'):
	                var color = indigodye;
					var saturation = 20;
	                break;
                case ('melonred'):
	                var color = melonred;
					var saturation = 80;
	                break;
        	}	
		var latlng = new google.maps.LatLng(34.021122,-118.396466); <!-- (First Value Longitude, Second Value Latitude), can obtain YOUR coordenates here!: http://universimmedia.pagesperso-orange.fr/geo/loc.htm -->
		var styles = [
			{
				"featureType": "landscape",
				"stylers": [
					{"hue": "#000"},
					{"saturation": -100},
					{"lightness": 40},
					{"gamma": 1}
				]
			},
			{
				"featureType": "road.highway",
				"stylers": [
					{"hue": color},
					{"saturation": saturation},
					{"lightness": 20},
					{"gamma": 1}
				]
			},
			{
				"featureType": "road.arterial",
				"stylers": [
					{"hue": color},
					{"saturation": saturation},
					{"lightness": 20},
					{"gamma": 1}
				]
			},
			{
				"featureType": "road.local",
				"stylers": [
					{"hue": color},
					{"saturation": saturation},
					{"lightness": 50},
					{"gamma": 1}
				]
			},
			{
				"featureType": "water",
				"stylers": [
					{"hue": "#000"},
					{"saturation": -100},
					{"lightness": 15},
					{"gamma": 1}
				]
			},
			{
				"featureType": "poi",
				"stylers": [
					{"hue": "#000"},
					{"saturation": -100},
					{"lightness": 25},
					{"gamma": 1}
				]
			}
		];		
		var options = {
			center : latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoomControl : false,
			mapTypeControl : false,
			scaleControl : false,
			streetViewControl : false,
			draggable:drag,
			scrollwheel:false,
			panControl : false, zoom : 15,
			styles: styles
		};
		var wpgmappitymap = new google.maps.Map(document.getElementById('wpgmappitymap'), options);
		var point0 = new google.maps.LatLng(34.021122,-118.396466); <!-- (Fist Value Longitude, Second Value Latitude), can obtain YOUR coordenates here!: http://universimmedia.pagesperso-orange.fr/geo/loc.htm -->
		var marker0= new google.maps.Marker({
			position : point0,
			map : wpgmappitymap,
			icon: pointerUrl //Custom Pointer URL
			});
		google.maps.event.addListener(marker0,'click',
			function() {
			var infowindow = new google.maps.InfoWindow(
			{content: 'undefined'});
			infowindow.open(wpgmappitymap,marker0);
			});
		}
		window.onload = function() {
			wpgmappity_maps_loaded();
		};		
	/* End */
});