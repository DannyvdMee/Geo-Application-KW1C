@extends('layouts.teacher')

@section('injectable-js')
	<script type="application/javascript">

		// TODO vue-tify this code

		function addStudent() {
			if ($(this).val() != '') {
				value = $(this).find(':selected').text();
				id = $(this).find(':selected').val();
				curr_html = $('#added-students').html();
				curr_inputs = $('#student-inputs').html();

				row = '<div class="student"><p>' + value + '<i class="material-icons float-right">remove</i></p></div>';
				input = '<input type=\"hidden\" name=\"students[]\" readonly hidden value=\"' + id + '\">';

				box_contents = $('#added-students').text();
				if (box_contents == 'No students added yet') {
					$('#added-students').empty();
				}

				$('#added-students').html(curr_html + row);
				$('#student-inputs').html(curr_inputs + input);
			}
		}

		function removeStudent() {
			if ($('#added-students').empty()) {
				$('#added-students').html('');
				$('#student-inputs').html('');
			}
		}
	</script>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.group-add')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">			
					<form method="POST" action="{{ route('teacher/group/create') }}">
						@csrf

						<input type="text" name="name" placeholder="@lang('messages.group-name')" required autofocus>

						<select id="student-box" name="students">
							<option value="" required>@lang('messages.selectStudent')</option>
							@if (!empty($students))
								@foreach ($students as $student)
									<option value="{{ $student->id }}">{{ $student->name }}</option>
								@endforeach
							@endif
						</select>

						<div id="added-students" class="input-box">
							@if (!empty($added))
								@foreach ($added as $student)
									<div class="student">
										<p>{{ $student->name }}</p>
										<i class="material-icons float-right remove-student">remove</i>
									</div>
								@endforeach
							@else

							@endif
						</div>

						<div id="student-inputs">

						</div>

						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>
					
					<div class="whitespace height-21"></div>

					<div class="display-inline-block text-center box-center">
						<button class="btn btn-gray" onclick="removeStudent()">@lang('messages.group-removeStudents')</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js-eventlisteners')
	<script type="application/javascript">
		// TODO vue-tify this code
		$(document).ready(function () {
			$('#student-box').on('change', addStudent);
			$('.student p').on('click', removeStudent);
		});
	</script>
@endsection