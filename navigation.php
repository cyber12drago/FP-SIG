<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Display driving directions</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
<style>
	body { margin: 0; padding: 0; }
	#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
	<link
	rel="stylesheet"
	href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
	type="text/css"
	/>
<div id="map"></div>
 
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiemR1ZWxpc3RjdXB1IiwiYSI6ImNramE5ZmRzdzJtMWkyem5wdHE2czNkam4ifQ.BbfLAan4z3ZGsLDbRLME8g';
	var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v11',
	center: [-79.4512, 43.6568],
	zoom: 13
	});
	 
	map.addControl(
	new MapboxDirections({
	accessToken: mapboxgl.accessToken
	}),
	'top-left'
	);

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