@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.student-edit')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">					
                    <form method="POST" action="{{ route('teacher/student/edit', ['id' => $student->id]) }}">
						@csrf

                        <input type="number" name="number" placeholder="@lang('messages.student-number')" value="{{ $student->number }}" required autofocus>
                        <input type="text" name="name" placeholder="@lang('messages.student-name')" value="{{ $student->name }}" required>
						<textarea name="information" placeholder="@lang('messages.student-info')">{{ $student->information }}</textarea>
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($student->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($student->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

					    <input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection