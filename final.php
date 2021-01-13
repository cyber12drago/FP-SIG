<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Display driving directions</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css" rel="stylesheet" />
<style>
  body { margin: 0; padding: 0; }
  #map { position: absolute; top: 0; bottom: 0; width: 100%; }

  .marker {
        background-image: url('assets/img/menu/data.png');
        background-size: cover;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        cursor: pointer;
      }
      .mapboxgl-popup {
        max-width: 200px;
      }

      .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
      }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
type="text/css"
/>

  
<div id="map"></div>

<?php
	session_start();
	include 'koneksi.php';


    $setasal=$_SESSION['asal'];
    $settujuan=$_SESSION['tujuan']
	
	

?> 

<script>
	var origin = "<?php Print($setasal); ?>";
    var destination = "<?php Print($settujuan); ?>";
  	mapboxgl.accessToken = 'pk.eyJ1IjoiemR1ZWxpc3RjdXB1IiwiYSI6ImNramE5ZmRzdzJtMWkyem5wdHE2czNkam4ifQ.BbfLAan4z3ZGsLDbRLME8g';
	var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v11',
	center: [112.6525, -7.21114],
	zoom: 13
	});
	 

	// map.addControl(
	// new MapboxDirections({
	// accessToken: mapboxgl.accessToken
	// }),
	// 'top-left'
	// );


	var directions = new MapboxDirections({
	        accessToken: mapboxgl.accessToken
	    });

	map.addControl(directions,'top-left');

	map.on('load',  function() {
	    directions.setOrigin(origin); // can be address in form setOrigin("12, Elm Street, NY")
	    directions.setDestination(destination);
	    
	})

	var geojson = {
	  type: 'FeatureCollection',
	  features: [{
	    type: 'Feature',
	    geometry: {
	      type: 'Point',
	      coordinates: [112.6525, -7.21114]
	    },
	    properties: {
	      title: 'Terminal Tambak Oso Wilangon',
	      description: 'Lokasi: Surabaya'
	    }
	  },
	  {
	    type: 'Feature',
	    geometry: {
	      type: 'Point',
	      coordinates: [110.82048, -7.55243]
	    },
	    properties: {
	      title: 'Terminal Tirtonadi',
	      description: 'Lokasi: Solo'
	    }
	  },
	  {
	    type: 'Feature',
	    geometry: {
	      type: 'Point',
	      coordinates: [107.59341, -6.94640,]
	    },
	    properties: {
	      title: 'Terminal Leuwipanjang',
	      description: 'Lokasi: Bandung'
	    }
	  }]
	};

	// add markers to map
	geojson.features.forEach(function(marker) {

	  // create a HTML element for each feature
	  var el = document.createElement('div');
	  el.className = 'marker';

	  // make a marker for each feature and add to the map
	  new mapboxgl.Marker(el)
	  .setLngLat(marker.geometry.coordinates)
	  .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
	    .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
	  .addTo(map);
	});

	map.addControl(
		new mapboxgl.GeolocateControl({
		positionOptions: {
		enableHighAccuracy: true
		},
		trackUserLocation: true
		})
		);
	map.addControl(new mapboxgl.NavigationControl());

</script>
 
</body>
</html>