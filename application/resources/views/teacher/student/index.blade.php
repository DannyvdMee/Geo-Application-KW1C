@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Index Student Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.students')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Student container -->
			<div class="row">
				<div class="col">
					<div id="student-container">
						@foreach($students as $student)
							<div class="row">
								<div class="col dataItem">
									<!-- Student name -->
									<p class="display-inline-block">{{ $student->name }}</p>
									<div class="float-right">
										<!-- Visibility(eye) button toggle true -->
										@if ($student->visibility == 1)
											<a href="{{ route('teacher/student/visibility', ['id' => $student->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										<!-- Visibility(eye) button toggle false -->
										@else
											<a href="{{ route('teacher/student/visibility', ['id' => $student->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										<!-- Edit button -->
										@endif
										<a href="{{ route('teacher/student/edit', ['id' => $student->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<!-- Delete button -->
										<a href="{{ route('teacher/student/delete', ['id' => $student->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- Route add button-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/student/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End student container -->	
		</div>
	</div>
@endsection
