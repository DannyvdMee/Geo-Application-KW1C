@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Index Exercise Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.exercise')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Exercise container -->
			<div class="row">
				<div class="col">
					<div id="exercise-container">
						@foreach($exercises as $exercise)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $exercise->title }}</p>
									<div class="float-right">
										<!-- Visibility(eye) button toggle true -->
										@if ($exercise->visibility == true)
											<a href="{{ route('teacher/exercise/visibility', ['id' => $exercise->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										<!-- Visibility(eye) button toggle false -->
										@else
											<a href="{{ route('teacher/exercise/visibility', ['id' => $exercise->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										<!-- Edit button -->
										@endif
										<a href="{{ route('teacher/exercise/edit', ['id' => $exercise->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<!-- Delete button -->
										<a href="{{ route('teacher/exercise/delete', ['id' => $exercise->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- No option to add exercise required. Exercises are linked to a POI -->
						<!-- POI add button-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/exercise/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
						
					</div>
				</div>
			</div>
			<!-- End exercise container -->	
		</div>
	</div>
</div>
@endsection