@extends('layouts.teacher')

@section('content')
<div class="row justify-content-center">
	<div class="col">
		<p class="text-center font-bold">@lang('messages.edit-poi')</p>

		<!-- POI edit form -->
		<form method="POST" action="{{ route('teacher/poi/edit', ['id' => $poi->id]) }}">
			@csrf
			
			<!-- POI title -->
			<input type="text" name="name" placeholder="POI title" 
				value="{{ $poi->title }}" required autofocus>
			
			<!-- POI hint -->
			<input type="text" name="hint" placeholder="POI hint" 
				value="{{ $poi->hint }}">

			<!-- POI latitute -->
			<input type="text" name="latitude" placeholder="POI latitude" 
				value='{{ $poi->latitude }}' required>
			
			<!-- POI longtitute -->
			<input type="text" name="longitude" placeholder="POI longitude" 
				value="{{ $poi->longitude }}" required>
			
			<!-- POI description -->
			<textarea name="description" placeholder="POI description" required>{{ $poi->description }}</textarea>

			<!-- POI dropdown -->
			<select name="active">
				<option value="">@lang('messages.active')?</option>
				<option value="1" {{ ($poi->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
				<option value="0" {{ ($poi->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
			</select>

			<!-- Submit btn -->
			<input type="submit" value="@lang('messages.save')">
		</form>
	</div>
 </div>
@endsection