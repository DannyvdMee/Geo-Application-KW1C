@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.users-add')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/user/create') }}">
						@csrf
						
						<h6 class="text-center font-bold">@lang('messages.account')</h6>
						<input type="email" name="email" placeholder="@lang('messages.email')" required>
						<input type="text" name="username" placeholder="@lang('messages.username')" required>
						<input type="password" name="password" placeholder="@lang('messages.password')" required>

						<h6 class="text-center font-bold">@lang('messages.name')</h6>
						<input type="text" name="firstname" placeholder="@lang('messages.firstname')" required>
						<input type="text" name="lastname" placeholder="@lang('messages.lastname')" required>

						<h6 class="text-center font-bold">@lang('messages.department')</h6>
						<select name="department" required>
							<option value="">-- @lang('messages.selectDepartment') --</option>
							@if (!empty($departments))
								@foreach ($departments as $department)
									<option value="{{ $department->name }}" {{ ($department->name == Auth::user()->department ? 'selected' : '') }}>{{ $department->name }}</option>
								@endforeach
							@endif
						</select>

						<h6 class="text-center font-bold">@lang('messages.account_type')</h6>
						<select name="account_type" required>
							<option value="">-- @lang('messages.selectAccountType') --</option>
							<option value="admin">@lang('messages.admin')</option>
							<option value="teacher">@lang('messages.teacher')</option>
						</select>

						<div class="whitespace height-21"></div>

						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1">@lang('messages.yes')</option>
							<option value="0">@lang('messages.no')</option>
						</select>

						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End create form -->
		</div>
	</div>
@endsection
