@extends('layouts.teacher')

@section('injectable-js')

@endsection

@section('content')
	<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('teacher/group/create') }}">
				<p class="text-center font-bold">@lang('messages.add-group')</p>
				@csrf
				<input type="text" name="name" placeholder="Group name" required autofocus>

				<select name="students">
					<option value="">Select a student</option>
					@if (!empty($students))
						@foreach ($students as $student)
							<option value="{{ $student->id }}">{{ $student->name }}</option>
						@endforeach
					@endif
				</select>

				<div class="added-students input-box">
					@if (!empty($added))
						@foreach ($added as $student)
							<p>{{ $student->name }}</p>
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

@endsection