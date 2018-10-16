@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.department-add')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Department create form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/department/create') }}">
						@csrf

						<!-- Department name/title -->
						<input type="text" name="name" placeholder="@lang('messages.name')" required autofocus>
						<!-- Department active? -->
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<!-- Submit button -->	
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End department create form -->
		</div>
	</div>
</div>
@endsection