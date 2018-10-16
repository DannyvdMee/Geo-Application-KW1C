@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.exercise-add')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('teacher/exercise/create') }}">
						@csrf

						<input type="hidden" name="poi_id" value="{{ $poi->id }}" required readonly>

						<input type="text" name="name" placeholder="@lang('messages.name')">
						<textarea name="content" placeholder="@lang('messages.exercise-content')" required></textarea>
						<input type="text" name="answer" placeholder="@lang('messages.exercise-answer')" required>
						<input style="border-style: none; padding-left: 0;" type="file" name="picture" placeholder="@lang('messages.exercise-question')">

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
@endsection
