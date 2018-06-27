@extends('layouts.teacher')

<!--
	27 06 18
	Onyi:
	!IMPORTANT
	CORRECT EDIT PAGE
	CAN BE USED AS TEMPLATE...
-->

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Edit POI Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.edit-poi')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- POI edit form -->
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/poi/edit', ['id' => $poi->id]) }}">
						@csrf
						
						<!-- POI title -->
						<input type="text" name="title" placeholder="@lang('messages.poi-title')" 
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
			<!-- End POI edit form -->
		</div>
	</div>
</div>
@endsection