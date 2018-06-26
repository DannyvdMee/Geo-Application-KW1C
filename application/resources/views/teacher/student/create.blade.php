@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('teacher/student/create') }}">
				<p class="text-center font-bold">@lang('messages.add-student')</p>
				@csrf
				<input type="number" name="number" placeholder="Studentnumber" required autofocus>
				<input type="text" name="name" placeholder="Student name" required>
				<textarea name="information" placeholder="Extra information about student"></textarea>
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