@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.route-edit')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/route/edit', ['id' => $route->id]) }}">
						@csrf

						<input type="text" name="name" placeholder="@lang('messages.name')" value="{{ $route->name }}" required autofocus>
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($route->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($route->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection