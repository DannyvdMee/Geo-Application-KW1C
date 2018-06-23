@extends('layouts.teacher')

@section('injectable-js')
	<script type="application/javascript">
		function addStudent()
		{
			if ($(this).val() != '') {
				console.log('In function');
				el = $(this).children();

				row = '<div class="student"><p>' + value + '</p><i class="material-icons float-right">remove</i></div>';

				$('#added-students').html(row);
			}
		}

		console.log('Ended initialising');
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
							<div class="student">
								<p>{{ $student->name }}</p>
								<i class="material-icons float-right">remove</i>
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
		console.log('Started eventlisteners');
		$('#student-box').on('change', addStudent);
	</script>
@endsection