@extends('layouts.teacher')

@section('content')
	<div class="row justify-content-center">
		<div class="col">
			<form method="POST" action="{{ route('teacher/poi/create') }}">
				<p class="text-center font-bold">@lang('messages.add-poi')</p>
				@csrf
				<input type="text" name="name" placeholder="POI title" required autofocus>
				<input type="text" name="hint" placeholder="POI hint">
				<input type="text" name="latitude" placeholder="POI latitude" required>
				<input type="text" name="longitude" placeholder="POI longitude" required>
				<textarea name="description" placeholder="POI description" required></textarea>
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
