@extends('layouts.teacher')

@section('content')
<div class="row justify-content-center">
	<div class="col">
		<p class="text-center font-bold">@lang('messages.edit-poi')</p>

		<!-- POI edit form -->
		<form method="POST" action="{{ route('teacher/poi/edit', ['id' => $poi->id]) }}">
			@csrf
			
			<!-- POI title -->
			<input type="text" name="name" placeholder="@lang('messages.poi-title')" 
				value="{{ $poi->title }}" required autofocus>
			
			<!-- POI hint -->
			<input type="text" name="hint" placeholder="Hint" 
				value="{{ $poi->hint }}">
			
			<!-- POI longtitute -->
			<input type="text" name="longitude" placeholder="@lang('messages.poi-long')" 
				value="{{ $poi->longitude }}" required>
				
			<!-- POI latitute -->
			<input type="text" name="latitude" placeholder="@lang('messages.poi-lat')" 
				value='{{ $poi->latitude }}' required>
			
			<!-- POI description -->
			<textarea name="description" placeholder="@lang('messages.poi-desc')" required>{{ $poi->description }}</textarea>

			<!-- POI dropdown -->
			<select name="active">
				<option value="">@lang('messages.active')?</option>
				<option value="1" {{ ($poi->visibility == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
				<option value="0" {{ ($poi->visibility == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
			</select>

			<!-- Submit button -->
			<input type="submit" value="@lang('messages.save')">
		</form>
	</div>
 </div>
@endsection