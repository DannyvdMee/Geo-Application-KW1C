@extends('layouts.admin')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Create User Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.users-add')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Create form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/user/create') }}">
						@csrf
						
						<!-- Email -->
						<input type="email" name="email" placeholder="@lang('messages.email')">
						<!-- Username -->
						<input type="text" name="username" placeholder="@lang('messages.username')">
						<!-- Password -->
						<input type="password" name="password" placeholder="@lang('messages.password')">

						<!-- First name -->
						<input type="text" name="firstname" placeholder="@lang('messages.firstname')">
						<!-- Last name -->
						<input type="text" name="lastname" placeholder="@lang('messages.lastname')">

						<!-- Department -->	
						<h6 class="text-center font-bold">@lang('messages.department')</h6>
						<select name="department">
							<!-- <option value="">@lang('messages.selectDepartment')</option> -->
							@if (!empty($departments))
								@foreach ($departments as $department)
									<option value="{{ $department->name }}" {{ ($department->name == Auth::user()->department ? 'selected' : '') }}>{{ $department->name }}</option>
								@endforeach
							@endif
						</select>
						<div class="whitespace height-21"></div>

						<!-- Is it active? -->
						<select name="active">
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<!-- Submit button -->						
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End create form -->
		</div>
	</div>
@endsection
