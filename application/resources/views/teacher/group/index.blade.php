@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Index Group Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.groups')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Group container -->
			<div class="row">
				<div class="col">
					<div id="group-container">
						@foreach($groups as $group)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $group->title }}</p>
									<div class="float-right">
										<!-- Visibility(eye) button toggle true -->
										@if ($group->visibility == 1)
											<a href="{{ route('teacher/group/visibility', ['id' => $group->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										<!-- Visibility(eye) button toggle false -->
										@else
											<a href="{{ route('teacher/group/visibility', ['id' => $group->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										<!-- Edit button -->
										@endif
										<a href="{{ route('teacher/group/edit', ['id' => $group->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<!-- Delete button -->
										<a href="{{ route('teacher/group/delete', ['id' => $group->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- Group add button-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/group/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End group container -->
		</div>
	</div>
</div>	
@endsection