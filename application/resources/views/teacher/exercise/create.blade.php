@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Create Exercise Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.exercise-add')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Exercise create form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('teacher/exercise/create') }}">
						@csrf
						
						<!-- POI ID = hidden -->
						<input type="hidden" name="poi_id" value="{{ $poi->id }}" required readonly>

						<!-- Exercise title -->
						<input type="text" name="name" placeholder="@lang('messages.name')">
						<!-- Exercise content -->
						<textarea name="content" placeholder="@lang('messages.exercise-content')" required></textarea>
						<!-- Exercise answer input area -->
						<input type="text" name="answer" placeholder="@lang('messages.exercise-answer')" required>
						<!-- Exercise picture -->
						<input style="border-style: none; padding-left: 0;" type="file" name="picture" 
						placeholder="@lang('messages.exercise-question')">

						<!-- Exercise active? -->
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<!-- Submit button -->						
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End exercise create form -->
		</div>
	</div>
@endsection
