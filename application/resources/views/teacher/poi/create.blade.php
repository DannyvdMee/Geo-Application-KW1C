@extends('layouts.teacher')

<!--
	27 06 18
	Onyi:
	!IMPORTANT
	CORRECT CREATE PAGE
	CAN BE USED AS TEMPLATE...
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
						<h5 class="text-center font-bold">@lang('messages.add-poi')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- POI create form -->
			<div class="row">
				<div class="col">			
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

						<!-- Submit button-->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End POI create form -->
		</div>
	</div>
</div>
@endsection
