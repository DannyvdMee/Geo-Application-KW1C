@extends('layouts.teacher')

@section('injectable-js')
	<script type="application/javascript">
		function addStudent() {
			if ($(this).val() != '') {
				value = $(this).find(':selected').text();
				curr_html = $('#added-students').html();

				row = '<div class="student"><p>' + value + '<i class="material-icons float-right">remove</i></p></div>';

				box_contents = $('#added-students').text();
				if (box_contents == 'No students added yet') {
					$('#added-students').empty();
				}

				$('#added-students').html(curr_html + row);
			}
		}

		function removeStudent() {
			console.log('Hi');
			$(this).hide();
			console.log($(this));

			if ($('#added-students').empty()) {
				$('#added-students').html('<p>No students added yet</p>');
			}
		}
	</script>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('teacher/group/create') }}">
				<p class="text-center font-bold">@lang('messages.add-group')</p>
				@csrf
				<input type="text" name="name" placeholder="Group name" required autofocus>

				<select id="student-box" name="students">
					<option value="">Select a student</option>
					@if (!empty($students))
						@foreach ($students as $student)
							<option value="{{ $student->id }}">{{ $student->name }}</option>
						@endforeach
					@endif
				</select>

				<div id="added-students" class="input-box">
					@if (!empty($added))
						@foreach ($added as $student)
							<div class="{{ $student->number }}">
								<p>{{ $student->name }}</p>
								<i class="material-icons float-right remove-student">remove</i>
							</div>
						@endforeach
					@else
						<p>No students added yet</p>
					@endif
				</div>

				<select name="active">
					<option value="">@lang('messages.active')?</option>
					<option value="1">@lang('messages.yes')</option>
					<option value="0">@lang('messages.no')</option>
				</select>
				<input type="submit" value="@lang('messages.save')">
			</form>
		</div>
	</div>
@endsection

@section('js-eventlisteners')
	<script type="application/javascript">
		$(document).ready(function () {
			$('#student-box').on('change', addStudent);
			$('.student p').on('click', removeStudent);
		});
	</script>
@endsection