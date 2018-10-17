@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.settings')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">					
					<form method="POST" action="{{ route('teacher/settings', ['id' => $user->id]) }}">
						@csrf

						<h6 class="text-center font-bold">@lang('messages.name')</h6>
                        <input type="text" name="firstname" placeholder="@lang('messages.firstname')" required value="{{ $user->firstname }}">
						<input type="text" name="lastname" placeholder="@lang('messages.lastname')" required value="{{ $user->lastname }}">
						<div class="whitespace height-21"></div>

						<h6 class="text-center font-bold">@lang('messages.department')</h6>
						<select name="department">
							<!-- <option value="">@lang('messages.selectDepartment')</option> -->
							@if (!empty($departments))
								@foreach ($departments as $department)
									<option value="{{ $department->name }}" {{ ($department->name == Auth::user()->department ? 'selected' : '') }}>{{ $department->name }}</option>
								@endforeach
							@endif
						</select>
						<div class="whitespace height-21"></div>

						<input type="submit" value="@lang('messages.save')">
						<div class="whitespace height-21"></div>
                    </form>
                    <form method="POST" action="{{ route('admin/settings/change-password') }}">
                        @csrf

                        <h6 class="text-center font-bold">@lang('messages.password')</h6>

                        <input type="password" name="oldpassword" placeholder="@lang('messages.oldpassword')">
                        <input type="password" name="password" placeholder="@lang('messages.newpassword')">
                        <input type="password" name="password_confirmation" placeholder="@lang('messages.confirmpassword')">

						<div class="whitespace height-21"></div>

						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div> 
			<!-- End form -->
		</div>
	</div>
</div>
@endsection