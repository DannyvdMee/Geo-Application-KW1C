@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Create Route Pagina
-->

@section('injectable-js')
	<script type="application/javascript">
		function addPoi() {
			if ($(this).val() != '') {
				value = $(this).find(':selected').text();
				id = $(this).find(':selected').val();
				curr_html = $('#added-pois').html();
				curr_inputs = $('#poi-inputs').html();

				row = '<div class="poi"><p>' + value + '<i class="material-icons float-right">remove</i></p></div>';
				input = '<input type=\"hidden\" name=\"pois[]\" readonly hidden value=\"' + id + '\">';

				box_contents = $('#added-students').text();
				if (box_contents == 'No students added yet') {
					$('#added-pois').empty();
				}

				$('#added-pois').html(curr_html + row);
				$('#poi-inputs').html(curr_inputs + input);
			}
		}

		function removePoi() {
			if ($('#added-pois').empty()) {
				$('#added-pois').html('');
				$('#poi-inputs').html('');
			}
		}
	</script>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.route-add')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Route create form -->
			<div class="row">
				<div class="col">			
					<form method="POST" action="{{ route('teacher/route/create') }}">
						@csrf

						<!-- Route title -->
						<input type="text" name="name" placeholder="@lang('messages.name')" required autofocus>

						<!-- Students to a group -->
						<select id="poi-box" name="pois">
							<option value="">@lang('messages.selectPoi')</option>
							@foreach ($pois as $poi)
								<option value="{{ $poi->id }}">{{ $poi->name }}</option>
							@endforeach
						</select>

						<!-- Added pois -->
						<div id="added-pois" class="input-box">
							@if (!empty($added))
								@foreach ($added as $poi)
									<div class="poi">
										<p>{{ $poi->name }}</p>
										<i class="material-icons float-right remove-poi">remove</i>
									</div>
								@endforeach
							@endif
						</div>

						<!-- Poi input boxes -->
						<div id="poi-inputs">

						</div>

						<!-- Route active? -->
						<select name="active">
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<!-- Submit button -->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End route create form -->
		</div>
	</div>
</div>
@endsection

@section('js-eventlisteners')
	<script type="application/javascript">
		$(document).ready(function () {
			$('#poi-box').on('change', addPoi);
			$('.poi p').on('click', removePoi);
		});
	</script>
@endsection