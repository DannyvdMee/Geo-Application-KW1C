@extends('layouts.admin')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Create Department Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.department-add')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Department create form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/department/create') }}">
						@csrf

						<!-- Department name/title -->
						<input type="text" name="name" placeholder="@lang('messages.name')" required autofocus>
						<!-- Department active? -->
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
			<!-- End department create form -->
		</div>
	</div>
</div>
@endsection