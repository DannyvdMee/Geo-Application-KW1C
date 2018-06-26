@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('teacher/poi/update') }}">
				<p class="text-center font-bold">@lang('messages.add-poi')</p>
				@csrf
				<input type="text" name="name" value="{{ $poi->title }}" placeholder="POI title" required autofocus>
				<input type="text" name="hint" value="{{ (!empty($poi->hint) ? $poi->hint  : '') }}" placeholder="POI hint">
				<input type="text" name="latitude" value="{{ $poi->latitute }}" placeholder="POI latitude" required>
				<input type="text" name="longitude" value="{{ $poi->longtitute }}"placeholder="POI longitude" required>
				<textarea name="description" placeholder="POI description" value="{{ $poi->description }}" required></textarea>
				<select name="active">
					<option value="">@lang('messages.active')?</option>
					<option value="1" {{ ($poi->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
					<option value="0" {{ ($poi->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
				</select>
				<input type="submit" value="@lang('messages.save')">
			</form>
		</div>
	</div>
@endsection