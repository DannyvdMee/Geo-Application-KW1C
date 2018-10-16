@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.exercise-edit')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/exercise/edit', ['id' => $exercise->id]) }}">
						@csrf

                        <input type="text" name="name" placeholder="@lang('messages.name')" value="{{ $exercise->name }}">
                        <textarea name="content" placeholder="@lang('messages.exercise-content')" required>{{ $exercise->content }}</textarea>

                        <input type="text" name="answer" placeholder="@lang('messages.exercise-answer')" value="{{ $exercise->answer }}" required>
						<input style="border-style: none; padding-left: 0;" type="file" name="picture" value="{{ $exercise->picture }}">

						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($exercise->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($exercise->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection