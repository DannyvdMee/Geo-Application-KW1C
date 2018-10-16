@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.department-edit')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Department edit form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/department/edit', ['id' => $department->id]) }}">
						@csrf

						<!-- Department name -->
                        <input type="text" name="name" placeholder="@lang('messages.name')" 
                            value="{{ $department->name }}" required autofocus>
                        <!-- Department active? -->
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($department->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($department->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
                        </select>

						<!-- Submit button -->	
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End department edit form -->
		</div>
	</div>
</div>
@endsection