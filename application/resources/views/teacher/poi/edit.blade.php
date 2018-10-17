@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.poi-edit')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/poi/edit', ['id' => $poi->id]) }}">
						@csrf

						<input type="text" name="name" placeholder="@lang('messages.name')" value="{{ $poi->name }}" required autofocus>
						<input type="text" name="hint" placeholder="Hint" value="{{ $poi->hint }}">
						<input type="text" name="longitude" placeholder="@lang('messages.long')" value="{{ $poi->longitude }}" required>
						<input type="text" name="latitude" placeholder="@lang('messages.lat')" value='{{ $poi->latitude }}' required>
						<textarea name="description" placeholder="@lang('messages.desc')" required>{{ $poi->description }}</textarea>
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($poi->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($poi->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection