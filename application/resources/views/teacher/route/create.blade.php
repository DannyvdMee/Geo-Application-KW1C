@extends('layouts.teacher')

@section('injectable-js')
	<script type="application/javascript">
		function addPoi() {

			// TODO vue-tify this code

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
			<div class="row">
				<div class="col">			
					<form method="POST" action="{{ route('teacher/route/create') }}">
						@csrf

						<input type="text" name="name" placeholder="@lang('messages.name')" required autofocus>

						<select id="poi-box" name="pois">
							<option value="">@lang('messages.selectPoi')</option>
							@foreach ($pois as $poi)
								<option value="{{ $poi->id }}">{{ $poi->name }}</option>
							@endforeach
						</select>

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

						<div id="poi-inputs">

						</div>

						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js-eventlisteners')
	<script type="application/javascript">

		// TODO vanilla JS this code

		$(document).ready(function () {
			$('#poi-box').on('change', addPoi);
			$('.poi p').on('click', removePoi);
		});
	</script>
@endsection