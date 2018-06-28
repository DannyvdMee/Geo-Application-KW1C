@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Create Route Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.student-add')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Student create form -->
			<div class="row">
				<div class="col">	
					<form method="POST" action="{{ route('teacher/student/create') }}">
						@csrf

						<!-- Student number -->
						<input type="number" name="number" placeholder="@lang('messages.student-number')" required autofocus>
						<!-- Student name -->
						<input type="text" name="name" placeholder="@lang('messages.student-name')" required>
						<!-- Student info -->
						<textarea name="information" placeholder="@lang('messages.student-info')"></textarea>
						<!-- Student dropdown -->
						<select name="active">
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<!-- Submit button-->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End student create form -->
		</div>
	</div>
</div>
@endsection