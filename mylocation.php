<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Accept coordinates as input to a geocoder</title>
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
<link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
type="text/css"
/>
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
type="text/css"
/>
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<style>
#geocoder-container > div {
min-width: 50%;
margin-left: 25%;
}
</style>
<div id="map"></div>
 
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiemR1ZWxpc3RjdXB1IiwiYSI6ImNramE5ZmRzdzJtMWkyem5wdHE2czNkam4ifQ.BbfLAan4z3ZGsLDbRLME8g';
	var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v11',
	center: [-79.4512, 43.6568],
	zoom: 13
	});
	 
	/* given a query in the form "lng, lat" or "lat, lng" returns the matching
	* geographic coordinate(s) as search results in carmen geojson format,
	* https://github.com/mapbox/carmen/blob/master/carmen-geojson.md
	*/
	var coordinatesGeocoder = function (query) {
	// match anything which looks like a decimal degrees coordinate pair
	var matches = query.match(
	/^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
	);
	if (!matches) {
	return null;
	}
	 
	function coordinateFeature(lng, lat) {
	return {
	center: [lng, lat],
	geometry: {
	type: 'Point',
	coordinates: [lng, lat]
	},
	place_name: 'Lat: ' + lat + ' Lng: ' + lng,
	place_type: ['coordinate'],
	properties: {},
	type: 'Feature'
	};
	}
	 
	var coord1 = Number(matches[1]);
	var coord2 = Number(matches[2]);
	var geocodes = [];
	 
	if (coord1 < -90 || coord1 > 90) {
	// must be lng, lat
	geocodes.push(coordinateFeature(coord1, coord2));
	}
	 
	if (coord2 < -90 || coord2 > 90) {
	// must be lat, lng
	geocodes.push(coordinateFeature(coord2, coord1));
	}
	 
	if (geocodes.length === 0) {
	// else could be either lng, lat or lat, lng
	geocodes.push(coordinateFeature(coord1, coord2));
	geocodes.push(coordinateFeature(coord2, coord1));
	}
	 
	return geocodes;
	};
	 
	 
	var geocoder = new MapboxGeocoder({
		accessToken: mapboxgl.accessToken,
		localGeocoder: coordinatesGeocoder,
		zoom: 4,
		placeholder: 'Try: -40, 170',
		marker: {
		color: 'orange'
		},
		mapboxgl: mapboxgl
	});
 
	map.addControl(geocoder);

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