@extends('layouts.app')

@section('injectable-js')
	<script>

		function getLocation() {
			navigator.geolocation.getCurrentPosition(function (pos) {
				console.log(pos);
			});
		}

		t = setInterval(getLocation, 10000);


		function initMap() {
			markers = <?php echo json_encode($pois) ?>;
			// The location waypoints
			console.log('Markers');
			console.log(markers);

			// The map, centered at the first waypoint
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
			});

			navigator.geolocation.getCurrentPosition(function (pos) {
				console.log(pos);
				console.log('Fired event!');

				map.setCenter(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));

				posmarker = new google.maps.Marker({
					position: {lat: pos.coords.latitude, lng: pos.coords.longitude},
					map: map,
					icon: '<?php echo asset('storage/img/markers/position.png') ?>',
				});

				posmarker.metadata = {id: 'posmarker'}
			});

			infowindow = new google.maps.InfoWindow({
				content: 'Placeholder...'
			});

			for (i = 0; i < markers.length; i++) {
				if (markers[i]['type'] === 'individual') {
					icon = '<?php echo asset('storage/img/markers/ict.png') ?>';
				} else if (markers[i]['type'] === 'group') {
					icon = '<?php echo asset('storage/img/markers/group.png') ?>';
				} else if (markers[i]['type'] === 'hidden') {
					icon = '<?php echo asset('storage/img/markers/mystery.png') ?>';
				}

				marker = new google.maps.Marker({
					position: {lat: markers[i]['latitude'], lng: markers[i]['longitude']},
					map: map,
					icon: icon,
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

			// TODO axios-ify this code

			$.ajax({
				method: 'GET', // Type of response and matches what we said in the route
				url: 'https://project.test/map/marker', // This is the url we gave in the route
		        data: {'response': response}, // a JSON object to send back
				success: function (response) { // What to do if we succeed
					console.log(response);
					return response.poi;
				},
				error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
					console.log(JSON.stringify(jqXHR));
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})

			$('#map-overlay').show();

			// AJAX request to /map/marker/{id}
		}
	</script>
@endsection

@section('content')
	<!--The div element for the map -->
	<div id="map" style="height: calc(100vh - 120px); width: 100%;"></div>
	<div id="map-overlay">
		<p class="font-bold">Title placeholder</p>
		<div class="text-center">Text placeholder</div>
		<img src="">
		<textarea id="answer"></textarea>
		<input type="hidden" id="question" readonly required>
		<button id="submit-button" class="btn">@lang('messages.submit')</button>
	</div>
@endsection

@section('js-eventlisteners')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZMWgX0_LuX-Ozhc51bra0bo-PJU4lv0A&callback=initMap" async defer></script>
	<script type="application/javascript">
		window.addEventListener('load', function() {

		});
		$(document).ready(function() {
			$('.marker-open-dialog').on('click', openDialogContext);
		});
	</script>
@endsection