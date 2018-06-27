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
                            value="{{ $exercise->title }}">
						<!-- Exercise content -->
                        <textarea name="content" placeholder="@lang('messages.exercise-content')" 
                         required>{{ $exercise->content }}</textarea>
						<!-- Exercise answer input area -->
                        <input type="text" name="answer" placeholder="@lang('messages.exercise-answer')" 
                            value="{{ $exercise->answer }}" required>
						<!-- Exercise picture -->
						<input style="border-style: none; padding-left: 0;" type="file" name="picture" 
                            placeholder="@lang('messages.exercise-question')" 
                            value="{{ $exercise->picture }}">

                        <!-- Exercise dropdown -->   
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