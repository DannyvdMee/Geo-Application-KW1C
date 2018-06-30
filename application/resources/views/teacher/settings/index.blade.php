@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   29-06-18
Beschrijving:   Index Settings Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Settings title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.settings')</h5>
				</div>
			</div>
			<!-- End settings title -->
			<!-- Name form -->
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/settings', ['id' => $user->id]) }}">
						@csrf

						<!-- Name -->
						<h6 class="text-center font-bold">@lang('messages.name')</h6>
						<!-- Firstname -->
                        <input type="text" name="firstname" placeholder="@lang('messages.firstname')" required
							value="{{ $user->firstname }}">
						<!-- Lastname -->
						<input type="text" name="lastname" placeholder="@lang('messages.lastname')" required
							value="{{ $user->lastname }}">	
						<div class="whitespace height-21"></div>

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

						<!-- Password -->
						<h6 class="text-center font-bold">@lang('messages.password')</h6>
						<!-- Old pass -->
						<input type="oldpassword" name="oldpassword" placeholder="@lang('messages.oldpassword')">
						<!-- New pass -->
                        <input type="newpassword" name="newpassword" placeholder="@lang('messages.newpassword')" >
						<!-- Repeat pass -->
                        <input type="confirmpassword" name="confirmpassword" placeholder="@lang('messages.confirmpassword')">
						<div class="whitespace height-21"></div>

						<!-- Submit button -->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div> 
			<!-- End form -->
		</div>
	</div>
</div>
@endsection