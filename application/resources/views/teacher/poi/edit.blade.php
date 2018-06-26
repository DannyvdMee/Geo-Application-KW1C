@extends('layouts.teacher')

@section('content')
<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('teacher/poi/{id}/update', ['id' => $poi->id]) }}">
				<p class="text-center font-bold">@lang('messages.add-poi')</p>
				@csrf
				<input type="text" name="name" placeholder="POI title" value="{{ $poi->title }}" required autofocus>
				<input type="text" name="hint" placeholder="POI hint" value="{{ $poi->hint }}">
				<input type="text" name="latitude" placeholder="POI latitude" value='{{ $poi->latitude }}' required>
				<input type="text" name="longitude" placeholder="POI longitude" value="{{ $poi->longitude }}" required>
				<textarea name="description" placeholder="POI description" required>{{ $poi->description }}</textarea>
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