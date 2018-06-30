@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Index Route Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.routes')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Route container -->
			<div class="row">
				<div class="col">
					<div id="route-container">
						@foreach($routes as $route)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $route->name }}</p>
									<div class="float-right">
										<!-- Visibility(eye) button toggle true -->
										@if ($route->visibility == 1)
											<a href="{{ route('teacher/route/visibility', ['id' => $route->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										<!-- Visibility(eye) button toggle false -->
										@else
											<a href="{{ route('teacher/route/visibility', ['id' => $route->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										<!-- Edit button -->
										@endif
											<a href="{{ route('teacher/route/edit', ['id' => $route->id]) }}">
												<i class="material-icons">edit</i>
											</a>
										<!-- Delete button -->
											<a href="{{ route('teacher/route/delete', ['id' => $route->id]) }}">
												<i class="material-icons">delete_forever</i>
											</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- Submit button-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/route/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End route container -->	
		</div>
	</div>
</div>	
@endsection