@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Edit Exercise Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.exercise-edit')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Exercise edit form -->
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/exercise/edit', ['id' => $exercise->id]) }}">
						@csrf
						
						<!-- Exercise title -->
						<input type="text" name="title" placeholder="@lang('messages.title')" 
							value="{{ $exercise->title }}" required autofocus>
						<!-- POI hint -->
						<input type="text" name="hint" placeholder="Hint" 
							value="{{ $exercise->hint }}">			
						<!-- POI longtitute -->
						<input type="text" name="longitude" placeholder="@lang('messages.long')" 
							value="{{ $exercise->longitude }}" required>							
						<!-- POI latitute -->
						<input type="text" name="latitude" placeholder="@lang('messages.lat')" 
							value='{{ $exercise->latitude }}' required>						
						<!-- POI description -->
						<textarea name="description" placeholder="@lang('messages.desc')" required>{{ $poi->description }}</textarea>
						<!-- POI dropdown -->
						<select name="active">
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($exercise->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($exercise->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<!-- Submit button -->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End exercise edit form -->
		</div>
	</div>
</div>
@endsection