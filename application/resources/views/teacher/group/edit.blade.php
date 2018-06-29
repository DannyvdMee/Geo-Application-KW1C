@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Edit Group Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.group-edit')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Group edit form -->
			<div class="row">
				<div class="col">			
					<form method="POST" action="{{ route('teacher/group/edit', ['id' => $group->id]) }}">
						@csrf

						<!-- Group name -->
                        <input type="text" name="name" placeholder="@lang('messages.group-name')" 
                            value="{{ $group->name }}" required autofocus>

						<!-- Students to a group -->
						<select id="student-box" name="students">
							<option value="">@lang('messages.selectStudent')</option>
							@if (!empty($students))
								@foreach ($students as $student)
									<option value="{{ $student->id }}">{{ $student->name }}</option>
								@endforeach
							@endif
						</select>

						<!-- Added students -->
						<div id="added-students" class="input-box">
							@if (!empty($added))
								@foreach ($added as $student)
									<div class="student">
										<p>{{ $student->name }}</p>
										<i class="material-icons float-right remove-student">remove</i>
									</div>
								@endforeach
							@else

							@endif
						</div>

						<!-- Student ID -->
						<div id="student-inputs">

						</div>

						<!-- Group active? -->
						<select name="active">
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($group->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($group->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<!-- Submit button-->
						<input type="submit" value="@lang('messages.save')">
					</form>

					<!-- Delete button-->
					<div class="display-inline-block text-center box-center">
						<button class="btn-white" onclick="removeStudent()">
							<!-- Delete all students -->
							{{ @lang('messages.group-removeStudents' )}}
						</button>
					</div>
				</div>
			</div>
			<!-- End group edit form -->
		</div>
	</div>
</div>
@endsection