@extends('layouts.app')

@section('injectable-js')
    <script>
		// Initialize and add the map
		function initMap() {
			// The location of Uluru
			var uluru = {lat: -25.344, lng: 131.036};
			// The map, centered at Uluru
			var map = new google.maps.Map(
				document.getElementById('map'), {zoom: 4, center: uluru});
			// The marker, positioned at Uluru
			var marker = new google.maps.Marker({position: uluru, map: map});
		}
    </script>
    <!--Load the API from the specified URL
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