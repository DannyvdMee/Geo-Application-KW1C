@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('admin/departments/create') }}">
				<p class="text-center font-bold">@lang('messages.add-department')</p>
				@csrf

				<input type="text" name="title" placeholder="Department Title" required autofocus>
				<select name="state" >
					<option value="">@lang('messages.active')?</option>
					<option value="1">@lang('messages.yes')</option>
					<option value="0">@lang('messages.no')</option>
				</select>
				<input type="submit" value="@lang('messages.save')">
			</form>
		</div>
	</div>
@endsection