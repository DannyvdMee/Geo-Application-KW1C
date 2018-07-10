@extends('layouts.admin')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   29-06-18
Beschrijving:   Index User Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.users')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Container -->
			<div class="row">
				<div class="col">
					<div id="user-container">
						@foreach($users as $user)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $user->lastname }}, {{ $user->firstname }} </p>
									<div class="float-right">
										<!-- Visibility(eye) button toggle true -->
										@if ($user->visibility == 1)
											<a href="{{ route('admin/user/visibility', ['id' => $user->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										<!-- Visibility(eye) button toggle false -->
										@else
											<a href="{{ route('admin/user/visibility', ['id' => $user->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										<!-- Edit button -->
										@endif
											<a href="{{ route('admin/user/edit', ['id' => $user->id]) }}">
												<i class="material-icons">edit</i>
											</a>
										<!-- Delete button -->
											<a href="{{ route('admin/user/delete', ['id' => $user->id]) }}">
												<i class="material-icons">delete_forever</i>
											</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- Users add button-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('admin/user/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End container -->
		</div>
	</div>
</div>	
@endsection