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
					<form method="POST" action="{{ route('teacher/settings/index', ['id' => $settings->id]) }}">
						@csrf
						
						<!-- Naam -->
                        <input type="text" name="name" placeholder="@lang('messages.name')" 
                            value="{{ $settings->name }}">
						<!-- Department -->
                        <textarea name="department" placeholder="@lang('messages.department')" 
                         required>{{ $settings->department }}</textarea>

						<!-- Submit button -->
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
            <!-- End name form -->
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
					<form method="POST" action="{{ route('teacher/settings/index', ['id' => $settings->id]) }}">
						@csrf
						
						<!-- Password -->
                        <input type="password" name="password" placeholder="@lang('messages.password')" 
                            value="{{ $settings->password }}">
						<!-- Repeat password -->
                        <input type="password" name="confirmpw" placeholder="@lang('messages.confirmpw')" 
                            value="{{ $settings->password }}">

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