@extends('layouts.admin')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Index Department Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.departments')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Department container -->
			<div class="row">
				<div class="col">
					<div id="department-container">
						@foreach($departments as $department)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $department->name }}</p>
									<div class="float-right">
									<!-- Visibility(eye) button toggle true -->
									@if ($department->visibility == 1)
										<a href="{{ route('admin/department/visibility', ['id' => $department->id]) }}">
											<i class="material-icons">visibility</i>
										</a>
									<!-- Visibility(eye) button toggle false -->
									@else
										<a href="{{ route('admin/department/visibility', ['id' => $department->id]) }}">
											<i class="material-icons">visibility_off</i>
										</a>
									<!-- Edit button -->
									@endif
										<a href="{{ route('admin/department/edit', ['id' => $department->id]) }}">
											<i class="material-icons">edit</i>
										</a>
									<!-- Delete button -->
										<a href="{{ route('admin/department/delete', ['id' => $department->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- Submit button-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('admin/department/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End department container -->
		</div>
	</div>
</div>
@endsection
