@extends('layouts.teacher')

@section('content')
<div class="row justify-content-center">
	<div class="col">
		<p class="text-center font-bold">@lang('messages.add-poi')</p>
		
		<!-- POI create form -->
		<form method="POST" action="{{ route('teacher/poi/create') }}">
			@csrf

			<!-- POI title -->
			<input type="text" name="name" placeholder="@lang('messages.poi-title')" required autofocus>

			<!-- POI hint -->
			<input type="text" name="hint" placeholder="Hint">

			<!-- POI longtitute -->
			<input type="text" name="longitude" placeholder="@lang('messages.poi-long')" required>
			
			<!-- POI latitute -->
			<input type="text" name="latitude" placeholder="@lang('messages.poi-lat')" required>

			<!-- POI description -->
			<textarea name="description" placeholder="@lang('messages.poi-desc')" required></textarea>

			<!-- POI dropdown -->
			<select name="active">
				<option value="">@lang('messages.active')?</option>
				<option value="1">@lang('messages.yes')</option>
				<option value="0">@lang('messages.no')</option>
			</select>

			<!-- Submit btn als een INPUT????????? -->
			<input type="submit" value="@lang('messages.save')">
		</form>
	</div>
</div>
@endsection
