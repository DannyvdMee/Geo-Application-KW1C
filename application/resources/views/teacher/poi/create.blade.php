@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.poi-add')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">			
					<form method="POST" action="{{ route('teacher/poi/create') }}">
						@csrf

						<input type="text" name="name" placeholder="@lang('messages.name')" required autofocus>
						<input type="text" name="hint" placeholder="Hint">
						<input type="text" name="longitude" placeholder="@lang('messages.long')" required>
						<input type="text" name="latitude" placeholder="@lang('messages.lat')" required>
						<textarea name="description" placeholder="@lang('messages.desc')" required></textarea>
						<select name="active" required>		
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>
						<input type="submit" value="@lang('messages.save')">
					</form>
					<form method="POST" action="{{ route('teacher/poi/import') }}" enctype="multipart/form-data">
						@csrf
						<input type="file" name="csv" required>
						<input type="submit" value="@lang('messages.Upload')">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
