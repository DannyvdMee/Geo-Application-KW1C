@extends('layouts.app')

@section('injectable-js')
    <script>
		// Initialize and add the map
		function initMap() {
			// The location waypoints
			var markers = [];

			<?php foreach ($pois as $poi) { ?>
				var marker_item = <?php echo json_encode($poi) ?>;

				markers += marker_item;
			<?php } ?>

			console.log(markers);

			// The map, centered at Avans waypoint
			var map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: {lat: markers[0][1], lng: markers[0][2]}});

			for (i = 0; i < markers.length; i++) {
				var marker = new google.maps.Marker({position: {lat: markers[i][1], lng: markers[i][2]}, map: map})
			}
		}
    </script>
    <!--
    Load the API from the specified URL
	* The async attribute allows the browser to render the page while the API loads
	* The key parameter will contain your own API key (which is not needed for this tutorial)
	* The callback parameter executes the initMap() function
	-->
@endsection

@section('content')
<!--The div element for the map -->
<div id="map" style="height: calc(100vh - 120px); width: 100%;"></div>
@endsection

@section('js-eventlisteners')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZMWgX0_LuX-Ozhc51bra0bo-PJU4lv0A&callback=initMap"></script>
@endsection