@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.group-edit')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">			
					<form method="POST" action="{{ route('teacher/group/edit', ['id' => $group->id]) }}">
						@csrf

                        <input type="text" name="name" placeholder="@lang('messages.group-name')" value="{{ $group->name }}" required autofocus>

						<select id="student-box" name="students" required>
							<option value="">@lang('messages.selectStudent')</option>
							@if (!empty($students))
								@foreach ($students as $student)
									<option value="{{ $student->id }}">{{ $student->name }}</option>
								@endforeach
							@endif
						</select>

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

						<div id="student-inputs">

						</div>

						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($group->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($group->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>

					<div class="display-inline-block text-center box-center">
						<button class="btn-white" onclick="removeStudent()">@lang('messages.group-removeStudents')</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection