@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
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
						
						<!-- Firstname -->
                        <input type="text" name="firstname" placeholder="@lang('messages.firstname')" required
							value="{{ $user->name }}">
						<!-- Lastname -->
						<input type="text" name="lastname" placeholder="@lang('messages.lastname')" required
							value="{{ $user->name }}">
							
						<!-- Department -->
						<select name="departments">
							<option value="">@lang('messages.selectDepartment')</option>
							@if (!empty($departments))
								@foreach ($departments as $department)
									<option value="{{ $department->id }}">{{ $department->name }}</option>
								@endforeach
							@endif
						</select>

						<!-- Submit button -->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End name form -->

			<div class="whitespace height-21"></div>
			<div class="whitespace height-21"></div>


			<!-- Password title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.password')</h5>
				</div>
			</div>
			<!-- End password title -->
			<!-- Password form -->
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/settings', ['id' => $user->id]) }}">
						@csrf
						
						<!-- Password -->
                        <input type="password" name="password" placeholder="@lang('messages.password')"  >
						<!-- Repeat password -->
                        <input type="password" name="confirmpw" placeholder="@lang('messages.confirmpw')">

						<!-- Submit button -->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End password form -->
		</div>
	</div>
</div>
@endsection