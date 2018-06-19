@extends('layouts.app')

@section('injectable-js')
    <script>
		// Initialize and add the map
		function initMap() {
			// The location waypoints
			var avans = {lat: 51.6886659, lng: 5.2869727};
			var kw1c = {lat: 51.6904646, lng: 5.2867472};
			var cs = {lat: 51.689968, lng: 5.295078};

			// The map, centered at Avans waypoint
			var map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: avans});

			// The markers
			var marker = new google.maps.Marker({position: avans, map: map});
			var marker = new google.maps.Marker({position: kw1c, map: map});
			var marker = new google.maps.Marker({position: cs, map: map});
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