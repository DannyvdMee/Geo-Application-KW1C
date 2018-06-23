@extends('layouts.app')

@section('injectable-js')
	<script>

		function getPoiAjax() {
			$.ajax({
				method: 'GET', // Type of response and matches what we said in the route
				url: 'http://geo-ict.local/map/getPOIS', // This is the url we gave in the route
//				data: {'response': response}, // a JSON object to send back
				success: function (response) { // What to do if we succeed
					console.log(response);
					return response;
				},
				error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
					console.log(JSON.stringify(jqXHR));
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}

		// Initialize and add the map
		function initMap() {
			// The location waypoints
			var markers = [getPoiAjax()];

			// The map, centered at Avans waypoint
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
				center: {lat: markers[0][1], lng: markers[0][2]}
			});

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
	<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZMWgX0_LuX-Ozhc51bra0bo-PJU4lv0A&callback=initMap"></script>
@endsection