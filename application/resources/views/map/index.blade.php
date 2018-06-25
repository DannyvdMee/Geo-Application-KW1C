@extends('layouts.app')

@section('injectable-js')
	<script>

		// Copied this from a hackathon project
		function getLocation() {
			navigator.geolocation.getCurrentPosition(function (pos) {
				console.log(pos);
			});
		}

		function centerMap(pos) {
			map.setCenter(pos);
		}

		t = setInterval(getLocation, 10000);
		getLocation();

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
				marker = new google.maps.Marker({
					position: {lat: markers[i]['latitude'], lng: markers[i]['longitude']},
					map: map
				});

				marker['html'] =
					'<div class=\"map-infowindow\">' +
					'<div class=\"row\">' +
					'<div class=\"col\">' +
					'<p class=\"font-bold\">' + markers[i]['title'] + '</p>' +
					'</div>' +
					'</div>' +
					'<div class=\"row\">' +
					'<div class=\"col\">' +
					'<div>' + 'Hint: ' + markers[i]['hint'] + '</div>' +
					'</div>' +
					'</div>' +
					'<div class=\"row\">' +
					'<div class=\"col-4 text-center\">' +
					'<i id=\"marker-' + markers[i]['url_id'] + '\" class=\"material-icons marker-open-dialog\">info</i>' +
					'</div>' +
					'<div class=\"col-4 text-center\">' +
					'<i class=\"material-icons\">zoom_in</i>' +
					'</div>' +
					'<div class=\"col-4 text-center\">' +
					'<i class=\"material-icons\">edit</i>' +
					'</div>' +
					'</div>' +
					'</div>';

				google.maps.event.addListener(marker, 'click', function () {
					infowindow.setContent(this.html);
					infowindow.open(map, this);
				});
			}
		}

		function openDialogContext() {
			marker_id = this.id;

			// AJAX request to /map/marker/{id}
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
	<div id="map-overlay">

	</div>
@endsection

@section('js-eventlisteners')
	<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZMWgX0_LuX-Ozhc51bra0bo-PJU4lv0A&callback=initMap"
			async defer></script>
	<script type="application/javascript">
		$('.marker-open-dialog').on('click', openDialogContext);
	</script>
@endsection