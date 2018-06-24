@extends('layouts.app')

@section('injectable-js')
	<script>

		// Initialize and add the map
		function initMap() {
			markers = <?php echo json_encode($pois) ?>;
			// The location waypoints
			console.log('Markers');
			console.log(markers);

			// The map, centered at the first waypoint
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
				center: {
					lat: markers[0]['latitude'],
					lng: markers[0]['longitude'],
				}
			});

			infowindow = new google.maps.InfoWindow({
				content: 'Placeholder...'
			});

			for (i = 0; i < markers.length; i++) {
				marker = new google.maps.Marker({position: {lat: markers[i]['latitude'], lng: markers[i]['longitude']}, map: map});

				marker['html'] =
					'<div class=\"infowindow\">' +
						'<p class=\"font-bold\">' + markers[i]['title'] + '</p>' +
						'<p>' + markers[i]['hint'] + '</p>' +
					'</div>';

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(this.html);
					infowindow.open(map, this);
				});
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